<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'nama' => 'Administrator',
            'username' => 'admin',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        \App\Models\User::create([
            'nama' => 'User',
            'username' => 'user',
            'role' => 'pengguna',
            'password' => bcrypt('password'),
        ]);

        \App\Models\User::create([
            'nama' => 'Asep',
            'username' => 'asep',
            'role' => 'pengguna',
            'password' => bcrypt('password'),
        ]);

        \App\Models\User::create([
            'nama' => 'Bagas',
            'username' => 'bagas',
            'role' => 'pengguna',
            'password' => bcrypt('password'),
        ]);

        \App\Models\User::create([
            'nama' => 'Chika',
            'username' => 'chika',
            'role' => 'pengguna',
            'password' => bcrypt('password'),
        ]);

        \App\Models\User::create([
            'nama' => 'Doni',
            'username' => 'doni',
            'role' => 'pengguna',
            'password' => bcrypt('password'),
        ]);

        \App\Models\Mobil::create([
            'merek' => 'Hyundai',
            'model' => 'Hyundai Creta',
            'no_plat' => 'D 4430 VBQ',
            'tarif_sewa' => '95000',
            'stok' => '2',
        ]);

        \App\Models\Mobil::create([
            'merek' => 'Hyundai',
            'model' => 'Hyundai Stargazer',
            'no_plat' => 'D 4431 VBQ',
            'tarif_sewa' => '100000',
            'stok' => '2',
        ]);

        \App\Models\Mobil::create([
            'merek' => 'Toyota',
            'model' => 'AGYA',
            'no_plat' => 'D 4432 VBQ',
            'tarif_sewa' => '110000',
            'stok' => '2',
        ]);

        \App\Models\Mobil::create([
            'merek' => 'Toyota',
            'model' => 'AVANZA',
            'no_plat' => 'D 4433 VBQ',
            'tarif_sewa' => '115000',
            'stok' => '2',
        ]);

        \App\Models\Mobil::create([
            'merek' => 'Daihatsu',
            'model' => 'Ayla',
            'no_plat' => 'D 4435 VBQ',
            'tarif_sewa' => '90000',
            'stok' => '2',
        ]);

        \App\Models\Mobil::create([
            'merek' => 'Daihatsu',
            'model' => 'Terios',
            'no_plat' => 'D 4436 VBQ',
            'tarif_sewa' => '120000',
            'stok' => '2',
        ]);

        \App\Models\Mobil::create([
            'merek' => 'Honda',
            'model' => 'Brio',
            'no_plat' => 'D 4437 VBQ',
            'tarif_sewa' => '90000',
            'stok' => '2',
        ]);

        \App\Models\Mobil::create([
            'merek' => 'Honda',
            'model' => 'CR-V',
            'no_plat' => 'D 4438 VBQ',
            'tarif_sewa' => '125000',
            'stok' => '2',
        ]);

        \App\Models\Mobil::create([
            'merek' => 'Suzuki',
            'model' => 'Ertiga',
            'no_plat' => 'D 4439 VBQ',
            'tarif_sewa' => '130000',
            'stok' => '2',
        ]);

        \App\Models\Mobil::create([
            'merek' => 'Mitsubishi',
            'model' => 'Xpander',
            'no_plat' => 'D 4440 VBQ',
            'tarif_sewa' => '150000',
            'stok' => '2',
        ]);

        \App\Models\Pinjam::create([
            'Invoice_Peminjaman' => 'INV-001',
            'Nama' => 'Asep',
            'model' => 'Xpander',
            'QTY' => '1',
            'tanggal_mulai' => Carbon::now()->subDays(2),
            'tanggal_selesai' => Carbon::now()->addDays(1),
            'lama_sewa' => '3',
            'harga_sewa' => '450000',
        ]);

        \App\Models\Pinjam::create([
            'Invoice_Peminjaman' => 'INV-002',
            'Nama' => 'Bagas',
            'model' => 'Ertigar',
            'QTY' => '1',
            'tanggal_mulai' => Carbon::now()->subDays(3),
            'tanggal_selesai' => Carbon::now()->addDays(1),
            'lama_sewa' => '4',
            'harga_sewa' => '520000',
        ]);

        \App\Models\Pinjam::create([
            'Invoice_Peminjaman' => 'INV-003',
            'Nama' => 'Chika',
            'model' => 'Brio',
            'QTY' => '1',
            'tanggal_mulai' => Carbon::now()->subDays(1),
            'tanggal_selesai' => Carbon::now()->addDays(1),
            'lama_sewa' => '3',
            'harga_sewa' => '270000',
        ]);

        \App\Models\Pinjam::create([
            'Invoice_Peminjaman' => 'INV-004',
            'Nama' => 'Doni',
            'model' => 'Terios',
            'QTY' => '1',
            'tanggal_mulai' => Carbon::now()->subDays(2),
            'tanggal_selesai' => Carbon::now()->addDays(1),
            'lama_sewa' => '4',
            'harga_sewa' => '480000',
        ]);

        \App\Models\PengembalianMobil::create([
            'Invoice_Peminjaman' => 'INV-004',
            'nama' => 'Doni',
            'model' => 'Terios',
            'QTY' => '1',
            'tanggal_mulai' => Carbon::now()->subDays(2),
            'tanggal_selesai' => Carbon::now()->addDays(1),
            'lama_sewa' => '4',
            'harga_sewa' => '480000',
            'tanggal_kembali' => Carbon::now()->addDays(2),
            'kelebihan_hari' => '1',
            'denda_keterlambatan' => '50000',
            'total_bayar' => '530000',
        ]);
    }
}
