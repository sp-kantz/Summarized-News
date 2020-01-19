#store results in the database

import os, json, mysql.connector

dir_path = os.path.dirname(__file__)

#path to summaries directory
summaries = os.path.join(dir_path, '../../../files/working/summaries/')

file_list = os.listdir(summaries)

#connector
mydb = mysql.connector.connect(
    host = "localhost",
    user = "root",
    passwd = "",
    database = "summarizer"
)

cursor = mydb.cursor()

#for every json file
for file in file_list:
    
    #read the file
    with open(summaries + file) as file_read:
        data = json.load(file_read)
    file_read.close()

    #prepare statement for the summaries table
    sql = "INSERT INTO summaries (summary_id, summary_title, summary_LSA, summary_graph) VALUES (%s, %s, %s, %s)"
    #set values (summary id, title, and summaries)
    val = (data['summary_id'], data['summary_title'], data['summary_LSA'], data['summary_graph'])
    #exec
    cursor.execute(sql, val)
    #commit
    mydb.commit()

    #for every summary source
    for sources in data['summary_sources']:
        #prepare statement for the sources table
        sql = "INSERT INTO sources (summary_id, domain, url, title) VALUES (%s, %s, %s, %s)"
        #set values (summary id, source domain, url and title)
        val = (data['summary_id'], sources['domain'], sources['url'], sources['title'])
        #exec
        cursor.execute(sql, val)
        #commit
        mydb.commit()

#close connection
mydb.close()
