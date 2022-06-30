<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Perusahaan;
use App\Laporan;
use App\User;
use App\Role;

class PerusahaanController extends Controller
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

     public function index(Request $request, Builder $htmlBuilder)
     {
       if ($request->ajax())
       {
        $perusahaans = Perusahaan::select(['id_perusahaan','nama_perusahaan','alamat_perusahaan','no_tlp',
        'jenis_perusahaan']);
         return Datatables::of($perusahaans)
           ->addColumn('action', function($perusahaans){
             return view('datatable._action', [
               'model' => $perusahaans,
               'form_url' => route('perusahaan.destroy', $perusahaans->id_perusahaan),
               'edit_url' => route('perusahaan.edit', $perusahaans->id_perusahaan),
               'show_url' => route('perusahaan.show', $perusahaans->id_perusahaan),
               'confirm_message' => 'Yakin mau menghapus ' . $perusahaans->nama_perusahaan . '?'
             ]);
           })->make(true);
       }

         $html = $htmlBuilder
         ->addColumn(['data' => 'nama_perusahaan', 'name'=>'nama_perusahaan', 'title'=>'Nama Perusahaan'])
        //  ->addColumn(['data' => 'alamat_perusahaan','name'=>'alamat_perusahaan', 'title'=>'Alamat Perusahaan'])
         ->addColumn(['data' => 'no_tlp', 'name'=>'no_tlp', 'title'=>'Telp Perusahaan'])
        //  ->addColumn(['data' => 'email_perusahaan','name'=>'email_perusahaan', 'title'=>'Email Perusahaan'])
         ->addColumn(['data' => 'jenis_perusahaan','name'=>'jenis_perusahaan', 'title'=>'Jenis Perusahaan'])
         ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Aksi', 'orderable'=>false, 'searchable'=>false]);

         return view('perusahaan.index')->with(compact('html'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'nama_perusahaan' => 'required|unique:perusahaans',
          ]);
        // $request->merge(['password_perusahaan' => Hash::make($request->password)]);
        
        //$perusahaan = Perusahaan::create($request->all());
        $perusahaan = new Perusahaan();
        $perusahaan->nama_perusahaan = $request->nama_perusahaan;
        $perusahaan->alamat_perusahaan = $request->alamat_perusahaan;
        $perusahaan->no_tlp = $request->no_tlp;
        $perusahaan->jenis_perusahaan = $request->jenis_perusahaan;
        $perusahaan->save();

        $id = Perusahaan::where('nama_perusahaan', '=', $request->nama_perusahaan)->get();
        
        $user = new User();
        $user->name = $request->nama_perusahaan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = 'member';
        $user->id_perusahaan = $id[0]->id_perusahaan;
        $user->save();

        $role = DB::table('role_user')->insertGetId(
          array('user_id' => $id[0]->id_perusahaan, 'role_id' => 2));
        // return $role;

        Session::flash("flash_notification", [
          "level"=>"success",
          "message"=>"Berhasil menyimpan $perusahaan->nama_perusahaan"
        ]);

        Telegram::sendMessage([
          'chat_id' => '111519789',
          'text' => 'DATA BARU => Aplikasi Penyimpanan Berkas Digital' . chr(10) . '========================' . chr(10) . 'Nama : '. $request->nama_perusahaan . chr(10) . 'Email : '. $request->email . chr(10) . 
                    'No. Telp : ' . $request->no_tlp . chr(10) . 'Jenis Perusahaan : ' . $request->jenis_perusahaan
        ]);

        return redirect()->route('perusahaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $laporan = Laporan::where('id_perusahaan','=', $id)->get();
      $perusahaan = Perusahaan::find($id);
      $user = User::where('id_perusahaan', '=', $id)->get();
      
      return view('perusahaan.show', compact('perusahaan', 'laporan', 'user'));
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perusahaan = Perusahaan::find($id);
        $user = User::where('id_perusahaan', '=', $id)->get();
        return view('perusahaan.edit', compact('perusahaan','user'));
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
      $perusahaan = Perusahaan::find($id);
      $request->merge(['password' => Hash::make($request->password)]);
      $input = $request->input();

      $perusahaan->fill($input)->save();

      $user = User::find($id);
      $user->fill($input)->save();
      // return $input;
      // return $request->all();
      Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil merubah $perusahaan->nama_perusahaan"
      ]);

      Telegram::sendMessage([
        'chat_id' => '111519789',
        'text' => 'Data => '. $perusahaan->nama_perusahaan . 'telah DI-UPDATE'
      ]);

      return redirect()->route('perusahaan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Perusahaan::destroy($id);
      User::destroy($id);
      Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Perusahaan berhasil dihapus"
      ]);

      return redirect()->route('perusahaan.index');

    }
    public function hapusFile($id)
    {
      Laporan::destroy($id);
      Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data berhasil dihapus"
      ]);

      return back();
    }

    public function kontak()
    {
        return view('contact');
    }
    
    public function sendKontak(Request $request)
    {

      $rules = [
        'message' => 'required'
      ];

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails())
      {
          return redirect()->back()
              ->with('status', 'danger')
              ->with('message', 'Message is required');
      }
        Telegram::sendMessage([
          'chat_id' => '111519789',
          'text' => 'Nama : '. $request->name . chr(10) . 'Email : '. $request->email . chr(10) . 
                    'Subject : ' . $request->subject . chr(10) . 'Pesan : ' . $request->message
        ]);

        return redirect()->back()
        ->with('status', 'success')
        ->with('message', 'Message sent');
    }

    

}
