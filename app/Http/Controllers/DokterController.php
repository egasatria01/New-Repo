<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Dokter;
class DokterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dokter = Dokter::all();
        return view('dokter', compact('user', 'dokter'));
    }

    public function store(Request $request){
        $validate = $request->all([
            'nama_dokter' => 'required|max:20',
            'id_spesialis' => 'required|max:255',
            'jam_praktek' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal' => 'required',
        ]);

        Dokter::Create([
            'nama_dokter' => $request->nama_dokter,
            'id_spesialis' => $request->id_spesialis,
            'jam_praktek' => $request->jam_praktek,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal' => $request->tanggal
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $request
        ]);
    }

    public function update(Request $req, $id){
            $kamar = Kamar::where("id_kamar","=",$id)->first();

            $validate = $req->validate([
            'no_kamar' => 'required|max:20',
            'nama_kamar' => 'required|max:255',
            'kelas_kamar' => 'required',
            'status_kamar' => 'required',
            'tanggal' => 'required',
            ]);

            $kamar->no_kamar = $req->get('no_kamar');
            $kamar->nama_kamar = $req->get('nama_kamar');
            $kamar->kelas_kamar = $req->get('kelas_kamar');
            $kamar->status_kamar = $req->get('status_kamar');
            $kamar->tanggal = $req->get('tanggal');

            $kamar->save();

        $notification = array(
            'message' => 'Data Kamar berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect('kamar')->with($notification);
    }

    public function delete($id){

        $kamar = Kamar::where("id_kamar","=",$id)->delete();

        $notification = array(
            'message' => 'Data Kamar berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect('kamar')->with($notification);
        }
}
