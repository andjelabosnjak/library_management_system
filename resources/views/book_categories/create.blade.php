@extends('layouts.app')

@section('title','Add Book Category')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <h2>Add new Category</h2><hr>
    </div><!--/card-body-->
    <div class="card-body">
        <!--Add new book category form-->
         {{ Form::open(['action' => 'BookCategoriesController@store', 'method' => 'POST']) }}
            <div class="form-group">
                {{ Form::label('category_name','Category Name')}}
                {{ Form::text('category_name','',['class' => 'form-control', 'placeholder' => 'Category Name'])}}
            </div>
            {{ Form::submit('Submit',['class' => 'btn btn-info'])}}
            <a href="{{route('admin') }}" class="btn btn-secondary">Cancel</a>
        {{ Form::close() }}
    </div><!--/card-body-->                  
</div><!--/container border p-3 mb-2 bg-white text-dark-->
@endsection