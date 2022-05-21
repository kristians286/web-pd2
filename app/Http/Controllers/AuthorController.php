<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    
    public function list(){
        
        $items = Author::orderBy('name', 'asc')->get();

        return view(
            'author.list',
            [
                'title' => 'Autori',
                'items' => $items
            ]
        );
    }

    public function create(){
        
        return view(
            'author.form',
            [
                'title' => 'Pievienot autoru',
                'author' => new Author()
            ]
        );
    }

    public function put(Request $request){

        $validateDate = $request-> validate([
            'name' => 'required',
        ]);
        $author = new Author();
        $author->name = $validateDate['name'];
        $author->save();

        return redirect('/authors');
            
    }

    // display author editing form
    public function update(Author $author){
        return view(
            'author.form',
            [
                'title' => 'Labot autoru',
                'author' => $author
            ]
        );
    }

    //process author editing
    public function patch(Author $author, Request $request){

        $validateDate = $request-> validate([
            'name' => 'required',
        ]);

        $author->name = $validateDate['name'];
        $author->save();

        return redirect('/authors');

    }

    //delete author
    public function delete(Author $author){

        $author->delete();
        return redirect('/authors');

    }
}
