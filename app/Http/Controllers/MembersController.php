<?php

namespace App\Http\Controllers;
use App\User;
use App\BookIssue;
use carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Notifications\BookIssueNotification;
use App\Notifications\BookIssueDeclinedNotifications;
use App\Notifications\PayOverdueNotification;
use App\Notifications\PayMembershipFeeNotification;

class MembersController extends Controller
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
    /* list of all registered users */
    public function index()
    {
        $registered_members=User::orderByDesc('id')->get();

        return view('members.index')->with('registered_members',$registered_members);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
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
            'name'             => 'required|string|max:255',
            'email'            => 'required|Email|Unique:users',
            'contact_number'   => 'required',
            'address'          => 'required',
            'membership_type_id' => 'required',
            'password'         => 'required|min:6|confirmed'
        ]);

    
        // Create the new user/member
        $user = new User();
        $user->name = $request->input('name');
        $user->email      = $request->input('email');
        $user->contact_number = $request->input('contact_number');
        $user->address  = $request->input('address');
        $user->membership_type_id=$request->input('membership_type_id');
        $user->password   = Hash::make($request->input('password'));
        $user->save();
            
        return redirect()->route('registeredmemberslist')->with('success','New Member added successfully.');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registered_member=User::find($id);

        return view('members.edit')->with('registered_member',$registered_member);
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
            'name'             => 'required|string|max:255',
            'email'            => 'required|Email',
            'contact_number'   => 'required',
            'address'          => 'required',
            'membership_type_id' => 'required',
            'membership_status' => 'required'
        ]);

        //Edit Member
        $registered_member = User::find($id);
        $registered_member->name = $request->input('name');
        $registered_member->email = $request->input('email');
        $registered_member->contact_number = $request->input('contact_number');
        $registered_member->address  = $request->input('address');
        $registered_member->membership_type_id=$request->input('membership_type_id');
        $registered_member->membership_status=$request->input('membership_status');
        $registered_member->save();

        return redirect()->route('registeredmemberslist')->with('success','Member Details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registered_member=User::find($id);
        $registered_member->delete();

        return redirect()->route('registeredmemberslist')->with('success','Member Removed from Library.');
    }

    /* current logged in user personal informations*/
    public function myprofile()
    {
        $user=User::find(auth()->user()->id);

        return view('members.my_profile')->with('user',$user);
    }

    /* user has option to update his personal informations like address, name, email,contact number,
    he is not allowed to change informations like fine, membership status (paid,not paid)*/
    public function updatemyprofile(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'address' => 'required'
        ]);

        //Update user personal information
        $user = User::find($id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->contact_number=$request->input('contact_number');
        $user->address=$request->input('address');
        $user->save();

        return redirect()->route('myProfile')->with('success','Personal information updated successfully.');
    }

    //change current password form
    public function showChangePasswordForm()
    {
        return view('auth.passwords.changepassword');
    }

    //current logged in user - change password
    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) 
        {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0)
        {
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
        'current-password' => 'required',
        'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }

    //current logged in user - notifications
    public function notifications()
    {
        $notifications = Auth()->user()->notifications()->get(); //all notifications
        $unread=Auth()->user()->unreadNotifications()->get()->count(); //only unread notifications

        return view('members.member_notifications')->with(compact('notifications','unread'));
    }

    //clear all issued books and set fine=0 
    public function clearFine($id)
    {
        $user=User::find($id);
        foreach($user->bookissues as $book_issue)
        {
            $book_issue->return_date=Carbon::now();
            $book_issue->save();
        }
        $user->fine=0;
        $user->save();

        return redirect()->back()->with('success','Successfull !');
    }
}
