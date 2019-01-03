<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class BookIssue extends Model
{
    public function book()
    {
        return $this->belongsTo('App\Book', 'book_id', 'id');
    }

    public function borrower()
    {
        return $this->belongsTo('App\User', 'borrower_id', 'id'); 
    }

    //function that counts how many days until expiry date
    public function DaysRemaining()
    {
        $issue_date=Carbon::parse($this->created_at);
        $expiry_date=Carbon::parse($this->expiry_date);
        $days_between=$issue_date->diffInDays($expiry_date,false);

        return $days_between;
    }
}
