@extends('layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Data Barang Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <form action="/cari" method="GET">
                    @csrf
                    <label>Masukan Tanggal Awal dan Tanggal Akhir</label>
                    <input type="date" name="dari"> &nbsp;&nbsp;&nbsp; s/d &nbsp;&nbsp;&nbsp;
                    <input type="date" name="sampai">
                    <input type="submit" class="btn btn-primary" value="Cari Data">
                </form>




                <a class="btn btn-success" href="{{ route('barang_masuk.create') }}">Tambah Data</a>
                <p></p>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Tanggal Masuk</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        {{-- @foreach ($sums as $sum) --}}
                        <tr align="center">
                            <th colspan="5">Total Transaksi Barang Masuk</th>
                            <th colspan="2">{{ $sums }}</th>
                        </tr>
                        {{-- @endforeach --}}
                    </tfoot>
                    <tbody>
                        @foreach ($barangmasuks as $barangmasuk)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $barangmasuk->nm_barang }}</td>
                                <td>{{ $barangmasuk->harga }}</td>
                                <td>{{ $barangmasuk->tgl_masuk }}</td>
                                <td>{{ $barangmasuk->jumlah }}</td>
                                <td>{{ $barangmasuk->total }}</td>
                                <td>
                                    <form action="{{ route('barang_masuk.destroy', $barangmasuk->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a class="btn btn-warning"
                                            href="{{ route('barang_masuk.edit', $barangmasuk->id) }}">Edit</a>

                                        <button type="submit" class="btn btn-danger"
                                            onclick="Javascript:return confirm('Apakah anda ingin menghapus data ini?')">Hapus
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
