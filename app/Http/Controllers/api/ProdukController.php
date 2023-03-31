<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
Use App\Models\produk;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gets=produk::latest()->get();
        return response()->json([
            'succes'=>true,
            'message'=>'list produk',
            'data'=>$gets
        ],200);

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
        //
        $validator = Validator::make($request->all(),[
            'nama_produk' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ],
        [
            'nama_produk.required' => 'masukkan nama produk',
            'kategori.required' => 'masukkan kategori',
            'stok.required' => 'masukkan stok',
            'harga.required' => 'masukkan harga',

        ]
        );

        if($validator->fails()){
            return response() -> json([
                'succes' => false,
                'message' => 'gagal tambah data',
                'data' => $validator->errors()
            ],401);
        }
        else{
            $post = produk::create([
                'nama_produk' => $request->input('nama_produk'),
                'kategori' => $request->input('kategori'),
                'stok' => $request->input('stok'),
                'harga' => $request->input('harga')

            ]);
            if($post){
                return response()->json([
                    'succes'=>true,
                    'message'=>'data tersimpan',
                    'data'=> $post
                ],200);
            }else{
                return response()->json([
                    'succes'=>false,
                    'message'=>'data gagal tersimpan',
                    'data'=> 'gagal'
                ],401);
            }
        }
    }

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
    public function update_single(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'nama_produk' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ],
        [
            'nama_produk.required' => 'masukkan nama produk',
            'kategori.required' => 'masukkan kategori',
            'stok.required' => 'masukkan stok',
            'harga.required' => 'masukkan harga',

        ]
        );

        if($validator->fails()){
            return response() -> json([
                'succes' => false,
                'message' => 'gagal tambah data',
                'data' => $validator->errors()
            ],401);
        } 
        else {
            $update = produk::where('id',$request->input('id'))->update([
                'nama_produk' => $request->input('nama_produk'),
                'kategori' => $request->input('kategori'),
                'stok' => $request->input('stok'),
                'harga' => $request->input('harga')
            ]);
            if($update){
                return response()->json([
                    'succes'=>true,
                    'message'=>'data update',
                    'data'=> $update
                ],200);
            }else{
                return response()->json([
                    'succes'=>false,
                    'message'=>'data gagal update',
                    'data'=> 'gagal'
                ],401);
            }
           
        }
    }
    

    //bundle
    public function update(Request $request,$produk)
    {
        //
        $validator = Validator::make($request->all(),[
            'nama_produk' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ],
        [
            'nama_produk.required' => 'masukkan nama produk',
            'kategori.required' => 'masukkan kategori',
            'stok.required' => 'masukkan stok',
            'harga.required' => 'masukkan harga',

        ]
        );

        if($validator->fails()){
            return response() -> json([
                'succes' => false,
                'message' => 'gagal tambah data',
                'data' => $validator->errors()
            ],401);
        } 
        else {
            $update = produk::where('id',$request->input('id'))->update([
                'nama_produk' => $request->input('nama_produk'),
                'kategori' => $request->input('kategori'),
                'stok' => $request->input('stok'),
                'harga' => $request->input('harga')
            ]);
            if($update){
                return response()->json([
                    'succes'=>true,
                    'message'=>'data update',
                    'data'=> $update
                ],200);
            }else{
                return response()->json([
                    'succes'=>false,
                    'message'=>'data gagal update',
                    'data'=> 'gagal'
                ],401);
            }
           
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_single(Request $request)
    {
        //
        $hapus = produk::where('id',$request->input('id'));
        if($hapus){
            $hapus->delete();
            return response()->json([
                'succes'=>true,
                'message'=>'data hapus',
                'data'=> 'berhasil hapus'
            ],200);
        }else{
            return response()->json([
                'succes'=>false,
                'message'=>'data hapus',
                'data'=> 'gagal hapus'
            ],200);
        }

    }

    //bundle
    public function destroy(Request $request,$produk)
    {
        //
        $hapus = produk::where('id',$produk);
        if($hapus){
            $hapus->delete();
            return response()->json([
                'succes'=>true,
                'message'=>'data hapus',
                'data'=>  "berhasil hapus"
            ],200);
        }else{
            return response()->json([
                'succes'=>false,
                'message'=>'data hapus',
                'data'=> 'gagal hapus'
            ],200);
        }

    }

}
