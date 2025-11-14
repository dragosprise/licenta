<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MestesuguriResource\Pages;
use App\Models\Mestesug;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;
use Closure;

class MestesuguriResource extends Resource
{
    protected static ?string $model = Mestesug::class;


    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationLabel = 'Mestesuguri';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('denumire')
                    ->required()
                    ->maxLength(255)
                    ->reactive() // Make the input reactive
                    ->afterStateUpdated(function (Closure $set, $state) {
                        $set('slug', Str::slug($state));
                    }),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(2048),
                RichEditor::make('descriere')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('denumire')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('descriere')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMestesuguris::route('/'),
            'create' => Pages\CreateMestesuguri::route('/create'),
            'edit' => Pages\EditMestesuguri::route('/{record}/edit'),
        ];
    }
}
