@extends('home')

@section('pageContant')
<h3>arshive delete</h3>
<div class="row">
    @foreach ($arrayData as $data)
        <div class="card m-3" style="width: 300px;">
            <img src="data:image/jpg;charset=utf8;base64,{{$data['book_image']}}" class="card-img-top" alt="..." width="100px" >
            <div class="card-body">
                <h5 class="card-title">book author : {{$data['book_author']}}</h5>
                <p class="card-text">book description : {{$data['book_description']}}</p>
                <a href="restore/{{$data['id']}}"><button  class="btn btn-primary">restore </button></a>
                <a href="fdelete/{{$data['id']}}"><button  class="btn btn-danger">delete</button></a>
            </div>
        </div>

    @endforeach
</div>
@endsection
