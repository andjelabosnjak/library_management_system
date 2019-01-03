@extends('layouts.app')

@section('title','Add Book Issue')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <h2>Add Book Issue</h2><hr>
    </div><!--/card-body-->
    <div class="card-body">
        <!--Add new book issue form-->
        {{ Form::open(['action' => 'BookIssuesController@store', 'method' => 'POST']) }}
            <div class="form-group">
                {{ Form::label('book_id','Book')}}
                <select class="form-control" name="book_id">
                    @if (count($books) > 0)
                        @foreach($books as $book)
                            @if($book->available_quantity()>0)
                            <option value="{{ $book->id }}"}}>{{ $book->title }}</option>
                            @endif        
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                {{ Form::label('borrower_id','Borrower')}}
                <select class="form-control" name="borrower_id">
                    @if (count($borrowers) > 0)
                        @foreach($borrowers as $borrower)
                            <option value="{{ $borrower->id }}"}}>{{ $borrower->name }}</option>    
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                {{ Form::label('expiry_date','Expiry Date')}}
                {{ Form::date('expiry_date','',['class' => 'form-control', 'placeholder' => 'Pick a expiry date'])}}
            </div>
            {{ Form::submit('Submit',['class' => 'btn btn-info'])}}
            <a href="{{route('admin') }}" class="btn btn-secondary">Cancel</a>
        {{ Form::close() }}
    </div><!--/card-body-->                 
</div><!--/container border p-3 mb-2 bg-white text-dark-->
@endsection