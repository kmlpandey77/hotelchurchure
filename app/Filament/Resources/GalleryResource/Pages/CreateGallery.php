<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use App\Traits\ResourcesRedirect;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGallery extends CreateRecord
{
    use ResourcesRedirect;

    protected static string $resource = GalleryResource::class;
}
