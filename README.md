# project-web-f11
website for borrow equipment in F11 3rd floor

# MIT Licence
## css by bulma

## server requirement
    apache -> https://httpd.apache.org
    php >=5.33 -> http://php.net/
    phpmysql



## Install Database MySQL
  open database.sql and coppy code all (command sql) and paste to php myadmin
  Setting for connect to db by file in PATH File =>  controllers/database/core_db_pass.php


## Install program
  copy and paste in environment of apache
  linux = /var/www/html/

  not required xampp,appserv

## Set PATH
  if you have sub of directory you should set in pathfile.php
  such as my sub in directory "b5813872"  I will set $host=$host.'/b5813872/';
# Version
V1.0.1
   Fix error #1 ในการ query ของ user and  addmin
V1.0.0  
   พร้อมใช้งานครั้งแรก
