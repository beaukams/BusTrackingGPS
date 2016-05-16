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

precision_gps = 10 # precision du GPS: 10m

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

def getAreaParameters(distance_ref):
	"""retourne la latitude et la longitude minimale à ajouter à un point pour avoir la distance donné
	On prend un point de reference (latitude, longitude). On cherche la latitude a ajouter pour avoir un point de même longitude situé à distance distance_ref.
	Puis on cherche, la longitude à ajouter pour avoir un point de même latitude à une distance distance_ref
	""":
	lat_ref = 14.432479
	lng_ref = 17.273171
	delta_lat = 0
	delta_lng = 0
	precision = 0.00001
	temp = 0
	while 1:
		delta_lat += precision
		temp = distance(lat_ref, lng_ref, lat_ref+delta_lat, lng_ref)
		if temp >= distance_ref:
			break

	while 1:
		delta_lng += precision
		temp = distance(lat_ref, lng_ref, lat_ref, lng_ref+delta_lng)
		if temp >= distance_ref:
			break

	return delta_lat, delta_lng

def getArretParameters(nom_arret, bdd_handle):
	"""parametres de localisation d'un arret"""
	req = "SELECT * FROM arret WHERE nom_arret = %s" %(nom_arret)
	res = bdd_handle.select(req)
	if len(res) == 1:
		res = res[0]
		return res[0], res[1], res[2], res[3]
	else:
		return []



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

class Bus:
	"""
	la représentation du Bus

	"""
	def __init__(self, matricule):
		self.matricule = matricule
		self.bdd = BDD()

	def giveCurrentPosition(self):
		""""""

	def updateCurrentPosition(self):
		""""""

	def getParameters(self):
		"""donne les parametres du bus: ligne, position courante"""
		req = """SELECT * FROM bus WHERE matricule_bus=%s""" %(self.matricule)
		
		res = self.bdd.select(req)
		if len(res) == 1: #un seul bus: bon résultat
			param = res[0]
			self.id = param[0]
			self.ligne = param[2]
			self.position_courante = param[3]
			self.sens = param[4]

	def getDynamicParameters(self):
		"""les parametres dynamiques du bus"""
		if self.position_courante != "":
			req = """SELECT * FROM positionBus WHERE id_positionBus=%s""" %(self.position_courante)
			res = self.bdd.select(req)
			if len(res) == 1: #une seule position: bon résultat
				param = res[0]
				self.latitude = param[2]
				self.longitude = param[3]
				self.altitude = param[4]
				self.vitesse = param[5]
				self.date = param[6]
				self.heure = param[7]

	def getLigneParameters(self):
		"""les parametres de la ligne du bus"""
		if self.ligne != "":
			req = """SELECT * FROM ligneBus WHERE nom_ligne=%s""" %(self.ligne)
			res = self.bdd.select(req)
			if len(res) == 1: 
				param = res[0]
				self.ligne_terminus1 = param[2]
				self.ligne_terminus2 = param[3]

	def isInTerminus(self):
		"""verifier si le bus est dans un terminus: retourne sens"""
		lat_terminus1, lng_terminus1 = getArretParameters(self.ligne_terminus1)
		lat_terminus2, lng_terminus2 = getArretParameters(self.ligne_terminus2)

		if distance(self.latitude, self.longitude, lat_terminus1, lng_terminus1) <= precision_gps:
			return True, self.ligne_terminus1
		elif distance(self.latitude, self.longitude, lat_terminus2, lng_terminus2) <= precision_gps:
			return True, self.ligne_terminus2
		else:
			return False, ""

	def getSens(self):
		"""donner le sens du bus"""
		est_term, term = self.isInTerminus() 
		if est_term == True: #le bus est dans un terminus
			self.sens = term if term != self.sens else self.sens = self.sens

	def getAllArrets(self):
		"""
		Selectionne l'ensemble ds arrets sur la ligne du bus dans la zone définie.
		L'objectif est de définir une zone à autour de la position du bus et sur la ligne (trajet normal) du bus. Ensuite on selectionne l'ensemble des arrets dans la zone définie. S'il 
		*Si on obtient 3 zones ou plus, alors on diminue la zone, alors on dimine la zone puis on recalcule la zone.
		*si on obtient deux zones, alors l'algorithme se finit.
		*si on trouve 1 zone ou pas de zone, alors on augmente la zone de recherche puis on se retrouve dans le premier cas.
		"""

		req = """SELECT * FROM arret WHERE latitude_arret<=%s AND latitude_arret>=%s AND longitude_arret<=%s AND longitude_arret>=%s""" %(self.centre.getLatitude()+self.longueur, \
			self.centre.getLatitude()-self.longueur, self.centre.getLongitude()+self.largeur, self.centre.getLongitude()-self.largeur)
		bdd = BDD()
		return bdd.select(req)

	def defineZone(self):
		req = """SELECT * FROM arret WHERE"""

class Ligne:
	def __init__(self):
		"""La classe ligne"""

class Position:
	def __init__(self):
		"""
			la classe position
		"""



		

class ServeurBTG(Thread):
	def __init__(self):
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