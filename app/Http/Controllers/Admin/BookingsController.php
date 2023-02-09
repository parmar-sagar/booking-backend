<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\Booking;
use DataTables;

class BookingsController extends Controller
{
    const ControllerCode = "B_";

    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'Boookings',
            'dataTables' => url('admin/bookings/datatable'),
            'view' => url('admin/bookings/view'),
        ];
        return view('admin.pages.bookings.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Booking::order()->get();
                return DataTables::of($datas)
                                    ->addColumn('created_at',function(Booking $data){
                                        return date('d M Y H:i:s',strtotime($data->created_at));
                                    })
                                    ->rawColumns(['created_at'])
                                    ->toJson();
            }
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '01');
        }
    }

    public function view($id){
        $bookings = Booking::where('id',$id)->order()->first();
        $this->outputData = [
            'pageName' => 'View',
            'bookings' => $bookings,
        ];
        return view('admin.pages.bookings.view',$this->outputData);
    }
}
