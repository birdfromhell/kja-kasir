<?php

namespace App\Repository\DetailSj;

use App\Http\Requests\Storedetail_sjRequest;
use App\Http\Requests\Updatedetail_sjRequest;
use App\Models\detail_sj;
use Exception;
use Illuminate\Http\Request;

class DetailSjRepository
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Storedetail_sjRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(detail_sj $detail_sj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id_sj)
    {
        $request->validate([
            'id.*' => 'required',
            'barang_id.*' => 'required',
            'nama_barang.*' => 'required',
            'stok.*' => 'required',
            'harga.*' => 'required',
            'diskon.*' => 'required',
            'total_harga.*' => 'required',
        ]);
        try {
            $ids = $request->input('id');
            $barang_id = $request->input('barang_id');
            $nama_barang = $request->input('nama_barang');
            $stok = $request->input('stok');
            $harga = $request->input('harga');
            $potongan = $request->input('potongan');
            $diskon = $request->input('diskon');
            // $total_harga = $request->input('total_harga');

            foreach ($ids as $key => $value) {
                $data = [
                    'barang_id' => $barang_id[$key],
                    'nama_barang' => $nama_barang[$key],
                    'stok' => $stok[$key],
                    'harga' => $harga[$key],
                    'potongan' => $potongan[$key],
                    'diskon' => $diskon[$key],
                    'total_harga' => $stok[$key] * $harga[$key],
                ];

                detail_sj::where('id_pb', $id_sj)->where('id', $value)->update($data);
            }
            // dd($value);

            return redirect()->back()->with('success', 'Data berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan.');
        }



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatedetail_sjRequest $request, detail_sj $detail_sj)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detail_sj $detail_sj)
    {
        //
    }
}
