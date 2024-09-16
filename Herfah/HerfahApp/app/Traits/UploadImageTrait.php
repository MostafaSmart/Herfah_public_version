<?php

namespace App;
namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
trait UploadImageTrait
{
    public function uploadImage(Request $request,$folderName,$inputname)
    {
        $date=now();
        $years=$date->year;
        $monthes=$date->month;
        $days=$date->day;
        $image=$request->file($inputname)->getClientOriginalName();
        $path=$request->file($inputname)->storeAs("Images\\$years\\$monthes\\$days\\$folderName",$image,'Herfah');
        return $path ;
    }
    public function uploadMultipleImages(Request $request, $inputName, $folderName)
    {
        $uploadedPaths = []; // Array to store the paths of uploaded files

        if ($request->hasFile($inputName)) {
            $files = $request->file($inputName);

            foreach ($files as $file) {
                $path = $this->uploadImage2($file, $folderName);
                $uploadedPaths[] = $path;

            }
            return $uploadedPaths;

        }


    }

    public function uploadImage2($file, $folderName)
    {
        $date = now();
        $year = $date->year;
        $month = $date->month;
        $day = $date->day;
        $img = $file->getClientOriginalName();

        $path = $file->storeAs("Images\\$year\\$month\\$day\\$folderName",$img,'Herfah');

        return $path ;
    }

    public function uploadManyImages(UploadedFile $file, $folderName, $inputname)
    {
        // تعتبر متغير $file من نوع Illuminate\Http\UploadedFile
        $date = now();
        $years = $date->year;
        $monthes = $date->month;
        $days = $date->day;
        $image = $file->getClientOriginalName();
        $path = $file->storeAs("Images/$years/$monthes/$days/$folderName", $image, 'Herfah');
        return $path;
    }
}
