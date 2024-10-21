<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class rombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        // Tampilkan data rombel yang sesuai dengan user_id
        $rombels = Rombel::where('user_id', $userId)->withCount('siswas')->orderBy('rombel', 'ASC')->get();

        return view('siswa.rombel.class', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.rombel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombel' => [
                'required',
                'string',
                'max:255',
            Rule::unique('rombels')->where(function ($query)  {
                    return $query->where('user_id', Auth::id());
                }),
            ],
        ]);

        $user = Auth::user();

        // Simpan data rombel
        $rombel = new Rombel();
        $rombel->rombel = $request->input('rombel');
        $rombel->user_id = $user->id; // Simpan user_id dari pengguna yang sedang login
        $rombel->save();

        return redirect()->route('rombel.data-rombel')
            ->with('success', 'Rombel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($rombel)
    {
        $rombel = Rombel::with('siswas')->findOrFail($rombel);
        $siswas = Siswa::all(); // Fetch all students
        return view('siswa.rombel.show', compact('rombel', 'siswas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rombel = Rombel::findOrFail($id);
        return view('siswa.rombel.edit', compact('rombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rombel' => 'required|string|max:255|unique:rombels,rombel,' . $id,
        ]);

        $user = Auth::user();

        $rombel = Rombel::findOrFail($id);
        $newRombelName = $request->input('rombel');

        $rombel->rombel = $newRombelName;
        $rombel->user_id = $user->id;
        $rombel->save();

        // Update rombel name for all associated students
        Siswa::where('rombel_id', $id)->update(['rombel' => $newRombelName]);

        return redirect()->route('rombel.data-rombel')
            ->with('success', 'Rombel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rombel = Rombel::findOrFail($id);
        $rombel->delete();

        return redirect()->route('rombel.data-rombel')
            ->with('success', 'Rombel deleted successfully.');
    }

    public function addSiswa(Request $request, $id)
    {
        $request->validate([
            'siswas' => 'required|array',
            'siswas.*' => 'exists:siswas,id', // Validate that the selected IDs exist
        ]);

        // Update the selected students to set their rombel_id and replace rombel at tabel siswas with rombel at tabel rombel
        foreach ($request->siswas as $siswaId) {
            $siswa = Siswa::find($siswaId);
            $rombel = Rombel::find($id);
            $siswa->rombel_id = $id; // Set the rombel_id for the student
            $siswa->rombel = $rombel->rombel; // Set the rombel name for the student
            $siswa->save(); // Save the changes
        }

        return redirect()->route('rombel.data-rombel')
            ->with('success', 'Siswa added to Rombel successfully.');
    }

    // In your rombelController 
}
