@extends('layouts.admin')

@section('content')
    <div x-data="{ 
        showUploadModal: false, 
        uploadType: 'App\\Models\\City', 
        selectedModelId: '',
        showLightbox: false,
        lightboxSrc: '',
        lightboxType: 'image'
    }">
        
        <!-- Header & Actions -->
        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Media Manager</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Manage all your media assets in one place.</p>
            </div>
            
            <div class="flex gap-3">
                <button @click="showUploadModal = true" class="btn-primary flex items-center shadow-lg shadow-primary-500/30">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    Upload Media
                </button>
            </div>
        </div>

        <!-- Filters -->
        <div class="glass-card p-4 mb-8 rounded-2xl flex flex-col md:flex-row gap-4 items-center justify-between">
            <form id="filter-form" action="{{ route('admin.media.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                <div class="relative">
                    <select id="cityFilter" name="city_id" class="pl-4 pr-10 py-2.5 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-sm font-medium focus:ring-2 focus:ring-primary-500 focus:border-transparent shadow-sm w-full md:w-48">
                        <option value="">All Cities</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>{{ $city->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="relative">
                    <select id="destinationFilter" name="destination_id" class="pl-4 pr-10 py-2.5 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-sm font-medium focus:ring-2 focus:ring-primary-500 focus:border-transparent shadow-sm w-full md:w-48">
                        <option value="">All Destinations</option>
                        @foreach($destinations as $destination)
                            <option value="{{ $destination->id }}" {{ request('destination_id') == $destination->id ? 'selected' : '' }}>{{ $destination->nom }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="button" id="clearFilters" class="flex items-center justify-center px-4 py-2.5 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-sm font-medium {{ (request('city_id') || request('destination_id')) ? '' : 'hidden' }}">
                    Clear Filters
                </button>
            </form>
        </div>

        <div id="gallery-container">
            @include('admin.media.partials.gallery')
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const cityFilter = document.getElementById('cityFilter');
                const destinationFilter = document.getElementById('destinationFilter');
                const clearFiltersBtn = document.getElementById('clearFilters');
                const galleryContainer = document.getElementById('gallery-container');

                const fetchResults = () => {
                    const cityId = cityFilter.value;
                    const destinationId = destinationFilter.value;

                    const url = new URL("{{ route('admin.media.index') }}");
                    if (cityId) url.searchParams.set('city_id', cityId);
                    if (destinationId) url.searchParams.set('destination_id', destinationId);

                    // Show/Hide Clear Button
                    if (cityId || destinationId) {
                        clearFiltersBtn.classList.remove('hidden');
                    } else {
                        clearFiltersBtn.classList.add('hidden');
                    }

                    fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        galleryContainer.innerHTML = html;
                    })
                    .catch(error => console.error('Error:', error));
                };

                cityFilter.addEventListener('change', fetchResults);
                destinationFilter.addEventListener('change', fetchResults);

                clearFiltersBtn.addEventListener('click', function() {
                    cityFilter.value = "";
                    destinationFilter.value = "";
                    fetchResults();
                });

                // Event delegation for Lightbox (Dynamic content)
                galleryContainer.addEventListener('click', function(e) {
                    const btn = e.target.closest('.lightbox-trigger');
                    if (btn) {
                        try {
                            const src = btn.dataset.src;
                            const type = btn.dataset.type;
                            const alpineEl = galleryContainer.closest('[x-data]');
                            if (alpineEl && alpineEl.__x) {
                                alpineEl.__x.$data.lightboxSrc = src;
                                alpineEl.__x.$data.lightboxType = type;
                                alpineEl.__x.$data.showLightbox = true;
                            }
                        } catch (e) {
                            console.error('Error handling lightbox', e);
                        }
                    }
                });
            });
        </script>

        <!-- Upload Modal -->
        <div x-show="showUploadModal" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="showUploadModal = false">
                    <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-bold text-gray-900 dark:text-white mb-4">
                                    Upload Media
                                </h3>
                                
                                <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                    @csrf
                                    
                                    <!-- Type Toggle -->
                                    <div class="flex space-x-4 mb-4">
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="model_type" value="App\Models\City" x-model="uploadType" class="form-radio text-primary-600">
                                            <span class="ml-2 text-gray-700 dark:text-gray-300">City</span>
                                        </label>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="model_type" value="App\Models\Destination" x-model="uploadType" class="form-radio text-primary-600">
                                            <span class="ml-2 text-gray-700 dark:text-gray-300">Destination</span>
                                        </label>
                                    </div>

                                    <!-- Select Model -->
                                    <div x-show="uploadType === 'App\\Models\\City'">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Select City</label>
                                        <select name="model_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900" :required="uploadType === 'App\\Models\\City'">
                                            <option value="">Choose a city...</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div x-show="uploadType === 'App\\Models\\Destination'">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Select Destination</label>
                                        <select name="model_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900" :required="uploadType === 'App\\Models\\Destination'">
                                            <option value="">Choose a destination...</option>
                                            @foreach($destinations as $destination)
                                                <option value="{{ $destination->id }}">{{ $destination->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Media Type -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Media Type</label>
                                        <select name="type" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900" required>
                                            <option value="image">Image</option>
                                            <option value="video">Video</option>
                                        </select>
                                    </div>

                                    <!-- File Input -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">File</label>
                                        <input type="file" name="file" class="w-full" required>
                                    </div>

                                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                        <button type="submit" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-primary-600 text-base font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Upload
                                        </button>
                                        <button type="button" @click="showUploadModal = false" class="mt-3 w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lightbox Modal -->
        <div x-show="showLightbox" class="fixed inset-0 z-[60] overflow-y-auto" x-cloak>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="showLightbox = false">
                    <div class="absolute inset-0 bg-black opacity-90"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-middle bg-transparent rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-5xl w-full relative">
                    <button @click="showLightbox = false" class="absolute top-0 right-0 -mt-12 -mr-12 p-4 text-white hover:text-gray-300 focus:outline-none">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    
                    <div class="flex justify-center items-center">
                        <template x-if="lightboxType === 'image'">
                            <img :src="lightboxSrc" class="max-h-[85vh] max-w-full rounded-lg shadow-2xl">
                        </template>
                        <template x-if="lightboxType === 'video'">
                            <video :src="lightboxSrc" controls autoplay class="max-h-[85vh] max-w-full rounded-lg shadow-2xl"></video>
                        </template>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
