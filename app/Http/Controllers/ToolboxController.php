<?php

namespace App\Http\Controllers;

use App\Service;
use App\Staffs;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ToolboxController extends Controller
{
    public function listServices() {
        $list = Service::select('id', DB::raw('CONCAT(title, " [Php ", price, "] [", minutes, " min]") AS titulo'))
            ->where('isActive', 1)->get();
        return $list;
    }

    public function listStaffs() {
        $list = Staffs::select('id', DB::raw('CONCAT(firstname, " ", lastname) AS fullname'))
            ->orderBy('firstname')
            ->get();
        return $list;
    }
}
