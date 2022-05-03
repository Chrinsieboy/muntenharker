<p align="center"><a href="https://muntenharker.newdeveloper.nl" target="_blank"><img src="https://muntenharker.newdeveloper.nl/images/Logo-text-gold.png" width="400"></a></p>

## About MuntenHarker

This website has been made by [Chris Friemann](https://git.newdeveloper.nl/cfrieman0780) & [Frank de Vries](https://git.newdeveloper.nl/fvries0251).
In this project we had to make a website so people could easily do there accountancy.

---

### How to install?

##### Get all programs

First of all, you need to install some things.
You need:
* [Composer](https://getcomposer.org/) (needs to be installed globally, no proxy needed)
* [MySQL](https://www.mysql.com/products/workbench/) (we used [XAMPP](https://www.apachefriends.org/nl/xampp.html) for phpMyAdmin)
* [Git](https://git-scm.com/)
* [Visual Studio Code](https://code.visualstudio.com/), [PHPStorm](https://www.jetbrains.com/phpstorm/) or any other IDE
* [PHP 8.0.x](https://www.php.net/downloads.php) (Needs a bit more work)

**Install PHP Windows**

```bash
Extract at C:\php 
Add C:\php to your environment variable 'path' 
Copy c:\php\php.ini-development to c:\php\php.ini 
Open c:\php\php.ini in notepad/notepad++ (right-click -> edit) 
Get rid of the ' ; ' for ' : extension_dir = "ext" ' 
You turn the extension on by getting rid of the ' ; ' for the line. Do this for:
- curl
- openssl 
- mbstring 
```

**Install PHP Mac**

```bash
Install homebrew 
Install PHP with homebrew 
Check in the terminal if you can see the php version by typing 'php -v'.
If it says 'PHP 8.0.x' then you are good to go.
```

Then you can install the project.

#### Install Laravel 9.x

This will take a second or two.

```bash
composer create-project --prefer-dist laravel/laravel <name>
```

#### Clone the project

```bash
git clone https://git.newdeveloper.nl/cfrieman0780/muntenharker.git
```

#### .env
    
```bash
copy .env.example to .env
php artisan key:generate
```

---

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
