<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function kelas(){
        $data ['kelas'] = DB::table('t_kelas')
        // ->where('jurusan','like','%teknik audio vidio%')
        ->orderBy('nama_kelas','asc')
        ->paginate(5);

            return view('kelas', $data);
        }

    public function create(){
        return view('kelas.formkelas');
    }

    public function store(Request $request){
        $rule = [
            'nama_kelas' => 'required|unique:t_kelas,nama_kelas',
            'jurusan' => 'required',
            'lokasi_ruangan' => 'required|unique:t_kelas,lokasi_ruangan',
            'nama_wali_kelas' => 'required|unique:t_kelas,nama_wali_kelas',
        ];
        $this ->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_kelas')->insert($input);

        if($status){
            return redirect('/kelas')->with('success','Data berhasil ditambahkan');
          } else {
            return redirect('/kelas')->with('error','Data gagal ditambahkan');
          }
    }
}
