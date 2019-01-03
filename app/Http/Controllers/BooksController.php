<?php

namespace App\Http\Controllers;
use App\Book;
use App\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class BooksController extends Controller
{
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderByDesc('id')->get();
        
        return view('books.index')->with('books',$books);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show')->with('book',$book);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BookCategory::All();
        
        return view('books.create')->with('categories',$categories);
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
            'title' => 'required',
            'author'=> 'required',
            'description' => 'required',
            'category_id' => 'required',
            'number_of_copies' => 'required',
            'number_of_pages' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'file_pdf' => 'mimes:pdf|max:10000'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image'))
        {
            //Get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Image Upload
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        } else {
            $fileNameToStore = 'no_book_image.jpg';
        }

        // Handle File Upload
        if($request->hasFile('file_pdf'))
        {
            //Get filename with extension
            $fileNameWithExt = $request->file('file_pdf')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('file_pdf')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToSt = $filename.'_'.time().'.'.$extension;
            //File Upload
            $path = $request->file('file_pdf')->storeAs('public/file_pdf',$fileNameToSt);
        } else{
            $fileNameToSt=null;
        }

        //Create new Book 
        $book = new Book();
        $book->title=$request->input('title');
        $book->author=$request->input('author');
        $book->description=$request->input('description');
        $book->category_id=$request->input('category_id');
        $book->number_of_copies=$request->input('number_of_copies');
        $book->number_of_pages=$request->input('number_of_pages');
        $book->cover_image=$fileNameToStore;
        if($fileNameToSt!=null){
        $book->file_pdf=$fileNameToSt;
        }
        $book->save();

        return redirect()->route('booklist')->with('success','New Book added successfully.');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = BookCategory::all();

        return view('books.edit')->with(compact('book','categories'));
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
            'title' => 'required',
            'author'=> 'required',
            'description' => 'required',
            'category_id' => 'required',
            'number_of_copies' => 'required',
            'number_of_pages' => 'required'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image'))
        {
            //Get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Image Upload
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        } 
        // Handle File Upload
        if($request->hasFile('file_pdf'))
        {
            //Get filename with extension
            $fileNameWithExt = $request->file('file_pdf')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('file_pdf')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToSt = $filename.'_'.time().'.'.$extension;
            //File Upload
            $path = $request->file('file_pdf')->storeAs('public/file_pdf',$fileNameToSt);
        } 
        //Edit Book
        $book = Book::find($id);
        $book->title=$request->input('title');
        $book->author=$request->input('author');
        $book->description=$request->input('description');
        $book->category_id=$request->input('category_id');
        $book->number_of_copies=$request->input('number_of_copies');
        $book->number_of_pages=$request->input('number_of_pages');
        if($request->hasFile('cover_image')){
            $book->cover_image=$fileNameToStore;
        }
        if($request->hasFile('file_pdf')){
            $book->cover_image=$fileNameToSt;
        }
        $book->save();

        return redirect()->route('booklist')->with('success','Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if($book->cover_image != 'no_book_image.jpg')
        {
            Storage::delete('public/cover_images/'.$book->cover_image);
        }
        $book->delete();

        return redirect()->route('booklist')->with('success','Book Removed from Library.');
    }

    //list of books that will be shown in admin's dashboard (all books)
    public function admin_book_index()
    {
        $books = Book::orderBy('id','desc')->get();

        return view('books.admin_book_index')->with('books',$books);
    }

    //show book cover_image and description in admin's dashboard
    public function admin_book_show($id)
    {
        $book = Book::find($id);

        return view('books.admin_book_show')->with('book',$book);
    }

}

