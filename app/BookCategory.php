<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    public function books()
    {
        return $this->hasMany('App\Book', 'category_id', 'id');
    }

    //function that counts total number of books of particular category
    public function numberOfBooksInCategory()
    {
        $number_of_books=\App\Book::where('category_id', $this->id)->count();

        return $number_of_books;
    }
}
