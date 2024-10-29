<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Spesifikasi;
use Illuminate\Support\Facades\DB;
use Alert;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::latest()->paginate(10);
        $spesifikasis = Spesifikasi::all();
        
        return view('transaksi.index', compact('transaksis', 'spesifikasis'));
    }

    public function create()
    {
        $spesifikasis = Spesifikasi::all();
        return view('transaksi.create', compact('spesifikasis'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'namapembeli' => 'required',
            'merekhp' => 'required',
            'jumlah' => 'required',
            'total' => 'required'
        ]);

        DB::table('transaksis')->insert([
            'tanggal' => $request->tanggal,
            'namapembeli' => $request->namapembeli,
            'merekhp' => $request->merekhp,
            'jumlah' => $request->jumlah,
            'total' => $request->total
        ]);

        Alert::success('Success', 'Data berhasil disimpan');

        return redirect()->route('transaksi.index')->with(['success' => 'Data berhasil disimpan']);
    }

    public function edit(Transaksi $transaksi)
    {
        $spesifikasis = Spesifikasi::all();
        return view('transaksi.edit', compact('transaksi', 'spesifikasis'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'namapembeli' => 'required',
            'merekhp' => 'required',
            'jumlah' => 'required',
            'total' => 'required'
        ]);

        $transaksi = Transaksi::findOrFail($transaksi->id);
        $transaksi->update([
            'tanggal' => $request->tanggal,
            'namapembeli' => $request->namapembeli,
            'merekhp' => $request->merekhp,
            'jumlah' => $request->jumlah,
            'total' => $request->total
            
        ]);

        Alert::success('Success', 'Data berhasil disimpan');

        return redirect()->route('transaksi.index')->with(['success' => 'Data berhasil disimpan']);
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->delete();
        if ($transaksi) {
            return redirect()->route('transaksi.index')->with(['success' => 'Data berhasil dihapus']);
        } else {
            return redirect()->route('transaksi.index')->with(['error' => 'Data gagal dihapus']);
        }
    }
}
