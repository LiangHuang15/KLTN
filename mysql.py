# -*- coding: utf-8 -*-
import pandas as pd
import pymysql 
import csv 
from pandas import DataFrame
# pd.set_option('display.max_rows',1000000)
# pd.set_option('display.max_columns',5)
conn =pymysql.connect(host="localhost",user="root",passwd="",database="movielens")
cursor = conn.cursor()
movies_table = pd.read_sql_query("select * from movies",conn)
ratings_table = pd.read_sql_query("select * from ratings",conn)
print(movies_table)