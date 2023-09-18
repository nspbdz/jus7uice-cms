<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use App\Models\Widget;
use App\Models\Widget_navbar;
use Illuminate\Http\Request;
use Datatables;
use Validator;
use Illuminate\Validation\Rule;
use DB;


class WidgetController extends Controller
{
    public function index()
    {
        // $widget_navbar= Widget_navbar::with('widget', 'navbar')->distinct('widget_id')->get();
        // $uniqueWidgets = Widget_navbar::groupBy('widget_id')
        // ->get(['widget_id']);

        // $widget_navbar= Widget_navbar::with('widget', 'navbar')->get();
        // dd($uniqueWidgets);
        $posts = Widget::orderBy('id', 'desc')->get();

        return view('backend.Widget.index', compact('posts'));
    }

    function getData(Request $request)
    {


        if ($request->ajax()) {

            $data = Widget::select('*')->where('status', 1)->orderBy('id', 'DESC')->get();
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
                ->rawColumns(['chkbox', 'url', 'title', 'sort', 'status', 'action'])
                ->make(true);
        }
    }
    public function getCreate()
    {
        // $widget_navbar = Widget_navbar::select('widget_id')->groupBy('widget_id')->get();
        // dd($widget_navbar);

        // $navbars = Navbar::get();

        $widgetNavbarIds = Widget_navbar::select('widget_id')->groupBy('widget_id')->get()->pluck('widget_id');
        $widget = Widget::whereNotIn('id', $widgetNavbarIds)->get();

        $navbars = Navbar::get();
        return view('backend.widget.create', ['widget' => $widget, 'navbars' => $navbars]);
    }
    function store(Request $request)
    {
        $navbar_ids = $request->navbar_ids ?? null;


        $data = array();
        $widget_navbar = new Widget_navbar;
        // $widget_navbar->widget_id = $request->widget;
        if ($navbar_ids !== null) {
            for ($i = 0; $i < count($navbar_ids); $i++) {
                // $data[]=$navbar_ids[$i];
                $widget_navbar->widget_id = $request->widget;
                $widget_navbar->navbar_id = $navbar_ids[$i];
                $widget_navbar->save();
            }
        }

        // dd($data);

    }

    function getEdit(Request $request)
    {
        $data = Widget::find($request->id);
        return view('backend.administrator_edit', compact('data', 'groupList'));
    }
}


// <?php
// 					foreach ($routeLists as $key => $val) {
// 						echo '<label>' . html()->checkbox('route[]')->value($val)->checked(true)->class('form-check-input my_checkbox') . ' ' . $val . '</label><br />';
// 					}