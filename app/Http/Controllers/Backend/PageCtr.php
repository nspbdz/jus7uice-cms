<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNavbarRequest;
use App\Http\Requests\StorePageRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Navbar;
use App\Models\Page;
use Datatables;
use Validator;
use Illuminate\Validation\Rule;
use DB;
use Illuminate\Support\Facades\Redis;

class PageCtr extends Controller
{

    public function all()
    {
        $posts = Page::orderBy('position', 'asc')->get();

        return view('backend.page.index', compact('posts'));
        // return view('backend.page.index');
    }

    public function index()
    {
        $posts = Page::orderBy('id', 'desc')->get();

        return view('backend.page.index', compact('posts'));
        // return view('backend.page.index');
    }

   

    function getData(Request $request)
    {

        // dd('masuk');

        if ($request->ajax()) {

            $data = Page::select('*')->orderBy('position', 'ASC')->get();
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

                // ->addColumn('status', function ($row) {
                //     $string = '';
                //     if ($row->status == "1") $string = '<span class="badge bg-green">Active</span>';
                //     else $string = '<span class="badge">Not Actived</span>';
                //     return $string;
                // })
                ->addColumn('action', function ($row) {
                    $action = '
    			<a href="' . url(BACKEND_PATH . 'page.edit?id=' . $row->id) . '" data-toggle="ajaxModal" data-title="Navbar | Edit" data-class="modal-lg">Edit</a>
    		';
                    return $action;
                })
                ->rawColumns(['chkbox','url','title','sort', 'status', 'action'])
                ->make(true);
        }
    }

    public function getCreate(Request $request)
    {
        $data = Page::find($request->id);
        $navbars = Page::get();
        return view('backend.page.create', compact('data', 'navbars'));
       
    }

    public function store(StorePageRequest $request)
    {

        // Mendapatkan request->page dalam bentuk huruf kapital pertama
        $page = ucfirst($request->page);

        // Membuat variabel URL dengan mengganti spasi dengan garis bawah (_) dan mengkonversi ke huruf kecil (lowercase)
        $url = '/page/' . str_replace(' ', '_', strtolower(request()->input('page')));
        $slug = str_replace(' ', '_', strtolower(request()->input('page')));
        // dd($slug);

        $lastPosition = Page::orderBy('position', 'DESC')->first();
        $page = new Page();
        $page->url = $url;
        $page->slug = $slug;
        $page->page = $request->page;
        $page->content = $request->content;
        $page->position = $lastPosition->position + 1;
        $page->author_id = 1;
        $page->status = $request->status;
        $page->save();

        return redirect('/admin/page')->with('msg', "Berhasil tersimpan");
    }

   

    function getEdit(Request $request)
    {
        $data = Page::find($request->id);
        return view('backend.page.edit', compact('data'));
    }

    public function update(StorePageRequest $request)
    {

         // Mendapatkan request->page dalam bentuk huruf kapital pertama
         $page = ucfirst($request->page);

         // Membuat variabel URL dengan mengganti spasi dengan garis bawah (_) dan mengkonversi ke huruf kecil (lowercase)
         $url = '/page/' . str_replace(' ', '_', strtolower(request()->input('page')));
         $slug = str_replace(' ', '_', strtolower(request()->input('page')));
         // dd($slug);
 

        $page = Page::findOrFail($request->id);
        $page->url = $url;
        $page->slug = $slug;
        $page->page = $request->page;
        $page->content = $request->content;
        $page->status = $request->status;
        $page->save();

        return redirect('/admin/page')->with('msg', "Berhasil tersimpan");

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
        $data = Page::whereIn('id', $request->deleteItems)->update(['status' => 0]);
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
        $posts = Page::orderBy('position', 'ASC')->get();

        return view('backend.page.post', compact('posts'));
    }


    public function position(Request $request)
    {
        // return 1;
        $posts = Page::all();

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
