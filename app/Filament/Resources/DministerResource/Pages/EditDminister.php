<?php

namespace App\Filament\Resources\DministerResource\Pages;

use App\Filament\Resources\DministerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDminister extends EditRecord
{
    protected static string $resource = DministerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
