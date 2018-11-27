@extends('layouts.app')

@section('content')
<div class="container">
  Current Type
  <ul class="list-group">
  @foreach ($types as $key => $type)
      <li class="list-group-item">{{$type->title}}</li>
  @endforeach
  </ul>
  <form action="{{ action('TypeController@store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="Category">Add Types</label>
      <input type="text" name="title" class="form-control" aria-describedby="category" placeholder="Enter New Category">
    </div>
    <div class="form-group">
      <label for="MenuCategory">Menu Category</label>
      <select name="category" class="form-control">
        <option>Default select</option>
        @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
      </select>
    </div>
    <input type="submit" class="btn btn-success">
</div>
@endsection
