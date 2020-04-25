<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\MetaUser;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('users.index', compact('users'));
    }



    public function store(StoreUserRequest $request)
    {

        $user = User::create($request->all());
        $insertedId = $user->id;

        $user->roles()->sync($request->input('roles', []));
        MetaUser::create(['user_id'=>$insertedId,'First_name'=>$request->First_name, 'Last_name'=>$request->Last_name]);


        return redirect()->route('users.index');

    }

    public function edit(User $user)
    {



        $metaUser = MetaUser::where('user_id', Auth::user()->id)->get();
        $user->load('metaUser');
        $user->load('roles');

        return view('users.edit', compact('user', 'metaUser'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {

        $insertedId = $user->id;
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        MetaUser::updateOrCreate([
            'user_id'=>$insertedId,
            'First_name'=>$request->First_name,
            'Last_name'=>$request->Last_name,
            'Ville'=>$request->Ville,
        ]);

        return redirect()->route('users.index');

    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');
        $user->load('metaUser');

        return view('users.show', compact('user'));


    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();

    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
