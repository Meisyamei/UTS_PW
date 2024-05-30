<?php

namespace App\Http\Requests;

use App\Models\Dosen;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDosenRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dosen_create');
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
            'code' => [
                'string',
                'required',
            ],
        ];
    }
}
