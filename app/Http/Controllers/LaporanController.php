<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Laporan;
class LaporanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('laporan', compact('user'));
    }
}
