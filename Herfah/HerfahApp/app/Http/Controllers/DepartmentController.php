<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Traits\UploadImages;


class DepartmentController extends Controller
{
    use UploadImages;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.categories.category-list');

        // return view('WebSite.team');
    }
    public function getdepts()
    {
        //
        // return view('dashboard.categories.category-list');
    }

    // handle fetch all Departments ajax request
    public function fetchAll()
    {
        $depts = Department::all();
        return response()->json(['depts' => $depts]);
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

        $request->validate([
            'dept_name' => 'required|max:255',
            'description' => 'required',
            'imgcover' => 'image|mimes:jpg,jpeg,png,gif',
        ]);

        $img =$this->uploadImage($request,'depts','imgcover');
        $dept = Department::create([
            'D_Name' => $request->dept_name,
            'D_About' => $request->description,
            'imgcover' => $img,
            'NumOfWorker' => 0,
        ]);
        if ($dept)
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

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $id = $department->id;
        $dept = Department::find($id);
        return response()->json($dept);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'deptName' => 'required|max:255',
            'deptDesc' => 'required',
            'deptImage' => 'image|mimes:jpg,jpeg,png,gif',
        ]);

        $imgDept =$this->uploadImage($request,'depts','deptImage');
        $dept = Department::find($request->dept_id);
        $deptData = ['D_Name' => $request->deptName, 'D_About' => $request->deptDesc, 'imgcover' => $imgDept, ];

		$dept->update($deptData);
        if ($dept)
            return response()->json([
                'status' => true,
                'message' => 'تم التعديل بنجاح',
            ]);

        else
            return response()->json([
                'status' => false,
                'message' => 'فشل التعديل برجاء المحاوله مجددا',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
		$dept  = Department::find($id);
        if ($dept) {
            Department::destroy($id);
            if ($dept->imgcover) {
                $imgDept = public_path($dept->imgcover);
                if (file_exists($imgDept)) {
                    unlink($imgDept);
                }
            }
        }
    }
}
