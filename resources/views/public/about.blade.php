@extends('layouts.public')

@section('title', 'About Us')
@section('meta_description', 'Learn about Flame Igniters FC — our history, mission, values, and connection to Life Renewal Center Kamirithu Church.')

@section('content')

{{-- Page Header --}}
<div class="bg-gray-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="section-subtitle text-flame-400">Our Story</p>
        <h1 class="text-4xl md:text-5xl font-black">About Flame Igniters FC</h1>
    </div>
</div>

{{-- History --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
            <p class="section-subtitle">Our History</p>
            <h2 class="section-title">How It All Started</h2>
            <p class="text-gray-600 leading-relaxed mb-4">
                Flame Igniters FC was founded with a simple but powerful vision: to use football as a tool for community transformation and youth empowerment under the banner of <strong>Life Renewal Center Kamirithu Church</strong>.
            </p>
            <p class="text-gray-600 leading-relaxed mb-4">
                What began as informal kickabouts among church youth has grown into an organised football club with a dedicated squad, coaching staff, and a growing supporter base in the Kamirithu community.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Every season, we compete in local leagues and tournaments, always representing our church and community with pride, discipline, and sportsmanship.
            </p>
        </div>
        <div class="bg-flame-50 rounded-2xl p-8 border border-flame-100">
            <h3 class="font-bold text-gray-900 text-xl mb-6">Club at a Glance</h3>
            <ul class="space-y-4">
                <li class="flex items-start gap-3">
                    <span class="text-flame-600 text-xl">📍</span>
                    <div><p class="font-semibold text-gray-800">Location</p><p class="text-gray-600 text-sm">Kamirithu, Kenya</p></div>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-flame-600 text-xl">⛪</span>
                    <div><p class="font-semibold text-gray-800">Parent Organisation</p><p class="text-gray-600 text-sm">Life Renewal Center Kamirithu Church</p></div>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-flame-600 text-xl">🎽</span>
                    <div><p class="font-semibold text-gray-800">Club Colours</p><p class="text-gray-600 text-sm">Flame Orange & Black</p></div>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-flame-600 text-xl">⚽</span>
                    <div><p class="font-semibold text-gray-800">Competitions</p><p class="text-gray-600 text-sm">Local leagues & community tournaments</p></div>
                </li>
            </ul>
        </div>
    </div>
</section>

{{-- Mission, Vision, Values --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <p class="section-subtitle">What Drives Us</p>
            <h2 class="section-title">Mission, Vision & Values</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl p-8 shadow-md border-t-4 border-flame-500">
                <div class="text-4xl mb-4">🎯</div>
                <h3 class="font-bold text-xl text-gray-900 mb-3">Our Mission</h3>
                <p class="text-gray-600 leading-relaxed">To develop talented footballers from our community, nurture their God-given abilities, and use the sport as a platform for positive character formation and community engagement.</p>
            </div>
            <div class="bg-white rounded-xl p-8 shadow-md border-t-4 border-flame-500">
                <div class="text-4xl mb-4">👁️</div>
                <h3 class="font-bold text-xl text-gray-900 mb-3">Our Vision</h3>
                <p class="text-gray-600 leading-relaxed">To become a leading community football club in Kenya that is recognised not only for sporting excellence but also for its positive impact on youth, families, and the wider community.</p>
            </div>
            <div class="bg-white rounded-xl p-8 shadow-md border-t-4 border-flame-500">
                <div class="text-4xl mb-4">💎</div>
                <h3 class="font-bold text-xl text-gray-900 mb-3">Our Values</h3>
                <ul class="text-gray-600 space-y-2">
                    <li class="flex items-center gap-2"><span class="text-flame-500">✓</span> Faith & Integrity</li>
                    <li class="flex items-center gap-2"><span class="text-flame-500">✓</span> Teamwork & Unity</li>
                    <li class="flex items-center gap-2"><span class="text-flame-500">✓</span> Discipline & Hard Work</li>
                    <li class="flex items-center gap-2"><span class="text-flame-500">✓</span> Respect & Sportsmanship</li>
                    <li class="flex items-center gap-2"><span class="text-flame-500">✓</span> Community Service</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Coaching Staff --}}
@if($coaches->count())
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <p class="section-subtitle">The Backroom</p>
            <h2 class="section-title">Coaching Staff</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($coaches as $coach)
            <div class="card text-center">
                <img src="{{ $coach->photo_url }}" alt="{{ $coach->name }}" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-xl text-gray-900">{{ $coach->name }}</h3>
                    <p class="text-flame-600 font-semibold mb-3">{{ $coach->role }}</p>
                    @if($coach->bio)
                        <p class="text-gray-600 text-sm leading-relaxed">{{ $coach->bio }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Church Relationship --}}
<section class="py-20 bg-gradient-to-r from-gray-900 to-flame-900 text-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <p class="text-flame-400 uppercase tracking-widest font-semibold text-sm mb-4">Our Foundation</p>
        <h2 class="text-3xl font-bold mb-6">Our Church Connection</h2>
        <p class="text-gray-300 leading-relaxed text-lg mb-6">
            Flame Igniters FC operates under the spiritual and organisational covering of <strong class="text-flame-400">Life Renewal Center Kamirithu Church</strong>.
            The church provides the team with a home, a community, and a purpose beyond football.
        </p>
        <p class="text-gray-300 leading-relaxed text-lg mb-8">
            Our activities include community outreach, youth mentorship, and church events — all centred around the belief that sport can be a powerful ministry tool.
        </p>
        @php $churchUrl = \App\Models\SiteSetting::get('church_website'); @endphp
        @if($churchUrl)
            <a href="{{ $churchUrl }}" target="_blank" class="btn-primary">Visit Church Website</a>
        @endif
    </div>
</section>

@endsection
