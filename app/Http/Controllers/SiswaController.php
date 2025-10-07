<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource (READ)
     */
    public function index(Request $request)
    {
        $query = Siswa::query();

        // Pencarian berdasarkan nama atau NISN
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_siswa', 'LIKE', '%' . $search . '%')
                    ->orWhere('nisn', 'LIKE', '%' . $search . '%');
            });
        }

        // Default sorting berdasarkan nama
        $siswa = $query->orderBy('nama_siswa', 'asc')->paginate(10)->appends($request->query());

        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage (CREATE)
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'required|string|max:10|unique:siswa,nisn',
            'nama_siswa' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'telepon' => 'nullable|string|max:15',
            'kelas' => 'required|in:XII-RPL,XII-TKJ,XII-DKV,XII-MKT,XII-APHP,XII-ATPH,XII-TPM,XII-TL,XII-TBKR,XII-TKR',
        ], [
            'nisn.required' => 'NISN wajib diisi',
            'nisn.unique' => 'NISN sudah terdaftar',
            'nama_siswa.required' => 'Nama siswa wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'jenis_kelamin.in' => 'Jenis kelamin harus L atau P',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid',
            'alamat.required' => 'Alamat wajib diisi',
            'kelas.required' => 'Kelas wajib dipilih',
            'kelas.in' => 'Kelas dpilih sesuai jurusan',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            Siswa::create($request->all());
            return redirect()->route('siswa.index')
                ->with('success', 'Data siswa berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data')
                ->withInput();
        }
    }

    /**
     * Display the specified resource (DETAIL)
     */
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage (UPDATE)
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'required|string|max:10|unique:siswa,nisn,' . $siswa->id,
            'nama_siswa' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'telepon' => 'nullable|string|max:15',
            'kelas' => 'required|in:XII-RPL,XII-TKJ,XII-DKV,XII-MKT,XII-APHP,XII-ATPH,XII-TPM,XII-TL,XII-TBKR,XII-TKR',
        ], [
            'nisn.required' => 'NISN wajib diisi',
            'nisn.unique' => 'NISN sudah terdaftar',
            'nama_siswa.required' => 'Nama siswa wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'jenis_kelamin.in' => 'Jenis kelamin harus L atau P',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid',
            'alamat.required' => 'Alamat wajib diisi',
            'kelas.required' => 'Kelas wajib dipilih',
            'kelas.in' => 'Kelas dpilih sesuai jurusan',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $siswa->update($request->all());
            return redirect()->route('siswa.index')
                ->with('success', 'Data siswa berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat mengupdate data')
                ->withInput();
        }
    }

    // Delete Data (Soft Delete)
    public function destroy(Siswa $siswa)
    {
        try {
            $siswa->delete();
            return redirect()->route('siswa.index')
                ->with('success', 'Data siswa berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('siswa.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data');
        }
    }
}
