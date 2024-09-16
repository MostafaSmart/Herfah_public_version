<?php

namespace App;
namespace App\Traits;
use Illuminate\Support\Facades\Storage;
trait FileUploadTriat
{
    public function uploadFile($data,$folderName,$filename)
    {
    $date=now();
    $years=$date->year;
    $monthes=$date->month;
    $days=$date->day;
    $time=$date->timestamp;
    $jsonData = json_encode($data,JSON_UNESCAPED_UNICODE);
    Storage::disk("Herfah")->put("$folderName\\$years\\$monthes\\$days\\$time$filename.json", $jsonData);
    $path="$folderName\\$years\\$monthes\\$days\\$time$filename.json";
    return $path;
    }
}
