<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class ScheduleController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vehicle($id)
    {
        //
        $schedule = Transaction::join('users', 'transactions.id_peminjam', '=', 'users.id_user')
        ->join('detail_transactions', 'transactions.id_transaction', '=', 'detail_transactions.id_transaction')
        ->join('vehicles', 'detail_transactions.id_vehicle', '=', 'vehicles.id_vehicle')
        ->select( 'users.name AS title' , 'transactions.tgl_pinjam AS start', 'transactions.tgl_kembali AS end' )
        ->where(function($query) {
            $query->where('transactions.status','=', '2')->orWhere('transactions.status','=', '3');
        })
        ->where('vehicles.id_vehicle', '=', $id)
        ->get();
        return response()->json([
            'vehicle' => $schedule
        ]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
