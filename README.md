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
FrontEnd Packages: 
 - sweet alerts 2 for some ease of use.

## Run me
 1) Make in the root directory a folder called: mysql
 2) change all .env.example to .env (2 places bnoth in root and in src)
 3) docker-compose up -d --build site
 4) docker-compose run --rm artisan install
 5) docker-compose run --rm artisan migrate
 6) docker-compose run --rm npm install
 7) docker-compose run --rm npm run dev
 8) Navigate to http://localhost/
 9) Enjoy

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

Greeting screen:

![image](https://user-images.githubusercontent.com/40903917/136965248-3abcef57-1eca-4254-a581-d13b692c66eb.png)

Register screen:

![image](https://user-images.githubusercontent.com/40903917/136965319-f0d63e71-8a9c-4c0a-973d-dc567d7380b1.png)

Login:

![image](https://user-images.githubusercontent.com/40903917/136965369-ddacc435-b5f4-465c-8d5d-f7096b6299bf.png)

Dashboard!

![image](https://user-images.githubusercontent.com/40903917/136965446-c51ed27c-035c-4644-9206-826398a01574.png)

Edit/New Pop up:

![image](https://user-images.githubusercontent.com/40903917/136965512-7658f499-e596-4978-a8e1-de9dc9e1f66d.png)

Confirm Message:

![image](https://user-images.githubusercontent.com/40903917/136965607-836bf9ea-6eb3-4312-a267-5c7e8b1528cc.png)

Delete Confirmation:

![image](https://user-images.githubusercontent.com/40903917/136965690-f3dea4be-88fb-40a5-ad9a-f53b183a4af8.png)
