<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Worker;
use App\Models\Portfoli;
use App\Models\ClientWorkerOrder;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users.users-list');
    }

    // fetch all Users ajax request
    public function fetchAllUser()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Auth::logout();

        return redirect()->route('index.page');
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
    public function show(User $user)
    {

        if($user->Autho == 1 && Auth()->user()->id == $user->id)
        {
            $worker = $user->worker;
            $portfolis = $worker->portfoli;
            $orders = $worker->orders;
            return view('WebSite.workerDash2.index', compact('user', 'worker','portfolis','orders'));

        }
        if($user->Autho == 2 &&  Auth()->user()->id == $user->id){
            $client = $user->client;
            $orders = $client->orders;
            return view('WebSite.ClientDashboard.index2', compact('user','client','orders'));
        }


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


    public function updateAdminAccount(Request $request)
    {
        $user = User::find($request->userId);
        $user->name = $request->firstName;
        $user->l_name = $request->lastName;
        $user->Gender = $request->gender;
        $user->PhoneNumber = $request->phoneNumber;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;

        $user->save();

        if ($user)
            return response()->json([
                'status' => true,
                'message' => 'تم التعديل بنجاح',
            ]);

        else
            return response()->json([
                'status' => false,
                'message' => 'فشل التعديل يرجاء المحاوله مجددا',
            ]);

    }
    public function updateAdminPassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|confirmed',

        ]);

        //check the old password
        if(Hash::check($request->currentPassword, auth::user()->password)) {
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->newPassword)
            ]);
            return response()->json([
                'status' => true,
                'message' => 'تم التعديل بنجاح',
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,
                'message' => 'فشل تأكد من كلمة المرور السابقة',
            ]);
        }
    }
    public function adminDashboardHome()
    {
        $statistics = [];

        $statistics['workersCount'] = Worker::count();
        $statistics['usersCount'] = User::count();
        $statistics['ordersCount'] = ClientWorkerOrder::count();
        $statistics['customersCount'] = Client::count();


        $getWorkersByOrderCount =  ClientWorkerOrder::select('worker_id')
        ->groupBy('worker_id')
        ->orderByRaw('COUNT(*) DESC')
        ->pluck('worker_id')
        ->toArray();
        ;
        $workersData = Worker::with(['user' => function ($query) {
            $query->select('id', 'name', 'l_name');}])->whereIn('id', $getWorkersByOrderCount)->get();


        $totalOrders = [];

        foreach ($getWorkersByOrderCount as $workerId) {
            $totalOrders[$workerId] = ClientWorkerOrder::where('worker_id', $workerId)->count();
        }
        return view('dashboard.home.dashboard-home', compact('statistics', 'workersData', 'totalOrders'));
    }


}
