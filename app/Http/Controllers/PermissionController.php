<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = Permission::all();

        // dd($permission);
        return view('systems.permission.index', compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('systems.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name'=>'required|unique:permissions'
        ]);

        Permission::create($request->all());

        return redirect('/role')->with('status', 'Permission Added Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reqPer = Permission::findOrFail($id);
        // dd($reqPer);
        return view('systems.permission.show', compact('reqPer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reqPer = Permission::findOrFail($id);
        return view('systems.permission.edit', compact('reqPer'));
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
        $reqPer = Permission::findOrFail($id);

        $data = $request->validate([
            'name'=> 'required|unique:permissions,name'
        ]);

        $reqPer->update($data);

        return redirect('/permission')->with('status', 'Permission Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reqPer = Permission::findOrFail($id);
        $reqPer->delete();
        return response('Role Deleted Successfully.', 200);
        // return redirect('/permission')->with('status', 'Permission Deleted Successfully.');

    }

    // public function destroy(Role $role){
    //     // dd($role);
    //     $role->delete();
    //     return response('Role Deleted Successfully.', 200);
    // }
}
