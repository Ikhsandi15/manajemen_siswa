<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Siswa; // Tambahkan ini

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('kelas')->get();
        return view('siswa.index', compact('siswas'));

        // sama aja kaya ini:
        // $siswas = DB::table('siswa')
        //     ->join('kelas', 'siswa.kelas_id', '=', 'kelas.id')
        //     ->select('siswa.nama as nama_siswa', 'kelas.nama as nama_kelas')
        //     ->get();
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|integer|unique:siswa,nis|min:6',
            'tanggal_lahir' => 'required',
            'kelas_id' => 'required'
        ]);

        Siswa::create($request->all());
        return redirect()->route('siswas.index')
            ->with('success', 'siswa berhasil ditambahkan');
    }

    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        $siswa = Siswa::with('kelas')->first();
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswas.index')
            ->with('success', 'siswa berhasil diupdate');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswas.index')
            ->with('success', 'siswa berhasil dihapus');
    }
}
