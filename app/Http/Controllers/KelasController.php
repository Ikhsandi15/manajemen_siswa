<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    public function kelasTanpaSiswa()
    {
        $kelas = Kelas::doesntHave('siswa')->get();

        // sama aja kaya ini:
        // $kelas = DB::table('kelas')
        //     ->leftJoin('siswa', 'kelas.kelas_id', '=', 'siswa.kelas_id')
        //     ->whereNull('siswa.id')
        //     ->select('kelas.nama as nama_kelas')
        //     ->get();

        return view('kelas.tanpaSiswa', compact('kelas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('kelas.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        kelas::create($request->all());
        return redirect()->route('kelas.index')
            ->with('success', 'kelas berhasil ditambahkan');
    }

    public function show(Kelas $kelas)
    {
        return view('kelas.show', compact('kelas'));
    }

    public function edit(Kelas $kelas)
    {
        $kelas = Kelas::all();
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'kelas berhasil diupdate');
    }

    public function destroy(Kelas $kelas)
    {
        if ($kelas->siswa()->exists()) {
            return redirect()->route('kelas.index')->with('error', 'kelas tidak dapat dihapus karena masih memiliki siswa terkait');
        }

        $kelas->delete();

        return redirect()->route('kelas.index')
            ->with('success', 'kelas berhasil dihapus');
    }
}
