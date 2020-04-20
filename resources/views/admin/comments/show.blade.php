@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.comment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.id') }}
                        </th>
                        <td>
                            {{ $comment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.comment') }}
                        </th>
                        <td>
                            {{ $comment->comment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.from_user') }}
                        </th>
                        <td>
                            {{ $comment->from_user }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.product') }}
                        </th>
                        <td>
                            {{ $comment->product }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.created_at') }}
                        </th>
                        <td>
                            {{ $comment->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comment.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $comment->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection