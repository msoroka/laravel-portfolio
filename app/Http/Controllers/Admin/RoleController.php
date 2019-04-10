<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * @return View
     */
    public function index()
    : View
    {
        return view('admin.roles.index', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * @return View
     */
    public function create()
    : View
    {
        return view('admin.roles.create');
    }

    /**
     * @param  CreateRoleRequest  $request
     * @return RedirectResponse
     */
    public function store(CreateRoleRequest $request)
    : RedirectResponse {
        $data = $request->validated();

        if (Role::create($data)) {
            flash('Role created')->success();

            return redirect()->route('admin.roles.index');
        }

        flash('Error while role creating')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    /**
     * @param  Role  $role
     * @return View
     */
    public function edit(Role $role)
    : View {
        return view('admin.roles.edit', [
            'role' => $role,
        ]);
    }

    /**
     * @param  UpdateRoleRequest  $request
     * @param  Role  $role
     * @return RedirectResponse
     */
    public function update(UpdateRoleRequest $request, Role $role)
    : RedirectResponse {
        $data = $request->validated();

        if ($role->update($data)) {
            flash('Role edited')->success();

            return redirect()->route('admin.roles.index');
        }

        flash('Error while role editing')->error();

        return redirect()->back()->withErrors()->withInput();
    }

    /**
     * @param  Role  $role
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Role $role)
    : RedirectResponse {
        if ($role->delete()) {
            flash('Role deleted')->success();

            return redirect()->route('admin.roles.index');
        }

        flash('Error while role removing')->error();

        return redirect()->route('admin.roles.index');
    }
}
