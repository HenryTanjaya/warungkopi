<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Menu;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders =  Order::all();
        $data = array();
        foreach($orders as $key=>$order){
          $menus = array();
          $menuprice = array();
          $menuqty = array();
          $orderid = $order->id;
          $orderqty = unserialize($order->qty);
          $ordermenu = unserialize($order->menu);
          $orderdetail=new class{};
          foreach ($ordermenu as $key => $menu) {
            $currentMenu = Menu::find($menu);
            $titles = $currentMenu->title;
            $prices = $currentMenu->price;
            array_push($menus,$titles);
            array_push($menuprice,$prices);
          }
          array_push($menuqty,$orderqty);
          $orderdetail->orderid=$orderid;
          $orderdetail->menus=$menus;
          $orderdetail->pricings=$menuprice;
          $orderdetail->quantities=$orderqty;
          array_push($data,$orderdetail);
        }
        return view('order.index')->with('orders',$data);

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
        $data = $request->request->all();
        $menu=array();
        $order = new Order;
        $qty=array();
        foreach ($data as $key => $d) {
          if($d == ""){
          }else if($key=="_token"){
          }else{
            array_push($menu,$key);
            array_push($qty,$d);
          }
        }
        $order->menu=serialize($menu);
        $order->qty=serialize($qty);
        $order->save();
        return redirect('/menu')->with('orders',$order);
        // dd($data["2"]);
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
        $order = Order::find($id);
        $order->delete();
        return redirect('/order')->with('success','order deleted');
    }
}
