<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;
use Illuminate\Validation\Rule;
use Datatables;
use Route;
use Hash;

use App\Models\Admin;
use App\Models\AdminGroup;

class AdministratorCtr extends Controller
{
    
	function index(Request $request){
		return view('backend.administrator');
	}
	
	function getData(Request $request){
		$users = Admin::with('group')->where('admin.status',1)->select('admin.*');
        return Datatables::of($users)
		->addColumn('chkbox',function($row){
			if($row->is_superadmin <= 0) return '<input class="form-check-input" type="checkbox" name="deleteItems[]" value="'.$row->id.'" />';
			else return '';
		})
		->addColumn('status',function($row){
			$string = '';
			if($row->status=="1") $string = '<span class="badge bg-green">Active</span>'; else $string = '<span class="badge">Not Actived</span>';
			return $string;
		})
		->addColumn('action',function($row){
			$action = '
				<a href="'.url(BACKEND_PATH.'administrator.account.edit?id='.$row->id).'" data-toggle="ajaxModal" data-title="Administrator Account | Edit" data-class="modal-lg">Edit</a>			
			';
			return $action;
		})
		->rawColumns(['chkbox','status','action'])
		->make();
	}
	
	function getCreate(Request $request){
		$groupList = [''=>'Select Group:'] + AdminGroup::where('status',1)->pluck('name','id')->toArray();
		return view('backend.administrator_create',compact('groupList'));
	}
	
	function postCreate(Request $request){
		# Validate
		$validator = Validator::make($request->all(), [
			'group' => 'required|integer',
			'username' => 'required|string|min:4|regex:/^[.a-zA-Z0-9]+$/u|unique:admin,username',
			'name' => 'required|string',
			'email' => 'nullable|email',
			'password' => 'required|string|min:4|regex:/^\S*$/u',
		]);
		
		if (!$validator->passes()) {
			if($request->ajax()){
				return response()->json(['error'=>$validator->errors()->all()]);
			}
			return redirect()->back()->withErrors($validator->errors()->all());	
		}
		
		$request->merge([
			'admin_group_id' => $request->group,
			'password' => Hash::make($request->password),
		]);
		
		# Save Data
		$row = new Admin;
		$row->fill($request->all());
		$row->save();
		
		# Redirect
		if($request->ajax()){
			return response()->json(['message'=>["Berhasil tersimpan"]]);
		}
		return redirect()->back()->with('msg',"Berhasil tersimpan");
	}
	
	function getEdit(Request $request){
		$data = Admin::find($request->id);
		$groupList = [''=>'Select Group:'] + AdminGroup::where('status',1)->pluck('name','id')->toArray();
		return view('backend.administrator_edit',compact('data','groupList'));
	}
	
	function postEdit(Request $request){
		# Validate
		$validator = Validator::make($request->all(), [
			'group' => 'required|integer',
			'username' => [
				'required','string','min:4','regex:/^[.a-zA-Z0-9]+$/u',
				Rule::unique('admin')->ignore($request->id,'id')
			],
			'name' => 'required|string',
			'email' => 'nullable|email',
		]);
		
		if (!$validator->passes()) {
			if($request->ajax()){
				return response()->json(['error'=>$validator->errors()->all()]);
			}
			return redirect()->back()->withErrors($validator->errors()->all());	
		}
		
		if(strlen($request->password)>0){
			
			$validator = Validator::make($request->all(), [
				'password' => 'required|string|min:4|regex:/^\S*$/u',
			]);			

			if (!$validator->passes()) {
				if($request->ajax()){
					return response()->json(['error'=>$validator->errors()->all()]);
				}
				return redirect()->back()->withErrors($validator->errors()->all());	
			}
			
			$row = Admin::find($request->id);
			$row->password = Hash::make($request->password);
			$row->save();
			
		}		

		/* Save to DB */
		$row = Admin::find($request->id);
		$row->username = $request->username;
		$row->name = $request->name;
		$row->email = $request->email;
		$row->admin_group_id = $request->group;
		$row->save();
		
		# Redirect
		if($request->ajax()){
			return response()->json(['message'=>["Berhasil tersimpan"]]);
		}
		return redirect()->back()->with('msg',"Berhasil tersimpan");
	}
	
	function getView(Request $request){}
	
	function postDelete(Request $request){
		# Validate
		$validator = Validator::make($request->all(), [
			'deleteItems' => 'required',
		]);
		
		if (!$validator->passes()) {
			if($request->ajax()){
				return response()->json(['error'=>$validator->errors()->all()]);
			}
			return redirect()->back()->withErrors($validator->errors()->all());	
		}
		
		# Upd DB
		Admin::whereIn('id',$request->deleteItems)->update(['status'=>2]);
		
		# Redirect
		if($request->ajax()){
			return response()->json(['message'=>["Berhasil diperbarui"]]);
		}
		return redirect()->back()->with('msg',"Berhasil diperbarui");
	}
}
