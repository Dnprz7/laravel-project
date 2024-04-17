Please check the archive "HOW TO RUN" and follow the instructions.

HOW TO RUN
Photogram

Important!
Please note that this project was made and executed with xampp for the database connections. Please note that you must make changes if you use another database driver. Download the latest versions of xampp (or similar), php, Laravel, Composer and Node so you can follow the instructions below.:

1.	Go to 

    C:\xampp\htdocs 	(or your similar on your operative system)

    Type

    git clone https://github.com/Dnprz7/laravel-project.git

    cd .\laravel-project\

    composer install

    npm install


2.	Run and fill the archive with example images

    mkdir storage\app\public\images

    mkdir storage\app\public\users

    And put there the images in the file “example_images”

3.	Please change the file .env

  	.env.example

  	With the code in the text file named " .env.txt "

  	Then rename the file for “.env”


6.	Run the migrations and seeders

  	php artisan migrate

  	php artisan db:seed

7.	Run the servers

    php artisan serve

  	In another terminal run

  	npm run dev

9.	Now you are ready to view the project, if you have any issues do not hesitate to contact me by email - ddaprr@gmail.com.


