<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\Vehicle;
use DataTables;

class DealsController extends Controller
{
    const ControllerCode = "D_";

    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'Deals',
            'dataTables' => url('admin/deals/datatable'),
            'delete' => url('admin/deals/delete'),
            'create' => url('admin/deals/create'),
            'edit' => url('admin/deals/edit')
        ];
        
        return view('admin.pages.tour.deal.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Vehicle::deals()->order()->get();
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
                    'vehicleId' => 'required|integer',
                    'sequence' => 'nullable|integer',
                    'discount' => 'required|integer',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                $validated = $validator->validated();
                $validated['is_deals'] = 1; 
                $validated['sequence'] = (($validated['sequence'])) ?? 0;

                Vehicle::find($validated['vehicleId'])->update($validated);
    
                return response()->json(['success' => "Deals Created successfully."]);
            }

            $vehicles = Vehicle::select('name','id','type')->notDeals()->order()->get();

            $this->outputData = [
                'pageName' => 'New deals',
                'action' => url('admin/deals/store'),
                'vehicles' => $vehicles
            ];
            return view('admin.pages.tour.deal.create',$this->outputData);

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
                    'id' => 'required|exists:vehicles',
                    'vehicleId' => 'required|integer',
                    'sequence' => 'nullable|integer',
                    'discount' => 'required|integer',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['sequence'] = (($validated['sequence'])) ?? 0;
                
                Vehicle::find($validated['vehicleId'])->update($validated);
    
                return response()->json(['success' => "Deals Updated successfully."]);
            }

            $objData = Vehicle::findOrFail($id);
            $vehicles = Vehicle::select('name','id','type')->deals()->orWhere('id',$id)->order()->get();

            $this->outputData = [
                'pageName' => 'Edit deals',
                'action' => url('admin/deals/update/'.$id),
                'objData' => $objData,
                'vehicles' => $vehicles
            ];
            return view('admin.pages.tour.deal.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $datas = [
                'is_deals' => 0,
                'sequence' => 0,
                'discount' => 0
            ];
            Vehicle::find($id)->update($datas);   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}
