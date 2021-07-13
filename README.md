#laravel-movie-booking

This project deals with viewing movie and booking ticket,
on consumer side the consumer can view movies (latest and upcoming) and book seat 
on admin side the user can manage the inventry of movies, theaters, screens, shows and consumer bookings, 
there is single login page for admin and consumer, the admin user will be redirected to admin on login
by default on registering the user will be consumer the role to admin could only be changed by previous admin users
initially there are two admin users
credentials of admin login :
email : "yatin6215gmail.com"  password : "123456789" ,
email : "pratyush@gmail.com"   password : "123456789"





To run the project the main requirment is php, mysql, composer and laravel

Steps to run the project: 

create a database named : "cinembs"
put the project files in the directory where laravel, composer , php and mysql is supported
open the directory path in terminal and add command:
"php artisan migrate:fresh --seed"
to migrate table and seeder database, then
"php artisan serve"
to start the project server
