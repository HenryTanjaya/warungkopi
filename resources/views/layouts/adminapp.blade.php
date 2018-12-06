@extends('layouts.app')

@section('content')
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link" href="/admin/menutable">Menu</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/role">Role</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/detail">Detail</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/otoritas">Otoritas</a>
    </li>
    @if(count($menus)>0)
      @foreach ($menus as $menu)
        <li class="nav-item">
          <a class="nav-link" href="{{$menu->menu_link}}">{{$menu->menu_name}}</a>
        </li>
      @endforeach
    @endif
  </ul>
  @yield('admincontent')

@endsection
