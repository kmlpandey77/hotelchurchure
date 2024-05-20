<?php

namespace App\Filament\Resources\LabelResource\Pages;

use App\Filament\Resources\LabelResource;
use App\Traits\ResourcesRedirect;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Cache;

class EditLabel extends EditRecord
{
    use ResourcesRedirect;

    protected static string $resource = LabelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        Cache::forget('labels.' . $data['page']);
        return $data;
    }
}
