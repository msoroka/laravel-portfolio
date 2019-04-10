# My portfolio app written in PHP Laravel
APP is deployed on [heroku](http://still-depths-90618.herokuapp.com/).  
### Installation (Docker):  
Docker images contains MySQL, PHP 7.3, Nginx and PhpMyAdmin.
- Build docker images
```sh
$ docker-compose up
```
- Create **.env** variable
```sh
$ cp .env-example .env
```
- Set **.env** params with
```sh
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=homestead
DB_PASSWORD=secret
```
- Execute commands below to set up database, generate application key and install and compile npm dependencies
```sh
$ docker-compose exec php-fpm php artisan key:generate
$ docker-compose exec php-fpm php artisan migrate:refresh --seed
$ docker-compose exec php-fpm npm install
$ docker-compose exec php-fpm npm run dev
```
- Available URLs
```sh
localhost:8080 - Laravel App
localhost:8083 - PhpMyAdmin
```
- To perform tests
```sh
$ docker-compose exec php-fpm ./vendor/bin/phpunit
```
### Installation (Apache/Nginx + PHP + MySQL environment):
- Create **.env** variable
```sh
$ cp .env-example .env
```
- Set **.env** params with your MySQL configuration
```sh
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
- Execute commands below to set up database, generate application key and install and compile npm dependencies
```sh
$ php artisan key:generate
$ php artisan migrate:refresh --seed
$ npm install
$ npm run dev
```
- To run app
```sh
$ php artisan serve
```
- To perform tests
```sh
$ ./vendor/bin/phpunit
```
