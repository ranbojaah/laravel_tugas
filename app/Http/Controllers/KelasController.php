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

    public function edit($id){
        $data['kelas'] = DB::table('t_kelas')->find($id);
        return view('kelas.formkelas', $data);
    }

    public function update(Request $request, $id){
        $rule = [
            'nama_kelas' => 'required|unique:t_kelas,nama_kelas,' . $id,
            'jurusan' => 'required',
            'lokasi_ruangan' => 'required|unique:t_kelas,lokasi_ruangan,' . $id,
            'nama_wali_kelas' => 'required|unique:t_kelas,nama_wali_kelas,' . $id,
        ];
        $this ->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);

        $status = DB::table('t_kelas')->where('id',$id)->update($input);

        if($status){
            return redirect('/kelas')->with('success','Data berhasil diubah');
          } else {
            return redirect('/kelas')->with('error','Data gagal diubah');
          }
    }

    public function destroy(Request $request, $id){
        $status = DB::table('t_kelas')->where('id',$id)->delete();

        if($status){
            return redirect('/kelas')->with('success','Data berhasil dihapus');
          } else {
            return redirect('/kelas/create')->with('error','Data gagal dihapus');
          }
    }
}
