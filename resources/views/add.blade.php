@extends('home')
@section('pageContant')
<form method="post" action="req" enctype="multipart/form-data"
>
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">book author</label>
        <select name="author_name" id="author"class="form-control">
            @foreach ($authors as $author)
            <option value="{{ $author['author_name'].'|'.$author['id'] }}">{{ $author['author_name'] }}</option>
            @endforeach
        </select>
 </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">book image</label>
      <input type="file" class="form-control" id="exampleInputEmail1" name="book_image">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">book description</label>
      <textarea type="text" class="form-control" id="exampleInputPassword1" name="book_description" value=""></textarea>
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
