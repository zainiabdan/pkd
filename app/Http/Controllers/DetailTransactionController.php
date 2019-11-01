<?php

namespace App\Http\Controllers;

use App\DetailTransaction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

use App\Transaction;
use App\Vehicle;
use Auth;


class DetailTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function addVehicle($idTrs, $id_vehicle)
    {
        //

         $vehiclesHasInCart = Vehicle::join('detail_transactions', 'vehicles.id_vehicle', '=', 'detail_transactions.id_vehicle')
                            ->join('transactions', 'detail_transactions.id_transaction', '=', 'transactions.id_transaction')  
                            ->select('detail_transactions.id_vehicle')
                             ->where(function($query) use ($id_vehicle)
                                {
                                    $query->where('transactions.status' , 'like', '0')//jika kendaraan disetujui
                                    ->whereIn('detail_transactions.id_vehicle', [ $id_vehicle ] );
                                })
                            ->count();
        //  dd($vehiclesHasInCart);

       
        
        $avl =Transaction::join('detail_transactions', 'transactions.id_transaction', '=', 'detail_transactions.id_transaction')
            ->select('transactions.*')
            ->where('transactions.id_peminjam', '=', Auth::user()->id_user)
            ->groupBy('transactions.id_transaction')
            ->first();
        //   dd($avl);

        $trsScl = Transaction::join('detail_transactions', 'transactions.id_transaction' , '=', 'detail_transactions.id_transaction')///Untuk mengambil jadwal transaksi tiap sopir yang telah disetujui atau dipinjam
                            ->join('drivers', 'detail_transactions.id_driver' , '=', 'drivers.id_driver')
                            ->where(function($query)
                                {
                                    $query->where('transactions.status' , 'like', '2')//jika kendaraan disetujui
                                        ->orWhere('transactions.status' , 'like', '3');//jika kendaraan dipinjam
                                })
                            ->where('detail_transactions.id_vehicle', '=', $id_vehicle)
                            ->whereNotIn('transactions.id_transaction', [ $idTrs ])
                            // ->groupBy('transactions.id_transaction')
                            ->get();
            //dd($trsScl);

         $jadwalBentrok=false;
        
         $arrDriver= array();
         foreach ($trsScl as $data) {
             if((($avl->tgl_pinjam >= $data->tgl_pinjam) && ($avl->tgl_pinjam <= $data->tgl_kembali)) || (($avl->tgl_kembali >= $data->tgl_pinjam) && ($avl->tgl_kembali <= $data->tgl_kembali)))/// jika between
            {
                   $jadwalBentrok=true; //jadwal bentrok true
            }
            else{
                $arrDriver[]=$data->id_driver;
            }
                   /// $date = $data->tgl_pinjam;
        }
        // dd($jadwalBentrok);

     
        $vehicle = Vehicle::find($id_vehicle);

        // dd($trs);
        // dd($avl);
        if($jadwalBentrok!=true)
        {
            if($avl&&$vehicle&&($vehiclesHasInCart=='0'||$vehiclesHasInCart==0))
            {
                $uuid = Uuid::uuid4();

                $inserted = DetailTransaction::create([
                    'id_detail_transaction'    => $uuid->getHex(),
                    'id_transaction'    => $avl->id_transaction,
                    'id_vehicle'    => $vehicle->id_vehicle,
                ]);
                // dd($inserted);
                if($inserted)
                {
                    Alert::success('Sukses', 'Menambah kendaraan berhasil');
                        return redirect('transaksi');

                }
                else {
                    Alert::error('Error', 'Proses Gagal');
                            return redirect()->back();
                }
            }
            else {
                Alert::error('Error', 'Transaksi Tidak Ada');
                            return redirect()->back();
            }
        }
        else{

        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailTransaction  $detailTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(DetailTransaction $detailTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailTransaction  $detailTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailTransaction $detailTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailTransaction  $detailTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailTransaction $detailTransaction)
    {
        //
    }


    public function countRowStatusZero($id_trs)
    {
        return Transaction::join('detail_transactions', 'transactions.id_transaction', '=', 'detail_transactions.id_transaction')
                ->where('transactions.status', '=', '0')
                ->where('transactions.id_transaction', '=', $id_trs)
                ->count();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailTransaction  $detailTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
          $avl = DetailTransaction::join('transactions', 'detail_transactions.id_transaction', '=', 'transactions.id_transaction')
                ->where('transactions.status', '=', '0')
                ->where('detail_transactions.id_detail_transaction', '=', $id)
                ->groupBy('transactions.id_transaction')
                ->find($id);

        //  dd($this->countRowStatusZero($avl->id_transaction));
        //   dd($avl);
        if(($avl!=null)&&(int)$this->countRowStatusZero($avl->id_transaction)>1){
            $deleted = DetailTransaction::destroy($id);
            // dd($deleted);
            if($avl->id_peminjam==Auth::user()->id_user){
                if($deleted)
                    {
                        Alert::success('Sukses', 'Berhasil Menghapus Kendaraan');
                        return redirect('transaksi');
                    }
                else {
                    Alert::error('Error', 'Gagal Menghapus Kendaraan');
                    return redirect()->back();
                }
            }
        }
        else{
            Alert::warning('Peringatan', 'Pesanan Tidak Ada');
            return redirect()->back();
        }
    }
}
