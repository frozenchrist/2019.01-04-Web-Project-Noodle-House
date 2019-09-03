http://xie12f.myweb.cs.uwindsor.ca/
Hi,
Since the Myweb server won't process php code for some reason, you might not be able to see the correct output of this website.
Thus, I was using XAMPP, and this project was tested using XAMPP all along. 


XAMPP Tutorial:
1.To be able to use the login/out, and signup function, you have to have a localhost database.

2.To create a localhost database, I used XAAMP. Install XAAMP if you don't have it. Make sure you install Apache and Mysql feature in the wizard.

3.Once you have the program installed, a control panel will pop up, start both Apache and Mysql service.

4.Open a browser, type in http://localhost/phpmyadmin, create a new database named "334project" and click the SQL tab, 

5.Type in the following SQL command(must type in exactly): 

CREATE TABLE users (
idUsers		int(11)   AUTO_INCREMENT PRIMARY KEY NOT NULL,
uidUsers	TINYTEXT NOT NULL,
emailUsers	TINYTEXT NOT NULL,
pwdUsers	LONGTEXT NOT NULL
);

6.And you are done.

Thank you.
