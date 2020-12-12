<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dokterModel extends Model
{
    use SoftDeletes;
    protected $table = 'dokter';
    protected $softDelete = true;
    protected $primaryKey = 'id_dokter';
    protected $fillable = ["nama_dokter","NIK","agama","jabatan", "nomor_str", "email", "password", "jenis_kelamin", "universitas", "tanggal_lahir", "status_dokter",
        "spesialis", "alamat"];
}
