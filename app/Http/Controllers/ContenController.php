<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Foto;

class ContenController extends Controller
{
    //
    public function index()
    {
       $status=Auth::user()->status;
       $datafoto=Foto::all();
       if($status=="admin"){
        return view('foto.index', compact('datafoto'));
       }elseif($status=="transaksi"){
        return view('foto.indexpengunjung', compact('datafoto'));
       }else{
        abort(404);
       }
       
    }
}
