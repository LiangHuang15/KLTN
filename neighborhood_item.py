import pandas as pd 
import numpy as np
import math
from sklearn.metrics.pairwise import cosine_similarity
from sklearn.model_selection import train_test_split
from scipy import sparse 
import json
import time
import pymysql
start_time = time.time()
list =[]
class CF(object):
    """docstring for CF"""
    def __init__(self, Y_data, k, dist_func = cosine_similarity, uuCF = 1):
        self.uuCF = uuCF # user-user (1) or item-item (0) CF
        self.Y_data = Y_data if uuCF else Y_data[:, [1, 0, 2]]
        self.k = k
        self.dist_func = dist_func
        self.Ybar_data = None
        # number of users and items. Remember to add 1 since id starts from 0
        self.n_users = int(np.max(self.Y_data[:, 0])) + 1 
        self.n_items = int(np.max(self.Y_data[:, 1])) + 1
    
    def add(self, new_data):
        """
        Update Y_data matrix when new ratings come.
        For simplicity, suppose that there is no new user or item.
        """
        # ghép mảng axis = 0 đưa giá trị của mảng ghép vào đưa vào cuối 
        self.Y_data = np.concatenate((self.Y_data, new_data), axis = 0)
    
    def normalize_Y(self):
        users = self.Y_data[:, 0] # all users - first col of the Y_data
        self.Ybar_data = self.Y_data.copy()
        self.mu = np.zeros((self.n_users,))
        for n in range(self.n_users):
            ids = np.where(users == n)[0].astype(np.int32)
            # indices of all ratings associated with user n
            item_ids = self.Y_data[ids, 1] 
            # and the corresponding ratings 
            ratings = self.Y_data[ids, 2]
            m = np.mean(ratings) 
            if np.isnan(m):
                m = 0 # to avoid empty array and nan value
            self.mu[n] = m
            # normalize
            self.Ybar_data[ids, 2] = ratings - self.mu[n]

    
        self.Ybar = sparse.coo_matrix((self.Ybar_data[:, 2],
            (self.Ybar_data[:, 1], self.Ybar_data[:, 0])), (self.n_items, self.n_users))
        self.Ybar = self.Ybar.tocsr()

    def similarity(self):
        eps = 1e-6
        self.S = self.dist_func(self.Ybar.T, self.Ybar.T)
    
        
    def refresh(self):
        """
        Normalize data and calculate similarity matrix again (after
        some few ratings added)
        """
        self.normalize_Y()
        self.similarity() 
        
    def fit(self):
        self.refresh()
        
    def __pred(self, u, i, normalized = 1):
        """ 
        predict the rating of user u for item i (normalized)
        if you need the un
        """
        # Step 1: find all users who rated i
        ids = np.where(self.Y_data[:, 1] == i)[0].astype(np.int32)
        # Step 2: 
        users_rated_i = (self.Y_data[ids, 0]).astype(np.int32)
        # Step 3: find similarity btw the current user and others 
        # who already rated i
        sim = self.S[u, users_rated_i]
        # Step 4: find the k most similarity users
        a = np.argsort(sim)[-self.k:] 
        # and the corresponding similarity levels
        nearest_s = sim[a]
        # How did each of 'near' users rated item i
        r = self.Ybar[i, users_rated_i[a]]
        if normalized:
            # add a small number, for instance, 1e-8, to avoid dividing by 0
            return (r*nearest_s)[0]/(np.abs(nearest_s).sum() + 1e-8)

        return (r*nearest_s)[0]/(np.abs(nearest_s).sum() + 1e-8) + self.mu[u]
    
    def pred(self, u, i, normalized = 1):
        """ 
        predict the rating of user u for item i (normalized)
        if you need the un
        """
        if self.uuCF: return self.__pred(u, i, normalized)
        return self.__pred(i, u, normalized)
            
    def recommend(self, u):
        """
        Determine all items should be recommended for user u.
        The decision is made based on all i such that:
        self.pred(u, i) > 0. Suppose we are considering items which 
        have not been rated by u yet. 
        """
        ids = np.where(self.Y_data[:, 0] == u)[0]
        items_rated_by_u = self.Y_data[ids, 1].tolist()              
        recommended_items = []
        for i in range(self.n_items):
            if i not in items_rated_by_u:
                rating = self.__pred(u, i)
                if rating > 0: 
                    recommended_items.append(i)
        list.append(recommended_items)
        return recommended_items 
    
    def recommend2(self, u):
        """
        Determine all items should be recommended for user u.
        The decision is made based on all i such that:
        self.pred(u, i) > 0. Suppose we are considering items which 
        have not been rated by u yet. 
        """
        ids = np.where(self.Y_data[:, 0] == u)[0]
        items_rated_by_u = self.Y_data[ids, 1].tolist()              
        recommended_items = []
    
        for i in range(self.n_items):
            if i not in items_rated_by_u:
                rating = self.__pred(u, i)
                if rating > 0: 
                    recommended_items.append(i)
        
        return recommended_items 

    def print_recommendation(self):
        """
        print all items which should be recommended for each user 
        """
        # print ('Recommendation: ')
        # for u in range(self.n_users):
        #     recommended_items = self.recommend(u)
        #     if self.uuCF:
        #         print ('    Recommend item(s):', recommended_items, 'for user', u)
        #     else: 
        #         print ('    Recommend item', u, 'for user(s) : ', recommended_items)

        print ('Recommendation: ')
        # u = 500
        with open('/Applications/XAMPP/xamppfiles/htdocs/KLTN/data.json') as json_file:
            userdata = json.load(json_file)
            u=int(userdata['username'])
        # u = 1
        recommended_items = self.recommend(u)
        if self.uuCF:
            print ('    Recommend item(s):', recommended_items, 'for user', u)
        else: 
            print ('    Recommend item', u, 'for user(s) : ', recommended_items)


# r_cols = ['user_id', 'movie_id', 'rating', 'unix_timestamp']

# ratings_base = pd.read_csv('ml-100k/ub.base', sep='\t', names=r_cols, encoding='latin-1')
# ratings_test = pd.read_csv('ml-100k/ub.test', sep='\t', names=r_cols, encoding='latin-1')

# print('type',ratings_base.dtypes)

import pymysql 
conn =pymysql.connect(host="localhost",user="root",passwd="",database="movielens")
cursor = conn.cursor()
Ratings_table = pd.read_sql_query("select * from ratings",conn)
data_items=Ratings_table[['UserID','MovieID','Rating','Timestamp']]
Y= data_items[['UserID','MovieID','Rating','Timestamp']]
print('type',Y.dtypes)

X=Y.rename(columns={"UserID":"user_id","MovieID":"movie_id","Rating":"rating","Timestamp":"unix_timestamp"})
print('data',X)
X_train, X_test= train_test_split(X,test_size = 0.2)
Ratings_base=X_train.sort_values(by=['user_id'])
Ratings_test=X_test.sort_values(by=['user_id'])


rate_train = Ratings_base.values
rate_test = Ratings_test.values




pd.set_option('display.max_rows',1000000)
pd.set_option('display.max_columns',5)
# rate_train = ratings_base.values
# rate_test = ratings_test.values


print('rate1',rate_train)
print('rate2',rate_test)
rate_train[:, :2] -= 1
rate_test[:, :2] -= 1
print('rate_train',rate_train[:, :2])
print('rate_test',rate_test[:, :2])


# rs = CF(rate_train, k = 30, uuCF = 1)
# rs.fit()
# # rs.print_recommendation()
# n_tests = rate_test.shape[0]
# SE= 0 # squared error
# for n in range(n_tests):
#     pred = rs.pred(rate_test[n, 0], rate_test[n, 1], normalized = 0)
#     SE += (pred - rate_test[n, 2])**2 
# RMSE = np.sqrt(SE/n_tests)
# print ('User-user CF, RMSE =', RMSE)


rs = CF(rate_train, k = 30, uuCF = 0)
rs.fit()

n_tests = rate_test.shape[0]
SE = 0 # squared error
for n in range(n_tests):
    pred = rs.pred(rate_test[n, 0], rate_test[n, 1], normalized = 0)
    SE += (pred - rate_test[n, 2])**2 

RMSE = np.sqrt(SE/n_tests)
with open('/Applications/XAMPP/xamppfiles/htdocs/KLTN/data.json') as json_file:
    userdata = json.load(json_file)
    u=int(userdata['username'])
print('recommend for user: ',u)
print ('Item-item CF, RMSE =', RMSE)
rs.print_recommendation()
print('list',list)

conn =pymysql.connect(host="localhost",user="root",passwd="",database="movielens")
cursor = conn.cursor()
sql1="delete from recommend where MovieID = %s"
cursor.execute(sql1,(int(u)))
for i in range(0,10,1):
    try:
        sql = "insert into test_recommend (MovieID,UserID) values (%s,%s)"
        cursor.execute(sql,(int(u),int(list[0][i])))
    except:
        print('error')
conn.commit()



print("--- %s seconds ---" % (time.time() - start_time))