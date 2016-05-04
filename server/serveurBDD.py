#! /usr/bin/python
#-*- coding:utf-8-*-

"""
Code du serveur base de donnees 
"""

PORT_SSMS = "/dev/ttyACM0" #port du shield

from threading import *
from config import *
import mysql.connector 

class BDD(Thread):
	def __init__(self):
		self.connect() 

	def run(self):
		while self.running == True:
			a=0	
	def tostart(self):
		""""""

	def tostop(self):
		""""""

	
	def connect(self):
		"""connexion à la base de données"""
		try:
			self.conn = mysql.connector.connect(host=BASEHOST, user=BASEUSER, password=BASEPWD, database=BASENAME)
			self.cursor = self.conn.cursor()
			self.running = True
			

		except Exception:

			self.running = False


	def deconnect(self):
		"""deconnexion de la base de données"""

	def select(self, req=""""""):
		"""selectionner une requete"""
		if self.running == True:
			self.cursor.execute(req)
			rows = self.cursor.fetchall()
			return rows
		else:
			return []
		
	def insert(self, req=""""""):
		"""executer une requete"""
		if self.running == True:
			self.cursor.execute(req)

	def update(self, req=""""""):
		"""executer une requete"""
		if self.running == True:
			self.cursor.execute(req)

	def execute(self, req=""""""):
		"""executer une requete"""
		if self.running == True:
			self.cursor.execute(req)
		
		
