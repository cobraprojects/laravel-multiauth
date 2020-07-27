<?php

namespace CobraProjects\Multiauth\Http\Controllers;

use CobraProjects\Multiauth\Model\Role;
use Illuminate\Routing\Controller;
use CobraProjects\Multiauth\Model\Admin;

class AdminRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super');
    }

    public function attach(Admin $admin, Role $role)
    {
        $admin->roles()->attach($role->id);

        return redirect()->back();
    }

    public function detach(Admin $admin, Role $role)
    {
        $admin->roles()->detach($role->id);

        return redirect()->back();
    }
}
