@extends('home')

    @section('pageContant')
        <form method="POST" action='/update/{{$id}}' enctype="multipart/form-data"
        >
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">book author</label>
                  <select name="author_name" id="author"class="form-control">
                      @foreach ($authors as $author)
                      <option value="{{ $author['author_name'] }}">{{ $author['author_name'] }}</option>
                      @endforeach
                  </select>
           </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">book image</label>
                <input type="file" class="form-control" id="exampleInputEmail1" name="book_image" value="{{$showData[0]['book_image']}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">book description</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="book_description" >{{$showData[0]['book_description']}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    @endsection
