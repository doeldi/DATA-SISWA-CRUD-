<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use App\Models\Siswa;
use Illuminate\Http\Request;

class rombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombels = Rombel::withCount('siswas')->orderBy('rombel', 'ASC')->get();
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
            'rombel' => 'required',
        ]);

        Rombel::create($request->all());

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
            'rombel' => 'required',
        ]);

        $rombel = Rombel::findOrFail($id);
        $rombel->update($request->all());

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
