<span align="center">
<h1>MyADMIN</h1>
<p>Made in Laravel 9</p>
</span>

# REQUIREMENTS

Programs/Software need to install:

-   PHP 8.0^
-   MySQL 8.0^
-   Composer 2.5.7^

Download/Pull the frontend project for site. <br>
Follow the instructions there to install the frontend.

-   https://github.com/renzoh2/AdminVue

# INSTRUCTIONS

Run the following: <br>
For installation, use this command:

-   composer install

For Database, setup the database credentials to .env. <br>
The defaults database credentials (Changeable if different credentials/setup):

-   hostname = 127.0.0.1
-   port = 3306
-   database = myadmindb
-   username = root
-   password = root

Inside MySQL, run query to create Database (myadmindb is user defined. Can change if wanted):

-   create database myadmindb

Then to populate the DB, run the database migration with seeder command:

-   php artisan migrate:fresh --seed

(OPTIONAL) For re-populate the DB, run:

-   php artisan migrate:refresh --seed

And to run the dev server, just type:

-   php artisan serve

The default link/URL for this site (This is changeable if setup):

-   http://localhost:8000
