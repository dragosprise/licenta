<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MestesugarResource\Pages;
use App\Models\Mestesugar;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Notifications\Notification;


class MestesugarResource extends Resource
{
    protected static ?string $model = Mestesugar::class;
    protected static ?string $modelUser = User::class;

    protected static ?string $navigationLabel = 'Mestesugar';

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    use Tables\Concerns\InteractsWithTable;
    protected static ?string $navigationGroup = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->hidden( $record->is_accepted == true)
                    ->maxLength(255),
                TextInput::make('descriere')
                    ->required()
                    ->hidden( $record->is_accepted == true)
                    ->maxLength(255),

                FileUpload::make('image')
                    ->required()
                    ->image()
                    ->hidden( $record->is_accepted == true)
                    ->directory('/storage'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
//            ->query(fn ($query) => $query->notAccepted())
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('descriere')->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\ImageColumn::make('role')
                    ->hidden(fn ($record) => $record && $record->is_accepted == 1),
            ])
            ->actions([
                Tables\Actions\Action::make('accept')
                    ->label('Accept')
                    ->action(function ($record) {
                        $userId = $record->user_id; // Assuming user_id is stored in $record

                        // Update 'tip_user' for the user who initiated the request
                        $user = User::find($userId);
                        if ($user) {
                            $user->tip_user = 1;
                            $user->save();
                        }
                        $record->is_accepted = true; // Example: set a flag to indicate acceptance
                        $record->save();
                        Notification::make()
                            ->title('Saved successfully')
                            ->icon('heroicon-o-document-text')
                            ->iconColor('success')
                            ->send();
                    }),

                Tables\Actions\Action::make('decline')
                    ->label('Decline')
                    ->action(function ($record) {
                        $record->delete();
                    }),
            ]);
    }

    protected static function getTableQuery()
    {
        // Filter out entries where is_accepted is true
        return parent::getTableQuery()->where('is_accepted', false);
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
            'index' => Pages\ListMestesugars::route('/'),
            'create' => Pages\CreateMestesugar::route('/create'),
            'edit' => Pages\EditMestesugar::route('/{record}/edit'),
        ];
    }
}
