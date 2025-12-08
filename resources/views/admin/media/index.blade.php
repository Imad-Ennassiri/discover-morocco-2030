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
            <form action="{{ route('admin.media.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                <div class="relative">
                    <select name="city_id" onchange="this.form.submit()" class="pl-4 pr-10 py-2.5 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-sm font-medium focus:ring-2 focus:ring-primary-500 focus:border-transparent shadow-sm w-full md:w-48">
                        <option value="">All Cities</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>{{ $city->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="relative">
                    <select name="destination_id" onchange="this.form.submit()" class="pl-4 pr-10 py-2.5 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-sm font-medium focus:ring-2 focus:ring-primary-500 focus:border-transparent shadow-sm w-full md:w-48">
                        <option value="">All Destinations</option>
                        @foreach($destinations as $destination)
                            <option value="{{ $destination->id }}" {{ request('destination_id') == $destination->id ? 'selected' : '' }}>{{ $destination->nom }}</option>
                        @endforeach
                    </select>
                </div>
                
                @if(request('city_id') || request('destination_id'))
                    <a href="{{ route('admin.media.index') }}" class="flex items-center justify-center px-4 py-2.5 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-sm font-medium">
                        Clear Filters
                    </a>
                @endif
            </form>
        </div>

        <!-- City Images Section -->
        @if($cityImages->count() > 0)
        <div class="glass-card rounded-2xl p-8 shadow-xl mb-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-6 h-6 mr-3 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    City Pictures
                </h3>
                <span class="px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-xs font-bold text-gray-600 dark:text-gray-300">{{ $cityImages->count() }} Items</span>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($cityImages as $media)
                    <div class="group relative aspect-square rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-800 shadow-sm hover:shadow-xl transition-all duration-300">
                        <img src="{{ Storage::url($media->file_path) }}" alt="City Media" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-4">
                            <div class="flex justify-end">
                                <form action="{{ route('admin.media.destroy', $media) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-500/90 backdrop-blur-md rounded-full text-white hover:bg-red-600 transition-colors shadow-lg transform hover:scale-110" title="Delete">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="flex justify-center">
                                <button @click="showLightbox = true; lightboxSrc = '{{ Storage::url($media->file_path) }}'; lightboxType = 'image'" class="px-4 py-2 bg-white/20 backdrop-blur-md rounded-lg text-white text-sm font-medium hover:bg-white/30 transition-colors border border-white/30">
                                    View Full
                                </button>
                            </div>
                            <div class="text-xs text-white/80 font-medium truncate">
                                {{ $media->created_at->format('M d, Y') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- City Videos Section -->
        @if($cityVideos->count() > 0)
        <div class="glass-card rounded-2xl p-8 shadow-xl mb-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-6 h-6 mr-3 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    City Videos
                </h3>
                <span class="px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-xs font-bold text-gray-600 dark:text-gray-300">{{ $cityVideos->count() }} Items</span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($cityVideos as $media)
                    <div class="group relative aspect-video rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-800 shadow-sm hover:shadow-xl transition-all duration-300">
                        <video class="w-full h-full object-cover">
                            <source src="{{ Storage::url($media->file_path) }}" type="video/mp4">
                        </video>
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                            <div class="w-12 h-12 rounded-full bg-white/30 backdrop-blur-sm flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                            </div>
                        </div>
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-4">
                            <div class="flex justify-end">
                                <form action="{{ route('admin.media.destroy', $media) }}" method="POST" onsubmit="return confirm('Delete this video?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-500/90 backdrop-blur-md rounded-full text-white hover:bg-red-600 transition-colors shadow-lg transform hover:scale-110" title="Delete">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="flex justify-center">
                                <button @click="showLightbox = true; lightboxSrc = '{{ Storage::url($media->file_path) }}'; lightboxType = 'video'" class="px-4 py-2 bg-white/20 backdrop-blur-md rounded-lg text-white text-sm font-medium hover:bg-white/30 transition-colors border border-white/30">
                                    Play Full
                                </button>
                            </div>
                            <div class="text-xs text-white/80 font-medium truncate">
                                {{ $media->created_at->format('M d, Y') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Destination Images Section -->
        @if($destinationImages->count() > 0)
        <div class="glass-card rounded-2xl p-8 shadow-xl mb-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-6 h-6 mr-3 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Destination Pictures
                </h3>
                <span class="px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-xs font-bold text-gray-600 dark:text-gray-300">{{ $destinationImages->count() }} Items</span>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($destinationImages as $media)
                    <div class="group relative aspect-square rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-800 shadow-sm hover:shadow-xl transition-all duration-300">
                        <img src="{{ Storage::url($media->file_path) }}" alt="Destination Media" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-4">
                            <div class="flex justify-end">
                                <form action="{{ route('admin.media.destroy', $media) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-500/90 backdrop-blur-md rounded-full text-white hover:bg-red-600 transition-colors shadow-lg transform hover:scale-110" title="Delete">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="flex justify-center">
                                <button @click="showLightbox = true; lightboxSrc = '{{ Storage::url($media->file_path) }}'; lightboxType = 'image'" class="px-4 py-2 bg-white/20 backdrop-blur-md rounded-lg text-white text-sm font-medium hover:bg-white/30 transition-colors border border-white/30">
                                    View Full
                                </button>
                            </div>
                            <div class="text-xs text-white/80 font-medium truncate">
                                {{ $media->created_at->format('M d, Y') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Destination Videos Section -->
        @if($destinationVideos->count() > 0)
        <div class="glass-card rounded-2xl p-8 shadow-xl mb-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-6 h-6 mr-3 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    Destination Videos
                </h3>
                <span class="px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-xs font-bold text-gray-600 dark:text-gray-300">{{ $destinationVideos->count() }} Items</span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($destinationVideos as $media)
                    <div class="group relative aspect-video rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-800 shadow-sm hover:shadow-xl transition-all duration-300">
                        <video class="w-full h-full object-cover">
                            <source src="{{ Storage::url($media->file_path) }}" type="video/mp4">
                        </video>
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                            <div class="w-12 h-12 rounded-full bg-white/30 backdrop-blur-sm flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                            </div>
                        </div>
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-4">
                            <div class="flex justify-end">
                                <form action="{{ route('admin.media.destroy', $media) }}" method="POST" onsubmit="return confirm('Delete this video?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-500/90 backdrop-blur-md rounded-full text-white hover:bg-red-600 transition-colors shadow-lg transform hover:scale-110" title="Delete">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="flex justify-center">
                                <button @click="showLightbox = true; lightboxSrc = '{{ Storage::url($media->file_path) }}'; lightboxType = 'video'" class="px-4 py-2 bg-white/20 backdrop-blur-md rounded-lg text-white text-sm font-medium hover:bg-white/30 transition-colors border border-white/30">
                                    Play Full
                                </button>
                            </div>
                            <div class="text-xs text-white/80 font-medium truncate">
                                {{ $media->created_at->format('M d, Y') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

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
