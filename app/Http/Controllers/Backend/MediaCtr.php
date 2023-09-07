<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use Datatables;
use Str;
use Image;

use App\Models\MediaAlbum;
use App\Models\Media;

class MediaCtr extends Controller
{
     # Index
	function index(Request $request){
		return view('backend.media');
	} 
	
	function getData(Request $request){
		
		$rows = Media::with('album')->where('status','<',2)->select('*');
		
        return Datatables::of($rows)
		->addColumn('chkbox',function($row){
			return '<input class="form-check-input" type="checkbox" name="deleteItems[]" value="'.$row->id.'" />';
		})
		->addColumn('thumbnails',function($row){
			$string = '';
			if($row->media_thumb_url!=""){
				if(file_exists($row->media_thumb_url)){
					$string .= '<img src="'.url($row->media_thumb_url).'" height="50" />';
				}
			}
			return $string;
		})
		->addColumn('status',function($row){
			$string = '';
			if($row->status=="1") $string = '<span class="badge bg-green">Active</span>'; else $string = '<span class="badge">Not Actived</span>';
			return $string;
		})
		->addColumn('action',function($row){
			$action = '
				<a href="'.url(BACKEND_PATH.'media.edit?uuid='.$row->uuid).'" data-toggle="ajaxModal" data-title="Media | Edit">Edit</a>
			
			';
			return $action;
		})
		->addIndexColumn()
		->rawColumns(['chkbox','status','thumbnails','action'])
		->make();
		
	}
	
	# Create
	function getCreate(Request $request){
		$albumList = [''=>'Select Album:'] + MediaAlbum::where('status',1)->pluck('title','id')->toArray();
		return view('backend.media_create',compact('albumList'));
	}
	
	# post: Create
	function postCreate(Request $request){

		# Validate
		$validator = Validator::make($request->all(), [
			'album' => 'required',
			'title' => 'required|string|unique:media,title',
		]);
		
		if (!$validator->passes()) {
			if($request->ajax()){
				return response()->json(['error'=>$validator->errors()->all()]);
			}
			return redirect()->back()->withErrors($validator->errors()->all());	
		}
		
		$request->merge([
			'uuid' => Str::uuid(),
			'media_album_id' => $request->album,
		]);
		
		# Image Upload
		if ($request->hasFile('file'))
		{
			/* MKDIR */
			$dir = 'uploads/media/'.date('Y').'/'.date('m').'/'.date('d');	
			if (!file_exists($dir)) {mkdir($dir, 0777, true);}
			/* SET DIR */
			$dir = $dir.'/';
									
			/* START UPLOAD */
			$path = $request->file->path();
			$extension = strtolower($request->file->getClientOriginalExtension());
			$filename = strtolower(create_slug(substr($request->file->getClientOriginalName(),0,-4)).'_'.time().'.'.$extension);
			$filename_thumb = strtolower(create_slug(substr($request->file->getClientOriginalName(),0,-4)).'_'.time().'_thumb.'.$extension);
			$fileupload = $dir.$filename;
			if ($extension == 'png'|| $extension == 'jpg' || $extension == 'bmp' || $extension == 'gif' || $extension == 'jpeg'|| $extension == 'pjpeg')
			{
				// debug('1. intervention');
				$big_img = Image::make($path);
				$big_img->widen(1000, function ($constraint) {$constraint->upsize();});				
				$big_img->save($dir.$filename, 90);	// save to local is success
							
				// image upload			
				$thumb_img = Image::make($path);
				$thumb_img->fit(400);
				$thumb_img->save($dir.$filename_thumb, 70);// save file
				
				
				$request->merge([
					'media_type' => strtoupper($extension),
					'media_url' => $dir.$filename,
					'media_thumb_url' => $dir.$filename_thumb,
				]);
			} else {
				return response()->json(['error'=>['Only support: PNG, JPEG, BMP, GIF']]);
			}
		}
		
		
		# Save Data
		$row = new Media;
		$row->fill($request->all());
		$row->save();
		
		# Redirect
		if($request->ajax()){
			return response()->json(['message'=>["Berhasil tersimpan"]]);
		}
		return redirect()->back()->with('msg',"Berhasil tersimpan");
	}
	
	
	# Edit
	function getEdit(Request $request){
		
		$albumList = [''=>'Select Album:'] + MediaAlbum::where('status',1)->pluck('title','id')->toArray();
		$data = Media::where('uuid',$request->uuid)->first();
		return view('backend.media_edit',compact('data','albumList'));
	}
	
	# post: Create
	function postEdit(Request $request){

		# Validate
		$validator = Validator::make($request->all(), [
			'album' => 'required',
			'title' => [
				'required','string',
				Rule::unique("media")->ignore($request->uuid,'uuid')
			],
		]);
		
		if (!$validator->passes()) {
			if($request->ajax()){
				return response()->json(['error'=>$validator->errors()->all()]);
			}
			return redirect()->back()->withErrors($validator->errors()->all());	
		}
		
		if(!$media = Media::where('uuid',$request->uuid)->first()){
			if($request->ajax()){
				return response()->json(['error'=>['Media not found']]);
			}
			return redirect()->back()->withErrors(['Media not found']);	
		}
		
		# Image Upload
		if ($request->hasFile('file'))
		{
			/* MKDIR */
			$dir = 'uploads/media/'.date('Y').'/'.date('m').'/'.date('d');	
			if (!file_exists($dir)) {mkdir($dir, 0777, true);}
			/* SET DIR */
			$dir = $dir.'/';
									
			/* START UPLOAD */
			$path = $request->file->path();
			$extension = strtolower($request->file->getClientOriginalExtension());
			$filename = strtolower(create_slug(substr($request->file->getClientOriginalName(),0,-4)).'_'.time().'.'.$extension);
			$filename_thumb = strtolower(create_slug(substr($request->file->getClientOriginalName(),0,-4)).'_'.time().'_thumb.'.$extension);
			$fileupload = $dir.$filename;
			if ($extension == 'png'|| $extension == 'jpg' || $extension == 'bmp' || $extension == 'gif' || $extension == 'jpeg'|| $extension == 'pjpeg')
			{
				// debug('1. intervention');
				$big_img = Image::make($path);
				$big_img->widen(1000, function ($constraint) {$constraint->upsize();});				
				$big_img->save($dir.$filename, 90);	// save to local is success
							
				// image upload			
				$thumb_img = Image::make($path);
				$thumb_img->fit(400);
				$thumb_img->save($dir.$filename_thumb, 70);// save file
				
				# Delete Old Image
				if(file_exists($media->media_url)){unlink($media->media_url);}
				if(file_exists($media->media_thumb_url)){unlink($media->media_thumb_url);}
				
				# update
				Media::where('uuid',$request->uuid)->update([
					'media_type' => strtoupper($extension),
					'media_url' => $dir.$filename,
					'media_thumb_url' => $dir.$filename_thumb,
				]);
				
			} else {
				return response()->json(['error'=>['Only support: PNG, JPEG, BMP, GIF']]);
			}
		}
		
		# Save Data
		Media::where('uuid',$request->uuid)->update([
			'title' => $request->title,
			'media_album_id' => $request->album,
			'status' => $request->status,
		]);
		
		# Redirect
		if($request->ajax()){
			return response()->json(['message'=>["Berhasil diperbarui"]]);
		}
		return redirect()->back()->with('msg',"Berhasil diperbarui");
	}
}
