# contacts_api
SEARCA's contacts database   

![CI](https://travis-ci.org/SEARCAPhil/contacts_api.svg?branch=develop)

## Installation
1.) Clone repository to your machine

2.) Install dependencies
  > composer update

3.) Copy `.env.example` to `.env` and change it with your database credentials

4.) Generate laravel key
  > php artisan key:generate

5.) Create database tables using Laravel's migration command
  > php artisan migrate:fresh

6.) or `create database and populate sample data` using `--seed` command
  > php artisan migrate:fresh --seed

  
  ***Note: Migration commands will erase all the data in your database.Please make sure that you will only run this on your `development machine`***


## Docker (Recommended)
This will ensure that all developers are using the same environment during the development phase. This is not required, but comes in handy if your machine contains different PHP version and MariaDB or no installation at all.

### Requirements
> Note: You must have an active account in Docker to download the application

1.) [Docker](https://www.docker.com/get-started)   
2.) [Docker Compose](https://docs.docker.com/compose/install/)


### Links
* **Web API** : http://localhost:81/   
* **phpMyAdmin** :  http://localhost:82/

### Installation
1.) After you cloned the repository, make sure to change your current working directory.
  > cd contacts_api

2.) Build the image

  > docker-compose up -d

3.) Get the the list of all running containers and choose the contacts_api_web
  > docker ps -a

4.) Enter the app's console
  > docker exec -ti **container_id_here** bash

5.) Proceed to the typical Installation instructions `except 1.)`
   


**IMPORTANT**
> You might need  to change the [volume] part in `build_files/Dockerfile` depending on your Operating System.  

   
> NOTES: Docker only allows few folders that could be mount into the volume or else you will receive a permission denied error and you might need to copy the whole directory for this to properly work.    
If you are using `XAMPP` in MacOS, please go to `Docker > preferences > File Sharing` and add new entry `/Applications/XAMPP/xampp/htdocs`.  
   



### DOCUMENTATION  
For API docs, please refer to the link below. This was automatically created by Postman   
https://documenter.getpostman.com/view/4471408/RzfcLAyQ

### TOOLS
* [Postman](https://www.getpostman.com/)
* [Docker](https://www.docker.com/)
* [VSCode](https://code.visualstudio.com/)
* [XAMPP](https://www.apachefriends.org/index.html)

### MIGRATION
Please use [DBM Tool](https://github.com/SEARCAPhil/contacts_dbm_tools) for uploading data from OLD Database
