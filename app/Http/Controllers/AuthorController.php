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
}