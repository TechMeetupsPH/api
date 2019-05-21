@extends('_layout')

@section('styles')
    @parent
@endsection

@section('content')
  <h3 class="center-align">Sign up</h3>

  <div class="row">
    <form class="col s12" method="POST">

      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="input-field">
        <input type="text" id="name" name="name">
        <label for="name">Your name</label>
      </div>

      <div class="input-field">
        <input type="email" id="email" name="email">
        <label for="email">Email address</label>
      </div>

      <div class="input-field">
        <input type="password" id="password" name="password">
        <label for="password">Password</label>
      </div>

      <div class="center-align">
        <button class="btn waves-effect waves-light" type="submit" name="action">
          Submit
        </button>
      </div>
        
    </form>
  </div> 
@endsection

@section('scripts')
    @parent
@endsection
