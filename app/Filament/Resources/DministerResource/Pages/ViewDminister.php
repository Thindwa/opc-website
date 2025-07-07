<?php

namespace App\Filament\Resources\DministerResource\Pages;

use App\Filament\Resources\DministerResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDminister extends ViewRecord
{
    protected static string $resource = DministerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
