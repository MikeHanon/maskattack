<?php

namespace App\Http\Controllers\MetaUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMetaUserRequest;
use App\Http\Requests\StoreMetaUserRequest;
use App\Http\Requests\UpdateMetaUserRequest;
use App\MetaUser;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MetaUserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('meta_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metaUsers = MetaUser::all();

        return view('admin.metaUsers.index', compact('metaUsers'));
    }

    public function create()
    {
        abort_if(Gate::denies('meta_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.metaUsers.create');
    }

    public function store(StoreMetaUserRequest $request)
    {
        $userId= Auth::user()->id;
        $data = $request->request->add(['user' => $userId]);
        $metaUser = MetaUser::create($request->all());

        return redirect()->route('admin.meta-users.index');

    }

    public function edit(MetaUser $metaUser)
    {
        abort_if(Gate::denies('meta_user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.metaUsers.edit', compact('metaUser'));
    }

    public function update(UpdateMetaUserRequest $request, MetaUser $metaUser)
    {
        $metaUser->update($request->all());

        return redirect()->route('admin.meta-users.index');

    }

    public function show(MetaUser $metaUser)
    {
        abort_if(Gate::denies('meta_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.metaUsers.show', compact('metaUser'));
    }

    public function destroy(MetaUser $metaUser)
    {
        abort_if(Gate::denies('meta_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metaUser->delete();

        return back();

    }

    public function massDestroy(MassDestroyMetaUserRequest $request)
    {
        MetaUser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
