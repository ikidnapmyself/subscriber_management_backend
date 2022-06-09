### How to use

- Clone the project with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate` && `php artisan db:seed`  (use 'sail' instead of php, if you are running it over the docker)
- The project contains both 'database seeders' and 'database factories'. use any of them to fill database with dummy data
- your project would be running at http://localhost if you are using sail. If you are using XAMPP, you have to type the full url with your project name like http://localhost/example_project

### Screenshots

- It contains a 'subscribers test' file which runs all api tests
<img src="https://raw.githubusercontent.com/amitleuva1987/subscriber_management_backend/master/tests.jpg" /> 
