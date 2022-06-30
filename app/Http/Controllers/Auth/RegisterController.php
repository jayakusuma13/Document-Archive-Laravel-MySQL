<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use App\Perusahaan;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function regis(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required|perusahaans',
            'email' => 'required|unique:users',
          ]);

        $perusahaan = new Perusahaan();
        $perusahaan->nama_perusahaan = $request->name;
        $perusahaan->alamat_perusahaan = $request->alamat_perusahaan;
        $perusahaan->no_tlp = $request->no_tlp;
        $perusahaan->jenis_perusahaan = $request->jenis_perusahaan;
        $perusahaan->save();
        $id = DB::table('perusahaans')
           ->leftJoin('users', 'perusahaans.nama_perusahaan', '=', 'users.name')
           ->select('perusahaans.id_perusahaan','perusahaans.nama_perusahaan')
           ->where('perusahaans.nama_perusahaan', '=', $request->name)
           ->get();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = 'member';
        $user->id_perusahaan = $id[0]->id_perusahaan;
        $user->save();
        // echo $id[0]->id_perusahaan;
       
        // $user = User::create([
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'level' => 'member',
        //     'id_perusahaan' => $id,
        //     'password' => bcrypt($request['password']),
        // ]);
        $memberRole = Role::where('name', 'member')->first();
        $user->attachRole($memberRole);
        return redirect()->route('home');

    }
     
    protected function create(array $data)
    {

        // $perusahaan = Perusahaan::create([
        //     'nama_perusahaan' => $data['name'],
        //     'alamat_perusahaan' => $data['alamat_perusahaan'],
        //     'jenis_perusahaan' => $data['jenis_perusahaan'],
        //     'no_tlp'            => $data['no_tlp'],
        // ]);

        // $id = Perusahaan::where('nama_perusahaan', '=', $request->name)->first();
        
        // return $id2->name;

        // $user = User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'level' => 'member',
        //     'id_perusahaan' => $id2,
        //     'password' => bcrypt($data['password']),
        // ]);
        // $memberRole = Role::where('name', 'member')->first();
        // $user->attachRole($memberRole);
        // return $user;

        // //return $id;
        // $user = new User();
        // $user->name = $request->nama_perusahaan;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->level = 'member';
        // $user->id_perusahaan = $id[0]->id_perusahaan;
        // $user->save();

    }

}
