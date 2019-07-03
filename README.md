# recruitment_task
This is repo for recruitment task.

Simple way to install this laravel app step by step:

1) Create your own empty database

2) Download repo (Obvious: git clone https://github.com/Taran00/recruitment_task.git )

3) Install project via composer (just run composer install in main folder of app (/recruitment_task) )

4) Update .env file -> only DB info

5) In main folder of app (/recruitment_task) just run command: php artisan config:cache to update database connection :)

6) If your db connection is correct u can just run simple command: php artisan migrate -> this will create all needed tables in Your db.

7) If You are working on localhost -> just run command: php artisan serve

8) The end.

