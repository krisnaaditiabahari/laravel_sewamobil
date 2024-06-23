@extends('layouts.main', ['title' => 'PeminjamanMobil'])
@section('title-content')
    <i class="fas fa-car mr-2"></i>
    Peminjaman Mobil
@endsection
@section('content')
    @if (session('store') == 'success')
        <x-alert type="success">
            <strong>Berhasil dibuat!</strong> Peminjaman Mobil berhasil dibuat.
        </x-alert>
    @endif
    @if (session('update') == 'success')
        <x-alert type="success">
            <strong>Berhasil diupdate!</strong> Peminjaman Mobil berhasil diupdate.
        </x-alert>
    @endif
    @if (session('destroy') == 'success')
        <x-alert type="success">
            <strong>Berhasil dihapus!</strong> Peminjaman berhasil dihapus.
        </x-alert>
    @endif
    <div class="card card-orange card-outline">
        <div class="card-header form-inline">
            <a href="{{ route('pinjam.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-2"></i> Tambah
            </a>
            <form action="?" method="get" class="ml-auto">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" value="{{ request()->search }}" placeholder="Nomor Invoice">
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
                        <th>QTY</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Lama Sewa</th>
                        <th>Harga Sewa</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pinjams as $key => $pinjam)
                        <tr>
                            <td>{{ $pinjams->firstItem() + $key }}</td>
                            <td>{{ $pinjam->Invoice_Peminjaman }}</td>
                            <td>{{ $pinjam->Nama }}</td>
                            <td>{{ $pinjam->model }}</td>
                            <td>{{ $pinjam->QTY }}</td>
                            <td>{{ $pinjam->tanggal_mulai }}</td>
                            <td>{{ $pinjam->tanggal_selesai }}</td>
                            <td>{{ $pinjam->lama_sewa }} Hari</td>
                            <td>Rp. {{ number_format($pinjam->harga_sewa, 0, ',', '.') }}</td>
                            <td class="text-right">
                                <a href="{{ route('pinjam.edit', [
                                    'pinjam' => $pinjam->id,
                                ]) }}"
                                    class="btn btn-xs text-success p-0 mr-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('pinjam.print', ['pinjam' => $pinjam->id]) }}"
                                    class="btn btn-xs btn-success" target="_blank">
                                    <i class="fas fa-file-invoice mr-1"></i> Cetak Invoice
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $pinjams->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection

@push('modals')
    <x-modal-delete />
@endpush
