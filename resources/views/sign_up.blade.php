@extends('layouts')
@section('title', '| login')
@section('content')
  <div>
    <form method="post" action="{{ route('signUp') }}">
      @csrf
      <div>
        <label for="email">Email:</label>
        <input id="email" name="email" value="{{ old('email') }}">
        @if($errors->has('email'))
          <span>{{ $errors->first('email') }}</span>
        @endif
      </div>
      <div>
        <label for="password">Password:</label>
        <input id="password" name="password" type="password" value="{{ old('password') }}">
        @if($errors->has('password'))
          <span>{{ $errors->first('password') }}</span>
        @endif
      </div>
      <button type="submit">送信</button>
    </form>
  </div>
@endsection