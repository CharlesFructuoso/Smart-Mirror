# -*- coding: utf-8 -*-
from test_bdd import * #accès BDD
from pi_face_recognition import * #reconnaissance faciale
from build_face_dataset import * #prise de photos utilisateurs
from encode_faces import * #vectorisation des visages stockés
from replace import * #mise à jour des modules

from imutils.video import VideoStream
from imutils.video import FPS
from imutils import paths

import face_recognition
import argparse
import imutils
import pickle
import time
import cv2
import os
import collections
import socket
import time
import MySQLdb

nb_lignes_initial=nb_lignes() #compte le nb de lignes à l'intsant t=0
print(nb_lignes_initial)
tt_modules='"calendar","newsfeed","MMM-3Day-Forecast","weatherforecast","clock","compliments"'
replace(tt_modules,'""')

while True:
    time.sleep(30); #patiente 30 secondes
    nb_lignes_plus=nb_lignes() #on compte le nombre de ligne dans la BDD
    print (nb_lignes_plus)
    
    if nb_lignes_plus>nb_lignes_initial:
        nv_nom=nouveau_nom()
        facebook(nv_nom) #capture de 20 images du nouvel utilisateur 
        vectorisation() #vectorisation de tout les visages de la BDD dataset
        nb_lignes_initial=nb_lignes_plus #on incrémente le compteur de ligne pour éviter d'ajouter une nouvelle personne à chasue tour de boucle
        
    else:
        nom, liens = reconnaissance() #on récupère le nom et le lien d'agenda de l'utilisateur reconnu
        if nom != "": 
            val_utilisateur = info_bdd(nom) #on récupère les infos de la BDD coresspondant à l'utilisateur nommé "nom"
            replace(val_utilisateur,liens) #on règle les modules qui doivent être affichés selon la BDD
            #lancement du miroir avec les paramètres utilisateurs
            time.sleep(30) #affiche les infos pdt 30 secondes
            replace(tt_modules,'""')
            
        else:
            #rien
            #miroir avec aucun module, écran noir
            replace(tt_modules,'""')