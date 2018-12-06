@extends('layouts.adminapp')

@section('admincontent')
  <form action="{{ action('OtoritasController@store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="Menu Name">Add Role Id</label>
      <input type="text" name="role_id" class="form-control" aria-describedby="category" placeholder="Enter Role Id">
    </div>
    <div class="form-group">
      <label for="Menu Link">Add User Email</label>
      <input type="text" name="user_email" class="form-control" aria-describedby="category" placeholder="Enter User Email">
    </div>
    <input type="submit" class="btn btn-success">
</form>
  <table class="table">
    <tr>
      <td>Email</td>
      <td>Otoritas</td>
      <td>Delete</td>
    </tr>
    @foreach($otoritasresult as $otoritas)
      <tr>
        <td>{{$otoritas->user_email}}</td>
        <td>{{$otoritas->role_name}}</td>
        <td>
          <form action="{{action('OtoritasController@destroy', ['id' => $otoritas->id])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <input type="submit" value="DELETE" class="btn btn-danger">
          </form>
        </td>
      </tr>
    @endforeach
  </table>

@endsection
