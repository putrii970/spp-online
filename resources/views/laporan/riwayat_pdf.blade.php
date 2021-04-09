<!DOCTYPE html>
<html>
<head>
	<title>Laporan Riwayat</title>
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
		<h5>Data Riwayat Pembayaran</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
            <tr>
				<th>NISN</th>
				<th>Nama</th>
				<th>Spp Per Bulan</th>
				<th>Jumlah Bulan Dibayar</th>
				<th>Jumlah Bayar</th>
				<th>Tanggal Bayar</th>
				<th>Tahun Ajaran</th>
			</tr>
        </thead>
        @foreach($riwayat_putri as $ri_putri)
        <tbody>
        	<tr>
                <td>{{$ri_putri->putri_siswa->nisn}}</td>
                <td>{{$ri_putri->putri_siswa->nama}}</td>
                <td>@currency($ri_putri->spp_putri->nominal)</td>
                <td>{{$ri_putri->bulan_dibayar}}</td>
                <td>@currency($ri_putri->jumlah_bayar)</td>
                <td>{{$ri_putri->tgl_bayar}}</td>
                <td>{{$ri_putri->spp_putri->tahun}}</td>
            </tr>
		@endforeach
		</tbody>
	</table>

</body>
</html>