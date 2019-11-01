<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Driver;
use App\RoleUser;
use App\Transaction;
use App\DetailTransaction;
use App\Vehicle;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::join('instansi', 'users.id_instansi', '=', 'instansi.id_instansi')
        ->where('id_user', '!=', Auth::user()->id_user)
        ->whereNotIn('id_user', function($query) {
            $query->select('id_user')->from('drivers');
            })
        ->get();

        $drivers = User::join('drivers', 'users.id_user', '=', 'drivers.id_user')
        ->get();

        return view('driver.index', [
            'users' => $users,
            'drivers' => $drivers
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
             'id_user'         => 'required|string|max:32',
        ]);

        $uuid = Uuid::uuid4(); 

        DB::beginTransaction();

        $driver = Driver::create([
            'id_driver' => $uuid->getHex(),
            'id_user'   => $request->id_user
        ]);

        //dd($driver);

        $role=RoleUser::where('id_user', '=', $request->id_user)->update([
            'id_role' => '894e5e0a-a26a-4311-b47b-3ce0b190'
        ]);

        //dd($role);

        if($driver&&$role)
        {
            DB::commit();
            return redirect('driver')->with(['success' => 'Berhasil menambahkan user sebagai sopir']);
        }
        else {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Gagal menambahkan user sebagai sopir']);
        }
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTask()
    {
        //
        $user = User::join('drivers', 'users.id_user', '=', 'drivers.id_user')
                ->select('id_driver')
                ->find(Auth::user()->id_user);

        // dd($user);

        $trs = DetailTransaction::join('vehicles', 'detail_transactions.id_vehicle', '=', 'vehicles.id_vehicle')
                ->join('transactions', 'detail_transactions.id_transaction', '=', 'transactions.id_transaction')
                ->join('types', 'vehicles.id_type', '=', 'types.id_type')
                ->select('vehicles.*', 'detail_transactions.id_detail_transaction', 'types.name AS type' , 'transactions.*')
                 ->where(function($query) use ($user)
                    {
                        $query->where([
                            ['detail_transactions.id_driver' ,'=', $user->id_driver],
                            ])
                            ->whereNotIn('transactions.status' , [ '0', '1']);//kendaran harus disetujui
                        })
                        ->get();
                        //->where('detail_transactions.id_driver', '=', $user->id_driver)

         //dd($trs);

       
        if($user)
        {
            return view('front.task_driver', [
                'transaksi' => $trs
            ]);
        }
    }

    public function checkVehicleAvailable($trs, $available)
    {
        $vehiclesPass = DetailTransaction::join('vehicles', 'detail_transactions.id_vehicle', '=', 'vehicles.id_vehicle' )
            ->select('id_driver')
            ->where(function($query) use ($trs, $available)
            {
                $query->where([
                [
                    'detail_transactions.id_transaction' ,'=', $trs],
                ])
                ->whereIn('vehicles.available' , [ $available ]);//kendaraan ada
            })
            ->count();
        return $vehiclesPass;
    }

    public function acceptTask($id_trs, $id_driver)
    {
        $avl = Transaction::where('status', '=', '2')
            ->find($id_trs);
        $avl2 = Driver::where('id_user', '=', $id_driver)->first();
        // dd($avl);
        // dd($avl2);
        if($avl && $avl2){

           

            $idVehicle = DetailTransaction::select('id_vehicle')
                                            ->where('id_driver',$avl2->id_driver)
                                            ->first();
            // dd($idVehicle);

            $updated = Vehicle::where('id_vehicle', '=', $idVehicle->id_vehicle)
                    ->update(
                    [
                        'available'  => '0',
                    ]
            );


            $vehiclesPass= $this->checkVehicleAvailable($avl->id_transaction, '1');
            // dd($vehiclesPass);
            if($vehiclesPass=='0'||$vehiclesPass==0)
            {
                    $updated = Transaction::where('id_transaction', '=', $id_trs)->update(
                        [
                            'status'  => '3',
                        ]
                    );
               
            }

            if($updated)
            {   
                DB::commit();
                Alert::success('Sukses', 'Berhasil terima tugas');
                 return redirect('driver-task');
            }
            else{
                DB::roolBack();
                Alert::error('Error', 'Gagal terima tugas');
                return redirect()->back();
            }
        }
        else
        {
            Alert::warning('Peringatan', 'Transaksi tidak ada');
            return redirect()->back();
        }
    }

    public function finishTask($id_trs, $id_driver)
    {
        $avl = Transaction::where('status', '=', '3')
                            ->find($id_trs);
        $avl2 = Driver::where('id_user', '=', $id_driver)->first();
        // dd($avl2);
        if($avl && $avl2){

            $idVehicle = DetailTransaction::select('id_vehicle')
                                            ->where('id_driver',$avl2->id_driver)
                                            ->first();
            // dd($idVehicle);
            DB::beginTransaction();
            $updated = Vehicle::where('id_vehicle', '=', $idVehicle->id_vehicle)
                    ->update(
                    [
                        'available'  => '2',//2: Tugas sopir selesai
                    ]
            );
            
            $vehiclesPass= $this->checkVehicleAvailable($avl->id_transaction, '0');//count kendaraan yang belum dikembalikan
//              dd($vehiclesPass);

            if(($vehiclesPass=='0'||$vehiclesPass==0)&&$avl->status=='3')//jika tidak ada lagi mobil yang dipakai oleh sopir yang bertugas
            {

                 $vehiclesFinish = DetailTransaction::join('vehicles', 'detail_transactions.id_vehicle', '=', 'vehicles.id_vehicle' )
                ->select('detail_transactions.id_vehicle')
                ->where(function($query) use ($avl)
                {
                    $query->where([
                    [
                        'detail_transactions.id_transaction' ,'=', $avl->id_transaction],
                    ])
                    ->whereIn('vehicles.available' , [ '2' ]);//kendaraan selesai dipinjam
                })
                ->get();

                $errVehiclesUpdate=0;
                foreach($vehiclesFinish as $vf)
                {
                     $updated = Vehicle::where('id_vehicle', '=', $vf->id_vehicle)->update(
                    [
                        'available'  => '1',
                    ]);
                    if(!$updated){
                        $errVehiclesUpdate++;
                    }
                }
                // dd($errVehiclesUpdate);
                if($errVehiclesUpdate==0)
                {
                    $updated = Transaction::where('id_transaction', '=', $id_trs)->update(
                    [
                        'status'  => '4',
                    ]);
                   // dd($updated);
                }else {
                    $updated=false;
                }

            }

            if($updated)
            {   
                DB::commit();
                Alert::success('Sukses', 'Berhasil selesaikan tugas');
                 return redirect('driver-task');
            }
            else{
                DB::rollBack();
                Alert::error('Error', 'Gagal selesaikan tugas');
                return redirect()->back();
            }
        }
        else
        {
            Alert::warning('Peringatan', 'Transaksi tidak ada');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUser($id)
    {
        //
        $user = User::join('instansi', 'users.id_instansi', '=', 'instansi.id_instansi')
        ->find($id);
        if($user)
        {
            return view('driver.show_user', [
                'user' => $user
            ]);
        }
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


     public function modalDestroy(Request $request)
    {
        $id = $request->id;
        return view('driver.modals.destroy', [
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
        $avl = Driver::find($id);
        
        $trsExist = DetailTransaction::where( 'id_driver', '=', $id )->count() > 0;
        if(!$trsExist)
        {
            if($avl){
                DB::beginTransaction();
                    $role=RoleUser::where('id_user', '=', $avl->id_user)->update([
                    'id_role' => '5cd69df8-beda-4fb3-9366-67ef34fe'
                ]);

                $deleted = Driver::destroy($id);

                if($deleted && $role)
                {
                DB::commit(); 
                    return redirect()->back()->with(['success' => 'Berhasil Menghapus data sopir']);
                }
                else {
                    DB::rollBack();
                    return redirect()->back()->with(['error' => 'Gagal Menghapus data sopir']);
                }
            }
            else
                return redirect()->back()->with(['warning' => 'data sopir tidak ada']);
        }
        else {
            return redirect()->back()->with(['warning' => 'Tidak dapat menghapus data sopir karena telah dipakai dalam transaksi']);
        }

    }
}
