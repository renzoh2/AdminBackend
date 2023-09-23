<?php

namespace App\Http\Helper;

use \Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;

class FileHandler
{
    public static function prepareFileName(array $files)
    {
        $fileNames = [];
        foreach($files as $image)
        {
            $imgName = mt_rand(1000000000000, 9999999999999).Carbon::now()->format('YmdTHis');
            $ext = $image->extension();
            $fileName = $imgName.'.'.$ext;
            $fileNames[] = $fileName;
        }
        return $fileNames;
    }

    public static function fileUpload(array $files, array $fileNames)
    {
        foreach($files as $index => $image)
        {
            $image->storeAs('images',$fileNames[$index]);
        }
    } 
}

?>