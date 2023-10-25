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

	<h1>Edit Siswa</h1>
	<a href="{{ route('siswa.index') }}">Kembali</a><br><br>

	<form action="{{ route('siswa.update', $siswas->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<label>Nama Siswa</label><br>
		<input type="text" name="nama" value="{{ old('nama', $siswas->nama) }}"> <br><br>
		<label>JK</label><br>
		<select name="jk" required>
			<option>Pilih JK</option>
			<option {{ 'Laki-laki' == $siswas->jk ? 'selected' : '' }} value="Laki-laki">Laki-laki</option>
			<option {{ 'Perempuan' == $siswas->jk ? 'selected' : '' }} value="Perempuan">Perempuan</option>
		</select>
		<br><br>
		<label>Kelas</label><br>
		<select name="kelas" required>
			<option>Pilih Kelas</option>
			<option {{ '10' == $siswas->kelas ? 'selected' : '' }} value="10">10</option>
			<option {{ '11' == $siswas->kelas ? 'selected' : '' }} value="11">11</option>
			<option {{ '12' == $siswas->kelas ? 'selected' : '' }} value="12">12</option>
		</select>
		<br><br>
		<label>Jurusan</label><br>
		<select name="jurusan" required>
			<!-- <option>Pilih jurusan</option>
			<option {{ 'RPL' == $siswas->jurusan ? 'selected' : '' }} value="RPL">RPL</option>
			<option {{ 'TKJ' == $siswas->jurusan ? 'selected' : '' }} value="TKJ">TKJ</option>
			<option {{ 'TKR' == $siswas->jurusan ? 'selected' : '' }} value="TKR">TKR</option> -->
			<option>Pilih jurusan</option>
			@foreach ($jurusans as $user) {
			    <option {{ $user->id_jurusan == $siswas->jurusan ? 'selected' : '' }} value="{{$user->id_jurusan;}}">{{$user->nama_jurusan;}}</option>
			}
			@endforeach
		</select>
		<br><br>
		<label>Foto Siswa</label><br>
		<input type="file" name="image">
		<br><br>
		<button type="submit">SIMPAN DATA</button>
		<button type="reset">RESET FORM</button>
	</form>

	

</body>
</html>

