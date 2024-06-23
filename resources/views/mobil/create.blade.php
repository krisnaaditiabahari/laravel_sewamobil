@extends('layouts.main', ['title' => 'Mobil'])
@section('title-content')
  <i class="fas fa-car mr-2"></i>
  Mobil
@endsection
@section('content')
  <div class="row">
    <div class="col-xl-4 col-lg-6">
      <form method="POST" action="{{ route('mobil.store') }}" class="card card-orange card-outline">
        <div class="card-header">
          <h3 class="card-title">Buat Mobil Baru</h3>
        </div>
        <div class="card-body">
          @csrf
          <div class="form-group">
            <label>Merek</label>
            <x-input name="merek" type="text" />
          </div>
          <div class="form-group">
            <label>Model</label>
            <x-input name="model" type="text" />
          </div>
          <div class="form-group">
            <label>Nomor Plat</label>
            <x-input name="no_plat" type="text" />
          </div>
          <div class="form-group">
            <label>Tarif Sewa</label>
            <x-input name="tarif_sewa" type="text" />
          </div>
          <div class="form-group">
            <label>Stok</label>
            <x-input name="stok" type="text" />
          </div>
        </div>
        <div class="card-footer form-inline">
            <button type="submit" class="btn btn-primary">
              Simpan Mobil
            </button>
            <a href="{{ route('mobil.index') }}" class="btn btn-secondary ml-auto">
              Batal
            </a>
        </div>
      </form>
    </div>
  </div>
@endsection
