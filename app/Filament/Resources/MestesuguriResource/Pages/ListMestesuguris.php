<?php

namespace App\Filament\Resources\MestesuguriResource\Pages;

use App\Filament\Resources\MestesuguriResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMestesuguris extends ListRecords
{
    protected static string $resource = MestesuguriResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
