@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Edit Contact Status</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Update the status of this contact message.</p>
    </div>

    <div class="glass-card rounded-2xl p-8 shadow-xl max-w-2xl">
        <form action="{{ route('admin.contacts.update', $contact) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Contact Info (Read-only) -->
            <div class="mb-6 p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl">
                <h3 class="font-bold text-gray-900 dark:text-white mb-2">Contact Information</h3>
                <div class="space-y-1 text-sm">
                    <p><span class="font-medium text-gray-600 dark:text-gray-400">Name:</span> {{ $contact->nom_prenom }}</p>
                    <p><span class="font-medium text-gray-600 dark:text-gray-400">Email:</span> {{ $contact->email }}</p>
                    <p><span class="font-medium text-gray-600 dark:text-gray-400">Subject:</span> {{ $contact->objet }}</p>
                </div>
            </div>

            <!-- Status Selection -->
            <div>
                <label for="statut" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Status *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <select name="statut" id="statut" required class="w-full pl-10 has-icon">
                        <option value="non_lu" {{ old('statut', $contact->statut) == 'non_lu' ? 'selected' : '' }}>Non Lu</option>
                        <option value="en_cours" {{ old('statut', $contact->statut) == 'en_cours' ? 'selected' : '' }}>En Cours</option>
                        <option value="traite" {{ old('statut', $contact->statut) == 'traite' ? 'selected' : '' }}>Traité</option>
                    </select>
                </div>
                @error('statut')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-8 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.contacts.show', $contact) }}" class="px-6 py-3 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors font-medium">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Update Status
                </button>
            </div>
        </form>
    </div>
@endsection
