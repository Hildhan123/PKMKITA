<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Pkm;
use Auth;


class perekrutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('');
        $this->middleware('perekrut');
    }

    public function index()
    {
        return view('perekrut.index');
    }
    
    public function my_pkm()
    {
        $find = Auth::user()->id;
        $mypkm = DB::table('pkms')->where('id_users',$find)->first();

        //dump($mypkm);
        if($mypkm != null)
        {
            return view('perekrut.my_pkm',['mypkm' => $mypkm ]);
        }

        return view('perekrut.my_pkm',['mypkm' => $mypkm ]);
    }

    public function my_pkm_proses(Request $request)
    {
        $find = Auth::user()->id;
        $mypkm = DB::table('pkms')->where('id_users',$find)->first();

       

        if($mypkm == !null) 
        {
            $validateData = $request->validate([
                'nama_proposal' => 'required|max:100|string',
                'kategori_pkm' => 'required|in:
                PKM-RE,PKM-RSH,PKM-K,PKM-PM,PKM-PI,
                PKM-KC,PKM-KI,PKM-VGK,PKM-GFT,PKM-AI,PKM-RE',
                'deskripsi' => 'required|max:3000',
                'status' => 'required|in:open,close',
                'prodi_dibutuhkan' => 'required|string'
            ]);
            DB::table('pkms')->where('id_users',$find)->update([
                'nama_proposal' => $validateData['nama_proposal'],
                'kategori_pkm' => $validateData['kategori_pkm'],
                'deskripsi' => $validateData['deskripsi'],
                'prodi_dibutuhkan' => $validateData['prodi_dibutuhkan'],
                'status' => $validateData['status'],
                'id_users' => Auth::user()->id,
                
            ]);
            $request->session()->flash('pesan', "Edit PKM {$validateData['nama_proposal']} Berhasil");
            return redirect()->route('perekrut.my_pkm');
        }
        
        $validateData = $request->validate([
            'nama_proposal' => 'required|max:100|string',
            'kategori_pkm' => 'required|in:
            PKM-RE,PKM-RSH,PKM-K,PKM-PM,PKM-PI,
            PKM-KC,PKM-KI,PKM-VGK,PKM-GFT,PKM-AI,PKM-RE',
            'deskripsi' => 'required|max:3000',
            'status' => 'required|in:open,close',
            'prodi_dibutuhkan' => 'required|string'
        ]);
        DB::table('pkms')->insert([
            'nama_proposal' => $validateData['nama_proposal'],
            'kategori_pkm' => $validateData['kategori_pkm'],
            'deskripsi' => $validateData['deskripsi'],
            'prodi_dibutuhkan' => $validateData['prodi_dibutuhkan'],
            'status' => $validateData['status'],
            'id_users' => Auth::user()->id,
        ]);
        $request->session()->flash('pesan', "Buat PKM {$validateData['nama_proposal']} Berhasil");
        return redirect()->route('perekrut.my_pkm');
    }

    public function my_pkm_switch(Request $request)
    {
        $find = Auth::user()->id;
        $mypkm = DB::table('pkms')->where('id_users',$find)->first();

        if($request->switch)
        {
            if($mypkm->status == 'open')
            {
                DB::table('pkms')->where('id_users',$find)->update(['status' => 'close']);
            }
            if($mypkm->status == 'close')
            {
                DB::table('pkms')->where('id_users',$find)->update(['status' => 'open']);
            }
        }
        
        if($request->delete)
        {
            DB::table('pkms')->where('id_users',$find)->delete();
        }
        $request->session()->flash('pesan', "Perubahan berhasil dilakukan");
        return redirect()->route('perekrut.my_pkm');

    }

    public function calon_anggota()
    {
        return view('perekrut.calon_anggota');
    }
}
