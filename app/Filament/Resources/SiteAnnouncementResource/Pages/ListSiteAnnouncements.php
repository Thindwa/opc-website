<?php

namespace App\Filament\Resources\SiteAnnouncementResource\Pages;

use App\Filament\Resources\SiteAnnouncementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiteAnnouncements extends ListRecords
{
    protected static string $resource = SiteAnnouncementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
