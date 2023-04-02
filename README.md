<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## About Project
 - URL: https://laraweb.top/
 - Tech stack: Laravel(10), Livewire, Lightsail(AWS), CICD(github action)

## Setup docker
1. docker-compose build
2. docker-compose up -d
3. docker-compose exec app bash
4. composer install
5. php artisan key:generate
6. php artisan migrate
7. php artisan optimize
8. php artisan storage:link
9. php artisan db:seed

## CONFIG
 - Open file hosts and add "127.0.0.1 laraweb.test" into it.
 - In the browser, access "laraweb.test/backend/login" and use ID and password to login.
    id: admin@gmail.com
    pass: password@123

