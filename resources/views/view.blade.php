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
    @can('author')
        <form action="./add" method="get" class="d-inline">
            <input type="submit" value="Add book" class="btn btn-primary">
        </form>
    @endcan

    @can('admin')
    </form>
        <form action="./addAuthor" method="get" class="d-inline">
            <input type="submit" value="Add Author" class="btn btn-primary">
        </form>
        </form>
        <form action="./add" method="get" class="d-inline">
            <input type="submit" value="Add book" class="btn btn-primary">
        </form>
        <form action="./archive" method="get" class="d-inline">
            <input type="submit" value="delete items" class="btn btn-primary">
        </form>
    @endcan
    <form action="/sortUp" method="get" class="d-inline">
        <input type="submit" value="Sort Up" class="btn btn-primary">
    </form>
    <form action="/sortDown" method="get" class="d-inline">
        <input type="submit" value="Sort Down" class="btn btn-primary">
    </form>
    {{-- <a href="./add"><button  class="btn btn-primary">Add book</button></a></div>
    <a href="./archive"><button  class="btn btn-primary">archive delete</button></a></div>
    <a href="/sortUp"><button  class="btn btn-primary">sort up</button></a></div>
    <a href="/sortDown"><button  class="btn btn-primary">sort Down</button></a></div> --}}

    <div class="row">
        @foreach ($arrayData as $data)
            <div class="card m-3" style="width: 300px;">
                <img src="data:image/jpg;charset=utf8;base64,{{$data['book_image']}}" class="card-img-top" alt="..." width="100px" >
                <div class="card-body">
                    <h5 class="card-title">book author :<a href="./author/{{$data['author_id']}}" > {{$data['book_author']}}</a></h5>
                    <p class="card-text">book description : {{$data['book_description']}}</p>
                    {{-- <a href="delete/{{$data['id']}}"><button  class="btn btn-danger">delete</button></a>
                    <a href="edit/{{$data['id']}}"><button  class="btn btn-primary">update</button></a> --}}
                    @can('admin')
                    <form action="edit/{{$data['id']}}" method="get" class="d-inline">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </form>
                    <form action="delete/{{$data['id']}}" method="get" class="d-inline">
                        <input type="submit" value="delete" class="btn btn-danger" onclick=" ">
                    </form>
                    @endcan
                </div>
            </div>
        @endforeach
        <script>

        </script>
    </div>
    {{-- {{ $arrayData->links() }} --}}
@endsection
