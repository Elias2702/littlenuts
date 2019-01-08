# LittleNuts

<p align="center">
    <img src="./public/logo.svg" alt="logo" width="350">
</p>

## Useful links

- [Instructions](https://github.com/becodeorg/LIE-Hamilton-1.7/tree/master/02-La-colline/02a-VueJS-Laravel)
- [Laravel (master) documentation](https://laravel.com/docs/master)
- [Laravel schema designer](https://laravelsd.com/)
- [Vue (2.x) api](https://vuejs.org/v2/api/)
- [Vue (2.x) cookbook](https://vuejs.org/v2/cookbook/)
- [Vue (2.x) guide](https://vuejs.org/v2/guide/)

## Cookbook

### Use MariaDB from the docker-compose as database system

1. Edit the **.env** file like this:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=172.19.0.1
    DB_PORT=3306
    DB_DATABASE=dev
    DB_USERNAME=dev
    DB_PASSWORD=dev
    ```

1. Clear config like this:

    ```bash
    php artisan config:clear
    ```

### Use SQLite as database system

1. Create the **database/database.sqlite** file.

2. Edit the **.env** file like this:

    ```bash
    DB_CONNECTION=sqlite
    # DB_HOST=127.0.0.1
    # DB_PORT=3306
    # DB_DATABASE=homestead
    # DB_USERNAME=homestead
    # DB_PASSWORD=secret
    ```

### Change the application name

1. Edit the **.env** file like this:

    ```bash
    APP_NAME=LittleNuts
    ```

1. Restart your server.

### Create a basic authentification system

1. Run this command in your terminal.

    ```bash
    php artisan make:auth
    ```

1. Run this command in your terminal.

    ```bash
    php artisan migrate
    ```

### Set a navigation link as active with Laravel and Bootstrap

```html
<li class="nav-item {{ Route::is('register') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
</li>
```

### Use dump-autoload before seeding a database

```bash
composer dump-autoload
php artisan db:seed
```

### Install prestissimo to make composer 10 times faster

```bash
composer global require hirak/prestissimo
```

Could need to be ran as root/sudo.