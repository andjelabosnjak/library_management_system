<?php

use Illuminate\Database\Seeder;
use App\BookIssue;
use Carbon\Carbon;

class BookIssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Book issue 1
        BookIssue::create([
            'book_id' => 1,
            'borrower_id' => 4,
            'approved' => 1,
            'expiry_date' => (Carbon::now()->addDays(15))
        ]);

         //Book issue 2
         BookIssue::create([
            'book_id' => 6,
            'borrower_id' => 3,
            'approved' => 1,
            'expiry_date' => (Carbon::now()->addDays(15)),
            'return_date' => (Carbon::now()->addDays(5))
        ]);

        //Book issue 3
        BookIssue::create([
            'book_id' => 6,
            'borrower_id' => 3,
            'approved' => 1,
            'expiry_date' => (Carbon::now()->addDays(15)),
            'return_date' => (Carbon::now()->addDays(6))
        ]);
    }
}
