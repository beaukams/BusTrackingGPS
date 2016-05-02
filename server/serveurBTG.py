#! /usr/bin/python
#-*- coding:utf-8-*-

"""
Code du serveur 
"""

PORT_SSMS = "/dev/ttyACM0" #port du shield

from threading import *
from math import *


class ServerBGP(Threading):
	def __init__(self, ):
		
	self.running = True

	def run(self):
		while self.running == True:
	
	def tostart(self):


	def tostop(self):

	def localize(self, lng, lat):
		
	def distance(self, lat1, lat2, lng1, lng2):
		"""la distance entre deux points gps"""
		delta = radians(lng1-lng2);
		sdlong = sin(delta);
		cdlong = cos(delta);
		lat1 = radians(lat1); 
		lat2 = radians(lat2);
		slat1 = sin(lat1);
		clat1 = cos(lat1);
		slat2 = sin(lat2);
		clat2 = cos(lat2);
		delta = (clat1 * slat2) - (slat1 * clat2 * cdlong);
		delta = sq(delta);
		delta += sq(clat2 * sdlong);
		delta = sqrt(delta);
		denom = (slat1 * slat2) + (clat1 * clat2 * cdlong);
		delta = atan2(delta, denom);
		return delta * 6372795;