<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;

class DashboardController extends Controller{
    const ControllerCode = "DASH_";

    public $outputData = [];

    public function index(){
        $totalBookings = Booking::where('is_voucher',0)->count();
        $todayBookings = Booking::where('is_voucher',0)->whereDay('created_at', now()->day)->count();
        $totalUsers = User::where('status',1)->count();
        $todayUsers = User::where('status',1)->whereDay('created_at', now()->day)->count();
        $this->outputData = [
            'totalBookings' => $totalBookings,
            'todayBookings' => $todayBookings,
            'totalUsers' => $totalUsers,
            'todayUsers' => $todayUsers,
        ];

        return view('admin.pages.dashboard',$this->outputData);
    }
}
