<?php

namespace App\Http\Requests;

use App\Traits\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreAdsRequest extends FormRequest
{
    use ResponseTrait;
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'advertiser_id' => 'required|numeric|exists:advertisers,id',
            'category_id' => 'required|numeric|exists:categories,id',
            'title' => 'required|max:30',
            'type' => 'sometimes|string|in:free,paid',
            'description' => 'required|string|max:100',
            'tags' => 'sometimes|array',
            'tags.*' => 'sometimes|integer',
            'start_date' => 'required|date_format:"Y-m-d',
        ];
    }

    public $validator = null;
    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
