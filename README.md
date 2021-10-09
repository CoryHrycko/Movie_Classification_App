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
 4) docker-compose run --rm npm install
 5) docker-compose run --rm npm run dev
 6) Navigate to http://localhost/
 7) Enjoy

# Operational API Documentation:
User Required fields for register:
   > name - string\
   email - string\
   password - string
   
   
User Required fields for login:
   > email - string\
   password - string
   
---

Movie Required fields for Save and Update
> title - string\
> format - string list: "VHS", "DVD", or "Streaming"\
> length - Int\
> release_year - Int\
> rating - Int

Dashboard!
![image](https://user-images.githubusercontent.com/40903917/136645583-2b59b45e-0e52-4849-8475-c67b11e5ab0d.png)
