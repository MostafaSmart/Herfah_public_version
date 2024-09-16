<?php

namespace App\Traits;
use Illuminate\Http\Request;
trait UploadImages
{
    public function uploadImage(Request $request,$folderName,$filename)
    {
        $date=now();
        $years=$date->year;
        $monthes=$date->month;
        $days=$date->day;
        $image=$request->file($filename)->getClientOriginalName();
        $path=$request->file($filename)->storeAs("Images\\$years\\$monthes\\$days\\$folderName",$image,'Herfah');
        return $path;
    }
}
