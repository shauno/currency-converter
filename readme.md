Mukuru Practical Test
===

Setup
---

* Clone the repository

* Download and install all PHP dependencies (you need composer installed, which is outside the scope of this document)

        $ composer install

* Copy the example environment file, and edit the configuration as required

        $ cp .env.example .env

    The `JSON_RATE_API_KEY` can be obtained with a free account from https://currencylayer.com.
    
    I have used a free http://mailgun.com account for email sending, but you can configure emails using Laravels built in configuration as you require

    Please note, the `APP_KEY` can be set to a secure random value by running the `$ php artisan key:generate` command

* Setup database schema and default seed data

        $ php artisan migrate
        $ php artisan db:seed

    The database seeding will setup the default currencies with default values. To get the updated currency rates from the online provider, you can run the following command at any time. Set it up on a cron if you would like the rates to be updated on a schedule :)

        $ php artisan rates:update

* Download and install all build tool dependencies (you need Node/NPM installed, which is outside the scope of this document)

        $ npm install
        
    (You might want to make a cup of coffee while this runs. Laravel's Elixir is quite large)

* Download and install front end dependencies

        $ ./node_modules/bower/bin/bower install

* Run the build

        $ ./node_modules/gulp/bin/gulp.js

* Create a host in your web server pointing to the `./public/` directory. This is tested with Apache, but should work
with anything that can implement the `./public/.htaccess` rules