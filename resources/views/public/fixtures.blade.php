@extends('layouts.public')

@section('title', 'Fixtures & Results')
@section('meta_description', 'View all Flame Igniters FC upcoming fixtures and match results.')

@section('content')

<div class="bg-gray-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="section-subtitle text-flame-400">Schedule</p>
        <h1 class="text-4xl md:text-5xl font-black">Fixtures & Results</h1>
    </div>
</div>

<section class="py-16 bg-gray-50" x-data="{ tab: 'upcoming' }">
    <div class="max-w-5xl mx-auto px-4">

        {{-- Tabs --}}
        <div class="flex gap-2 mb-10 bg-white rounded-xl p-1 shadow-sm w-fit mx-auto">
            <button @click="tab = 'upcoming'"
                :class="tab === 'upcoming' ? 'bg-flame-600 text-white' : 'text-gray-600 hover:text-flame-600'"
                class="px-6 py-2 rounded-lg font-semibold transition-all duration-200">
                Upcoming ({{ $upcoming->count() }})
            </button>
            <button @click="tab = 'results'"
                :class="tab === 'results' ? 'bg-flame-600 text-white' : 'text-gray-600 hover:text-flame-600'"
                class="px-6 py-2 rounded-lg font-semibold transition-all duration-200">
                Results ({{ $results->count() }})
            </button>
        </div>

        {{-- Upcoming --}}
        <div x-show="tab === 'upcoming'">
            @forelse($upcoming as $fixture)
            <div class="bg-white rounded-xl shadow-sm mb-4 p-6 border-l-4 {{ $fixture->status === 'Postponed' ? 'border-yellow-400' : 'border-flame-500' }}">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-center sm:text-left">
                        <p class="text-xs text-gray-400 uppercase tracking-wider">{{ $fixture->match_date->format('l, d F Y') }}</p>
                        @if($fixture->kickoff_time)
                            <p class="text-xs text-gray-400">Kick-off: {{ \Carbon\Carbon::parse($fixture->kickoff_time)->format('H:i') }}</p>
                        @endif
                        @if($fixture->competition)
                            <p class="text-xs text-flame-600 font-semibold mt-1">{{ $fixture->competition->name }}</p>
                        @endif
                    </div>
                    <div class="flex items-center gap-6 text-center">
                        <div>
                            <p class="font-black text-gray-900">Flame Igniters FC</p>
                            <p class="text-xs text-gray-400">{{ $fixture->home_away }}</p>
                        </div>
                        <div class="bg-gray-100 rounded-lg px-4 py-2">
                            <p class="font-bold text-gray-500 text-lg">VS</p>
                        </div>
                        <div>
                            <p class="font-black text-gray-900">{{ $fixture->opponent }}</p>
                            @if($fixture->venue)
                                <p class="text-xs text-gray-400">{{ $fixture->venue }}</p>
                            @endif
                        </div>
                    </div>
                    <span class="text-xs font-bold px-3 py-1 rounded-full
                        {{ $fixture->status === 'Postponed' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700' }}">
                        {{ $fixture->status }}
                    </span>
                </div>
            </div>
            @empty
            <div class="text-center py-16">
                <p class="text-5xl mb-4">📅</p>
                <p class="text-gray-500">No upcoming fixtures at the moment.</p>
            </div>
            @endforelse
        </div>

        {{-- Results --}}
        <div x-show="tab === 'results'" x-cloak>
            @forelse($results as $fixture)
            <a href="{{ route('fixtures.show', $fixture) }}" class="block bg-white rounded-xl shadow-sm mb-4 p-6 border-l-4 hover:shadow-md transition-shadow
                {{ $fixture->result === 'W' ? 'border-green-500' : ($fixture->result === 'L' ? 'border-red-500' : 'border-yellow-400') }}">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-center sm:text-left">
                        <p class="text-xs text-gray-400">{{ $fixture->match_date->format('d F Y') }}</p>
                        @if($fixture->competition)
                            <p class="text-xs text-flame-600 font-semibold">{{ $fixture->competition->name }}</p>
                        @endif
                    </div>
                    <div class="flex items-center gap-4 text-center">
                        <p class="font-black text-gray-900 w-32 text-right">Flame Igniters FC</p>
                        <div class="bg-gray-900 text-white rounded-lg px-5 py-2 min-w-[80px]">
                            <p class="font-black text-xl">{{ $fixture->scoreline }}</p>
                        </div>
                        <p class="font-black text-gray-900 w-32 text-left">{{ $fixture->opponent }}</p>
                    </div>
                    <span class="text-xs font-bold px-3 py-1 rounded-full
                        {{ $fixture->result === 'W' ? 'bg-green-100 text-green-700' : ($fixture->result === 'L' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                        {{ $fixture->result === 'W' ? 'WIN' : ($fixture->result === 'L' ? 'LOSS' : 'DRAW') }}
                    </span>
                </div>
            </a>
            @empty
            <div class="text-center py-16">
                <p class="text-5xl mb-4">⚽</p>
                <p class="text-gray-500">No results recorded yet.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>

@endsection
