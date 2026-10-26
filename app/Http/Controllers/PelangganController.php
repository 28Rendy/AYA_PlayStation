<?php

namespace App\Http\Controllers;

use App\Models\DataRuang;
use App\Models\Ps;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $user = Auth::user();
        $ruang = DataRuang::all();
        $ps = Ps::all();
        $ulasan = Ulasan::latest()->take(5)->get();

        return view('pelanggan.dashboard', compact('user', 'ruang', 'ps', 'ulasan'));
    }
}
