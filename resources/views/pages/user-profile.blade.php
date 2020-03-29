<!-- Inherit  -->
@extends('pages.proto-home')
<!-- CSS -->
@section('proto-head')
  <link rel="stylesheet" href="{{ asset('/css/user-profile.css') }}">
  <!-- <script type="text/javascript" src="{{ asset('/js/profile.js') }}"></script> -->
@endsection

@section('proto-content')



<div class="container fill">
    <div class="row h-100 justify-content-center">
        <div class="col-md-8 align-self-center">
            <div class="card">
                <div class="card-header">{{ __('Upload Profile Picture') }}</div>
                <div class="card-body">
                  <form method="post" action="{{ url('user-profile/update') }}"  enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                     <div class="row">
                      <div class="col-md-8">
                       <input type="file" name="image" />
                      </div>
                     </div>
                    </div>
                    <div class="form-group" align="center">
                     <input type="submit" name="update" class="btn btn-primary" value="Submit" />
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
