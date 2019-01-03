@extends('layouts.app')

@section('title','Book Issues')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <a href="{{route('admin')}}" class="btn btn-outline-secondary float-right">Back to Dashboard</a><br>
        <h2>Book Issues</h2><br>
        @if(count($book_issues) > 0 )
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><h5>Book Title</h5></th>
                        <th scope="col"><h5>Borrower</h5></th>
                        <th scope="col"><h5>Created At</h5></th>
                        <th scope="col"><h5>Update Date</h5></th>
                        <th scope="col"><h5>Expiry Date</h5></th>
                        <th scope="col"><h5>Return Date</h5></th>
                        <th scope="col"><h5>Approved/Declined</h5></th>
                        <th scope="col"><h5>Action - Return a book</h5></th>
                        <th scope="col"><h5></h5></th>
                        <th scope="col"><h5></h5></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($book_issues as $book_issue)
                        <tr>
                            <td>{{ $book_issue->book->title }}</td>
                            <td>{{ $book_issue->borrower->name}}</td>
                            <td>{{ $book_issue->created_at}}</td>
                            <td>{{$book_issue->updated_at}}</td>
                            <td>{{$book_issue->expiry_date}}</td>
                            <td>{{ $book_issue->return_date}}</td>
                            @if($book_issue->approved==1)
                            <td>
                                <button class="btn btn-success">Approved</button>
                            </td>
                            @elseif($book_issue->approved==2)
                            <td>
                                <button class="btn btn-secondary">Declined</button>
                            </td>
                            @else
                            <td></td>
                            @endif 
                            @if(!$book_issue->return_date && $book_issue->approved==1)
                            <td> 
                                <!-- Return a book form-->
                                {!! Form::model( $book_issue, ['route' => ['returnBook', $book_issue->id], 'method' => 'PUT','onsubmit' => "return confirm('Do you want to confirm returning this book?')"]) !!}
                                {!!Form::submit('Return a book',['class' => 'btn btn-info'])!!}    
                                {!!Form::close()!!}
                            </td> 
                            @else
                            <td></td>
                            @endif
                            <td>
                                <!--Edit-->
                                <a href="{{route('editBookIssue',['bookissue' =>  $book_issue->id  ])}}" class="btn btn-outline-secondary">Edit</a>
                            </td>
                            <td>
                                <!--Delete-->
                                {!!Form::open(['action' => ['BookIssuesController@destroy',$book_issue->id],'method'=>'POST','onsubmit' => "return confirm('Are you sure you want to delete?')"])!!}
                                {{Form::hidden('_method','DELETE')}}   
                                {{Form::submit('Delete',['class' => 'btn btn-outline-warning'])}}    
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table></br></br>
        @else
            <hr><!--If there is no book issues yet-->
            <p>No book issues yet.</p>
        @endif
    </div><!--/card-body-->
</div><!--/container border p-3 mb-2 bg-white text-dark-->  
@endsection