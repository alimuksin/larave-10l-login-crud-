<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Latihan Laravel 10</title>
	<style type="text/css">
		table {
		  	width: 100%;
		  	border-collapse: collapse;
		  	margin: 20px 0px;
		}
		table, th, td{
			border: 1px solid;
		}
	</style>
</head>
<body>

	<h1>Tambah Jurusan</h1>
	<a href="{{ route('jurusan.index') }}">Kembali</a><br><br>

	<form action="{{ route('jurusan.store') }}" method="POST" enctype="multipart/form-data">
		@csrf <!-- {{ csrf_field() }} -->
		<label>Nama Jurusan</label><br>
		<input type="text" name="nama_jurusan"> <br><br>
		
		<button type="submit">SIMPAN DATA</button>
		<button type="reset">RESET FORM</button>
	</form>

	

</body>
</html>