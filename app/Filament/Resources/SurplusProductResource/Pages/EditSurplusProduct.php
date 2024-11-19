<?php

namespace App\Filament\Resources\SurplusProductResource\Pages;

use App\Filament\Resources\SurplusProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSurplusProduct extends EditRecord
{
    protected static string $resource = SurplusProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
