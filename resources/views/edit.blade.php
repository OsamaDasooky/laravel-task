@extends('home')

    @section('pageContant')
        <form method="POST" action='update/{{$id}}'>
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">book author</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="book_author" value="{{$showData[0]['book_author']}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">book image</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="image" value="{{$showData[0]['book_image']}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">book description</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="book_description" >{{$showData[0]['book_description']}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    @endsection
