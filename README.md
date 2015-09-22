# Coding-Task
Coding task
This repository contains all the code files of coding task provided and installation steps

This system is designed to help the user to register a city and see the cities within 100 miles of radius form the selectd city by logging into the system using thier first name and last name. This system is designed on "MYSQL" database and "PHP".

Installation Steps : 

1. Download the directory "Coding-Task" on to your local directory supported by webservers ( For example if using IIS server place it in inetpub -> wwwroot ,if using ftp client place it in public_html)

2.  Then run the "DB_Creation.php" file in web broswer supported by your web server. 

3.  Enter the host name( ex : localhost) and database name that you want to create for this system in the screen displayed.It is assumed the host connection have default username and passwords (i.e. "root" and "root".) 

4.  After getting success message of database creation you will be redirected to "login" page where you can login to the system.

5.	Before Logging into the system import cities and users data from .csv files in the directory to your tables cities and users respectively.

6.	 After successful import of data enter user first name and last name to login to the system.

7.   After succesfull login, user is redirected to "Home" page where he can perform the tasks like viewing list of all cities,cities that he had visited,list of cities within 100 mi radius of a particular selected city,register a city as visted.

For the screenshots and further detailed explanation please check "CodingTask.docx" file in the directory
