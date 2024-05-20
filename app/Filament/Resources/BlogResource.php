<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationGroup = 'CMS';
    protected static ?string $navigationIcon = 'heroicon-o-archive';
    protected static ?int $navigationSort = 9;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('title')->reactive()
                        ->afterStateUpdated(function (\Closure $set, $state) {
                            $set('slug', Str::slug($state));
                        })->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('slug')
                        ->disabled()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('details')
                        ->required()
                        ->columnSpan('full'),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                        ->collection('blogs')
                        ->columnSpan('full'),
                    Forms\Components\DatePicker::make('event_date'),
                    Forms\Components\Textarea::make('meta_title')
                        ->rows(2)
                        ->columnSpan('full')
                        ->maxLength(65535),
                    Forms\Components\Textarea::make('meta_description')
                        ->rows(2)
                        ->columnSpan('full')
                        ->maxLength(65535),
                    Forms\Components\Textarea::make('meta_keyword')
                        ->rows(2)
                        ->columnSpan('full')
                        ->maxLength(65535),

                    Forms\Components\Toggle::make('status')
                        ->label('Visible')
                        ->default(1),
                ])->columns()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->limit(35),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')->collection('blogs'),
                Tables\Columns\TextColumn::make('event_date')
                    ->date(),
                Tables\Columns\TextColumn::make('created_at')
                    ->date(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
