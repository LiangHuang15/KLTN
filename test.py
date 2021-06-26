# -*- coding: utf-8 -*-
# # numpy là thư viện của Python hỗ trợ tính toán mảng nhiều chiều 

# # axis = 0 là tính trên các cột, axis = 1 là tính trên các dòng.

import numpy as np
a = np.array([[7,7,7,7],[1,2,3,4],[1,4,2,6],[10,10,1,8],[2,3,4,6],[11,4,8,4],[4,4,4,3]])
print(a)
b = a[[1,2,3],1].tolist()
print(b)
print(a[:,0])
# # max lấy giá trị lớn nhất trong ma trận

# # print(int(np.max(a))+1)

# # max + axis  lấy giá trị lơn nhất với mỗi cột trong ma trận

# # print(np.max(a,axis= 0))

# # b = np.random.rand(5,3)
# # print(b)
# #  lấy giá trị ứng với sốt cột => [ : , 0 ]  [ first_row:last_row , column_0 ]

# # print(b[:,0])
# # print(b[:,2])


# # Y has n rows and m columns, then Y.shape is (n,m). So Y.shape[0] is n

# # print(b.shape)
# # print(b.shape[0])


# # trả về ma trận 

# # c = np.zeros([2,2],dtype=[('x','float'),('y','int')])
# # print(c)

# # tính giá trị giữa 

# # array = np.array([[1,2,3],[2,2,2],[1,3,5],[2,2,2]])
# # print(array)
# # mean = np.mean(array)
# # print(mean)
# # print(np.mean(array,axis=0))
# # print(np.mean(array,axis=1))


# # tạo mảng với cấp só cộng 

# # print(np.arange(3))
# # print(np.arange(2,10))
# # print(np.arange(2,10,0.1))


# #  Norm là tổng trị tuyệt đối của phần tử vector đó ||X||1

# # tích vô hướng của 2 vectơ
# # m1 = np.array([[1,2],[3,4]])
# # m2 = np.array([[2,3],[3,3]])
# # print(np.dot(m1,m2))

# # reshape thay đổi số côt và hàng của ma trận một chiều 
# # m3 = np.arange(12)
# # print(m3)
# # m4 = m3.reshape(4,3)
# # print(m4)



# # append : nối 2 ma trận lại.


# # test recommend of matrix



# from matrix_factorization import BaselineModel, KernelMF, train_update_test_split
# import pandas as pd 
# from sklearn.metrics import mean_squared_error
# from pandas import DataFrame

# # pd.set_option('display.max_rows',100000)
# # cols of u.data:   user id | item id | rating | timestamp. 
# # import data movielen
# cols = ["user_id", "item_id", "rating", "timestamp"]
# movie_data = pd.read_csv("ml-100k/u.data",names=cols, sep="\t", usecols=[0,1,2], engine="python")
# X = movie_data[["user_id", "item_id"]]
# y = movie_data["rating"]

# (
#     X_train_initial,
#     y_train_initial,
#     X_train_update,
#     y_train_update,
#     X_test_update,
#     y_test_update,
# ) = train_update_test_split(movie_data, frac_new_users=0.2)
# # cách khác: X_train, X_test, y_train, y_test = train_test_split( X, y, test_size=0.33, random_state=42)

# # print("X_train_initial:",X_train_initial)
# # print df order by  user_id
# df  = X_train_initial.sort_values(by=['user_id'])
# df1  = X_test_update.sort_values(by=['user_id'])

# # print(df)
# print(df1)
# # show number of rows 
# number_of_rows_X_train  = len(X_train_initial.index)
# number_of_rows_X_test = len (X_test_update.index)
# # print(number_of_rows_X_train)
# print('number_X_test :',number_of_rows_X_test)

# matrix_fact = KernelMF(n_epochs=20, n_factors=100, verbose=1, lr=0.001, reg=0.005)

# matrix_fact.fit(X_train_initial, y_train_initial)

# # Update model with new users

# print('matrix update users:')
# matrix_fact.update_users(
#     X_train_update, y_train_update, lr=0.001, n_epochs=20, verbose=1
# )

# pred = matrix_fact.predict(X_test_update)


# rmse = mean_squared_error(y_test_update, pred, squared=False)
# print(f"\nTest RMSE: {rmse:.4f}")

# user = 300
# items_known = X_train_initial.query("user_id == @user")["item_id"]

# print(matrix_fact.recommend(user=user, items_known=items_known))


# output= matrix_fact.recommend(user=user, items_known=items_known)
# # print('output:',output)
# data_items = pd.read_csv("ml-100k/u.item",names=cols,sep='|', engine="python")
# data_top= data_items.head()
# print('data_items:',data_top)
# # print('head data:',data_items['movie_title'])
# # output_data = pd.merge(left=output,right=data_items,left_on='item_id',right_on='movie_id',how='inner')


# # print('output_data:',output_data)
# # output_cols =output[["user_id", "item_id"]]
# # output_result = DataFrame(output_cols,columns=['user_id','item_id'])
# # output_result.to_json (r'/Applications/XAMPP/xamppfiles/htdocs/recommender_system/output.json')

# def function1():
#     print ('deloy function1')
#     i = 5
#     return i 
# def function2():
#     print ('deloy function2')
#     i = 6
#     return i 
# def function3():
#     print ('deloy function3')
#     i = 7 
#     return i 
# def main():
#     i = function2()
#     a = function1()
#     b = function3()
# if __name__ ==  "__main__":
#     main()

# -*- coding: utf-8 -*-
# import pandas as pd
# import pymysql 
# import csv 
# from pandas import DataFrame
# from GoogleImageScrapper import GoogleImageScraper
# import os
# # pd.set_option('display.max_rows',1000000)
# # pd.set_option('display.max_columns',5)
# conn =pymysql.connect(host="localhost",user="root",passwd="",database="movielens")
# cursor = conn.cursor()
# list = pd.read_sql_query("select MovieID,Title from movies",conn)
# webdriver_path = os.getcwd()+"/webdriver/chromedriver"
# i = 90
# image_path = os.getcwd()+"/photos"
# search_key = list['Title'].values[i]
# number_of_images= 1
# image_scrapper = GoogleImageScraper(webdriver_path,image_path,search_key,number_of_images)
# image_urls = image_scrapper.find_image_urls()

# print(image_urls)
# sql = "UPDATE movies SET url =%s WHERE MovieID = %s"
# cursor.execute(sql,(image_urls,list['MovieID'].values[i]))



# conn.commit()