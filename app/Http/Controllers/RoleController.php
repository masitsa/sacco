<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\User;
use Auth;

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
        return view('roles.index', compact(['roles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }
    public function viewUserRole($id)
    {
        $user = User::find($id);
        $allroles = Role::all();
        // dd($user);
        return view('admins.viewuserrole', compact('user', 'allroles'));
    }
    public function storeUserRole(Request $request, $id)
    {
        $this->validate(request(), [
            'role_id' => 'required|unique:role_user',

        ]);
        $role = $request->role_id;

        $user = User::find($id);
       
        
        // App\User::find(1)->roles()->save($role, ['expires' => $expires]);
        // $user->roles()->attach($role);

        $user->roles()->attach($role, array('role_user_status' => 1, 'deleted' => 0, 'created_by' => Auth::user()->id));
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'role_name' => 'required',
            'role_status' => 'required'

        ]);

        Role::create([
            'role_name' => $request->role_name,
            'role_status' => $request->role_status,
            'created_by' => Auth::user()->id,
        ]);
        $roles = Role::all();
        return view('roles.index', compact(['roles']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.edit', compact('role'));
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
        $this->validate(request(), [
            'role_name' => 'required',
            'role_status' => 'required'
        ]);
        Role::where('id', $id)
            ->update(request(['role_name', 'role_status']));
        return redirect('/roles');
    }
    public function updateUserRole(Request $request, $id)
    {
        $role = $request->role_id;
        $role_user_status = $request->role_user_status;
        $user = User::find($id);
        // dd($role_user_status);
        $user->roles()->updateExistingPivot($role, array('role_user_status' => $role_user_status));
        // session()->flash("successful update");
        return redirect('/userrole/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Role::where('id', $id)
            ->update([
                'deleted' => 1, 'deleted_on' => date('Y-m-d H:i:s'), 'deleted_by' => Auth::user()->id
            ]);
        return redirect('/roles');
    }
    public function destroyUserRole(Request $request, $id)
    {
        $role = $request->role_id;
        $user = User::find($id);
        // $user->roles()->detach($role);
        $user->roles()->updateExistingPivot($role, array('deleted' => 1, 'deleted_on' => date('Y-m-d H:i:s'), 'deleted_by' => Auth::user()->id));
        session()->flash("Role deleted successfully");
        return back();
    }
}
