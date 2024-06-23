@extends('layouts.main', ['title' => 'Mobil'])
@section('title-content')
    <i class="fas fa-car mr-2"></i>
    Mobil
@endsection
@section('content')
    @if (session('store') == 'success')
        <x-alert type="success">
            <strong>Berhasil dibuat!</strong> Mobil berhasil dibuat.
        </x-alert>
    @endif
    @if (session('update') == 'success')
        <x-alert type="success">
            <strong>Berhasil diupdate!</strong> Mobil berhasil diupdate.
        </x-alert>
    @endif
    @if (session('destroy') == 'success')
        <x-alert type="success">
            <strong>Berhasil dihapus!</strong> Mobil berhasil dihapus.
        </x-alert>
    @endif
    <div class="card card-orange card-outline">
        <div class="card-header form-inline">
            <a href="{{ route('mobil.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-2"></i> Tambah
            </a>
            <form action="?" method="get" class="ml-auto">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" value="<?= request()->search ?>"
                        placeholder="Merek/Model">
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
                        <th>Merek</th>
                        <th>Model</th>
                        <th>No Plat</th>
                        <th>Tarif Sewa</th>
                        <th>Stok</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mobils as $key => $mobil)
                        <tr>
                            <td>{{ $mobils->firstItem() + $key }}</td>
                            <td>{{ $mobil->merek }}</td>
                            <td>{{ $mobil->model }}</td>
                            <td>{{ $mobil->no_plat }}</td>
                            <td>Rp. {{ number_format($mobil->tarif_sewa, 0, ',', '.') }}/Hari</td>
                            <td>{{ $mobil->stok }}</td>
                            <td class="text-right">
                                <a href="{{ route('mobil.edit', [
                                    'mobil' => $mobil->id,
                                ]) }}"
                                    class="btn btn-xs text-success p-0 mr-1">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button type="button" data-toggle="modal" data-target="#modalDelete"
                                    data-url="{{ route('mobil.destroy', [
                                        'mobil' => $mobil->id,
                                    ]) }}"
                                    class="btn btn-xs text-danger p-0 btn-delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $mobils->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection

@push('modals')
    <x-modal-delete />
@endpush
