<?php

use App\BookCategory;
use Illuminate\Database\Seeder;

class BookCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category 1
        BookCategory::create([
          'category_name' => 'Horror'
        ]);

        // Category 2
        BookCategory::create([
          'category_name' => 'Mystery'
        ]);

        // Category 3
        BookCategory::create([
          'category_name' => 'Science Fiction'
        ]);

        // Category 4
        BookCategory::create([
          'category_name' => 'Biography'
        ]);

        // Category 5
        BookCategory::create([
          'category_name' => 'Romance'
        ]);

        // Category 6
        BookCategory::create([
          'category_name' => 'History'
        ]);

        // Category 7
        BookCategory::create([
          'category_name' => 'Programming'
        ]);  
        
        // Category 8
        BookCategory::create([
          'category_name' => 'Biology'
        ]); 
        
    }
}
