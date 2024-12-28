<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SurplusProductResource\Pages;
use App\Filament\Resources\SurplusProductResource\RelationManagers;
use App\Models\SurplusProduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SurplusProductResource extends Resource
{
    protected static ?string $model = SurplusProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\TextInput::make('original_price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Forms\Components\TextInput::make('discount_price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                Forms\Components\DateTimePicker::make('expires_at')
                    ->required(),
                Forms\Components\FileUpload::make('images')
                    ->multiple()
                    ->image()
                    ->maxFiles(5)
                    ->directory('surplus-products'),
                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('original_price')
                    ->money('idr'),
                Tables\Columns\TextColumn::make('discount_price')
                    ->money('idr'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('expires_at')
                    ->dateTime(),
                Tables\Columns\IconColumn::make('is_active'),
            ])
            ->filters([
                Tables\Filters\Filter::make('active')
                    ->query(fn($query) => $query->where('is_active', true)),
                Tables\Filters\Filter::make('expired')
                    ->query(fn($query) => $query->where('expires_at', '<', now())),
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
            'index' => Pages\ListSurplusProducts::route('/'),
            'create' => Pages\CreateSurplusProduct::route('/create'),
            'edit' => Pages\EditSurplusProduct::route('/{record}/edit'),
        ];
    }
}
