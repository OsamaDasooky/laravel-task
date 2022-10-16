<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $validate = $request->validate([
            'book_description'  => 'required|alpha',
            'book_image'             => 'required',
            'book_author'       => 'required|alpha'
        ]);

        $addBook = BookModel::create($validate);  // need fillable


        // $addBook = BookModel::create( $request->all());  // need fillable

        // $addBook = BookModel::create([
        //     'book_description'  => $request->input('book_description') ,
        //     'book_image'        => $request->input('image'),
        //     'book_author'       => $request->input('book_author')
        // ]);




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
        $showData =  BookModel::where('id' , '=' , "$id")->get();

        return  view('edit' , ['showData' => $showData , 'id' => "$id"]);
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
        BookModel::where('id' ,'=',"$id")
        ->update([
            'book_description' => $request->book_description,
            'book_image' => $request->image,
            'book_author' => $request->book_author
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
}
