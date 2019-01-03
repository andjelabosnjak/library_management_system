<?php

namespace App\Http\Controllers;
use App\BookIssue;
use App\Book;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //show Admin's dashboard
    public function index()
    {
        //number of book issues on waiting
        //approved=0 => waiting for approval, approved=1 => approved, approved=2 => declined
        $pending_book_issues = BookIssue::where('approved','=',0)->count();
        $total_books=Book::all()->count();
        $members=User::all()->count();
        $bookissues=BookIssue::all()->count();
        $borrowedbooks=BookIssue::where('return_date','=',null)->count();

        return view('admin.index')->with(compact('pending_book_issues','total_books','members','bookissues','borrowedbooks'));
    } 
}
