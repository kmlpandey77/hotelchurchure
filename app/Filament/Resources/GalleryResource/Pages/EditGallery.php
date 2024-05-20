<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use App\Traits\ResourcesRedirect;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGallery extends EditRecord
{
    use ResourcesRedirect;

    protected static string $resource = GalleryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
