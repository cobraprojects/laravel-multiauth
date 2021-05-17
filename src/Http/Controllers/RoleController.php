<?php

namespace CobraProjects\Multiauth\Http\Controllers;

use Illuminate\Http\Request;
use CobraProjects\Multiauth\Model\Role;
use Illuminate\Routing\Controller;
use CobraProjects\Multiauth\Model\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permitTo:ReadRole')->only('index');
        $this->middleware('permitTo:CreateRole')->only('create', 'store');
        $this->middleware('permitTo:UpdateRole')->only('edit', 'update');
        $this->middleware('permitTo:DeleteRole')->only('destroy');
    }

    public function index()
    {
        $roles = auth()->id() == 1 ? Role::all() : Role::where('id', '!=', 1)->get();
        return view('multiauth::roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all()->groupBy('parent');
        return view('multiauth::roles.create', compact('permissions'));
    }

    public function edit(Role $role)
    {
        $role        = $role->load('permissions');
        $permissions = Permission::all()->groupBy('parent');
        return view('multiauth::roles.edit', compact('role', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $role = Role::create($request->all());
        $role->addPermission($request->permissions);
        return redirect(route('admin.roles'))->with('message', 'New Role is stored successfully successfully');
    }

    public function update(Role $role, Request $request)
    {
        $request->validate(['name' => 'required']);

        $role->update($request->all());
        $role->syncPermissions($request->permissions);

        return redirect(route('admin.roles'))->with('message', 'You have updated Role successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->back()->with('message', 'You have deleted Role successfully');
    }
}
