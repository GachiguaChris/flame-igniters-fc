<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryAlbumResource\Pages;
use App\Models\GalleryAlbum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class GalleryAlbumResource extends Resource
{
    protected static ?string $model = GalleryAlbum::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Album Details')->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                Forms\Components\Select::make('category')
                    ->options(['Match' => 'Match', 'Training' => 'Training', 'Team' => 'Team', 'Community' => 'Community', 'Tournament' => 'Tournament'])
                    ->required(),
                Forms\Components\Toggle::make('is_published')->default(true),
                Forms\Components\Textarea::make('description')->rows(3)->columnSpanFull(),
                Forms\Components\FileUpload::make('cover_image')->image()->directory('gallery/covers')->columnSpanFull(),
            ])->columns(2),
            Forms\Components\Section::make('Photos')->schema([
                Forms\Components\Repeater::make('images')
                    ->relationship()
                    ->schema([
                        Forms\Components\FileUpload::make('image')->image()->directory('gallery/images')->required(),
                        Forms\Components\TextInput::make('caption')->maxLength(255),
                        Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\BadgeColumn::make('category'),
                Tables\Columns\TextColumn::make('images_count')->counts('images')->label('Photos'),
                Tables\Columns\IconColumn::make('is_published')->boolean(),
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListGalleryAlbums::route('/'),
            'create' => Pages\CreateGalleryAlbum::route('/create'),
            'edit'   => Pages\EditGalleryAlbum::route('/{record}/edit'),
        ];
    }
}
