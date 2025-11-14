<?php

namespace App\Filament\Resources\MestesugarResource\Pages;

use App\Filament\Resources\MestesugarResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMestesugar extends EditRecord
{
    protected static string $resource = MestesugarResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
