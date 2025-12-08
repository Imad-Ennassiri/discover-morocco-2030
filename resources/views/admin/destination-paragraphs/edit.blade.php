@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Edit Destination Content</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Update the content paragraph.</p>
    </div>

    <div class="glass-card rounded-2xl p-8 shadow-xl max-w-4xl">
        <form action="{{ route('admin.destination-paragraphs.update', $destinationParagraph) }}" method="POST" x-data="{ selectedCity: '{{ old('filter_city', $destinationParagraph->destination->city_id) }}' }">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- City Filter (Optional) -->
                <div>
                    <label for="filter_city" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Filter by City (Optional)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <select x-model="selectedCity" class="w-full pl-10 has-icon">
                            <option value="">All Cities</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Destination Selection -->
                <div>
                    <label for="destination_id" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Destination *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <select name="destination_id" id="destination_id" required class="w-full pl-10 has-icon">
                            <option value="">Select a Destination</option>
                            @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}" 
                                    x-show="selectedCity === '' || selectedCity == '{{ $destination->city_id }}'"
                                    {{ old('destination_id', $destinationParagraph->destination_id) == $destination->id ? 'selected' : '' }}>
                                    {{ $destination->nom }} ({{ $destination->city->nom }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('destination_id')
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
                        <input type="text" name="titre" id="titre" value="{{ old('titre', $destinationParagraph->titre) }}" class="w-full pl-10 has-icon" placeholder="e.g., History, Attractions, Activities">
                    </div>
                    @error('titre')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="contenu" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Content *</label>
                    <textarea name="contenu" id="contenu" rows="8" required class="w-full" placeholder="Enter the content paragraph...">{{ old('contenu', $destinationParagraph->contenu) }}</textarea>
                    @error('contenu')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.destination-paragraphs.index') }}" class="px-6 py-3 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors font-medium">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Update Content
                </button>
            </div>
        </form>
    </div>
@endsection
