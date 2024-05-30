<?php

namespace App\Http\Requests;

use App\Models\Mhs;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMhsRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mhs_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mhss,id',
        ];
    }
}
