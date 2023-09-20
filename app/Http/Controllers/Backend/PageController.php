<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class PageController extends Controller
{
    public function index()
    {
        return view('backend.content.index');
    }
    function getData(Request $request)
    {
        $rows = Page::query();

        return Datatables::of($rows)
            ->addColumn('chkbox', function ($row) {
                return '<input class="form-check-input" type="checkbox" name="deleteItems[]" value="' . $row->id . '" />';
            })
            ->addColumn('page', function ($row) {
                return $row->page;
            })
            ->addColumn('status', function ($row) {
                $string = '';
                if ($row->status == "1") $string = '<span class="badge bg-green">Active</span>';
                else $string = '<span class="badge">Not Actived</span>';
                return $string;
            })
            ->addColumn('action', function ($row) {
                $action = '
				<a href="' . url(BACKEND_PATH . 'content.edit/' . $row->id) . '" >Edit</a>
			';
                return $action;
            })
            ->rawColumns(['chkbox', 'title', 'status', 'action'])
            ->make();
    }

    function getCreate(Request $request)
    {

        // $groupList = [''=>'Select Group:'] + AdminGroup::where('status',1)->pluck('name','id')->toArray();
        $data = content::find($request->id);
        return view('backend.content.create', compact('data'));
        // return view('backend.content.create');
    }

    public function store(Request $request)
    {

        $content = new Content();
        $content->title = $request->title;
        $content->content = $request->content;
        $content->author_id = 1;
        $content->status = $request->status;
        $content->save();

        return redirect('/admin/content')->with('msg', "Berhasil tersimpan");
    }

    function getEdit(Request $request)
    {
        $data = content::find($request->id);
        return view('backend.content.edit', compact('data'));
    }

    function update(Request $request)
    {
        // dd($request);
        $content = Content::find($request->id);
        $content->title = $request->title;
        $content->content = $request->content;
        $content->status = $request->status;

        // Save the changes
        $content->save();

        return view('backend.content.index')->with('success', 'Content updated successfully.');
    }

    function getView(Request $request)
    {
    }

    function postDelete(Request $request)
    {
        // dd('aa');
        # Validate
        $validator = Validator::make($request->all(), [
            'deleteItems' => 'required',
        ]);

        if (!$validator->passes()) {
            if ($request->ajax()) {
                return response()->json(['error' => $validator->errors()->all()]);
            }
            return redirect()->back()->withErrors($validator->errors()->all());
        }

        # Upd DB
        Content::whereIn('id', $request->deleteItems)->update(['status' => 2]);
        // dd('masuk');
        # Redirect
        if ($request->ajax()) {
            return response()->json(['message' => ["Berhasil diperbarui"]]);
        }
        return redirect()->back()->with('msg', "Berhasil diperbarui");
    }
}
