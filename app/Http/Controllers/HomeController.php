<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Type;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(Auth::user()->roles->pluck('name'));
        $types = Type::get();
        $allVehicles = Vehicle::get();

        //$vehicles = Vehicle::leftJoin('detail_transactions', 'vehicles.id_vehicle', '=', 'detail_transactions.id_vehicle')
   

        return view('front.index', [
            'vehicles' => $allVehicles,
            'types' => $types
            ]);
        }


}
