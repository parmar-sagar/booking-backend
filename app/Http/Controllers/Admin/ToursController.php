<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use DataTables;
use Validator;

class ToursController extends Controller
{
    public function __construct(){
        $this->outputData = array();
    }

    public function index(){
        $this->outputData['pageName'] = 'Tour';
        $this->outputData['datatable'] = url('admin/tours/datatables');
        $this->outputData['create']=url('admin/tours/create');
        $this->outputData['delete'] = url('admin/tours/delete');
        $this->outputData['edit'] = url('admin/tours/edit');
        return view('admin.pages.tours.index',$this->outputData);
    }

    public function datatable(){
        $datas = Tour::get();
        return DataTables::of($datas)->toJson();
    }

    public function create(Request $request){
        if ($request->method() == 'POST') {
            $Input = $request->all();

//Validation Section
            $rules = [
                'name' => 'required',
                'description'=>'required',
            ];

            $validator = Validator::make($Input, $rules);

            if ($validator->fails()) {
                return response()->json(array('error' => $validator->getMessageBag()->first()));
            }
            if ($request->file('image')) {
                $Input['image'] = time().'.'.$request->image->getClientOriginalExtension();
                $request->logo->move(public_path('/uploads/tours'), $arrData['image_name']);
            } 
            $objRealtors = new Tour();
            $objRealtors->fill($Input)->save();
            $msg = 'Tour Added.';
            return response()->json($msg);
        }
        $this->outputData['pageName']="New Tour";
        $this->outputData['action'] = url('admin/tours/store');
        return view('admin.pages.tours.create',$this->outputData);
    }

    public function destroy($id){
        Tour::findOrFail($id)->delete();
        $msg = "Tour Deleted";
        return response()->json($msg);
    }
}
