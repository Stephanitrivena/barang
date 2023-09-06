@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary" align="center">DATA BARANG MASUK</h6>
                </div>
                <div class="card-body">

                    <form class="user" action="{{ route('barang_masuk.store') }}" method="POST"> {{ csrf_field() }}

                        <div class="form-group">
                            <Label>Nama Barang :</Label>
                            <select class="form-control" name="id_barang" id="id_barang" onchange="changeValue(this.value)">
                                <option>~pilih nama barang~</option>
                                <?php
                                $jsArray = "var prdName = new Array();\n";
                                ?>
                                @foreach ($bahanbakus as $bahanbaku)
                                    <option value="{{ $bahanbaku->id }}">{{ $bahanbaku->nm_barang }}</option>
                                    <?php
                                    $jsArray .= "prdName['" . $bahanbaku->id . "'] = { harga:'" . addslashes($bahanbaku->harga) . "',stok:'" . addslashes($bahanbaku->stok) . "'};\n";
                                    ?>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <Label>Harga Barang :</Label>
                            <input type="text" class="form-control" name="harga" id="harga" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <Label>Stok Barang :</Label>
                            <input type="text" class="form-control" name="stok" id="stok" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <Label>Tanggal Barang Masuk :</Label>
                            <input type="date" class="form-control" name="tgl_masuk">
                        </div>

                        <div class="form-group">
                            <Label>Jumlah Barang Masuk :</Label>
                            <input type="number" class="form-control" name="jumlah">
                        </div>

                        <center><input type="submit" class="btn btn-primary" value="Simpan Data" />
                            <a href="{{ route('bahanbaku.index') }}" class="btn btn-primary">Kembali</a>
                        </center>

                    </form>

                </div>
            </div>
        </div>

    </div>
    <script>
        <?php echo $jsArray; ?>

        function changeValue(x) {
            document.getElementById('harga').value = prdName[x].harga;
            document.getElementById('stok').value = prdName[x].stok;
        }
    </script>
@endsection
