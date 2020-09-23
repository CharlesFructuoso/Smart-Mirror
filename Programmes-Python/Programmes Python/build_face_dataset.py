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

def facebook(nv_nom):
    
    nom=nv_nom
    newpath = r'dataset/'+nom
    if not os.path.exists(newpath):
        os.makedirs(newpath)

        #argument parser
        #ap = argparse.ArgumentParser()
        #ap.add_argument()
        #ap.add_argument("-c", "--cascade", required=True, help="path to reconnaisance directory")
        #args = vars(ap.parse_args())

        #OpenCV Haar cascade for face detection
        # path = ~/opencv-3.0.0/data/haarcascades/haarcascade_frontalface_default.xml
        detector=cv2.CascadeClassifier("opencv-3.0.0/data/haarcascades/haarcascade_frontalface_default.xml")
        #detector=cv2.CascadeClassifier(args['cascade'])


        print("lancement du stream")
        vs = VideoStream(usePiCamera=True).start()
        time.sleep(1.0)
        total=0

        list = os.listdir("dataset/"+nv_nom)
        file_count=len(list)
        
        #loop frames from video stream
        while True:
            
            while total<5:
                frame=vs.read()
                orig=frame.copy();
                frame=imutils.resize(frame, width=400)
                rects=detector.detectMultiScale(cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY),
                                                scaleFactor=1.1,
                                                minNeighbors=5,
                                                minSize=(30,30))

                for (x,y,w,h) in rects:
                    cv2.rectangle(frame, (x,y),(x+w,y+h),(237,127,16), 2)

                cv2.imshow("Ajout visage", frame)
                key=cv2.waitKey(1) & 0xFF
            
                p=os.path.sep.join(["dataset/"+nv_nom, "{}.png".format(str(total).zfill(5))])
                cv2.imwrite(p,orig)
                total+=1
                time.sleep(1.0)
                
            
            if total == 5:
                break

            # exit key 'q', stop loop
            elif key == ord("q"):
                break

        print ("{} face images stored".format(total))
        print("Cleaning up")
        cv2.destroyAllWindows()
        vs.stop()
