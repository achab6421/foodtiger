@extends('layouts.master')

@section('title', '登入')

<head>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
@section('content')
    <div class="login-form">
        <form action="{{ route('login.post') }}" method="POST" id="loginForm">
            @csrf
            <div class="card card-info mt-3">
                <div class="card-header text-center">
                  <h3 class="card-title"><strong>FoodTiger</strong></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">電子郵件</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="電子郵件" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row mt-3">
                      <label for="password" class="col-sm-2 col-form-label">密碼</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="密碼" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="remember" name="remember">
                          <label class="form-check-label" for="remember">記住帳號</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">登入</button>
                    <a href="" class="btn btn-secondary">註冊</a>
                  </div>
                  <!-- /.card-footer -->
              </div>
        </form>
    </div>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\LoginRequest', '#loginForm') !!}
@endsection
