<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Siswa</title>
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
		<h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
		<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>NISN</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Alamat</th>
				<th>No Telepon</th>
				<th>Tahun Ajaran</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
            @foreach($siswa_putri as $sis_putri)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$sis_putri->nisn}}</td>
                <td>{{$sis_putri->nis}}</td>
                <td>{{$sis_putri->nama}}</td>
                <td>{{$sis_putri->putri_kelas->nama_kelas}} {{$sis_putri->putri_kelas->kejuruan_putri->nama_jurusan}}</td>
                <td>{{$sis_putri->alamat}}</td>
                <td>{{$sis_putri->no_telp}}</td>
                <td>{{$sis_putri->putri_spp->tahun}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>