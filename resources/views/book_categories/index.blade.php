@extends('layouts.app')

@section('title','Categories')

@section('content')
<div class="container">
    <div class="card-body">
        <h1>Category: {!!$category->category_name!!} </h1><hr> 
    </div><!--/card-body-->
    <div class="card-body">
        @if(count($books) > 0)
            <div class="row">
                @foreach($books as $book)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                            <img src="{{ asset('storage/cover_images/'.$book->cover_image) }}">
                            <div class="card-block">
                                <div class="container">
                                    <h3 class="card-title"><a style="color: #454140" href="{{ route('showBook',['book' => $book->id ])}}" >{{$book->title}}</a></h3>
                                    <div class="card-text">
                                        Author: <strong> {!!$book->author!!}</strong><br>
                                        Category: <strong> {!!$book->category->category_name!!} </strong><br>
                                        Number of pages: <strong> {!!$book->number_of_pages!!} </strong><br>
                                        @auth
                                        @if($book->available_quantity()>0)
                                        Status: <strong>Available({!!$book->available_quantity()!!})</strong><br><br>
                                        @else
                                        Status: <strong>Not available</strong><br><br>
                                        @endif
                                        @if($book->available_quantity()>0)
                                            <!--Borrow a book - form -->
                                            {!!Form::open(['action' => ['BookIssuesController@borrow',$book->id],'method'=>'POST','onsubmit' => "return confirm('Do you want to borrow this book?')"])!!} 
                                            {{Form::submit('Borrow a book',['class' => 'btn btn-info'])}}    
                                            {!!Form::close()!!}    
                                            <br>
                                        @endif 
                                        @else <br>
                                        @endauth
                                        @if($book->file_pdf)
                                        <a href="{{asset('storage/file_pdf/'.$book->file_pdf)}}" class="btn btn-primary" download><i class="fa fa-download"></i> Download in PDF</a>
                                        <br><br>
                                        @endif
                                    </div><!--card-text-->
                                </div><!--/container-->
                            </div><!--/card-block-->
                        </div><!--/card--><br>
                    </div><!--/col-sm-6 col-md-4 col-lg-3-->
                @endforeach
            </div><!--/row-->
        @else
            <!-- If there is no books of particular category-->
            <p>No books of this category.</p>
        @endif
    </div><!--/card-body-->
</div><!--/container-->
@endsection