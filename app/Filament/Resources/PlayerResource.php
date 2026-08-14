<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerResource\Pages;
use App\Models\Player;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PlayerResource extends Resource
{
    protected static ?string $model = Player::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Team';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make()->schema([
                Forms\Components\TextInput::make('name')->required()->maxLength(255),
                Forms\Components\TextInput::make('jersey_number')->numeric()->minValue(1)->maxValue(99),
                Forms\Components\Select::make('position')
                    ->options(['Goalkeeper' => 'Goalkeeper', 'Defender' => 'Defender', 'Midfielder' => 'Midfielder', 'Forward' => 'Forward'])
                    ->required(),
                Forms\Components\Textarea::make('bio')->rows(4)->columnSpanFull(),
                Forms\Components\FileUpload::make('photo')->image()->directory('players')->columnSpanFull(),
                Forms\Components\Toggle::make('is_featured')->label('Featured on homepage'),
                Forms\Components\Toggle::make('is_active')->label('Active player')->default(true),
            ])->columns(2),
            Forms\Components\Section::make('Statistics')->schema([
                Forms\Components\TextInput::make('appearances')->numeric()->default(0),
                Forms\Components\TextInput::make('goals')->numeric()->default(0),
                Forms\Components\TextInput::make('assists')->numeric()->default(0),
            ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')->circular(),
                Tables\Columns\TextColumn::make('jersey_number')->label('#')->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\BadgeColumn::make('position')
                    ->colors(['warning' => 'Goalkeeper', 'success' => 'Defender', 'primary' => 'Midfielder', 'danger' => 'Forward']),
                Tables\Columns\IconColumn::make('is_featured')->boolean()->label('Featured'),
                Tables\Columns\IconColumn::make('is_active')->boolean()->label('Active'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('position')
                    ->options(['Goalkeeper' => 'Goalkeeper', 'Defender' => 'Defender', 'Midfielder' => 'Midfielder', 'Forward' => 'Forward']),
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPlayers::route('/'),
            'create' => Pages\CreatePlayer::route('/create'),
            'edit'   => Pages\EditPlayer::route('/{record}/edit'),
        ];
    }
}
