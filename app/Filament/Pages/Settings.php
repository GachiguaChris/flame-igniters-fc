<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static string $view = 'filament.pages.settings';
    protected static ?string $navigationGroup = 'Admin';
    protected static ?string $title = 'Site Settings';
    protected static ?int $navigationSort = 2;

    public array $data = [];

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('General')->schema([
                Forms\Components\TextInput::make('data.site_name')->label('Site Name'),
                Forms\Components\TextInput::make('data.tagline')->label('Tagline'),
                Forms\Components\Textarea::make('data.about_short')->label('Short About Text')->rows(3)->columnSpanFull(),
            ])->columns(2),
            Forms\Components\Section::make('Contact')->schema([
                Forms\Components\TextInput::make('data.contact_email')->label('Email')->email(),
                Forms\Components\TextInput::make('data.contact_phone')->label('Phone'),
                Forms\Components\TextInput::make('data.contact_address')->label('Address')->columnSpanFull(),
                Forms\Components\TextInput::make('data.google_maps_url')->label('Google Maps Embed URL')->columnSpanFull(),
            ])->columns(2),
            Forms\Components\Section::make('Social Media')->schema([
                Forms\Components\TextInput::make('data.facebook_url')->label('Facebook URL'),
                Forms\Components\TextInput::make('data.instagram_url')->label('Instagram URL'),
                Forms\Components\TextInput::make('data.twitter_url')->label('Twitter/X URL'),
                Forms\Components\TextInput::make('data.youtube_url')->label('YouTube URL'),
                Forms\Components\TextInput::make('data.church_website')->label('Church Website URL'),
            ])->columns(2),
        ];
    }

    public function mount(): void
    {
        $keys = [
            'site_name', 'tagline', 'about_short',
            'contact_email', 'contact_phone', 'contact_address', 'google_maps_url',
            'facebook_url', 'instagram_url', 'twitter_url', 'youtube_url', 'church_website',
        ];

        foreach ($keys as $key) {
            $this->data[$key] = SiteSetting::get($key, '');
        }
    }

    public function save(): void
    {
        foreach ($this->data as $key => $value) {
            SiteSetting::set($key, $value);
        }

        Notification::make()->title('Settings saved')->success()->send();
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }
}
