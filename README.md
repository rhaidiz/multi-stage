# Multi-Stage

Multi-Stage is a PHP/MySQL web application that was written without taking security seriously. Multi-Stage was implemented with the purpose of providing a vulnerable web application where different vulnerabilities of web applications can be combined together to compromise a system. The goal of Multi-Stage is not to educate on a specific vulnerability but to provide a set of common functionalities that an attacker can exploit to gain access to a system in different ways.


## WARNING
DO NOT UPLOAD OR DEPLOY Multi-Stage ON ANY PUBLIC HTML FOLDER OR INTERNET ACCESSIBLE SERVER AS IT MIGHT BE COMPROMISED.  It is adviced to run Multi-Stage on a virtual machine with restricted remote access.

## Prerequisites
It is advised to install Multi-Stage on a virtual machine, you can download [VirtualBox](https://www.virtualbox.org/) and [Ubuntu](https://www.ubuntu.com/download/desktop) and setup a virtual environment where to test Multi-Stage.

To install Multi-Stage you need a web server with PHP support and a MySQL database.

### Ubuntu

Update the packages list
```sudo apt update```

Install Apache, PHP and MySQL server
```sudo apt install apache2 php5 libapache2-mod-php5 php5-mysql mysql-server```

## Installing
To use Multi-Stage just clone the master branch into the main forlder of your
web server.

Create a database for Multi-Stage:

```mysql> CREATE DATABASE <db_name>;```
```mysql> exit;```

Import the example table into the database
```mysql -u <mysql_user> -p -h localhost  <db_name> < users.sql```

Edit the configuration file `config.inc.php` with the configuration of your local MySQL installation.

