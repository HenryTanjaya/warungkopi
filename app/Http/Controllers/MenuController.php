<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Category;
use App\Type;
use DB;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth',['except'=>['index']]);
     }

    public function index()
    {
        //
        $categories = Category::all();
        $array = array();
        $menuAll = Menu::all();
        $data = new class{};
        foreach($categories as $key=>$category){
          $categorytitle = $category->title;
          $data->$categorytitle = array();
        }
        foreach($menuAll as $key => $menu) {
          $categorytitle = $menu->category;
          array_push($data->$categorytitle,$menu);
        }
        // dd($data->Food);
        // return view("menu.index")->with('menus',$data);
        return view("menu.index")->with('menus',$data)->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $types = Type::all();
        return view("menu.create")->with("categories",$categories)->with("types",$types);

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
        $this->validate($request,[
          'title'=>'required',
          'category'=>'required',
          'type'=>'required',
          'price'=>'required',
          'image'=>'required',
          'description'=>'required',
        ]);
        $menu = new Menu;
        $menu->title = $request->input('title');
        $menu->category = $request->input('category');
        $menu->type = $request->input('type');
        $menu->price = $request->input('price');
        $menu->image = $request->input('image');
        $menu->description = $request->input('description');
        $menu->save();
        return redirect('/menu')->with('success','menu created');
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
        $menu= Menu::find($id);
        $categories = Category::all();

        $types = Type::all();
        return view("menu.edit")->with('menu',$menu)->with("categories",$categories)->with("types",$types);
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
        $this->validate($request,[
          'title'=>'required',
          'category'=>'required',
          'type'=>'required',
          'price'=>'required',
          'image'=>'required',
          'description'=>'required',
        ]);
        $menu = Menu::find($id);
        $menu->title = $request->input('title');
        $menu->category = $request->input('category');
        $menu->type = $request->input('type');
        $menu->price = $request->input('price');
        $menu->image = $request->input('image');
        $menu->description = $request->input('description');
        $menu->save();
        return redirect('/menu')->with('success','menu edited');
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
    }
}
