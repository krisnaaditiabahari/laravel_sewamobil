@extends('layouts.main', ['title' => 'Mobil'])
@section('title-content')
    <i class="fas fa-car mr-2"></i>
    Mobil
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <form method="POST" class="card card-orange card-outline"
                action="{{ route('mobil.update', [
                    'mobil' => $mobil->id,
                ]) }}">
                <div class="card-header">
                    <h3 class="card-title">Ubah Mobil</h3>
                </div>
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Merek</label>
                        <x-input name="merek" type="text" :value="$mobil->merek" />
                    </div>
                    <div class="form-group">
                        <label>Model</label>
                        <x-input name="model" type="text" :value="$mobil->model" />
                    </div>
                    <div class="form-group">
                        <label>Nomor Plat</label>
                        <x-input name="no_plat" type="text" :value="$mobil->no_plat" />
                    </div>
                    <div class="form-group">
                        <label>Tarif Sewa</label>
                        <x-input name="tarif_sewa" type="text" :value="$mobil->tarif_sewa" />
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <x-input name="stok" type="text" :value="$mobil->stok" />
                    </div>
                </div>
                <div class="card-footer form-inline">
                    <button type="submit" class="btn btn-primary">
                        Update Mobil
                    </button>
                    <a href="{{ route('mobil.index') }}" class="btn btn-secondary ml-auto">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
