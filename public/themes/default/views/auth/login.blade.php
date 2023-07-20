@extends('theme::auth.layout')

@section('content')
  <div class="customer-login-mod">
    <div class="box login-box-body">
      <div class="box-header with-border">
        <h3 class="box-title">{{ trans('theme.account_login') }}</h3>
      </div> <!-- /.box-header -->
      <div class="box-body">
        {!! Form::open(['route' => 'customer.login.submit', 'id' => 'loginForm-1', 'data-toggle' => 'validator']) !!}
        <div class="form-group has-feedback">
          {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control input-lg', 'placeholder' => trans('theme.placeholder.email'), 'required']) !!}
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group has-feedback">
          {!! Form::password('password', ['id' => 'password', 'class' => 'form-control input-lg', 'id' => 'password', 'placeholder' => trans('theme.placeholder.password'), 'data-minlength' => '6', 'required']) !!}
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <div class="help-block with-errors"></div>
        </div>

        <div class="row">
          <div class="col-sm-7">
            <div class="form-group">
              <label>
                {!! Form::checkbox('remember', null, null, ['class' => 'icheck']) !!} {{ trans('theme.remember_me') }}
              </label>
            </div>
          </div>

          <div class="col-sm-5 pull-right">
            {!! Form::submit(trans('theme.button.login'), ['class' => 'btn btn-block btn-lg btn-flat btn-primary']) !!}
          </div>
        </div>
        {!! Form::close() !!}

        @include('theme::auth._social_login');
        {{-- @if (!is_incevio_package_loaded('otp-login')) --}}
        <a class="btn btn-link" href="{{ route('customer.password.request') }}">
          {{ trans('theme.forgot_password') }}
        </a>
        {{-- @endif --}}

        <a class="btn btn-link" href="{{ route('customer.register') }}" class="text-center">
          {{ trans('theme.register_here') }}
        </a>
      </div>
    </div>

    @include('partials._demo_customer_login')
  </div>
@endsection

@section('scripts')
@endsection
