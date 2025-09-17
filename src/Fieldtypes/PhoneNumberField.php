<?php

namespace Visual1\StatamicPhoneFieldType\Fieldtypes;

use Statamic\Fields\Fieldtype;

class PhoneNumberField extends Fieldtype
{
    protected $categories = ['text'];
    protected $selectableInForms = true;
    protected $component = 'text';

    public static function title()
    {
        return 'Phone Number';
    }

    protected function configFieldItems(): array
    {
        return [
            [
                'display' => __('Input Behavior'),
                'fields' => [
                    'placeholder' => [
                        'display' => __('Placeholder'),
                        'instructions' => __('Placeholder text for the phone number input'),
                        'type' => 'text',
                        'default' => '',
                    ],
                    'default' => [
                        'display' => __('Default Value'),
                        'instructions' => __('Default phone number value'),
                        'type' => 'text',
                    ],
                ],
            ],
            [
                'display' => __('Appearance'),
                'fields' => [
                    'prepend' => [
                        'display' => __('Prepend'),
                        'instructions' => __('Text to prepend to the input'),
                        'type' => 'text',
                    ],
                    'append' => [
                        'display' => __('Append'),
                        'instructions' => __('Text to append to the input'),
                        'type' => 'text',
                    ],
                ],
            ],
        ];
    }

    public function rules(): array
    {
        return [
            function ($attribute, $value, $fail) {
                if (empty($value)) {
                    return;
                }

                try {
                    $countries = $this->getPhoneCountries();
                    $phoneNumber = phone($value, $countries);
                    if (!$phoneNumber->isValid()) {
                        $fail('Please enter a valid phone number (e.g. 0412 345 678, (07) 3210 1234, +61 412 345 678, +1 555 123 4567).');
                    }
                } catch (\Exception $e) {
                    $fail('Please enter a valid phone number (e.g. 0412 345 678, (07) 3210 1234, +61 412 345 678, +1 555 123 4567).');
                }
            },
        ];
    }

    public function process($data)
    {
        if (empty($data)) {
            return null;
        }

        try {
            $countries = $this->getPhoneCountries();
            $phoneNumber = phone($data, $countries);
            if ($phoneNumber->isValid()) {
                return $phoneNumber->formatE164();
            }
        } catch (\Exception $e) {
            // If parsing fails, return original data
        }

        return $data;
    }

    public function preProcess($data)
    {
        return $data;
    }

    public function preProcessIndex($value)
    {
        if ($value) {
            return $this->config('prepend') . $value . $this->config('append');
        }
    }

    protected function getPhoneCountries(): array
    {
        $primaryCountry = config('phone-fieldtype.primary_country', 'AU');
        $autoFallback = config('phone-fieldtype.auto_fallback', true);

        $countries = [$primaryCountry];

        if ($autoFallback) {
            $countries[] = 'AUTO';
        }

        return $countries;
    }
}