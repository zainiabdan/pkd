<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instansi;
use App\User;

use Ramsey\Uuid\Uuid;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instansi = Instansi::get();
        // dd($instansi);
         return view('instansi.index', ['instansi' => $instansi]);
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
         $this->validate($request, [
             'nama_instansi' => 'required',
             'alamat' => 'required'
        ]);
        
        $uuid = Uuid::uuid4();
		$inserted = Instansi::create([
            'id_instansi' => $uuid->getHex(),
            'nama_instansi' => $request->nama_instansi,
            'alamat' => $request->alamat,

		]);
        if($inserted)
            return redirect()->back()->with(['success' => 'Berhasil Memasukkan Data Instansi']);
            else {
                return redirect()->back()->with(['error' => 'Gagal Memasukkan Data Instansi']);
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
        $avl = Instansi::find($id);
        if($avl){
            $instansi = Instansi::where('id_instansi', '=', $id)->get();
            
        return view('instansi.instansi_update',[
                'instansi' => $instansi
            ]);
        }else {
            return redirect('instansi')->with(['warning' => 'Data Instansi tidak ada']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
          $this->validate($request, [
             'id_instansi' => 'required',
             'nama_instansi' => 'required',
             'alamat' => 'required'
        ]);

            $avl=Instansi::find($request->id_instansi);
            if($avl){

            $updated = Instansi::where('id_instansi', '=', $request->id_instansi)->update(
                [
                    'nama_instansi' => $request->nama_instansi,
                    'alamat' => $request->alamat
                ]
            );

            if($updated)
            {   
                return redirect('instansi')->with(['success' => 'Berhasil Memperbaharui Data Instansi']);
            }
            else{
                return redirect()->back()->with(['error' => 'Gagal Memperbaharui Data Instansi']);
            }

        }else {
            return redirect()->back()->with(['warning' => 'Data Instansi tidak ada']);
        }
    }

 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modalDestroy(Request $request)
    {
        $id = $request->id;
        return view('instansi.modals.destroy', [
            'id' => $id
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $avl = Instansi::find($id);
        $userExist = User::where( 'id_instansi', '=', $id )->count() > 0;
        if(!$userExist)
        {
            if($avl){
                $destroy = Instansi::destroy($id);

                if($destroy)
                return redirect('instansi')->with(['success' => 'Berhasil Menghapus Data Instansi']);
                else
                return redirect('instansi')->with(['error' => 'Gagal Menghapus Data Instansi']);
            }else {
                return redirect('instansi')->with(['warning' => 'Data Instansi Tidak Ada']);
            }
        }
        else {
            return redirect('instansi')->with(['warning' => 'Gagal menghapus Data Instansi karena Telah dipakai dalam data user']);
        }
    }
}
