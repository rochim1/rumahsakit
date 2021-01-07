<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $primaryKey = 'id_pasien';
    protected $table = 'pasien';
    protected $fillable = [
'rekam_medis','nama', 'jenisKelamin', 'NIK', 'agama', 'tanggal_lahir', 'umur_daftar', 'lebih_bulan', 'email', 'alamat',
'telpon', 'asuransi', 'pekerjaan','status_nikah','foto', 'email_verified_at',	'password'
    ];
    protected $hidden = [
        'password'
    ];
}
