@extends('layouts.app')

@section('content')
<div class="container">
  Current Category
  <ul class="list-group">
  @foreach ($categories as $key => $category)
      <li class="list-group-item">{{$category->title}}</li>
  @endforeach
  </ul>
  <form action="{{ action('CategoryController@store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="Category">Add Category</label>
      <input type="text" name="title" class="form-control" aria-describedby="category" placeholder="Enter New Category">
    </div>
    <input type="submit" class="btn btn-success">
</div>
@endsection
