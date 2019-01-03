<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //function that counts current available book copies
    public function available_quantity()
    {
        $total = $this->number_of_copies;
        $not_available_number_of_copies = BookIssue::where('book_id','=' ,$this->id)->where('return_date','=',null)->whereIn('approved',array(0,1))->count();
        $available_quantity = $total - $not_available_number_of_copies;
        if($available_quantity<0){
            $available_quantity=0;
        }
        return $available_quantity;
    }

    //function that count total number of borrows for porticul book
    public function borrows()
    {
        $borrows=BookIssue::where('book_id', $this->id)->where('expiry_date','!=',null)->count();

        return $borrows;
    }

    public function category()
    {
        return $this->belongsTo('App\BookCategory', 'category_id', 'id');
    }
}
