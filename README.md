# README

## PHP version

5.5.9+

## System dependencies

Pastikan sudah ada `composer`, `git`, `nodejs` & `npm`, `gulp`, dan `bower`.

Setelah cloning aplikasi menggunakan perintah `git clone`, change directory ke folder project. Jadi present working directory kita ada di root folder project.

Lalu jalankan perintah `composer install` untuk meminta composer mendownload semua packages dependencies. Packages ini adalah libraries untuk server-side application.

Lalu, jalankan `npm install`. Ini untuk install gulp, sass, dan lain-lain untuk proses build assets for production.

Lalu, change directory ke `public`, dan jalankan `bower install`. Ini untuk download front-end libraries aplikasi.

## REST API Standard URL Parsing

Lihat https://github.com/marcelgwerder/laravel-api-handler

Pada dasarnya Url parsing currently supports:

* Limit the fields
* Filtering
* Full text search
* Sorting
* Define limit and offset
* Append related models
* Append meta information (counts)

## File preparation

Copy file `.env.example` ke file `.env`. Bisa dengan perintah `cp .env.example .env`. Kedua file ini ada di root folder project.

Jadi hasil akhirnya adalah `/.env`.

## Configuration

Jalankan `php artisan key:generate` untuk generate APP_KEY yang digunakan untuk hashing.

Jalankan `php artisan jwt:generate` untuk generate JWT_SECRET dan update file `.env`.

## API Documentation

Silahkan cek di `/api/documentation` dan https://github.com/marcelgwerder/laravel-api-handler.

## JWT Authentication Secret Generation

Jalankan `php artisan jwt:generate` untuk generate JWT secret key.

## API Documentation Generation

- `php artisan l5-swagger:publish` untuk publish asset, view, dan config
- `php artisan l5-swagger:publish` untuk generate

## Database creation

Kita menggunakan PostgreSQL. Sesuaikan database connection pada file `.env`

Tambahkan `DB_CONNECTION=pgsql` diatas `DB_HOST=localhost`.

Sesuaikan username, password, dan database di file `.env`.

Jangan lupa untuk menyesuaikan nama database dengan database yang sudah dibuat sebelumnya. Tidak perlu membuat table dulu di database.

Hasil akhirnya seperti ini:

``
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_DATABASE=location-api
DB_USERNAME=yogya
DB_PASSWORD=secret
``

## Database initialization

Jalankan perintah `php artisan migrate --seed` untuk membuat table di database dan mengisi data awal.

## Directory permissions

Jalankan `chmod -R 777 storage bootstrap/cache`.

## How to run the test suite

Testing akan dilakukan via Jenkins menggunakan Codeception.

Jika ingin dilakukan di development environment, jalankan :

``codecept run``

Pastikan Codeception sudah terinstall sebelumnya.

## Services (job queues, cache servers, search engines, etc.)

-

## Deployment instructions

Deployment akan dilakukan via Jenkins menggunakan Rocketeer.

Jika ingin dilakukan di development environment, jalankan :

``rocketeer deploy``

Pastikan Rocketeer sudah terinstall sebelumnya.
