@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Edit Menu</h3>
  <form action="{{route('menu.update', ['id' => $menu->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <input hidden name="_method" value="put">
    <div class="form-group">
      <label for="MenuCoverImage">Menu Image</label>
      <input type="text" name="image" class="form-control" aria-describedby="menuImage" placeholder="Enter Menu Image" value="{{$menu->image}}">
    </div>
    <div class="form-group">
      <label for="MenuName">Menu Name</label>
      <input type="text" name="title" class="form-control" aria-describedby="menuHelp" placeholder="Enter Menu" value="{{$menu->title}}">
    </div>
    <div class="form-group">
      <label for="MenuCategory">Menu Category</label>
      <select name="category" class="form-control">
        <option>Default select</option>
        @foreach($categories as $category)
          @if($category->title == $menu->category)
            <option selected value="{{$category->title}}">{{$category->title}}</option>
          @else
            <option value="{{$category->title}}">{{$category->title}}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="MenuType">Menu Type</label>
      <select name="type" class="form-control">
        <option>Default select</option>
        @foreach($types as $type)
          @if($type->title == $menu->type)
            <option selected value="{{$type->title}}">{{$type->title}}</option>
          @else
            <option value="{{$type->title}}">{{$type->title}}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="MenuPrice">Menu Price</label>
      <input type="number" name="price" class="form-control" aria-describedby="menuPrice" placeholder="Price" value="{{$menu->price}}">
    </div>
    <div class="form-group">
      <label for="MenuDescription">Menu Description</label>
      <input type="text" name="description" class="form-control" aria-describedby="MenuDescription" placeholder="Enter Description" value="{{$menu->description}}">
    </div>
    <input type="submit" class="btn btn-success">
  </form>
</div>
@endsection
