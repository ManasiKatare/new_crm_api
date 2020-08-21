<?php

namespace Modules\User\Http\Requests\Backend\User;

use Config;
use Modules\Boilerplate\Http\FormRequest;

class SaveUserAvailabilityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Config::get('crmomni-validation.request_handler.backend.user.availbility.validation_rules');
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
