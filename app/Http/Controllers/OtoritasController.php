<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menutable;
use App\Otoritas;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
class OtoritasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = Auth::user()->email;
        $query = "SELECT u.email,o.role_id,r.role_name,d.menu_id,mt.menu_link, mt.menu_name FROM users u
        inner join otoritas o on u.email = o.user_email
        inner join role r on o.role_id = r.id
        left join detail d on d.role_id = o.role_id
        inner join menutable mt on mt.id = d.menu_id where u.email = '$email'";
        $results = DB::select($query);


        $otoritas = "SELECT o.id, o.user_email, r.role_name  FROM otoritas o inner join role r on r.id = o.role_id";
        $otoritasresult = DB::select($otoritas);
        return view("admin.otoritas.index")->with('menus',$results)->with('otoritasresult',$otoritasresult);
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
        $otoritas = new Otoritas;
        $otoritas->role_id = $request->input('role_id');
        $otoritas->user_email = $request->input('user_email');
        $otoritas->save();
        return redirect('/admin/otoritas')->with('success','otoritas created');
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
        $otoritas = Otoritas::find($id);
        $otoritas->delete();
        return redirect('/admin/otoritas')->with('success','otoritas deleted');
    }
}
