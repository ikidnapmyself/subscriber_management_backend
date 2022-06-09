### How to use

- Clone the project with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run 'php artisan migrate && php artisan db:seed' (if you are using sail - sail artisan migrate && sail artisan db:seed)
- your project would be running at http://localhost if you are using sail. If you are using XAMPP, you have to type the full url with your project name like http://localhost/example_project

### Screenshots

- It contains a 'subscribers test' file which runs all api tests
<img src="https://raw.githubusercontent.com/amitleuva1987/subscriber_management_backend/master/backend_api_test_screeshot.jpg" /> 
