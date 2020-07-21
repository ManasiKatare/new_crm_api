<?php

namespace Modules\Customer\Http\Requests\Frontend\Auth;

use Config;
use Modules\Boilerplate\Http\FormRequest;

class CustomerRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Config::get('omnicrm-validation.request_handler.frontend.customer.register.validation_rules');
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
