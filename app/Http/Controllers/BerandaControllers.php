<?php
namespace App\Http\Controllers;
use App\Models\BahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\facades\File;
use DB;
class BerandaControllers extends Controller 
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $bahanbakus = BahanBaku::select(DB::raw("stok"),DB::raw("nm_barang"))->pluck('stok','nm_barang');

        $lbl = $bahanbakus->keys(); //nilai x
        $dt = $bahanbakus->values(); //nilai y
        return view('welcome',compact('lbl','dt'));
    }
}