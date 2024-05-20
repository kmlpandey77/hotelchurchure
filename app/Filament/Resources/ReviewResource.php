<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationGroup = 'CMS';
    protected static ?string $navigationIcon = 'heroicon-o-chat';
    protected static ?int $navigationSort = 6;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('rating')
                        ->options([1=>1, 2=>2, 3=>3, 4=>4, 5=>5]),
                    Forms\Components\Textarea::make('details')
                        ->required()
                        ->columnSpan('full'),
                    Forms\Components\TextInput::make('reviewer_name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('reviewer_subtitle')
                        ->maxLength(255),
                    Forms\Components\Toggle::make('is_active')
                        ->default(1),
                    Forms\Components\Toggle::make('is_featured')
                        ->default(0),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->limit(35),
                Tables\Columns\TextColumn::make('rating'),
                Tables\Columns\TextColumn::make('reviewer_name')->label('Name'),
                Tables\Columns\BooleanColumn::make('is_active')->label('Active'),
                Tables\Columns\BooleanColumn::make('is_featured')->label('Featured'),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
