<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        return view('admin.users.create', [
            'roles' => Role::all(),
        ]);
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();

        if (User::create($data)) {
            flash('User created')->success();

            return redirect()->route('admin.users.index');
        }

        flash('Error while user creating')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user'  => $user,
            'roles' => Role::all(),
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if($data['password'] == null) {
            unset($data['password']);
        }

        if($user->update($data)) {
            flash('User edited')->success();

            return redirect()->route('admin.users.index');
        }

        flash('Error while user editing')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            flash('User deleted')->success();

            return redirect()->route('admin.users.index');
        }

        flash('Error while user removing')->error();

        return redirect()->route('admin.users.index');

    }
}
