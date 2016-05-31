#! /usr/bin/python
#-*-coding:utf-8-*-

import mysql.connector 

conn = mysql.connector.connect(host="localhost",user="abdoulaye",password="kamstelecom", database="BusTrackingGPS")
cursor = conn.cursor()

#requete select
cursor.execute("""SELECT idArret,nomArret,latitudeArret,longitudeArret FROM arretBus""")
rows = cursor.fetchall()
for row in rows:
	print row
conn.close()
