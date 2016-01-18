Mukuru Practical Test
===

Setup
---

* Clone the repository

* Download and install all PHP dependencies (you need composer installed, which is outside the scope of this document)

        `$ composer install`
        
* Download and install all build tool dependencies (you need Node/NPM installed, which is outside the scope of this document)

        `$ npm install`
        
* Download and install front end dependencies

        `$ ./node_modules/bower/bin/bower install`
        
* Run the build

        `$ ./node_modules/gulp/bin/gulp.js`

* Create a host in your web server pointing to the `./public/` directory. This is tested with Apache, but should work
with anything that can implement the `./public/.htaccess` rules