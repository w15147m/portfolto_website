<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;
trait ManageFiles
{
    protected $disk = "public";
    public function uploadImg($path, $file)
    {
        return Storage::disk($this->disk)->put($path, $file);
    }
    public function deleteFile($path)
    {
        if ($path && Storage::disk($this->disk)->exists($path)) {
            return  Storage::disk($this->disk)->delete($path);
        }
        return true;
    }
}
