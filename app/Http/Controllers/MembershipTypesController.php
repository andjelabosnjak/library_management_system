<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MembershipType;
class MembershipTypesController extends Controller
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
    public function index()
    {
        $membership_types=MembershipType::all();

        return view('membership_types.index')->with('membership_types',$membership_types);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('membership_types.create');
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
            'type_name' => 'required',
            'type_details' => 'required'
        ]);

        //Create new Membership Type
        $membership_type = new MembershipType();
        $membership_type->type_name=$request->input('type_name');
        $membership_type->type_details=$request->input('type_details');
        $membership_type->save();

        return redirect()->route('membershiptypeslist')->with('success','New Membership Type added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $membership_type=MembershipType::find($id);

        return view('membership_types.edit')->with('membership_type',$membership_type);
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
            'type_name' => 'required',
            'type_details' => 'required'
        ]);


        //Edit Membership Type
        $membership_type = MembershipType::find($id);
        $membership_type->type_name=$request->input('type_name');
        $membership_type->type_details=$request->input('type_details');
        $membership_type->save();

        return redirect()->route('membershiptypeslist')->with('success','Membership Type updated successfully.');
    }
       
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membership_type = MembershipType::find($id);
        $membership_type->delete();

        return redirect()->route('membershiptypeslist')->with('success','Membership Type Removed from Library.');
    }  
}
