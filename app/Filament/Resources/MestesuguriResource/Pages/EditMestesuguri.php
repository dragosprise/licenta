<?php

namespace App\Filament\Resources\MestesuguriResource\Pages;

use App\Filament\Resources\MestesuguriResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMestesuguri extends EditRecord
{
    protected static string $resource = MestesuguriResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
