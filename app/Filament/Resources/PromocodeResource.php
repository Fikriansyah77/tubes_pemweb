<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromocodeResource\Pages;
use App\Models\Promocode;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PromocodeResource extends Resource
{
    protected static ?string $model = Promocode::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->required(),
                Forms\Components\Select::make('discount_type')
                    ->required()
                    ->options([
                        'percentage' => 'Percentage',
                        'fixed' => 'Fixed',
                    ]),
                Forms\Components\TextInput::make('discount')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                Forms\Components\DateTimePicker::make('valid_until')
                    ->required(),
                Forms\Components\Toggle::make('is_used')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('discount_type'),
                Tables\Columns\TextColumn::make('discount')
                    ->formatStateUsing(fn (promocode $record): string => match ($record->discount_type) {
                        'fixed' => 'Rp' . number_format($record->discount, 0,',','.' ),
                        'percentage' => $record->discount . '%',
                    }),
                Tables\Columns\ToggleColumn::make('is_used'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPromocodes::route('/'),
            'create' => Pages\CreatePromocode::route('/create'),
            'edit' => Pages\EditPromocode::route('/{record}/edit'),
        ];
    }
}
