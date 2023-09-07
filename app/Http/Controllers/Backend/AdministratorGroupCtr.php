<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;
use Datatables;
use Route;

use App\Models\AdminGroup;

class AdministratorGroupCtr extends Controller
{
    #index
	function index(Request $request){
		return view('backend.administrator_group');
	}
	
	function getData(Request $request){
		$rows = AdminGroup::where('status','<',2);
        return Datatables::of($rows)
		->addColumn('chkbox',function($row){
			return '<input class="form-check-input" type="checkbox" name="deleteItems[]" value="'.$row->id.'" />';
		})
		->addColumn('restrical_path',function($row){
			if(strlen($row->restrical_path)>2) return implode(", ",json_decode($row->restrical_path)); else return "";
		})
		->addColumn('status',function($row){
			$string = '';
			if($row->status=="1") $string = '<span class="badge bg-green">Active</span>'; else $string = '<span class="badge">Not Actived</span>';
			return $string;
		})
		->addColumn('action',function($row){
			$action = '
				<a href="'.url(BACKEND_PATH.'administrator.group.edit?id='.$row->id).'" data-toggle="ajaxModal" data-title="Administrator Group | Edit" data-class="modal-lg">Edit</a>			
			';
			return $action;
		})
		->rawColumns(['chkbox','restrical_path','status','action'])
		->make();
	}
	
	function getCreate(Request $request){
		$routes = Route::getRoutes();
		$routeLists = [];
		foreach ($routes as $route)
		{
			if($route->methods[0] == "GET"){
				$uri = str_replace(BACKEND_PATH,'',$route->uri);
				$pos = strpos($uri, '/');
				if ($pos === false) {
					$pos2 = strpos($uri, '.data');
					if ($pos2 === false) {
						$routeLists = $routeLists + [$uri => $uri];
					}
				}
			}
		}
		
		# Exclude from Array Route
		$exclude_admin_path_root = substr(BACKEND_PATH,0,strlen(BACKEND_PATH)-1); //debug($exclude_admin_path_root);
		if(isset($routeLists[$exclude_admin_path_root])) unset($routeLists[$exclude_admin_path_root]);
		if(isset($routeLists['login'])) unset($routeLists['login']);
		if(isset($routeLists['logout'])) unset($routeLists['logout']);
		
		return view('backend.administrator_group_create',compact('routeLists'));
	}
	
	function postCreate(Request $request){
		
		# Validate
		$validator = Validator::make($request->all(), [
			'name' => 'required',
		]);
		
		if (!$validator->passes()) {
			if($request->ajax()){
				return response()->json(['error'=>$validator->errors()->all()]);
			}
			return redirect()->back()->withErrors($validator->errors()->all());	
		}
		
		if(empty($request->route)) $routes = "[]"; else $routes = json_encode($request->route);
		
		# Insert to DB
		$row = new AdminGroup;
		$row->fill($request->all());
		$row->restrical_path = $routes;
		$row->save();
		
		# Redirect
		if($request->ajax()){
			return response()->json(['message'=>["Berhasil tersimpan"]]);
		}
		return redirect()->back()->with('msg',"Berhasil tersimpan");
	}
	
	function getEdit(Request $request){
		
		# Get Route List
		$routes = Route::getRoutes();
		$routeLists = [];
		foreach ($routes as $route)
		{
			if($route->methods[0] == "GET"){
				$uri = str_replace(BACKEND_PATH,'',$route->uri);
				$pos = strpos($uri, '/');
				if ($pos === false) {
					$pos2 = strpos($uri, '.data');
					if ($pos2 === false) {
						$routeLists = $routeLists + [$uri => $uri];
					}
				}				
			}
			
		}
		
		$exclude_admin_path_root = substr(BACKEND_PATH,0,strlen(BACKEND_PATH)-1);
		if(isset($routeLists[$exclude_admin_path_root])) unset($routeLists[$exclude_admin_path_root]);
		if(isset($routeLists['login'])) unset($routeLists['login']);
		if(isset($routeLists['logout'])) unset($routeLists['logout']);
		
		# data
		$data = AdminGroup::find($request->id);
		
		return view('backend.administrator_group_edit',compact('data','routeLists'));
	}
	
	function postEdit(Request $request){
		# Validate
		$validator = Validator::make($request->all(), [
			'name' => 'required',
		]);
		
		if (!$validator->passes()) {
			if($request->ajax()){
				return response()->json(['error'=>$validator->errors()->all()]);
			}
			return redirect()->back()->withErrors($validator->errors()->all());	
		}
		
		if(empty($request->route)) $routes = "[]"; else $routes = json_encode($request->route);
		
		# Insert to DB
		$row = AdminGroup::find($request->id);
		$row->fill($request->all());
		$row->restrical_path = $routes;
		$row->save();
		
		# Redirect
		if($request->ajax()){
			return response()->json(['message'=>["Berhasil diperbarui"]]);
		}
		return redirect()->back()->with('msg',"Berhasil diperbarui");
	}
	
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
		AdminGroup::whereIn('id',$request->deleteItems)->update(['status'=>0]);
		
		# Redirect
		if($request->ajax()){
			return response()->json(['message'=>["Berhasil diperbarui"]]);
		}
		return redirect()->back()->with('msg',"Berhasil diperbarui");
	}
}
