<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use App\User;
use App\Transaction;
use App\Instansi;
use Auth;

use App\Vehicle;
use App\Type;

use DB;



class PagesController extends Controller
{
  
    public function home()
    {
        return view('index');
    }
    
    public function index()
    {
        $vehicles = Vehicle::get();
        $types = Type::get();
        return view('front.index', [
            'vehicles' => $vehicles,
            'types' => $types
            ]);
    }
        
        

    public function addVehicle($id)
    {
        $vehiclesIn = Vehicle::join('detail_transactions', 'vehicles.id_vehicle', '=', 'detail_transactions.id_vehicle')
                            ->join('transactions', 'detail_transactions.id_transaction', '=', 'transactions.id_transaction')  
                            ->select('detail_transactions.id_vehicle')
                                ->where(function($query) 
                                {
                                    $query->where('transactions.status' , 'like', '0')//jika kendaraan disetujui
                                    ->whereIn('transactions.id_peminjam', [ Auth::user()->id_user ] );
                                })
                            ->get();

         $vehicles = Vehicle::whereNotIn('id_vehicle', $vehiclesIn)
             ->get();
        //$vehicles = Vehicle::get();

        // dd($vehiclesIn);
        // dd($vehicles);

        $types = Type::get();

        return view('front.add_vehicle', [
            'id' => $id,
            'vehicles' => $vehicles,
            'types' => $types,
        ]);
    }

    public function modalTrsDestroy(Request $request)
    {
        $id = $request->id;
        return view('front.modals.destroy_transaction', [
            'id' => $id
        ]);
    }
    public function modalDtlTrsDestroy(Request $request)
    {
        $id = $request->id;
        return view('front.modals.destroy_detail_transaction', [
            'id' => $id
        ]);
    }

     public function destroyTrs($id)
    {
        $avl = Transaction::find($id);
        // dd($avl);
        if($avl){
            $deleted = Transaction::destroy($id);
            if($avl->id_peminjam==Auth::user()->id_user){
                if($deleted)
                    {
                        Alert::success('Sukses', 'Berhasil Menghapus Pesanan');
                        return redirect('transaksi');
                    }
                else {
                    Alert::error('Error', 'Gagal Menghapus Pesanan');
                    return redirect()->back();
                }
            }
        }
        else{
            Alert::warning('Peringatan', 'Pesanan Tidak Ada');
            return redirect()->back();
        }
    }

    public function detail($id)
    {
        $avl = Vehicle::find($id);
        $user = User::join('instansi', 'users.id_instansi', '=', 'instansi.id_instansi')
                ->select('users.*', 'instansi.nama_instansi')
                ->find(Auth::user()->id_user);
        if($avl){
        $vehicle = DB::table('vehicles')
                    ->join('types', 'vehicles.id_type', '=', 'types.id_type')
                    ->select('vehicles.*',  'types.name AS type')
                    ->where('vehicles.id_vehicle' , '=', $id)
                    ->first();
        // dd($vehicle);
        return view('front.detail_car', [
            'vehicle' => $vehicle,
            'user' => $user
        ]);
        }
        return redirect('welcome');

    }

    public function transaksi()
    {
        $trs = Transaction::join('detail_transactions', 'transactions.id_transaction', '=', 'detail_transactions.id_transaction')
                    ->select('transactions.*')
                    ->where('transactions.id_peminjam', '=', Auth::user()->id_user)
                    ->groupBy('transactions.id_transaction')
                    ->get();
       // dd($trs);
        $vehicles = Transaction::join('detail_transactions', 'transactions.id_transaction', '=', 'detail_transactions.id_transaction')
                    ->join('vehicles', 'detail_transactions.id_vehicle', '=', 'vehicles.id_vehicle')
                    ->join('types', 'vehicles.id_type', '=', 'types.id_type')
                    ->select('vehicles.*', 'transactions.id_transaction', 'detail_transactions.id_detail_transaction','types.name AS type')
                    ->where('transactions.id_peminjam', '=', Auth::user()->id_user)
                    ->get();
        // dd($vehicles);
        return view('front.transaksi', [
            'transaksi' => $trs,
            'vehicles' => $vehicles,
        ]);
    }




    public function profile()
    {
        $id=Auth::user()->id_user;
        $avl = User::find($id);
        if($avl)
        {
            $users = User::join('instansi', 'users.id_instansi', '=', 'instansi.id_instansi')
                        ->select('users.*', 'instansi.nama_instansi')
                        ->where('users.id_user', '=', $id)
                         ->first();
            return view('front.profile_user',
            [
                'users' => $users
            ]
            );
        }
        else {

        }
    }

    public function profileEdit()
    {
        $id=Auth::user()->id_user;
        $avl = User::find($id);
        $instansi = Instansi::get();
        if($avl)
        {
            $users = User::where('users.id_user', '=', $id)
                         ->first();
            return view('front.profile_user_edit',
            [
                'users' => $users,
                'instansi' => $instansi
            ]
            );
        }
        else {

        }
    }

    public function about()
    {
        return view('front.about');
    }
   
    public function contact()
    {
        return view('front.contact');
    }


    public function welcome()
    {
        return view('welcome');
    }
    
    
    public function denied()
    {
        return view('404');
    }

    public function post()
    {
        return view('post');
    }


}