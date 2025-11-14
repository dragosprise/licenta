<?php

namespace App\Filament\Resources\MestesugarResource\Pages;

use App\Filament\Resources\MestesugarResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMestesugars extends ListRecords
{
    protected static string $resource = MestesugarResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
