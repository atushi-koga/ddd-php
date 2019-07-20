@extends('layouts')
@section('title', '| login')
@section('content')
  <div>signIn</div>
  <div>
    <form method="post" action="{{ route('signIn') }}">
      @csrf
      @if($errors->has('signIn'))
        <span>{{ $errors->first('signIn') }}</span>
      @endif
      <div>
        <label for="email">Email:</label>
        <input id="email" name="email" value="{{ old('email') }}">
      </div>
      <div>
        <label for="password">Password:</label>
        <input id="password" name="password" type="password" value="{{ old('password') }}">
      </div>
      <button type="submit">送信</button>
    </form>
  </div>
@endsection