<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriSoalKecermatan;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Crypt;

class KategoriSoalKecermatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = 'master';
        $submenu='kategorisoalkecermatan';
        $data = KategoriSoalKecermatan::all();
        $data_param = [
            'menu','submenu','data'
        ];

        return view('master/kategorisoalkecermatan')->with(compact($data_param));
    }
    public function store(Request $request)
    {
        $data['judul'] = $request->judul_add;
        $data['ket'] = $request->ket_add;
        $data['created_by'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        $createdata = KategoriSoalKecermatan::create($data);
        if($createdata){
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menambahkan data'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $data['judul'] = $request->judul[0];
        $data['ket'] = $request->ket[0];
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        $updatedata = KategoriSoalKecermatan::find($id)->update($data);

        if($updatedata){
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diubah'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!'
            ]);
        }
    }

    public function destroy($id)
    {
        // Temukan kategori soal
        $kategori = KategoriSoalKecermatan::find($id);
    
        if ($kategori) {
            // Hapus (soft delete) semua master soal terkait dan update 'deleted_by' serta 'deleted_at'
            foreach ($kategori->soal as $soal) {
                $soal->deleted_by = Auth::id(); // Set deleted_by pada master soal
                $soal->deleted_at = Carbon::now(); // Set deleted_at pada master soal
                $soal->save(); // Simpan perubahan
                $soal->delete(); // Soft delete master soal
            }
    
            // Tandai kategori sebagai dihapus (soft delete)
            $data['deleted_by'] = Auth::id();
            $data['deleted_at'] = Carbon::now()->toDateTimeString();
            $kategori->update($data);
    
            return response()->json([
                'status' => true,
                'message' => 'Kategori soal berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Kategori tidak ditemukan'
            ]);
        }
    }
}
