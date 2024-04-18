<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'order_id';

    protected $guarded = [];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'customer_id', 'nim');
    }

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('judul', 'like', "%" . $search . "%");
        })->when($filters['customer'] ?? false, function($query, $customer) {
            return $query->whereHas('mahasiswa', function($query) use($customer) {
                $query->where('nama_panggilan', 'like', "%" . $customer . "%")->
                orWhere('nama_lengkap', 'like', "%" . $customer . "%");
            });
        })->when($filters['lokasi'] ?? false, function($query, $lokasi) {
            return $query->where('lokasi_jemput', 'like', "%" . $lokasi . "%");
        })->when($filters['destinasi'] ?? false, function($query, $destinasi) {
            return $query->where('destinasi', 'like', "%" . $destinasi . "%");
        })->when($filters['minupah'] ?? false, function($query, $minupah) {
            return $query->where('upah', '>=', $minupah);
        })->when($filters['maxupah'] ?? false, function($query, $maxupah) {
            return $query->where('upah', '<=', $maxupah);
        })->when($filters['selesai'] ?? false, function($query, $selesai) {

            if ($selesai === "true") {
                $selesai = 1;
            } else {
                $selesai = 0;
            }

            return $query->where('selesai', '=', $selesai);
        });
    }
}
