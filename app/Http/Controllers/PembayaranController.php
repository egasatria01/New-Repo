<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pembayaran;
class PembayaranController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pembayaran = Pembayaran::all();
        return view('pembayaran', compact('user', 'pembayaran'));
    }
}
