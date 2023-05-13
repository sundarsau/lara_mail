# Send mail in laravel using Mailtrap 
A small Laravel 10 application to show how you can send mail in Laravel using Mailtrap account. If you have not Mailtrap account already you can create one and then update Laravel .env file to use Mailtrap credentials. In this application I have a form to send the mail. User can enter the email id to whom he/she wants to send mail along with the subject and the mail text. A controller method gets the details from the form and sends the mail. Also, it stores the details of the mail in a database table.

# How To Use

1) Download the repository from https://github.com/sundarsau/lara_mail
2) Extract it into a folder
3) Create a Database in MySQL
4) copy .env.example to .env and update database name, username and password. For example, I used the database lara_demo and updated database details as below:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=lara_demo
    DB_USERNAME=root
    DB_PASSWORD=

5) Run composer install from project root
6) Run php artisan key:generate
7) Run php artisan migrate. This will create Laravel default tables and also will create a new table "mail_logs". 
8) Update .env with Mailtrap account details, get these details from your mailtrap account.
    MAIL_HOST=sandbox.smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=<put your mailtrap account username>
    MAIL_PASSWORD=<put your mailtrap account password>
    MAIL_ENCRYPTION=tls
9) Run php artisan serve
11) In Browser run localhost:8000
12) Enter details to send mail
