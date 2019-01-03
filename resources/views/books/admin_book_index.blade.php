@extends('layouts.app')

@section('title','Book List')

@section('content')
<div class="container">
    <div class="card-body">
        <a href="{{route('admin')}}" class="btn btn-outline-secondary float-right">Back to Dashboard</a><br><br>
            <h1>Books</h1><hr>      
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
                                    <h3 class="card-title"><a style="color: #454140" href="{{ route('showbooklist',['book' => $book->id ])}}" >{{$book->title}}</a></h3>
                                    <div class="card-text">
                                        ID: <strong>{!!$book->id!!}</strong><br>
                                        Author: <strong> {!!$book->author!!}</strong><br>
                                        Category: <strong> {!!$book->category->category_name!!} </strong><br>
                                        Number of copies: <strong>{!!$book->number_of_copies!!}</strong><br>
                                        Number of pages: <strong> {!!$book->number_of_pages!!} </strong><br>
                                        Created at: <strong>{!! $book->created_at !!}</strong><br>
                                        Updated at: <strong>{!! $book->updated_at !!}</strong><br>
                                        @if($book->available_quantity()>0)
                                        Status: <strong>Available({!!$book->available_quantity()!!})</strong><br>
                                        @else
                                        Status: <strong>Not available</strong><br>
                                        @endif
                                        Total borrows: <strong>{!!$book->borrows()!!}</strong><br><br>
                                            <!-- Edit -->
                                            <a href="{{route('editBook',['book' =>  $book->id  ])}}" class="btn btn-outline-secondary">Edit</a><br><br>
                                            <!--Delete-->
                                            {!!Form::open(['action' => ['BooksController@destroy',$book->id],'method'=>'POST','onsubmit' => "return confirm('Are you sure you want to delete?')"])!!}
                                                {{Form::hidden('_method','DELETE')}}   
                                                {{Form::submit('Delete',['class' => 'btn btn-outline-warning'])}}    
                                            {!!Form::close()!!}
                                        <br><br>
                                    </div><!--/card-text-->
                                </div><!--/container-->
                            </div><!--/card-block-->
                        </div><!--/card--><br>
                    </div><!--/col-sm-6 col-md-4 col-lg-3-->
                @endforeach
            </div><!--/row-->
        <!-- If there is no books-->
        @else
            <p>No books in Library.</p>
        @endif
    </div><!--/card-body-->
</div><!--/container-->  
@endsection