<?php

namespace App\Http\Requests;

use App\Models\Data;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDataRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:datas,id',
        ];
    }
}
