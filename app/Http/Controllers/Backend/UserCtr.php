<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Datatables;
use Hash;
use Str;

use App\Models\User;

class UserCtr extends Controller
{
    function index(Request $request){
		return view('backend.user');
	} 
	
	function getData(Request $request){
		
		$rows = User::where('status','<',2)->select('*');
		
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
				<a href="'.url(BACKEND_PATH.'user.edit?uuid='.$row->uuid).'" data-toggle="ajaxModal" data-title="User | Edit">Edit</a>
			
			';
			return $action;
		})
		->addIndexColumn()
		->rawColumns(['chkbox','status','action'])
		->make();
		
	}
	
	# Create
	function getCreate(Request $request){
		return view('backend.user_create');
	}
	
	# post: Create
	function postCreate(Request $request){

		# Validate
		$validator = Validator::make($request->all(), [
			'name' => 'required|string',
			'email' => 'required|email',
			'password' => 'required|string|min:4',
		]);
		
		if (!$validator->passes()) {
			if($request->ajax()){
				return response()->json(['error'=>$validator->errors()->all()]);
			}
			return redirect()->back()->withErrors($validator->errors()->all());	
		}
		
		$request->merge([
			'uuid' => Str::uuid(),
			'password' => Hash::make($request->password),
		]);
		
		# Save Data
		$row = new User;
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
		
		$data = User::where('uuid',$request->uuid)->first();
		return view('backend.user_edit',compact('data'));
	}
	
	# post: Create
	function postEdit(Request $request){

		# Validate
		$validator = Validator::make($request->all(), [
			'name' => 'required|string',
			'email' => 'required|email',
			'password' => 'nullable|string|min:4',
		]);
		
		if (!$validator->passes()) {
			if($request->ajax()){
				return response()->json(['error'=>$validator->errors()->all()]);
			}
			return redirect()->back()->withErrors($validator->errors()->all());	
		}
		
		if(strlen($request->password) > 0){
			$request->merge([
				'password' => Hash::make($request->password),
			]);
		}
		
		# Save Data
		$row = User::where('uuid',$request->uuid)->first();
		$row->fill($request->all());
		$row->save();
		
		# Redirect
		if($request->ajax()){
			return response()->json(['message'=>["Berhasil diperbarui"]]);
		}
		return redirect()->back()->with('msg',"Berhasil diperbarui");
	}
	
}
