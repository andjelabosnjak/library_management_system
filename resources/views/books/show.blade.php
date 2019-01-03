@extends('layouts.app')

@section('title','Show Book details')

@section('content')
<div class="container">
    <div class="card-body">
        <a href="{{route('books')}}" class="btn btn-outline-secondary">Back to Books</a>
    </div><!--/card-body-->   
    <div class="card-body">
         @isset($book)
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img style="width:100%" src="{{ asset('storage/cover_images/'.$book->cover_image) }}">
                </div><!--/col-md-4 col-sm-4-->
                <div class="col-md-8 col-sm-8">
                    <h1>{{$book->title}}</h1>
                    <p>{{$book->description}}</p>
                </div><!--/col-md-8 col-sm-8-->
            </div><!--/row-->
        @endisset
    </div><!--/card-body-->
</div><!--container-->
@endsection