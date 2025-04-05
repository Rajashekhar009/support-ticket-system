composer create-project --prefer-dist "laravel/laravel=10.*" ticketing-system

cd ticketing-system

php artisan serve

php artisan make:controller DashboardController

php artisan make:migration create_tickets_table

php artisan migrate (No need for testing purpose as there is a SQL dump file)

php artisan make:model Ticket

php artisan make:controller TicketController

php artisan make:controller AuthController
