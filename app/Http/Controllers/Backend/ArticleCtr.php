<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL; // Import URL facade


class ArticleCtr extends Controller
{

    public function article(Request $request)
    {

           // Mengambil segmen ke-1 dan seterusnya (indeks dimulai dari 0)
            $segments = $request->segments();

            // Menggabungkan segmen menjadi satu string
            $urlPath = implode('/', $segments); // Ini akan menghasilkan "article/test_article"
            // dd($urlPath);
            // Gunakan $urlPath sesuai kebutuhan Anda

            $data=Article::where('url', '=', $urlPath)->first();
            // $article = Article::where('url', '=', $urlPath)->first();Ï
            // dd($data);

        return view('backend.article.article', ['data' => $data]);
    }
    public function index()
    {
        return view('backend.article.index');
    }
    function getData(Request $request)
    {
        $rows = Article::with('user');

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
				<a href="' . url(BACKEND_PATH . 'article.edit/' . $row->id) . '" >Edit</a>
			';
                return $action;
            })
            ->rawColumns(['chkbox', 'title', 'status', 'action'])
            ->make();
    }

    function getCreate(Request $request)
    {

        // $groupList = [''=>'Select Group:'] + AdminGroup::where('status',1)->pluck('name','id')->toArray();
        $data = Article::find($request->id);
        return view('backend.article.create', compact('data'));
        // return view('backend.article.create');
    }

    public function store(StoreArticleRequest $request)
    {


        //  // Mengganti spasi dengan garis bawah (_)
        //  $url = str_replace(' ', '_', $request->title);
        // //  // Mengubah huruf besar menjadi huruf kecil
        //  $url = strtolower($url);

        //  $url=processUrlLogic($request->title);
        //  dd($url);

        $photoPath = $this->storePhoto($request->thumbnail);

        $article = new Article();
        $article->title = $request->title;
        $article->url = processUrlLogic($request->title);
        $article->thumbnail = $photoPath;
        $article->content = $request->content;
        // $article->author_id = $request->author_id;
        $article->author_id = 1;
        $article->status = $request->status;
        $article->save();

        return redirect('/admin/article')->with('msg', "Berhasil tersimpan");

        // return redirect()->back()->with('msg', "Berhasil tersimpan");
    }

    function getEdit(Request $request)
    {
        $data = Article::find($request->id);
        return view('backend.article.edit', compact('data'));
    }

    function update(Request $request)
    {
        // dd($request);
        $article = Article::find($request->id);
        // dd($article);

        // Handle the file upload
        if ($request->hasFile('thumbnail')) {
            // Upload the new photo
            // $newPhotoPath = $request->file('thumbnail')->store('photos', 'public'); // Adjust the storage path as needed
            $photoPath = $this->storePhoto($request->thumbnail);

            // Delete the old photo if it exists
            if ($article->thumbnail) {
                unlink(public_path($article->thumbnail));
            }

            // Update the article's thumbnail column with the new file path
            $article->thumbnail = $photoPath;
        }

        // Update the article with the new data
        $article->title = $request->title;
        $article->content = $request->content;
        $article->status = $request->status;

        // Save the changes
        $article->save();

        return view('backend.article.index')->with('success', 'Article updated successfully.');
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
        Article::whereIn('id', $request->deleteItems)->update(['status' => 2]);
        // dd('masuk');
        # Redirect
        if ($request->ajax()) {
            return response()->json(['message' => ["Berhasil diperbarui"]]);
        }
        return redirect()->back()->with('msg', "Berhasil diperbarui");
    }
}
