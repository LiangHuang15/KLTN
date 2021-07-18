import pandas as pd 
import numpy as np
import math
from sklearn.metrics.pairwise import cosine_similarity
from sklearn.model_selection import train_test_split
from scipy import sparse 
import json
import time
start_time = time.time()
list =[]
class CF(object):

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

        # ghép mảng axis = 0 đưa giá trị của mảng ghép vào đưa vào cuối 
        self.Y_data = np.concatenate((self.Y_data, new_data), axis = 0)
    
    def normalize_Y(self):
        users = self.Y_data[:, 0] # tất cả user 
        self.Ybar_data = self.Y_data.copy()
        # mảng 0 với n cột 
        self.mu = np.zeros((self.n_users,))
        for n in range(self.n_users):
            # những dòng mà user là n 
            ids = np.where(users == n)[0].astype(np.int32)
            # những sản phẩm được user n ratings 
            item_ids = self.Y_data[ids, 1] 
            # ratings tương ứng với user n
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

        self.normalize_Y()
        self.similarity() 
        
    def fit(self):
        self.refresh()
    ## dự đoán ratings user cho item i 
    def __pred(self, u, i, normalized = 1):

        #  tìm tất cả các user đã ratings cho i 
        ids = np.where(self.Y_data[:, 1] == i)[0].astype(np.int32)
        # những ngừoi dùng đã rating
        users_rated_i = (self.Y_data[ids, 0]).astype(np.int32)
        # tìm độ tương đồng giữa người dùng u với những người dùng khác 
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

        if self.uuCF: return self.__pred(u, i, normalized)
        return self.__pred(i, u, normalized)
            
    def recommend(self, u):

        ids = np.where(self.Y_data[:, 0] == u)[0]
        items_rated_by_u = self.Y_data[ids, 1].tolist()     
     
        recommended_items = []
        for i in range(1,self.n_items,1):
            if i not in items_rated_by_u:
                rating = self.__pred(u, i)
                if rating > 0: 
                    recommended_items.append(i)

        list.append(recommended_items)
        return recommended_items 
    
    def recommend2(self, u):

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

print('rate1',rate_train)
print('rate2',rate_test)
# rate_train[:, :2] -= 1
# rate_test[:, :2] -= 1
print('rate_train',rate_train[:, :2])
print('rate_test',rate_test[:, :2])


rs = CF(rate_train, k = 30, uuCF = 1)
rs.fit()

n_tests = rate_test.shape[0]
SE= 0 # squared error
for n in range(n_tests):
    pred = rs.pred(rate_test[n, 0], rate_test[n, 1], normalized = 0)
    SE += (pred - rate_test[n, 2])**2 
RMSE = np.sqrt(SE/n_tests)
with open('/Applications/XAMPP/xamppfiles/htdocs/KLTN/data.json') as json_file:
    userdata = json.load(json_file)
    u=int(userdata['username'])
print('recommend for user: ',u)
print ('User-user CF, RMSE =', RMSE)
rs.print_recommendation()
# print('list',list)

conn =pymysql.connect(host="localhost",user="root",passwd="",database="movielens")
cursor = conn.cursor()
sql1="delete from test_recommend where UserID = %s"
cursor.execute(sql1,(int(u)))
for i in range(0,10,1):
    try:
        sql = "insert into test_recommend (MovieID,UserID) values (%s,%s)"
        cursor.execute(sql,(int(list[0][i]),int(u)))
    except:
        print('error')
conn.commit()

print("--- %s seconds ---" % (time.time() - start_time))


