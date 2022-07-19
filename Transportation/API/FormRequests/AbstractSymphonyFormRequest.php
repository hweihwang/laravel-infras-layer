<?php

declare(strict_types=1);

namespace Support\Transportation\API\FormRequests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Support\Exceptions\Exceptions\InvalidRequestException;
use Support\Transportation\API\Concerns\APIFoundationTrait;

abstract class AbstractSymphonyFormRequest extends FormRequest implements FormRequestInterface
{
    use APIFoundationTrait;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @throws InvalidRequestException
     */
    public function failedValidation(Validator $validator)
    {
        throw (new InvalidRequestException())->setErrors($validator->errors()->all());
    }
}
