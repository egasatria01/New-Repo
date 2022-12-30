<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pendaftaran;
class PendaftaranController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pendaftaran = Pendaftaran::all();
        return view('pendaftaran', compact('user', 'pendaftaran'));
    }
}
