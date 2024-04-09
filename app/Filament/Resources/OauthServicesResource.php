<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OauthServicesResource\Pages;
use App\Filament\Resources\OauthServicesResource\RelationManagers;
use App\Models\OauthService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OauthServicesResource extends Resource
{
    protected static ?string $model = OauthService::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("btn_url"),
                Forms\Components\TextInput::make("btn_icon"),
                Forms\Components\TextInput::make("btn_label"),
                Forms\Components\Toggle::make("enabled"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("btn_label")->label("Service"),
                Tables\Columns\ToggleColumn::make("enabled")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListOauthServices::route('/'),
            'create' => Pages\CreateOauthServices::route('/create'),
            'edit' => Pages\EditOauthServices::route('/{record}/edit'),
        ];
    }
}
