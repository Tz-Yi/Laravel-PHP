<!-- Inherit  -->
@extends('pages.proto-home')
<!-- CSS -->
@section('proto-head')
  <link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
  <!-- <script type="text/javascript" src="{{ asset('/js/profile.js') }}"></script> -->
@endsection

@section('proto-content')
<div class="container fill">
  <div class="row h-100 justify-content-center">
    <div class="col-md-8 align-self-center">
      <div class="card">
        @forelse ($messages as $message)
          <div class="card-header text-center"> {{ e($message->name) }} </div>
          <div class="card-body"> {{ e($message->content) }} </div>
        @empty
          <p> No messages !</p>
        @endforelse
      </div>
      <div class="card">
        <div class="card-header text-center">{{ __('發表留言') }}</div>
        <div class="card-body">
          <form method="POST" action="/messageBoard/upload" >
            @csrf
            <div class="form-group row h-50">
              <div class="col-md-10 justify-content-center offset-md-1 h-50 ">
                <input id="content" type="text" class="form-control" name="content" required autofocus>
              </div>
            </div>
            <div class="form-groupmb-0" align="right">
              <button type="submit" class="btn btn-outline-primary">
                {{ __('Post') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
