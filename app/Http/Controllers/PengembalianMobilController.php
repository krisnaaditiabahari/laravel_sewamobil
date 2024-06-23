<?php

namespace App\Http\Controllers;

use App\Models\PengembalianMobil;
use Illuminate\Http\Request;
use App\Models\Pinjam;
use Illuminate\Support\Facades\Log;

class PengembalianMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $pengembalianmobils = PengembalianMobil::when($search, function ($query, $search) {
            return $query->where('Invoice_Peminjaman', 'like', "%$search%")
                ->orWhere('model', 'like', "%$search%");
        })->paginate(10);

        return view('pengembalianmobil.index', compact('pengembalianmobils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pinjams = Pinjam::all();
        return view('pengembalianmobil.create', compact('pinjams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Invoice_Peminjaman' => 'required|string|unique:pengembalian_mobils,Invoice_Peminjaman',
            'nama' => 'required|string',
            'model' => 'required|string',
            'QTY' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'lama_sewa' => 'required|integer',
            'harga_sewa' => 'required|integer',
            'tanggal_kembali' => 'required|date',
            'kelebihan_hari' => 'required|integer',
            'denda_keterlambatan' => 'required|integer',
            'total_bayar' => 'required|integer',
        ]);
    
        PengembalianMobil::create($validatedData);
    
        return redirect()->route('pengembalianmobil.index')
                         ->with('success', 'Data pengembalian mobil berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(PengembalianMobil $pengembalianMobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengembalianMobil $pengembalianMobil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengembalianMobil $pengembalianMobil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengembalianMobil $pengembalianMobil)
    {
        //
    }

    public function detail($id)
    {
        $pinjam = Pinjam::find($id);
        return view('pengembalianmobil.kembalikan_mobil', compact('pinjam'));
    }

    public function cetakInvoice(PengembalianMobil $pengembalianMobil)
    {
        return view('pengembalianmobil.invoice', compact('pengembalianMobil'));
    }
}
