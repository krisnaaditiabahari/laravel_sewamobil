<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\PengembalianMobil;
use App\Models\Pinjam;
use App\Models\User;
use DB;

class DashboardController extends Controller
{
    function index()
    {

        $user = User::selectRaw('count(*) as jumlah')->first();
        $mobil = Mobil::selectRaw('count(*) as jumlah')->first();
        $PengembalianMobil = PengembalianMobil::selectRaw('count(*) as jumlah')->first();
        $pinjam = Pinjam::selectRaw('count(*) as jumlah')->first();

        
        return view('welcome', [
            'user' => $user,
            'mobil' => $mobil,
            'PengembalianMobil' => $PengembalianMobil,
            'pinjam' => $pinjam,
           
        ]);
    }
}
