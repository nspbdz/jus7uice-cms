<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Navbar;
use Datatables;
use Validator;
use Illuminate\Validation\Rule;


class NavbarCtr extends Controller
{
    public function index()
    {
        $posts = Navbar::orderBy('id', 'desc')->get();

        return view('backend.navbar.index', compact('posts'));
        // return view('backend.navbar.index');
    }

    function getData(Request $request)
    {


        if ($request->ajax()) {

            $data = Navbar::select('*')->where('status', 1)->orderBy('position', 'ASC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('chkbox', function ($row) {
                    return '<input class="form-check-input" type="checkbox" name="deleteItems[]" value="' . $row->id . '" />';
                })
                ->addColumn('sort', function ($row) {
                    return '<i class="fa fa-sort"></i>'; // Replace 'fa fa-sort' with your desired icon class
                })

                ->addColumn('status', function ($row) {
                    $string = '';
                    if ($row->status == "1") $string = '<span class="badge bg-green">Active</span>';
                    else $string = '<span class="badge">Not Actived</span>';
                    return $string;
                })
                ->addColumn('action', function ($row) {
                    $action = '
				<a href="' . url(BACKEND_PATH . 'navbar.edit?id=' . $row->id) . '" data-toggle="ajaxModal" data-title="Administrator Account | Edit" data-class="modal-lg">Edit</a>
			';
                    return $action;
                })
                ->rawColumns(['chkbox','sort', 'status', 'action'])
                ->make(true);
        }
    }

    public function getCreate()
    {
        return view('backend.navbar.create');
    }

    public function store(Request $request)
    {
        // DD($request->thumbnail);


        $article = new Navbar();
        $lastArticle=$article::orderBy('position', 'DESC')->first();
        // dd($lastArticle->position);

        $article->title = $request->title;
        $article->position = $lastArticle->position+1;
        $article->url = $request->url;
        $article->save();

        return redirect()->back()->with('msg', "Berhasil tersimpan");
    }

    function getEdit(Request $request)
    {
        $data = Navbar::find($request->id);
        return view('backend.navbar.edit', compact('data'));
    }

    public function update(Request $request)
    {

        $article = Navbar::findOrFail($request->id);
        $article->title = $request->title;
        $article->position = 1;
        $article->url = $request->url;
        $article->save();

        return redirect()->back()->with('msg', "Berhasil tersimpan");
    }

    function getView(Request $request)
    {
    }

    function postDelete(Request $request)
    {
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
        Navbar::whereIn('id', $request->deleteItems)->update(['status' => 2]);
        
        # Redirect
        if ($request->ajax()) {
            return response()->json(['message' => ["Berhasil diperbarui"]]);
        }
        return redirect()->back()->with('msg', "Berhasil diperbarui");
    }


    public function indexTest()
    {
        $posts = Navbar::orderBy('position', 'ASC')->get();

        return view('backend.navbar.post', compact('posts'));
    }

    // public function updatePosition(Request $request)
    // {
    //     dd($request);
    //     $posts = Navbar::all();

    //     foreach ($posts as $post) {
    //         foreach ($request->order as $order) {
    //             if ($order['id'] == $post->id) {
    //                 $post->update(['position' => $order['position']]);
    //             }
    //         }
    //     }
    //     return 1;
    //     return response('Update Successfully.', 200);
    // }

    public function position(Request $request)
    {
        // return 1;
        $posts = Navbar::all();

        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['position' => $order['position']]);
                }
            }
        }


        return response()->json('success', 200);

    }
}
