@extends('home')

@section('pageContant')
<form method="post" action="/addAuth" 
>
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Author Name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="author_name" value="">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Author Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" name="author_email">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Nationality</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="nationality">
    </div>
    <button type="submit" class="btn btn-primary">ADD</button>
  </form>
  @if ($errors->any())
      <div>
        @foreach ($errors->all() as $error)
                <li style="color: red;">
                    {{ $error }}
                </li>
        @endforeach
      </div>
  @endif
@endsection
