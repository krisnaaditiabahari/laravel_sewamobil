@extends('layouts.main', ['title' => 'Pengembalian Mobil'])
@section('title-content')
    <i class="fas fa-car mr-2"></i>
    Pengembalian Mobil
@endsection
@section('content')
    @if (session('store') == 'success')
        <x-alert type="success">
            <strong>Berhasil dibuat!</strong> Pengembalian Mobil berhasil dibuat.
        </x-alert>
    @endif
    @if (session('update') == 'success')
        <x-alert type="success">
            <strong>Berhasil diupdate!</strong> Pengembalian Mobil berhasil diupdate.
        </x-alert>
    @endif
    @if (session('destroy') == 'success')
        <x-alert type="success">
            <strong>Berhasil dihapus!</strong> Pengembalian Mobil dihapus.
        </x-alert>
    @endif
    <div class="card card-orange card-outline">
        <div class="card-header form-inline">
            <a href="{{ route('pengembalianmobil.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-2"></i> Tambah
            </a>
            <form action="?" method="get" class="ml-auto">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" value="{{ request()->search }}"
                        placeholder="Cari Invoice atau Model Mobil">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice Peminjaman</th>
                        <th>Nama</th>
                        <th>Model</th>
                        <th>Qty</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Lama Sewa</th>
                        <th>Harga Sewa</th>
                        <th>Tanggal Kembali</th>
                        <th>Kelebihan Hari</th>
                        <th>Denda Keterlambatan</th>
                        <th>Total Bayar</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengembalianmobils as $key => $pengembalian)
                        <tr>
                            <td>{{ $pengembalianmobils->firstItem() + $key }}</td>
                            <td>{{ $pengembalian->Invoice_Peminjaman }}</td>
                            <td>{{ $pengembalian->nama }}</td>
                            <td>{{ $pengembalian->model }}</td>
                            <td>{{ $pengembalian->QTY }}</td>
                            <td>{{ $pengembalian->tanggal_mulai }}</td>
                            <td>{{ $pengembalian->tanggal_selesai }}</td>
                            <td>{{ $pengembalian->lama_sewa }} hari</td>
                            <td>Rp. {{ number_format($pengembalian->harga_sewa, 0, ',', '.') }}</td>
                            <td>{{ $pengembalian->tanggal_kembali }}</td>
                            <td>{{ $pengembalian->kelebihan_hari }} hari</td>
                            <td>Rp. {{ number_format($pengembalian->denda_keterlambatan, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($pengembalian->total_bayar, 0, ',', '.') }}</td>
                            <td class="text-right">
                                <a href="{{ route('pengembalianmobil.cetakInvoice', $pengembalian) }}"
                                    class="btn btn-xs btn-success">
                                    <i class="fas fa-file-invoice mr-1"></i> Cetak Invoice
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $pengembalianmobils->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection

@push('modals')
    <x-modal-delete />
@endpush
