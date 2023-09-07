<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use Datatables;
use Str;

use App\Models\MediaAlbum;

class MediaAlbumCtr extends Controller
{
    # Index
	function index(Request $request){
		return view('backend.media_album');
	} 
	
	function getData(Request $request){
		
		$rows = MediaAlbum::where('status','<',2)->select('*');
		
        return Datatables::of($rows)
		->addColumn('chkbox',function($row){
			return '<input class="form-check-input" type="checkbox" name="deleteItems[]" value="'.$row->id.'" />';
		})
		->addColumn('status',function($row){
			$string = '';
			if($row->status=="1") $string = '<span class="badge bg-green">Active</span>'; else $string = '<span class="badge">Not Actived</span>';
			return $string;
		})
		->addColumn('action',function($row){
			$action = '
				<a href="'.url(BACKEND_PATH.'media.album.edit?uuid='.$row->uuid).'" data-toggle="ajaxModal" data-title="Album | Edit">Edit</a>
			
			';
			return $action;
		})
		->addIndexColumn()
		->rawColumns(['chkbox','status','action'])
		->make();
		
	}
	
	# Create
	function getCreate(Request $request){
		return view('backend.media_album_create');
	}
	
	# post: Create
	function postCreate(Request $request){

		# Validate
		$validator = Validator::make($request->all(), [
			'title' => 'required|string|unique:media_album,title',
		]);
		
		if (!$validator->passes()) {
			if($request->ajax()){
				return response()->json(['error'=>$validator->errors()->all()]);
			}
			return redirect()->back()->withErrors($validator->errors()->all());	
		}
		
		$request->merge([
			'uuid' => Str::uuid(),
		]);
		
		# Save Data
		$row = new MediaAlbum;
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
		
		$data = MediaAlbum::where('uuid',$request->uuid)->first();
		return view('backend.media_album_edit',compact('data'));
	}
	
	# post: Create
	function postEdit(Request $request){

		# Validate
		$validator = Validator::make($request->all(), [
			'title' => [
				'required','string',
				Rule::unique("media_album")->ignore($request->uuid,"uuid")
			],
		]);
		
		if (!$validator->passes()) {
			if($request->ajax()){
				return response()->json(['error'=>$validator->errors()->all()]);
			}
			return redirect()->back()->withErrors($validator->errors()->all());	
		}
		
		# Save Data
		$row = MediaAlbum::where('uuid',$request->uuid)->first();
		$row->fill($request->all());
		$row->save();
		
		# Redirect
		if($request->ajax()){
			return response()->json(['message'=>["Berhasil diperbarui"]]);
		}
		return redirect()->back()->with('msg',"Berhasil diperbarui");
	}
	
}
