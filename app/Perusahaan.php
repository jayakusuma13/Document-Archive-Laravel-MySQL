<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Perusahaan extends Model
{
  use LaratrustUserTrait;
  use Notifiable;
  // protected $table = 'perusahaan';
  protected $primaryKey = 'id_perusahaan';
  protected $fillable = ['id_perusahaan','nama_perusahaan','alamat_perusahaan',
  'no_tlp','jenis_perusahaan'];

  protected $hidden = [
    'password',
  ];

  public function Laporan()
  {
    return $this->hasMany('App\Laporan','id_perusahaan');
  }

}
