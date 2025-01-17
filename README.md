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

Add the service provider to config/app.php:

```bash
'brianllevado123\BWZohoGuard\BWZohoGuardServiceProvider::class',
```

Clear routes:

```bash
php artisan route:clear
```

## Usage

###Endpoint:
This API endpoint allows you to interact with the Bitwarden API by making requests with a specified endpoint, method, and payload.

```bash
{domain-name}/api/bitwarden-api-request
```


###Request Body:
The request body should be a JSON object with the following properties.

```bash
{
    "bw_api_endpoint": "{string}", // The Bitwarden API endpoint to interact with. Example: "/object/folder"
    "bw_request_method": "{string}", // The HTTP request method to use. Example: "post", "get", "put", "delete"
    "bw_request_payload": {collection}// The data to send with the request
}
```
```bash
{
    "bw_api_endpoint": "/object/folder",
    "bw_request_method": "post",
    "bw_request_payload": {
        "name": "Folder Name"
    }
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [:author_name](https://github.com/brianllevado123)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
