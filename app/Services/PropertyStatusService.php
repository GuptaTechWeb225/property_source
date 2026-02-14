<?php

namespace App\Services;

use App\Models\PropertyStatus;

class PropertyStatusService
{
    public function updatePropertyStatus($property_id,$sourceModel, $status,$is_active, $tenant_id = null)
    {
        try {
            $this->checkPropertyExistence($property_id);

            return $sourceModel->propertyStatus()->create([
                'property_id' => $property_id,
                'tenant_id' => $tenant_id,
                'status' => $status,
                'is_active' => $is_active,
                'created_by' => auth()->id() ?? 1,
            ]);
        }catch (\Exception $exception){
            throw $exception;
        }
    }

    public function checkPropertyExistence($property_id)
    {
        return PropertyStatus::where('property_id', $property_id)->update(['is_active' => false]);
    }
}
