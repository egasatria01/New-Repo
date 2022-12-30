<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Hasil;
class HasilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $hasil = Hasil::all();
        return view('hasil', compact('user', 'hasil'));
    }
}
