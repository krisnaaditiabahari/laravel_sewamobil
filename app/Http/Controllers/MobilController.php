<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $mobils = Mobil::orderBy('id')
            ->when($search, function ($q, $search) {
                return $q->where('merek', 'like', "%{$search}%")
                    ->orWhere('model', 'like', "%{$search}%");
            })
            ->paginate();

        if ($search) $mobils->appends(['search' => $search]);

        return view('mobil.index', [
            'mobils' => $mobils
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merek' => ['required', 'max:100'],
            'model' => ['required', 'max:100'],
            'no_plat' => ['required', 'max:15'],
            'tarif_sewa' => ['required', 'numeric'],
            'stok' => ['required', 'integer']
        ]);

        Mobil::create($request->all());

        return redirect()->route('mobil.index')->with('store', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobil $mobil)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        return view('mobil.edit', [
            'mobil' => $mobil
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'merek' => ['required', 'max:100'],
            'model' => ['required', 'max:100'],
            'no_plat' => ['required', 'max:15'],
            'tarif_sewa' => ['required', 'numeric'],
            'stok' => ['required', 'integer']
        ]);

        $mobil->update($request->all());

        return redirect()->route('mobil.index')->with('update', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        $mobil->delete();

        return back()->with('destroy', 'success');
    }
}
