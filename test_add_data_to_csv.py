# -*- coding: utf-8 -*-
from __future__ import unicode_literals
from csv import writer
def append_list_as_row(file_name,list_of_elem,lineterminator='\n'):
    with open(file_name,'a+',newline='') as write_obj:
        csv_writer = writer(write_obj,delimiter='::')
        csv_writer.writerow(list_of_elem)
    
row_contents = [6,"Toy Story (1995)","Animation|Children's|Comedy"]
append_list_as_row('/Applications/XAMPP/xamppfiles/htdocs/KLTN/ml-1m/movies_adddata.dat ', row_contents)
