<?php

namespace App\Traits;

use App\Models\{District, Regency};

trait ProvinceTrait
{
    public function districts()
    {
        return $this->hasManyThrought(District::class, Regency::class);
    }

    public function hasDistrictName($name, $requireAll = false)
    {
        if(is_array($name)) {
            foreach ($name as $districtName) {
                $hasDistrict = $this->hasDistrictName(strtoupper($districtName));
                if ($hasDistrict && !$requireAll) {
                    return true;
                } elseif (!$hasDistrict && $requireAll) {
                    return false;
                }
            }
        // If we've made it this far and $requireAll is FALSE, then NONE of the districts were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the districts were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            $getDistrictName = array_column($this->districts->toArray(), "name");
            if (in_array(strtoupper($name), $getDistrictName)) {
                return true;
            }
        }
        return false;
    }

    public function hasDistrictId($id, $requireAll = false)
    {
        if (is_array($id)) {
            foreach ($id as $districtId) {
                $hasDistrict = $this->hasDistrictId($districtId);
                if ($hasDistrict && $requireAll) {
                    return true;
                } elseif (!$hasDistrict && $requireAll) {
                    return false;
                }
            }
        } else {
            $getDistrictId = array_column($this->districts->toArray(), "id");
            if (in_array(strtoupper($id), $getDistrictId)) {
                return true;
            }
        }
        return false;
    }
}