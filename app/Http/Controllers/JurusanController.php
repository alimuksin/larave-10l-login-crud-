<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class JurusanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(): View
    {
        //get Data db
        $jurusans = Jurusan::latest()->paginate(5);
        return view('jurusan.index', compact('jurusans'));
    }

    public function create(): View
    {
        return view('jurusan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_jurusan'      => 'required|min:3',
        ]);

        //create post
        jurusan::create([
            'nama_jurusan'      => $request->nama_jurusan,
        ]);

        //redirect to index
        return redirect()->route('jurusan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id_jurusan): View
    {
        //get post by ID
        $jurusans = DB::table('jurusans')
                ->where('id_jurusan', '=', $id_jurusan)
                ->select('id_jurusan','nama_jurusan')
                ->get();

        //render view with post
        return view('jurusan.show', compact('jurusans'));
    }

    public function edit(string $id_jurusan): View
    {
        //get post by ID
        $jurusans = Jurusan::findOrFail($id_jurusan);

        //render view with post
        return view('jurusan.edit', compact('jurusans'));
    }

    public function update(Request $request, $id_jurusan): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_jurusan'      => 'required|min:3',
        ]);
        //get post by ID
        $datas = Jurusan::findOrFail($id_jurusan);

       $datas->update([
            'nama_jurusan'      => $request->nama_jurusan,
        ]);
        //redirect to index
        return redirect()->route('jurusan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    
    // Hapus data
    public function destroy($id_jurusan): RedirectResponse
    {
        //get post by ID
        $post = Jurusan::findOrFail($id_jurusan);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('jurusan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
