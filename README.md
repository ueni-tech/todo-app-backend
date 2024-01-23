
## 環境構築
```bash
$ cp .env.example .env
$ cp .env.testing.example .env.testing
$ docker-compose up -d
$ docker-compose exec php-fpm bash
$ cd laravel-v10-starter
/var/www $ cd laravel-v10-starter
/var/www/laravel-v10-starter $ composer install
/var/www/laravel-v10-starter $ php artisan key:generate
/var/www/laravel-v10-starter $ php artisan migrate
```

URL:http://api.laravel-v10-starter.localhost  

## Dockerビルドのときに、debian等パッケージが取得できないといわれるとき
$ sudo vi /etc/docker/daemon.json
```json
{
  "dns": ["8.8.8.8", "8.8.4.4"]
}
```
If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
