@extends('layouts.main', ['title' => 'Home'])
@section('title-content')
    <i class="fas fa-home mr-2"></i> Home
@endsection

@section('content')
    <div class="row">
        @can('admin')
            <x-box title="Manajemen Mobil" icon="fas fa-car" background="bg-primary" :route="route('mobil.index')" :jumlah="$mobil->jumlah" />
            <x-box title="Peminjaman Mobil" icon="fas fa-car-side" background="bg-success" :route="route('pinjam.index')" :jumlah="$pinjam->jumlah" />
            <x-box title="Pengembalian Mobil" icon="fas fa-book-reader" background="bg-info" :route="route('pengembalianmobil.index')"
                :jumlah="$PengembalianMobil->jumlah" />
            <x-box title="User" icon="fas fa-user-tie" background="bg-secondary" :route="route('user.index')" :jumlah="$user->jumlah" />
        @endcan
    </div>
    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid img-thumbnail float-left" src="{{ asset('images/mobil-home.png')}}" width="1800">
                <div class="carousel-caption">
                    <h3>Slide 1</h3>
                    <p>Deskripsi Slide 1</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="img-fluid img-thumbnail float-left" src="{{ asset('images/mobil-home-2.png')}}" width="1800">
                <div class="carousel-caption">
                    <h3>Slide 2</h3>
                    <p>Deskripsi Slide 2</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="img-fluid img-thumbnail float-left" src="{{ asset('images/mobil-home-3.jpeg')}}" width="1800">
                <div class="carousel-caption">
                    <h3>Slide 3</h3>
                    <p>Deskripsi Slide 3</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
@endsection
