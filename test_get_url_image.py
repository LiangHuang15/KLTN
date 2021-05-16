# -*- coding: utf-8 -*-
import pandas as pd
import pymysql 
import csv 
from pandas import DataFrame
from GoogleImageScrapper import GoogleImageScraper
import os
# pd.set_option('display.max_rows',1000000)
# pd.set_option('display.max_columns',5)
conn =pymysql.connect(host="localhost",user="root",passwd="",database="movielens")
cursor = conn.cursor()
# num = pd.read_sql_query("select count(*) from movies",conn)
num = 41

list = pd.read_sql_query("select MovieID,Title from movies",conn)
print(list['MovieID'].values[1])
for i in range(37,num,1):
    try:
        webdriver_path = os.getcwd()+"/webdriver/chromedriver"
        image_path = os.getcwd()+"/photos"
        search_key = list['Title'].values[i]
        number_of_images= 1
        image_scrapper = GoogleImageScraper(webdriver_path,image_path,search_key,number_of_images)
        image_urls = image_scrapper.find_image_urls()
        print(image_urls)
        sql = "UPDATE movies SET url =%s WHERE MovieID =%s"
        cursor.execute(sql,(image_urls,list['MovieID'].values[i]))
    except:
        print('error load image')



# webdriver_path = os.getcwd()+"/webdriver/chromedriver"
# image_path = os.getcwd()+"/photos"
# search_key = 'Money Train (1995)'
# number_of_images= 1
# image_scrapper = GoogleImageScraper(webdriver_path,image_path,search_key,number_of_images)
# image_urls = image_scrapper.find_image_urls()
# print(image_urls)
# sql = "UPDATE movies SET url = %s WHERE MovieID =%s"
# cursor.execute(sql,(image_urls,20))


conn.commit()
# image_scrapper.save_images(image_urls)

