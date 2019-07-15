@extends('layouts')
@section('title', '| home')
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h1>LastWishes</h1>
      <p class="lead">
        If something happen to you, your feelings won't be lost.
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <h4>How it Works</h4>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-3">
      <div class="tile">
        <img src="/components/flat-ui/images/icons/svg/pencils.svg" alt="Sign up" class="tile-image big-illustration">
        <h3 class="tile-title">1. Sign Up</h3>
        <p>So you would start to make wishes in case something happen to you.</p>
      </div>
    </div>
    <div class="col-xs-12 col-sm-3">
      <div class="tile">
        <img src="/components/flat-ui/images/icons/svg/gift-box.svg" alt="Make a wish"
             class="tile-image big-illustration">
        <h3 class="tile-title">2. Make a wish</h3>
        <p>Add a message you want to sent in case something happen.</p>
      </div>
    </div>
    <div class="col-xs-12 col-sm-3">
      <div class="tile">
        <img src="/components/flat-ui/images/icons/svg/loop.svg" alt="You're Ok!" class="tile-image big-illustration">
        <h3 class="tile-title">3. Keep in touch</h3>
        <p>Answer our emails or use our App to say you're ok.</p>
      </div>
    </div>
    <div class="col-xs-12 col-sm-3">
      <div class="tile">
        <img src="/components/flat-ui/images/icons/svg/retina.svg" alt="Grant your wishes"
             class="tile-image big-illustration">
        <h3 class="tile-title">4. Grant wishes</h3>
        <p>In case you're out, we'll deliver your messages and wishes.</p>
      </div>
    </div>
  </div>
@endsection