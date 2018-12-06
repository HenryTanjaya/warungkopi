@extends('layouts.adminapp')

@section('admincontent')
  <form action="{{ action('DetailController@store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="Role Name">Role Id</label>
      <input type="text" name="role_id" class="form-control" aria-describedby="category" placeholder="Enter Role Id">
    </div>
    <div class="form-group">
      <label for="Role Description">Menu Id</label>
      <input type="text" name="menu_id" class="form-control" aria-describedby="category" placeholder="Enter Menu Id">
    </div>
    <input type="submit" class="btn btn-success">
</form>

<table class="table">
  <tr>
    <td>Role Id</td>
    <td>Role</td>
    <td>Menu Id</td>
    <td>Menu Name</td>
    <td>Delete</td>
  </tr>
  @foreach($details as $detail)
    <tr>
      <td>{{$detail->user_email}}</td>
      <td>{{$detail->role_name}}</td>
      <td>{{$detail->menu_id}}</td>
      <td>{{$detail->menu_name}}</td>
      <td>
        <form action="{{action('DetailController@destroy', ['id' => $detail->id])}}" method="post">
          @csrf
          <input name="_method" type="hidden" value="DELETE">
          <input type="submit" value="DELETE" class="btn btn-danger">
        </form>
      </td>
    </tr>
  @endforeach
</table>
@endsection
