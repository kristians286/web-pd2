<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name','author_id','description','price','year'];

    public function author(){
        
        return $this->belongsTo(Author::class);
    }
}
