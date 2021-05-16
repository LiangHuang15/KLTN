from os import error
import pandas as pd
import numpy as np
columns = ['user_id', 'item_id', 'rating', 'timestamp']
pd.set_option('display.max_rows',1000000)
movie_length = pd.read_csv('/Applications/XAMPP/xamppfiles/htdocs/recommender_system/ml-1m/ratings.dat', header = 0, names = columns, sep = '::', engine = 'python')
movie_length = movie_length.sort_values(['user_id', 'item_id'])
print(movie_length)

# print('Data movie length shape: %s'%str(movie_length.shape))
# print('No customers: %s'%str(np.unique(movie_length.iloc[:, 0]).shape[0]))
# print('No movies: %s'%str(np.unique(movie_length.iloc[:, 1]).shape[0]))

# Bình quân một user rate tổng cộng 165 bộ phim.
# User thấp nhất rate 20 bộ phim và user nhiều nhất rate 2314 bộ phim.
# Khoảng số lượng bộ phim rating phổ biến của một user là từ 44 bộ tới 208 bộ phim (chiếm 50%).
print(movie_length['user_id'].value_counts().describe()) 

# #4
# import matplotlib.pyplot as plt 
# # %matplotlib inline
# movie_length[['user_id', 'item_id']].groupby(['user_id']).count().hist(bins = 20, figsize = (12, 8))
# plt.title('Distribution of no ratings by each customer')
# plt.xlabel('No ratings')
# plt.ylabel('No customers')
# plt.show()

# #5
# movie_length['item_id'].value_counts().describe()
# #6
# movie_length[['user_id','item_id']].groupby(['item_id']).count().hist(bins = 20, figsize = (12, 8))
# plt.title('Distribution of no ratings per each movie')
# plt.xlabel('No ratings')
# plt.ylabel('No movies')
# plt.show()

#7
# Chia bộ dữ liệu thành train và test
# shuffle hàm xáo trộn list  
# append là hàm nối list
split_rate = 2/3
def split_train_test(dataset):
    gb = dataset.groupby('user_id')
    ls = [gb.get_group(x) for x in gb.groups]
    items = [x for x in gb.groups]
    index_size = [ {'i': i,'index':gb.groups[i], 'size':len(gb.groups[i])} for i in items ]
    index_train = pd.Int64Index([])
    index_test = pd.Int64Index([])
    for x in index_size:
        np.random.shuffle(x['index'].values)
        le = int(x['size']*split_rate)
        index_train = index_train.append(x['index'][:le])
        index_test = index_test.append(x['index'][le:])
#iloc (dùng cho số) truy vấn giá trị của hàng thứ i / loc (dùng được cho số nguyên và các nhãn)
    train = dataset.iloc[index_train].values
    test = dataset.iloc[index_test].values

    train[:,0] -= 1
    train[:,1] -= 1
    test[:,0] -= 1
    test[:,1] -= 1
    return train , test

train , test = split_train_test(movie_length)
print('data_train:',train)
print('data_test:',test)

# 8 k là giá trị nhân tố ẩn phải tạo ngẫu nhiên 
n_users = np.max(train[:, 0] + 1)
n_items = np.max(train[:, 1] + 1)
n_ratings = train.shape[0]
print('N user dimesion: %s'%n_users)
print('M item dimesion: %s'%n_items)
print('S Number of rating: %s'%n_ratings)
K = 2
theta = 0.75
lamda = 0.2
I = np.random.randn(n_items, K)
U = np.random.randn(K, n_users)

#9
import scipy.sparse as sparse
#Rating matrix
Y = np.zeros(shape = (n_items, n_users))
print('Y utility matrix shape: %s'%str(Y.shape))
Y = sparse.coo_matrix((train[:, 2], (train[:, 1], train[:, 0])),shape = (n_items, n_users), dtype = np.float64).toarray()

#10 đánh dấu các vị trí được rating là 1 , chưa được rating là 0 
R = sparse.coo_matrix((np.ones((n_ratings,)), (train[:, 1], train[:, 0])),shape = (n_items, n_users)).toarray()

#11
#chuẩn hóa ma trận  Y về giá trị kì vọng bằng 0 bằng cách trừ đi mỗi giá trị rating trong vector rating của một user với trung bình của vector rating đó.
def  standardize_Y(Y):
    sum_rating = Y.sum(axis = 0)
    u_rating = np.count_nonzero(Y, axis= 0)
    u_mean = sum_rating/u_rating
    for n in range(n_users):
        for m in range(n_items):
            if Y[m,n] != 0:
                Y[m,n] -= u_mean[n]
    return Y,u_mean
Y_stad, u_mean = standardize_Y(Y)

#12
# Thuật toán gradient descent cho ma trận người dùng
def updateU(U):
    for n in range(n_users):
        i_rated = np.where(Y_stad[:, n]!=0)[0]
        In = I[i_rated,:]
        if In.shape[0] ==0:
            U[:,n] = 0 
        else:
            s=In.shape[0]
            u_n = U[:,n]
            y_n = Y_stad[i_rated, n]
            grad = -1/s * np.dot(In.T,(y_n-np.dot(In,u_n))) + lamda*u_n
            U[:,n] -= theta*grad
    return U
#13 
# Thuật toán gradient descent cho ma trận sản phẩm
def updateI(I): 
    for m in range(n_items):
        i_rated = np.where(Y_stad[m, :] != 0)[0]
        Um = U[:,i_rated]
        if Um.shape[1] == 0:
            I[m, :]=0
        else:
            s=Um.shape[1]
            i_m = I[m, :]
            y_m = Y_stad[m, i_rated]    
            grad = -1/s * np.dot(y_m - np.dot(i_m, Um),Um.T) + lamda *i_m 
            I[m, :] -= theta*grad 
    return I

#14
# xây dựng hàm dự báo cho ma trận Y
def pred(U,I):
    Y_hat = np.dot(I, U )
    for n in range(n_users):
        Y_hat[:, n] += u_mean[n]
    Y_hat = Y_hat.astype(np.int32)
    Y_hat[Y_hat >5] = 5
    Y_hat[Y_hat <1] = 1 
    return Y_hat
def pred_train_test(Y_hat,R):
    Y_pred = Y_hat.copy()
    Y_pred[R == 0] = 0 
    return Y_pred

#15
# xây dựng hàm loss function
def loss(Y,Y_hat):
    error = Y - Y_hat
    loss_value = 1/(2*n_ratings)*np.linalg.norm(error,'fro')**2 + lamda/2*(np.linalg.norm(I,'fro')**2 + np.linalg.norm(U,'fro')**2)
    return loss_value

#16 
# Sử dụng ma trận  Ŷ  để dự báo trên tập test
Y_test = sparse.coo_matrix((test[:,2],(test[:,1],test[:,0])),shape = (n_items,n_users), dtype = np.float64).toarray()
R_test = sparse.coo_matrix((np.ones(test.shape[0]),(test[:,1],test[:,0])),shape = (n_items,n_users), dtype= np.float64).toarray()

#17
# Xây dựng hàm tính RMSE
import math
def RMSE(Y_test,Y_pred):
    error = Y_test - Y_pred
    #shape[0] số dòng của ma trận 
    n_ratings = test.shape[0]
    rmse = math.sqrt(np.linalg.norm(error,'fro')**2/n_ratings)
    return rmse
#18
# xây dựng vòng lập tối ưu chính
def fit(Umatrix , Imatrix, Ytrain , Ytest , n_iter, log_iter):
    for i in range(n_iter):
        Umatrix = updateU(Umatrix)
        Imatrix = updateI(Imatrix)
        Y_hat = pred(Umatrix,Imatrix)
        Y_pred_train = pred_train_test(Y_hat, R)
        loss_value = loss(Ytrain,Y_pred_train)
        Y_pred_test = pred_train_test(Y_hat,R_test)
        rmse = RMSE(Ytest,Y_pred_test)
        if i %  log_iter == 0:
            print('Iteration: {} RMSE: {} loss value: {}'.format(i,rmse,loss_value))
    return Y_hat,Y_pred_test

#19 
# Class Data xử lý dữ liệu
class Data(object):
    def __init__(self, dataset, split_rate):
        self.dataset = dataset
        self.split_rate = split_rate
        self.train, self.test = self.split_train_test(self.dataset)
        self.n_users  = np.max (self.train[:,0]+1)
        self.n_items = np.max(self.train[:, 1] + 1)
        self.Ytrain, self.Rtrain = self.utility_matrix(self.train)
        self.Ytest , self.Rtest  = self.utility_matrix(self.test)
        self.Ystad,  self.u_mean = self.standardize_Y(self.Ytrain)
        self.n_ratings = self.train.shape[0]
    def split_train_test(self, dataset):
        "split train and test"
        gb = dataset.groupby('user_id')
        ls = [gb.get_group(x) for x in gb.groups]
        items = [x for x in gb.groups]
        index_size = [{'i': i, 'index':gb.groups[i], 'size':len(gb.groups[i])} for i in items]
        index_train = pd.Int64Index([])
        index_test = pd.Int64Index([])
        for x in index_size:
            np.random.shuffle(x['index'].values)
            le = int(x['size']*self.split_rate)
            index_train = index_train.append(x['index'][:le])
            index_test = index_test.append(x['index'][le:])
        train = dataset.iloc[index_train].values
        test = dataset.iloc[index_test].values
        #minus id to 1 to index start from 0
        train[:, 0] -= 1
        train[:, 1] -= 1
        test[:, 0] -= 1
        test[:, 1] -= 1
        return train, test
    
    def utility_matrix(self, data_mtx):
        "create Y and R matrix"
        Y = np.zeros(shape = (self.n_items, self.n_users))
        Y = sparse.coo_matrix((data_mtx[:, 2], (data_mtx[:, 1], data_mtx[:, 0])),shape = (self.n_items, self.n_users), dtype = np.float64).toarray()
        R = sparse.coo_matrix((np.ones((data_mtx.shape[0],)), (data_mtx[:, 1], data_mtx[:, 0])),shape = (self.n_items, self.n_users)).toarray()
        return Y, R
    
    def standardize_Y(self, Y):
        "standard data to mean ratings of each user = 0"
        sum_rating = Y.sum(axis = 0)
        u_rating = np.count_nonzero(Y, axis = 0)
        u_mean = sum_rating/u_rating
        for n in range(self.n_users):
            for m in range(self.n_items):
                if Y[m, n] != 0:
                    Y[m, n] -= u_mean[n]
        return Y, u_mean

#20
# Class model xây dựng và đánh giá model
class Model():
    def __init__(self, data, theta, lamda, K):
        self.data = data
        self.theta = theta
        self.lamda = lamda
        self.K = K
        self.I = np.random.randn(data.n_items, K)
        self.U = np.random.randn(K, data.n_users)

    def updateU(self):
        for n in range(self.data.n_users):
        # Matrix items include all items is rated by user n
            i_rated = np.where(self.data.Ystad[:, n] != 0)[0] #item's index rated by n
            In = self.I[i_rated, :]
            if In.shape[0] == 0:
                self.U[:, n] = 0
            else: 
                s = In.shape[0]
                u_n = self.U[:, n]
                y_n = self.data.Ystad[i_rated, n]
                grad = -1/s * np.dot(In.T,(y_n-np.dot(In, u_n))) + self.lamda*u_n
                self.U[:, n] -= self.theta*grad
    def updateI(self):
        for m in range(self.data.n_items):
        # Matrix users who rated into item m
            i_rated = np.where(self.data.Ystad[m, :] != 0)[0] #user's index rated into m
            Um = self.U[:, i_rated]
            if Um.shape[1] == 0: 
                self.I[m, :] = 0
            else:
                s = Um.shape[1]
                i_m = self.I[m, :]
                y_m = self.data.Ystad[m, i_rated]
                grad = -1/s * np.dot(y_m - np.dot(i_m, Um), Um.T) + self.lamda*i_m
                self.I[m, :] -= self.theta*grad
    
    def pred(self, I, U):
        #predict utility matrix base on formula Yhat = I.U
        Yhat = np.dot(I, U)
        #invert to forecast values by plus user's mean ratings
        for n in range(self.data.n_users):
            Yhat[:, n] += self.data.u_mean[n]
        #convert to interger values because of rating is integer
        Yhat = Yhat.astype(np.int32) 
        #replace values > 5 by 5 and values < 1 by 1
        Yhat[Yhat > 5] = 5
        Yhat[Yhat < 1] = 1
        return Yhat

    def pred_train_test(self, Yhat, R):
        #replace values have not yet rated by 0 
        Y_pred = Yhat.copy()
        Y_pred[R == 0] = 0
        return Y_pred
    
    def loss(self, Y, Yhat):
        error = Y-Yhat
        n_ratings = np.sum(Y != 0)
        loss_value = 1/(2*n_ratings)*np.linalg.norm(error, 'fro')**2 + self.lamda/2*(np.linalg.norm(self.I, 'fro')**2 + np.linalg.norm(self.U, 'fro')**2)
        return loss_value
    
    def RMSE(self, Y, Yhat):
        error = Y - Yhat
        n_ratings = np.sum(Y != 0)
        rmse = math.sqrt(np.linalg.norm(error, 'fro')**2/n_ratings)
        return rmse
#21
# Xây dựng class MF quản lý model và data
class MF():
    def __init__(self, data, model, n_iter, print_log_iter):
        self.data = data
        self.model = model
        self.n_iter = n_iter
        self.print_log_iter = print_log_iter
        self.Y_pred_train = None
        self.Y_pred_test = None
        self.Yhat = None
    def fit(self):
        for i in range(self.n_iter):
            #update U and I
            self.model.updateU()
            self.model.updateI()
            #calculate Y_hat
            self.Yhat = self.model.pred(self.model.I, self.model.U)
            #calculate Y_pred_train by replace non ratings by 0
            self.Y_pred_train = self.model.pred_train_test(self.Yhat, self.data.Rtrain)
            self.Y_pred_test  = self.model.pred_train_test(self.Yhat, self.data.Rtest)
            if i % self.print_log_iter == 0:
                print('Iteration: {}; RMSE: {}; Loss value: {}'.format(i, self.model.RMSE(self.data.Ytest, self.Y_pred_test),self.model.loss(self.data.Ytrain, self.Y_pred_train)))
                
    def recommend_for_user(self, user_id, k_neighbors):
        recm = np.concatenate((np.arange(1, self.Y_pred_test.shape[0]+1).reshape(-1, 1), self.Y_pred_test[:, user_id - 1].reshape(-1, 1)), axis = 1)
        recm.sort(axis = 0)
        print('Top %s item_id recommended to user_id %s: %s'%(k_neighbors, user_id, str(recm[-k_neighbors:, 0])))

#22
data = Data(dataset = movie_length, split_rate = 2/3)
model = Model(data = data, theta = 0.75, lamda = 0.1, K = 3)
mf = MF(data = data, model = model, n_iter = 100, print_log_iter = 10)
mf.fit()
#23
mf.recommend_for_user(user_id = 100, k_neighbors = 12)