<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rumahsakits = RumahSakit::all();
        $pasiens = Pasien::with('rumahsakit')->latest()->get();

        return view('pasien.pasien', compact('rumahsakits', 'pasiens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_pasien' => 'required|string|max:200',
            'alamat' => 'required',
            'no_telepon' => 'required|numeric',
            'id_rumah_sakit' => 'required',
        ]);

        $pasien = Pasien::create([
            'nama_pasien' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'id_rumah_sakit' => $request->id_rumah_sakit,
        ]);

        // dd($pasien);
        if ($pasien) {
            return redirect()->back()->with(['success' => 'Pasien berhasil ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:200',
            'alamat' => 'required',
            'no_telepon' => 'required|numeric',
            'id_rumah_sakit' => 'required',
        ]);

        $pasien = Pasien::findOrFail($id);

        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->alamat = $request->alamat;
        $pasien->no_telepon = $request->no_telepon;
        $pasien->id_rumah_sakit = $request->id_rumah_sakit;
        $pasien->save();

        if ($pasien) {
            return redirect()->back()->with(['success' => 'Pasien berhasil diedit']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::where('id', $id)->first();
        $pasien->delete();

        return response()->json($pasien, 200);
    }

    public function filterPasien(string $id_rumah_sakit)
    {
        $id_rumah_sakit = $id_rumah_sakit;

        $pasiens = Pasien::with('rumahsakit')->whereHas('rumahsakit', function (Builder $query) use ($id_rumah_sakit) {
            $query->where('id_rumah_sakit', $id_rumah_sakit);
        })->get();

        return response()->json($pasiens, 200);
    }

    public function notFilterPasien()
    {
        $pasiens = Pasien::with('rumahsakit')->latest()->get();
        return response()->json($pasiens, 200);
        // return response()->json(['data' => $pasiens]);
    }
}