
## Laravel Exchange Rate

Gets the exchange rate and displays it in a table. With the ability to sort and search by currency fields.

## Installation

```bash
$ git clone https://github.com/Petrushevets/laravel-exchange-rate.git
$ cd laravel-exchange-rate
$ cp .env.example .env
$ composer install
```

Run Migration
```php
$ php artisan migrate
```

## Usage

The command updates exchange rates.

```php
$ php artisan rate:update
```
