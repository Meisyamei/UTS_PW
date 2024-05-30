<?php

namespace App\Http\Requests;

use App\Models\Mhs;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMhsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mhs_edit');
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
            'phone' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
        ];
    }
}
