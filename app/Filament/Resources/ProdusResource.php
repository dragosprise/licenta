<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdusResource\Pages;
use App\Models\tip_produs;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Closure;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

class ProdusResource extends Resource
{
    protected static ?string $model = tip_produs::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Produse';
    protected static ?string $navigationGroup = 'Content';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nume')
                    ->required()
                    ->maxLength(255)
                    ->reactive() // Make the input reactive
                    ->afterStateUpdated(function (Closure $set, $state) {
                        $set('slug', Str::slug($state));
                    }),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(2048),
                RichEditor::make('text')
                    ->required(),
                FileUpload::make('image')
                    ->required()
                    ->image()
                    ->directory('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('nume')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('text')->limit(30),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->filters([
                // Define any table filters here if needed
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
            'index' => Pages\ListProduses::route('/'),
            'create' => Pages\CreateProdus::route('/create'),
            'edit' => Pages\EditProdus::route('/{record}/edit'),
        ];
    }
}
