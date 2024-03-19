<?php

namespace App\Filament\Resources\OauthServicesResource\Pages;

use App\Filament\Resources\OauthServicesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOauthServices extends ListRecords
{
    protected static string $resource = OauthServicesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
