@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Add City Content</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Create a new content paragraph for a city.</p>
    </div>

    <div class="glass-card rounded-2xl p-8 shadow-xl max-w-4xl">
        <form action="{{ route('admin.city-paragraphs.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
                <!-- City Selection -->
                <div>
                    <label for="city_id" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">City *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <select name="city_id" id="city_id" required class="w-full pl-10 has-icon">
                            <option value="">Select a City</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('city_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="titre" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Title (Optional)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                        </div>
                        <input type="text" name="titre" id="titre" value="{{ old('titre') }}" class="w-full pl-10 has-icon" placeholder="e.g., History, Culture, Tourism">
                    </div>
                    @error('titre')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="contenu" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Content *</label>
                    <textarea name="contenu" id="contenu" rows="8" required class="w-full" placeholder="Enter the content paragraph...">{{ old('contenu') }}</textarea>
                    @error('contenu')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.city-paragraphs.index') }}" class="px-6 py-3 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors font-medium">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Create Content
                </button>
            </div>
        </form>
    </div>
@endsection
