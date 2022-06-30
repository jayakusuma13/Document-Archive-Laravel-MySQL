<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'GuestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/register','Auth\RegisterController@regis');

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
  Route::post('laporan/simpan', 'LaporanController@simpan');
  Route::resource('perusahaan', 'PerusahaanController');
  Route::resource('laporan', 'LaporanController');
  Route::get('contact','PerusahaanController@kontak');
  Route::post('contact/send','PerusahaanController@sendKontak');
  Route::post('laporan/terpilih', 'LaporanController@laporan_terpilih');
  Route::post('laporan/all', 'LaporanController@laporan_all');
  // Route::get('laporan/hapus','LaporanController@hapusFile');
});

Route::group(['prefix'=>'user', 'middleware'=>['auth', 'role:member']], function () {
  Route::get('/data', 'HomeController@edit');
  Route::post('/data/simpan', 'HomeController@simpan');
  Route::post('/data/update', 'HomeController@update');
  Route::delete('/data/delete/{id}', array('uses' => 'HomeController@destroy', 'as' => 'data.hapus'));
});
