# WEB secure-coding

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

## Tresnak

- http://www.dvwa.co.uk/
- https://portswigger.net/burp
- https://support.portswigger.net/customer/portal/articles/1783055-configuring-your-browser-to-work-with-burp

## Azpiegitura

- git
- github / gitlab
- visualcode / atom


LAMP:
- linux: 
```
# Datu basea
# jarraitu ondorengo gida:
# https://www.digitalocean.com/community/tutorials/how-to-install-mariadb-on-debian-10
# hau ere: https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-18-04

sudo apt install mariadb-server
sudo mysql_secure_installation
(root pasahitza ez ezarri)

# db-ko erabiltzaile bat sortu (admin:password)
sudo mysql
GRANT ALL ON *.* TO 'admin'@'localhost' IDENTIFIED BY 'password' WITH GRANT OPTION;
FLUSH PRIVILEGES;
exit

mysql -u koxme -p
MariaDB [(none)]> ...
# https://mariadb.com/kb/en/library/documentation/

# PHP apache
sudo add-apt-repository ppa:ondrej/php
sudo apt install php7.3 libapache2-mod-php7.3 php-mysql

# git clone repo eta apache konfigurazioa
cd ~
git clone <git repo url>
cd /var/www/html/
sudo ln -s ~/reponame secure-coding

http://IP/secure-coding
```

- windows: xampp, laragon, 

## Apache error log

```$ tail -f /var/log/apache2/error.log```

## PHP composer

https://getcomposer.org/

```
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

## PHP Debuger

- https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug

### Visual Studio Code Remote Development through SSH:
- https://code.visualstudio.com/docs/remote/ssh
- https://code.visualstudio.com/docs/remote/troubleshooting#_ssh-tips
- https://www.youtube.com/watch?v=lKXMyln_5q4

vscode install extension: Visual Studio Code Remote Development Extension Pack

#### AWS erabiliz

makina bat jarri EC2n ubuntu server. Ondoren ```*.pem``` giltza erabili daiteke. horretarako visual code-n F1 sakatu eta ssh ```open configuration file``` aukeratu eta ```.ssh/config``` ondoren. Fitxategian hau jarri:
```
Host uni.aws
    HostName ec2-XXXXXXX.us-east-2.compute.amazonaws.com
    User ubuntu
    IdentityFile /home/user/.../AWS/key_name.pem
```
ondoren F1 berriz eta ```ssh host``` uni.eus aukeratu eta kitto!!

AWS EC2 ssh key laguntza: https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ec2-key-pairs.html

#### ssh login user-password erabiliz

vscode-n F1 -> remote ssh host (idatzi) -> erbiltzailea@makinaren_IP

#### ssh giltza erabiliz

ssh giltza sortu (windows-en / bezeroan):
```
ssh-keygen -t rsa -b 4096 -f %USERPROFILE%/.ssh/remote_ubuntu_rsa
ssh-keygen -t rsa -b 4096

pasahitza EZ jarri!!

scp -P 22 %USERPROFILE%/.ssh/remote_ubuntu_rsa.pub user@IP_REMOTE_MACHINE:~/key.pub
```

zerbitzarian - Ubuntu:
```
mkdir ~/.ssh
cat ~/key.pub >> ~/.ssh/authorized_keys
chmod 600 ~/.ssh/authorized_keys
rm ~/key.pub
```

Beste modu bat:

Bezeroan:
cmd erabiliz eta EZ powershell!!
```
ssh-keygen -t rsa -b 4096
```
```
SET REMOTEHOST=your-user-name-on-host@host-fqdn-or-ip-goes-here

scp %USERPROFILE%\.ssh\id_rsa.pub %REMOTEHOST%:~/tmp.pub
ssh %REMOTEHOST% "mkdir -p ~/.ssh && chmod 700 ~/.ssh && cat ~/tmp.pub >> ~/.ssh/authorized_keys && chmod 600 ~/.ssh/authorized_keys && rm -f ~/tmp.pub"
```

## HTTPS

- https://www.ovh.com/world/
- https://www.cloudflare.com/ (DNS, SSL full strict proxy)
- https://certbot.eff.org/ (SSL cert)

```
[web browser]<--SSL certbot cert -->[cloud flare]<-- SSL cloudflare cert-->[OVH]
[web browser]<--SSL cloudflare cert-->[cloud flare]<--SSL cloudflare cert-->[OVH]
```

## External IP

```
dig @resolver1.opendns.com myip.opendns.com +short 'hostname' | head -1
host myip.opendns.com resolver1.opendns.com
```

## bash prompt shorten

https://askubuntu.com/questions/145618/how-can-i-shorten-my-command-line-bash-prompt

```
PS1='\u:\W\$ '

export PS1="\\w:\$(git branch 2>/dev/null | grep '^*' | colrm 1 2)\$ "

export PS1="\\W\$(__git_ps1)\[\033[01;34m\] \$\[\033[00m\] "

export GIT_PS1_SHOWDIRTYSTATE=1 export PS1='\[\033[01;32m\]\u@\h\[\033[01;34m\] \w\[\033[01;33m\]$(__git_ps1)\[\033[01;34m\] \$\[\033[00m\] '

export GIT_PS1_SHOWDIRTYSTATE=1 export PS1='\[\033[01;32m\]\u@\h\[\033[01;34m\] \W\[\033[01;33m\]$(__git_ps1)\[\033[01;34m\] \$\[\033[00m\] '


export GIT_PS1_SHOWDIRTYSTATE=1 export PS1='\[\033[01;34m\] \W\[\033[01;33m\]$(__git_ps1)\[\033[01;34m\] \$\[\033[00m\] '

```



