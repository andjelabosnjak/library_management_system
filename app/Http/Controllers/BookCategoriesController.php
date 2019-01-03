<?php

namespace App\Http\Controllers;
use App\Book;
use App\BookCategory;
use Illuminate\Http\Request;

class BookCategoriesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }
    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //all books that belong to particular category 
    public function index($category_id)
    {
        $category=BookCategory::find($category_id);
        $books=Book::where('category_id','=',$category_id)->get();

        return view('book_categories.index')->with(compact('category','books'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name' => 'required'
        ]);

        //Create new Book Category
        $book_category = new BookCategory();
        $book_category->category_name=$request->input('category_name');
        $book_category->save();

        return redirect()->route('bookcategorieslist')->with('success','New Category added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $book_category=BookCategory::find($id);

        return view('book_categories.edit')->with('book_category',$book_category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category_name' => 'required'
        ]);

        //Edit Book Category
        $book_category = BookCategory::find($id);
        $book_category->category_name=$request->input('category_name');
        $book_category->save();

        return redirect()->route('bookcategorieslist')->with('success','Book Category updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book_category=BookCategory::find($id);
        $book_category->delete();

        return redirect()->route('bookcategorieslist')->with('success','Book Category Removed from Library.');
    }

    //list of book categories that will be shown in admin's dashboard (all book categories)
    public function admin_book_categories_index()
    {
        $book_categories=BookCategory::orderBy('id','desc')->get();

        return view('book_categories.admin_book_categories_index')->with('book_categories',$book_categories);
    }
    
}
