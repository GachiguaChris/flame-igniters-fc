<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Flame Igniters FC') | Flame Igniters FC</title>
    <meta name="description" content="@yield('meta_description', 'Flame Igniters FC — A football club under Life Renewal Center Kamirithu Church, Kenya.')">
    <meta property="og:title" content="@yield('title', 'Flame Igniters FC')">
    <meta property="og:description" content="@yield('meta_description', 'Flame Igniters FC — A football club under Life Renewal Center Kamirithu Church, Kenya.')">
    <meta property="og:type" content="website">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        flame: {
                            50:  '#fff7ed',
                            100: '#ffedd5',
                            400: '#fb923c',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        .nav-link { color: #d1d5db; font-weight: 500; transition: color 0.2s; }
        .nav-link:hover { color: #fb923c; }
        .nav-link.active { color: #fb923c; }
        .btn-primary { background-color: #ea580c; color: #fff; font-weight: 600; padding: 0.75rem 1.5rem; border-radius: 0.5rem; transition: background-color 0.2s; display: inline-block; }
        .btn-primary:hover { background-color: #c2410c; }
        .btn-outline { border: 2px solid #f97316; color: #f97316; font-weight: 600; padding: 0.75rem 1.5rem; border-radius: 0.5rem; transition: all 0.2s; display: inline-block; }
        .btn-outline:hover { background-color: #f97316; color: #fff; }
        .card { background: #fff; border-radius: 0.75rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); overflow: hidden; transition: box-shadow 0.3s; }
        .card:hover { box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1); }
        .section-title { font-size: 1.875rem; font-weight: 700; color: #111827; margin-bottom: 0.5rem; }
        .section-subtitle { color: #ea580c; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.875rem; margin-bottom: 1rem; }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

{{-- Navigation --}}
<nav class="bg-gray-900 sticky top-0 z-50 shadow-lg" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-flame-600 rounded-full flex items-center justify-center">
                    <span class="text-white font-black text-lg">🔥</span>
                </div>
                <span class="text-white font-black text-lg leading-tight">Flame Igniters <span class="text-flame-400">FC</span></span>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                <a href="{{ route('players.index') }}" class="nav-link {{ request()->routeIs('players.*') ? 'active' : '' }}">Team</a>
                <a href="{{ route('fixtures.index') }}" class="nav-link {{ request()->routeIs('fixtures.*') ? 'active' : '' }}">Fixtures</a>
                <a href="{{ route('news.index') }}" class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}">News</a>
                <a href="{{ route('gallery.index') }}" class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}">Gallery</a>
                <a href="{{ route('achievements.index') }}" class="nav-link {{ request()->routeIs('achievements.*') ? 'active' : '' }}">Honours</a>
                <a href="{{ route('contact') }}" class="btn-primary text-sm py-2 px-4">Contact Us</a>
            </div>

            {{-- Mobile menu button --}}
            <button @click="open = !open" class="md:hidden text-gray-300 hover:text-white p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Mobile Nav --}}
        <div x-show="open" x-cloak class="md:hidden pb-4 space-y-2">
            <a href="{{ route('home') }}" class="block nav-link py-2">Home</a>
            <a href="{{ route('about') }}" class="block nav-link py-2">About</a>
            <a href="{{ route('players.index') }}" class="block nav-link py-2">Team</a>
            <a href="{{ route('fixtures.index') }}" class="block nav-link py-2">Fixtures</a>
            <a href="{{ route('news.index') }}" class="block nav-link py-2">News</a>
            <a href="{{ route('gallery.index') }}" class="block nav-link py-2">Gallery</a>
            <a href="{{ route('achievements.index') }}" class="block nav-link py-2">Honours</a>
            <a href="{{ route('contact') }}" class="block nav-link py-2">Contact</a>
        </div>
    </div>
</nav>

{{-- Page Content --}}
<main>
    @yield('content')
</main>

{{-- Footer --}}
<footer class="bg-gray-900 text-gray-300 mt-16">
    <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="md:col-span-2">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-flame-600 rounded-full flex items-center justify-center">
                    <span class="text-white font-black text-lg">🔥</span>
                </div>
                <span class="text-white font-black text-xl">Flame Igniters FC</span>
            </div>
            <p class="text-sm leading-relaxed mb-4">A football club proudly operating under <strong class="text-flame-400">Life Renewal Center Kamirithu Church</strong>, Kenya. Building character on and off the pitch.</p>
            <div class="flex gap-4">
                @php $fb = \App\Models\SiteSetting::get('facebook_url'); $ig = \App\Models\SiteSetting::get('instagram_url'); $tw = \App\Models\SiteSetting::get('twitter_url'); @endphp
                @if($fb)<a href="{{ $fb }}" target="_blank" class="hover:text-flame-400 transition-colors">Facebook</a>@endif
                @if($ig)<a href="{{ $ig }}" target="_blank" class="hover:text-flame-400 transition-colors">Instagram</a>@endif
                @if($tw)<a href="{{ $tw }}" target="_blank" class="hover:text-flame-400 transition-colors">Twitter</a>@endif
            </div>
        </div>
        <div>
            <h4 class="text-white font-bold mb-4 uppercase tracking-wider text-sm">Quick Links</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('about') }}" class="hover:text-flame-400 transition-colors">About Us</a></li>
                <li><a href="{{ route('players.index') }}" class="hover:text-flame-400 transition-colors">The Team</a></li>
                <li><a href="{{ route('fixtures.index') }}" class="hover:text-flame-400 transition-colors">Fixtures & Results</a></li>
                <li><a href="{{ route('news.index') }}" class="hover:text-flame-400 transition-colors">News</a></li>
                <li><a href="{{ route('gallery.index') }}" class="hover:text-flame-400 transition-colors">Gallery</a></li>
                <li><a href="{{ route('achievements.index') }}" class="hover:text-flame-400 transition-colors">Honours</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-white font-bold mb-4 uppercase tracking-wider text-sm">Contact</h4>
            <ul class="space-y-2 text-sm">
                @php
                    $email   = \App\Models\SiteSetting::get('contact_email');
                    $phone   = \App\Models\SiteSetting::get('contact_phone');
                    $address = \App\Models\SiteSetting::get('contact_address');
                @endphp
                @if($email)<li><a href="mailto:{{ $email }}" class="hover:text-flame-400 transition-colors">{{ $email }}</a></li>@endif
                @if($phone)<li>{{ $phone }}</li>@endif
                @if($address)<li>{{ $address }}</li>@endif
                <li><a href="{{ route('contact') }}" class="hover:text-flame-400 transition-colors">Send us a message</a></li>
            </ul>
        </div>
    </div>
    <div class="border-t border-gray-800 text-center py-4 text-xs text-gray-500">
        &copy; {{ date('Y') }} Flame Igniters FC. All rights reserved. | Under Life Renewal Center Kamirithu Church
    </div>
</footer>

<script src="//unpkg.com/alpinejs" defer></script>
@stack('scripts')
</body>
</html>
