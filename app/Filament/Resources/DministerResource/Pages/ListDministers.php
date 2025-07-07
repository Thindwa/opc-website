<?php

namespace App\Filament\Resources\DministerResource\Pages;

use App\Filament\Resources\DministerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDministers extends ListRecords
{
    protected static string $resource = DministerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
