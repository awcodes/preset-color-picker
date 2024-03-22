# Preset Color Picker

[![Latest Version on Packagist](https://img.shields.io/packagist/v/awcodes/preset-color-picker.svg?style=flat-square)](https://packagist.org/packages/awcodes/preset-color-picker)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/preset-color-picker.svg?style=flat-square)](https://packagist.org/packages/awcodes/preset-color-picker)

A color picker field for Filament Forms that uses preset color palettes.

![Screenshot 2024-03-22 at 2 11 13 PM](https://github.com/awcodes/preset-color-picker/assets/3596800/e0c162db-6e21-4929-bbb5-f82f1a2e8f20)

## Installation

You can install the package via composer:

```bash
composer require awcodes/preset-color-picker
```

> [!IMPORTANT]
> If you have not set up a custom theme and are using a Panel follow the instructions in the [Filament Docs](https://filamentphp.com/docs/3.x/panels/themes#creating-a-custom-theme) first. The following applies to both the Panels Package and the standalone Forms package.

Add the plugin's views to your `tailwind.config.js` file.

```js
content: [
    './vendor/awcodes/preset-color-picker/resources/views/**/*.blade.php',
]
```

Rebuild your custom theme.

```sh
npm run build
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
