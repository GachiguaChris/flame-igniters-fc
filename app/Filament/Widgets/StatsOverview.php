<?php

namespace App\Filament\Widgets;

use App\Models\Player;
use App\Models\Fixture;
use App\Models\NewsArticle;
use App\Models\ContactMessage;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Active Players', Player::where('is_active', true)->count())
                ->icon('heroicon-o-user-group')
                ->color('success'),
            Stat::make('Upcoming Fixtures', Fixture::where('status', 'Upcoming')->count())
                ->icon('heroicon-o-calendar')
                ->color('primary'),
            Stat::make('Published Articles', NewsArticle::where('is_published', true)->count())
                ->icon('heroicon-o-newspaper')
                ->color('warning'),
            Stat::make('Unread Messages', ContactMessage::where('is_read', false)->count())
                ->icon('heroicon-o-envelope')
                ->color('danger'),
        ];
    }
}
