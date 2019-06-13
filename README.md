# loginSys
My small hobby project, a website where users can sign up and login. 

HOW TO RUN
-----------
1. Download a copy of this repository .
2. Install xampp and run the apache and mysql servers.
3. place this 'Loginsystem' folder inside the 'htdocs' folder in the XAMPP directory.
4. Go to a browser and go to the address localhost/phpmyAdmin
5. Create a database  named 'loginsystem' and a table inside it using the following query

    CREATE TABLE users(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    uid tinytext NOT NULL,
    email tinytext NOT NULL,
    pwd longtext NOT NULL
    );
    
 6. Now once the Database is created , to access the website, visit localhost/loginSys
 7. Here you can sign up or login.
 
 THE END
 _____________________________________________________________________
