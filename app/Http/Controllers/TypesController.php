<?php

namespace App\Http\Controllers;

use App\Type;
use App\Vehicle;
use Illuminate\Http\Request;

use Ramsey\Uuid\Uuid;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $type = Type::get();
        //dump($vehicle);
         return view('type.types', ['type' => $type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
			'name' => 'required'
		]);
        $uuid = Uuid::uuid4();
		$inserted = Type::create([
            'id_type' => $uuid->getHex(),
            'name' => $request->name
		]);
        if($inserted)
            return redirect()->back()->with(['success' => 'Berhasil Memasukkan Data Tipe Kendaraan']);
            else {
                return redirect()->back()->with(['error' => 'Gagal Memasukkan Data Tipe Kendaraan']);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($type)
    {
        //
        $avl = Type::find($type);
        if($avl){
            $types = Type::where('id_type', '=', $type)->get();
            
        return view('type.types_update',[
                'types' => $types
            ]);
        }else {
            return redirect('type')->with(['warning' => 'Data Tipe Kendaraan tidak ada']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->validate($request, [
            'id_type' => 'required',
            'name' => 'required'   
        ]);

        $avl = Type::find($request->id_type);
        if($avl)
        {
       
            $updated = Type::where('id_type', '=', $request->id_type)->update(
                [
                    'name' => $request->name
                ]
            );
            if($updated)
            {   
                //dd($request->id_type);
                return redirect('types')->with(['success' => 'Berhasil Memperbaharui Data Tipe Kendaraan']);
            }
            else{
                return redirect()->back()->with(['error' => 'Gagal Memperbaharui Data Tipe Kendaraan']);
            }

        }else {
            return redirect()->back()->with(['warning' => 'Data Tipe Kendaraan tidak ada']);
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
        return view('type.modals.destroy', [
            'id' => $id
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
     $avl = Type::find($id);
     $vhclExist = Vehicle::where( 'id_type', '=', $id )->count() > 0;
        if(!$vhclExist)
        {
            if($avl){
                $destroy = Type::destroy($id);

                if($destroy)
                return redirect('types')->with(['success' => 'Berhasil Menghapus Data Tipe Kendaraan']);
                else
                return redirect('types')->with(['error' => 'Gagal Menghapus Data Tipe Kendaraan']);
            }else {
                return redirect('types')->with(['warning' => 'Data Tipe Kendaraan Tidak Ada']);
            }
        }
        else {
            return redirect('types')->with(['warning' => 'Gagal menghapus Data Tipe Kendaraan karena Telah dipakai dalam data kendaraan']);
        }
 
    }
}
