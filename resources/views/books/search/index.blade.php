@extends('layouts.app')

@section('title','Books')

@section('content')
<div class="container">
    <div class="card-body">
        <h1>Books</h1>
            <!-- Search form-->
            {!! Form::open(['method'=>'GET','action' => 'SearchController@index','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
                <div class="input-group custom-search-form col-5 pull-right">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-dark" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div><!--/input-group custom-search-form col-5 pull-right-->
            {!! Form::close() !!}
            <br><br><hr>      
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
                                    <h3 class="card-title"><a style="color: #454140" href="{{ route('showBook',['book' => $book->book_id ])}}" >{{$book->title}}</a></h3>
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
                                            <!-- Borrow a book - form -->
                                            {!!Form::open(['action' => ['BookIssuesController@borrow',$book->id],'method'=>'POST','onsubmit' => "return confirm('Do you want to borrow this book?')"])!!} 
                                            {{Form::submit('Borrow a book',['class' => 'btn btn-info'])}}    
                                            {!!Form::close()!!}
                                        @endif <br>
                                        @else <br>
                                        @endauth
                                        @if($book->file_pdf)
                                        <a href="{{asset('storage/file_pdf/'.$book->file_pdf)}}" class="btn btn-primary" download><i class="fa fa-download"></i> Download in PDF</a>
                                        <br><br>
                                        @endif
                                    </div><!--/card-text-->
                                </div><!--/container-->
                            </div><!--/card-block-->
                        </div><!--/card--><br>
                    </div><!--/col-sm-6 col-md-4 col-lg-3-->
                @endforeach
            </div><!--/row-->
        <!-- If there is no books matching search pattern-->
        @else
            <p>No books found.</p>
        @endif
    </div><!--/card-body-->
</div><!--/container-->
@endsection