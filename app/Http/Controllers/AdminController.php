<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Template;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Carbon\Carbon;
use Auth;
use Hash;
use File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tmp()
    {
        $template = Template::where('id', '<>', '~')->get();
        $provinsi = RajaOngkir::provinsi()->all();
        if ($template[0]->fk_provinsi) {
            $kabupaten = RajaOngkir::kota()->dariProvinsi($template[0]->fk_provinsi)->get();
        } else {
            $kabupaten = "";
        }
        $menu = "template";
        $submenu = "";
        $data_param = [
            'submenu',
            'menu',
            'template',
            'provinsi',
            'kabupaten'
        ];

        return view('master/template')->with(compact($data_param));
    }

    public function updatetmp(Request $request, $id)
    {

        $data['nama'] = $request->nama[0];
        $data['email'] = $request->email[0];
        $data['no_hp'] = $request->no_hp[0];
        $data['alamat'] = $request->alamat[0];
        $data['fk_provinsi'] = $request->fk_provinsi;
        $data['fk_kabupaten'] = $request->fk_kabupaten;
        $data['copyright'] = $request->copyright[0];

        if ($request->file("logo_besar")) {
            if ($files = $request->file("logo_besar")[0]) {
                $dataOld = Template::find($id);
                File::delete($dataOld->logo_besar);
                $destinationPath = 'image/upload/logo/';
                $file = 'Logo_Besar_' . Carbon::now()->timestamp . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file);
                $namafile = $destinationPath . $file;
                $data['logo_besar'] = $destinationPath . $file;
            }
        }

        if ($request->file("logo_kecil")) {
            if ($files = $request->file("logo_kecil")[0]) {
                $dataOld = Template::find($id);
                File::delete($dataOld->logo_kecil);
                $destinationPath = 'image/upload/logo/';
                $file = 'Logo_Kecil_' . Carbon::now()->timestamp . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file);
                $namafile = $destinationPath . $file;
                $data['logo_kecil'] = $destinationPath . $file;
            }
        }
        if ($request->file("banner1")) {
            if ($files = $request->file("banner1")[0]) {
                $dataOld = Template::find($id);
                File::delete($dataOld->banner1);
                $destinationPath = 'image/upload/banner/';
                $file = 'Banner1_' . Carbon::now()->timestamp . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file);
                $namafile = $destinationPath . $file;
                $data['banner1'] = $destinationPath . $file;
            }
        }
        if ($request->file("banner2")) {
            if ($files = $request->file("banner2")[0]) {
                $dataOld = Template::find($id);
                File::delete($dataOld->banner1);
                $destinationPath = 'image/upload/banner/';
                $file = 'Banner2_' . Carbon::now()->timestamp . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file);
                $namafile = $destinationPath . $file;
                $data['banner2'] = $destinationPath . $file;
            }
        }

        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        $updatedata = Template::find($id)->update($data);

        if ($updatedata) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diubah',
                'data' => $data // Tambahkan untuk melihat hasil akhirnya
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Mohon coba kembali!',
                'data' => $data
            ]);
        }
    }

    // public function index()
    // {
    //     $menu = "adminhome";
    //     $submenu="";
    //     $user = User::where('user_level',2)->get();
    //     $data_param = [
    //         'submenu','menu','user'
    //     ];

    //     return view('admin/AdminHome')->with(compact($data_param));
    // }
}
