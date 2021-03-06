<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Info about the project

This is a boilerplate for start new projects with Laravel 9, Sail, Vite, InertiaJS (with Vue3) and TailwindCSS.

## InertiaJS Packages installed

-   Default layout for every page
-   SEO component [Title & Meta](https://inertiajs.com/title-and-meta)
-   SSR [Server Side Rendering](https://inertiajs.com/server-side-rendering#top)

## How to run (with Sail)

Copy and update .env file

```
APP_NAME=Boilerplate
DB_CONNECTION=mysql
DB_HOST=mysql
DB_USERNAME=sail
DB_PASSWORD=password
```

Install PHP and NPM dependencies

```
composer install
npm ci
npm run dev
```

Run Sail and initial commands for artisan (key, storage, migrate db...)

```
sail up -d
sail artisan key:generate
sail artisan storage:link
sail artisan migrate
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
