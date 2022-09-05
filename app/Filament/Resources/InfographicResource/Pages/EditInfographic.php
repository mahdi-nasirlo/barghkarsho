<?php

namespace App\Filament\Resources\InfographicResource\Pages;

use App\Filament\Resources\InfographicResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInfographic extends EditRecord
{
    protected static string $resource = InfographicResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
