@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.metaUser.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.meta-users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.metaUser.fields.id') }}
                        </th>
                        <td>
                            {{ $metaUser->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.metaUser.fields.user') }}
                        </th>
                        <td>
                            {{ $metaUser->user }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.metaUser.fields.name') }}
                        </th>
                        <td>
                            {{ $metaUser->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.metaUser.fields.adresse') }}
                        </th>
                        <td>
                            {{ $metaUser->adresse }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.metaUser.fields.acount_nbr') }}
                        </th>
                        <td>
                            {{ $metaUser->acount_nbr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.metaUser.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $metaUser->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.metaUser.fields.paypal') }}
                        </th>
                        <td>
                            {{ $metaUser->paypal }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.meta-users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection