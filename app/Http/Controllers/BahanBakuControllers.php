<?php
namespace App\Http\Controllers;
use App\Models\BahanBaku;
use Illuminate\Http\Request;

class BahanBakuControllers extends Controller{

    public function index()
    {
        $bahanbakus = BahanBaku::latest()->paginate(20);
        return view('bahanbaku.index',compact('bahanbakus'))->with('i' , (request()->input('page',1)-1) *20);
    }

    public function create()
    {
        return view('bahanbaku.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kd_barang' => 'required',
            'nm_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'ket' => 'required',
        ]);

        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);

        BahanBaku::create([
            'kd_barang' => $request->kd_barang,
            'nm_barang' => $request->nm_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'ket' => $request->ket,
            'gambar' => $nama_file,

        ]);

        return redirect()->route('bahanbaku.index')-> with('success', 'data berhasil Disimpan');
    }

    public function edit(BahanBaku $bahanbaku)
    {
        return view('bahanbaku.edit', compact('bahanbaku'));
    }

    public function update(Request $request, $bahanbaku)
{
    $validatedData = $request->validate([
        'kd_barang' => 'required',
        'nm_barang' => 'required',
        'harga' => 'required',
        'stok' => 'required',
        'ket' => 'required',
        'gambar'=>'required',
    ]);

    $bahanbaku = BahanBaku::findOrFail($bahanbaku);

    $bahanbaku->kd_barang = $validatedData['kd_barang'];
    $bahanbaku->nm_barang = $validatedData['nm_barang'];
    $bahanbaku->harga = $validatedData['harga'];
    $bahanbaku->stok = $validatedData['stok'];
    $bahanbaku->ket = $validatedData['ket'];

    // $file = $request->file('gambar');
    //     $nama_file = time()."_".$file->getClientOriginalName();
    //     $tujuan_upload = 'data_file';
    //     $file->move($tujuan_upload,$nama_file);

    if ($request->hasFile('gambar')) {
        $image = $request->file('gambar');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('data_file'), $imageName);
        $bahanbaku->gambar = $imageName;
    }

    $bahanbaku->save();

    return redirect()->route('bahanbaku.index')->with('success', 'Barang berhasil diperbarui.');
}

    public function destroy(BahanBaku $bahanbaku)
    {
        $bahanbaku->delete();
        return redirect()->route('bahanbaku.index')->with('success','Data Berhasil Dihapus');
    }

    public function report()
    {
        $bahanbakus = BahanBaku::latest()->paginate(20);
        return view('bahanbaku.report',compact('bahanbakus'))->with('i');
    }
}

