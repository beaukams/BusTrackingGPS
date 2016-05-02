#! /usr/bin/python
#-*- coding:utf-8-*-

"""
Code du serveur base de donnees 
"""

PORT_SSMS = "/dev/ttyACM0" #port du shield

from threading import *
from config import *

class ServerBDD(Threading):
	def __init__(self):
		self.running = True

	def run(self):
		while self.running == True:
	
	def tostart(self):


	def tostop(self):

	
	def connect(self):
		"""connexion à la base de données"""

	def deconnect(self):
		"""deconnexion de la base de données"""

	def insert(self, table="", champs=[], values=[]):
		
	def select(self, table="", champs=[], conditions=[]):
		
