@extends('home')

@section('pageContant')
<a href="./add"><button  class="btn btn-primary">Add book</button></a></div>
<div class="row">
    @foreach ($arrayData as $data)
        <div class="card m-3" style="width: 400px;">
            <img src="{{$data['book_image']}}" class="card-img-top" alt="..." width="100px" >
            <div class="card-body">
                <h5 class="card-title">book author : {{$data['book_author']}}</h5>
                <p class="card-text">book description : {{$data['book_description']}}</p>
                <a href="delete/{{$data['id']}}"><button  class="btn btn-primary">delete</button></a>
                <a href="edit/{{$data['id']}}"><button  class="btn btn-primary">update</button></a></div>
        </div>
    @endforeach
@endsection
