<?php

namespace App\Filament\Resources\SiteSettingResource\Pages;

use App\Filament\Resources\SiteSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSiteSetting extends CreateRecord
{
    protected static string $resource = SiteSettingResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = $data['key'] ?? '';
        return $data;
    }
}
