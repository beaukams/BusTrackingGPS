#! /usr/bin/python
#-*- coding:utf-8-*-

from threading import Threading
from serial import Serial
from time import *

"""
Code du serveur 
"""

PORT_SSMS = "/dev/ttyACM0" #port du shield


class SMSServer(Threading):
	def __init__(self, port="/dev/ttyACM0", baudrate=9600, timetoread=2)
		Threading.__init__(self)
		self.server = Serial(port=port, baudrate=baudrate
		self.dataInQueeud = False
		self.running = True
		self.timetoread = timetoread #periodicite de lecture du port
		self.datas = "" #les donnees lus
		self.dataToSend = ""  #les donneees à envoyer
		
	def run(self):
		"""lecture continue du port série. Lorsqu'il y'a quelque chose à lire, il lie puis envoie les donnees"""
		while self.running == True:
			while self.server.inWaiting() > 0:
				self.datas += self.server.readline()
			sleep(self.timetoread) #pause
			#envoie s'il y'a quelques a envoyer
			if self.dataToSend != "":
				self.server.write(self.dataToSend)
				self.server.flush()

	def recvdatas(self):
		res = self.datas
		self.datas = ""
		return res

	def senddatas(self, data = ""):
		self.dataToSend = data

	def toStop(self):
		self.server.close()
		self.running = False
