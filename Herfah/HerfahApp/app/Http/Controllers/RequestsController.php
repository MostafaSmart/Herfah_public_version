<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Notification;
use App\Traits\FileUploadTriat;
use App\Models\Requests;
use App\Models\User;
use App\Models\Client;
use App\Notifications\OrderNotification;
use App\Models\ClientWorkerOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class RequestsController extends Controller
{
    use UploadImageTrait;
    use FileUploadTriat;
    private $data;
    private $Clientdata;
    private $count=[];

    public function index()
    {
        //

    }
    public function showWorkRequests()
    {
        $requests = Requests::where('R_Type', 'Work Order')->get();
        return view('dashboard.orders.work-orders', compact('requests'));

    }
    public function showWorkersRequests()
    {
        $requests = Requests::where('R_Type', 'Worker Order')->get();
        return view('dashboard.orders.workers-orders', compact('requests'));

    }


    public function extractJsonData($jsonPath)
    {
        $jsonData = File::get($jsonPath);
        $dataArray = json_decode($jsonData, true);
        return $dataArray;
    }
    public function workDetailsRequest($id)
    {
        $request = Requests::find($id);
        $jsonPath = $request->R_FilePath;
        $directoryPath = public_path('Files');
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $jsonPath;
        $dataArray = $this->extractJsonData($filePath);
        $jobTitle = $dataArray['JobTitle'];
        $requestId = $id;
        return response()->json($dataArray);

    }
    public function workerDetailsRequest($id)
    {
        $request = Requests::find($id);
        $jsonPath = $request->R_FilePath;
        $directoryPath = public_path('Files');
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $jsonPath;
        $dataArray = $this->extractJsonData($filePath);
        $clientid = $dataArray['ClientId'];
        $client = Client::whereHas('user', function ($query) use ($clientid) {
            $query->where('id', $clientid);
        })->pluck('id')->first();
        $dataArray['Client'] = $client;
        return response()->json($dataArray);
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
        $hide = $request->opreation;

        if ($hide == 1) {
            $data = $request->all();
            $path1 = $this->uploadImage($request, "Worker", "person");
            $path2 = $this->uploadImage($request, "Worker\Covers", "cover");
            return view('WebSite.forms.workerportfolio', compact('data','path1','path2'));
        }
        else if ($hide == 2) {
            $path1 = $this->uploadImage($request, "Worker", "person");
            $path2 = $this->uploadImage($request, "Worker\Covers", "cover");
            $this->helper($request,$path1,$path2);
            $this->save();
            $this->sendNotification("Work Order");
            return Redirect::route('index.page')->with('success', 'تم إرسال طلبك بنجاح');
        }
        else if ($hide == 3) {
            $path1 = $request->path2;
            $path2 = $request->path1;
            $this->helper($request,$path1,$path2);
            $this->getanotherdata($request);
            $this->save();
            $this->sendNotification("Work Order");
            return Redirect::route('index.page')->with('success', 'تم إرسال طلبك بنجاح');
        }
        else if ($hide == 4) {
            $this->Clientdata = [
                "WrokerId" => $request->WorkeID,
                "ClientId" => $request->UserId,
                "Client_Name" => $request->client_name,
                "Client_Email" => $request->client_email,
                "Client_Phone" => $request->client_phone,
                "Worker_name" => $request->worker_name,
            ];
            $client=Client::select()->where("user_id",$request->UserId)->first();
            if(!$client){
                Client::create([
                    'rate' => 10,
                    'user_id' => $request->UserId
                ]);
                $client=Client::select()->where("user_id",$request->UserId)->first();
                ClientWorkerOrder::create([
                    'status'=>"قيد المراجعة",
                    'client_id'=>$client->id,
                    'worker_id'=>$request->WorkeID
                ]);
            }
            else{
                ClientWorkerOrder::create([
                    'status'=>"قيد المراجعة",
                    'client_id'=>$client->id,
                    'worker_id'=>$request->WorkeID
                ]);
            }
            $path4 = $this->uploadFile($this->Clientdata, "WorkOrder", "order");
            $orderType = "Worker Order";
            Requests::create([
                "R_Type" => $orderType,
                "R_FilePath" => $path4
            ]);
                $this->sendNotification($orderType);
            return Redirect::route('index.page')->with('success', 'تم إرسال طلبك بنجاح');;
        }
        return Redirect::route('index.page');
    }

    /**
     * Display the specified resource.
     */
    public function show(Requests $requests, $id)
    {
        $user = User::where('id', $id)->first();
        $depts = Department::all();
        return view('WebSite.forms.jobform', compact('user','depts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Requests $requests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Requests $requests)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requests $requests)
    {
        //
    }
    public function helper($request,$path1,$path2)
    {
        $this->data = [
            "UserId" => $request->User_id,
            "FirstName" => $request->f_name,
            "email" => $request->email,
            "Gender" => $request->gender,
            "PhoneNumber" => $request->phone,
            "BirthDate" => $request->birth,
            "JobTitle" => $request->job,
            "Info" => $request->about,
            "Image" => $path1,
            "CoverImage" => $path2,
            "PricePerHour" => $request->priceH,
            "PricePerMatter" => $request->priceM,
        ];
    }
    public function getanotherdata($request){
        $count = $request->num;
        $portfolio =["projects"];
        for ($i = 0; $i < $count; $i++) {
            $portfolio["projects"]["projectName$i"] = ["about" => $request->input('portabout' . $i)];
            $paths=$this->uploadMultipleImages($request,"portimages$i","portfolios");
            $portfolio["projects"]["projectName$i"]["Images"]=$paths;
            //$paths=[];
        }
        return $this->data=array_merge($this->data,$portfolio);
    }
    public function save()
    {
        $path3 = $this->uploadFile($this->data, "WorkerOrder", "order");
        $orderType = "Work Order";
        Requests::create([
            "R_Type" => $orderType,
            "R_FilePath" => $path3
        ]);
        return Redirect::route('index.page')->with('status', 'تم إرسال طلبك بنجاح');
    }
    public function sendNotification($orderType){
            $users = User::where('Autho', 0)->get();
            $user_create = auth()->user()->name;
            Notification::send($users, new OrderNotification($user_create, $orderType));
    }
}
