<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

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

    public function put(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:256',
            'author_id' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'year' => 'numeric',
            'image' => 'nullable|image',
            'display' => 'nullable'
        ]);    

        $book = new Book();
        $book->name = $validatedData['name'];
        $book->author_id = $validatedData['author_id'];
        $book->description = $validatedData['description'];
        $book->price = $validatedData['price'];
        $book->year = $validatedData['year'];
        $book->display = (bool) ($validatedData['display'] ?? false);

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
    public function patch(Book $book, Request $request){

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:256',
            'author_id' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'year' => 'numeric',
            'image' => 'nullable|image',
            'display' => 'nullable'
        ]);    

        $book->name = $validatedData['name'];
        $book->author_id = $validatedData['author_id'];
        $book->description = $validatedData['description'];
        $book->price = $validatedData['price'];
        $book->year = $validatedData['year'];
        $book->display = (bool) ($validatedData['display'] ?? false);

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

    // Delete book 
    public function delete(Book $book){

        $book->delete();
        return redirect('/books');
    }
}
