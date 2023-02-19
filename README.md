# Nomic - Self-manageable Content Management System for Laravel

Nomic is a self-manageable content management system designed for the Laravel ecosystem. It comes with a custom-made tailwind dashboard that generates routes and provides data based on the database tables you provide in the `config/app.php` file as an array. With Nomic, you can easily create a fully customizable dashboard to manage your website's content.

## Installation

The installation process is fairly simple. First, run the following command to install Nomic:

```bash
composer require keygun/nomic
```

Then, add the service provider to your Laravel application's config/app.php file:

```bash
'providers' => [
    // ...
    Keygun\Nomic\Providers\NomicServiceProvider::class,
],
```

## Configuration

To configure Nomic, you need to add the nomic configuration array to your Laravel application's config/app.php file. The nomic array contains a tables key that lists the database tables you want to manage with Nomic:

```bash
'nomic' => [
    'tables' => [
        'users',
        'posts',
        'comments',
    ],
],
```
By default, Nomic uses the Laravel model for each table to manage the data. However, you can customize Nomic's behavior by creating a custom controller and view for each table.

To access the dashboard, visit the /nomic route in your Laravel application. From there, you can manage the content for the tables you have configured in the config/app.php file.

## Why Nomic?

Creating a dashboard to manage website content can be a time-consuming process. With Nomic, you can quickly and easily generate a fully customizable dashboard based on your database tables. Nomic is designed to be flexible, allowing you to customize the behavior and appearance of the dashboard to suit your needs.

## Contribution

Contributions to Nomic are welcome! If you find a bug or have a feature request, please create an issue on the [Github project](https://github.com/keygun-development/nomic/issues).

## License

Nomic is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT). Feel free to use, modify, and distribute it as you see fit.
