<?php

namespace Modules\Customer\Http\Requests\Frontend\Customer;

use Config;
use Modules\Boilerplate\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function rules()
    {
        return Config::get('omnicrm-validation.request_handler.auth.change_password.validation_rules');
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
