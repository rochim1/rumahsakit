<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $table = 'pasien';
    protected $fillable = [
'rekam_medis','nama', 'jenisKelamin', 'NIK', 'agama', 'tanggal_lahir', 'umur_daftar', 'lebih_bulan', 'email', 'alamat',
'telpon', 'asuransi', 'pekerjaan', 'email_verified_at',	'password'
    ];
    protected $hidden = [
        'password'
    ];
}
