# HeaderTokenGuard

Laravel package providing a Guard that let's you au authenticate users from a token in a custom HTTP header.

Copyright (C) 2017 Pascal Hurni <[https://github.com/phurni](https://github.com/phurni)>

Licensed under the [MIT License](http://opensource.org/licenses/MIT).

## Installation

Add `mortimer/header-token-guard` as a requirement to `composer.json`:

```javascript
{
    "require": {
        "mortimer/header-token-guard": "dev-master"
    },
    "repositories": [
        {
            "url": "https://github.com/phurni/mortimer-header-token-guard.git",
            "type": "git"
        }
    ],
}
```

Update your packages with `composer update` or install with `composer install`.

Then add the service provider in `config/app.php`:

```php
    'providers' => [
        ...
        Mortimer\HeaderTokenGuard\ServiceProvider::class,
        ...
    ],
```

## Configuration

Let's say you receive the token identifying the user in the `X-Forwarded-User` HTTP header.

Your `User` model that persists to the DB has a `friendlyid` column that contains the identifying token values.

Configure your `config/auth.php` like this:

```php
    'guards' => [
        'web' => [
            'driver' => 'header_token',
            'provider' => 'users',
            'input_key' => 'X-Forwarded-User',
            'storage_key' => 'friendlyid'
        ],
```

