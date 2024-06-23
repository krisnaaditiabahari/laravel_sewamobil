<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\Mobil;
use App\Models\User;
use Carbon\Carbon;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $pinjams = Pinjam::orderBy('id')
            ->when($search, function ($q, $search) {
                return $q->where('Invoice_Peminjaman', 'like', "%{$search}%");
            })
            ->paginate();

        if ($search) $pinjams->appends(['search' => $search]);

        return view('pinjam.index', [
            'pinjams' => $pinjams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); 
        $cars = Mobil::all();
        // Generate new invoice number
        $lastInvoice = Pinjam::orderBy('id', 'desc')->first();
        $lastInvoiceNumber = $lastInvoice ? $lastInvoice->Invoice_Peminjaman : 'INV-0000';
        $newInvoiceNumber = 'INV-' . str_pad((int)str_replace('INV-', '', $lastInvoiceNumber) + 1, 4, '0', STR_PAD_LEFT);
        return view('pinjam.create', compact('users', 'cars', 'newInvoiceNumber'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Invoice_Peminjaman' => ['required', 'string'],
            'Nama' => ['required', 'string'],
            'model' => ['required', 'string'],
            'QTY' => ['required', 'integer', 'min:1'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
        ]);

        // Hitung lama sewa dalam hari
        $tanggal_mulai = Carbon::parse($request->tanggal_mulai);
        $tanggal_selesai = Carbon::parse($request->tanggal_selesai);
        $lama_sewa = $tanggal_selesai->diffInDays($tanggal_mulai);

        // Ambil tarif sewa dari mobil yang dipilih
        $tarif_sewa = Mobil::where('model', $request->model)->value('tarif_sewa');

        // Hitung harga sewa berdasarkan QTY, lama sewa, dan tarif sewa
        $harga_sewa = $request->QTY * $lama_sewa * $tarif_sewa;

        // Simpan data peminjaman
        Pinjam::create([
            'Invoice_Peminjaman' => $request->Invoice_Peminjaman,
            'Nama' => $request->Nama,
            'model' => $request->model,
            'QTY' => $request->QTY,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lama_sewa' => $lama_sewa,
            'harga_sewa' => $harga_sewa,
        ]);

        return redirect()->route('pinjam.index')->with('store', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        return view('pinjam.invoice', compact('pinjam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pinjam $pinjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pinjam $pinjam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinjam $pinjam)
    {
        //
    }

    public function printInvoice(Pinjam $pinjam)
    {
        return view('pinjam.invoice', compact('pinjam'));
    }
}
