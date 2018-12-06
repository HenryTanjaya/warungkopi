<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menutable;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;


class MenutableController extends Controller
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

      $menusresults = DB::select("select * from menutable");
      return view("admin.menutable.index")->with('menus',$results)->with("menusresults",$menusresults);
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
        $menutable = new Menutable;
        $menutable->menu_name = $request->input('menu_name');
        $menutable->menu_link = $request->input('menu_link');
        $menutable->save();
        return redirect('/admin/menutable')->with('success','menutable created');
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
        $menutable = Menutable::find($id);
        $menutable->delete();
        return redirect('/admin/menutable')->with('success','menutable deleted');
    }
}
