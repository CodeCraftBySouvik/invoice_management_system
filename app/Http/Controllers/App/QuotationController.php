<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QuotationController extends Controller{
    public function __construct() {
        // $this->middleware('auth');
        // parent::__construct();
        $this->term = 'quotation';
        $this->terms = 'quotations';
        // $this->modelFirst = 'Quotation';
        // $this->modelSecond = 'Content_meta';
    }

    public function add() {
        // $categories = Controller::term('category');
        $page = [
            'term' => $this->term
        ];
        return view('admin.add.' . $this->term, compact('page'));
    }

    public function addSubmit(Request $request) {
        $request->validate([
            'product_name' => 'required',
        ]);

        $data = $request->all();

        $category = Controller::term('category', 'first', $request->input('category'), 0);
        $product_name = ($category) ? $request->input('product_name') .' - '. $category-> name : $request->input('product_name');

        ${'exist_'.$this->term} = Controller::getModel('Content')::where([
            'name' => $product_name,
            'content_type' => $request->input('content_type')
        ])->first();

        if(!${'exist_'.$this->term}){
            ${$this->term} = Controller::newContent();
            ${$this->term}->name = $product_name;
            ${$this->term}->slug = Controller::generateSlug($product_name);
            ${$this->term}->content_type = $request->input('content_type');
            ${$this->term}->status = 1;
            // ${$this->term}->status = $request->input('status');
            ${$this->term}->created_by = Auth::user()->id ?? 0;

            if( ${$this->term}->save() ){
                $content_meta_key = $request->input('content_meta_key');
                $content_meta_value = $request->input('content_meta_value');

                if($content_meta_key){
                    for($i=0; $i<count($content_meta_key); $i++){
                        $content_meta = Controller::newContentMeta();;
                        $content_meta->user_id = Auth::user()->id;
                        $content_meta->content_id = ${$this->term}->id;
                        $content_meta->content_type = $request->input('content_type');
                        $content_meta->meta_key = $content_meta_key[$i];
                        $content_meta->meta_value = $content_meta_value[$i];
                        $content_meta->save();
                    }
                }

                $content_meta_cat_val = $request->input('category');

                if($content_meta_cat_val){
                    $content_meta = Controller::newModel($this->modelSecond);
                    $content_meta->user_id = Auth::user()->id;
                    $content_meta->content_id = ${$this->term}->id;
                    $content_meta->content_type = $request->input('content_type');
                    $content_meta->meta_key = 'category';
                    $content_meta->meta_value = $content_meta_cat_val;
                    $content_meta->save();
                }
                
                // return redirect()->back()->with('message',$this->term . ' Added Successfully');
                return redirect()->to('/app/product/view/5');
            }
            else{
                return redirect()->back()->with('error','Something went wrong!');
            }
        }
        else{
            return redirect()->back()->with('error',$this->term . ' already exist!'); //need to work
        }
    }

    public function list() {
        $page = [
            'term' => $this->term
        ];
        return view('admin.list.' . $this->term, compact('page'));
    }

    function listAjax(Request $request) {
        ${$this->term} = Controller::content($this->term);

        return datatables()->of(${$this->term})
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                return isset($row->name) ? $row->name : null;
            })->addColumn('price', function ($row) {
                $output = '';
                $output .= isset($row->price) ? $row->price : null;
                return $output;
            })->addColumn('category', function ($row) {
                $category = Controller::term('category', 'first', $row->category, 0, 0);
                return isset($category->name) ? $category->name : null;
            })->addColumn('status', function ($row) {
                if (isset($row->status) && $row->status == 0) {
                    return '<a href="'.route('admin.'. $this->term .'.status', ['id' => $row->id]).'" class="badge badge-pill badge-danger">Inactive</a>';
                } else {
                    return '<a href="'.route('admin.'. $this->term .'.status', ['id' => $row->id]).'" class="badge badge-pill badge-success">Active</a>';
                }
            })->addColumn('action', function ($row) {
                $btn = '';
                $btn .= '<a href="'.route('admin.'. $this->term .'.view', ['id' => $row->id]).'" class="btn btn-primary btn-sm mr-1"><i class="fa fa-eye"></i></a>';
                $btn .= '<a href="'.route('admin.'. $this->term .'.edit', ['id' => $row->id]).'" class="btn btn-primary btn-sm mr-1"><i class="fa fa-pencil"></i></a>';
                $btn .= '<a href="'.route('admin.'. $this->term .'.delete', ['id' => $row->id]).'" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a>';
                return $btn;
        })->rawColumns(['name', 'price', 'category', 'status', 'action'])
            ->make(true);
    }

    public function coverSubmit(Request $request, $id) {
        $msg = '';
        $file = $request->file($this->term.'Cover');
        if ($file) {
            $filenameOnly = $this->term.'_cover_' . $id;
            $extension = $file->getClientOriginalExtension();
            $filename = $filenameOnly .".". $extension;
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $msg2 = Controller::checkUploadedFileProperties($extension, $fileSize);
            if($msg2 != ''){
                $msg = $msg2;
            }
    
            //Where uploaded file will be stored on the server
            $location = 'assets/uploads/'.$this->term;
    
            // Upload file
            $file->move(public_path($location), $filename);
    
            // In case the uploaded file path is to be stored in the database
            $filepath = public_path($location . "/" . $filename);
    
            ${$this->term} = Controller::content($this->term, 'first', $id, 0);
            ${$this->term}->image = $filename;
            ${$this->term}->save();
    
            $msg = 'uploaded';
        } else {
            $msg = 'not found';
        }
        return $msg;
    }

    public function view($id) {
        ${$this->term} = Controller::content($this->term, 'first', $id);
        $categories = Controller::term('category');
        $page = [
            'term' => $this->term
        ];

        return view('admin.view.' . $this->term, compact($this->term, 'page', 'categories'));
    }

    public function edit($id) {
        ${$this->term} = Controller::content($this->term, 'first', $id);
        $categories = Controller::term('category');
        $page = [
            'term' => $this->term
        ];

        return view('admin.edit.' . $this->term, compact($this->term, 'page', 'categories'));
    }

    public function editSubmit(Request $request, $id) {
        $request->validate([
            'product_name' => 'required',
        ]);

        $data = $request->all();

        ${$this->term} = Controller::content($this->term, 'first', $id, 0);
        ${$this->term}->name = $request->input('product_name');
        ${$this->term}->slug = Controller::generateSlug($request->input('product_name'));
        ${$this->term}->updated_by = Auth::user()->id;
        
        if(${$this->term}->save()){
            $content_meta_key = $request->input('content_meta_key');
            $content_meta_value = $request->input('content_meta_value');
            $is_content_meta_saved = 0;

            if(isset($content_meta_key)){
                for($i=0; $i<count($content_meta_key); $i++){
                    if(Controller::content_meta($this->term, 'first', ${$this->term}->id, $content_meta_key[$i])){
                        ${$this->term.'_meta'} = Controller::content_meta($this->term, 'first', ${$this->term}->id, $content_meta_key[$i]);
                        ${$this->term.'_meta'}->meta_value = $content_meta_value[$i];
                        if(${$this->term.'_meta'}->save()){
                            $is_content_meta_saved = 1;
                        }
                    }
                    else{
                        ${$this->term.'_meta'} = Controller::newModel($this->modelSecond);
                        ${$this->term.'_meta'}->user_id = Auth::user()->id;
                        ${$this->term.'_meta'}->content_id = ${$this->term}->id;
                        ${$this->term.'_meta'}->content_type = $request->input('content_type');
                        ${$this->term.'_meta'}->meta_key = $content_meta_key[$i];
                        ${$this->term.'_meta'}->meta_value = $content_meta_value[$i];
                        if(${$this->term.'_meta'}->save()){
                            $is_content_meta_saved = 1;
                        }
                    }
                }
            }
            if($is_content_meta_saved){
                return redirect()->back()->with('message',$this->term . ' Updated Successfully');
            }
            else{
                return redirect()->back()->with('error','Something Went Wrong');
            }
        }
        else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function delete($id){
        ${$this->term} = Controller::content($this->term, 'first', $id);
        
        if(${$this->term}){
            if(Controller::content_meta($this->term, 'all', ${$this->term}->id)){
                Controller::content_meta($this->term, 'all', ${$this->term}->id, '', 'delete');
            }
            if(${$this->term}->delete()){
                return redirect()->back()->with('message',$this->term . ' Deleted Successfully');
            }
            else{
                return redirect()->back()->with('error','Something went wrong!');
            }
        }
        else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function status($id){
        ${$this->term} = Controller::content($this->term, 'first', $id, 0);

        if(${$this->term}->status == 0){
            ${$this->term}->status = 1;
        }
        else{
            ${$this->term}->status = 0;
        }

        if(${$this->term}->save()){
            return redirect()->back()->with('message',$this->term . ' Updated Successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    // public function entries($id, $return=''){
    //     switch ($return) {
    //         case 'count':
    //             $ticket = Controller::content('ticket')->where('status', 1)->where('product_id', $id)->where('is_sold', 1)->count();
    //             break;
    //         default:
    //             $ticket = Controller::content('ticket')->where('status', 1)->where('product_id', $id)->where('is_sold', 1);
    //     }

    //     echo json_encode($ticket);
    // }

    // public function positions($id, $return=''){
    //     $product = Controller::content('product', 'first', $id);

    //     switch ($return) {
    //         case 'count':
    //             $prize = Controller::content('prize')->where('status', 1)->where('product', $product->name)->count();
    //             break;
    //         default:
    //             $prize = Controller::content('prize')->where('status', 1)->where('product', $product->name);
    //     }

    //     echo json_encode($prize);
    // }

    // public function results($product_id, $no, $type=''){
    //     $output = [];

    //     $product = Controller::content('product', 'first', $product_id);
    //     $user = [];

    //     switch ($type) {
    //         case 'manual':
    //             $ticket = Controller::content('ticket')->where('status', 1)->where('is_sold', 1)->where('product_name', $product->name)->take($no);
    //             $prize = Controller::content('prize')->where('status', 1)->where('product', $product->name);
    //             $position = Controller::content('position')->where('status', 1);
    //             //$user = Controller::user(3, 'all', '', 1, 1)->take($no);
    //             break;
    //         default:
    //             $ticket = Controller::content('ticket')->where('status', 1)->where('is_sold', 1)->where('product_name', $product->name)->shuffle()->take($no);
    //             $prize = Controller::content('prize')->where('status', 1)->where('product', $product->name);
    //             $position = Controller::content('position')->where('status', 1);
    //             //$user = Controller::user(3, 'all', '', 1, 1)->shuffle()->take($no);
    //     }

    //     foreach($ticket as $key=>$t){
    //         //$user[] = $t->buyer;
    //         $users = Controller::user(3, 'first', $t->buyer, 1, 1);
    //         if($users){
    //             $name = '';
    //             $name = $users->fname ? $users->fname : '';
    //             $name .= $users->mname ? ' ' . $users->mname : '';
    //             $name .= $users->lname ? ' ' . $users->lname : '';

    //             $user[$key]['id'] = $users->id;
    //             $user[$key]['user_unique_id'] = $users->user_unique_id;
    //             $user[$key]['name'] = $name;
    //         }
    //         else{
    //             $user[$key]['id'] = 0;
    //             $user[$key]['user_unique_id'] = '';
    //             $user[$key]['name'] = '';
    //         }
    //     }

    //     $output = [
    //         'ticket' => $ticket,
    //         'prize' => $prize,
    //         'position' => $position,
    //         'user' => $user
    //     ];

    //     echo json_encode($output);
    // }
    public function print($id) {
        ${$this->term} = Controller::content($this->term, 'first', $id);
        $categories = Controller::term('category');
        $page = [
            'term' => $this->term
        ];

        return view('admin.print.' . $this->term, compact($this->term, 'page', 'categories'));
    }
}
