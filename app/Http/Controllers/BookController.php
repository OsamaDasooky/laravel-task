<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\BookModel;
use Illuminate\Http\Request;
use App\Models\BookStatistic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\BookController;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayData =  BookModel::all();

        return view('view', ['arrayData' => $arrayData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getId = $request->author_name;
        $getId= explode("|",$getId) ;

        $validate = $request->validate([
            'book_description'   => 'required',
            'book_image'         => 'required',
            'author_name'        => 'required'
        ]);

        Author::where("author_name" , $request->author_name);

        // $addBook = BookModel::create($validate);  // need fillable

        $image = base64_encode(file_get_contents($request->file('book_image')));

        // $addBook = BookModel::create( $request->all());  // need fillable

        $addBook = BookModel::create([
            'book_description'  => $request->input('book_description') ,
            'book_image'        => $image,
            'book_author'       => $getId[0],
            'author_id'         => $getId[1],
        ]);




        // $addBook = new BookModel();
        // $addBook->book_description =$request->book_description  ;
        // $addBook->book_image =$request->image;
        // $addBook->book_author =$request->book_author ;
        // $addBook->save();

        return redirect('/data');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showData =  BookModel::where('id' , "$id")->get();

        return  view('edit' , ['showData' => $showData , 'id' => "$id" , 'authors' => Author::all() ]);
    }







    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function restore($id)
    {
        $arrayData =  BookModel::withTrashed()->find($id)->restore();

        // $arrayData->deleted_at =NULL;
        // $arrayData->save();


        return redirect('/data');
    }



    public function archive()
    {
        $arrayData =  BookModel::onlyTrashed()->get();

        return view('archive', ['arrayData' => $arrayData]);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $editBook = BookModel::find($id);
        // $editBook->book_description =$request->book_description  ;
        // $editBook->book_image =$request->image;
        // $editBook->book_author =$request->book_author ;
        // $editBook->save();
        // dd($request);


        $image = base64_encode(file_get_contents($request->file('book_image')));

        BookModel::where('id' ,'=',"$id")
        ->update([
            'book_description' => $request->book_description,
            'book_image' => $image,
            'book_author' => $request->author_name
        ]);

        return redirect('/data');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            BookModel::find($id)->delete();
            return redirect('/data');
    }
    public function forceDelete($id)
    {
            BookModel::onlyTrashed()->where('id', $id)->forceDelete();
            return redirect('/archive');
    }


    public function findBook(Request $request)
    {
            // $searchData = BookModel::where('book_description',"%$request->search%")->get();
                $searchData = BookModel::query()
                ->where('book_description', 'LIKE', "%{$request->search}%")
                ->orWhere('book_author', 'LIKE', "%{$request->search}%")
                ->get();
            return view('view', ['arrayData' => $searchData]);
        }

    public function sortUp()
    {
            $sortData = BookModel::orderBy('updated_at', 'desc')->get();
        return view('view', ['arrayData' => $sortData]);
    }
    public function sortDown()
    {
            $sortData = BookModel::orderBy('updated_at', 'asc')->get();
        return view('view', ['arrayData' => $sortData]);
    }

    public function addAuthor(Request $request)
    {
        $validate = $request->validate([
        'author_name'            => 'required|alpha',
        'author_email'           => 'required',
        'nationality'            => 'required|alpha'
        ]);


        $addBook = Author::create($validate);
        return redirect('/add');
    }

    public function author($id)
    {
        $user= Auth::user();
        $books  =  BookModel::where('author_id', $id)->get();
        dd($user->can('view', $books));

        if ($user->can('view', $books )) {
            echo "Current logged in user is allowed to update the Post: {$user->id}";
          } else {
            echo 'Not Authorized.';
          }

        return view('author' , ['author' => Author::find($id) , 'books' => BookModel::where('author_id', $id)->get()]);
    }

}
