<?php

namespace App\Http\Controllers;
use App\BookIssue;
use App\Book;
use Carbon\Carbon;
use App\User;
use App\Notifications\BookIssueNotification;
use App\Notifications\BookIssueDeclinedNotification;
use App\Notifications\PayOverdueNotification;
use App\Notifications\PayMembershipFeeNotification;
use Illuminate\Http\Request;

class BookIssuesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*display all book issues that have status approved=1 => approved or
    approved=2 => declined book issues
    approved=0 => waiting for approval*/
    public function index()
    {
        $book_issues=BookIssue::where('approved','!=',0)->orderBy('id','desc')->get();
        
        return view('book_issues.index')->with('book_issues',$book_issues);
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $borrowers=User::all();
        $books=Book::all();

        return view('book_issues.create')->with(compact('borrowers','books'));
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
            'book_id' => 'required',
            'borrower_id'=> 'required',
            'expiry_date' => 'required'
        ]);

        //Create new Book Issue
        $book_issue = new BookIssue();
        $book_issue->book_id = $request->input('book_id');
        $book_issue->borrower_id = $request->input('borrower_id');
        $book_issue->expiry_date = $request->input('expiry_date');
        $book_issue->approved = 1;
        $book_issue->save();
        
        return redirect()->route('bookissueslog')->with('success','New Book Issue added successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $book_issue=BookIssue::find($id);
        $borrowers=User::all();
        $books=Book::all();
        
        return view('book_issues.edit')->with(compact('book_issue','borrowers','books'));
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
            'book_id' => 'required',
            'borrower_id' => 'required',
            'expiry_date' => 'required'
        ]);

        //Edit Book Issue
        $book_issue = BookIssue::find($id);
        $book_issue->book_id = $request->input('book_id');
        $book_issue->borrower_id = $request->input('borrower_id');
        $book_issue->expiry_date = $request->input('expiry_date');
        $book_issue->return_date = $request->input('return_date');
        $book_issue->save();

        return redirect()->route('bookissueslog')->with('success','Book Issue updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book_issue=BookIssue::find($id);
        $book_issue->delete();

        return redirect()->route('bookissueslog')->with('success','Book Issue Removed from Library.');
    }

    //when button "Borrow a book" is clicked
    public function borrow($id)
    {
        /*check if user paid the membership fee and 
        check if the user has less then or equal 15$ debt due for not returning book on time
        - if both conditions are fulfilled user can borrow a book */
        if(auth()->user()->membership_status=='paid' && auth()->user()->fine()<=15){

            //Create new BookIssue
            $bookissue = new BookIssue();
            $bookissue->book_id=$id;
            $bookissue->borrower_id=auth()->user()->id;
            $bookissue->approved=0; //approved=0 => waiting for admin's approval
            $bookissue->save();

            return redirect()->route('books')->with('success','Waiting for approval.');
        }
        else
        {
            /* if user has more then 15$ due for not returning book on time
            send him notification that he has to pay his due first*/
            if(auth()->user()->fine()>15)
            {
                $user=User::find(auth()->user()->id);
                $fine=auth()->user()->fine();
                $user->notify(new PayOverdueNotification($fine));
                
                return redirect()->route('books')->with('error','Please pay overdue first!');
            }
            else
            {
                /*if user didn't pay his membership fee 
                send him notification that he has to pay membership fee first*/
                $user=User::find(auth()->user()->id);
                $membership=auth()->user()->membership_status;
                $user->notify(new PayMembershipFeeNotification($membership));
                
                return redirect()->route('books')->with('error','You have to pay the membership fee first!');
            }
        }
    }

    //when button "Approve" in pending_book_issues view is clicked
    public function approve($id)
    {
        $book_issue=BookIssue::find($id);
        $book_issue->approved=1; //status approved=1 => approved book issue
        $book_issue->expiry_date=(Carbon::now()->addDays(15)); //set expiry date 15 days from now
        $user=User::find($book_issue->borrower_id);
        $user->notify(new BookIssueNotification($book_issue)); //send notification of successfull borrowing to the user who requested this book
        $book_issue->save();
        
        return redirect()->route('pendingBookIssues')->with('success','You approved this book issue successfully.');
    }

    //when button "Decline" in pending_book_issues view is clicked 
    public function decline($id)
    {
        $book_issue=BookIssue::find($id);
        $book_issue->approved=2; // status approved=2 => declined book issue
        $user=User::find($book_issue->borrower_id);
        $user->notify(new BookIssueDeclinedNotification($book_issue)); //send notification of unsuccessfull borrowing to the user who requested this book
        $book_issue->save();

        return redirect()->route('pendingBookIssues')->with('success','You declined this book issue successfully.');
    }

    //when button "Return a book" in admin's dashboard (all book issues view) is clicked
    public function return($id)
    {
        $bookissue=BookIssue::find($id);
        $date=Carbon::now()->toDateTimeString(); // make the return date equal to the current date
        $bookissue->return_date=$date;
        $bookissue->save();

        return redirect()->route('bookissueslog')->with('success','Book returned succesfully.');
    }

    //all book issues that have status approved=0 => waiting for administrator's approval
    public function pendingBookIssues()
    {
        $book_issues=BookIssue::where('approved','=',0)->get();

        return view('book_issues.pending_book_issues')->with('book_issues',$book_issues);
    }

    //all book issues for the current logged in user
    public function myBookIssueLog()
    {
        $mybookissues = BookIssue::where('borrower_id','=', Auth()->user()->id)->where('approved','=',1)->orderBy('id','desc')->get();

        return view('book_issues.my_book_issue_log')->with('mybookissues',$mybookissues);
    }
}

