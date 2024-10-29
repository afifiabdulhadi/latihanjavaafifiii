<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spesifikasi;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Strorage;
use Illuminate\Support\Facades\DB;
use Alert;
use PDF;
 
class SpesifikasiController extends Controller
{
    public function index()
    {
        //kirim data ke view 
        $spesifikasis = Spesifikasi::latest()->paginate(10);
        $transaksis = Transaksi::all();
        return view('spesifikasi.index', compact('spesifikasis', 'transaksis'));
    }

   

    public function pdf()
{
    // Ambil data spesifikasi dari database
    $spesifikasis = Spesifikasi::all();

    // Muat view untuk PDF dengan data spesifikasi
    $pdf = PDF::loadView('spesifikasi.pdf', compact('spesifikasis'));

    // Download atau tampilkan PDF
    return $pdf->download('spesifikasi.pdf');
}



    public function create()
    {
        $transaksis = Transaksi::all();
        return view('spesifikasi.create', compact('transaksis'));
    }
    
    public function store(Request $request)
{
    $this->validate($request, [
        'brand' => 'required',
        'model' => 'required',
        'ram' => 'required',
        'processor' => 'required',
        'pixelkamera' => 'required',
        'transaksi_id' => 'required|integer' // Ensure it's an integer
    ]);

    DB::table('spesifikasis')->insert([
        'brand' => $request->brand,
        'model' => $request->model,
        'ram' => $request->ram,
        'processor' => $request->processor,
        'pixelkamera' => $request->pixelkamera,
        'transaksi_id' => $request->transaksi_id // This should be an integer
    ]);

    Alert::success('Success', 'Data berhasil disimpan');

    return redirect()->route('spesifikasi.index')->with(['success' => 'Data berhasil disimpan']);
}


    public function edit(Spesifikasi $spesifikasi)
    {
        $transaksis = Transaksi::all();
        return view('spesifikasi.edit', compact('spesifikasi', 'transaksis'));
    }

    public function update(Request $request, Spesifikasi $spesifikasi)
    {
        $this->validate($request, [
            'brand' => 'required',
            'model' => 'required',
            'ram' => 'required',
            'processor' => 'required',
            'pixelkamera' => 'required',
            'transaksi_id' => 'required|integer'
        ]);

        $spesifikasi->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'ram' => $request->ram,
            'processor' => $request->processor,
            'pixelkamera' => $request->pixelkamera,
            'transaksi_id' => $request->transaksi_id
        ]);

        Alert::success('Success', 'Data berhasil diedit');

        return redirect()->route('spesifikasi.index')->with(['success' => 'Data berhasil disimpan']);
    }

    public function destroy($id)
    {
        $spesifikasi = Spesifikasi::findOrFail($id);
        $spesifikasi->delete();

        if ($spesifikasi) {
            return redirect()->route('spesifikasi.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('spesifikasi.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}