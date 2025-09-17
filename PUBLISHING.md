# Publishing to Packagist

## Steps to Publish

### 1. Create GitHub Repository

1. Create a new repository on GitHub: `visual1au/statamic-phone-fieldtype`
2. Copy all files from this `packages/statamic-phone-fieldtype` directory to the repository root
3. Commit and push to GitHub

### 2. Submit to Packagist

1. Go to [Packagist.org](https://packagist.org)
2. Sign in with GitHub account
3. Click "Submit" in the top menu
4. Enter repository URL: `https://github.com/visual1au/statamic-phone-fieldtype`
5. Click "Check" to validate the package
6. Submit the package

### 3. Auto-updating (Recommended)

1. Go to your package page on Packagist
2. Click on your username → "Your packages"
3. Find your package and click "Settings"
4. Set up GitHub webhook for auto-updates when you push new versions

### 4. Tagging Versions

To release versions, use Git tags:

```bash
# Create and push version tags
git tag v1.0.0
git push origin v1.0.0

# For updates
git tag v1.0.1
git push origin v1.0.1
```

### 5. Installation Command

Once published, users can install with:

```bash
composer require visual1au/statamic-phone-fieldtype
```

## Package Structure

```
statamic-phone-fieldtype/
├── src/
│   ├── Fieldtypes/
│   │   └── PhoneNumberField.php
│   └── ServiceProvider.php
├── composer.json
├── README.md
├── LICENSE
├── .gitignore
└── PUBLISHING.md
```

## Notes

- Package name: `visual1au/statamic-phone-fieldtype`
- Namespace: `Visual1\StatamicPhoneFieldType`
- Type: `statamic-addon`
- Auto-discovery enabled for Laravel/Statamic
- MIT License
- Supports Statamic 4.0+ and 5.0+
- Country-agnostic validation
