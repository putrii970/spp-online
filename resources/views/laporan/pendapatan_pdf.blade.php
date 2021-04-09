<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pendapatan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Pendapatan</h4>
	</center>
    <?php $pend_putri = 0 ?>

	<table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Nominal</th>
                <th>Bulan Dibayar</th>
                <th>Tanggal Bayar</th>
                <th>Tahun Dibayar</th>
                <th>Jumlah Bayar</th>
            </tr>
        </thead>
        <?php $i = 1;?>
        @foreach($pendapatan_putri as $pen_putri)
        <tbody>
            <tr>
                <td>{{$i}}</td>
                <td>{{$pen_putri->putri_siswa->nisn}}</td>
                <td>{{$pen_putri->putri_siswa->nama}}</td>
                <td>{{$pen_putri->spp_putri->tahun}}</td>
                <td>{{$pen_putri->bulan_dibayar}}</td>
                <td>{{$pen_putri->tgl_bayar}}</td>
                <td>{{$pen_putri->tahun_dibayar}}</td>
                <td>@currency($pen_putri->jumlah_bayar)</td>
            </tr>
        <?php $i++; ?>
                <?php $pend_putri+= $pen_putri->jumlah_bayar;?>
        @endforeach
        </tbody>
                <td colspan="7" style="text-align: right;" ><b>Total Pendapatan : </b></td>
                <td style="text-align: center;"><b>@currency($pend_putri)</b></td>
	</table>

</body>
</html>