# LittleNuts

## Useful links

- [Instructions](https://github.com/becodeorg/LIE-Hamilton-1.7/tree/master/02-La-colline/02a-VueJS-Laravel)
- [Laravel (master) documentation](https://laravel.com/docs/master)
- [Vue (2.x) api](https://vuejs.org/v2/api/)
- [Vue (2.x) cookbook](https://vuejs.org/v2/cookbook/)
- [Vue (2.x) guide](https://vuejs.org/v2/guide/)


## Use sqlite as database system

1. Create the **database/database.sqlite** file.

1. Edit the **.env** file like this:

    ```env
    DB_CONNECTION=sqlite
    # DB_HOST=127.0.0.1
    # DB_PORT=3306
    # DB_DATABASE=homestead
    # DB_USERNAME=homestead
    # DB_PASSWORD=secret
    ```

## Change the application name

1. Edit the **.env** file like this:

    ```env
    APP_NAME=LittleNuts
    ```

1. Restart your server.

## Create a basic authentification system

1. Run this command in your terminal.

    ```shell
    php artisan make:auth
    ```

1. Run this command in your terminal.

    ```shell
    php artisan migrate
    ```

## Set a navigation link as active with Laravel and Bootstrap

```php
<li class="nav-item {{ Route::is('register') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
</li>
```
