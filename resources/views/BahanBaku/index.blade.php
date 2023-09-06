@extends('layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div> 
@endif
<a class="btn btn-success" href="{{ route('bahanbaku.create')}}">Tambah Data</a>
<a class="btn btn-primary" href="/report" target="_blank">Cetak Data</a>
<p></p>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($bahanbakus as $bahanbaku)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><img src="{{ url('/data_file/'.$bahanbaku->gambar) }}" width="150px" height="150px"> </td>
                            <td>{{ $bahanbaku->kd_barang }}</td>
                            <td>{{ $bahanbaku->nm_barang }}</td>
                            <td>{{ $bahanbaku->stok }}</td>
                            <td>{{ $bahanbaku->harga }}</td>
                            <td>{{ $bahanbaku->ket }}</td>
                            <td>

<form action="{{ route('bahanbaku.destroy', $bahanbaku->id)}}" method="POST">
    @csrf 
    @method('DELETE')

 <a class="btn btn-warning" href="{{ route('bahanbaku.edit', $bahanbaku->id)}}">Edit</a>

 <button type="submit" class="btn btn-danger" onclick="Javascript:return confirm('Apakah anda ingin menghapus data ini?')">Hapus
 </button>
</form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection