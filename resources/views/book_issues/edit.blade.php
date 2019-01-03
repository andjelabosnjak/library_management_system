@extends('layouts.app')

@section('title','Edit Book Issue')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <h2>Edit Book Issue</h2>
    </div><!--/card-body-->
    <div class="card-body">
        <!--Edit book issue form-->
        {{ Form::model( $book_issue, ['route' => ['updateBookIssue', $book_issue->id], 'method' => 'put']) }}
            <div class="form-group">
                {{ Form::label('book_id','Book')}}
                <select class="form-control" name="book_id">
                    @if (count($books) > 0)
                        @foreach($books as $book)
                        @if($book->available_quantity()>0)
                            <option value="{{ $book->id }}"}} @if($book->id==$book_issue->book_id) selected="selected" @endif>
                            {{ $book->title }}
                            </option>
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
                        <option value="{{ $borrower->id }}"}} @if($borrower->id==$book_issue->borrower_id) selected="selected" @endif>{{ $borrower->name }}</option>    
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                {{ Form::label('expiry_date','Expiry Date')}}
                {!! Form::date('expiry_date',\Carbon\Carbon::parse($book_issue->expiry_date),['class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                {{ Form::label('return_date','Return Date')}}
                {{ Form::date('return_date',(isset($book_issue->return_date) ? \Carbon\Carbon::parse($book_issue->return_date) : null ),['class' => 'form-control'])}}
            </div>
            {{ Form::submit('Submit',['class' => 'btn btn-info'])}}
            <a href="{{route('bookissueslog') }}" class="btn btn-secondary">Cancel</a>
        {{ Form::close() }}  
    </div><!--/card-body-->                 
</div><!--/container border p-3 mb-2 bg-white text-dark-->
@endsection