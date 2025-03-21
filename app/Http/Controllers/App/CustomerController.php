<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller{
    public function __construct() {
        // $this->middleware('auth');
        parent::__construct();
        $this->term = 'customer';
        $this->terms = 'customers';
        $this->modelFirst = 'User';
        $this->modelSecond = 'UserDetails';
        $this->modelThird = 'UserMeta';
    }

    public function add() {
        $page = [
            'term' => $this->term
        ];
        // ${$this->terms} = Controller::user($this->term, 'all', '', 1, 0);
        // $genders = Controller::term('gender');
        
        // return view('admin.add.' . $this->term, compact('page', $this->terms, 'genders'));
        return view('admin.add.' . $this->term, compact('page'));
    }

    public function addSubmit(Request $request) {
        $request->validate([
            'company_name' => 'required',
            // 'user_name' => 'required',
            // 'user_email' => 'required',
            // 'user_phone' => 'required',
        ]);

        $data = $request->all();

        // ${'exist_'.$this->term} = Controller::getModel($this->modelFirst)::where([
        //     'email' => $request->input('user_email')
        // ])->whereOr([
        //     'phone' => $request->input('user_phone')
        // ])->first();

        // ${'exist_'.$this->term} = Controller::getModel($this->modelFirst)::where([
        //     'mobile' => $request->input('user_phone')
        // ])->first();

        // if(!${'exist_'.$this->term}){
            ${$this->term} = Controller::newModel($this->modelFirst);
            ${$this->term}->name = $request->input('company_name');
            ${$this->term}->email = $request->input('email');
            ${$this->term}->phone = $request->input('phone');
            ${$this->term}->password = Hash::make(Controller::generateUserPassword($request->input('user_type')));
            ${$this->term}->role = $request->input('user_role') ;

            if(${$this->term}->save()){
                // ${$this->term.'_details'} = Controller::newModel($this->modelSecond);
                // ${$this->term.'_details'}->user_id = ${$this->term}->id;
                // ${$this->term.'_details'}->user_unique_id = Controller::generateUserCode(${$this->term}->id, $request->input('user_type'));
                // ${$this->term.'_details'}->user_type = $request->input('user_type');
        
                // ${$this->term.'_details'}->gender = $request->input('user_gender');
                // //${$this->term.'_details'}->dob = $request->input('user_dob');
                // ${$this->term.'_details'}->status = 1;

                // if(${$this->term.'_details'}->save()){
                    ${$this->term.'_meta_key'} = $request->input('user_meta_key');
                    ${$this->term.'_meta_value'} = $request->input('user_meta_value');
                    
                    if(isset(${$this->term.'_meta_key'})){
                        for($i=0; $i<count(${$this->term.'_meta_key'}); $i++){
                            $user_info = Controller::newModel($this->modelThird);
                            $user_info->user_id = ${$this->term}->id;
                            $user_info->meta_key = ${$this->term.'_meta_key'}[$i];
                            $user_info->meta_value = ${$this->term.'_meta_value'}[$i];
                            $user_info->save();
                        }
                    }
                    // return redirect()->back()->with('message',$this->term . ' Added Successfully');
                    return redirect()->to('/app/customer/view/5');
                // }
                // else{
                //     return redirect()->back()->with('error','Something went wrong!');
                // }
            }
            else{
                return redirect()->back()->with('error','Something went wrong!');
            }
        // }
        // else{
        //     return redirect()->back()->with('error',$this->term . ' already exist!');
        // }
    }

    public function list() {
        $page = [
            'term' => $this->term
        ];
        return view('admin.list.' . $this->term, compact('page'));
    }

    function listAjax(Request $request) {
        ${$this->term} = Controller::user($this->term, 'all', '', 1, 1);
        ${$this->term} = ${$this->term}->filter(function ($item) {
            return $item->user_type === $this->term;
        });

        return datatables()->of(${$this->term})
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                $output = '';
                $output .= isset($row->fname) ? $row->fname : null;
                if(isset($row->user_unique_id)){
                    $output .= ' ('. $row->user_unique_id .')';
                }
                return $output;
            })->addColumn('email', function ($row) {
                return isset($row->email) ? $row->email : null;
            })->addColumn('phone', function ($row) {
                return isset($row->mobile) ? $row->mobile : null;
            })->addColumn('opening_balance', function ($row) {
                return isset($row->opening_balance) ? $row->opening_balance : null;
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
                // $btn .= '<a href="'.route('admin.'. $this->term .'.delete', ['id' => $row->id]).'" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a>';
                return $btn;
        })->rawColumns(['name', 'email', 'phone', 'opening_balance', 'status', 'action'])
            ->make(true);
    }

    public function view($id) {
        ${$this->term} = Controller::user($this->term, 'first', $id, 1, 1);
        ${$this->terms} = Controller::user($this->term, 'all', '', 1, 0);
        $genders = Controller::term('gender');
        $page = [
            'term' => $this->term
        ];

        return view('admin.view.'. $this->term, compact($this->term, $this->terms, 'page', 'genders'));
    }

    public function edit($id) {
        ${$this->term} = Controller::user($this->term, 'first', $id, 1, 1);
        ${$this->terms} = Controller::user($this->term, 'all', '', 1, 0);
        $genders = Controller::term('gender');
        $page = [
            'term' => $this->term
        ];

        return view('admin.edit.'. $this->term, compact($this->term, $this->terms, 'page', 'genders'));
    }

    public function editSubmit(Request $request, $id) {
        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required',
            'user_phone' => 'required',
        ]);

        $data = $request->all();

        ${$this->term} = Controller::user($this->term, 'first', $id, 0, 0);
        ${$this->term}->fname = $request->input('user_name');
        ${$this->term}->email = $request->input('user_email');
        ${$this->term}->mobile = $request->input('user_phone');
        
        if(${$this->term}->save()){
            ${$this->term.'_details'} = Controller::user_details($this->term, 'first', $id, 0);
            ${$this->term.'_details'}->gender = $request->input('user_gender');
            // ${$this->term.'_details'}->dob = $request->input('user_dob');

            if(${$this->term.'_details'}->save()){
                ${$this->term.'_meta_key'} = $request->input('user_meta_key');
                ${$this->term.'_meta_value'} = $request->input('user_meta_value');
                
                if(isset(${$this->term.'_meta_key'})){
                    for($i=0; $i<count(${$this->term.'_meta_key'}); $i++){
                        ${$this->term.'_info'} = Controller::user_meta($this->term, 'first', ${$this->term}->id, ${$this->term.'_meta_key'}[$i]);
                        ${$this->term.'_info'}->user_id = ${$this->term}->id;
                        ${$this->term.'_info'}->meta_key = ${$this->term.'_meta_key'}[$i];
                        ${$this->term.'_info'}->meta_value = ${$this->term.'_meta_value'}[$i];
                        ${$this->term.'_info'}->save();
                    }
                }
                return redirect()->back()->with('message',$this->term . ' Updated Successfully');
            }
            else{
                return redirect()->back()->with('error','Something went wrong!');
            }
        }
        else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function delete($id){
        ${$this->term} = Controller::user($this->term, 'first', $id, 0, 0);

        if(${$this->term}){
            if(Controller::user_details($this->term, 'first', ${$this->term}->id, 0)){
                Controller::user_details($this->term, 'first', ${$this->term}->id, 0, 'delete');
            }
            if(Controller::user_meta($this->term, 'all', ${$this->term}->id)){
                Controller::user_meta($this->term, 'all', ${$this->term}->id, '', 'delete');
            }
            
            if(${$this->term}->delete()){
                return redirect()->back()->with('message',$this->term . ' Deleted Successfully');
            }
            else{
                return redirect()->back()->with('error','Something went wrong!');
            }
        }
        return redirect()->back()->with('error','Something went wrong!');
    }

    public function status($id){
        ${$this->term} = Controller::user_details($this->term, 'first', $id, 0);

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

    public function checkExists(Request $request) {
        ${'exist_'.$this->term} = Controller::getModel($this->modelFirst)::where([
            'mobile' => $request->input('phone')
        ])->first();

        if(!${'exist_'.$this->term}){
            //return redirect()->back()->with('error','Something went wrong!');
            return response()->json([
                'status' => 'success',
                'message' => ''
            ]);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => 'Customer already exists! Existing customer name is: ' . ${'exist_'.$this->term}->fname
            ]);
        }
    }

    public function dataByID(Request $request) {
        ${'exist_'.$this->term} = Controller::getModel($this->modelFirst)::where([
            'mobile' => $request->input('phone')
        ])->first();
        // ${$this->term} = ${$this->term}->filter(function ($item) {
        //     return $item->user_type === $this->term;
        // });

        if(!${'exist_'.$this->term}){
            return response()->json([
                'status' => 'error',
                'message' => 'No customer found'
            ]);
        }
        else{
            return response()->json([
                'status' => 'success',
                'message' => 'Customer name is: ' . ${'exist_'.$this->term}->fname,
                'data' => [
                    'id' => ${'exist_'.$this->term}->id,
                    'name' => ${'exist_'.$this->term}->fname
                ]
            ]);
        }
    }
}
