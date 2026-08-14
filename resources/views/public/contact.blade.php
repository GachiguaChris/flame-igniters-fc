@extends('layouts.public')

@section('title', 'Contact Us')
@section('meta_description', 'Get in touch with Flame Igniters FC.')

@section('content')

<div class="bg-gray-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="section-subtitle text-flame-400">Get In Touch</p>
        <h1 class="text-4xl md:text-5xl font-black">Contact Us</h1>
    </div>
</div>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-10">

        {{-- Contact Info --}}
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="font-bold text-gray-900 text-lg mb-4">Contact Information</h3>
                @php
                    $email   = \App\Models\SiteSetting::get('contact_email');
                    $phone   = \App\Models\SiteSetting::get('contact_phone');
                    $address = \App\Models\SiteSetting::get('contact_address');
                    $fb      = \App\Models\SiteSetting::get('facebook_url');
                    $ig      = \App\Models\SiteSetting::get('instagram_url');
                    $tw      = \App\Models\SiteSetting::get('twitter_url');
                @endphp
                <ul class="space-y-4 text-sm">
                    @if($email)
                    <li class="flex items-start gap-3">
                        <span class="text-flame-600 text-lg mt-0.5">✉️</span>
                        <div>
                            <p class="font-semibold text-gray-700">Email</p>
                            <a href="mailto:{{ $email }}" class="text-flame-600 hover:underline">{{ $email }}</a>
                        </div>
                    </li>
                    @endif
                    @if($phone)
                    <li class="flex items-start gap-3">
                        <span class="text-flame-600 text-lg mt-0.5">📞</span>
                        <div>
                            <p class="font-semibold text-gray-700">Phone</p>
                            <p class="text-gray-600">{{ $phone }}</p>
                        </div>
                    </li>
                    @endif
                    @if($address)
                    <li class="flex items-start gap-3">
                        <span class="text-flame-600 text-lg mt-0.5">📍</span>
                        <div>
                            <p class="font-semibold text-gray-700">Location</p>
                            <p class="text-gray-600">{{ $address }}</p>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>

            @if($fb || $ig || $tw)
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="font-bold text-gray-900 text-lg mb-4">Follow Us</h3>
                <div class="space-y-3">
                    @if($fb)
                    <a href="{{ $fb }}" target="_blank" class="flex items-center gap-3 text-gray-600 hover:text-flame-600 transition-colors">
                        <span class="text-xl">📘</span> Facebook
                    </a>
                    @endif
                    @if($ig)
                    <a href="{{ $ig }}" target="_blank" class="flex items-center gap-3 text-gray-600 hover:text-flame-600 transition-colors">
                        <span class="text-xl">📸</span> Instagram
                    </a>
                    @endif
                    @if($tw)
                    <a href="{{ $tw }}" target="_blank" class="flex items-center gap-3 text-gray-600 hover:text-flame-600 transition-colors">
                        <span class="text-xl">🐦</span> Twitter / X
                    </a>
                    @endif
                </div>
            </div>
            @endif
        </div>

        {{-- Contact Form --}}
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-8">
            <h3 class="font-bold text-gray-900 text-xl mb-6">Send Us a Message</h3>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg p-4 mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Your Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-flame-500 focus:border-transparent @error('name') border-red-400 @enderror">
                        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-flame-500 focus:border-transparent @error('email') border-red-400 @enderror">
                        @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Subject</label>
                    <input type="text" name="subject" value="{{ old('subject') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-flame-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Message <span class="text-red-500">*</span></label>
                    <textarea name="message" rows="6" required
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-flame-500 focus:border-transparent @error('message') border-red-400 @enderror">{{ old('message') }}</textarea>
                    @error('message')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="btn-primary w-full text-center">Send Message</button>
            </form>
        </div>

    </div>
</section>

@endsection
