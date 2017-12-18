@extends('layouts.auth')

@section('content')
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img alt="thumbnail" src="{{ asset('/images/users/xcaret.png') }}">
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">{{ trans('auth.title') }}</p>
      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
              <div class="col-md-12">
                  <input id="email" type="email" class="form-control" name="email" placeholder="{{ trans('auth.email') }}" value="{{ old('email') }}" required autofocus>
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
              <div class="col-md-12">
                  <input id="password" type="password" class="form-control" name="password" placeholder="{{ trans('auth.password') }}" required>
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ trans('auth.remember') }}
                </label>
              </div>
            </div>
            <div class="col-xs-4">
              <button type="submit" class="btn bg-maroon btn-block btn-flat">
                  {{ trans('auth.login') }}
              </button>
            </div>
            <div class="col-xs-4">
              <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ trans('auth.forgotpassword') }}
              </a>
            </div>
          </div>


      </form>

    </div>
  </div>
</body>
@endsection
