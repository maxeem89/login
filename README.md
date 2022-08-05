## Laravel Auth

#### Laravel Auth is a Complete Build of Laravel 8 with Email Registration Verification, Social Authentication, User Profiles Built on Bootstrap 4.

#### Table of contents
- [About](#about)
- [Features](#features)
- [Installation Instructions](#installation-instructions)
    - [Build the Front End Assets with Mix](#build-the-front-end-assets-with-mix)
    - [Optionally Build Cache](#optionally-build-cache)
- [Seeds](#seeds)
    - [MakeDummyDataSeeder](#seeded-users)
    - [MakeDummyIpSeeder](#seeded- ip addresses was clinat enter from this ip)
- [command](#rest_command)
    - [reset_command](#to reset login attempt to the zero  before the user will be locked every 15 minutes)
- [Routes](#routes)

    - [Get dashboard](#get- to enter to the dashboard)
    - [get login](# go to login page)
    - [post custom-login](#to validate data if valid redirect to dashboard else return to login page)
    - [ get registration](#go to registration page)
    - [custom-registration](#to validate name  dosn't accept spaces and underScore, email uniqe, phone uniqe, password min 6 with hashing it, gender male or female   )
- [get logout](#distroy the session and go to login page)
- [File Tree](#file-tree)
- [Opening an Issue](#opening-an-issue)
- [Laravel Auth License](#laravel-auth-license)
- [Contributors](#Contributors)

### About
Laravel 8 with user authentication, social media authentication, password recovery, and captcha protection. Uses official [Bootstrap 4](https://getbootstrap.com). This also makes full use of Controllers for the routes, templates for the views, and makes use of middleware for routing. Project can be stood up in minutes.

### Features
#### A [Laravel](https://laravel.com/) 8.x with [Bootstrap](https://getbootstrap.com) 4.x project.

| Laravel Auth Features  |
| :------------ |
|Built on [Laravel](https://laravel.com/) 8|
|Built on [Bootstrap](https://getbootstrap.com/) 4|
|Uses [MySQL] Database (can be changed)|
|Uses [Artisan](https://laravel.com/docs/master/artisan) to manage database migration, schema creations, and create/publish page controller templates|
|Dependencies are managed with [COMPOSER](https://getcomposer.org/)|
|Laravel Scaffolding **User** and **Administrator Authentication**.|



### Installation Instructions
1. Run `git clone https://github.com/maxeem89/login.git`
2. Create a MySQL database for the project
    create database called login 
3. take the .env file from installation zip file called installation.zip
5. Run `composer install` from the projects root folder
6. From the projects root folder run `php artisan key:generate`
7. From the projects root folder run `php artisan migrate`
8. From the projects root folder run `composer dump-autoload`
9. From the projects root folder run `php artisan db:seed`


##### Seeded Users

|Email|Password|
|:------------|:------------|:------------|
|maxeemkh1989@gmail.com|123456789|123456789|
|ahmed.example@gmail.com|123456789|

##### Blocked Types Seed List
|Email|Password|
|:------------|:------------|:------------|
|ali.example@gmail.com|123456789|
|because he tryed 3 times with a failed login attempt, his account became locked

### Routes

```bash

  POST       _ignition/execute-solution ...... ignition.executeSolution › Spatie\LaravelIgnition › ExecuteSolutionController
  GET|HEAD   _ignition/health-check .................. ignition.healthCheck › Spatie\LaravelIgnition › HealthCheckController  
  POST       _ignition/update-config ............... ignition.updateConfig › Spatie\LaravelIgnition › UpdateConfigController  
  GET|HEAD   api/user ........................................................................................  
  POST       custom-login .................................................. login.custom › CustomAuthController@customLogin  
  POST       custom-registration ................................. register.custom › CustomAuthController@customRegistration  
  GET|HEAD   dashboard ...................................................................... CustomAuthController@dashboard  
  GET|HEAD   login ...................................................................... login › CustomAuthController@index  
  GET|HEAD   logout .................................................................. logout › CustomAuthController@signOut  
  GET|HEAD   registration ................................................ register-user › CustomAuthController@registration  
  GET|HEAD   sanctum/csrf-cookie ......................... sanctum.csrf-cookie › Laravel\Sanctum › CsrfCookieController@show 

+--------+----------------------------------------+---------------------------------------+-----------------------------------------------+-----------------------------------------------------|
| Domain | Method                                 | URI                                   | Name                                          | Action                                              |       
+--------+----------------------------------------+---------------------------------------+-----------------------------------------------+-----------------------------------------------------|
|        | POST                                   | _ignition/execute-solution            | ignition.executeSolution                      | ExecuteSolutionController                           |
|        | GET|HEAD                               | _ignition/health-check                | ignition.healthCheck                          | HealthCheckController                               |      
|        | POST                                   | _ignition/update-config               | ignition.updateConfig                         | UpdateConfigController                              |
|        | GET|HEAD                               | api/user                              |                                               |                                                     |
|        | POST                                   | custom-login                          | login.custom                                  |CustomAuthController@customLogin                     |
|        | POST                                   | custom-registration                   | register.custom                               | CustomAuthController@customRegistration             |
|        | GET|HEAD                               | dashboard                             |                                               | CustomAuthController@dashboard                      |
|        | GET|HEAD                               | login                                 | login                                         | CustomAuthController@index                          |
|        | GET|HEAD                               | logout                                | logout                                        |CustomAuthController@registration                    |
|        | GET|HEAD                               |  registration                         | register-user                                 | CustomAuthController@registration                   |
|        | GET|HEAD                               | sanctum/csrf-cookie                   | Laravel\Sanctum                               | CsrfCookieController@show                           |          
|        |+--------+----------------------------------------+---------------------------------------+-----------------------------------------------+-------------------------------------------------
```
