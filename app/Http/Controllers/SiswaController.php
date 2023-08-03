<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index(){
      return view('belajar');
    }

    public function siswa()
    {
      $data ['siswa'] = DB::table('t_siswa')
      ->orderBy('nama_lengkap')
      // ->where('nama_lengkap','like','%o%')
      ->paginate(5);
      return view('siswa', $data );
    }

    public function month(){
      $data ['tanggal'] = date('d');
      $data ['bulan'] = date('F');
      $data ['tahun'] = date('y');
      return view('month', $data);
    }

    public function table(){
      $data ['nama'] = "Gen";
      $data ['kelas'] = "XII RPL";
      return view('table', $data);
    }

    public function create (){
      return view('siswa.form');
    }

    public function store(Request $request){
      $rule = [
        'nis' => 'required|numeric',
        'nama_lengkap' => 'required|string',
        'jenkel' => 'required',
        'goldar' => 'required',
      ];
      $this->validate($request, $rule);

      $input = $request->all();
      unset($input['_token']);
      $status = \DB::table('t_siswa')->insert($input);

      if($status){
              return redirect('/siswa')->with('success','Data berhasil ditambahkan');
            } else {
              return redirect('/siswa')->with('error','Data gagal ditambahkan');
            }
    }
}
