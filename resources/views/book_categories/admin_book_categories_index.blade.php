@extends('layouts.app')

@section('title','Book Categories List')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
    <div class="card-body">
        <a href="{{route('admin')}}" class="btn btn-outline-secondary float-right">Back to Dashboard</a><br>
        <h2>Book Categories List</h2></br>
        @if(count($book_categories) > 0 )
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><h5>ID</h5></th>
                        <th scope="col"><h5>Category Name</h5></th>
                        <td scope="col"><h5>Created At</h5></td>
                        <td scope="col"><h5>Updated At</h5></td>
                        <td scope="col"><h5>Number of books of this category</h5></td>
                        <td scope="col"></td>
                        <td scope="col"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($book_categories as $book_category)
                        <tr>
                            <td>{{ $book_category->id }}</td>
                            <td>{{ $book_category->category_name}}</td>
                            <td>{{ $book_category->created_at}}</td>
                            <td>{{ $book_category->updated_at}}</td>
                            <td>{{ $book_category->numberOfBooksInCategory()}}</td>
                            <td>
                                <!--Edit-->
                                <a href="{{route('editBookCategory',['category' =>  $book_category->id  ])}}" class="btn btn-outline-secondary">Edit</a><br><br>
                            </td>
                            <td>
                                <!--Delete-->   
                                {!!Form::open(['action' => ['BookCategoriesController@destroy',$book_category->id],'method'=>'POST','onsubmit' => "return confirm('Are you sure you want to delete?')"])!!}
                                    {{Form::hidden('_method','DELETE')}}   
                                    {{Form::submit('Delete',['class' => 'btn btn-outline-warning'])}}    
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table></br></br>
        @else
            <p>No book categories yet.</p>
        @endif
    </div><!--/card-body-->
</div><!--/container border p-3 mb-2 bg-white text-dark-->
@endsection