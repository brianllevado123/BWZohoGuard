# BWZohoGuard

## Installation

You can install the package via composer:

```bash
composer require brianllevado123/bw-zoho-guard
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="BWZohoGuard-config"
```

This is the contents of the published config file:

```php
return [
    'api_key' => env('API_KEY', 'default_api_key'),
    'master_password' => env('MASTER_PASSWORD', 'default_password'),
    'bitwarden_url' => env('BITWARDEN_URL', 'http://localhost'),
];
```

## Usage

```php
$variable = new VendorName\Skeleton();
echo $variable->echoPhrase('Hello, VendorName!');
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [:author_name](https://github.com/:author_username)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
