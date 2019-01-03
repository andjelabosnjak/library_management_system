@extends('layouts.app')

@section('title','My Book Issue Log')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <h2>My Book Issue Log</h2>
        @if(count($mybookissues) > 0 )
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><h5>Book Title</h5></th>
                        <th scope="col"><h5>Issue Date</h5></th>
                        <th scope="col"><h5>Expiry Date</h5></th>
                        <th scope="col"><h5>Return Date</h5></th>
                        <th scope="col"><h5>Days Remaining</h5></th>
                        <th scope="col"><h5>Status</h5></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mybookissues as $mybookissue)
                        <tr>
                            <td>{{ $mybookissue->book->title }}</td>
                            <td>{{ $mybookissue->created_at}}</td>
                            <td>{{$mybookissue->expiry_date}}</td>
                            <td>{{ $mybookissue->return_date}}</td>
                            @if($mybookissue->DaysRemaining()>0 && $mybookissue->return_date==null)
                            <td>
                                {{$mybookissue->DaysRemaining()}}
                            </td>
                            @elseif($mybookissue->DaysRemaining()<0 && $mybookissue->return_date==null)
                            <td>
                                <p>You are late for  {!!-$mybookissue->DaysRemaining()!!} days</p>
                            </td>
                            @else   
                            <td>0</td>    
                            @endif
                            <td>
                            @if($mybookissue->return_date)
                                <button class="btn btn-info">Returned</button>
                            @else
                                <button class="btn btn-danger">Assigned</button>
                            @endif 
                            </td>  
                        </tr>
                    @endforeach
                </tbody>
            </table></br></br>
        @else
            <hr><!--if there is no book issues for current user-->
            <p>No book issues yet.</p>
        @endif
    </div><!--/card-body-->
</div><!--/container border p-3 mb-2 bg-white text-dark-->
@endsection