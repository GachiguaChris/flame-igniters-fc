@extends('layouts.public')

@section('title', 'Home')
@section('meta_description', 'Welcome to Flame Igniters FC — a passionate football club under Life Renewal Center Kamirithu Church, Kenya.')

@section('content')

{{-- Hero --}}
<section class="relative bg-gray-900 text-white overflow-hidden" style="min-height: 90vh;">
    <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-flame-900 to-gray-900 opacity-90"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><circle cx=%2250%22 cy=%2250%22 r=%2240%22 fill=%22none%22 stroke=%22white%22 stroke-width=%221%22/><line x1=%2210%22 y1=%2250%22 x2=%2290%22 y2=%2250%22 stroke=%22white%22 stroke-width=%220.5%22/><line x1=%2250%22 y1=%2210%22 x2=%2250%22 y2=%2290%22 stroke=%22white%22 stroke-width=%220.5%22/></svg>'); background-size: 200px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-32 flex flex-col items-center text-center">
        <div class="w-24 h-24 bg-flame-600 rounded-full flex items-center justify-center mb-6 shadow-2xl">
            <span class="text-5xl">🔥</span>
        </div>
        <p class="text-flame-400 uppercase tracking-widest font-semibold mb-3">Life Renewal Center Kamirithu Church</p>
        <h1 class="text-5xl md:text-7xl font-black mb-4 leading-tight">Flame Igniters <span class="text-flame-400">FC</span></h1>
        <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-2xl">Igniting passion, building character, and uniting the community through the beautiful game.</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="{{ route('players.index') }}" class="btn-primary">Meet the Team</a>
            <a href="{{ route('fixtures.index') }}" class="btn-outline border-white text-white hover:bg-white hover:text-gray-900">View Fixtures</a>
            <a href="{{ route('contact') }}" class="btn-outline">Contact Us</a>
        </div>
    </div>
</section>

{{-- Upcoming Fixture + Latest Result --}}
<section class="bg-gray-900 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Upcoming --}}
        <div class="bg-gray-800 rounded-xl p-6 border-l-4 border-flame-500">
            <p class="text-flame-400 uppercase tracking-widest text-xs font-bold mb-3">Next Match</p>
            @if($upcomingFixture)
                <div class="flex items-center justify-between">
                    <div class="text-center">
                        <p class="font-black text-lg">Flame Igniters FC</p>
                        <p class="text-xs text-gray-400">{{ $upcomingFixture->home_away === 'Home' ? 'HOME' : 'AWAY' }}</p>
                    </div>
                    <div class="text-center px-4">
                        <p class="text-flame-400 font-bold text-2xl">VS</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $upcomingFixture->match_date->format('D, d M Y') }}</p>
                        @if($upcomingFixture->kickoff_time)
                            <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($upcomingFixture->kickoff_time)->format('H:i') }}</p>
                        @endif
                    </div>
                    <div class="text-center">
                        <p class="font-black text-lg">{{ $upcomingFixture->opponent }}</p>
                        @if($upcomingFixture->venue)
                            <p class="text-xs text-gray-400">{{ $upcomingFixture->venue }}</p>
                        @endif
                    </div>
                </div>
                @if($upcomingFixture->competition)
                    <p class="text-center text-xs text-gray-500 mt-3">{{ $upcomingFixture->competition->name }}</p>
                @endif
            @else
                <p class="text-gray-400">No upcoming fixtures scheduled.</p>
            @endif
        </div>

        {{-- Latest Result --}}
        <div class="bg-gray-800 rounded-xl p-6 border-l-4 border-green-500">
            <p class="text-green-400 uppercase tracking-widest text-xs font-bold mb-3">Latest Result</p>
            @if($latestResult)
                <div class="flex items-center justify-between">
                    <div class="text-center">
                        <p class="font-black text-lg">Flame Igniters FC</p>
                    </div>
                    <div class="text-center px-4">
                        <p class="font-black text-3xl">
                            <span class="@if($latestResult->result === 'W') text-green-400 @elseif($latestResult->result === 'L') text-red-400 @else text-yellow-400 @endif">
                                {{ $latestResult->our_score }}
                            </span>
                            <span class="text-gray-500 mx-1">-</span>
                            <span class="text-gray-300">{{ $latestResult->opponent_score }}</span>
                        </p>
                        <span class="text-xs font-bold px-2 py-1 rounded mt-1 inline-block
                            @if($latestResult->result === 'W') bg-green-900 text-green-300
                            @elseif($latestResult->result === 'L') bg-red-900 text-red-300
                            @else bg-yellow-900 text-yellow-300 @endif">
                            {{ $latestResult->result === 'W' ? 'WIN' : ($latestResult->result === 'L' ? 'LOSS' : 'DRAW') }}
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="font-black text-lg">{{ $latestResult->opponent }}</p>
                        <p class="text-xs text-gray-400">{{ $latestResult->match_date->format('d M Y') }}</p>
                    </div>
                </div>
            @else
                <p class="text-gray-400">No results yet.</p>
            @endif
        </div>
    </div>
</section>

{{-- About Snippet --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
            <p class="section-subtitle">Who We Are</p>
            <h2 class="section-title">More Than Just a Football Club</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Flame Igniters FC is a community football team proudly operating under <strong>Life Renewal Center Kamirithu Church</strong> in Kenya.
                We believe football is a powerful tool for youth development, community building, and expressing God-given talent.
            </p>
            <p class="text-gray-600 leading-relaxed mb-8">
                Our players are not just athletes — they are ambassadors of faith, discipline, and teamwork. Every match, every training session, every goal is played to the glory of God and the upliftment of our community.
            </p>
            <a href="{{ route('about') }}" class="btn-primary">Our Story</a>
        </div>
        <div class="bg-gradient-to-br from-flame-500 to-flame-800 rounded-2xl p-8 text-white">
            <div class="grid grid-cols-2 gap-6 text-center">
                <div class="bg-white/10 rounded-xl p-4">
                    <p class="text-4xl font-black">🔥</p>
                    <p class="font-bold mt-2">Passion</p>
                </div>
                <div class="bg-white/10 rounded-xl p-4">
                    <p class="text-4xl font-black">🤝</p>
                    <p class="font-bold mt-2">Unity</p>
                </div>
                <div class="bg-white/10 rounded-xl p-4">
                    <p class="text-4xl font-black">⛪</p>
                    <p class="font-bold mt-2">Faith</p>
                </div>
                <div class="bg-white/10 rounded-xl p-4">
                    <p class="text-4xl font-black">🏆</p>
                    <p class="font-bold mt-2">Excellence</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Featured Players --}}
@if($featuredPlayers->count())
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <p class="section-subtitle">The Squad</p>
            <h2 class="section-title">Featured Players</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
            @foreach($featuredPlayers as $player)
            <div class="card text-center group">
                <div class="relative overflow-hidden">
                    <img src="{{ $player->photo_url }}" alt="{{ $player->name }}"
                         class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute top-2 left-2 bg-flame-600 text-white text-xs font-bold w-7 h-7 rounded-full flex items-center justify-center">
                        {{ $player->jersey_number ?? '?' }}
                    </div>
                </div>
                <div class="p-3">
                    <p class="font-bold text-sm text-gray-900">{{ $player->name }}</p>
                    <p class="text-xs text-flame-600">{{ $player->position }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('players.index') }}" class="btn-outline">View Full Squad</a>
        </div>
    </div>
</section>
@endif

{{-- Latest News --}}
@if($latestNews->count())
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <p class="section-subtitle">Latest Updates</p>
            <h2 class="section-title">News & Announcements</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($latestNews as $article)
            <a href="{{ route('news.show', $article->slug) }}" class="card group block">
                <div class="overflow-hidden">
                    <img src="{{ $article->featured_image_url }}" alt="{{ $article->title }}"
                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-5">
                    @if($article->category)
                        <span class="text-xs font-bold text-flame-600 uppercase tracking-wider">{{ $article->category->name }}</span>
                    @endif
                    <h3 class="font-bold text-gray-900 mt-2 mb-2 group-hover:text-flame-600 transition-colors">{{ $article->title }}</h3>
                    <p class="text-sm text-gray-500 line-clamp-2">{{ $article->excerpt }}</p>
                    <p class="text-xs text-gray-400 mt-3">{{ $article->published_at?->format('d M Y') }}</p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('news.index') }}" class="btn-outline">All News</a>
        </div>
    </div>
</section>
@endif

{{-- Recent Gallery --}}
@if($recentPhotos->count())
<section class="py-20 bg-gray-900">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <p class="text-flame-400 uppercase tracking-widest font-semibold text-sm mb-2">Moments</p>
            <h2 class="text-3xl font-bold text-white">Recent Photos</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            @foreach($recentPhotos as $photo)
            <a href="{{ route('gallery.index') }}" class="block overflow-hidden rounded-lg group">
                <img src="{{ $photo->image_url }}" alt="{{ $photo->caption ?? 'Gallery photo' }}"
                     class="w-full h-40 object-cover group-hover:scale-110 transition-transform duration-300">
            </a>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('gallery.index') }}" class="btn-primary">View Gallery</a>
        </div>
    </div>
</section>
@endif

{{-- Church Section --}}
<section class="py-20 bg-gradient-to-r from-flame-700 to-flame-900 text-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <p class="text-flame-200 uppercase tracking-widest font-semibold text-sm mb-4">Our Foundation</p>
        <h2 class="text-3xl font-bold mb-6">Life Renewal Center Kamirithu Church</h2>
        <p class="text-flame-100 leading-relaxed text-lg mb-8">
            Flame Igniters FC is more than a football team — we are a ministry. Operating under the covering of
            <strong>Life Renewal Center Kamirithu Church</strong>, we use football as a platform to reach youth,
            build community, and demonstrate the values of faith, integrity, and excellence.
        </p>
        @php $churchUrl = \App\Models\SiteSetting::get('church_website'); @endphp
        @if($churchUrl)
            <a href="{{ $churchUrl }}" target="_blank" class="btn-outline border-white text-white hover:bg-white hover:text-flame-800">
                Visit Church Website
            </a>
        @endif
    </div>
</section>

@endsection
