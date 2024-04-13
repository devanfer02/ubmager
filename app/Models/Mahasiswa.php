<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;
use SIAMUBAuth\Models\Mahasiswa as MirzaPunya;

class Mahasiswa extends Model
{
    protected $primaryKey = 'nim';
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'remember_token'
    ];

    public function populate(MirzaPunya $mhs) {
        $this->nim = $mhs->nim;
        $this->nama_lengkap = $mhs->nama;
        $this->fakultas = $mhs->fakultas;
        $this->program_studi = $mhs->programStudi;
        $this->foto_profil = $mhs->pasFoto;
    }
}
