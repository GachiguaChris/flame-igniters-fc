<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FixtureResource\Pages;
use App\Models\Fixture;
use App\Models\Competition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FixtureResource extends Resource
{
    protected static ?string $model = Fixture::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Football';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make()->schema([
                Forms\Components\Select::make('competition_id')
                    ->label('Competition')
                    ->options(Competition::pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\TextInput::make('opponent')->required()->maxLength(255),
                Forms\Components\DatePicker::make('match_date')->required(),
                Forms\Components\TimePicker::make('kickoff_time'),
                Forms\Components\TextInput::make('venue')->maxLength(255),
                Forms\Components\Select::make('home_away')
                    ->options(['Home' => 'Home', 'Away' => 'Away'])->required(),
                Forms\Components\Select::make('status')
                    ->options(['Upcoming' => 'Upcoming', 'Completed' => 'Completed', 'Postponed' => 'Postponed', 'Cancelled' => 'Cancelled'])
                    ->required()->default('Upcoming'),
            ])->columns(2),
            Forms\Components\Section::make('Result')->schema([
                Forms\Components\TextInput::make('our_score')->numeric()->minValue(0),
                Forms\Components\TextInput::make('opponent_score')->numeric()->minValue(0),
                Forms\Components\Textarea::make('match_report')->rows(5)->columnSpanFull(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('match_date')->date()->sortable(),
                Tables\Columns\TextColumn::make('opponent')->searchable(),
                Tables\Columns\TextColumn::make('home_away')->badge(),
                Tables\Columns\TextColumn::make('competition.name')->label('Competition'),
                Tables\Columns\TextColumn::make('scoreline')->label('Score'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors(['primary' => 'Upcoming', 'success' => 'Completed', 'warning' => 'Postponed', 'danger' => 'Cancelled']),
            ])
            ->defaultSort('match_date', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(['Upcoming' => 'Upcoming', 'Completed' => 'Completed', 'Postponed' => 'Postponed', 'Cancelled' => 'Cancelled']),
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListFixtures::route('/'),
            'create' => Pages\CreateFixture::route('/create'),
            'edit'   => Pages\EditFixture::route('/{record}/edit'),
        ];
    }
}
