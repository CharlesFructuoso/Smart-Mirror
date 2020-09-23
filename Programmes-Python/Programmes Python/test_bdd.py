# -*- coding: utf-8 -*-
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

def info_bdd(populaire):
    
    db = MySQLdb.connect("localhost", "raspberry", "pi", "user_mirror")
    cursor = db.cursor()

    query="""SELECT * FROM user WHERE name = %s"""
    lines = cursor.execute(query, [populaire])
    while True:
        row = cursor.fetchone()
        if row == None : break
        
        agenda=row[3]
        if agenda == 0:
            agenda = '"calendar"'
        else:
            agenda = '""'
            
        news=row[4]
        if news == 0:
            news = '"newsfeed"'
        else:
            news = '""'
            
        weather=row[5]
        if weather == 0:
            weather = '"MMM-3Day-Forecast","weatherforecast"'
        else:
            weather = '""'
            
        clock=row[6]
        if clock == 0:
            clock = '"clock"'
        else:
            clock = '""'
            
        compliments=row[7]
        if compliments == 0:
            compliments = '"compliments"'
        else:
            compliments = '""'
            
    db.close()
    val_utilisateur = agenda + "," + news + "," + weather + "," + clock + "," + compliments
    return val_utilisateur

def lien_bdd(populaire):
    
    db = MySQLdb.connect("localhost", "raspberry", "pi", "user_mirror")
    cursor = db.cursor()

    query="""SELECT * FROM user WHERE name = %s"""
    lines = cursor.execute(query, [populaire])
    while True:
        row = cursor.fetchone()
        if row == None : break
        liens='"'+row[2]+'"'
    db.close()
    return liens
    
#calcul nombre de lignes BDD
def nb_lignes():
    db = MySQLdb.connect("localhost", "raspberry", "pi", "user_mirror")
    cursor = db.cursor()
    query="""SELECT COUNT(*) FROM user"""
    lines = cursor.execute(query)
    while True:
        row = cursor.fetchone()
        if row == None : break
        nb = row[0]
    db.close()
    return nb

#obtient le dernier nom de la BDD, celui ajouté
def nouveau_nom():
    db = MySQLdb.connect("localhost", "raspberry", "pi", "user_mirror")
    cursor = db.cursor()
    query="""SELECT name FROM user ORDER BY id DESC LIMIT 1"""
    lines = cursor.execute(query)
    while True:
        row = cursor.fetchone()
        if row == None : break
        nom=row[0]
    db.close()
    return nom