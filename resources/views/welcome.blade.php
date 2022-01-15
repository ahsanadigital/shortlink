@extends('layouts.home')

@section('header')
<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
@endsection

@section('content')
<main id="content">

  <section id="shortner">
    <div class="container">

      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6 mb-3 mb-md-0">

          <h1 class="title">Pendekan <span class="text-danger">Tautanmu</span> Yang <span class="text-success">Panjang</span> Itu!</h1>
          <p class="description">Anda dapat memendekan URL yang sangat panjang dengan layanan kami dan kelola tautan yang sudah anda pendekan.</p>

        </div>
        <div class="col-md-5">

          <nav class="mb-3 d-none">
            <div class="nav nav-pills" id="nav-tab" role="tablist">
              <a class="nav-link active" id="nav-start-tab" data-toggle="tab" href="#nav-start" role="tab" aria-controls="nav-start" aria-selected="true">Pemendek</a>
              <a class="nav-link disabled" id="nav-result-tab" data-toggle="tab" href="#nav-result" role="tab" aria-controls="nav-result" aria-selected="false">Hasil</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-start" role="tabpanel" aria-labelledby="nav-start-tab">

              <form action="{{ route('shorting') }}" method="POST" class="form-group" id="form-shortner">
                @csrf

                <div class="group-wrapper">
                  <input type="url" class="form-control" name="url" placeholder="Masukan tautan yang panjang milik anda" />
                  <button class="btn btn-success" data-target="shorting" type="submit"><i class="fa-solid fa-fw fa-link"></i></button>
                </div>
              </form>

            </div>
            <div class="tab-pane fade" id="nav-result" role="tabpanel" aria-labelledby="nav-result-tab">

              <div id="main">
                <div class="card card-body shadow">
                  <div class="shortlink-wrapper">
                    <span>{{ Str::replace('www.', '', request()->getHttpHost()) }}</span>
                    <span>/</span>
                    <span>shortURLHere</span>
                  </div>
                  <div class="btn-group">
                    <a href="javascript:void(0)" class="btn-outline-success btn"><i class="fa-solid fa-fw fa-copy"></i></a>
                  </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                  <a class="nav-link active" href="javascript:changeStart()">Buat Baru</a>
                  <a href="javascript:void(0)" class="btn btn-success"><i class="fa-solid fa-fw fa-pencil"></i><span class="ml-2">Masuk Untuk Mengedit</span></a>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

  <section id="main-data" class="py-5 bg-dark">
    <div class="container">

      <div class="row">
        <div class="col-12">
          <div class="text-center text-white mb-4">
            <h3>Ringkasan Hari Ini</h3>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <div class="card card-body shadow border-0 text-center">
            <h3 class="h1">0</h3>
            <span>Pengunjung Hari Ini</span>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card card-body shadow border-0 text-center">
            <h3 class="h1">0</h3>
            <span>Tautan</span>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card card-body shadow border-0 text-center">
            <h3 class="h1">0</h3>
            <span>Tautan Ditangguhkan</span>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection

@section('footer')
<script src="{{ asset('js/home.js') }}"></script>
@endsection
