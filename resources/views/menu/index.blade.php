@extends('layouts.app')

@section('content')
<div class="container">
  @guest
  @else
  <div class="py-3">
    <a href="/menu/create" class="btn btn-primary">Add Menu</a>
    <a href="/category/create" class="btn btn-primary">Add Category</a>
    <a href="/type/create" class="btn btn-primary">Add Type</a>
  </div>
@endguest
  <form  action="{{ action('OrderController@store') }}" method="post" enctype="multipart/form-data">
    @csrf
  @foreach ($categories as $key => $category)
    <h5>{{$category->title}}</h5>
    <div class="row pb-2">
    <?php
      $abc = $category->title;
    ?>
    @foreach ($menus->$abc as $key => $menu)
        <div class="col-3">
          <div class="card">
            <img class="card-img-top" src="{{$menu->image}}" style="height:150px; object-fit:cover;" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">
                {{$menu->title}}<br>Rp.{{$menu->price}}<br>
                @guest
                @else
                  <div class="form-group">
                    <label for="Quantity">Quantity</label>
                    <input type="number" min="0" name={{$menu->id}} class="form-control" aria-describedby="Quantity" placeholder="Qty">
                  </div>
                @endguest
              </p>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{str_replace(' ', '', $menu->title)}}">
              Details
            </button>

            <!-- Modal -->
            <div class="modal fade" id="{{str_replace(' ', '', $menu->title)}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$menu->title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    {{$menu->description}}
                    <br>
                    @guest
                    @else
                    <a href="/menu/{{$menu->id}}/edit" class="btn btn-primary">Edit</a>
                  @endguest
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    @endforeach
  </div>
  @endforeach
  @guest
  @else
  <input type="submit" class="btn btn-success">
  @endguest
</form>
</div>



@endsection
