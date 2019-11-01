<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\DB;
use App\Transaction;
use App\DetailTransaction;
use App\User;
use App\Type;
use App\Vehicle;
use App\Driver;
use Auth;

use Ramsey\Uuid\Uuid;

class TransactionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trs = Transaction::join('users', 'transactions.id_peminjam', '=', 'users.id_user')
        // ->join('vehicles', 'transactions.id_vehicle', '=', 'vehicles.id_vehicle')
        // ->join('drivers', 'transactions.id_driver', '=', 'drivers.id_driver')
        //->join('types', 'vehicles.id_type', '=', 'types.id_type')
        ->join('instansi', 'users.id_instansi', '=', 'instansi.id_instansi')
        ->select('transactions.*', 'users.name AS peminjam' , 'instansi.nama_instansi', 'users.foto_ktp',  'users.id_user','transactions.status')
        ->orderBy('transactions.created_at')
        ->get();
        
        return view('transaction.index', [
            'dir' => 'Pesanan',
            'headerPage' => 'Pesanan',
            'trs' => $trs,
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

             $this->validate($request, [
		 	'id_vehicle'    => 'required',
		 	'id_peminjam'   => 'required',
             'keperluan'    => 'required',
             'tujuan'       => 'required',
		 	'tgl_pinjam'    => 'required|date',
		 	'tgl_kembali'   => 'required|date',
         ]);
         
        $trsScl = Transaction::join('detail_transactions', 'transactions.id_transaction' , '=', 'detail_transactions.id_transaction')
                    ->where([
                        ['id_vehicle' , '=', $request->id_vehicle ],
                        ])
                     ->where(function($query)
                    {
                        $query->where('transactions.status' , 'like', '2')//jika kendaraan disetujui
                            ->orWhere('transactions.status' , 'like', '3');//jka kendaraan dipinjam
                    })
                ->get();

        //dd($trsScl);
        $date='';
        $jadwalBentrok=false;
        foreach ($trsScl as $data) {
            if((($request->tgl_pinjam >= $data->tgl_pinjam) && ($request->tgl_pinjam <= $data->tgl_kembali)) || (($request->tgl_kembali >= $data->tgl_pinjam) && ($request->tgl_kembali <= $data->tgl_kembali)))// jika between
            {
                $jadwalBentrok=true; //jadwal bentrok true
            }
                // $date = $data->tgl_pinjam;
        }
        
        // dd($request->tgl_pinjam);
        // dd($date);
        // dd($jadwalBentrok);
            
        $avl1 = Vehicle::find($request->id_vehicle);
        $avl2 = User::find($request->id_peminjam);

        $avl3 = Transaction::join('detail_transactions', 'transactions.id_transaction' , '=', 'detail_transactions.id_transaction')// ada apakah sudah ada transaksi dengan kendaraan yang sama yang masih dipinjam/dipesan
                   
                    ->where(function($query) use ($request)
                    {
                        $query->where([
                        ['id_peminjam' ,'=', $request->id_peminjam],
                        ['id_vehicle' , '=', $request->id_vehicle ],//
                        ])
                        ->whereIn('transactions.status' , [ '0', '2', '3']);//
                    })
                 ->count();
        //dd($avl3);
        //$avl4 = Transaction::leftJoin('vehicles', 'vehicles.id_vehicle', '=', 'transactions.id_vehicle')//cek apakah kendaraan sudah dipesan
        // $avl4 = Transaction::leftJoin('detail_transactions', 'transactions.id_transaction', '=', 'detail_transactions.id_transaction')//cek apakah kendaraan sudah dipesan
        //         ->select('transactions.status', 'detail_transactions.id_vehicle')
        //         ->whereIn('detail_transactions.id_vehicle', [$request->id_vehicle])
        //         ->where(function($query) {
        //             $query->where('transactions.status','=', '2')->orWhere('transactions.status','=', '3');//2:disetujui 3:dipinjam
        //         })
        //         ->whereNotNull('detail_transactions.id_vehicle')
        //         ->groupBy('detail_transactions.id_vehicle')
        //         ->count();         
          // dd($avl4);
        if($jadwalBentrok)
        {
            Alert::warning('Peringatan', 'Tanggal yang anda pesan bentrok');
            return redirect()->back();
        }
        elseif($avl3!='0')
        {
            Alert::warning('Peringatan', 'Transaksi sebelumnya dengan kendaraan ini belum selesai, silahkan selesaikan transaksi tersebut');
            return redirect()->back();
        }
        else {
            // if($avl4!='0')
            // {
            //     Alert::warning('Peringatan', 'Kendaraan ini sudah ada yang memesan');
            //     return redirect()->back();
            // }
            // elseif($avl3=='0')
            if($avl3=='0')
            {
                if($avl1&&$avl2&&($request->tgl_pinjam<$request->tgl_kembali))
                {   
                    $uuid = Uuid::uuid4();
                    $uuid2 = Uuid::uuid4();
                    DB::beginTransaction();
                    $inserted = Transaction::create([
                        'id_transaction'    => $uuid->getHex(),
                        //'id_vehicle'    => $request->id_vehicle,
                        'id_peminjam'   => $request->id_peminjam,
                        'keperluan'       => $request->keperluan,
                        'tujuan'       => $request->tujuan,
                        'status'       =>  '0',
                        'tgl_pinjam'    => $request->tgl_pinjam,
                        'tgl_kembali'   => $request->tgl_kembali,
                    ]);
                    //dd($inserted);

                    $inserted2 = DetailTransaction::create([
                        'id_detail_transaction'    => $uuid2->getHex(),
                        'id_transaction'    => $uuid->getHex(),
                        'id_vehicle'    => $request->id_vehicle,
                    ]);
                    // dd($inserted2);
                    if($inserted&&$inserted2)
                    {
                        DB::commit();
                        Alert::success('Sukses', 'Pengajuan pemesanan kendaraan berhasil');
                        return redirect('transaksi');
                    }
                    else {
                        DB::roolBack();
                        Alert::error('Error', 'Pengajuan pemesanan kendaraan gagal');
                        return redirect()->back();
                    }
                }
                Alert::warning('Peringatan', 'Terjadi kesalahan');
                return redirect()->back();
            }else {
                Alert::warning('Peringatan', 'Hanya bisa memesan 1 Kendaraan dalam waktu yang sama');
                return redirect()->back();
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
    public function update(Request $request, $id)
    {
        //
    }

    public function getDtlTrsDriver($idTrs = '')
    {   
       // dd($idTrs);
        $avl2 = Transaction::join('detail_transactions', 'transactions.id_transaction', '=', 'detail_transactions.id_transaction')
                ->join('drivers', 'detail_transactions.id_driver' , '=', 'drivers.id_driver')
                ->select('detail_transactions.id_driver')
                ->where('transactions.id_transaction', '=', $idTrs)
                ->get();
        //   dd($avl2);

        return $avl2;
    }

    public function getConflicDriver($idTrs = '')
    {   
       // dd($idTrs);
        $avl2 = Transaction::join('detail_transactions', 'transactions.id_transaction', '=', 'detail_transactions.id_transaction')
                // cek trs tanggal yang ada
                ->where('transactions.id_transaction', '=', $idTrs)
                ->groupBy('transactions.id_transaction')
                ->first();
        //   dd($avl2);
        // dd($this->getDtlTrsDriver($idTrs));
        $trsScl = Transaction::join('detail_transactions', 'transactions.id_transaction' , '=', 'detail_transactions.id_transaction')///Untuk mengambil jadwal transaksi tiap sopir yang telah disetujui atau dipinjam
                            ->join('drivers', 'detail_transactions.id_driver' , '=', 'drivers.id_driver')
                            ->where(function($query)
                                {
                                    $query->where('transactions.status' , 'like', '2')//jika kendaraan disetujui
                                        ->orWhere('transactions.status' , 'like', '3');//jika kendaraan dipinjam
                                })
                            ->whereNotIn('transactions.id_transaction', [ $idTrs ])

                            // ->groupBy('transactions.id_transaction')
                            ->get();
            //  dd($trsScl);

         $jadwalBentrok=false;
        
         $arrDriver= array();
         foreach ($trsScl as $data) {
             if((($avl2->tgl_pinjam >= $data->tgl_pinjam) && ($avl2->tgl_pinjam <= $data->tgl_kembali)) || (($avl2->tgl_kembali >= $data->tgl_pinjam) && ($avl2->tgl_kembali <= $data->tgl_kembali)))/// jika between
            {
                   $jadwalBentrok=true; //jadwal bentrok true
            }
            else{
                $arrDriver[]=$data->id_driver;
            }
                   /// $date = $data->tgl_pinjam;
        }
        //  dd($jadwalBentrok);
        // dd($arrDriver);
        // dd($arrDriver);


     
        foreach($this->getDtlTrsDriver($idTrs) as $j)
        {
            $arrDriver[]=$j->id_driver;
        }
        // dd($arrDriver);
        return $arrDriver;
    }


    public function modalDriver(Request $request)
    {
        $id = $request->id;
        $avl = DetailTransaction::find($id);
        //   dd($avl->id_transaction);
        // dd($avl);
        if($avl){
            $arrDriver = $this->getConflicDriver($avl->id_transaction);
            //dd($arrDriver);
             $drivers = Driver::join('users', 'drivers.id_user', '=', 'users.id_user')
                                ->join('instansi', 'users.id_instansi', '=', 'instansi.id_instansi')
                                 ->whereNotIn('drivers.id_driver' , $arrDriver)
                                 ->get();
            //$option = $status->status;
            //dd($drivers);

            return view('transaction.modals.driver', [
                'id' => $id,
                'drivers' => $drivers
            ]);
        
        }
        else {
            return 'Transaksi tidak ada';
        }
    }


       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modalDecline(Request $request)
    {
        $id = $request->id;
        // dd($id);
        return view('transaction.modals.decline', [
            'id' => $id
        ]);
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
        return view('transaction.modals.destroy', [
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
        
        $avl = Transaction::find($id);
        if($avl){

            DB::beginTransaction();
            
            $vehiclesFinish = DetailTransaction::join('vehicles', 'detail_transactions.id_vehicle', '=', 'vehicles.id_vehicle' )
            ->select('detail_transactions.id_vehicle', 'vehicles.available')
            ->where(function($query) use ($id)
            {
                $query->where([
                    [
                    'detail_transactions.id_transaction' ,'=', $id],
                ])
                ->whereIn('vehicles.available' , [ '0',  '2' ]);//kendaraan selesai dipinjam
            })
            ->get();

           //dd($vehiclesFinish);

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
         
            $deleted = Transaction::destroy($id);
            
            if($deleted&&$errVehiclesUpdate==0)
            {
                DB::commit();
                return redirect()->back()->with(['success' => 'Berhasil Menghapus Transaksi']);
            }
            else {
                DB::rollBack();
                return redirect()->back()->with(['error' => 'Gagal Menghapus Transaksi']);
            }
        }
        else
            return redirect()->back()->with(['warning' => 'Transaksi tidak ada']);
    }

           /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modalSet(Request $request)
    {
        $id = $request->id;
        $avl = Transaction::find($id);
        //dd($avl);
        if($avl){
            $status = Transaction::where('id_transaction' , '=', $id)->select('transactions.status')->first();
            $option = $status->status;

            return view('transaction.modals.set', [
                'id' => $id,
                'option' => $option
            ]);
        }
         else {
             return 'Transaksi tidak ada';
         }
    }

    
    public function detailTransaction($id)
    {
        $trs = Transaction::join('users', 'transactions.id_peminjam', '=', 'users.id_user')
            //->join('vehicles', 'transactions.id_vehicle', '=', 'vehicles.id_vehicle')
            //->join('types', 'vehicles.id_type', '=', 'types.id_type')
            ->join('instansi', 'users.id_instansi', '=', 'instansi.id_instansi')
            ->select('transactions.*', 'users.name AS peminjam' , 'instansi.nama_instansi', 'users.foto_ktp', 'users.id_user', 'transactions.status')
            ->find($id);
        // dd($trs);

        if($trs){
            $vehicles = Vehicle::join('detail_transactions', 'vehicles.id_vehicle', '=', 'detail_transactions.id_vehicle')

            ->where('detail_transactions.id_transaction', '=', $id)
            ->get();

            $driver = User::join('drivers', 'users.id_user', '=', 'drivers.id_user')
                        ->select('drivers.id_driver', 'users.name' , 'drivers.id_user')
                    ->get();
           // dd($driver);

            return view('transaction.detail_transaction', [
                'drivers' => $driver,
                'trs' => $trs,
                'vehicles' => $vehicles
            ]);
        }
        else
            return redirect()->back()->with(['warning' => 'Transaksi tidak ada']);
    }

    public function setDriver($trs, $driver)
    {
        $avl = DetailTransaction::join('transactions', 'detail_transactions.id_transaction', '=', 'transactions.id_transaction')
                ->where(function($query)
                {
                    $query->where('status', '!=', '4');
                })
                ->find($trs);


        $driverNotAvl = DetailTransaction::join('vehicles', 'detail_transactions.id_vehicle', '=', 'vehicles.id_vehicle')
                                ->join('drivers', 'detail_transactions.id_driver', '=', 'drivers.id_driver')
                                ->where(function($query) use ($driver, $trs)
                                {
                                    $query->whereIn('vehicles.available' , [ '0' ])
                                    ->where('drivers.id_driver', '=', $driver)
                                    ->where('detail_transactions.id_detail_transaction', '=', $trs);
                                })
                                ->count();
        //dd($driverNotAvl);

        $avl2 = Driver::whereNotIn('id_driver', $this->getConflicDriver($avl->id_transaction))
                   ->find($driver);

        if($avl && $avl2){
            $updated = DetailTransaction::where('id_detail_transaction', '=', $trs)->update(
                [
                    'id_driver'  => $driver,
                ]
            );

            // $updated2 = Vehicle::where('id_vehicle', '=', $avl->id_vehicle)->update(
            //     [
            //         'available'  => '0',
            //     ]
            // );

            // if($updated&&$updated2)
            if($updated)
            {   
                $driverPass = DetailTransaction::join('vehicles', 'detail_transactions.id_vehicle', '=', 'vehicles.id_vehicle' )//cek apakah semua mobil sudah dipilihkan sopirnya oleh admin
                            ->select('id_driver')
                            ->where(function($query) use ($avl)
                            {
                                $query->where([
                                [
                                    'detail_transactions.id_transaction' ,'=', $avl->id_transaction],
                                ]);
                                // ->whereNotNull('detail_transactions.id_driver');
                                //->whereIn('vehicles.available' , [ '0' ]);
                            })
                            ->get();

                $idDriverNullExist=false;
                foreach($driverPass as $dr)
                {
                    if($dr->id_driver==''||$dr->id_driver==null)
                    $idDriverNullExist=true;
                }
            
                //  dd($driverPass);
                // dd($idDriverNullExist);
                if($idDriverNullExist==false)//jika tidak ada lagi mobil yang belum ada sopirnya
                {
                    $updatedTrs = Transaction::where('id_transaction', '=', $avl->id_transaction)->update(
                    [
                        'status'  => '2',//maka transaksi statusnya akan disetujui
                    ]);

                    //dd($updatedTrs);
                    if($updatedTrs)
                    return redirect('transactions')->with(['success' => 'Transaksi Berhasil']);
                }
                else {
                    return redirect()->back()->with(['success' => 'Berhasil memilih sopir']);
                }

            }
            else{
                return redirect()->back()->with(['error' => 'Transaksi Gagal']);
            }

        }
        else
            return redirect()->back()->with(['warning' => 'Transaksi tidak ada']);
    }


      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setStatus(Request $request)
    {
         $this->validate($request, [
             'id' => 'required',
             'status' => 'required',
         ]);

        $avl = Transaction::find($request->id);
     
        if($avl)
        {
            $updated = Transaction::where('id_transaction', '=', $request->id)->update(
                [
                    'status'    => $request->status,
                    'id_admin'  => Auth::user()->id_user
                ]
            );
            if($updated)
            {   
                //dd($request->id_type);
                return redirect('transactions')->with(['success' => 'Berhasil Mengatur Transaksi']);
            }
            else{
                return redirect()->back()->with(['error' => 'Gagal Mengatur Transaksi']);
            }

        }else {
            return redirect()->back()->with(['warning' => 'Transaksi tidak ada']);
        }

    }


  
}
