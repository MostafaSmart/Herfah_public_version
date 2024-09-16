<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Worker;
use App\Models\Portfoli;
use App\Models\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class WorkerController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('WebSite.workerDash2.showWorker.layouts.base');

    }

    public function workersViewDashboard()
    {
        return view('dashboard.workers.workers-list');
    }
    public function addWorkerView()
    {
        $departments = Department::all();
        $users = User::all();
        return view('dashboard.workers.add-worker', compact('departments','users'));;
    }
    public function fetchAllWorkers()
    {
        $workers = Worker::with(['user' => function ($query) {
            $query->select('id', 'name', 'l_name');
        }, 'department' => function ($query) {
            $query->select('id', 'D_Name');
        }, 'portfoli'])->withCount(['portfoli as portfolio_count'])->get();
        return response()->json(['workers' => $workers]);
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
        $profileImg =$this->uploadImage($request,'workers','profileImage');
        $coverImg =$this->uploadImage($request,'workers','coverImage');
        $worker = Worker::create([
            'about' => $request->about,
            'personal_image' => $profileImg,
            'Image_cover' => $coverImg,
            'price_perHour' => $request->price_perHour,
            'price_perMatter' => $request->price_perMatter,
            'status' => "valiable",
            'department_id' => $request->department_id,
            'user_id' => $request->user_id,
        ]);

        $workerId = $worker->id;

        $portfolio = new Portfoli();
        $portfolio->About_Project = $request->description;
        if ($request->hasFile('images')) {
            $images = [];

            foreach ($request->file('images') as $image) {
                $imageName = $this->uploadManyImages($image, 'Portfolio', 'portifolioImgMultiple');
                $images[] = $imageName;
            }

            $portfolio->images = json_encode($images);
        }
        $portfolio->worker_id = $workerId;

        $portfolio->save();

        //تحديث حالة المستخدم إلى عامل"
        $user = User::find($request->user_id);
        $user->Autho = 2;
        $user->save();

        $department = Department::find($request->department_id);
        $department->NumOfWorker += 1;
        $department->save();
        if ($portfolio)
            return response()->json([
                'status' => true,
                'message' => 'تم الحفظ بنجاح',
            ]);
        else
            return response()->json([
                'status' => false,
                'message' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);

    }

    public function extractJsonData($jsonPath)
    {
        $jsonData = File::get($jsonPath);
        $dataArray = json_decode($jsonData, true);
        return $dataArray;
    }

    public function storeFromRequests($id){
        $reqId = $id;
        $request = Requests::find($reqId);
        $jsonPath = $request->R_FilePath;
        $directoryPath = public_path('Files');
        $filePath = $directoryPath . DIRECTORY_SEPARATOR . $jsonPath;
        $dataArray = $this->extractJsonData($filePath);
        // dd($reqId);
        $jobTitle = $dataArray['JobTitle'];
        $deptId = Department::where('D_Name', $jobTitle)->pluck('id')->first();
                // إنشاء سجل عامل واسترجاع قيمة worker_id
                $worker = Worker::create([
                    'about' => $dataArray['Info'],
                    'personal_image' => $dataArray['Image'],
                    'Image_cover' => $dataArray['CoverImage'],
                    'price_perHour' => $dataArray['PricePerHour'],
                    'price_perMatter' => $dataArray['PricePerMatter'],
                    'status' => "Valiable",
                    'department_id' => $deptId,
                    'user_id' => $dataArray['UserId'],
                ]);

                // الحصول على قيمة worker_id
                $workerId = $worker->id;

                $portfolio = new Portfoli();
                $portfolio->About_Project = $dataArray['projects']['projectName0']['about'];

                $portfolio->images = json_encode($dataArray['projects']['projectName0']['Images']);
                $portfolio->worker_id = $workerId;

                $portfolio->save();

                $user = User::find($dataArray['UserId']);
                $user->Autho = 2;
                $user->save();
                $department = Department::find($deptId);
                $department->NumOfWorker += 1;
                $department->save();
                $request->status = 'Successful';
                $request->save();
                if ($worker && $portfolio && $user && $department)
                    return response()->json([
                        'status' => true,
                        'message' => 'تم الحفظ بنجاح',
                    ]);
                else
                    return response()->json([
                        'status' => false,
                        'message' => 'فشل الحفظ برجاء المحاوله مجددا',
                    ]);
    }
    public function rejectFromOrderTo($id){
        $reqId = $id;
        $request = Requests::find($reqId);
        $request->status = 'Cancelled';
        $request->save();
        if ($request)
            return response()->json([
                'status' => true,
                'message' => 'تم رفض الطلب ',
            ]);
        else
            return response()->json([
                'status' => false,
                'message' => 'فشل  برجاء المحاوله مجددا',
            ]);
    }


    public function showWorkerDetailsDashboad($id)
    {
        $worker = Worker::with('user', 'department', 'portfoli')->withCount('portfoli as portfolio_count')->find($id);
        $departments = Department::all();
        return view('dashboard.workers.worker-details', compact('worker','departments'));
    }
    public function showWorkerDetails()
    {
        return view('dashboard.workers.worker-details');
    }
    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        $user = $worker->user;
        $portfolis = $worker->portfoli()->latest()->take(3)->get();

        return view('WebSite.workerDash2.showWorker.index',compact('worker','user','portfolis'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worker $worker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Worker $worker)
    {


        if($request->has('img_worker')){

            $fileName = pathinfo($worker->personal_image, PATHINFO_FILENAME);

            $img = $request->file('img_worker');
            $name = $fileName .'.'. $img->extension() ;
            $img->move(public_path('assets/workerImages'), $name);
            $img1= 'assets/workerImages/' . $name;
            $worker->update([
                'personal_image'=>$img1,
            ]);

        }
        elseif($request->has('cover')){
            $fileName = pathinfo($worker->Image_cover, PATHINFO_FILENAME);

            $img = $request->file('cover');
            $name = $fileName .'.'. $img->extension() ;
            $img->move(public_path('assets/workerImages'), $name);
            $img2= 'assets/workerImages/' . $name;

            $worker->update([
                'Image_cover'=>$img2,
            ]);
        }
        elseif($request->has('about')){
            $worker->update([

                'about'=>$request->about,
                'price_perHour'=> $request->price_perHour,
                'price_perMatter'=>$request->price_perMatter,
            ]);
        }




        return redirect()->route('user.show',Auth::user());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        //
    }
}
