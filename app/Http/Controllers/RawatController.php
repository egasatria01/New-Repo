<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Rawat;
class RawatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $rawat = Rawat::all();
        return view('rawat', compact('user', 'rawat'));
    }
}
