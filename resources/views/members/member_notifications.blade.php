@extends('layouts.app')

@section('title','Notifications')

@section('content')
<div class="container border p-3 mb-2 bg-white text-dark">
  <div class="card-body">
    <button type="button" class="btn btn-info pull-right">
      Unread Notifications <span class="badge badge-light">{{$unread}}</span>
    </button>
    <h2>Notifications</h2><hr>
    @if(count($notifications) > 0)
      @foreach ($notifications as $notification)
        <div class="alert alert-info page-info">
          {!! $notification->data['message'] !!}
          {{$notification->markAsRead()}}
        </div><!--/alert alert-info page-info-->
      @endforeach
    @else
      <!--If there is no notifications for current user-->
      <p>No notifications found.</p>
    @endif
  </div><!--/card-body-->
</div><!--container border p-3 mb-2 bg-white text-dark-->
@endsection