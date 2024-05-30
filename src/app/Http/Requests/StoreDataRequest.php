<?php

namespace App\Http\Requests;

use App\Models\Data;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'fullname' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable'
            ]
        ];
    }
}
