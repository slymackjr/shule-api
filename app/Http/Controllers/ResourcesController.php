<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Region;
use App\Models\Ward;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    //
    public function regions()
    {
        $regions = Region::get(['id', 'name']);
        return response()->json(['regions' => $regions]);
    }
    public function districts(Request $request)
    {
        $districts = District::where('region_id', $request['region'])->get(['id', 'name']);
        return response()->json(['districts' => $districts]);
    }
    public function wards(Request $request)
    {
        $wards = Ward::where('district_id', $request['district'])->get(['id', 'name']);
        return response()->json(['wards' => $wards]);
    }
}
