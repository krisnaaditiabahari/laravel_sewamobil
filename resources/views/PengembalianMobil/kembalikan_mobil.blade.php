@extends('layouts.main', ['title' => 'Pengembalian Mobil'])

@section('title-content')
    <i class="fas fa-car mr-2"></i>
    Kembalikan Mobil
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6 col-lg-8">
            <div class="card card-primary">
                <form method="POST" action="{{ route('pengembalianmobil.store') }}" class="card card-orange card-outline">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Detail Peminjaman</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="invoice_peminjaman">Invoice Peminjaman</label>
                            <input type="text" id="invoice_peminjaman"
                                class="form-control @error('Invoice_Peminjaman') is-invalid @enderror"
                                name="Invoice_Peminjaman" readonly>
                            @error('Invoice_Peminjaman')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" class="form-control" name="nama" readonly>
                        </div>
                        <div class="form-group">
                            <label for="model">Model Mobil</label>
                            <input type="text" id="model" class="form-control" name="model" readonly>
                        </div>
                        <div class="form-group">
                            <label for="qty">Qty</label>
                            <input type="number" id="qty" class="form-control" name="QTY" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_mulai">Tanggal Mulai</label>
                            <input type="date" id="tanggal_mulai" class="form-control" name="tanggal_mulai" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" id="tanggal_selesai" class="form-control" name="tanggal_selesai" readonly>
                        </div>
                        <div class="form-group">
                            <label for="lama_sewa">Lama Sewa (hari)</label>
                            <input type="number" id="lama_sewa" class="form-control" name="lama_sewa" readonly>
                        </div>
                        <div class="form-group">
                            <label for="harga_sewa">Harga Sewa</label>
                            <input type="number" id="harga_sewa" class="form-control" name="harga_sewa" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kembali">Tanggal Kembali</label>
                            <input type="date" id="tanggal_kembali"
                                class="form-control @error('tanggal_kembali') is-invalid @enderror" name="tanggal_kembali">
                            @error('tanggal_kembali')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelebihan_hari">Kelebihan Hari</label>
                            <input type="number" id="kelebihan_hari" class="form-control" name="kelebihan_hari" readonly>
                        </div>
                        <div class="form-group">
                            <label for="denda_keterlambatan">Denda Keterlambatan (Rp. 50.000/Hari)</label>
                            <input type="number" id="denda_keterlambatan" class="form-control" name="denda_keterlambatan"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="total_bayar">Total Bayar (Harga Sewa + Denda Keterlambatan)</label>
                            <input type="number" id="total_bayar" class="form-control" name="total_bayar" readonly>
                        </div>
                        <div class="card-footer form-inline">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <button type="button" class="btn btn-black"
                                onclick="window.location.href='{{ route('pengembalianmobil.index') }}'">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var invoicePeminjamanInput = document.getElementById('invoice_peminjaman');
            var namaInput = document.getElementById('nama');
            var modelInput = document.getElementById('model');
            var qtyInput = document.getElementById('qty');
            var tanggalMulaiInput = document.getElementById('tanggal_mulai');
            var tanggalSelesaiInput = document.getElementById('tanggal_selesai');
            var lamaSewaInput = document.getElementById('lama_sewa');
            var hargaSewaInput = document.getElementById('harga_sewa');
            var tanggalKembaliInput = document.getElementById('tanggal_kembali');
            var kelebihanHariInput = document.getElementById('kelebihan_hari');
            var dendaKeterlambatanInput = document.getElementById('denda_keterlambatan');
            var totalBayarInput = document.getElementById('total_bayar');

            // Set event listener untuk input tanggal kembali
            tanggalKembaliInput.addEventListener('change', function() {
                var tanggalMulai = new Date(tanggalMulaiInput.value);
                var tanggalSelesai = new Date(tanggalSelesaiInput.value);
                var tanggalKembali = new Date(tanggalKembaliInput.value);

                // Hitung lama sewa
                var lamaSewa = Math.ceil((tanggalSelesai - tanggalMulai) / (1000 * 60 * 60 * 24));

                // Hitung kelebihan hari
                var kelebihanHari = Math.ceil((tanggalKembali - tanggalSelesai) / (1000 * 60 * 60 * 24));
                kelebihanHari = kelebihanHari > 0 ? kelebihanHari : 0;

                // Hitung denda (contoh: 50000 per hari keterlambatan)
                var dendaKeterlambatan = kelebihanHari * 50000;

                // Hitung total bayar
                var totalBayar = parseInt(hargaSewaInput.value) + dendaKeterlambatan;

                // Set value pada input form
                lamaSewaInput.value = lamaSewa;
                kelebihanHariInput.value = kelebihanHari;
                dendaKeterlambatanInput.value = dendaKeterlambatan;
                totalBayarInput.value = totalBayar;
            });

            // Ambil data dari tabel untuk ditampilkan di form
            var invoicePeminjaman = '{{ $pinjam->Invoice_Peminjaman }}';
            var nama = '{{ $pinjam->Nama }}';
            var model = '{{ $pinjam->model }}';
            var qty = '{{ $pinjam->QTY }}';
            var tanggalMulai = '{{ $pinjam->tanggal_mulai }}';
            var tanggalSelesai = '{{ $pinjam->tanggal_selesai }}';
            var lamaSewa = '{{ $pinjam->lama_sewa }}';
            var hargaSewa = '{{ $pinjam->harga_sewa }}';

            // Set value pada input form
            invoicePeminjamanInput.value = invoicePeminjaman;
            namaInput.value = nama;
            modelInput.value = model;
            qtyInput.value = qty;
            tanggalMulaiInput.value = tanggalMulai;
            tanggalSelesaiInput.value = tanggalSelesai;
            lamaSewaInput.value = lamaSewa;
            hargaSewaInput.value = hargaSewa;
        });
    </script>
@endsection
