<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientWorkerOrder;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.customers.customers-list');
    }
    public function clientDetailsFromDashboard($id)
    {
        $client = Client::with('user', 'orders')->withCount('orders as orders_count')->find($id);
        $totalAmount = ClientWorkerOrder::where('client_id', $client->id)->sum('Amount');
        $clientOrder = ClientWorkerOrder::where('client_id', $id)->get();
        return view('dashboard.customers.customer-details', compact('client', 'totalAmount', 'clientOrder'));
    }

    public function fetchAllClient()
    {
        $client = Client::with('user')->get();
        return response()->json(['client' => $client]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
