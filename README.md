# LOJO-GRAM
Social Network app in lravel

# Functions

An application that works in a similar way to instagram.
<h2>You can</h2>
<ul>
  <li>Register and log in</li>
  <li>Update your profile picture or personal data</li>
  <li>Upload delete and edit photos</li>
  <li>Comments and likes on another users photos</li>
  <li>Comments and likes on your own photos photos</li>
  <li>Profile home favs and config views</li>
</ul>
<h2>A powerful application</h2>
<p>Here you can see images of the application</p>
<img src="img/unregister.png" alt="unregister view" width="600" height="400">
<img src="img/register.png" alt="register of a new user" width="600" height="400">
<img src="img/updatingprofile.png" añt="profile settings" width="600" height="400">
<img src="img/firstphoto.png" añt="First photo" width="600" height="400">
<img src="img/deletingcomment.png" añt="Deleting comment" width="600" height="400">
<br>
<br>
<h2>RUN</h2>
<p>Go to LTS version</p>
docker-compose up
at http://localhost:8080/ CREATE DATABASE LARAVEL;
<img src="img/compose.png" alt="compose command"/>

<i>change the DB_HOST constant in .env to 127.0.0.1 to migrate and seed</i>
<i>or run these from the container</i>

<img src="img/change.env.png"/>
<i>then leave the constant with the value db (name of the container with the database)</i>

<p>php artisan migrate:fresh</p>
<img src="img/makemigrate.png" alt="makemigration"/>

<p>php artisan db:seed</p>
<img src="img/makeseed.png" alt="make seed"/>

<h2>Go to http:://localhost:80/ and Enjoy it!</h2>
