<!-- Inherit  -->
@extends('pages.proto-home')
<!-- CSS -->
@section('proto-head')
  <link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
  <!-- <script type="text/javascript" src="{{ asset('/js/profile.js') }}"></script> -->
@endsection

@section('proto-content')
<div class="container fill">
  <div class="row h-100">
    <div class="col-sm-12 col-md-6 my-auto align-items-center align-self-center justify-content-center">
      <img class="mx-auto d-block photo" src="/imgs/selfie.jpg" alt="Selfie">
    </div>
    <div class="col-sm-12 col-md-6 text-center align-self-center">
      I’m a graduate student of the Information & Security program, Electrical Engineering, National Taiwan University. This program aims to train students with <b>Machine Learning & Security skills.</b>
Hence, My research field is about the combination of ML & Security. In short, it is about how to train a model and protect the private data simultaneously.
    </div>
  </div>
</div>

<footer>
  <p class="text-center"> Histroy Visitor(s): {{ $counter ?? '0' }}</p>
</footer>

@endsection

<!-- Mehtod 1 - Without RWD -->
<!-- @section('proto-content')
<div class="container fill">
  <div class="row center">
    <img id="photo" src="/imgs/selfie.jpg" alt="Selfie">
    <div class="col-2"></div>
    <div class="col-5 text align-self-center">
      I’m a graduate student of the Information & Security program, Electrical Engineering, National Taiwan University. This program aims to train students with <b>Machine Learning & Security skills.</b>
Hence, My research field is about the combination of ML & Security. In short, it is about how to train a model and protect the private data simultaneously.
    </div>
  </div>
</div>
@endsection -->
