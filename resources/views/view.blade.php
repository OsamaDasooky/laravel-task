@extends('home')

@section('pageContant')
<form action="/findBook" method="post">
    @csrf
    <div class="row m-3" style="flex-wrap: nowrap ;margin-right:40px;" >
            <input name="search" type="text" placeholder="Search for a book" style="margin-right:10px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </div>
    </div>
</form>
    <a href="./add"><button  class="btn btn-primary">Add book</button></a></div>
    <a href="./archive"><button  class="btn btn-primary">archive delete</button></a></div>
    <a href="/sortUp"><button  class="btn btn-primary">sort up</button></a></div>
    <a href="/sortDown"><button  class="btn btn-primary">sort Down</button></a></div>

    <div class="row">
        @foreach ($arrayData as $data)
            <div class="card m-3" style="width: 300px;">
                <img src="{{$data['book_image']}}" class="card-img-top" alt="..." width="100px" >
                <div class="card-body">
                    <h5 class="card-title">book author : {{$data['book_author']}}</h5>
                    <p class="card-text">book description : {{$data['book_description']}}</p>
                    <a href="delete/{{$data['id']}}"><button  class="btn btn-danger">delete</button></a>
                    <a href="edit/{{$data['id']}}"><button  class="btn btn-primary">update</button></a></div>
            </div>
        @endforeach
    </div>
    {{-- {{ $arrayData->links() }} --}}
@endsection
