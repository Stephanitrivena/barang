<body onload="javascript:window.print()" style="margin:0 auto; width: 1000px;">
<div style="margin-left:20px"></div>

<!-- <img src="{{ asset('Assets/Image/logo.png') }}" style="width: 10%; float: left;"> -->
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td><div align="center"><font size="7">PT. ANGIN RIBUT</font></div></td>
</tr>
<tr>
	<td><div align="center"><font size="5">Jl. Ciremai Raya No. 04, Kecapi, Harjamukti, Cirebon, Jawa Barat</font></div></td>
</tr>
<tr>
	<td><div align="center"><font size="4" color="blue">No. Telp 0752(23456), E-Mail : maju.mundur@gmail.com</font></div></td>
</tr>	
</table><br><hr>

<label><center><font size="6">LAPORAN PERSEDIAAN BARANG</font></center></label>


<table style="border: 1px solid gray;" width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<th style="border: 1px solid gray; padding: 3px 5px;">No</th>
    <th style="border: 1px solid gray; padding: 3px 5px;">Foto</th>
    <th style="border: 1px solid gray; padding: 3px 5px;">Kode Barang</th>
    <th style="border: 1px solid gray; padding: 3px 5px;">Nama Barang</th>
    <th style="border: 1px solid gray; padding: 3px 5px;">Stok</th>
    <th style="border: 1px solid gray; padding: 3px 5px;">Harga</th>
    <th style="border: 1px solid gray; padding: 3px 5px;">Keterangan</th>
	</tr>
    @foreach($bahanbakus as $bahanbaku)
    <tr>
    <td style="border: 1px solid gray; padding: 3px 5px;">{{ ++$i }}</td>
    <td style="border: 1px solid gray; padding: 3px 5px;"><img src="{{ url('/data_file/'.$bahanbaku->gambar) }}" width="150px" height="150px"> </td>
    <td style="border: 1px solid gray; padding: 3px 5px;">{{ $bahanbaku->kd_barang }}</td>
    <td style="border: 1px solid gray; padding: 3px 5px;">{{ $bahanbaku->nm_barang }}</td>
    <td style="border: 1px solid gray; padding: 3px 5px;">{{ $bahanbaku->stok }}</td>
    <td style="border: 1px solid gray; padding: 3px 5px;">{{ $bahanbaku->harga }}</td>
    <td style="border: 1px solid gray; padding: 3px 5px;">{{ $bahanbaku->ket }}</td>
    </tr>
    @endforeach
	
</table>

<p>&nbsp;</p>

<table align="right" cellpadding="0" cellspacing="0">
	<tr>
		<td><center>Cirebon, <?php echo date("d F Y"); ?></center></td>
	</tr>
	<tr>
		<td>
		<center>Direktur PT. Angin Ribut</center>
		<p>&nbsp;</p>
		<center>Budi Asep, S.Pdi</center>
		</td>
	</tr>
</table>

</body>