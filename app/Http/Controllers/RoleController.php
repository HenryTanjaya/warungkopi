<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Menutable;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $email = Auth::user()->email;
        $query = "SELECT u.email,o.role_id,r.role_name,d.menu_id,mt.menu_link, mt.menu_name FROM users u
        inner join otoritas o on u.email = o.user_email
        inner join role r on o.role_id = r.id
        left join detail d on d.role_id = o.role_id
        inner join menutable mt on mt.id = d.menu_id where u.email = '$email'";
        $results = DB::select($query);
        $roleresults = DB::select("select * from role");
        return view("admin.role.index")->with('menus',$results)->with('roleresults',$roleresults);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $role = new Role;
        $role->role_name = $request->input('role_name');
        $role->role_description = $request->input('role_description');
        $role->save();
        return redirect('/admin/menutable')->with('success','role created');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $role = Role::find($id);
        $role->delete();
        return redirect('/admin/role')->with('success','role deleted');
    }
}
