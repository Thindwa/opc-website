<?php

namespace App\Filament\Resources\SiteAnnouncementResource\Pages;

use App\Filament\Resources\SiteAnnouncementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiteAnnouncement extends EditRecord
{
    protected static string $resource = SiteAnnouncementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
