<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Emails;
use Illuminate\Http\Request;

class RevenuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $emails = Emails::get();
        $orders = Orders::where('status', 1)->get();
        $totalAmount = $orders->sum('total');
        return view('admin.revenues.index', compact('totalAmount', 'orders', 'emails'));
    }

    public function getTime(Request $request)
    {
        $emails = Emails::get();
        $endDate = now();
        $timeMount = $request->input('timeMount', 'week');

        switch ($timeMount) {
            case 'day':
                $startDate = $endDate->copy()->subDay();
                break;
            case 'week':
                $startDate = $endDate->copy()->subWeek();
                break;
            case '1m':
                $startDate = $endDate->copy()->subMonth();
                break;
            case '3m':
                $startDate = $endDate->copy()->subMonths(3);
                break;
            case '6m':
                $startDate = $endDate->copy()->subMonths(6);
                break;
            case '1y':
                $startDate = $endDate->copy()->subYear();
                break;
            default:
                $startDate = $endDate->copy()->subWeek();
                break;
        }

        $orders = Orders::where('status', 1)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();
        $totalAmount = $orders->sum('total');

        return view('admin.revenues.index', compact('totalAmount', 'orders', 'emails'));
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