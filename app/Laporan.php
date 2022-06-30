<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';
    protected $fillable = ['id_laporan','id_perusahaan','nama_file'];
    // protected $with = ['perusahaan'];

    public function Perusahaans()
    {
      return $this->belongsTo('App\Perusahaan', 'id_perusahaan');
    }
}
