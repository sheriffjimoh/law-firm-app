
*******
Steps to setup the app

1. Download and install xammp from https://www.apachefriends.org/download.html

2. setup locahost 

3. create database name  "db_lawfirm"

4. clone this https://github.com/sheriffjimoh/law-firm-app.git

5. run cd /law-firm-app 

6. run copy .env.example .env

7. locate the .env file and add your database credencial "username, database and password", where as database name is "db_lawfirm"

8. add your Gmail credencial for Mailer inside env file and turn on "less secure in for the mail say gmail account "   here https://myaccount.google.com/security?gar=1

9.  run php artisan migrate

10. run php artisan serve

11. if you want to see how the scheduler send mail to all client that are yet to provide passport, run "php artisan notification:threedays
", this would be working automatically on the live server with the help of "cron job"

12. ??? just the magic 

but then if there is any issue, ring me  on +2349034557339/whatsapp 
