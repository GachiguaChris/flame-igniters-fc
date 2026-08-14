<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsArticleResource\Pages;
use App\Models\NewsArticle;
use App\Models\NewsCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class NewsArticleResource extends Resource
{
    protected static ?string $model = NewsArticle::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make()->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')->required()->maxLength(255)->unique(ignoreRecord: true),
                Forms\Components\Select::make('news_category_id')
                    ->label('Category')
                    ->options(NewsCategory::pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\DateTimePicker::make('published_at')->label('Publish Date'),
                Forms\Components\Textarea::make('excerpt')->rows(3)->columnSpanFull(),
                Forms\Components\RichEditor::make('content')->required()->columnSpanFull(),
                Forms\Components\FileUpload::make('featured_image')->image()->directory('news')->columnSpanFull(),
                Forms\Components\Toggle::make('is_published')->label('Published')->default(false),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image'),
                Tables\Columns\TextColumn::make('title')->searchable()->limit(50),
                Tables\Columns\TextColumn::make('category.name')->label('Category'),
                Tables\Columns\IconColumn::make('is_published')->boolean()->label('Published'),
                Tables\Columns\TextColumn::make('published_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('news_category_id')
                    ->label('Category')
                    ->options(NewsCategory::pluck('name', 'id')),
                Tables\Filters\TernaryFilter::make('is_published')->label('Published'),
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListNewsArticles::route('/'),
            'create' => Pages\CreateNewsArticle::route('/create'),
            'edit'   => Pages\EditNewsArticle::route('/{record}/edit'),
        ];
    }
}
