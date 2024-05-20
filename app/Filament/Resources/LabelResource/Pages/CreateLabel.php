<?php

namespace App\Filament\Resources\LabelResource\Pages;

use App\Filament\Resources\LabelResource;
use App\Traits\ResourcesRedirect;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Cache;

class CreateLabel extends CreateRecord
{
    use ResourcesRedirect;
    protected static string $resource = LabelResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        Cache::forget('labels.'.$data['page']);

        $data['label_id'] = $data['page'].':'.$data['label_id'];

        return $data;
    }
}
