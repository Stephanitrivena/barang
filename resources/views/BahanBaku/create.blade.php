@extends('layout')
@section('content')
<div class="row">
<div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">DATA BAHAN BAKU</h6>
                </div>
                <div class="card-body">
				
<form class="user" action="{{ route('bahanbaku.store') }}" method="POST" enctype="multipart/form-data"> {{ csrf_field() }}
          
                    <div class="form-group">
                          <Label>Kode Barang :</Label>
                          <input type="text" class="form-control" name="kd_barang">
                    </div>

                    <div class="form-group">
                          <Label>Nama Barang :</Label>
                          <input type="text" class="form-control" name="nm_barang">
                    </div>

                    <div class="form-group">
                          <Label>Stok Barang :</Label>
                          <input type="text" class="form-control" name="stok">
                    </div>

                    <div class="form-group">
                          <Label>Harga Barang :</Label>
                          <input type="text" class="form-control" name="harga">
                    </div>

                    <div class="form-group">
                          <Label>Keterangan :</Label>
                          <textarea class="form-control" name="ket"></textarea>
                    </div>

                    <div class="form-group">
                          <Label>Gambar Produk :</Label>
                          <input type="file" class="form-control" name="gambar">
                    </div>
          
          <center><input type="submit" class="btn btn-primary" value="Simpan Data" />
          <a href="{{ route('bahanbaku.index') }}" class="btn btn-primary">Kembali</a>
        </center>
                    
                  </form>
                  
                </div>
              </div>
            </div>

</div>
@endsection