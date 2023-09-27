<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Widget;
use App\Models\WidgetPage;
use Illuminate\Http\Request;
use Datatables;
use Validator;
use Illuminate\Validation\Rule;
use DB;


class WidgetCtr extends Controller
{
    public function index()
    {
        $posts = Widget::orderBy('id', 'desc')->get();

        return view('backend.Widget.index', compact('posts'));
    }

    function getData(Request $request)
    {


        if ($request->ajax()) {

            $data = Widget::select('*')->orderBy('id', 'DESC')->get();
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
    			<a href="' . url(BACKEND_PATH . 'widget.edit?id=' . $row->id) . '" data-toggle="ajaxModal" data-title="Widget | Edit" data-class="modal-lg">Edit</a>
    		';
                    return $action;
                })
                ->rawColumns(['chkbox', 'url', 'title', 'sort', 'status', 'action'])
                ->make(true);
        }
    }
    public function getCreate()
    {
        $widgetPageIds = WidgetPage::select('widget_id')->groupBy('widget_id')->get()->pluck('widget_id');
        $widget = Widget::whereNotIn('id', $widgetPageIds)->get();

        $pages = Page::all();

        return view('backend.widget.create', ['widget' => $widget, 'pages' => $pages]);
    }
    function store(Request $request)
    {

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'page_ids' => 'required|array',
            'widget' => 'required|numeric', // Assuming widget is a numeric field
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $page_ids = $request->page_ids ?? null;


        $widgetPage = new WidgetPage;

        if ($request->has('page_ids')) {
            foreach ($request->input('page_ids') as $pageId) {
                $widgetPage = new WidgetPage;
                $widgetPage->widget_id = $request->widget; // Gunakan ID widget yang baru saja dibuat
                $widgetPage->page_id = $pageId;
                $widgetPage->save();
            }
        }
    }

    function getEdit(Request $request)
    {
        $dataWidgetById = Widget::find($request->id);
        // dd($dataWidgetById->id   );
        $widget = Widget::get();
        // dd($widget);
        $widgetPageIds = WidgetPage::where('widget_id', $request->id)->pluck('page_id')->toArray();
        // dd($widgetPageIds);
        // dd($widgetPageIds);
        $pages = Page::all();

        return view('backend.widget.edit', [
            'dataWidgetById' => $dataWidgetById,
            'widget' => $widget,
            'pages' => $pages,
            'selectedPageIds' => $widgetPageIds
        ]);
    }

    public function update(Request $request)
    {

        // dd($request);
        $request->validate([
            'widget_id' => 'required|exists:widgets,id',
            'page_ids' => 'array',
            'widget_name' => 'required|string'
        ]);

        $status = $request->status ?? 0;
        // dd($status);
        $widget = Widget::find($request->widget_id);
        $widget->name = $request->widget_name;

        if ($status !== 0) {
            // dd('masuk');
            $widget->status = $status;
            // $widget->save();
        }
        $widget->save();

        if (!$widget) {
            return redirect()->route('widget.index')->with('error', 'Widget not found.');
        }

        // Hapus kaitan yang ada
        WidgetPage::where('widget_id', $request->widget_id)->delete();

        // Tambahkan kembali kaitan berdasarkan data dari form
        if ($request->has('page_ids')) {
            foreach ($request->page_ids as $page_ids) {
                $widgetPage = new WidgetPage;
                $widgetPage->widget_id = $request->widget_id;
                $widgetPage->page_id = $page_ids;
                $widgetPage->save();
            }
        }
        if ($request->ajax()) {
            return response()->json(['message' => ["Berhasil tersimpan"]]);
        }
        return redirect()->back()->with('msg', "Berhasil diperbarui");
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
        Widget::whereIn('id', $request->deleteItems)->update(['status' => 2]);

        # Redirect
        if ($request->ajax()) {
            return response()->json(['message' => ["Berhasil diperbarui"]]);
        }
        return redirect()->back()->with('msg', "Berhasil diperbarui");
    }
}
