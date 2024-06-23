@extends('layouts.main', ['title' => 'Invoice Peminjaman'])

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h3>{{ config('app.name') }}</h3>
                <p>Rancaekek, Kab. Bandung</p>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4>Invoice: {{ $pinjam->Invoice_Peminjaman }}</h4>
                        <h4>Model Mobil: {{ $pinjam->model }}</h4>
                        <h4>Qty: {{ $pinjam->QTY }}</h4>
                        <h4>Tanggal Mulai: {{ $pinjam->tanggal_mulai }}</h4>
                        <h4>Tanggal Selesai: {{ $pinjam->tanggal_selesai }}</h4>
                        <h4>Lama Sewa: {{ $pinjam->lama_sewa }} hari</h4>
                        <h4>Harga Sewa: Rp{{ number_format($pinjam->harga_sewa, 2, ',', '.') }}</h4>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button onclick="window.print()" class="btn btn-primary">
                    <i class="fas fa-print"></i> Cetak
                </button>
            </div>
        </div>
    </div>
@endsection
