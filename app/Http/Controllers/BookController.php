<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('index', compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'title' => "required|max:30",
            'author' => "required|max:50",
            'pages' => "required|integer",
            'edition' => "required|max:50",
            'year' => "required|data",
            'isbn' => "required|unique:books|max:13",
            'genre' => "required|max:30",
            'images' => "required",
        ]);

        $book = new Book;
        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->pages = $data['pages'];
        $book->edition = $data['edition'];
        $book->year = $data['year'];
        $book->isbn = $data['isbn'];
        $book->genre = $data['genre'];
        $book->images = $data['images'];

        $book->save();
        
        return redirect()->route('books.show', $book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);  // SELECT * FROM books WHERE id = $id;
        return view("show", ["book" => $book]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

        return view("edit", ["book" => $book]);
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
        $data = $request->all();

        $request->validate([
            'title' => "required|max:30",
            'author' => "required|max:50",
            'pages' => "required|integer",
            'edition' => "required|max:50",
            'year' => "required|data",
            'isbn' => [
                "required",
                "max:13",
                Rule::unique('books')->ignore($id)
            ],
            'genre' => "required|max:30",
            'images' => "required",
        ]);

        $book = Book::find($id);

        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->pages = $data['pages'];
        $book->edition = $data['edition'];
        $book->year = $data['year'];
        $book->isbn = $data['isbn'];
        $book->genre = $data['genre'];
        $book->images = $data['images'];

        $book->update();

        return redirect()->route("books.show", $book);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        $book->delete();

        return redirect()->route("book.index");
    }
}
