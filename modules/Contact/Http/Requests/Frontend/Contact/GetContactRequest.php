<?php

namespace Modules\Contact\Http\Requests\Frontend\Contact;

use Config;
use Modules\Boilerplate\Http\FormRequest;

class FetchContactRequest extends FormRequest
{
    public function rules()
    {
        return Config::get('crmomni-validation.request_handler.frontend.contact.show.validation_rules');
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
