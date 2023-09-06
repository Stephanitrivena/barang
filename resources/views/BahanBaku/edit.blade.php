@extends('layout')
@section('content')
<div class="row">
<div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">UPDATE DATA BAHAN BAKU</h6>
                </div>
                <div class="card-body">
			
                
                <form class="user" action="{{ route('bahanbaku.update', $bahanbaku->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')



                        <div class="form-group">
                            <Label>Kode Barang :</Label>
                            <input type="text" class="form-control" name="kd_barang" value="{{ $bahanbaku->kd_barang }}">
                        </div>
 
                        <div class="form-group">
                            <Label>Nama Barang :</Label>
                            <input type="text" class="form-control" name="nm_barang" value="{{ $bahanbaku->nm_barang }}">
                        </div>
 
                        <div class="form-group">
                            <Label>Stok Barang :</Label>
                            <input type="text" class="form-control" name="stok" value="{{ $bahanbaku->stok }}">
                        </div>
 
                        <div class="form-group">
                            <Label>Harga Barang :</Label>
                            <input type="text" class="form-control" name="harga" value="{{ $bahanbaku->harga }}">
                        </div>
 
                        <div class="form-group">
                            <Label>Keterangan :</Label>
                            <textarea class="form-control" name="ket"> {{ $bahanbaku->ket }} </textarea>
                        </div>
                        <div class="form-group">
                            <Label>Gambar Barang :</Label>
                            <img src="{{ url('data_file/' . $bahanbaku->gambar) }}" alt="Gambar Barang"
                                style="width: 200px;">
                            <input type="file" class="form-control" name="gambar">
                        </div>
                        <center>
                            <input type="submit" class="btn btn-primary" value="Update Data" />
                            <a href="{{ route('bahanbaku.index') }}" class="btn btn-primary">Kembali</a>
                        </center>
                    </form>
                  
                </div>
              </div>
            </div>

</div>
@endsection