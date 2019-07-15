<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Last Wishes @yield('title')</title>
</head>
<body ng-app="lw">
<div class="container">
  <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}">LastWishes</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
      {{--            ログイン時に表示--}}
      <p class="navbar-text navbar-right">
        {{--                ログアウトURLを入れる--}}
        <a href="">Bye!</a>
      </p>
      <p class="navbar-text navbar-right">
        {{--                ダッシュボードURLを入れる--}}
        <a href="">Dashboard</a>
      </p>
      {{--            未ログイン時に表示--}}
      <p class="navbar-text navbar-right">
        {{--                signin URLを入れる--}}
        <a href="">Sign in</a>
      </p>
      <p class="navbar-text navbar-right">
        <a href="{{ route('signUpForm') }}">Sign up</a>
      </p>
    </div><!-- /.navbar-collapse -->
  </nav><!-- /navbar -->

  {{--    メッセージを表示--}}
  {{--    {% if messages is defined %}--}}
  {{--    {% for message in messages %}--}}
  {{--    <div class="alert alert-{{ message.type | default('success') }}" role="alert">--}}
  {{--        {{ message.info }}--}}
  {{--    </div>--}}
  {{--    {% endfor %}--}}
  {{--    {% endif %}--}}

  @yield('content')
</div>
</body>
</html>
