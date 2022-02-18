<?php

namespace App\Http\Controllers;

// use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        // dd($role);
        return view('systems.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('systems.role.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input('premission'));
        $this->validate($request, [
            'name'=> 'required|unique:roles,name',
            'permission'=> 'required'
        ]);

        $role = Role::create(['name'=>$request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect('/role')->with('status', 'Role Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $rolePermissions = $role->getAllPermissions();
        // $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
        //             ->where("role_has_permissions.role_id", $id)
        //             ->get();
        return view("systems.role.show", compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::get();
        // $rolePermissions = $role->permissions;
        $rolePermissions = [];
        foreach($role->permissions as $permission){
            $rolePermissions[] = $permission->id;
        }
        return view('systems.role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required',
        ]);
        $role = Role::findOrFail($id);
        $role->name=$request->name;
        $role->save();
        $role->syncPermissions($request->input('permissions'));

        return redirect('/role')->with('status', 'Role Edit Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reqRole = Role::findOrFail($id);

        $reqRole->delete();

        return response()->json([
            'status'=> true,
            'data'=> '',
            'message'=> 'Record Deleted.',
        ]);

        // return redirect('/role')->with('status', 'Role Deleted Successfully.');
    }
}
