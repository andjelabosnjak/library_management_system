@extends('layouts.app')

@section('title','Add Membership Type')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <h2>Add new Membership Type</h2><hr>
    </div><!--/card-body-->
    <div class="card-body">
        <!--Add new membership type form-->
        {{ Form::open(['action' => 'MembershipTypesController@store', 'method' => 'POST']) }}
            <div class="form-group">
                {{ Form::label('type_name','Membership Type Name')}}
                {{ Form::text('type_name','',['class' => 'form-control', 'placeholder' => 'Membership Type Name'])}}
            </div>
            <div class="form-group">
                {{ Form::label('type_details','Membership Type Details')}}
                {{ Form::text('type_details','',['class' => 'form-control', 'placeholder' => 'Membership Type Details'])}}
            </div>
            {{ Form::submit('Submit',['class' => 'btn btn-info'])}}
            <a href="{{route('admin') }}" class="btn btn-secondary">Cancel</a>
        {{ Form::close() }}
    </div><!--/card-body-->                  
</div><!--/container border p-3 mb-2 bg-white text-dark-->
@endsection