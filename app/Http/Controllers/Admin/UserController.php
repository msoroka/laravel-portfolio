<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @return View
     */
    public function index()
    : View
    {
        return view('admin.users.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * @return View
     */
    public function create()
    : View
    {
        return view('admin.users.create', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * @param  CreateUserRequest  $request
     * @return RedirectResponse
     */
    public function store(CreateUserRequest $request)
    : RedirectResponse {
        $data = $request->validated();

        if (User::create($data)) {
            flash('User created')->success();

            return redirect()->route('admin.users.index');
        }

        flash('Error while user creating')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    /**
     * @param  User  $user
     * @return View
     */
    public function edit(User $user)
    : View {
        return view('admin.users.edit', [
            'user'  => $user,
            'roles' => Role::all(),
        ]);
    }

    /**
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    : RedirectResponse {
        $data = $request->validated();

        if ($data['password'] == null) {
            unset($data['password']);
        }

        if ($user->update($data)) {
            flash('User edited')->success();

            return redirect()->route('admin.users.index');
        }

        flash('Error while user editing')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    /**
     * @param  User  $user
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(User $user)
    : RedirectResponse {
        if ($user->delete()) {
            flash('User deleted')->success();

            return redirect()->route('admin.users.index');
        }

        flash('Error while user removing')->error();

        return redirect()->route('admin.users.index');

    }
}
