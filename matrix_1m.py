# -*- coding: utf-8 -*-
from matrix_factorization import BaselineModel, KernelMF, train_update_test_split
import pandas as pd 
from sklearn.metrics import mean_squared_error
from pandas import DataFrame
###########################################################################
# test send data from form to python


# from flask import Flask , render_template,url_for , redirect, request 
# import form
# import requests
# app = Flask(__name__)

# @app.route('/Applications/XAMPP/xamppfiles/htdocs/KLTN/matrix_1m.py', methods=['POST'])
# def form_data():
#     data = request.form['user_form']
#     print(data)

# if __name__ == "__main__": 
#     app.run(debug=True)

###########################################################################
# get data form login send to file data.json , read file data.json in python


import json
# data_form = open('./data.json',)
data_form = open('/Applications/XAMPP/xamppfiles/htdocs/KLTN/data.json',)
data_temp = json.load(data_form)
user = data_temp['user_form']
print('user_id login:',user)



pd.set_option('display.max_rows',1000000)
pd.set_option('display.max_columns',5)

# cols of u.data:   user id | item id | rating | timestamp. 
# import data movielen
cols = ["user_id", "item_id", "rating", "timestamp"]
# movie_data = pd.read_csv("ml-1m/ratings.dat",names=cols, sep="::", usecols=[0,1,2], engine="python")
movie_data = pd.read_csv("/Applications/XAMPP/xamppfiles/htdocs/KLTN/ml-1m/ratings.dat",names=cols, sep="::", usecols=[0,1,2], engine="python")
X = movie_data[["user_id", "item_id"]]
y = movie_data["rating"]
(
    X_train_initial,
    y_train_initial,
    X_train_update,
    y_train_update,
    X_test_update,
    y_test_update,
) = train_update_test_split(movie_data, frac_new_users=0.2)
# cách khác: X_train, X_test, y_train, y_test = train_test_split( X, y, test_size=0.33, random_state=42)

# print("X_train_initial:",X_train_initial)
# print df order by  user_id
df  = X_train_initial.sort_values(by=['user_id'])
df1  = X_test_update.sort_values(by=['user_id'])

# print(df)
print(df1)
# show number of rows 
number_of_rows_X_train  = len(X_train_initial.index)
number_of_rows_X_test = len (X_test_update.index)
# print(number_of_rows_X_train)
print('number_X_test :',number_of_rows_X_test)

matrix_fact = KernelMF(n_epochs=20, n_factors=100, verbose=1, lr=0.001, reg=0.005)

matrix_fact.fit(X_train_initial, y_train_initial)


# Update model with new users

print('matrix update users:')
matrix_fact.update_users(
    X_train_update, y_train_update, lr=0.001, n_epochs=20, verbose=1
)

pred = matrix_fact.predict(X_test_update)

rmse = mean_squared_error(y_test_update, pred, squared=False)
print(f"\nTest RMSE: {rmse:.4f}")

# user = 300
items_known = X_train_initial.query("user_id == @user")["item_id"]

print(matrix_fact.recommend(user=user, items_known=items_known))

output= matrix_fact.recommend(user=user, items_known=items_known)
print('output:',output)
name = ["movie_id", "movie_title","genres"]


# # data_items = pd.read_csv("ml-1m/movies.dat",names=name,sep='::', engine="python")


# data_items = pd.read_csv("/Applications/XAMPP/xamppfiles/htdocs/KLTN/ml-1m/movies.dat",names=name,sep='::', engine="python")


import pymysql 
conn =pymysql.connect(host="localhost",user="root",passwd="",database="movielens")
cursor = conn.cursor()
movies_table = pd.read_sql_query("select * from movies",conn)
data_items=movies_table[['MovieID','Title','Genres','url']]
# print('data_items:',data_items)
# print('data_items:',movies_table)



output_data = pd.merge(left=output,right=data_items,left_on='item_id',right_on='MovieID',how='inner')
print('output_data:',output_data)



output_cols =output_data[["user_id", "item_id","Title","Genres","url"]]
output_result = DataFrame(output_cols,columns=['user_id','item_id','Title','Genres','url'])
print(output_result)
output_result.to_json (r'/Applications/XAMPP/xamppfiles/htdocs/KLTN/output.json')