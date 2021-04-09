<!DOCTYPE html>
<html>
<head>
	<title>Laporan Kelas</title>
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
		<h5>Data Kelas</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Kelas</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
            @foreach($kelas_putri as $ke)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$ke->nama_kelas}} {{$ke->kejuruan_putri->nama_jurusan}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>