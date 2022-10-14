<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use Illuminate\Http\Request;
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

        $addBook = new BookModel();
        $addBook->book_description =$request->book_description  ;
        $addBook->book_image =$request->image;
        $addBook->book_author =$request->book_author ;
        $addBook->save();

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editBook = BookModel::find($id);
        $editBook->book_description =$request->book_description  ;
        $editBook->book_image =$request->image;
        $editBook->book_author =$request->book_author ;
        $editBook->save();
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

            $deleteData =  BookModel::where('id' , '=' , "$id")->delete();
            return redirect('/data');

    }
}
