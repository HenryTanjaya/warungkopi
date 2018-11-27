@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{ action('MenuController@store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="MenuCoverImage">Menu Image</label>
      <input type="text" name="image" class="form-control" aria-describedby="menuImage" placeholder="Enter Menu Image">
    </div>
    <div class="form-group">
      <label for="MenuName">Menu Name</label>
      <input type="text" name="title" class="form-control" aria-describedby="menuHelp" placeholder="Enter Menu">
    </div>
    <div class="form-group">
      <label for="MenuCategory">Menu Category</label>
      <select name="category" class="form-control">
        <option>Default select</option>
        @foreach($categories as $category)
          <option value="{{$category->title}}">{{$category->title}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="MenuType">Menu Type</label>
      <select name="type" class="form-control">
        <option>Default select</option>
        @foreach($types as $type)
          <option value="{{$type->title}}">{{$type->title}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="MenuDescription">Menu Description</label>
      <input type="text" name="description" class="form-control" aria-describedby="MenuDescription" placeholder="Enter Description">
    </div>
    <div class="form-group">
      <label for="MenuPrice">Menu Price</label>
      <input type="number" name="price" class="form-control" aria-describedby="menuPrice" placeholder="Price">
    </div>
    <input type="submit" class="btn btn-success">
  </form>
</div>
@endsection
