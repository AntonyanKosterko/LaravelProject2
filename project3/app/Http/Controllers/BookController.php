<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function all(){
        $booksArr = Book::all();

        return $booksArr;
    }

    public function add(Request $request){
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->availability = true;
        $book->save();

        return redirect('/');
    }

    public function delete(Request $request){
        $book = Book::find($request->id)->delete();

        return redirect('/');
    }

    public function changeAvailabilty(Request $request){
        $book = Book::find($request->id);
        $book->availability = !($book->availability);
        $book->save();

        return redirect('/');
    }
}
