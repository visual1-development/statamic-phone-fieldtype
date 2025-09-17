# Statamic Phone Number Fieldtype

A Statamic fieldtype for phone number validation and E.164 formatting using Laravel-Phone. Perfect for forms and collections that need consistent phone number handling.

## Features

- ✅ **Multi-format Input**: Accepts various phone formats (0412 345 678, (07) 3210 1234, +61 412 345 678)
- ✅ **Auto Validation**: Validates phone numbers using Laravel-Phone with Australia-first detection
- ✅ **E.164 Normalization**: Automatically converts valid numbers to E.164 format (+61412345678)
- ✅ **Form Compatible**: Works in Statamic forms with custom validation messages
- ✅ **Integration Ready**: Ensures consistent format for Zapier, HubSpot, and other integrations
- ✅ **User-Friendly**: Clear error messages with format examples

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
              placeholder: 'e.g. 0412 345 678, (07) 3210 1234, +61 412 345 678'
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
              placeholder: 'Enter phone number'
            handle: phone_number
```

### Configuration Options

The fieldtype supports standard text field options:

- `placeholder`: Placeholder text
- `default`: Default value
- `prepend`: Text to prepend
- `append`: Text to append

## How It Works

1. **User Input**: User enters phone number in any common format
   - `0412 345 678`
   - `(07) 3210 1234`
   - `+61 412 345 678`
   - `04 1234 5678`

2. **Validation**: Built-in validation with friendly error messages
   - Prioritizes Australian format detection
   - Falls back to international auto-detection
   - Shows clear error: "Please enter a valid phone number (e.g. 0412 345 678, (07) 3210 1234, or +61 412 345 678)."

3. **Processing**: Converts to E.164 format for storage
   - All formats → `+61412345678`
   - Consistent data for integrations
   - Maintains original input validation

4. **Integration**: Perfect for external services
   - Zapier webhooks receive normalized format
   - HubSpot integration without format issues
   - API endpoints get consistent data structure

## Example Data Flow

```
Input: 0412 345 678
↓ Validation (passes)
↓ Processing
Output: +61412345678 (stored & sent to integrations)
```

## Error Handling

Invalid inputs show user-friendly messages:

```
Input: 123
Error: "Please enter a valid phone number (e.g. 0412 345 678, (07) 3210 1234, or +61 412 345 678)."
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
- Phone number validation and E.164 formatting
- Australia-first detection with auto-fallback
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
