<?php

namespace App\Models;

use App\SearchTrait;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class BadmintonField extends Model
{
    use HasFactory,SearchTrait;

    protected $table = 'badminton_fields';

    protected $fillable = [
        'field_type_id', 
        'name', 
        'price', 
        'width', 
        'height',
        'img', 
        'is_available'
    ];

    public function field_type()
    {
        return $this->belongsTo(FieldType::class, 'field_type_id', 'id');
    }

    public function badminton_images(){
        return $this->hasMany(BadmintonImage::class,'badminton_field_id','id');
    }

    // Helper
    public function available()
    {
        return $this->attributes['is_available'] < 1 ? false : true;
    }

    public function uploadCover($file){
        try{
            $oldFile = str_replace("storage","public",$this->attributes['img']);
            if (Storage::exists($oldFile)) {
                Storage::delete($oldFile);
            }
            $ext = $file->extension();
            $filename = Str::random(30).".".$ext;
            $fullPath = "badminton-field/cover-{$filename}";
            $file->storeAs("public", $fullPath);
            $this->update(['img' => "storage/$fullPath"]);
            $this->touch();
            return true;
        }catch(Exception $e){
            return false;
        }
    }
    
}
