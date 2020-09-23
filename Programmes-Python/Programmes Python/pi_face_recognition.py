from test_bdd import *

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

def reconnaissance():
    print("Loading encodings + face detector")
    data = pickle.loads(open("encodings.pickle", "rb").read())
    detector=cv2.CascadeClassifier("opencv-3.0.0/data/haarcascades/haarcascade_frontalface_default.xml")

    print("Starting video stream")
    vs=VideoStream(usePiCamera=True).start()
    time.sleep(1.0)
    fps=FPS().start()
    reconnu=0
    inconnu=0
    vide=0
    #compte le nombre d'utilisateurs enregistrés
    list = os.listdir("dataset")
    file_count=len(list)
    personne=[]
    frame_prev=vs.read()
    frame_prev=imutils.resize(frame_prev, width=500)

    while True:
        frame=vs.read()
        frame=imutils.resize(frame, width=500)
        
        gray=cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
        rgb=cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
        
        rects=detector.detectMultiScale(gray, scaleFactor=1.1,
                                        minNeighbors=5,
                                        minSize=(30,30))
        
        boxes = [(y,x+w,y+h,x)for (x,y,w,h) in rects]
        
        encodings=face_recognition.face_encodings(rgb, boxes)
        names=[]
        
        for encoding in encodings:
            matches=face_recognition.compare_faces(data["encodings"],encoding)
            name="Unknown"
            
            if True in matches:
                matchedIdxs=[i for (i,b) in enumerate(matches) if b]
                counts={}
                
                for i in matchedIdxs:
                    name = data["names"][i]
                    counts[name]=counts.get(name,0)+1
                    
                name = max(counts, key=counts.get)
                
            names.append(name)
            
        for((top,right,bottom,left),name) in zip(boxes, names):
            cv2.rectangle(frame,(left,top),(right,bottom),(237,127,16),2)
            y=top-15 if top-15>15 else top+15
            cv2.putText(frame,name,(left,y),cv2.FONT_HERSHEY_SIMPLEX,0.75,(237,127,16),2)
            
            for i in range (0,file_count):
                if name == os.listdir('dataset')[i]:
                    #print(os.listdir('dataset')[i])
                    personne.append(os.listdir('dataset')[i])
                    reconnu+=1

            if name == "Unknown":
                inconnu+=1
        
        if frame.all() == frame_prev.all():
            vide+=1
        frame_prev=frame;
        
        cv2.imshow("Reconnaissance faciale",frame)
        key=cv2.waitKey(1) & 0xFF
            
            
        # exit key 'q', stop loop
        if key == ord("q"):
            break
        
        if reconnu == 9:
            populaire = collections.Counter(personne).most_common(1)
            populaire=[x[0] for x in populaire]
            break
        
        if inconnu == 9:
            break
        
        if vide == 50:
            break
        
        fps.update()
            
    fps.stop()
    #print("elasped time: {: .2f}".format(fps.elapsed()))
    #print("Approximative FPS: {: .2f}".format(fps.fps()))

    cv2.destroyAllWindows()
    vs.stop()

    if reconnu == 9:
        print("Bonjour ",populaire)
        return (populaire,lien_bdd(populaire))
    
    if inconnu == 9 or vide == 50:
        return ("","")
