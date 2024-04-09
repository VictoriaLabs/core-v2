<?php

namespace App\Filament\Resources\OauthServicesResource\Pages;

use App\Filament\Resources\OauthServicesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOauthServices extends EditRecord
{
    protected static string $resource = OauthServicesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
