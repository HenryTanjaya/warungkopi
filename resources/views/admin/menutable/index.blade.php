@extends('layouts.adminapp')

@section('admincontent')
  <h3>Menu</h3>
  <form action="{{ action('MenutableController@store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="Menu Name">Add Menu Table</label>
      <input type="text" name="menu_name" class="form-control" aria-describedby="category" placeholder="Enter Menu Name">
    </div>
    <div class="form-group">
      <label for="Menu Link">Add Menu Link</label>
      <input type="text" name="menu_link" class="form-control" aria-describedby="category" placeholder="Enter Menu Link">
    </div>
    <input type="submit" class="btn btn-success">
</form>

<table class="table">
  <tr>
    <td>Id</td>
    <td>Menu Name</td>
    <td>Menu Link</td>
    <td>Delete</td>
  </tr>
  @foreach ($menusresults as $menu)
    <tr>
      <td>{{$menu->id}}</td>
      <td>{{$menu->menu_name}}</td>
      <td>{{$menu->menu_link}}</td>
      <td>
        <form action="{{action('MenutableController@destroy', ['id' => $menu->id])}}" method="post">
          @csrf
          <input name="_method" type="hidden" value="DELETE">
          <input type="submit" value="DELETE" class="btn btn-danger">
        </form>
      </td>
    </tr>
  @endforeach
</table>

@endsection
