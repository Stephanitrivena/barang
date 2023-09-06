<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model{
    use HasFactory;
    public $table = "tbl_barang";
    protected $fillable = [
        'kd_barang', 'nm_barang', 'stok', 'harga', 'ket' ,'gambar'
    ];
}