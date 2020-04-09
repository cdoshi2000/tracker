<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Cigo tracker project</h1>
    <br>
</p>

This is a project to add tracking info

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7


INSTALLATION
------------

### Install 

Clone the project
Composer install in the route folder
change directory to the web directory and run

~~~
yarn
~~~

### Database
Install the mysql database with the sql file
Change the database password in 

~~~
config/db.php
~~~


Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=cigo',
    'username' => 'root',
    'password' => ''1234,
    'charset' => 'utf8',
];
```


load the application with 
~~~
php yii serve --port=8888
~~~

You should be able to load the application on the browser on
~~~
http://localhost:8888/
~~~

