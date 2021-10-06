# Movie Classification App

## Stack

AWS: EC2 free.... to run the containers.\
Docker for containerization easy mode.\
MySQL: Stock configuration for Laravel out of the box.\
BackEnd Language: PHP -- native web language built for the web.\
BackEnd Framework: Laravel -- Great framework for security and basic config already set up.\
Packages for BackEnd:
 - Sanctum -- Great API Tokens.
 - PhpUnit -- Testing out application. 

FrontEnd Language: Javascript......because web assembly takes forever.\
FrontEnd FrameWork: Alpine... Clean, Simple, Javascript Simplifier.\
FrontEnd Packages: None, Just native web API's\

## Run me
 1) Make in the root directory a folder called: mysql
 2) docker-compose up -d --build site
 3) docker-compose run --rm artisan migrate
 4) docker-compose run --rm composer require laravel/sanctum
 5) php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
 6) docker-compose exec php php /var/www/html/artisan migrate
 7) Work in progress....
 10) Navigate to http://localhost/
 11) Enjoy
