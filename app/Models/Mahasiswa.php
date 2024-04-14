<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SIAMUBAuth\Models\Mahasiswa as MirzaPunya;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'nim';
    protected $keyType = 'string';
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'remember_token'
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function populate(MirzaPunya $mhs) {
        $this->nim = $mhs->nim;
        $this->nama_lengkap = $mhs->nama;
        $this->nama_panggilan = $mhs->nama;
        $this->fakultas = $mhs->fakultas;
        $this->program_studi = $mhs->programStudi;
        $this->foto_profil = $mhs->pasFoto;
    }
}
