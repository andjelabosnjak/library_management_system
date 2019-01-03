@extends('layouts.app')

@section('title','My Profile')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <a class="btn btn-danger pull-right" href="{{ route('showChangePasswordForm') }}">Change Password</a>
        <img src="{{ asset('images/profile.jpg')}}"><br><br> 
        <h3>My Profile</h3>
        
    </div><!--/card-body-->
    <div class="card-body">
        <!--edit logged in user personal informations form--> 
        {{ Form::model( $user, ['route' => ['updateMyProfile', $user->id], 'method' => 'put','enctype' => 'multipart/form-data']) }}
            <div class="form-group">
                {{ Form::label('name','Name')}}
                {{ Form::text('name',$user->name,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{ Form::label('email','Email')}}
                {{ Form::email('email',$user->email,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{ Form::label('contact_number','Contact Number')}}
                {{ Form::text('contact_number',$user->contact_number,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{ Form::label('address','Address')}}
                {{ Form::text('address',$user->address,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{ Form::label('membership_type_id','Membership Type')}}
                {{ Form::text('membership_type_id',$user->membership->type_name.' ('. $user->membership->type_details.')',['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{ Form::label('membership_status','Membership Fee Status')}}
                {{ Form::text('membership_status',$user->membership_status,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{ Form::label('fine','Fine')}}
                {{ Form::text('fine',$user->fine(),['class' => 'form-control'])}}
            </div>
            {{ Form::submit('Update',['class' => 'btn btn-dark'])}}
        {{ Form::close() }}  
    </div><!--/card-body-->                  
</div><!--/container border p-3 mb-2 bg-white text-dark-->
@endsection