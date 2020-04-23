<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMetaUserRequest;
use App\Http\Requests\UpdateMetaUserRequest;
use App\Http\Resources\Admin\MetaUserResource;
use App\MetaUser;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MetaUserApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('meta_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MetaUserResource(MetaUser::all());

    }

    public function store(StoreMetaUserRequest $request)
    {
        $metaUser = MetaUser::create($request->all());

        return (new MetaUserResource($metaUser))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(MetaUser $metaUser)
    {
        abort_if(Gate::denies('meta_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MetaUserResource($metaUser);

    }

    public function update(UpdateMetaUserRequest $request, MetaUser $metaUser)
    {
        $metaUser->update($request->all());

        return (new MetaUserResource($metaUser))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(MetaUser $metaUser)
    {
        abort_if(Gate::denies('meta_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metaUser->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
