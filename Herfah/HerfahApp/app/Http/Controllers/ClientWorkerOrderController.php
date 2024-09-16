<?php

namespace App\Http\Controllers;

use App\Models\ClientWorkerOrder;
use App\Models\Requests;
use App\Models\Worker;
use Illuminate\Http\Request;

class ClientWorkerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.orders.order-list');
    }
    public function orderDetails()
    {
        return view('dashboard.orders.order-details');
    }


    public function reviews(){

        $order = ClientWorkerOrder::all();
        return view('dashboard.reviews.reviews', compact('order'));
    }
    public function fetchAllOrders()
    {
        $clientOrder = ClientWorkerOrder::all();
        // dd($clientOrder);
        return response()->json(['clientOrder' => $clientOrder]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function addOrder(Request $request)
    {
        $order = ClientWorkerOrder::create([
            'startDate' => $request->startDate,
            'status' => 'قيد العمل',
            'testimonial' => '',
            'Amount' => $request->price,
            'Num_Days' => $request->daysNum,
            'client_id' => $request->clientid,
            'worker_id' => $request->workerId
        ]);
        $reqId = $request->requestId;
        $updatedRequest = Requests::find($reqId);
        $id = $request->workerId;
        $worker = Worker::find($id);
        $updatedRequest->status = 'Successful';
        $updatedRequest->save();
        $worker->status = 'busy';
        $worker->save();
        if ($order)
        {

            return response()->json([
                'status' => true,
                'message' => 'تم الحفظ بنجاح',
            ]);
        }
        else
            return response()->json([
                'status' => false,
                'message' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
    }
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(ClientWorkerOrder $clientWorkerOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientWorkerOrder $clientWorkerOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientWorkerOrder $clientWorkerOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientWorkerOrder $clientWorkerOrder)
    {
        //
    }
}
