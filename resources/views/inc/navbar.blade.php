<nav class="navbar navbar-expand-md sticky-top navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fa fa-book" aria-hidden="true"></i> {{ config('app.name', 'LIBRARY') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books') }}">Books</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown"><!--Categories dropdown menu-->
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @php($categories= App\BookCategory::all())
                                    @if(count($categories)> 0)
                                        @foreach($categories as $category)
                                            <a class="dropdown-item" href="{{ route('booksInCategory',['category' => $category->id ])}}">{{$category->category_name}}</a>
                                        @endforeach
                                    @endif
                            </div><!--/dropdown-menu-->
                    </div><!--/dropdown-->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width:400px;height:350px;">
                            <div class="card" style="width:100%; height:100%;">
                                <div class="card-header" style="background-color:#9fb396">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="{{asset('images/profile.jpg')}}" alt="User">
                                        </div><!--/col-sm-4-->
                                        <div class="col-sm-8">
                                            <h2><b>{{Auth::user()->name}}</b></h2> 
                                            <p>Member since {{auth::user()->created_at}} </p> 
                                        </div><!--/col-sm-8-->
                                    </div><!--/row-->
                                </div><!--/card-header-->
                                <div class="card-body" style="background-color:#e3e3cd">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <a class="btn btn-dark" href="{{ route('notifications') }}">Notifications  <span class="badge badge-info">{!!Auth()->user()->unreadNotifications()->count()!!}</span></a>
                                        </div><!--/col-sm-4-->
                                        <div class="col-sm-8">
                                            @if(Auth::user()->type == 'admin')
                                                <a class="btn btn-secondary" href="{{ route('admin') }}"><i class="fa fa-lock" aria-hidden="true"></i> Administration</a> <br>
                                            @endif
                                        </div><!--/col-sm-8-->
                                    </div><!--/row--><br>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <a class="btn btn-dark" href="{{route('mybookissuelog')}}"><i class="fa fa-history" aria-hidden="true"></i> My Book Issue Log</a>
                                        </div><!--/col-sm-4-->
                                        <div class="col-sm-4">
                                            <a class="btn btn-dark" href="{{route('inbox')}}"><i class="fa fa-commenting-o" aria-hidden="true"></i> Messages</a>
                                        </div>
                                    </div><!--/row--><br>
                                    <a class="btn btn-dark pull-left" href="{{ route('myProfile') }}"><i class="fa fa-cogs" aria-hidden="true"></i> My Profile</a>
                                    <a class="btn btn-dark pull-right" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div><!--/card-body-->
                            </div><!--/card-->
                        </div><!--/dropdown-menu dropdown-menu-right-->
                    </li>
                @endguest
            </ul>
        </div><!--/collapse navbar-collapse-->
    </div><!--/container-->
</nav>
