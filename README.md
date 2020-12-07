## Real Time App 
#### This App built using **PHP/Laravel** and **Vue.js**
## Idea
A simple **QA System** to let **User** Ask Questions, and allow any auth user to make **Reply** & **like** on this Question.
### To Start Use This Repo Pleasse Follow the next steps
- Clone The project
- Go to the folder application using cd command on your cmd or terminal
- Run c`omposer install` on your cmd or terminal
    - **Note** : if you had this error msg : `“Your requirements could not be resolved to an installable set of packages”` 
    you have to run `composer install --ignore-platform-reqs`
    
- copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
- Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
By default, the username is root and you can leave the password field empty. (This is for Xampp)
By default, the username is root and password is also root. (This is for Lamp)
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `php artisan jwt:secret`
- Run `php artisan cache:clear`
- Run `php artisan config:clear`
- Run `php artisan serve`
### Now The App will work good. But You will need to figure Your Pusher Key to make It _Real Time App_
#### Notes:
- First User Will be signup with **id = 1**,Will be the **admin**, yeah it's kind silly. But in future will be change this part. And you can dive into it if you want.
