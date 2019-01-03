@extends('layouts.app')

@section('title','Edit Membership Type')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <h2>Edit Membership Type</h2>
    </div><!--/card-body-->
    <div class="card-body">
        <!--Edit membership type form-->
        {{ Form::model( $membership_type, ['route' => ['updateMembershipType', $membership_type->id], 'method' => 'put','enctype' => 'multipart/form-data']) }}
            <div class="form-group">
                {{ Form::label('type_name','Membership Type Name')}}
                {{ Form::text('type_name',$membership_type->type_name,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{ Form::label('type_details','Membership Type Details')}}
                {{ Form::text('type_details',$membership_type->type_details,['class' => 'form-control'])}}
            </div>
            {{ Form::submit('Submit',['class' => 'btn btn-info'])}}
            <a href="{{route('membershiptypeslist') }}" class="btn btn-secondary">Cancel</a>
        {{ Form::close() }}  
    </div><!--/card-body-->                  
</div><!--/container border p-3 mb-2 bg-white text-dark-->
@endsection