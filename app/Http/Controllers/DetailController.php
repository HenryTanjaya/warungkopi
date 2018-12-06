<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Menutable;
use App\Detail;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
class DetailController extends Controller
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

        $detailquery = "SELECT d.id, o.user_email, r.role_name, d.menu_id, mt.menu_name  FROM otoritas o inner join role r on r.id = o.role_id left join detail d on d.role_id = r.id inner join menutable mt on mt.id = d.menu_id order by r.role_name";
        $detailresults = DB::select($detailquery);
        return view("admin.detail.index")->with('details',$detailresults)->with('menus',$results);
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
        $detail = new Detail;
        $detail->role_id = $request->input('role_id');
        $detail->menu_id = $request->input('menu_id');
        $detail->save();
        return redirect('/admin/detail')->with('success','detail created');
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

        $detail = Detail::find($id);
        $detail->delete();
        return redirect('/admin/detail')->with('success','detail deleted');
    }
}
