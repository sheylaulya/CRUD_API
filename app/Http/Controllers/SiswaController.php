<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datasiswa = Siswa::all();

        return response()->json([
            'success' => true,
            'messages' => 'data siswa',
            //ngirim variable statik dalam array
            'data' => $datasiswa
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nama' => 'required',
            'kelas' => 'required',
            'deskripsi' => 'required'
        ]);

        if($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $data = Siswa::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'deskripsi' => $request->deskripsi,
        ]);

        if($data){
            return response()->json([
                'success' =>true,
                'message' => 'Data Berhasil Disimpan!',
                'data' => $data 
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal Disimpan!',
        ], 409);
    }

                //server ke klien :response
                //klien ke server :request

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
