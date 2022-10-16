@extends('layout.index')

@section('pageContant')
@if ($massege = Session::get('felled'))
    <div class="alert alert-info">
        {{ $massege }}
    </div>
@endif
<div class="container">
    <div class="h1 text-center">Login</div>

<form method="post" action="login">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

      @if ($errors->has('email'))
      <span class="text-danger"> {{ $errors->first('email') }}</span>
      @endif

    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="text" name="password" class="form-control" id="exampleInputPassword1">

      @if ($errors->has('password'))
      <span class="text-danger"> {{ $errors->first('password') }}</span>
      @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection
