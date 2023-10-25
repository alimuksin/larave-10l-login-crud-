<?php
namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        //get Data db
        // $siswas = Siswa::latest()->paginate(5);
        
        // return view('siswa.index', compact('siswas'));
        $siswas = Siswa::Join("jurusans", function ($join) {
          
            $join->on("jurusans.id_jurusan", "=", "siswas.jurusan");
          
        })->paginate(5);

        return view('siswa.index', compact('siswas'));
    }

    public function create(): View
    {
        $jurusans = DB::table('jurusans')->get();
        return view('siswa.create', ['jurusans' => $jurusans]);
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama'      => 'required|min:3',
            'jk'        => 'required',
            'image'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'jurusan'   => 'required',
            'kelas'     => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/siswas', $image->hashName());

        //create post
        Siswa::create([
            'nama'      => $request->nama,
            'jk'        => $request->jk,
            'jurusan'   => $request->jurusan,
            'kelas'     => $request->kelas,
            'foto'      => $image->hashName()
        ]);

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        // $siswa = Siswa::findOrFail($id);

        // $siswa = DB::table('siswas')->where('id', $id)->first();
        $siswa = Siswa::Join('jurusans','jurusans.id_jurusan','=','siswas.jurusan')->select('siswas.*','jurusans.*')->where('siswas.id', $id)->first();
        
       

        return view('siswa.show', compact('siswa'));


    }

    public function edit(string $id): View
    {
        //get post by ID
        $siswas = Siswa::findOrFail($id);

        $jurusans = DB::table('jurusans')->get();
        

        //render view with post
        // return view('siswa.edit', compact('siswas'));
        return view('siswa.edit', ['jurusans' => $jurusans, 'siswas' => $siswas]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama'      => 'required|min:3',
            'jk'        => 'required',
            'image'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'jurusan'   => 'required',
            'kelas'     => 'required',
        ]);
        //get post by ID
        $datas = Siswa::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/siswas', $image->hashName());
            //delete old image
            Storage::delete('public/siswas/'.$datas->image);
            //update post with new image
            $datas->update([
                'nama'      => $request->nama,
                'jk'        => $request->jk,
                'jurusan'   => $request->jurusan,
                'kelas'     => $request->kelas,
                'foto'      => $image->hashName()
            ]);
        } else {

            //update post without image
            $datas->update([
                'nama'      => $request->nama,
                'jk'        => $request->jk,
                'jurusan'   => $request->jurusan,
                'kelas'     => $request->kelas
            ]);
        }
        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    
    // Hapus data
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Siswa::findOrFail($id);

        //delete image
        Storage::delete('public/siswas/'. $post->foto);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
