<?php

namespace Visual1\StatamicPhoneFieldType;

use Visual1\StatamicPhoneFieldType\Fieldtypes\PhoneNumberField;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $fieldtypes = [
        PhoneNumberField::class,
    ];

    public function bootAddon()
    {
        $this->publishes([
            __DIR__.'/../config/phone-fieldtype.php' => config_path('phone-fieldtype.php'),
        ], 'phone-fieldtype-config');

        $this->mergeConfigFrom(__DIR__.'/../config/phone-fieldtype.php', 'phone-fieldtype');
    }
}