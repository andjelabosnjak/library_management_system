@extends('layouts.app')

@section('title','Membership Types List')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <a href="{{route('admin')}}" class="btn btn-outline-secondary float-right">Back to Dashboard</a><br>
        <h2>Membership Types</h2></br></br>
        @if(count($membership_types) > 0 )
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><h5>ID</h5></th>
                        <th scope="col"><h5>Membership Type Name</h5></th>
                        <th scope="col"><h5>Membership Type Details</h5></th>
                        <th scope="col"><h5>Created At</h5></th>
                        <th scope="col"><h5>Updated At</h5></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($membership_types as $membership_type)
                        <tr>
                            <td>{{ $membership_type->id }}</td>
                            <td>{{ $membership_type->type_name}}</td>
                            <td>{{ $membership_type->type_details}}</td>
                            <td>{{ $membership_type->created_at}}</td>
                            <td>{{ $membership_type->updated_at}}</td>
                            <td>
                                <a href="{{route('editMembershipType',['membership_type' =>  $membership_type->id  ])}}" class="btn btn-outline-secondary">Edit</a>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table></br></br>
        @else
            <!--if there is no any membership type-->
            <p>No membership types yet.</p>
        @endif
    </div><!--/card-body--> 
</div><!--/container border p-3 mb-2 bg-white text-dark--> 
@endsection