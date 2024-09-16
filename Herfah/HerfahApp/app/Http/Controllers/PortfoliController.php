<?php

namespace App\Http\Controllers;
use App\Models\Portfoli;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\UploadImageTrait;

class PortfoliController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function addPortfolioFromDashboard(Request $request)
    {

        if ($request->hasFile('images')) {
            $images = [];

            foreach ($request->file('images') as $image) {
                $imageName = $this->uploadManyImages($image, 'Portfolio', 'portifolioImgMultiple');
                $images[] = $imageName;
            }
        }
        $portfolio = Portfoli::create([
            'About_Project' => $request->description,
            'Images' => json_encode($images),
            'worker_id' => $request->worker_id,
        ]);
        if ($portfolio)
            return response()->json([
                'status' => true,
            ]);
        else
            return response()->json([
                'status' => false,
            ]);
    }
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        if($request->hasFile('photos')){
            $about = $request->about;
            $w_id = $request->w_id;

            $paths = "";

            $files = $request->file('photos');
            $count = 0;
            foreach ($files as $file)
            {
                // projectimage
                $name = Str::uuid().'.'.$file->extension();
                $file->move(public_path('assets/projectimage'), $name);
                $path = 'assets/projectimage/' . $name;
                if($count>0){
                    $paths = $paths . ',' . $path;
                }
                else{
                    $paths =$path;

                }

                $count++;
            }




            $portfoli = new Portfoli();
            $portfoli->worker_id = $w_id;
            $portfoli->About_Project = $about;
            $portfoli->Images = $paths;


            $portfoli->save();

            return redirect()->route('user.show',Auth::user());



        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfoli $portfoli)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfoli $portfoli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfoli $portfoli)
    {


        $imagesPaths = $portfoli->Images;
        $w_id = $request->w_id;
        $about = $request->about;

        if($request->has('old_images')){


            $imagesPathsArray = explode(',', $imagesPaths);

            $deleteImagesPaths = $request->input('old_images');

            foreach($deleteImagesPaths as $deleteimg){
                $pp1 = public_path($deleteimg);
                unlink($pp1);
            }

            $remainingImagesPaths = array_diff($imagesPathsArray, $deleteImagesPaths);

            $imagesPaths = "";
            $count = 0;
            foreach($remainingImagesPaths as $pp ){

                if ($count > 0) {
                    $imagesPaths = $imagesPaths. ',' .$pp;

                }
                else{
                $imagesPaths = $pp;

                }

                $count++;
            }

        }



        if($request->hasFile('photos')){
            $files = $request->file('photos');

            $paths = "";
            $count = 0;
            foreach ($files as $file)
            {
                // projectimage
                $name = Str::uuid().'.'.$file->extension();
                $file->move(public_path('assets/projectimage'), $name);
                $path = 'assets/projectimage/' . $name;
                if($count>0){
                    $paths = $paths . ',' . $path;
                }
                else{
                    $paths =$path;

                }

                $count++;
            }

            $imagesPaths = $imagesPaths . ',' . $paths;
        }

        $portfoli->update([
            'worker_id'=>$w_id,
            'About_Project'=>$about,
            'Images'=>$imagesPaths,
        ]);
        return redirect()->route('user.show',Auth::user());



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfoli $portfoli)
    {
        $imagesPaths = $portfoli->Images;
        $imagesPathsArray = explode(',', $imagesPaths);

        foreach($imagesPathsArray as $deleteimg){
            $pp1 = public_path($deleteimg);
            unlink($pp1);
        }
        $portfoli->delete();

        return redirect()->route('user.show',Auth::user());
    }
}
