<?php

namespace App\Http\Requests;

use App\MetaUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMetaUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('meta_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'user'         => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647'],
            'name'         => [
                'required'],
            'adresse'      => [
                'required'],
            'acount_nbr'   => [
                'required'],
            'phone_number' => [
                'required'],
        ];

    }
}
