<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foto;

class FotoController extends Controller
{
    public function index()
    {
        $datafoto = Foto::all();
        return view('foto.index', compact('datafoto'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namafile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ket' => 'required|string|max:255',
        ]);

        // Cek apakah file diupload
        if ($request->hasFile('namafile')) {
            $image = $request->file('namafile');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Pindahkan file ke direktori 'public/gambar'
            $image->move(public_path('gambar'), $imageName);

            // Simpan informasi ke database
            $simpan = Foto::create([
                'namafile' => $imageName,
                'lokasi' => 'gambar/' . $imageName,
                'ket' => $request->ket,
            ]);

            if ($simpan) {
                return redirect()->route('foto.index')->with('success', 'Foto berhasil disimpan');
            } else {
                return redirect()->route('foto.index')->with('error', 'Gagal menyimpan foto');
            }
        } else {
            return redirect()->route('foto.index')->with('error', 'Tidak ada file yang diupload');
        }
    }

    public function update(Request $request, $id)
    {
        $foto = Foto::findOrFail($id);
        return view('foto.edit', compact('foto'));
        $request->validate([
            'namafile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ket' => 'required|string|max:255',
        ]);

        $foto = Foto::findOrFail($id);

        if ($request->hasFile('namafile')) {
            // Hapus foto lama
            if (file_exists(public_path($foto->lokasi))) {
                unlink(public_path($foto->lokasi));
            }

            $image = $request->file('namafile');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('gambar'), $imageName);
            $foto->namafile = $imageName;
            $foto->lokasi = 'gambar/' . $imageName;
        }

        $foto->ket = $request->ket;
        $foto->save();

        return redirect()->route('foto.index')->with('success', 'Foto berhasil diperbarui');
    }

    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);
        
        // Hapus foto dari server
        if (file_exists(public_path($foto->lokasi))) {
            unlink(public_path($foto->lokasi));
        }
                                                                
        $foto->delete();
        
        return redirect()->route('foto.index')->with('success', 'Foto berhasil dihapus');
    }

    // Metode lainnya (create, show, edit, update, destroy) belum diimplementasi, bisa ditambahkan sesuai kebutuhan
}
