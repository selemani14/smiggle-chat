# smiggle-chat
Description

I have create a php MVC framework for the smiggle chat other technologies used include ajax, json, css,html,mysql ...

  Insructions

Install / place entire files with entire folders in root directory

1. configure database details in the config.php file
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'chat'); as follows
2. use sql file to create database tables.                                               
2.1 make sure users and unread_messages are populated with data from smiggle_chat sql file
3. they are 4 users all have password = in                                               
which are user = james@gmail.com
password = in
user = julia@gmail.com
password = in
user = lionel@gmail.com
password = in
user = martin@gmail.com
password = in
4. Restful api:
This can be access using format index.php?smiggle=restfulAPI/getMessages/nameoffirstuser/name of second use
                      example index.php?smiggle=restfulAPI/getMessages/james@gmail.com/julia@gmail.com
 4.1 it returns a JSON with conversations like 
 [{"user":"james@gmail.com","message":"how are you","date":"2016-09-13"},{"user":"juli@gmail.com","message":"good 

james","date":"2016-09-13"},{"user":"james@gmail.com","message":"how are you","date":"2016-09-13"}]

