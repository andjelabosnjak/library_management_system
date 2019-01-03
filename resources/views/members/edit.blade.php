@extends('layouts.app')

@section('title','Edit Member Details')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <h2>Edit Member Details</h2>
    </div><!--/card-body-->
    <div class="card-body">
        <!--Edit member details form-->
        {{ Form::model( $registered_member, ['route' => ['updateMemberDetails', $registered_member->id], 'method' => 'put']) }}
            <div class="form-group">
                {{ Form::label('name','Member Name')}}
                {{ Form::text('name',$registered_member->name,['class' => 'form-control', 'placeholder' => 'Member Name'])}}
            </div>
            <div class="form-group">
                {{ Form::label('email','Email')}}
                {{ Form::email('email',$registered_member->email,['class' => 'form-control', 'placeholder' => 'Email'])}}
            </div>
            <div class="form-group">
                {{ Form::label('contact_number','Contact Number')}}
                {{ Form::text('contact number',$registered_member->contact_number,['class' => 'form-control', 'placeholder' => 'Contact Number'])}}
            </div>
            <div class="form-group">
                {{ Form::label('address','Address')}}
                {{ Form::text('address',$registered_member->address,['class' => 'form-control', 'placeholder' => 'Address'])}}
            </div>
            <div class="form-group">
                {{ Form::label('type','Type')}}
                <select class="form-control" name="type">
                    <option value="admin" @if($registered_member->type=="admin") selected="selected" @endif>Admin</option>
                    <option value="registered"  @if($registered_member->type=="registered") selected="selected" @endif>Registered</option>
                </select>
            </div>
            <div class="form-group">
                {{ Form::label('membership_type_id','Membership Type')}}
                <select class="form-control" name="membership_type_id">
                    @php($memberships=App\MembershipType::all())
                    @if ($memberships->count())
                        @foreach($memberships as $membership)
                            <option value="{{ $membership->id }}"}} @if($registered_member->membership_type_id==$membership->id) selected="selected" @endif>
                            {!! $membership->type_name !!} ({!! $membership->type_details !!})
                            </option>    
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                {{ Form::label('membership_status','Membership Fee Status')}}
                <select class="form-control" name="membership_status">
                    <option value="paid" @if($registered_member->membership_status=='paid') selected="selected" @endif>Paid</option>
                    <option value="not paid" @if($registered_member->membership_status=='not paid') selected="selected" @endif>Not Paid</option>
                </select>
            </div>
            {{ Form::submit('Submit',['class' => 'btn btn-info'])}}
            <a href="{{route('registeredmemberslist') }}" class="btn btn-secondary">Cancel</a>
        {{ Form::close() }}  
    </div><!--/card-body-->                   
</div><!--/container border p-3 mb-2 bg-white text-dark-->
@endsection