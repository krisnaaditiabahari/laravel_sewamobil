@extends('layouts.main', ['title' => 'pinjam'])

@section('title-content')
    <i class="fas fa-car mr-2"></i>
    Form Peminjaman Mobil
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <form method="POST" action="{{ route('pinjam.store') }}" class="card card-orange card-outline">
                <div class="card-header">
                    <h3 class="card-title">Buat Peminjaman Mobil Baru</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label>Invoice Peminjaman</label>
                        <input name="Invoice_Peminjaman" class="form-control" type="text" value="{{ $newInvoiceNumber }}" readonly />
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <select name="Nama" class="form-control @error('Nama') is-invalid @enderror">
                            <option value="">Pilih Nama</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->nama }}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                        @error('Nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Model Mobil</label>
                        <select name="model" class="form-control @error('model') is-invalid @enderror">
                            <option value="">Pilih Model Mobil</option>
                            @foreach ($cars as $car)
                                <option value="{{ $car->model }}">{{ $car->model }}</option>
                            @endforeach
                        </select>
                        @error('model')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Qty</label>
                        <x-input name="QTY" type="number" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <x-input name="tanggal_mulai" type="date" id="tanggal_mulai" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <x-input name="tanggal_selesai" type="date" id="tanggal_selesai" />
                    </div>
                </div>
                <div class="card-footer form-inline">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                    <a href="{{ route('pinjam.index') }}" class="btn btn-secondary ml-auto">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
