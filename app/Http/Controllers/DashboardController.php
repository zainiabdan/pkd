<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $trs = Transaction::orderBy('created_at')
                ->get();
                // dd($trs);
        return view('dashboard.index',
            [
                'trs' => $trs
            ]
        );
    }

     public function dashboardFilter(Request $request)
    {

           $this->validate($request, [
		 	'start'    => 'required|date',
		 	'end'      => 'required|date',
		 ]);

        $trs = Transaction::orderBy('created_at')
                ->whereBetween('created_at', [$request->start, $request->end])
                ->get();


                // dd($trs);
        return view('dashboard.index',
            [
                'trs' => $trs
            ]
        );
    }
}
