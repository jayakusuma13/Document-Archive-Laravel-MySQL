<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Laporan;
use App\Perusahaan;
use App\User;
use Illuminate\Support\Facades\DB;
use Storage;
use DateTime;
use Purifier;
use Illuminate\Support\Facades\File;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $perusahaan = Perusahaan::all('nama_perusahaan','id_perusahaan');
        // return $perusahaan->all();
        return view('report.index', compact('perusahaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nama = Laporan::where('id_laporan', '=', $id)->first();
        
        Laporan::destroy($id);
        File::delete('berkas/' . $nama->nama_file);
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Data berhasil dihapus"
          ]);
    
          return redirect()->back();
    }

    public function simpan(Request $request) 
    {
        $validator = Validator::make($request->all(), [
                'id_perusahaan' => 'required',
                'nama_file' => 'required|mimes:application/zip|max:10000',
              ]);
        
        $namafile = request()->nama_file->getClientOriginalName();

        $id_laporan = $request->id_laporan;
        $id_perusahaan = $request->id_perusahaan;
        $nama_file = $request->nama_file;

        $imageName = time().'.'.request()->nama_file->getClientOriginalExtension();    

        request()->nama_file->move(public_path('berkas'), time() . '.' . $namafile);

        // $simpan = Laporan::find($id_perusahaan);
        $simpan = new Laporan();
        $simpan->id_perusahaan = $id_perusahaan;
        $simpan->nama_file = time() . '.' . $namafile;
        $simpan->save();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil upload Data"
          ]);

        return back();
    }

    public function laporan_terpilih(Request $request)
    {
        $id = $request->id_perusahaan;
        $laporan = Laporan::where('id_perusahaan', $id)->get();
        $perusahaan = Perusahaan::find($id);
        
        return view('report.dataperusahaan', compact('laporan', 'perusahaan'));
    }

    public function laporan_all()
    {
        $perusahaan = DB::table('perusahaans')
            ->leftjoin('users', 'perusahaans.id_perusahaan', '=', 'users.id_perusahaan')
            ->get();

        // return $laporan->toJson();

        // $perusahaan = Perusahaan::all();
        
        
        return view('report.dataperusahaan2', compact('perusahaan'));
    }
}
