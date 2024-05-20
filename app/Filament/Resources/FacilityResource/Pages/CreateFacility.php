<?php

namespace App\Filament\Resources\FacilityResource\Pages;

use App\Filament\Resources\FacilityResource;
use App\Traits\ResourcesRedirect;
use Filament\Resources\Pages\CreateRecord;

class CreateFacility extends CreateRecord
{
    use ResourcesRedirect;

    protected static string $resource = FacilityResource::class;
}
