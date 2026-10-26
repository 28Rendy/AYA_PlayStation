<?php

namespace App\Http\Controllers;

use App\Models\DataPerental;
use App\Models\DataRuang;
use App\Models\PengaturanWeb;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    private function getCommonData()
    {
        return [
            'pengaturan' => PengaturanWeb::getSettings(),
            'data_perental' => DataPerental::count(),
        ];
    }

    public function index()
    {
        $data = $this->getCommonData();
        $data['data_ruang'] = DataRuang::all();
        $data['data_ulasan'] = Ulasan::latest()->take(6)->get();
        return view('welcome', $data);
    }

    public function about()
    {
        $data = $this->getCommonData();
        return view('frontend.about', $data);
    }

    public function features()
    {
        $data = $this->getCommonData();
        return view('frontend.features', $data);
    }

    public function facilities()
    {
        $data = $this->getCommonData();
        return view('frontend.facilities', $data);
    }

    public function gallery()
    {
        $data = $this->getCommonData();
        return view('frontend.gallery', $data);
    }

    public function rooms()
    {
        $data = $this->getCommonData();
        $data['data_ruang'] = DataRuang::all();
        return view('frontend.rooms', $data);
    }

    public function contact()
    {
        $data = $this->getCommonData();
        $data['data_ulasan'] = Ulasan::latest()->take(10)->get();
        return view('frontend.contact', $data);
    }
}
