<nav class="navbar navbar-expand-md navbar-light bg-white" id="main-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">

      {{-- @if() --}}
      {{-- @else --}}
      {{-- @endif() --}}

      <img src="{{ asset('images/brands/logo-color-main.svg') }}" height="30px" alt="{{ config('app.name') }}" />

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Kebijakan Privasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Syarat dan Ketentuan Layanan</a>
        </li>
        <li class="nav-item">
          <div class="btn-group w-100">
            <a href="{{ route('login') }}" class="btn btn-outline-success">Masuk</a>
            <a href="{{ route('register') }}" class="btn-success btn">Mendaftar</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
