<?php

namespace App\Http\Controllers;

use App\Models\Drainase;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrainaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $res = Drainase::select('drainase.*', 'ref_kecamatan.nama_kecamatan', 'ref_kelurahan.nama_kelurahan')
                ->join('ref_kecamatan', 'drainase.kode_kec', '=', 'ref_kecamatan.id_kecamatan')
                ->join('ref_kelurahan', 'drainase.kode_kel', '=', 'ref_kelurahan.id_kelurahan')
                ->get();
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 400);
        }
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
        try {
            $res = Drainase::create($request->all());
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Drainase $drainase, $id)
    {
        try {
            $res = $drainase->findOrFail($id);
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drainase $drainase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drainase $drainase, $id)
    {
        try {
            $res = $drainase->findOrFail($id)->update($request->all());
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drainase $drainase, $id)
    {
        try {
            $res = $drainase->findOrFail($id)->delete();
            return response()->json($res);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 400);
        }
    }
}
