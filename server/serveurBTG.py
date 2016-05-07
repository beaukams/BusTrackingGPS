#! /usr/bin/python
#-*- coding:utf-8-*-

"""
Code du serveur 
"""

PORT_SSMS = "/dev/ttyACM0" #port du shield

from threading import *
from math import *
from serveurSMS import *
from serveurBDD import *



def distance(lat1, lng1, lat2, lng2):
		"""la distance entre deux points gps"""
		delta = radians(lng1-lng2)
		sdlong = sin(delta)
		cdlong = cos(delta)
		lat1 = radians(lat1) 
		lat2 = radians(lat2)
		slat1 = sin(lat1)
		clat1 = cos(lat1)
		slat2 = sin(lat2)
		clat2 = cos(lat2)
		delta = (clat1 * slat2) - (slat1 * clat2 * cdlong)
		delta = pow(delta, 2)
		delta += pow(clat2*sdlong, 2)
		delta = sqrt(delta)
		denom = (slat1 * slat2) + (clat1 * clat2 * cdlong)
		delta = atan2(delta, denom)
		return delta * 6372795

def localize(lat, lng):
		"""localisation entre deux arrets"""
		dlng = 0.0025
		dlat = 0.0025
		seuil = distance(lat, lng, lat+dlat, lng+dlng)

		centre = GPSCoords(lat, lng)
		zone = GPSZone(centre=centre, dlong = dlat, dlarg=dlng)
		#p = GPSCoords(lat+0.0001, lng+0.0012)
		#print zone.contains(p)
		print "distance ->",seuil,"m \n"
		centre.toprint()
		zone.getLastNextArrets()

def course(lat1, lng1, lat2, lng2):
	"""determine la direction en degré entre deux points gps"""
	dlon = radians(lng2-lng1);
	lat1 = radians(lat1);
	lat2 = radians(lat2);
	a1 = sin(dlon) * cos(lat2);
	a2 = sin(lat1) * cos(lat2) * cos(dlon);
	a2 = cos(lat1) * sin(lat2) - a2;
	a2 = atan2(a1, a2);
	if a2 < 0.0:
		a2 += 2*pi;
  	return degrees(a2);



class GPSCoords:
	"""Un point GPS"""
	def __init__(self, lat=0.0, lng=0.0, alt=0.0):
		self.lat = lat
		self.lng = lng
		self.alt = alt
	def getLatitude(self):
		return self.lat

	def getLongitude(self):
		return self.lng

	def getAltitude(self):
		return self.alt
	def toprint(self):
		print "latitude:%s, longitude:%s,altitude:%s\n" %(self.lat, self.lng, self.alt)

class GPSZone:
	"""delimitation d'un rectangle"""
	def __init__(self, centre, dlong=0.0, dlarg=0.0):
		"""
		dlong: distance en latitude a ajouter
		dlarg: distance en longitude a ajouter
		"""
		"""self.P1 = GPSCoords(centre.getLatitude()+dlong, centre.getLongitude()+dlarg)
		self.P2 = GPSCoords(centre.getLatitude()+dlong, centre.getLongitude()-dlarg)
		self.P3 = GPSCoords(centre.getLatitude()-dlong, centre.getLongitude()-dlarg)
		self.P4 = GPSCoords(centre.getLatitude()-dlong, centre.getLongitude()+dlarg)"""
		self.centre = centre
		self.longueur = dlong
		self.largeur = dlarg

	def contains(self, pointGPS):
		"""verifier si un point GPS appartient au zone spécifié"""
		if pointGPS.getLatitude() <= self.centre.getLatitude()+self.longueur and pointGPS.getLatitude() >= self.centre.getLatitude()-self.longueur and pointGPS.getLongitude() <= self.centre.getLongitude()+self.largeur and pointGPS.getLongitude() >= self.centre.getLongitude()-self.largeur:
			return True
		else:
			return False

	def getAllArrets(self):
		"""determiner l'ensemble des arrêts dans la zone"""
		req = """SELECT * FROM arret WHERE latitude_arret<=%s AND latitude_arret>=%s AND longitude_arret<=%s AND longitude_arret>=%s""" %(self.centre.getLatitude()+self.longueur, \
			self.centre.getLatitude()-self.longueur, self.centre.getLongitude()+self.largeur, self.centre.getLongitude()-self.largeur)
		bdd = BDD()
		return bdd.select(req)

	def getLastNextArrets(self):
		"""selectionner les deux arrets bus encadrant le bus"""
		arrets = self.getAllArrets()
		print arrets
		#




		

class ServeurBTG(Thread):
	def __init__(self, ):
		#self.serialServer = SerialServer()
		self.bdd = BDD() #la base de donnees
		self.running = True

	def run(self):
		while self.running == True:
			""""""
			
#def tostart(self):


#	def tostop(self):

	
		
	

if __name__ == "__main__":
	#a = ServeurBTG()
	localize(14.432479, -17.273171)