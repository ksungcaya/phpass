#PHPass Laravel


A PHPass integration to Laravel. This package overrides the default Eloquent Auth Driver and Hashing of Laravel and use the PHPass
password hashing and checking methods.


## Installation

Install package through Composer.

```js
"require": {
    "ksungcaya/phpass": "~1.0"
}
```

Update `app/config/app.php` and include a reference to this package's service provider in the providers array.

```php
'providers' => [
    'Ksungcaya\Phpass\PhpassServiceProvider'
]
```

Next is change the `driver` value to `phpass` in `app/config/auth.php` to let Laravel use the PHPass authentication methods.

## Usage

Now that PHPass is installed in Laravel, you can now use the normal `Auth` and `Hash` methods.

```php
Auth::attemp(array(
            'email'    => $email,
            'password' => $password
          )
      );

Hash::make('secret');
Hash::check('secret', $hashedPassword);
```

## That's it!

Please refer to Laravel documentation on [Security](http://laravel.com/docs/4.2/security) to know more about Authentication and Hash Classes.
