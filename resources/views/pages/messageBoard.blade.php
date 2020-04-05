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
          <!-- <div class="card-header text-center">
            <img src="data:image/jpeg;base64,{{ chunk_split(base64_encode($message->image)) }}" alt="Please upload your photo.">
            {{ e($message->name) }}
          </div>
          <div class="card-body"> {{ e($message->content) }} </div>
          <div class="card-footer">
            <form class="" action="{{ url('/messageBoard/delete') }}" method="post">
              @csrf
              <div class="form-group" align="right">
                <input type="hidden" name="id" value="{{ $message->id }}">
                <input type="submit" name="submit" class="btn btn-outline-dark" value="Delete" />
              </div>
            </form>
          </div> -->
          <div class="media text-muted pt-3">
            <img src="data:image/jpeg;base64,{{ chunk_split(base64_encode($message->image)) }}" class="mr-3 rounded" alt="Please upload your photo.">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <strong class="d-block text-gray-dark">
                {{ e($message->name) }}
              </strong>
              {{ e($message->content) }}
            </p>
            <form class="" action="{{ url('/messageBoard/delete') }}" method="post">
              @csrf
              <div class="form-group" align="right">
                <input type="hidden" name="id" value="{{ $message->id }}">
                <input type="submit" name="submit" class="btn btn-outline-dark" value="Remove" />
              </div>
            </form>
          </div>
        @empty
          <p> No messages !</p>
        @endforelse
        {{ $messages->links() }}
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
