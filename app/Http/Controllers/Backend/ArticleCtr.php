<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;


class ArticleCtr extends Controller
{
    public function index()
    {
        return view('backend.article.index');
    }
    function getData(Request $request)
    {
        $rows = Article::with('user')->where('status', '=', 1);

        return Datatables::of($rows)
            ->addColumn('chkbox', function ($row) {
                return '<input class="form-check-input" type="checkbox" name="deleteItems[]" value="' . $row->id . '" />';
            })
            ->addColumn('title', function ($row) {
                return $row->title;
            })
            ->addColumn('status', function ($row) {
                $string = '';
                if ($row->status == "1") $string = '<span class="badge bg-green">Active</span>';
                else $string = '<span class="badge">Not Actived</span>';
                return $string;
            })
            ->addColumn('action', function ($row) {
                $action = '
				<a href="' . url(BACKEND_PATH . 'article.edit?id=' . $row->id) . '" >Edit</a>			
			';
                return $action;
            })
            ->rawColumns(['chkbox', 'title', 'status', 'action'])
            ->make();
    }

    function getCreate(Request $request)
    {
        // $groupList = [''=>'Select Group:'] + AdminGroup::where('status',1)->pluck('name','id')->toArray();
        // return view('backend.article.create',compact('groupList'));
        return view('backend.article.create');
    }

    public function store(Request $request)
    {
        // DD($request->thumbnail);

        // $user = Auth();
        // $user = auth()->user();

        // $user = Auth::backend();
        // dd($user);

        $photoPath = $this->storePhoto($request->thumbnail);

        $article = new Article();
        $article->title = $request->title;
        $article->thumbnail = $photoPath;
        $article->content = $request->content;
        // $article->author_id = $request->author_id;
        $article->author_id = 1;
        $article->status = 1;
        $article->save();

        return redirect()->back()->with('msg', "Berhasil tersimpan");
    }

    function getEdit(Request $request)
    {
        $data = Article::find($request->id);
        return view('backend.article.edit', compact('data'));
    }

    function update(Request $request)
    {

        $photoPath = $this->storePhoto($request->thumbnail);

        $article = new Article();
        $article->title = $request->title;
        $article->thumbnail = $photoPath;
        $article->content = $request->content;
        // $article->author_id = $request->author_id;
        $article->author_id = 1;
        $article->status = 1;
        $article->save();

        return view('backend.article.index');
    }

    private function storePhoto(UploadedFile $photo)
    {
        $photoData = file_get_contents($photo->getRealPath());
        $photoPath = 'uploads/article/' . uniqid() . '.' . $photo->getClientOriginalExtension();
        file_put_contents(public_path($photoPath), $photoData);
        return $photoPath;
    }

    function getView(Request $request)
    {
    }

    function postDelete(Request $request)
    {
        // dd('aa');
        # Validate
        // $validator = Validator::make($request->all(), [
        // 	'deleteItems' => 'required',
        // ]);

        // if (!$validator->passes()) {
        // 	if($request->ajax()){
        // 		return response()->json(['error'=>$validator->errors()->all()]);
        // 	}
        // 	return redirect()->back()->withErrors($validator->errors()->all());	
        // }

        # Upd DB
        Article::whereIn('id', $request->deleteItems)->update(['status' => 2]);
        // dd('masuk');
        # Redirect
        if ($request->ajax()) {
            return response()->json(['message' => ["Berhasil diperbarui"]]);
        }
        return redirect()->back()->with('msg', "Berhasil diperbarui");
    }


}
