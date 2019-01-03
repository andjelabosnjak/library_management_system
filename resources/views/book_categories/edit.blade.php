@extends('layouts.app')

@section('title','Edit Book Category')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <h2>Edit Category</h2>
    </div><!--/card-body-->
    <div class="card-body">
        <!-- Edot book category form-->
        {{ Form::model( $book_category, ['route' => ['updateBookCategory', $book_category->id], 'method' => 'put','enctype' => 'multipart/form-data']) }}
            <div class="form-group">
                {{ Form::label('category_name','Category Name')}}
                {{ Form::text('category_name',$book_category->category_name,['class' => 'form-control'])}}
            </div>
            {{ Form::submit('Submit',['class' => 'btn btn-info'])}}
            <a href="{{route('bookcategorieslist') }}" class="btn btn-secondary">Cancel</a>
        {{ Form::close() }}  
    </div><!--/card-body-->                   
</div><!--/container border p-3 mb-2 bg-white text-dark-->
@endsection