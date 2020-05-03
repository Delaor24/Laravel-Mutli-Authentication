

## About
This is laravel multi-authentication system. I have finished the only authentication. When we will create an account for user or admin we will be using real email. When we will forget the password we can reset the password. So, we will use real Gmail.

## How to use
  - composer update
  - npm install
  - cp .env.expample .env
  - php artisan key:generate
  - env file change your database name
  - php artisan migrate
  - php artisan db:seed // default admin create. when we use this then edit seeder file & we will use a valid email.
  - php artisan serve


