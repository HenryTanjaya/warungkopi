@extends('layouts.app')

@section('content')
<div class="container">
  <div class="py-3">
    <h4>List Order</h4>
    @foreach ($orders as $key => $order)
      <h5>Order id :{{$order->orderid}}
      <form action="{{route('order.destroy', ['id' => $order->orderid])}}" method="post">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
        <input type="submit" value="DELETE" class="btn btn-danger">
      </form>
      </h5>
      @for($i=0;$i<count($order->pricings);$i++)
        <ul class="list-group">
          <li class="list-group-item">{{$order->menus[$i]}} - {{$order->quantities[$i]}}x - Rp.{{$order->pricings[$i]}}</li>
        </li>
      @endfor

    @endforeach
  </div>
</div>



@endsection
