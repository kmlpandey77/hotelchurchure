<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecommendationResource\Pages;
use App\Filament\Resources\RecommendationResource\RelationManagers;
use App\Models\Recommendation;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class RecommendationResource extends Resource
{
    protected static ?string $model = Recommendation::class;

    protected static ?string $navigationGroup = 'CMS';
    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('title')->required(),
                    Forms\Components\TextInput::make('link')->required(),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                        ->collection('recommendation'),
                    Forms\Components\Checkbox::make('status')->label('Visible')->default(1)
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')->collection('recommendation'),
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\BooleanColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')->date()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index'  => Pages\ListRecommendations::route('/'),
            'create' => Pages\CreateRecommendation::route('/create'),
            'edit'   => Pages\EditRecommendation::route('/{record}/edit'),
        ];
    }
}
