<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rumahsakits = RumahSakit::all();
        return view('rumah-sakit.rumah-sakit', compact('rumahsakits'));
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
            'nama_rumah_sakit' => 'required|string|max:200',
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required|numeric',
        ]);


        $rumah_sakit = RumahSakit::create([
            'nama_rumah_sakit' => $request->nama_rumah_sakit,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon,
        ]);

        if ($rumah_sakit) {
            return redirect()->back()->with(['success' => 'Rumah Sakit berhasil ditambahkan']);
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
            'nama_rumah_sakit' => 'required|string|max:200',
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required|numeric',
        ]);

        $rumah_sakit = RumahSakit::findOrFail($id);

        $rumah_sakit->nama_rumah_sakit = $request->nama_rumah_sakit;
        $rumah_sakit->alamat = $request->alamat;
        $rumah_sakit->email = $request->email;
        $rumah_sakit->telepon = $request->telepon;
        $rumah_sakit->save();

        if ($rumah_sakit) {
            return redirect()->back()->with(['success' => 'Rumah Sakit berhasil diedit']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rumah_sakit = RumahSakit::where('id', $id)->first();
        $rumah_sakit->delete();

        return response()->json($rumah_sakit, 200);
    }
}