@extends('layouts.public')

@section('title', 'Flame Igniters FC vs ' . $fixture->opponent)

@section('content')

<div class="bg-gray-900 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 text-center">
        @if($fixture->competition)
            <p class="text-flame-400 uppercase tracking-widest text-sm font-semibold mb-3">{{ $fixture->competition->name }}</p>
        @endif
        <div class="flex items-center justify-center gap-8 mb-4">
            <p class="font-black text-2xl md:text-3xl">Flame Igniters FC</p>
            <div class="bg-flame-600 rounded-xl px-6 py-3">
                <p class="font-black text-3xl md:text-4xl">{{ $fixture->scoreline }}</p>
            </div>
            <p class="font-black text-2xl md:text-3xl">{{ $fixture->opponent }}</p>
        </div>
        <p class="text-gray-400">{{ $fixture->match_date->format('l, d F Y') }}
            @if($fixture->venue) · {{ $fixture->venue }} @endif
            · {{ $fixture->home_away }}
        </p>
    </div>
</div>

<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4">
        @if($fixture->match_report)
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Match Report</h2>
            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                {!! nl2br(e($fixture->match_report)) !!}
            </div>
        @else
            <p class="text-gray-500 text-center py-10">No match report available for this fixture.</p>
        @endif
        <div class="mt-10">
            <a href="{{ route('fixtures.index') }}" class="btn-outline">← Back to Fixtures</a>
        </div>
    </div>
</section>

@endsection
