<?php

namespace Modules\ServiceRequest\Http\Requests\Backend\Event;

use Config;
use Modules\Boilerplate\Http\FormRequest;

class FetchEventRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Config::get('crmomni-validation.request_handler.backend.event.fetch.validation_rules');
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
