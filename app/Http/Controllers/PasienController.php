<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pasien = Pasien::all();
        return view('pasien', compact('user', 'pasien'));
    }
}
