<?php

namespace App\Http\Requests;

use Illuminate\Validation\ValidationException;

class ApiRequest extends Request
{
    public function response(array $errors)
    {
        throw new ValidationException($this->getValidatorInstance());
    }
}