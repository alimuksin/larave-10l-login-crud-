<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Latihan Laravel 10</title>
	<style type="text/css">
		table {
		  	border-collapse: collapse;
		  	margin: 20px 0px;
		  	text-align: left;
		}
		table, th, td{
			border: 1px solid;
			text-align: left;
			padding-right: 20px;
		}
	</style>
</head>
<body>

	<h1>Detail Siswa</h1>
	<a href="{{ route('siswa.index') }}">Kembali</a>


	<table>
		<tr>
			<td colspan="3" style="text-align: center;"><img src="{{ asset('storage/siswas/'.$siswa->foto) }}" width="120px" hight="120px" alt=""></td>
		</tr>
		<tr>
			<th>Nama</th>
			<td>: {{ $siswa->nama }}</td>
		</tr>
		<tr>
			<th>Jenis Kelamin</th>
			<td>: {{ $siswa->jk }}</td>
		</tr>
		<tr>
			<th>Kelas</th>
			<td>: {{ $siswa->kelas }}</td>
		</tr>
		<tr>
			<th>Jurusan</th>
			<td>: {{ $siswa->nama_jurusan }}</td>
		</tr>
	</table>

	

</body>
</html>

<script>
	//message with toastr
    @if(session()->has('success'))

    alert('{{ session('success') }}');
        

    @elseif(session()->has('error'))

     alert('{{ session('error') }}')
            
    @endif
</script>