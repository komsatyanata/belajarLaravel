<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title="Data Pemasukan";
        $data['Pemasukan']=array(
            'nama'=>'Komang Satyanata',
            'tanggal'=>'01 April 2021',
            'asal'=>'Desa Jinengdalem',
            'Keterangan'=>'Pas foto 4x6',
            'Harga'=>'Rp 30.000',
        );
        return view('admin.beranda', compact('title','data'));
    }
    public function dashboard(){
        $title="Data Dashboard";

        return view('admin.dashboard', compact('title'));
    }
}
