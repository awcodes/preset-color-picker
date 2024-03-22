# A color picker field for Filament Forms that uses preset color palettes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/awcodes/preset-color-picker.svg?style=flat-square)](https://packagist.org/packages/awcodes/preset-color-picker)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/preset-color-picker.svg?style=flat-square)](https://packagist.org/packages/awcodes/preset-color-picker)


## Installation

You can install the package via composer:

```bash
composer require awcodes/preset-color-picker
```

Optionally, you can publish the views using ***(although this is not recommended)***

```bash
php artisan vendor:publish --tag="preset-color-picker-views"
```

## Usage

Simply add the field to your form using the `PresetColorPicker` field and pass in an array of Filament Color objects.

Should you need to include black and white in your color palette, you can use the `withWhite` and `withBlack` methods. This will include black and white at the end of the color options.

You can also use the 'swap' argument to swap out the hex value used for black and white.

```php
PresetColorPicker::make('color')
    ->colors([
        // array of Filament Color objects    
    ])
    ->withBlack(swap: '#111111')
    ->withWhite(swap: '#f5f5f5'),
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Adam Weston](https://github.com/awcodes)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
