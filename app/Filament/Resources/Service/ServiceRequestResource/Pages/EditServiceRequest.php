<?php

namespace App\Filament\Resources\Service\ServiceRequestResource\Pages;

use App\Filament\Resources\Service\ServiceRequestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServiceRequest extends EditRecord
{
    protected static string $resource = ServiceRequestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
