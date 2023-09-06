<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model{
    use HasFactory;
    public $table = "tbl_barang_masuk";
    protected $fillable = [
        'id_barang', 'tgl_masuk', 'jumlah', 'total'
    ];
}