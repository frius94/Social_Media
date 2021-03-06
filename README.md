[![CodeFactor](https://www.codefactor.io/repository/github/frius94/social_media/badge)](https://www.codefactor.io/repository/github/frius94/social_media)

# Social_Media
Project for M133

This project contains a social media platform for the TBZ school.

## Installation
If you want to work with this code, there are a few things you have to do first. 

### Requirements
Make sure your local environment fulfilles the following requirements:
* PHP >= 7.1.3
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Ctype PHP Extension
* JSON PHP Extension
* BCMath PHP Extension
* Composer
* NodeJS

### Check available extensions
To check whether these extensions are installed or not. Execute the phpinfo() method in a script.
To enable an extension do the following steps:
1. Go to your installed php folder.
2. Open your php.ini file
3. Go to the line where the extension is mentioned e.g. ";extension=openssl"
4. Remove the semicolon at the beginning and replace the extension name with your absoulute path of your extension dll file. This file is located in your ext folder.
5. Repeat for the other disabled extensions.
6. Save PHP.ini
7. Sign out your user to make the changes work.
8. Sign in
9. Your extensions are now available.

## Install Composer
Composer is a dependency manager for PHP. Make sure you have it installed. 
You can download it here: https://getcomposer.org/download/

Sign out and Sign in after installation to make sure the system environment variables are set.

## Install NodeJS
Node.js is a JavaScript runtime engine. Make sure you have it installed. 
You can download it here: https://nodejs.org/en/download/

Sign out and Sign in after installation to make sure the system environment variables are set.

## Setup DataBase
 1. Create a new DataBase named: tbz-sm.
 2. Create a new User with all Permissions for the TBZ-SM DataBase.

## Setup environment
 1. Open PHPStorm
 2. Click "File" --> "Close Project" to return to start page.
 3. Click "Check out from Version Control" --> "GIT"
 4. Add git repository link from this repository and click clone.
 5. Open terminal in PHPStorm (at the bottom)
 6. move to folder social_media "cd social_media"
 7. execute "composer install" (takes a few minutes, composer is installing dependencies)
 8. If it was successfull, then copy and paste the file ".env.example" and name it ".env"
 9. In the .env File edit Following Information:
      * DB_DATABASE=tbz-sm
      * DB_USERNAME=[Your DataBase-UserName]
      * DB_PASSWORD=[Your DataBase-Password]
10. Open terminal in PHPStorm (at the bottom)
11. move to folder social_media "cd social_media"
12. execute "php artisan key:generate"
13. execute "php artisan migrate"
14. execute "npm install"
15. execute "npm run dev"
16. execute "php artisan storage:link"
17. create a new Folder under public/storage/ -> Name it: "profile_pictures"
18. Move the File: public/media/default_profilePicture.jpg to public/storage/profile_pictures/default_profilePicture.jpg
19. Congratulations! You have Finished the Setup.

## Creating localhost server in PHPStorm
1. Click "Add Configuration"
2. Click "+"
3. Click "PHP Built-in Web Server"
4. Specify an interpreter. (red light bulb)
5. Click OK and start it with play.

After all, you can test your working laravel demo page by opening the "index.php" file in folder "public".
If you want to continue learning laravel you can continue at this playlist from the second video from timestamp 13:00
https://www.youtube.com/watch?v=H3uRXvwXz1o&list=PLillGF-RfqbYhQsN5WMXy6VsDMKGadrJ-&index=2
For further development i recommend to install the official PHPStorm Laravel Plugin. You can find it under Settings -> Plugins.
