@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mhs.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mhss.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mhs.fields.id') }}
                        </th>
                        <td>
                            {{ $mhs->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mhs.fields.name') }}
                        </th>
                        <td>
                            {{ $mhs->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mhs.fields.fullname') }}
                        </th>
                        <td>
                            {{ $mhs->fullname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mhs.fields.phone') }}
                        </th>
                        <td>
                            {{ $mhs->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mhs.fields.email') }}
                        </th>
                        <td>
                            {{ $mhs->email }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mhss.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection