<?php

namespace App\Filament\Resources\FacilityResource\Pages;

use App\Filament\Resources\FacilityResource;
use App\Traits\ResourcesRedirect;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFacility extends EditRecord
{
    use ResourcesRedirect;

    protected static string $resource = FacilityResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
