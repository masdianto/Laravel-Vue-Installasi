<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage_roles');
    }

    public function index()
    {
        return Role::with('permissions')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        return Role::create($request->all());
    }

    public function show(Role $role)
    {
        return $role->load('permissions');
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update($request->all());

        return $role;
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json(null, 204);
    }

    public function assignPermission(Request $request, Role $role)
    {
        $request->validate([
            'permission_id' => 'required|exists:permissions,id',
        ]);

        $role->permissions()->attach($request->permission_id);

        return response()->json(null, 204);
    }

    public function revokePermission(Request $request, Role $role)
    {
        $request->validate([
            'permission_id' => 'required|exists:permissions,id',
        ]);

        $role->permissions()->detach($request->permission_id);

        return response()->json(null, 204);
    }
}
