# secure-coding

## Azpiegitura

- git
- github / gitlab
- visualcode / atom
LAMP:
- linux: 
```
add-apt-repository ppa:ondrej/php
sudo apt install php7.3 libapache2-mod-php7.3 php-mysql
```
Visual Studio Code Remote Development through SSH:
- https://www.youtube.com/watch?v=lKXMyln_5q4

vscode install extension: Visual Studio Code Remote Development Extension Pack

ssh giltza sortu (windows-en / bezeroan):
```
ssh-keygen -t rsa -b 4096 -f %USERPROFILE%/.ssh/remote_ubuntu_rsa

scp -P 22 %USERPROFILE%/.ssh/remote_ubuntu_rsa.pub user@IP_REMOTE_MACHINE:~/key.pub
```

zerbitzarian - Ubuntu:
```
mkdir ~/.ssh
cat ~/key.pub >> ~/.ssh/authorized_keys
chmod 600 ~/.ssh/authorized_keys
rm ~/key.pub
```

pasahitza EZ jarri!!



- windows: xampp, laragon, 

## OWASP

- https://www.owasp.org

### OWASP Top 10:

- https://www.owasp.org/index.php/Category:OWASP_Top_Ten_2017_Project
- https://www.owasp.org/images/7/72/OWASP_Top_10-2017_%28en%29.pdf.pdf


## Garatuko ditugun Aplikazioak

Aplikazioa garatzeko erabili daitezkeen teknologiak: 

- HTML, JS, PHP, Python, Java, C#, .NET, ... 
- MySQL, MariaDB, ..., NoSQL mongodb, ...
- Laravel, Composer, ..., Django, Flask, ..., Spring, ...
- WEB aplikazioa, Mugikorrentzako app natiboak, ...
