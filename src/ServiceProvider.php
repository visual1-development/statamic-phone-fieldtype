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
        //
    }
}