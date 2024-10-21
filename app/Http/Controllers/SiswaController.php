<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = Auth::id();
        $search = $request->search_siswa;

        $siswas = Siswa::where('user_id', $userId)
            ->where('nama', 'LIKE', "%{$search}%")
            ->orderBy('nama', 'asc')
            ->simplePaginate(5);

        return view('siswa.index', compact('siswas', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validasi input, termasuk validasi NIS unik per pengguna yang sedang login
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nis' => [
                'required',
                'string',
                'max:255',
                Rule::unique('siswas')->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                }),
            ],
            'nama' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('siswas')->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                }),
            ],
            'rombel' => 'required|string|max:255',
            'rayon' => 'required|string|max:255',
        ], [
            'nis.unique' => 'NIS sudah digunakan untuk siswa lain.',
            'email.unique' => 'Email sudah digunakan untuk siswa lain.',
        ]);

        // Ambil ID pengguna yang sedang login
        $user = Auth::id();

        // Simpan data siswa
        $siswa = new Siswa();
        $siswa->user_id = $user;

        if ($request->hasFile('foto')) {
            $siswa->foto = $request->file('foto')->store('public/image');
        }

        $siswa->nis = $request->input('nis');
        $siswa->nama = $request->input('nama');
        $siswa->email = $request->input('email');
        $siswa->rombel = $request->input('rombel');
        $siswa->rayon = $request->input('rayon');
        $siswa->save();

        // Cek apakah rombel sudah ada di tabel rombel, jika ya, simpan rombel_id di tabel siswa
        $rombel = Rombel::where('rombel', $siswa->rombel)->first();
        if ($rombel) {
            $siswa->rombel_id = $rombel->id;
            $siswa->save();
        }

        return redirect()->route('siswa.index')->with('success', 'Data Siswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate(
            [
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nis' => 'required|string|max:255|unique:siswas,nis,' . $id,
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:siswas,email,' . $id,
                'rombel' => 'required|string|max:255',
                'rayon' => 'required|string|max:255',
            ]
        );

        $user = Auth::user();

        // Update data siswa
        $siswa = Siswa::find($id);
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($siswa->foto) {
                Storage::delete($siswa->foto);
            }
            $siswa->foto = $request->file('foto')->store('public/image');
        }
        $siswa->user_id = $user->id;
        $siswa->nis = $request->input('nis');
        $siswa->nama = $request->input('nama');
        $siswa->email = $request->input('email');
        $siswa->rombel = $request->input('rombel');
        $siswa->rayon = $request->input('rayon');
        $siswa->save();

        $rombel = Rombel::where('rombel', $siswa->rombel)->first();
        if ($rombel) {
            $siswa->rombel_id = $rombel->id; // Set the rombel_id for the student
            $siswa->save(); // Save the changes
        }

        return redirect()->route('siswa.index')->with('success', 'Data Siswa Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        if ($siswa) {
            // Hapus foto jika ada
            if ($siswa->foto) {
                Storage::delete($siswa->foto);
            }
            $siswa->delete();
            return redirect()->back()->with('deleted', 'Menghapus data siswa!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data siswa!');
        }
    }
}
