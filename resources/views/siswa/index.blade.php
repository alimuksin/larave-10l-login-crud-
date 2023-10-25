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

	<h1>Data Siswa</h1>
	<a href="{{ route('dashboard') }}">Menu Utama</a><br>
	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a>
	<form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
    <br>
	<a href="{{ route('siswa.create') }}">Tambah Siswa</a>

	<table class="tabel">
		<tr>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
		@forelse ($siswas as $siswa)
		<tr>
			<td>{{ $siswa->nama }}</td>
			<td>{{ $siswa->jk }}</td>
			<td>{{ $siswa->kelas }}</td>
			<td>{{ $siswa->nama_jurusan }}</td>
			<td>
				<img src="{{ asset('storage/siswas/'.$siswa->foto) }}" width="120px" hight="120px" alt="">
			</td>
			<td>
				<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
				 	<a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit">HAPUS</button>
                </form>
			</td>
		</tr>
		@empty
		@endforelse
	</table>
	{{ $siswas->links() }}

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

