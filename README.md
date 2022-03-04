Student Management System

1. Download and Installation(V9-laravel)
create a new Laravel project by using Composer directly.by using 
command :  composer create-project laravel/laravel student-management

2. Environment Files
This package ships with a .env file in the root of the project.

3. Composer
Laravel project dependencies are managed through the PHP Composer tool. 
The first step is to install the dependencies by navigating into your project in 
terminal and typing this command :  composer install

5. Create Database
You must create your database on your server and on your .env file update the following lines:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student-management
DB_USERNAME=root
DB_PASSWORD=

•	the sql file(student-management) is placed in the database folder of the project please check
    path: database/student_management.sql
              
6. Artisan Commands
You should see a green message stating your key was successfully generated. As well as you should see the APP_KEY variable in your .env file reflected.
•	run the built in migrations to create the database tables using 
    command : php artisan migrate
•	The teacher table data is inserted by using seeder ,so use the command below to run the seeder file command :  php artisan db:seed --class=TeacherSeeder 
•	running applications on the PHP development server using 
    command : php artisan serve


Route Details

Student
•	Run the URL with prefix 
( example : http://127.0.0.1:8000/student/insert   or http://127.0.0.1:8000/marks/insert  )

(GET)  - http://127.0.0.1:8000/student/insert  - Add Students Form
(POST) - http://127.0.0.1:8000/student/create  - Create a new student 

(GET)  - http://127.0.0.1:8000/student/list    - Display the students list

(GET) - http://127.0.0.1:8000/student/edit/{studentId}     - Edit the data
(POST) - http://127.0.0.1:8000/student/update/{studentId}     - Update the data

(GET) - http://127.0.0.1:8000/student/delete/{studentId}   - Delete the data

Student Marks

(GET)  - http://127.0.0.1:8000/marks/list      - Display the students’ marks 

(GET)  - http://127.0.0.1:8000/marks/insert    - Add student marks
(POST) - http://127.0.0.1:8000/marks/create  - Create a new student 

(GET) - http://127.0.0.1:8000/marks/edit/{studentMarkId}     - Edit the data
(POST) - http://127.0.0.1:8000/marks/update/{studentMarkId}     - Update the data

(GET) - http://127.0.0.1:8000/marks/delete/{studentMarkId}   - Delete the data
