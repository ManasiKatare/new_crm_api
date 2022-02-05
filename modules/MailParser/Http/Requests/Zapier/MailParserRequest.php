<?php

namespace Modules\MailParser\Http\Requests\Zapier;

use Config;
use Modules\Boilerplate\Http\FormRequest;

class MailParserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Config::get('crmomni-validation.request_handler.mailparser.zapier.validation_rules');
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