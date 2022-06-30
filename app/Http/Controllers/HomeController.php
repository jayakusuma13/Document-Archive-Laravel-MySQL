<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laratrust\LaratrustFacade as Laratrust;
use Illuminate\Support\Facades\Validator;
use App\Perusahaan;
use App\User;
use App\Laporan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Laratrust::hasRole('admin')) return $this->adminDashboard();
      if (Laratrust::hasRole('member')) return $this->memberDashboard();
      return view('home');
    }

    protected function adminDashboard()
    {
      return view('dashboard.admin');
    }
    protected function memberDashboard()
    {
      
      $user = Auth::user()->id;
      // $perusahaan = Perusahaan::where('id_perusahaan', '=', $user)->get();
      // $laporan = Laporan::find($user);
      $perusahaan = DB::table('perusahaans')
      ->leftjoin('users', 'perusahaans.id_perusahaan', '=', 'users.id_perusahaan')
      ->leftjoin('laporan', 'perusahaans.id_perusahaan', '=', 'laporan.id_perusahaan')
      ->select('perusahaans.*','users.email','laporan.*')
      ->where('perusahaans.id_perusahaan','=', $user)
      ->get();
      // return $perusahaan;
      return view('dashboard.member', compact('perusahaan'));
    }

    public function edit($id = null)
    {
      $user = Auth::user()->id;
      $perusahaan = DB::table('perusahaans')
      ->leftjoin('users', 'perusahaans.id_perusahaan', '=', 'users.id_perusahaan')
      ->select('perusahaans.*','users.*')
      ->where('perusahaans.id_perusahaan','=', $user)
      ->first();
      
      // $perusahaan = Perusahaan::find($user);
      // $user = User::where('id_perusahaan', '=', $user)->get();
      // return $user;
      return view('member.edit', ['perusahaan'=>$perusahaan]);
    }

    public function update(Request $request, $id = null)
    {
        $user = Auth::user()->id;
        // return $user;
        DB::table('perusahaans')
        ->where('id_perusahaan','=', $user)
        ->update([
          'nama_perusahaan' => $request->nama_perusahaan,
          'alamat_perusahaan' => $request->alamat_perusahaan,
          'no_tlp' => $request->no_tlp,
          'jenis_perusahaan' => $request->jenis_perusahaan
          ]
        );
        // return $user;
        $foreign = Perusahaan::where('nama_perusahaan', '=', $request->nama_perusahaan)->get();
        // return $foreign;
        DB::table('users')
        ->where('name', '=', $foreign[0]->nama_perusahaan)
        ->update([
          'email' => $request->email,
          'password' => bcrypt($request->password)
          ]
        );
        // return $foreign;
        Session::flash("flash_notification", [
          "level"=>"success",
          "message"=>"Berhasil update data $request->nama_perusahaan"
        ]);

        return back();
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
        $simpan = new Laporan;
        $simpan->id_perusahaan = $id_perusahaan;
        $simpan->nama_file = time() . '.' . $namafile;
        $simpan->save();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil upload Data"
          ]);

        return back();
    }

    public function destroy($id)
    {
        $nama = Laporan::where('id_laporan', '=', $id)->first();
        // return $nama;
        Laporan::destroy($id);
        File::delete('berkas/' . $nama->nama_file);
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Data berhasil dihapus"
          ]);
    
          return redirect()->back();
    }
}
