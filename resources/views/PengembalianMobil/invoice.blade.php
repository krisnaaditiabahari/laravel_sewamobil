@extends('layouts.main', ['title' => 'Cetak Invoice'])

@section('title-content')
    <i class="fas fa-file-invoice mr-2"></i>
    Cetak Invoice
@endsection

@section('content')
    <div class="card card-orange card-outline">
        <div class="card-header">
            <h3 class="card-title">Bukti Pembayaran</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Invoice Peminjaman</th>
                    <td>{{ $pengembalianMobil->Invoice_Peminjaman }}</td>
                </tr>
                <tr>
                    <th>Model</th>
                    <td>{{ $pengembalianMobil->model }}</td>
                </tr>
                <tr>
                    <th>Qty</th>
                    <td>{{ $pengembalianMobil->QTY }}</td>
                </tr>
                <tr>
                    <th>Tanggal Mulai</th>
                    <td>{{ $pengembalianMobil->tanggal_mulai }}</td>
                </tr>
                <tr>
                    <th>Tanggal Selesai</th>
                    <td>{{ $pengembalianMobil->tanggal_selesai }}</td>
                </tr>
                <tr>
                    <th>Lama Sewa</th>
                    <td>{{ $pengembalianMobil->lama_sewa }} hari</td>
                </tr>
                <tr>
                    <th>Harga Sewa</th>
                    <td>Rp. {{ number_format($pengembalianMobil->harga_sewa, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Kembali</th>
                    <td>{{ $pengembalianMobil->tanggal_kembali }}</td>
                </tr>
                <tr>
                    <th>Kelebihan Hari</th>
                    <td>{{ $pengembalianMobil->kelebihan_hari }} hari</td>
                </tr>
                <tr>
                    <th>Denda Keterlambatan</th>
                    <td>Rp. {{ number_format($pengembalianMobil->denda_keterlambatan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Total Bayar</th>
                    <td>Rp. {{ number_format($pengembalianMobil->total_bayar, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer text-center">
            <button onclick="window.print()" class="btn btn-primary">
                <i class="fas fa-print"></i> Cetak
            </button>
        </div>
    @endsection
