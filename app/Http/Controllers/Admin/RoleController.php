<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::all();

        return view('admins.roles.roles',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions=Permission::all();
        return view('admins.roles.createRole',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string',
            'guard_name'=>'required|in:seller,admin',
            'arrayPermissions.*'=>'nullable'
        ]);
        $permissions=Permission::all();

        $arrayPermissions=$request->input('arrayPermissions');
        if (isset($arrayPermissions) && !empty($arrayPermissions))
        {
            $errors = []; // Initialize an empty array to store errors

            foreach ($permissions as $permission)
            {
                foreach ($arrayPermissions as $selectedPermission) {
                    if ($permission->name === $selectedPermission) {
                        // Check if the guard_name does not match
                        if ($permission->guard_name !== $request->input('guard_name') && $selectedPermission!='delete_product' ) {
                            $guardName = $request->input('guard_name');
                            // Add the error to the errors array
                            $errors[] = "This Guard [$guardName] is not allowed to take this permission: " . $permission->name;
                        }


                    }
                }
            }
            // If there are errors, return back with the errors
            if (!empty($errors))
            {
                return back()->withErrors($errors);
            }
        }

        $role=Role::create([
            'name'=>$request->input('name'),
            'guard_name'=>$request->input('guard_name'),
        ]);

        foreach ($arrayPermissions as $permission)
        {
            $role->givePermissionTo($permission);
        }

        return to_route('back.roles.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
