@extends('layouts.app')

@section('title','Pending Book Issues')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <a href="{{route('admin')}}" class="btn btn-outline-secondary float-right">Back to Dashboard</a><br>
        <h2>Pending Book Issues</h2>
        @if(count($book_issues) > 0 )
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><h5>Book Title</h5></th>
                        <th scope="col"><h5>Borrower</h5></th>
                        <th scope="col"><h5>Created At</h5></th>
                        <th scope="col"><h5>Updated At</h5></th>
                        <th scope="col"><h5>Expiry Date</h5></th>
                        <th scope="col"><h5>Return Date</h5></th>
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
                            @if($book_issue->approved==0)
                            <td>
                                <!--Approve book issue form-->
                                {!! Form::model( $book_issue, ['route' => ['approveBookIssue', $book_issue->id], 'method' => 'PUT','onsubmit' => "return confirm('Do you want to approve this book issue?')"]) !!}
                                {!!Form::submit('Approve',['class' => 'btn btn-info'])!!}    
                                {!!Form::close()!!}
                            </td>
                            <td>
                                <!--Decline book issue form-->
                                {!! Form::model( $book_issue, ['route' => ['declineBookIssue', $book_issue->id], 'method' => 'PUT','onsubmit' => "return confirm('Do you want to decline this book issue?')"]) !!}
                                {!!Form::submit('Decline',['class' => 'btn btn-danger'])!!}    
                                {!!Form::close()!!}
                            </td>
                            @elseif($book_issue->approved==1)
                            <td>
                                <button class="btn btn-secondary">Approved</button>
                            </td>
                            <td></td>
                            @elseif($book_issue->approved==2)
                            <td>
                                <button class="btn btn-danger">Declined</button>
                            </td>
                            <td></td>
                            @else
                            <td></td>
                            <td></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table></br></br>
        @else
            <!--if there is no pending book issues-->
            <hr>
            <p>No pending book issues.</p>
        @endif
    </div><!--/card-body-->
</div><!--/container border p-3 mb-2 bg-white text-dark--> 
@endsection