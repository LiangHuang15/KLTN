import pandas as pd 
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.metrics.pairwise import cosine_similarity
from scipy import sparse 
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
        Update Y_data matrix when new Ratings come.
        For simplicity, suppose that there is no new user or item.
        """
        # ghép mảng axis = 0 đưa giá trị của mảng ghép vào đưa vào cuối 
        self.Y_data = np.concatenate((self.Y_data, new_data), axis = 0)
    
    def normalize_Y(self):
        users = self.Y_data[:, 0] # all users - first col of the Y_data
        self.Ybar_data = self.Y_data.copy()
        self.mu = np.zeros((self.n_users,))
        for n in range(self.n_users):
            # row indices of Rating done by user n
            # since indices need to be integers, we need to convert
            ids = np.where(users == n)[0].astype(np.int32)
            # indices of all Ratings associated with user n
            MovieIDs = self.Y_data[ids, 1] 
            # and the corresponding Ratings 
            Ratings = self.Y_data[ids, 2]
            # take mean

            m = np.mean(Ratings) 
            if np.isnan(m):
                m = 0 # to avoid empty array and nan value
            self.mu[n] = m
            # normalize
            self.Ybar_data[ids, 2] = Ratings - self.mu[n]

        ################################################
        # form the Rating matrix as a sparse matrix. Sparsity is important 
        # for both memory and computing efficiency. For example, if #user = 1M, 
        # #item = 100k, then shape of the Rating matrix would be (100k, 1M), 
        # you may not have enough memory to store this. Then, instead, we store 
        # nonzeros only, and, of course, their locations.
        self.Ybar = sparse.coo_matrix((self.Ybar_data[:, 2],
            (self.Ybar_data[:, 1], self.Ybar_data[:, 0])), (self.n_items, self.n_users))
        self.Ybar = self.Ybar.tocsr()

    def similarity(self):
        eps = 1e-6
        self.S = self.dist_func(self.Ybar.T, self.Ybar.T)
    
        
    def refresh(self):
        """
        Normalize data and calculate similarity matrix again (after
        some few Ratings added)
        """
        self.normalize_Y()
        self.similarity() 
        
    def fit(self):
        self.refresh()
        
    
    def __pred(self, u, i, normalized = 1):
        """ 
        predict the Rating of user u for item i (normalized)
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
        predict the Rating of user u for item i (normalized)
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
                Rating = self.__pred(u, i)
                if Rating > 0: 
                    recommended_items.append(i)
        
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
                Rating = self.__pred(u, i)
                if Rating > 0: 
                    recommended_items.append(i)
        
        return recommended_items 

    def print_recommendation(self):
        """
        print all items which should be recommended for each user 
        """
        print ('Recommendation: ')
        for u in range(self.n_users):
            recommended_items = self.recommend(u)
            if self.uuCF:
                print ('    Recommend item(s):', recommended_items, 'for user', u)
            else: 
                print ('    Recommend item', u, 'for user(s) : ', recommended_items)



import pymysql 
conn =pymysql.connect(host="localhost",user="root",passwd="",database="movielens")
cursor = conn.cursor()
Ratings_table = pd.read_sql_query("select * from Ratings",conn)
# data_items=Ratings_table[['UserID','MovieID','Rating','timestamp']]
data_items=Ratings_table[['UserID','MovieID','Rating','Timestamp']]
# print('data_items',data_items)

#______________________________________________________

X= data_items[['UserID','MovieID','Rating']]
print('data',X)
X_train, X_test= train_test_split(X,test_size = 0.2)
#______________________________________________________

pd.set_option('display.max_rows',1000000)
pd.set_option('display.max_columns',5)
# print('X train',X_train.sort_values(by=['UserID']))
# print('X test',X_test.sort_values(by=['UserID']))





#______________________________________________________

Ratings_base=X_train.sort_values(by=['UserID'])
Ratings_test=X_test.sort_values(by=['UserID'])

rate_train = Ratings_base.values
rate_test = Ratings_test.values
#______________________________________________________


# indices start from 0
rate_train[:, :2] -= 1
rate_test[:, :2] -= 1


#______________________________________________________
print('train',rate_train)
print('test',rate_test)
#______________________________________________________




rs = CF(rate_train, k = 30, uuCF = 1)
rs.fit()

n_tests = rate_test.shape[0]
SE = 0 # squared error
for n in range(n_tests):
    pred = rs.pred(rate_test[n, 0], rate_test[n, 1], normalized = 0)
    SE += (pred - rate_test[n, 2])**2 

RMSE = np.sqrt(SE/n_tests)
print ('User-user CF, RMSE =', RMSE)








# rs = CF(rate_train, k = 30, uuCF = 0)
# rs.fit()

# n_tests = rate_test.shape[0]
# SE = 0 # squared error
# for n in range(n_tests):
#     pred = rs.pred(rate_test[n, 0], rate_test[n, 1], normalized = 0)
#     SE += (pred - rate_test[n, 2])**2 

# RMSE = np.sqrt(SE/n_tests)
# print ('Item-item CF, RMSE =', RMSE)