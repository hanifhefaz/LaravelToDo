<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This App

This is a simple To Do application, where users can:

- Register
- Login
- Create New Tasks, update or delete them
- View Specific Tasks
- Filter Tasks by date, status, or assignee


Its made using Laravel 8 framework. MySQL is used for the database and a mixture of CSS and Tailwaind is used.

## Setup

- Clone the repository: ```https://github.com/hanifhefaz/LaravelToDo.git```
- Open the project in your editor and run ```composer install``` to install the required packages.
- Make the ```.env``` file for your project
- Generate a new Key, using ```php artisan generate:key```
- Go to your database engine and make a database for the project
- Run a migrations using ```php artisan migrate```
- Now seed the data step by step ```php artisan db:seed --class=UserTableSeeder``` then run ```php artisan db:seed --class=CategoryTableSeeder``` and finally run ```php artisan db:seed --class=TaskTableSeeder```
- Now run the prject using ```php artisan serve```

You will be redirected to the welcome page, where you can login or create a new account.

## How does it work?

After registering or login, the user is redirected to the dashboard, where the user can see a pie chart of the current tasks, showing the percentage of each type of the task status.

![Dashboard](/GithubImages/dashboard.png?raw=true)

You can navigate through the navbar and view tasks, filter them, add new one or edit and delete them.
Tasks can only be deleted or edited by the users, who have created them.
Here is the tasks index page:

![Tasks](/GithubImages/tasks_index.png?raw=true)

Tasks can be filtered using the date, or assigneed to a specific user, or created by a specific user.
here is the filter page:

![Filter](/GithubImages/filter.png?raw=true)

