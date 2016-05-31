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
			self.cursor.execute((req))
			self.conn.commit()

	def update(self, req=""""""):
		"""executer une requete"""
		if self.running == True:
			self.cursor.execute(req)
			self.conn.commit()

	def execute(self, req=""""""):
		"""executer une requete"""
		self.cursor.execute(req)

	def getIdArret(self, nom_arret):
		"""retourne l'arret correspondant au nom de l'arret"""
		res = self.select("""SELECT id_arret FROM arret WHERE nom_arret=%s""" %(nom_arret))
		if len(res) == 1:
			return res[0]
		else:
			return -1
	def getIdLigne(self, nom_ligne):
		"""retourne l'identifiant correspondant au nom de la ligne"""
		res = self.select("""SELECT id_ligne FROM ligne WHERE nom_ligne=%s""" %(nom_ligne))
		if len(res) == 1:
			return res[0]
		else:
			return -1

	def getIdBus(self, matricule):
		"""retourne l'arret correspondant au nom de l'arret"""
		res = """SELECT id_bus FROM bus WHERE matricule_bus='%s'""" %matricule
		res = self.select(res)

		if len(res) == 1:
			return res[0][0]
		else:
			return -1
	def getArretParameters(self, nom_arret = "", id_arret = ""):
		"""parametres de localisation d'un arret"""
		if nom_arret != "":
			req = "SELECT * FROM arret WHERE nom_arret = %s" %(nom_arret)
		else:
			req = "SELECT * FROM arret WHERE id_arret = %s" %(id_arret)
		res = self.select(req)
		if len(res) == 1:
			res = res[0]
			return res[0], res[1], res[2], res[3]
		else:
			return -1,-1,-1,-1

	def getArretsLigne(self, nom_ligne, sens='A'):
		id_ligne = self.getIdLigne(nom_ligne)
		res = self.select("""SELECT * FROM arretLigne WHERE id_ligne=%s AND sens=%s""" %(id_ligne, sens))
		return res

	def getSMSRecu(self):
		"""recuperer un sms recu non traité"""
		res = self.select("""SELECT * FROM smsRecv  WHERE archive="N" """)
		if len(res) >= 1:
			return res[0]
		else:
			return []


