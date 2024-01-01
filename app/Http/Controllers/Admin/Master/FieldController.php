<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FieldRequest;
use App\Models\FieldType;
use App\Models\BadmintonField;
use App\Models\BadmintonImage;
use Exception;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FieldController extends Controller
{
    public function index()
    {
        $q = request()->q;
        $fields = BadmintonField::when($q,function($query) use ($q){
            return $query->search($q);
        })->orderByDesc('updated_at')->paginate(6)->withQueryString();
        return view('admin.master.field.index',compact('fields'));
    }
    public function create()
    {
        $fieldTypes = FieldType::get();
        return view('admin.master.field.create',compact('fieldTypes'));
    }
    public function store(Request $request)
    {
        try{
            $fieldRequest  = new FieldRequest();
            $validator = Validator::make($request->all(),$fieldRequest->rules(),$fieldRequest->messages());
            if($validator->fails()){
                $errors = $validator->errors()->messages();
                $errors = Helpers::setErrors($errors);
                return redirect()->back()->with('errors',$errors)->withInput();
            }
            $data = $validator->validated();
            $badmintonField = BadmintonField::create($data);
            $id = $badmintonField->id;
            $badmintonField->uploadCover($data['img']);
            if(!empty($data['detail'])){
                BadmintonImage::uploadDetailImg($data['detail'],$id);
            }
            return redirect(route('admin.field.index'))->withSuccess('Data lapangan berhasil ditambahkan!');
        }catch(Exception $e){
            return redirect()->back()->with('errors',$e->getMessage())->withInput();
        }
    }
    public function edit(BadmintonField $field ){
        $fieldTypes = FieldType::get();
        return view('admin.master.field.edit',compact('fieldTypes','field'));
    }
    public function update(BadmintonField $field, Request $request){
        try{
            $fieldRequest  = new FieldRequest();
            $validator = Validator::make($request->all(),[
                'img' => 'nullable|file|mimes:png,jpg',
                'detail.*' => 'nullable|file|mimes:png,jpg',
                'field_type_id' => 'required',
                'name' => 'required',
                'price' => 'required|numeric',
                'width' => 'required|numeric',
                'height' => 'required|numeric',
            ],$fieldRequest->messages());
            if($validator->fails()){
                $errors = $validator->errors()->messages();
                $errors = Helpers::setErrors($errors);
                return redirect()->back()->with('errors',$errors)->withInput();
            }
            $data = $validator->validated();
            $cover = $data['img'];
            unset($data['img']);
            $field->update($data);
            if(!empty($cover)){
                $field->uploadCover($cover);
            }
            if(!empty($data['detail'])){
                $images = BadmintonImage::where(['badminton_field_id'=>$field->id]);
                foreach ($images->get() as $img) {
                    if (Storage::exists(str_replace("storage","public",$img->img))) {
                        Storage::delete(str_replace("storage","public",$img->img));
                    }
                }
                $images->delete();
                BadmintonImage::uploadDetailImg($data['detail'],$field->id);
            }
            return redirect()->back()->withSuccess('Data lapangan berhasil diubah!');
        }catch(Exception $e){
            return redirect()->back()->with('errors',$e->getMessage())->withInput();
        }
    }
    public function destroy(BadmintonField $field){
        try{
            $field->delete();
            return response()->json(['success'=>true,'message'=>'Lapangan berhasil dihapus!']);
        }catch(Exception $e){
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }
}
