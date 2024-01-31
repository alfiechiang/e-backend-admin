<?php


namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadImageService
{

    public function exec(UploadedFile $file)
    {

        $disk = 's3';
        $filePath = $file->getPathname(); // 获取临时文件的路径
    
        // 获取上传文件的原始文件名
        $fileName = $file->getClientOriginalName();
    
        // 读取文件内容
        $fileContent = file_get_contents($filePath);
    
        // 使用文件内容进行上传
        Storage::disk($disk)->put($fileName, $fileContent);
    
        // 返回文件的 URL
        return  ['img_url'=>env('AWS_URL').$fileName,'fileName'=>$fileName];
    }
}
