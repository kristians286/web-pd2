<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    
    // Display all books
    public function list(){
        
        $items = Book::orderBy('name', 'asc')->get();

        return view(
            'book.list',
            [
                'title' => 'Grāmatas',
                'items' => $items
            ]
        );
    }

    // Display new book form

    public function create(){

        $authors = Author::orderBy('name', 'asc')->get();
        return view(
            'book.form',
            [
                'title' => 'Pievienot grāmatu',
                'book' => new Book(),
                'authors' => $authors,
            ]
        );
       
    }

    private function saveBookData(Book $book, BookRequest $request){

        $validatedData = $request->validate();   
        $book->fill($validatedData);
        //$book->display = (bool) ($validatedData['display'] ?? false);

        if (isset($validatedData['display']) && $validatedData['display']) {
            $book->display = true;
        } else {
            $book->display = false;
        }

        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $extension = $uploadedFile->clientExtension();
            $name = uniqid();
            $book->image = $uploadedFile->storePubliclyAs(
                '/',
                $name . '.' . $extension,
                'uploads'
            );
        }

        $book->save();
        return redirect('/books');
    }

    public function put(BookRequest $request){

        $book = new book();
        $this->saveBookData($book,$request);
        return redirect('/books');
    }

    // Display book editing form
    public function update(Book $book){

        $authors = Author::orderBy('name', 'asc')->get();
        return view(
            'book.form',
            [
                'title' => 'Labot grāmatu',
                'book' => $book,
                'authors' => $authors,
            ]
        );
    }
    // Edit books
    public function patch(Book $book, BookRequest $request){

        $this->saveBookData($book,$request);
        return redirect('/books');
    }

    // Delete book 
    public function delete(Book $book){

        $book->delete();
        return redirect('/books');
    }
}
