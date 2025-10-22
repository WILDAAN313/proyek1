@extends('layouts.main')

@section('title', $title)

@section('content')
<section id="menu" class="container py-5">
  <h2 class="text-center mb-4">Menu Sehat</h2>


  <div class="banner-menu mb-5">
<img src="{{ asset('images/gambar_menu.jpg') }}" alt="Menu Sehat" class="img-fluid rounded shadow">

  </div>


  <div class="row justify-content-center g-4">
    <div class="col-md-4">
      <div class="card menu-card">
        <img src="/images/salad.jpg" class="card-img-top" alt="Salad Buah">
        <div class="card-body text-center">
          <h5 class="card-title">Salad Buah</h5>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card menu-card">
        <img src="images/jus buah.jpg" class="card-img-top" alt="Jus Buah">
        <div class="card-body text-center">
          <h5 class="card-title">Jus buah</h5>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card menu-card">
        <img src="/images/sayuran.jpg" class="card-img-top" alt="Olahan Sayur">
        <div class="card-body text-center">
          <h5 class="card-title">Olahan Sayur</h5>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
