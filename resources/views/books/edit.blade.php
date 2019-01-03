@extends('layouts.app')

@section('title','Edit Book')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
        <div class="card-body">
                <h2>Edit Book</h2>
        </div><!--/card-body-->
        <div class="card-body">
                <!--Edit Book Form-->
                {{ Form::model( $book, ['route' => ['updateBook', $book->id], 'method' => 'put','enctype' => 'multipart/form-data']) }}
                <div class="form-group">
                        {{ Form::label('title','Book Title')}}
                        {{ Form::text('title',$book->title,['class' => 'form-control', 'placeholder' => 'Book Title'])}}
                </div>
                <div class="form-group">
                        {{ Form::label('author','Author')}}
                        {{ Form::text('author',$book->author,['class' => 'form-control', 'placeholder' => 'Author'])}}
                </div>
                <div class="form-group">
                        {{ Form::label('description','Description')}}
                        {{ Form::textarea('description',$book->description,[ 'class' => 'form-control', 'placeholder' => 'Description'])}}
                </div>
                <div class="form-group">
                        {{ Form::label('category_id','Category')}}
                        <select class="form-control" name="category_id">
                                @if ($categories->count())
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}"}} 
                                        @if($book->category_id==$category->id)
                                        selected="selected"
                                        @endif>
                                        {{ $category->category_name }}</option>    
                                        @endforeach
                                @endif
                        </select>
                </div>
                <div class="form-group">
                        {{ Form::label('number_of_copies','Number Of Copies')}}
                        {{ Form::text('number_of_copies',$book->number_of_copies,['class' => 'form-control', 'placeholder' => 'Number Of Copies'])}}
                </div>
                <div class="form-group">
                        {{ Form::label('number_of_pages','Number Of Pages')}}
                        {{ Form::text('number_of_pages',$book->number_of_pages,['class' => 'form-control', 'placeholder' => 'Number Of Pages'])}}
                </div>
                <div class="form-group">
                        {{ Form::label('cover image','Cover Image: ')}}
                        {{Form::file('cover_image')}}
                </div>
                <div class="form-group">
                        {{ Form::label('cover image','Upload PDF: ')}}
                        {{Form::file('file_pdf')}}
                </div>
                {{ Form::submit('Submit',['class' => 'btn btn-info'])}}
                <a href="{{route('admin') }}" class="btn btn-secondary">Cancel</a>
                {{ Form::close() }}
        </div><!--/card-body-->                 
</div><!--/container border p-3 mb-2 bg-white text-dark-->
@endsection