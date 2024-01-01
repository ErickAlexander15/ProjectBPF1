<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BadmintonImage extends Model
{
    use HasFactory;

    protected $table = 'badminton_images';

    protected $fillable = ['badminton_field_id', 'img'];

    //Helper
    public static function uploadDetailImg($files, $badmintonFieldId){
        try{
           foreach ($files as $file) {
                $ext = $file->extension();
                $filename = Str::random(10).".".$ext;
                $fullPath = "badminton-field/detail-{$filename}";
                $file->storeAs("public",$fullPath);
                self::create([
                    'badminton_field_id' => $badmintonFieldId,
                    'img' => "storage/$fullPath",
                ]);
            }
            return true;
        }catch(Exception $e){
            return false;
        }
    }
}
