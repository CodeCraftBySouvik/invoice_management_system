<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

use App\Models\Term;

class TermController extends Controller
{
    public function __construct() {
        // $this->middleware('auth');
        parent::__construct();
        $this->term = 'general';
        $this->modelFirst = 'SiteMeta';
    }

    public function index(){
        $page = [
            'term' => 'terms',
            'name' => 'terms'
        ];
        $terms = Term::select('term_type')->distinct()->get();

        return view('admin.terms.index',compact('page', 'terms'));
    }

    public function list($name){
        $site_all_meta = Controller::site_meta();
        $site_meta = Controller::newModel($this->modelFirst);
        $page = [
            'term' => $name . ' settings',
            'name' => $name
        ];
        foreach ($site_all_meta as $site_metas) {
            $site_meta[$site_metas->meta_key] = $site_metas->meta_value;
        }

        return view('admin.terms.' . $name,compact('site_meta', 'page'));
    }

    public function addSubmit(Request $request, $name) {
        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();

        ${'exist_'.$name} = Controller::getModel('Term')::where([
            'name' => $request->input('name'),
            'term_type' => $request->input('term_type')
        ])->first();

        if(!${'exist_'.$name}){
            ${$name} = Controller::newTerm();
            ${$name}->name = $request->input('name');
            ${$name}->slug = Controller::generateSlug($request->input('name'));
            ${$name}->term_type = $request->input('term_type');
            ${$name}->status = 1;
            // ${$name}->status = $request->input('status');
            ${$name}->created_by = Auth::user()->id ?? 0;

            if( ${$name}->save() ){
                $content_meta_key = $request->input('content_meta_key');
                $content_meta_value = $request->input('content_meta_value');
                
                if($content_meta_key){
                    for($i=0; $i<count($content_meta_key); $i++){
                        $content_meta = Controller::newTermMeta();;
                        $content_meta->user_id = Auth::user()->id;
                        $content_meta->content_id = ${$name}->id;
                        $content_meta->content_type = $request->input('term_type');
                        $content_meta->meta_key = $content_meta_key[$i];
                        $content_meta->meta_value = $content_meta_value[$i];
                        $content_meta->save();
                    }
                }
                
                return redirect()->back()->with('message',$name . ' Added Successfully');
            }
            else{
                return redirect()->back()->with('error','Something went wrong!');
            }
        }
        else{
            return redirect()->back()->with('error',$name . ' already exist!'); //need to work
        }
    }

    function listAjax(Request $request, $name) {
        ${$name} = Controller::term($name);

        return datatables()->of(${$name})
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                return isset($row->name) ? $row->name : null;
            })->addColumn('status', function ($row) {
                if (isset($row->status) && $row->status == 0) {
                    return '<a href="'.route('admin.term.status', ['id' => $row->id, 'name' => $row->term_type]).'" class="badge badge-pill badge-danger">Inactive</a>';
                } else {
                    return '<a href="'.route('admin.term.status', ['id' => $row->id, 'name' => $row->term_type]).'" class="badge badge-pill badge-success">Active</a>';
                }
            })->addColumn('action', function ($row) {
                $btn = '';
                // $btn .= '<a href="'.route('admin.term.view', ['id' => $row->id, 'name' => $row->term_type]).'" class="btn btn-primary btn-sm mr-1"><i class="fa fa-eye"></i></a>';
                // $btn .= '<a href="'.route('admin.term.edit', ['id' => $row->id, 'name' => $row->term_type]).'" class="btn btn-primary btn-sm mr-1"><i class="fa fa-pencil"></i></a>';
                $btn .= '<a href="'.route('admin.term.delete', ['id' => $row->id, 'name' => $row->term_type]).'" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a>';
                return $btn;
        })->rawColumns(['name', 'status', 'action'])
            ->make(true);
    }

    public function delete($name, $id){
        ${$name} = Controller::term($name, 'first', $id);
        
        if(${$name}){
            if(Controller::term_meta($name, 'all', ${$name}->id)){
                Controller::term_meta($name, 'all', ${$name}->id, '', 'delete');
            }
            if(${$name}->delete()){
                return redirect()->back()->with('message',$name . ' Deleted Successfully');
            }
            else{
                return redirect()->back()->with('error','Something went wrong!');
            }
        }
        else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function status($name, $id){
        ${$name} = Controller::term($name, 'first', $id, 0);

        if(${$name}->status == 0){
            ${$name}->status = 1;
        }
        else{
            ${$name}->status = 0;
        }

        if(${$name}->save()){
            return redirect()->back()->with('message',$name . ' Updated Successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }
}
