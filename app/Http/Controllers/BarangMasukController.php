<?php

namespace App\Http\Controllers;
use App\Models\BahanBaku;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangmasuks = DB::table('tbl_barang_masuk')
                     ->join('tbl_barang', 'tbl_barang.id', '=','tbl_barang_masuk.id_barang')
                     ->get();

                     $sums = $barangmasuks->sum('total');
        
        return view('barang_masuk.index', compact('barangmasuks','sums'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bahanbakus = BahanBaku::all();
        return view('barang_masuk.create',compact('bahanbakus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'id_barang' => 'required',
        'tgl_masuk' => 'required',
        'jumlah' => 'required',
        ]);

        $harga = $request->input('harga');
        $jumlah =  $request->input('jumlah');
        $total = $harga * $jumlah;

        $stok = $request->input('stok');
        $sisa_stok = $stok + $jumlah;

        BarangMasuk::create([
            'id_barang' => $request->id_barang,
            'tgl_masuk' => $request->tgl_masuk,
            'jumlah' => $request->jumlah,
            'total' => $total

        ]);

        DB::table('tbl_barang')->where('id', $request->id_barang)->update(['stok'=>$sisa_stok]);
        return redirect()->route('barang_masuk.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function cari(Request $request)
    {
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');
        $query ="tgl_masuk BETWEEN '".$dari."' AND '".$sampai."' ";
        $barangmasuks = DB::table('tbl_barang_masuk')
                ->join('tbl_barang', 'tbl_barang.id', '=','tbl_barang_masuk.id_barang')
                ->whereRaw($query)
                ->get();
        $sums = $barangmasuks->sum('total');
        // dd($barangmasuks, $sum);
        return view('barang_masuk.index', compact('barangmasuks', 'sums'))->with('i');
    }
}
