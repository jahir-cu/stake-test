<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://i0.wp.com/ifnfintech.com/wp-content/uploads/2021/12/getstake-logo.png?fit=322%2C150&ssl=1" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Stake-test-app

Stake - The modern way for anyone to invest in real estate:

- Simple, fast croud funding platform.
- Retrieve large number of properties.
- Invest in prime rental properties on MENA’s leading real estate investment platform, from only AED 500.

## Technology used
- `Laravel version 9` for the application.
- `Laravel sail` a light-weight command-line interface for interacting with Laravel's default Docker development environment.
- `Laravel Sanctum` provides a featherweight authentication system for      token based APIs.

## Installation

> **Note:** Require the `Docker Desktop` installed on your computer file sharing sould be turned on for the application root path from `preference->resources->file sharing`

```sh
Clone repo
cd stake-test
Composer install
```
After the vendor folder has been created, you can navigate to the application directory and start Laravel Sail. Laravel Sail provides a simple command-line interface for interacting with Laravel's default Docker configuration:
```sh
./vendor/bin/sail up
```
Once the application's Docker containers have been started, you can access the application in your web browser or postman app at: http://localhost.

However, instead of repeatedly typing vendor/bin/sail to execute Sail commands, you may wish to configure a shell alias that allows you to execute Sail's commands more easily:
```sh
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```
Once the shell alias has been configured, you may execute Sail commands by simply typing sail. for eg

```sh
sail up
sail php artisan migrate
...
```
- Migration

The `migrate:fresh` with `seed` command will drop all tables from the database and then execute the migrate  and seed command:

```sh
php artisan migrate:fresh --seed
```
> **Note:** If any connection refuced issue happen, you need to run `docker inspect -f '{{.Name}} - {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $(docker ps -aq)` to get ports which running docker services,update relevent ports info on env

## API
```sh
host http://localhost/api/v1
```
Resources
-  GET /properties - Retrieve all properties
You can pass query params to filter as `?size=''&campaign=''&...`
- POST /investments - To make an investment
payload format while POST 
```sh
{
    "user_id":1,
    "property_id":1,
    "campaign_id":1
}
```



> **Note:** If you are explicitly whitelisting headers, you must include `Origin` or requests will fail to be recognized as CORS.




Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
