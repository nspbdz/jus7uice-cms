<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNavbarRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Navbar;
use Datatables;
use Validator;
use Illuminate\Validation\Rule;
use DB;

class NavbarCtr extends Controller
{

    public function all()
    {
        $posts = Navbar::orderBy('position', 'asc')->get();

        return view('backend.navbar.index', compact('posts'));
        // return view('backend.navbar.index');
    }

    public function index()
    {
        $posts = Navbar::orderBy('id', 'desc')->get();

        return view('backend.navbar.index', compact('posts'));
        // return view('backend.navbar.index');
    }

    // function getData(Request $request)
    // {
    //     $orderColumn = $request['order'][0]['column'] ?? null;
    //     $orderCol = $request['columns'][(int)$orderColumn]['name'] ?? null;
    //     $orderDir = $request['order'][0]['dir'] ?? null;
    //     $search = $request['search']['value'] ?? null;
    //     $limit = request('length');
    //     $start = request('start');
    //     $navbars = new Navbar();
    //     $recordsFiltered = $navbars->countCampaign($search);
    //     $data = $navbars->datatables($limit, $start, $search, $orderCol, $orderDir);
    //     $recordsTotal = $navbars->countCampaign();

    //     return response()->json([
    //         'draw' => intval(request('draw')),
    //         'recordsTotal' => intval($recordsTotal),
    //         'recordsFiltered' => $recordsFiltered,
    //         'data' => $data,
    //     ]);
    // }

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
                ->addColumn('title', function ($row) {
                    return $row->title;
                })
                ->addColumn('url', function ($row) {
                    return $row->url;
                })

                ->addColumn('status', function ($row) {
                    $string = '';
                    if ($row->status == "1") $string = '<span class="badge bg-green">Active</span>';
                    else $string = '<span class="badge">Not Actived</span>';
                    return $string;
                })
                ->addColumn('action', function ($row) {
                    $action = '
    			<a href="' . url(BACKEND_PATH . 'navbar.edit?id=' . $row->id) . '" data-toggle="ajaxModal" data-title="Navbar | Edit" data-class="modal-lg">Edit</a>
    		';
                    return $action;
                })
                ->rawColumns(['chkbox','url','title','sort', 'status', 'action'])
                ->make(true);
        }
    }

    public function getCreate()
    {
        return view('backend.navbar.create');
    }

    public function store(StoreNavbarRequest $request)
    {
        // DD($request->thumbnail);


        $article = new Navbar();
        $lastArticle = $article::orderBy('position', 'DESC')->first();
        // dd($lastArticle->position);

        $article->title = $request->title;
        $article->position = $lastArticle->position + 1;
        $article->url = $request->url;
        $article->save();

        if ($request->ajax()) {
            return response()->json(['message' => ["Berhasil tersimpan"]]);
        }
        return redirect()->back()->with('msg', "Berhasil tersimpan");
    }

    function getEdit(Request $request)
    {
        $data = Navbar::find($request->id);
        return view('backend.navbar.edit', compact('data'));
    }

    public function update(StoreNavbarRequest $request)
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
        $data = Navbar::whereIn('id', $request->deleteItems)->update(['status' => 0]);
        // dd($data);
        # Redirect
        if ($request->ajax()) {
        // return response()->json('success', 200);

            return response()->json(['message' => ["Berhasil diperbarui"] , 'status' => 'success'] );
        }
        return redirect()->back()->with('msg', "Berhasil diperbarui");
    }


    public function indexTest()
    {
        $posts = Navbar::orderBy('position', 'ASC')->get();

        return view('backend.navbar.post', compact('posts'));
    }


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
