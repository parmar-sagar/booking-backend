<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\Tour;
use DataTables;

class HomeTourController extends Controller
{
    const ControllerCode = "H_";

    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'Home Tours',
            'dataTables' => url('admin/home/tours/datatable'),
            'delete' => url('admin/home/tours/delete'),
            'create' => url('admin/home/tours/create'),
            'edit' => url('admin/home/tours/edit')
        ];
        
        return view('admin.pages.tour.home.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Tour::homeTour()->order()->get();
    
                return DataTables::of($datas)->toJson();;
            }
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '01');
        }
    }

    public function create(Request $request){
        try {
            if($request->method() == 'POST'){
                $Input = $request->all();
                // Validation section
                $validator = Validator::make($Input, [
                    'tourId' => 'required',
                    'on_home_sequence' => 'nullable|integer',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                $validated = $validator->validated();
                $validated['on_home'] = 1; 
                $validated['on_home_sequence'] = (($validated['on_home_sequence'])) ?? 0;

                Tour::find($validated['tourId'])->update($validated);
    
                return response()->json(['success' => "Home Tour Created successfully."]);
            }

            $tours = Tour::notOnHomeTour()->select('name','id')->order()->get();

            $this->outputData = [
                'pageName' => 'New Home Tour',
                'action' => url('admin/home/tours/store'),
                'tours' => $tours
            ];
            return view('admin.pages.tour.home.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '02');
        }
    }
    
    public function edit(Request $request,$id){
        try {
            if($request->method() == 'POST'){
                $Input = $request->all();
                
                // Validation section
                $validator = Validator::make($Input, [
                    'id' => 'required|exists:tours',
                    'tourId' => 'required|integer',
                    'on_home_sequence' => 'nullable|integer',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                if($validated['id'] !== $validated['tourId']){
                    $editHome = [
                        'on_home' => 0,
                        'on_home_sequence' => 0
                    ]; 
                    Tour::find($validated['id'])->update($editHome);
                }
                   
                $validated['on_home_sequence'] = (($validated['on_home_sequence'])) ?? 0;

                Tour::find($validated['tourId'])->update($validated);
    
                return response()->json(['success' => "Home Tour Updated successfully."]);
            }

            $objData = Tour::findOrFail($id);
            $tours = Tour::notOnHomeTour()->orWhere('id',$id)->select('name','id')->order()->get();

            $this->outputData = [
                'pageName' => 'Edit Home Tour',
                'action' => url('admin/home/tours/update/'.$id),
                'objData' => $objData,
                'tours' => $tours
            ];
            return view('admin.pages.tour.home.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $datas = [
                'on_home' => 0,
                'on_home_sequence' => 0
            ]; 
            Tour::find($id)->update($datas);   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}
