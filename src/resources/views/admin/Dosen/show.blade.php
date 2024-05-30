@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dosen.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dosens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dosen.fields.id') }}
                        </th>
                        <td>
                            {{ $dosen->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dosen.fields.name') }}
                        </th>
                        <td>
                            {{ $dosen->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dosen.fields.fullname') }}
                        </th>
                        <td>
                            {{ $dosen->fullname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dosen.fields.code') }}
                        </th>
                        <td>
                            {{ $dosen->code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dosens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection