<?php

namespace App\Http\Controllers;
use App\Book;
use App\BookCategory;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
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

    //Search books by all displayed properties 
    public function index()
    {
        $search = \Request::get('search'); // use global request to get the param of URI

        //all books that match search pattern
        $books = Book::join('book_categories', 'books.category_id', '=', 'book_categories.id')
                ->orWhere('title','LIKE','%'.$search.'%')
                ->orWhere('author', 'LIKE', '%'.$search.'%')
                ->orWhere('category_name', 'LIKE', '%'.$search.'%')
                ->orWhere('number_of_pages', 'LIKE', '%'.$search.'%')
                ->select('*','books.id as book_id')
                ->orderBy('title')
                ->get();
    
        return view('books.search.index')->with('books',$books);
        
    }

    public function usersearch()
    {
        $search = \Request::get('search'); // use global request to get the param of URI

        //all books that match search pattern
        $members=User::join('membership_types','users.membership_type_id','=','membership_types.id')
                ->orWhere('name','LIKE','%'.$search.'%')
                ->orWhere('email','LIKE','%'.$search.'%')
                ->orWhere('contact_number','LIKE','%'.$search.'%')
                ->orWhere('address','LIKE','%'.$search.'%')
                ->orWhere('type_name','LIKE','%'.$search.'%')
                ->orWhere('fine','LIKE','%'.$search.'%')
                ->orWhere('type','LIKE','%'.$search.'%')
                ->orWhere('membership_status','LIKE','%'.$search.'%')
                ->select('*','users.id as user_id')
                ->orderBy('name')
                ->get();

        return view('members.search.usersearch')->with('members',$members);
    }
}
