@extends('layouts.app')

@section('title','Admin Panel')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-6 col-sm-4 col-sm-pull-9 sidebar-offcanvas" id="sidebar">
            <div class="list-group" style="font-size:20px;">
                <a href="#"class="list-group-item active list-group-item-action list-group-item-dark"><center><span class="fa fa-dashboard"></span> Dashboard</center></a>

                <div class="dropdown list-group-item-dark">
                    <a href="#" class="list-group-item list-group-item-action list-group-item-light nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-book"></i> Books</a>
                        <div style="width:100%;" class="dropdown-menu list-group-item-dark" aria-labelledby="dropdownMenuButton" >
                            <a class="dropdown-item list-group-item active list-group-item-action list-group-item-dark" href="{{route('booklist')}}"><i class="fa fa-list"></i> All Books</a>
                            <a class="dropdown-item list-group-item active list-group-item-action list-group-item-dark" href="{{route('createNewBook')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add new Book</a>
                        </div>
                </div>

                <div class="dropdown list-group-item-dark">
                    <a href="#" class="list-group-item list-group-item-action list-group-item-dark nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-book"></i> Book Categories</a>
                        <div style="width:100%;" class="dropdown-menu list-group-item-dark" aria-labelledby="dropdownMenuButton" >
                            <a class="dropdown-item list-group-item active list-group-item-action list-group-item-dark" href="{{ route('bookcategorieslist') }}"><i class="fa fa-list"></i> All Categories</a>
                            <a class="dropdown-item list-group-item active list-group-item-action list-group-item-dark" href="{{route('createNewBookCategory')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add new Category</a>
                        </div>
                </div>

                <div class="dropdown list-group-item-dark">
                    <a href="#" class="list-group-item list-group-item-action list-group-item-light nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Registered Members</a>
                       <div style="width:100%;" class="dropdown-menu list-group-item-dark" aria-labelledby="dropdownMenuButton" >
                            <a class="dropdown-item list-group-item active list-group-item-action list-group-item-dark" href="{{route('registeredmemberslist')}}"><i class="fa fa-list"></i> All Registered Members</a>
                            <a class="dropdown-item list-group-item active list-group-item-action list-group-item-dark" href="{{route('createNewMember')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add new Member</a>
                       </div>
                </div>

                <div class="dropdown list-group-item-dark">
                    <a href="#" class="list-group-item list-group-item-action list-group-item-dark nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-credit-card"></i> Membership Types</a>
                        <div style="width:100%;" class="dropdown-menu list-group-item-dark" aria-labelledby="dropdownMenuButton" >
                            <a class="dropdown-item list-group-item active list-group-item-action list-group-item-dark" href="{{ route('membershiptypeslist') }}"><i class="fa fa-list"></i> All Membership Types</a>
                            <a class="dropdown-item list-group-item active list-group-item-action list-group-item-dark" href="{{route('createNewMembershipType')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add new Membership Type</a>
                        </div>
                </div>  
                          
                <div class="dropdown list-group-item-dark">
                    <a href="#" class="list-group-item list-group-item-action list-group-item-light nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-book" aria-hidden="true"></i> Book Issues</a>
                        <div style="width:100%;" class="dropdown-menu list-group-item-dark" aria-labelledby="dropdownMenuButton" >
                            <a class="dropdown-item list-group-item active list-group-item-action list-group-item-dark" href="{{route('bookissueslog')}}"><i class="fa fa-list"></i> All Book Issues</a>
                            <a class="dropdown-item list-group-item active list-group-item-action list-group-item-dark" href="{{route('createNewBookIssue')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add new Book Issue</a>
                        </div>
                </div>

                <div class="dropdown list-group-item-dark">
                    <a class="list-group-item list-group-item-action list-group-item-dark nav-link" href="{{route('pendingBookIssues')}}" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false"><i class="fa fa-check-square-o" aria-hidden="true"></i> Pending Book Issues <span class="badge badge-dark">{!!$pending_book_issues!!}</span></a>
                </div>
            </div><!--/.list-group-->
        </div><!--/.sidebar-offcanvas-->
        <div class="col-xs-6 col-sm-8 col-sm-pull-3">
            <h1>Statistics</h1>
            <section class="row text-center placeholders">
                <div class="col-6 col-sm-3 placeholder">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                    <br><br><h4>{!!$total_books!!} Books</h4>
                    <div class="text-muted">Total number of book titles</div>
                </div>
                <div class="col-6 col-sm-3 placeholder">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                    <br><br><h4>{!!$borrowedbooks!!} Books Borrowed</h4>
                    <span class="text-muted">Current borrowed books</span>
                </div>
                <div class="col-6 col-sm-3 placeholder">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                    <br><br><h4>{!!$members!!} Members</h4>
                    <span class="text-muted">Total number of members</span>
                </div>
                <div class="col-6 col-sm-3 placeholder">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                    <br><br><h4>{!!$bookissues!!} Book Issues</h4>
                    <span class="text-muted">Total book issues</span>
                </div>
            </section>
        </div><!--/col-xs-6 col-sm-8 col-sm-pull-3-->
    </div><!--/row-->
</div><!--/container-fluid-->
@endsection
