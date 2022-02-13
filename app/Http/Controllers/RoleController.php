<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('systems.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name'=> 'required|string|min:3',
        ]);
        // DB::enableQueryLog();
        Role::create($data);
        // dd(DB::getQueryLog());

        // $role = new Role();
        // $role->name=$request->name;
        // $role->guard_name=$request->guard_name;
        // dd($role->save());


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
        $reqRole = Role::findOrFail($id);
        // dd($reqRole->name);

        return view('systems.role.show', compact('reqRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reqRole = Role::findOrFail($id);
        // dd($reqRole->name);

        return view('systems.role.edit', compact('reqRole'));
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
        $request->validate([
            'name'=> 'required|unique:roles,name'
        ]);
        $reqRole = Role::findOrFail($id);
        $reqRole->name = $request->name;
        $reqRole->update();

        // dd($request);

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

        return redirect('/role')->with('status', 'Role Deleted Successfully.');
    }
}
