<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        $data['success'] = true;
        $data['message'] = 'Data Buku';
        $data['result'] = $buku;
        return response()->json($data,Response::HTTP_OK);
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
        $validate = $request->validate([
            'judul'=>'required|unique:bukus',
            'penulis' =>'required',
            'genre' => 'required',
            'penerbit' =>'required'
        ]);

        $result = Buku::create($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Data Buku Telah Disimpan";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'judul'=>'required'
            // 'penulis' =>'required',

            // 'penerbit' =>'required'

        ]);
        $result = Buku::where('id',$id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Data Buku telah diperbarui";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        if($buku){
            $buku->delete();
            $data['success'] =true;
            $data['message'] = "Data Buku Berhasil di hapus";
            return response()->json($data, Response::HTTP_OK);
        }else{
            $data['success'] = false;
            $data['message'] = "Data Buku tidak berhasil dihapus";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
