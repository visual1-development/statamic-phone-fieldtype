<?php

namespace StatamicPhoneFieldtype;

use StatamicPhoneFieldtype\Fieldtypes\PhoneNumberField;
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