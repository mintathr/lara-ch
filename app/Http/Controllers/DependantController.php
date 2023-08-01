<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\District;
use Illuminate\Http\Request;

class DependantController extends Controller
{
    public function getDistricts($id)
    {
        $district = District::where("regency_id", $id)->pluck("name", "id");
        return json_encode($district);
    }

    public function getVillages($id)
    {
        $village = Village::where("district_id", $id)->pluck("name", "id");
        return json_encode($village);
    }
}
