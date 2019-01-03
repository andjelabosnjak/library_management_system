@extends('layouts.app')

@section('title','Add new Member')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <h2>Add new Member</h2><hr>
    </div><!--/card-body-->
    <div class="card-body">
        <!-- Add new user/member form-->
         {{ Form::open(['action' => 'MembersController@store', 'method' => 'POST']) }}
            <div class="form-group">
                {{ Form::label('name','Member Name')}}
                {{ Form::text('name','',['class' => 'form-control', 'placeholder' => 'Member Name'])}}
            </div>
            <div class="form-group">
                {{ Form::label('email','Email')}}
                {{ Form::email('email','',['class' => 'form-control', 'placeholder' => 'Email'])}}
            </div>
            <div class="form-group">
                {{ Form::label('contact_number','Contact Number')}}
                {{ Form::text('contact number','',['class' => 'form-control', 'placeholder' => 'Contact Number'])}}
            </div>
            <div class="form-group">
                {{ Form::label('address','Address')}}
                {{ Form::text('address','',['class' => 'form-control', 'placeholder' => 'Address'])}}
            </div>
            <div class="form-group">
                {{ Form::label('type','Type')}}
                <select class="form-control" name="type">
                    <option value="admin">Admin</option>
                    <option value="registered" selected="selected">Registered</option>
                </select>
            </div>
            <div class="form-group">
                {{Form::label('membership_type_id','Membership Type')}}
                <select class="form-control" name="membership_type_id">
                        @php($memberships= App\MembershipType::all())
                        @if (count($memberships) > 0)
                            @foreach($memberships as $membership)
                                <option value="{{ $membership->id }}"}}>{!! $membership->type_name !!} ({!!$membership->type_details !!})</option>    
                            @endforeach
                        @endif
                </select>
            </div>
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password_" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirmation" type="password" class="form-control" name="password_confirmation" required>
            </div>
            {{ Form::submit('Submit',['class' => 'btn btn-secondary'])}}
            <a href="{{route('admin') }}" class="btn btn-secondary">Cancel</a>
        {{ Form::close() }}
    </div><!--/card-body-->                  
</div><!--/container border p-3 mb-2 bg-white text-dark-->
@endsection