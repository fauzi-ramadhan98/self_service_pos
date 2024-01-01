<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $nama = "Kim Jong Un";
        $alamat = "Korea Utara";
        $tanggal_lahir = "1 Januari 1976";
    
        $data_array = array(
            "nama" => array(
                "Kim Jong Un", "Kim Jung Kook", "Kim Taehyung",
            ),
        );
    
        return view('profil', compact('nama', 'alamat', 'tanggal lahir', 'data_array'));
    }
}