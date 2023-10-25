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
	<a href="{{ route('jurusan.index') }}">Kembali</a>


	<table>
		
		<tr>
			<th>Nama Jurusan</th>
			<td> : {{ $jurusans->nama_jurusan }}</td>
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