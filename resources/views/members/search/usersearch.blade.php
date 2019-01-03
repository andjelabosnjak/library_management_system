@extends('layouts.app')

@section('title','Registered Members List')

@section('content')
<div class="w-100 border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <a href="{{route('admin')}}" class="btn btn-outline-secondary float-right">Back to Dashboard</a><br>
        <h2>Registered Members List</h2></br>
        <div class="container float-left">
        <!-- Search form-->
        {!! Form::open(['method'=>'GET','action' => 'SearchController@usersearch','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <div class="input-group custom-search-form col-5 pull-right">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-dark" type="submit">
                    Search
                    </button>
                </span>
            </div><!--/input-group custom-search-form col-5 pull-right-->
        {!! Form::close() !!}
        </div><!--/container float left-->
        <br><br><br>
        @if(count($members) > 0 )
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><h6>ID</h6></th>
                        <th scope="col"><h6>Name</h6></th>
                        <th scope="col"><h6>Email</h6></th>
                        <th scope="col"><h6>Contact number</h6></th>
                        <th scope="col"><h6>Address</h6></th>
                        <th scope="col"><h6>Type</h6></th>
                        <th scope="col"><h6>Fine</h6></th>
                        <th scope="col"><h6>Membership</h6></th>
                        <th scope="col"><h6>Membership fee status</h6></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td>{{ $member->user_id }}</td>
                            <td>{{ $member->name}}</td>
                            <td>{{ $member->email}}</td>
                            <td>{{ $member->contact_number}}</td>
                            <td>{{ $member->address}}</td>
                            <td>{{ $member->type}}</td>
                            <td>{{ $member->fine()}}</td>
                            <td>{{ $member->membership->type_name }}</td>
                            <td>{{ $member->membership_status}}</td>
                            @if($member->fine()>0)
                            <td>
                                <!-- Clear all form-->
                                {!! Form::model( $member, ['route' => ['clearMemberFine', $member->user_id], 'method' => 'PUT','onsubmit' => "return confirm('Do you want to clear fine for this user?')"]) !!}
                                {!!Form::submit('Clear Fine',['class' => 'btn btn-warning'])!!}    
                                {!!Form::close()!!}
                            </td>
                            @else
                            <td></td>
                            @endif                            
                            <td>
                                <!--Edit-->
                                <a href="{{route('editMemberDetails',['member' =>  $member->user_id  ])}}" class="btn btn-outline-secondary">Edit</a>
                            </td>
                            <td>
                                <!--Delete-->
                                {!!Form::open(['action' => ['MembersController@destroy',$member->user_id],'method'=>'POST','onsubmit' => "return confirm('Are you sure you want to delete?')"])!!}
                                {{Form::hidden('_method','DELETE')}}   
                                {{Form::submit('Delete',['class' => 'btn btn-outline-warning'])}}    
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table></br></br>    
        @else
            <!--if there is no any members matching search pattern-->
            <hr><br><p>No members found.</p>
        @endif
    </div><!--/card-body-->
</div><!--/container border p-3 mb-2 bg-white text-dark-->
@endsection