@extends('layouts.auth')

@section('content')
<div class="container">
  <div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-md-5">

      <div class="text-center">
        <a href="{{ route('home') }}">
          <img src="{{ asset('images/brands/logo-color-main.svg') }}" height="65px" alt="{{ config('app.name') }}" class="mb-4" />
        </a>
      </div>

      <div class="card shadow">
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="text-center">
              <h3>Masuk Dahulu</h3>
              <p>Silahkan masukkan kredensial anda untuk masuk ke dasbor sistem ini.</p>
            </div>

            <div class="form-group">
              <label for="username" class="col-form-label text-md-right">Nama Pengguna</label>
              <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

              @error('username')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="password" class="col-form-label text-md-right">Kata Sandi</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="d-flex justify-content-between">

              <div class="form-group">
                <div class="custom-control form-check custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} value="true" />
                  <label class="custom-control-label" for="remember">Ingatkan Saya</label>
                </div>
              </div>

              <a href="{{ route('password.request') }}">Lupa Kata Sandi?</a>

            </div>

            <button type="submit" class="btn btn-block btn-success">Masuk</button>

            <div class="text-center mt-3">
              <a href="{{ route('register') }}">Mendaftar</a>
            </div>
          </form>
        </div>
      </div>

      <div class="text-center mt-4">
        <p class="m-0">Hak Cipta {{ date('Y') }}, <a href="{{ route('home') }}">{{ config('app.name') }}</a> by <a href="https://www.dasakreativa.web.id">Dasa Kreativa Studio</a>.</p>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
<script src="{{ asset('js/login.js') }}"></script>
@endsection
