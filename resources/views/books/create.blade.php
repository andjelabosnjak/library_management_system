@extends('layouts.app')

@section('title','Add book')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
        <div class="card-body">
                <h2>Add new Book</h2><hr>
        </div><!--/card-body-->
        <div class="card-body">
                <!--Add new Book Form-->
                {{ Form::open(['action' => 'BooksController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) }}
                <div class="form-group">
                        {{ Form::label('title','Book Title')}}
                        {{ Form::text('title','',['class' => 'form-control', 'placeholder' => 'Book Title'])}}
                </div>
                <div class="form-group">
                        {{ Form::label('author','Author')}}
                        {{ Form::text('author','',['class' => 'form-control', 'placeholder' => 'Author'])}}
                </div>
                <div class="form-group">
                        {{ Form::label('description','Description')}}
                        {{ Form::textarea('description','',[ 'class' => 'form-control', 'placeholder' => 'Description'])}}
                </div>
                <div class="form-group">
                        {{ Form::label('category_id','Category')}}
                        <select class="form-control" name="category_id">
                                @if (count($categories) > 0)
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}"}}>{{ $category->category_name }}</option>    
                                        @endforeach
                                @endif
                        </select>
                </div>
                <div class="form-group">
                        {{ Form::label('number_of_copies','Number Of Copies')}}
                        {{ Form::text('number_of_copies','',['class' => 'form-control', 'placeholder' => 'Number Of Copies'])}}
                </div>
                <div class="form-group">
                        {{ Form::label('number_of_pages','Number Of Pages')}}
                        {{ Form::text('number_of_pages','',['class' => 'form-control', 'placeholder' => 'Number Of Pages'])}}
                </div>
                <div class="form-group">
                        {{ Form::label('cover_image','Cover Image: ')}}
                        {{Form::file('cover_image')}}
                </div>
                <div class="form-group">
                        {{ Form::label('cover_image','Upload PDF: ')}}
                        {{Form::file('file_pdf')}}
                </div>
                {{ Form::submit('Submit',['class' => 'btn btn-info'])}}
                <a href="{{route('admin') }}" class="btn btn-secondary">Cancel</a>
                {{ Form::close() }}
        </div><!--card-body-->                  
</div><!--container border p-3 mb-2 bg-white text-dark-->
@endsection
