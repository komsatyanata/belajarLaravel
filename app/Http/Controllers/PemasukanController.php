<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukan=Pemasukan::all();
        $title="DAFTAR PEMASUKAN";
        return view('admin.berandapemasukan',compact('title','pemasukan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemasukan=Pemasukan::all();
        $title="INPUT PEMASUKAN";
        return view('admin.inputpemasukan',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required'=> 'Kolom :attribute Harus Lengkap',
            'date'=>'Kolom :attribute Harus Tanggal',
            'numeric'=>'Kolom :attribute Harus Angka',
            ];
            $validasi=$request->validate([
                'nama'=>'required',
                'waktu'=>'required',
                'alamat'=>'required',
                'keterangan'=>'required'
            ],$message);
            $validasi['user_id']=Auth::id();
            Pemasukan::create($validasi);
            return redirect('pemasukan')->with('success','Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $pemasukan=Pemasukan::find($id);
        $title="Edit PEMASUKAN";
        return view('admin.inputpemasukan',compact('title','pemasukan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message=[
            'required'=> 'Kolom :attribute Harus Lengkap',
            'date'=>'Kolom :attribute Harus Tanggal',
            'numeric'=>'Kolom :attribute Harus Angka',
            ];
            $validasi=$request->validate([
                'nama'=>'required',
                'waktu'=>'required',
                'alamat'=>'required',
                'keterangan'=>'required'
            ],$message);
            $validasi['user_id']=Auth::id();
            Pemasukan::create($validasi);
            return redirect('pemasukan')->with('success','Data Berhasil Tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemasukan=Pemasukan::find($id);
        if($pemasukan != null){
            storage::delete($pemasukan->id);
            Pemasukan::where('id',$id)->delete();
        }
        return redirect('pemasukan')->with('sucess','data berhasil terhapus');
    }
}
