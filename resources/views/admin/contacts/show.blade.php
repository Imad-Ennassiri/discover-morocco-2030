@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white">Message Details</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1">View and manage contact message.</p>
        </div>
        <a href="{{ route('admin.contacts.index') }}" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
            Back to List
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Message Content -->
        <div class="lg:col-span-2 glass-card rounded-2xl p-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">{{ $contact->objet }}</h3>
            <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                {!! nl2br(e($contact->message)) !!}
            </div>
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700 text-sm text-gray-500 dark:text-gray-400">
                Sent on {{ $contact->created_at->format('F d, Y \a\t H:i') }}
            </div>
        </div>

        <!-- Sender Info & Actions -->
        <div class="space-y-6">
            <div class="glass-card rounded-2xl p-6">
                <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-4">Sender Information</h4>
                <div class="space-y-4">
                    <div>
                        <label class="text-xs text-gray-400">Name</label>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $contact->nom_prenom }}</p>
                    </div>
                    <div>
                        <label class="text-xs text-gray-400">Email</label>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $contact->email }}</p>
                    </div>
                    <div>
                        <label class="text-xs text-gray-400">Phone</label>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $contact->telephone ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <div class="glass-card rounded-2xl p-6">
                <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-4">Status</h4>
                <form action="{{ route('admin.contacts.update', $contact) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="statut" onchange="this.form.submit()" class="w-full rounded-xl border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-primary-500 focus:border-primary-500 transition-colors">
                        <option value="non_lu" {{ $contact->statut == 'non_lu' ? 'selected' : '' }}>Non Lu</option>
                        <option value="en_cours" {{ $contact->statut == 'en_cours' ? 'selected' : '' }}>En Cours</option>
                        <option value="traite" {{ $contact->statut == 'traite' ? 'selected' : '' }}>Traité</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
@endsection
