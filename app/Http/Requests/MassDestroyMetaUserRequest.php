<?php

namespace App\Http\Requests;

use App\MetaUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMetaUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('meta_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:meta_users,id',
        ];

    }
}
