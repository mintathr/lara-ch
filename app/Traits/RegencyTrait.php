<?php

namespace App\Traits;

use App\Models\{District, Village};

trait RegencyTrait
{
    public function villages()
    {
        return $this->hasManyThrought(Village::class, District::class);
    }

    public function hasVillageName($name, $requireAll = false)
    {
        if(is_array($name)) {
            foreach ($name as $villageName) {
                $hasVillage = $this->hasVillageName(strtoupper($villageName));
                if ($hasVillage && !$requireAll) {
                    return true;
                } elseif (!$hasVillage && $requireAll) {
                    return false;
                }
            }
        // If we've made it this far and $requireAll is FALSE, then NONE of the districts were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the districts were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            $getVillageName = array_column($this->villages->toArray(), "name");
            if (in_array(strtoupper($name), $getVillageName)) {
                return true;
            }
        }
        return false;
    }

    public function hasVillageId($id, $requireAll = false)
    {
        if (is_array($id)) {
            foreach ($id as $districtId) {
                $hasVillage = $this->hasVillageId($districtId);
                if ($hasVillage && $requireAll) {
                    return true;
                } elseif (!$hasVillage && $requireAll) {
                    return false;
                }
            }
        } else {
            $getVillageId = array_column($this->villages->toArray(), "id");
            if (in_array(strtoupper($id), $getVillageId)) {
                return true;
            }
        }
        return false;
    }
}