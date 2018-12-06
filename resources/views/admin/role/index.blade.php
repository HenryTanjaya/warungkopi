@extends('layouts.adminapp')

@section('admincontent')
  <h3>Role</h3>
  <form action="{{ action('RoleController@store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="Role Name">Role Name</label>
      <input type="text" name="role_name" class="form-control" aria-describedby="category" placeholder="Enter Role Name">
    </div>
    <div class="form-group">
      <label for="Role Description">Role Description</label>
      <input type="text" name="role_description" class="form-control" aria-describedby="category" placeholder="Enter Role Description">
    </div>
    <input type="submit" class="btn btn-success">
</form>

<table class="table">
  <tr>
    <td>Id</td>
    <td>Role Name</td>
    <td>Role Description</td>
    <td>Delete</td>
  </tr>
  @foreach ($roleresults as $role)
    <tr>
      <td>{{$role->id}}</td>
      <td>{{$role->role_name}}</td>
      <td>{{$role->role_description}}</td>
      <td>
        <form action="{{action('RoleController@destroy', ['id' => $role->id])}}" method="post">
          @csrf
          <input name="_method" type="hidden" value="DELETE">
          <input type="submit" value="DELETE" class="btn btn-danger">
        </form>
      </td>
    </tr>
  @endforeach
</table>

@endsection
