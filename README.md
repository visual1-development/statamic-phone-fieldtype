# Statamic Phone Number Fieldtype

A Statamic fieldtype for phone number validation and E.164 formatting using Laravel-Phone. Perfect for forms and collections that need consistent phone number handling with Australia-first detection.

## Features

- ✅ **Multi-format Input**: Accepts various phone formats (0412 345 678, (07) 3210 1234, +61 412 345 678, +1 555 123 4567)
- ✅ **Australia-first Validation**: Validates phone numbers using Laravel-Phone with Australia-first detection
- ✅ **E.164 Normalisation**: Automatically converts valid numbers to E.164 format (e.g. +12345678901)
- ✅ **Form Compatible**: Works in Statamic forms with custom validation messages
- ✅ **Integration Ready**: Ensures consistent format for Zapier, HubSpot, and other integrations
- ✅ **User-Friendly**: Clear error messages with international format examples

## Installation

Install via Composer:

```bash
composer require visual1au/statamic-phone-fieldtype
```

## Requirements

- PHP 8.1+
- Statamic 4.0+ or 5.0+
- Laravel-Phone 5.0+ or 6.0+

The package automatically installs `propaganistas/laravel-phone` if not already present.

## Configuration

### Environment Variables

You can configure the phone number validation behavior using environment variables in your `.env` file:

```env
# Set the primary country code (ISO 3166-1 alpha-2)
PHONE_FIELDTYPE_PRIMARY_COUNTRY=AU

# Enable/disable automatic fallback detection
PHONE_FIELDTYPE_AUTO_FALLBACK=true
```

### Publishing Configuration

To customise the configuration, publish the config file:

```bash
php artisan vendor:publish --tag=phone-fieldtype-config
```

This will create `config/phone-fieldtype.php` where you can modify:

```php
return [
    'primary_country' => env('PHONE_FIELDTYPE_PRIMARY_COUNTRY', 'AU'),
    'auto_fallback' => env('PHONE_FIELDTYPE_AUTO_FALLBACK', true),
];
```

### Configuration Options

- **`primary_country`**: The primary country code to use for validation (default: `AU`)
- **`auto_fallback`**: Enable automatic fallback detection if primary country fails (default: `true`)

## Usage

### In Forms

Add the field to your form blueprint:

```yaml
tabs:
  main:
    sections:
      -
        fields:
          -
            field:
              type: phone_number_field
              display: Phone Number
              validate:
                - required
              placeholder: 'e.g. 0412 345 678, +61 412 345 678, +1 555 123 4567'
            handle: phone_number
```

### In Collections

Add to any collection blueprint:

```yaml
tabs:
  main:
    sections:
      -
        fields:
          -
            field:
              type: phone_number_field
              display: Phone Number
              validate:
                - required
              placeholder: 'e.g. 0412 345 678'
            handle: phone_number
```

### Configuration Options

The fieldtype supports standard text field options:

- `placeholder`: Placeholder text
- `default`: Default value
- `prepend`: Text to prepend
- `append`: Text to append

## How It Works

1. **User Input**: User enters phone number in various formats
   - `0412 345 678` (Australian mobile)
   - `(07) 3210 1234` (Australian landline)
   - `+61 412 345 678` (Australian international)
   - `+1 555 123 4567` (International)

2. **Validation**: Built-in validation with friendly error messages
   - Prioritises primary country format detection first (configurable, defaults to AU)
   - Falls back to international auto-detection (if enabled)
   - Shows clear error: "Please enter a valid phone number (e.g. 0412 345 678, (07) 3210 1234, +61 412 345 678, +1 555 123 4567)."

3. **Processing**: Converts to E.164 format for storage
   - All formats → E.164 (e.g. `+12345678901`)
   - Consistent data for integrations
   - Maintains original input validation

4. **Integration**: Perfect for external services
   - Zapier webhooks receive normalised format
   - HubSpot integration without format issues
   - API endpoints get consistent data structure

## Example Data Flow

```
Input: 0412 345 678
↓ Validation (passes - detected as Australian)
↓ Processing
Output: +61412345678 (stored & sent to integrations)
```

## Error Handling

Invalid inputs show user-friendly messages:

```
Input: 123
Error: "Please enter a valid phone number (e.g. 0412 345 678, (07) 3210 1234, +61 412 345 678, +1 555 123 4567)."
```

## Development

To contribute or modify:

1. Clone the repository
2. Install dependencies: `composer install`
3. Make changes to `src/Fieldtypes/PhoneNumberField.php`
4. Test in a Statamic project

## Changelog

### 1.0.0
- Initial release
- Phone number validation and E.164 formatting with Australia-first detection
- Support for Australian local and international formats
- Form and collection support
- Custom validation messages

## License

MIT License. See [LICENSE](LICENSE) for details.

## Support

- [GitHub Issues](https://github.com/visual1au/statamic-phone-fieldtype/issues)
- [Documentation](https://github.com/visual1au/statamic-phone-fieldtype)

## Credits

Built with:
- [Statamic CMS](https://statamic.com)
- [Laravel-Phone](https://github.com/Propaganistas/Laravel-Phone)
- [libphonenumber](https://github.com/google/libphonenumber) (via Laravel-Phone)
