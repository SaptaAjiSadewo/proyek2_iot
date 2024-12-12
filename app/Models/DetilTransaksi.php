<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;
class DetilTransaksi extends Model
{
    protected $fillable = ['transaksi_id', 'produk_id', 'jumlah'];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }

    public function produk(){
        return $this->belongsTo(Produk::class);
    }
}
