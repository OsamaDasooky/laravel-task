@extends('home')

@section('pageContant')
<form method="post" action="req">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">book author</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="book_author" value="">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">book image</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="image">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">book description</label>
      <textarea type="text" class="form-control" id="exampleInputPassword1" name="book_description" value=""></textarea>
    </div>
    <button type="submit" class="btn btn-primary">ADD</button>
  </form>
@endsection
