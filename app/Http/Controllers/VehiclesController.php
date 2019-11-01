<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Vehicle;
use App\Type;
use App\Transaction;
use Auth;

use Illuminate\Http\Request;

use Ramsey\Uuid\Uuid;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $userRoles = Auth::user()->roles->pluck('name');
        // if(!$userRoles->contains('admin')){
        //     return redirect('/permission-denied');
        // }

        $vehicle = Vehicle::get();
        $types = Type::get();
       //dump($vehicle);
        return view('vehicles.index', [
            'dir' => '',
            'headerPage' => '',
            'sideBar' => '',
            'vehicles' => $vehicle,
            'types' => $types
        ]);
    }

    public function etalase()
    {
        //
        $vehicles = Vehicle::get();
        $types = Type::get();
        return view('vehicles.car-without-sidebar', [
            'vehicles' => $vehicles,
            'types' => $types
            ]);
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
		$this->validate($request, [
            'id_type' => 'required',
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'nopol' => 'required',
            'name' => 'required',
          
            'seats' => 'required',
            'transmission' => 'required',
            'ac' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$uploadedFile = $request->file('file');
        
        $path = $uploadedFile->store('public/images/vehicles');
        $uuid = Uuid::uuid4();
		$inserted=Vehicle::create([
			'id_vehicle' => $uuid->getHex(),
			'file' => $path,
            'nopol' => $request->nopol,
            'name' => $request->name,
            'id_type' => $request->id_type,
           
            'seats' => $request->seats,
            'transmission' => $request->transmission,
            'ac' => $request->ac,
        ]);
        if($inserted)
        {
            return redirect()->back()->with(['success' => 'Berhasil menambah Data Kendaraan']);
        }else {
            return redirect()->back()->with(['error' => 'Gagal menambah Data Kendaraan']);
        }   
		
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $avl = Vehicle::find($id);
        if($avl){
            $vehicle = Vehicle::where('id_vehicle', '=', $id)->get();
            $types = Type::get();
            // passing data pegawai yang didapat ke view edit.blade.php
            return view('vehicles.vehicles_update',[
                'vehicle' => $vehicle,
                'types' => $types
            ]);
        }else {
            return redirect('vehicles')->with(['warning' => 'Data kendaraan tidak ada']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $uploadedFile=null;
        $fileAvl=false;
        $fileName='';
        $dir = 'public/images/vehicles';
        $this->validate($request, [
            'id_type' => 'required',
			'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'nopol' => 'required',
            'name' => 'required',
            
            'seats' => 'required',
            'transmission' => 'required',
            'ac' => 'required',
        ]);

        $avl = Vehicle::find($request->id);
        $fileTemp=Vehicle::select('file')->where('id_vehicle', '=', $request->id)->first();//mengambil nama file yang ada di table
       
        
        if($avl)
        {
            if($request->file('file')==null)// file kosong
            {
                $fileName = $fileTemp->file;
                $path = $fileName;
            }
            else { //file dimasukkan
                $uploadedFile = $request->file('file');//menampung file yg di upload
                $avlFileName = $fileTemp->file;
                $path = $uploadedFile->store($dir);
                $fileAvl=Storage::exists($avlFileName);//jika file ditemukan. untuk dihapus
            }                   


            $updated = Vehicle::where('id_vehicle', '=', $request->id)->update([
                'file' => $path,
                'nopol' => $request->nopol,
                'name' => $request->name,
                'id_type' => $request->id_type,
                
                'seats' => $request->seats,
                'transmission' => $request->transmission,
                'ac' => $request->ac,
            ]);

            if($updated==true)
            {   
                $deleted=true;
                if($fileAvl==true)//jika ada file sebelumnya
                {
                   $deleted = Storage::delete($avlFileName);//hapus filenya
                }

                if($deleted==false)
                    return redirect('vehicles')->with(['error' => 'Gagal Menghapus Data Kendaraan']);
                else {
                    return redirect('vehicles')->with(['success' => 'Berhasil Memperbaharui Data kendaraan']);
                }
            }
            // return redirect()->back();
        }else {
            return redirect()->back()->with(['warning' => 'Tidak ada data']);;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */

          /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modalDestroy(Request $request)
    {
        $id = $request->id;
        return view('vehicles.modals.destroy', [
            'id' => $id
        ]);
    }

     
    public function destroy($id)
    {
        //
        $avl = Vehicle::find($id);
        
        $trsExist = Transaction::where( 'id_vehicle', '=', $id )->count() > 0;
        if(!$trsExist)
        {
            $fileName=Vehicle::select('file')->where('id_vehicle', '=', $id)->first();//mengambil nama file yang ada di table

            if($avl){
                $destroy = Vehicle::destroy($id);
                if($destroy)
                {
                    Storage::delete($fileName->file);//hapus filenya
                    return redirect('vehicles')->with(['success' => 'Berhasil menghapus data kendaraan']);
                }
                else
                    return redirect()->back()->with(['error' => 'Gagal menghapus data kendaraan']);
            }else {
                return redirect()->back()->with(['warning' => 'Data kendaraan tidak ada']);
            }
        }
        else {
            return redirect()->back()->with(['warning' => 'Tidak dapat menghapus data kendaraan karena telah dipakai dalam transaksi']);
        }
        
    }
}
