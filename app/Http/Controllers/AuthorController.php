<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller {

    public function list(){
        
        $items = Author::orderBy('name', 'asc')-get();

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
            'author.form' 
            [
                'title' => 'Pievienot autoru'
            ]
        );
    }

    public function put(Request $request){

        return view(
            $validateDate = $request-> validate([
                'name' => 'required',
            ]);
            $author = new Author();
            $author->name = $validateDate['name'];
            $author->save();

            return redirect('/authors');
            
        );
    }
}