@extends('home')

@section('pageContant')

    <div class="row">
            <div class="card m-6" style="width: 500px;">
                <div class="card-body">
                    <h5 class="card-title mb-4">Author Name : <b>{{$author['author_name']}}</b></h5>
                    <p class="card-text">Author Nathonality: <b>{{$author['nationality']}}</b></p>
                    <p class="card-text">Author Email : <b>{{$author['author_email']}}</b></p>
                </div>
            </div>

            <div class="row">
                @foreach ($books as $book)
                    <div class="card m-3" style="width: 300px;">
                        <img src="data:image/jpg;charset=utf8;base64,{{$book['book_image']}}" class="card-img-top" alt="..." width="100px" >
                        <div class="card-body">
                            <h5 class="card-title">book author : {{$book['book_author']}}</h5>
                            <p class="card-text">book description : {{$book['book_description']}}</p>
                        </div>
                    </div>
                @endforeach
    </div>
@endsection
