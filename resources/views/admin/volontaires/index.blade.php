@extends('layouts.admin')

@section('content')
    <div x-data="{ showModal: false, selectedVolontaire: null }">
        <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Volunteers</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Manage volunteer applications for Morocco 2030.</p>
            </div>
        </div>

        <!-- Filters -->
        <div class="glass-card p-4 mb-8 rounded-2xl flex flex-col md:flex-row gap-4 items-center justify-between">
            <form action="{{ route('admin.volontaires.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search volunteers..." class="pl-10 pr-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500 w-full md:w-64 has-icon">
                </div>
                <select name="sort" onchange="this.form.submit()" class="py-2 pl-4 pr-8 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Newest First</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                </select>
            </form>
        </div>

        <div class="glass-card rounded-2xl overflow-hidden shadow-xl">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800">
                        <th class="px-8 py-5 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-left">Volunteer</th>
                        <th class="px-8 py-5 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-left">Contact</th>
                        <th class="px-8 py-5 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-left">City</th>
                        <th class="px-8 py-5 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-left">Date</th>
                        <th class="px-8 py-5 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                    @forelse($volontaires as $volontaire)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/50 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center shrink-0">
                                    <span class="text-primary-700 dark:text-primary-400 font-bold text-sm">{{ substr($volontaire->nom, 0, 1) }}{{ substr($volontaire->prenom, 0, 1) }}</span>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-bold text-gray-900 dark:text-white">{{ $volontaire->nom }} {{ $volontaire->prenom }}</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">{{ Str::limit($volontaire->competences, 30) ?? 'No skills listed' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <div class="text-sm text-gray-900 dark:text-white">{{ $volontaire->email }}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ $volontaire->telephone ?? 'N/A' }}</div>
                        </td>
                        <td class="px-8 py-5">
                            <div class="text-sm text-gray-600 dark:text-gray-400">{{ $volontaire->ville ?? 'N/A' }}</div>
                        </td>
                        <td class="px-8 py-5">
                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $volontaire->created_at->format('M d, Y') }}</div>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex items-center justify-end space-x-3">
                                <button @click="showModal = true; selectedVolontaire = {{ $volontaire->toJson() }}" class="p-2 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-xl transition-colors" title="View">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <a href="{{ route('admin.volontaires.edit', $volontaire) }}" class="p-2 text-primary-600 hover:bg-primary-50 dark:hover:bg-primary-900/20 rounded-xl transition-colors" title="Edit">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form id="delete-form-{{ $volontaire->id }}" action="{{ route('admin.volontaires.destroy', $volontaire) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('delete-form-{{ $volontaire->id }}')" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition-colors" title="Delete">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-16 text-center text-gray-500 dark:text-gray-400">
                            <div class="flex flex-col items-center justify-center">
                                <div class="h-20 w-20 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4">
                                    <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">No volunteers found</h3>
                                <p class="text-sm mt-1">{{ request('search') ? 'Try adjusting your search.' : 'No volunteer applications yet.' }}</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-8 py-5 border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-900/50">
                {{ $volontaires->links() }}
            </div>
        </div>

        <!-- Modal -->
        <div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20">
                <div class="fixed inset-0 transition-opacity" @click="showModal = false">
                    <div class="absolute inset-0 bg-black opacity-75"></div>
                </div>
                <div class="relative bg-white dark:bg-gray-800 rounded-2xl max-w-3xl w-full shadow-2xl transform transition-all max-h-[90vh] overflow-y-auto">
                    <button @click="showModal = false" class="absolute top-4 right-4 p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full transition-colors z-10">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="p-8">
                        <template x-if="selectedVolontaire">
                            <div>
                                <div class="flex items-start mb-6">
                                    <div class="h-16 w-16 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center mr-4">
                                        <span class="text-primary-700 dark:text-primary-400 font-bold text-2xl" x-text="selectedVolontaire.nom.charAt(0) + selectedVolontaire.prenom.charAt(0)"></span>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white" x-text="selectedVolontaire.nom + ' ' + selectedVolontaire.prenom"></h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400" x-text="selectedVolontaire.email"></p>
                                        <p class="text-xs text-gray-500 dark:text-gray-500 mt-1" x-text="new Date(selectedVolontaire.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })"></p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <h4 class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Phone</h4>
                                        <p class="text-gray-900 dark:text-white" x-text="selectedVolontaire.telephone || 'N/A'"></p>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">City</h4>
                                        <p class="text-gray-900 dark:text-white" x-text="selectedVolontaire.ville || 'N/A'"></p>
                                    </div>
                                </div>
                                <div class="mb-6" x-show="selectedVolontaire.disponibilite">
                                    <h4 class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Availability</h4>
                                    <div class="bg-gray-50 dark:bg-gray-900/50 rounded-xl p-4">
                                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap" x-text="selectedVolontaire.disponibilite"></p>
                                    </div>
                                </div>
                                <div class="mb-6" x-show="selectedVolontaire.competences">
                                    <h4 class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Skills & Competences</h4>
                                    <div class="bg-gray-50 dark:bg-gray-900/50 rounded-xl p-4">
                                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap" x-text="selectedVolontaire.competences"></p>
                                    </div>
                                </div>
                                <div class="flex gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <a :href="`/admin_morocco_2030/volontaires/${selectedVolontaire.id}/edit`" class="btn-primary flex-1 text-center">
                                        Edit Profile
                                    </a>
                                    <button @click="showModal = false" class="px-6 py-3 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors font-medium">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
