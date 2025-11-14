<?php

namespace App\Filament\Resources\ProdusResource\Pages;

use App\Filament\Resources\ProdusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProduses extends ListRecords
{
    protected static string $resource = ProdusResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
