<?php

namespace App\Services\Validation;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\Support\Arr;

class CustomValidation extends Validator
{
    public function validateEmptyIf($attribute, $value, $parameters)
    {
        $data = request()->input($parameters[0]);
        $parameters_values = array_slice($parameters, 1);
        foreach ($parameters_values as $parameter_value) {
            if ($data == $parameter_value && !empty($value)) {
                return false;
            }
        }
        return true;
    }

    protected function replaceEmptyIf($message, $attribute, $rule, $parameters)
    {
        $parameters[1] = $this->getDisplayableValue($parameters[0], Arr::get($this->data, $parameters[0]));
        $parameters[0] = $this->getAttribute($parameters[0]);

        return str_replace([':other', ':value'], $parameters, $message);
    }
}
