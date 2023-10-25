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
		}
		table, th, td{
			border: 1px solid;
		}
	</style>
</head>
<body>

	<h1>Data Jurusan</h1>
	<a href="{{ route('dashboard') }}">Menu Utama</a><br>
	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a>
	<form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
    <br>
	<a href="{{ route('jurusan.create') }}">Tambah Jurusan</a>

	<table class="tabel">
		<tr>
			<th>Nama</th>
			<th>Aksi</th>
		</tr>
		@forelse ($jurusans as $siswa)
		<tr>
			<td>{{ $siswa->nama_jurusan }}</td>
			<td>
				<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jurusan.destroy', $siswa->id_jurusan) }}" method="POST">  
				 	<a href="{{ route('jurusan.show', $siswa->id_jurusan) }}" class="btn btn-sm btn-dark">SHOW</a>   
                    <a href="{{ route('jurusan.edit', $siswa->id_jurusan) }}" class="btn btn-sm btn-primary">EDIT</a>   
                    @csrf
                    @method('DELETE')
                    <button type="submit">HAPUS</button>
                </form>
			</td>
		</tr>
		@empty
		@endforelse
	</table>
	{{ $jurusans->links() }}

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

