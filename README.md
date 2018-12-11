CMS based on Kohana framework v3.3

to start working with this CMS first read Kohana documentation

Create your database and edit application/config/database.php

I'll recommend to use 'alternate' set. If you going to change it,also edit migration configuration file in same folder

After setting up database setting and hosting connection, run migrations in console

```PHP
 index.php db:migrate
 ```
 
 I've presetted user access, menus and materials basic data
 
 Base user login: admin, password: 123456
 
 You can change it by editing it in user section of admin panel
