@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white">Volunteer Profile</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1">View volunteer details.</p>
        </div>
        <a href="{{ route('admin.volontaires.index') }}" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
            Back to List
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="glass-card rounded-2xl p-6 text-center">
            <div class="relative inline-block">
                @if($volontaire->photo)
                    <img src="{{ Storage::url($volontaire->photo) }}" alt="" class="h-32 w-32 rounded-full object-cover border-4 border-white dark:border-gray-700 shadow-lg">
                @else
                    <div class="h-32 w-32 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center text-primary-600 dark:text-primary-400 text-3xl font-bold border-4 border-white dark:border-gray-700 shadow-lg mx-auto">
                        {{ substr($volontaire->nom, 0, 1) }}{{ substr($volontaire->prenom, 0, 1) }}
                    </div>
                @endif
            </div>
            <h3 class="mt-4 text-xl font-bold text-gray-900 dark:text-white">{{ $volontaire->nom }} {{ $volontaire->prenom }}</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $volontaire->ville }} • {{ $volontaire->pays }}</p>
            
            <div class="mt-6 flex justify-center space-x-3">
                @if($volontaire->cv)
                    <a href="{{ Storage::url($volontaire->cv) }}" target="_blank" class="px-4 py-2 bg-primary-600 text-white rounded-lg text-sm font-medium hover:bg-primary-700 transition-colors shadow-lg shadow-primary-500/30">
                        Download CV
                    </a>
                @endif
                <a href="mailto:{{ $volontaire->email }}" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    Email
                </a>
            </div>
        </div>

        <!-- Details -->
        <div class="lg:col-span-2 glass-card rounded-2xl p-6">
            <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Personal Information</h4>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="text-xs text-gray-400">Date of Birth</label>
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($volontaire->date_naissance)->format('M d, Y') }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-400">Identity (CIN/Passport)</label>
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $volontaire->identite }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-400">Phone</label>
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $volontaire->telephone }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-400">Education Level</label>
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $volontaire->niveau_etudes }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-400">Languages</label>
                    <div class="flex flex-wrap gap-2 mt-1">
                        @if(is_array($volontaire->langues))
                            @foreach($volontaire->langues as $langue)
                                <span class="px-2 py-1 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded text-xs font-medium">{{ $langue }}</span>
                            @endforeach
                        @else
                            <span class="text-sm text-gray-900 dark:text-white">{{ $volontaire->langues }}</span>
                        @endif
                    </div>
                </div>
                <div>
                    <label class="text-xs text-gray-400">Availability</label>
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $volontaire->disponibilite }}</p>
                </div>
            </div>

            <div class="mt-6">
                <label class="text-xs text-gray-400">Competences</label>
                <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">{{ $volontaire->competences }}</p>
            </div>
            
            <div class="mt-6">
                <label class="text-xs text-gray-400">Volunteering City Preference</label>
                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $volontaire->ville_volontariat }}</p>
            </div>
        </div>
    </div>
@endsection
