
@extends('layouts.app')

@section('content')
  <h1>Contact us</h1>
  <h5>Any feedback? Partnership opportunity! Contact us</h5>
  <form action="https://formspree.io/henrytanjaya11@gmail.com"
        method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleText">Message</label>
        <input type="text" name="message" class="form-control" id="exampleInputMessage" aria-describedby="messageHelp" placeholder="Enter message">
      </div>
      <input type="submit" value="Send" class="btn btn-primary">
  </form>
@endsection
