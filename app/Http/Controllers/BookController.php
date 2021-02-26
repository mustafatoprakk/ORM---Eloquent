<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['books'] = BookModel::get();
        return view('home', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('book_image');

        if ($file) {
            $destinationPath = 'images';
            $rand = rand(0, 1000000) . $file->getClientOriginalExtension();

            $file->move($destinationPath, $rand);
            $fileName = $rand;
        }

        $bookModel = new BookModel();

        $validate = $request->validate([
            'book_name' => 'required|max:250',
            'book_author' => 'required|max:250',
            'book_page' => 'required|max:11',
            'book_publisher' => 'required|max:250',
            'book_type' => 'required|max:250',

        ]);

        if ($validate) {


            $bookModel->book_name = $request->book_name;
            $bookModel->book_author = $request->book_author;
            $bookModel->book_page = $request->book_page;
            $bookModel->book_publisher = $request->book_publisher;
            $bookModel->book_type = $request->book_type;
            $bookModel->book_image = $fileName;

            $bookModel->save();

            if ($bookModel) {
                return back();
            }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BookModel::find($id);
        return view('bookUpdate', compact('data'));    //compact dizi halinde dönüştürür
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bookModel = BookModel::find($id);

        $validate = $request->validate([
            'book_name' => 'required|max:250',
            'book_author' => 'required|max:250',
            'book_page' => 'required|max:11',
            'book_publisher' => 'required|max:250',
            'book_type' => 'required|max:250',

        ]);


        if ($validate) {
            $bookModel->book_name = $request->book_name;
            $bookModel->book_author = $request->book_author;
            $bookModel->book_page = $request->book_page;
            $bookModel->book_publisher = $request->book_publisher;
            $bookModel->book_type = $request->book_type;
            $bookModel->book_image = $request->book_image;
            $bookModel->update();

            if ($bookModel) {
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BookModel::find($id)->delete();
        return back();
    }
}
