<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
       $user = Auth::user();
       return view('home', compact('user'));
    }

    public function pasien()
    {
        $user = Auth::user();
        $pasiens = Pasien::all();
        return view('pasien', compact('user', 'pasien'));
    }

    public function submit_pasien(Request $request)
    {
        $validate = $request->validate([
            'nama_pasien' => 'required|max:255',
            'umur_pasien' => 'required',
            'tgl_pasien' => 'required',
            'alamat_pasien' => 'required',
            'no_tlp' => 'required',
            'jenis_kelamin_p' => 'required',
        ]);
        $pasien = new Pasien;

        $pasien->nama_pasien = $request->get('nama_pasien');
        $pasien->umur_pasien = $request->get('umur_pasien');
        $pasien->tgl_pasien = $request->get('tgl_pasien');
        $pasien->alamat_pasien = $request->get('alamat_pasien');
        $pasien->no_tlp = $request->get('no_tlp');
        $pasien->jenis_kelamin_p = $request->get('jenis_kelamin_p');

        $pasien->save();

        $notification = array(
            'massage' => 'Data pasien berhasil ditambahkan',
            'alert-type' => 'success'
        );
        return redirect()->route('pasien')->with($notification);
    }
}
