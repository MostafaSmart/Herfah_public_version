<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\ClientWorkerOrder;
use App\Models\Worker;
use App\Models\User;
use App\Models\Client;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depts = Department::all();
        $workers = Worker::all();
        $count1 = Department::sum('NumOfWorker');
        $count2 = ClientWorkerOrder::count();
        $count3 = Client::count();
        return view('WebSite.index', compact('depts', 'count1', 'count2', 'count3','workers'));
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
    public function show(int $id)
    {
        $users=[];
        $workers = Worker::where('department_id',$id)->get();
        foreach($workers as $worker)
        {
            $user=User::where('id', $worker->user_id)->first();
            $users[]=$user;
        }
        return view('WebSite.team',compact('workers','users'));
    }

    public function showreq(int $id)
    {
        $workerName=User::select("name")->where("id",$id)->first();
        $workerID=Worker::select("id")->where("user_id",$id)->first();
        return view('WebSite.forms.serveice',compact('workerName','workerID'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
