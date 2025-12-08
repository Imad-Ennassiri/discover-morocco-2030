@extends('layouts.admin')

@section('content')
    <div x-data="{ showModal: false, selectedContact: null }">
        <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Contacts</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Manage incoming messages and inquiries.</p>
            </div>
        </div>

        <!-- Filters -->
        <div class="glass-card p-4 mb-8 rounded-2xl flex flex-col md:flex-row gap-4 items-center justify-between">
            <form id="search-form" action="{{ route('admin.contacts.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" id="searchInput" name="search" value="{{ request('search') }}" placeholder="Search messages..." class="pl-10 pr-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500 w-full md:w-64 has-icon">
                </div>
                <select name="status" onchange="this.form.submit()" class="px-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500" style="padding-right: 2.5rem;">
                    <option value="">All Status</option>
                    <option value="non_lu" {{ request('status') == 'non_lu' ? 'selected' : '' }}>Non Lu</option>
                    <option value="en_cours" {{ request('status') == 'en_cours' ? 'selected' : '' }}>En Cours</option>
                    <option value="traite" {{ request('status') == 'traite' ? 'selected' : '' }}>Traité</option>
                </select>
                <select name="sort" onchange="this.form.submit()" class="px-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500" style="padding-right: 2.5rem;">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Newest First</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                </select>
            </form>
        </div>

        <div id="table-container" class="glass-card rounded-2xl overflow-hidden shadow-xl">
             @include('admin.contacts.partials.table')
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                const tableContainer = document.getElementById('table-container');
                let timeout = null;

                const fetchResults = () => {
                   const form = document.getElementById('search-form');
                   const query = searchInput.value;
                   const status = form.querySelector('select[name="status"]').value;
                   const sort = form.querySelector('select[name="sort"]').value;

                   const url = new URL("{{ route('admin.contacts.index') }}");
                   url.searchParams.set('search', query);
                   if (status) url.searchParams.set('status', status);
                   if (sort) url.searchParams.set('sort', sort);

                   fetch(url, {
                       headers: {
                           'X-Requested-With': 'XMLHttpRequest'
                       }
                   })
                   .then(response => response.text())
                   .then(html => {
                       tableContainer.innerHTML = html;
                       // Re-initialize Alpine.js or event listeners if needed
                   })
                   .catch(error => console.error('Error:', error));
                };

                searchInput.addEventListener('input', function() {
                    clearTimeout(timeout);
                    timeout = setTimeout(fetchResults, 300);
                });

                // Event delegation for View buttons (Dynamic content)
                tableContainer.addEventListener('click', function(e) {
                    const btn = e.target.closest('.view-btn');
                    if (btn) {
                        try {
                            const contact = JSON.parse(btn.dataset.contact);
                            const alpineEl = tableContainer.closest('[x-data]');
                            if (alpineEl && alpineEl.__x) {
                                alpineEl.__x.$data.selectedContact = contact;
                                alpineEl.__x.$data.showModal = true;
                            }
                        } catch (e) {
                            console.error('Error parsing contact data', e);
                        }
                    }
                });
            });
        </script>

        <!-- Modal -->
        <div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20">
                <div class="fixed inset-0 transition-opacity" @click="showModal = false">
                    <div class="absolute inset-0 bg-black opacity-75"></div>
                </div>
                <div class="relative bg-white dark:bg-gray-800 rounded-2xl max-w-2xl w-full shadow-2xl transform transition-all">
                    <button @click="showModal = false" class="absolute top-4 right-4 p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="p-8">
                        <template x-if="selectedContact">
                            <div>
                                <div class="flex items-start mb-6">
                                    <div class="h-12 w-12 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center mr-4">
                                        <span class="text-primary-700 dark:text-primary-400 font-bold text-lg" x-text="selectedContact.nom_prenom.charAt(0)"></span>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white" x-text="selectedContact.nom_prenom"></h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400" x-text="selectedContact.email"></p>
                                        <p class="text-xs text-gray-500 dark:text-gray-500 mt-1" x-text="new Date(selectedContact.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })"></p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h4 class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Subject</h4>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white" x-text="selectedContact.objet"></p>
                                </div>
                                <div class="mb-6">
                                    <h4 class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Message</h4>
                                    <div class="bg-gray-50 dark:bg-gray-900/50 rounded-xl p-4">
                                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap" x-text="selectedContact.message"></p>
                                    </div>
                                </div>
                                <div class="mb-6" x-show="selectedContact.telephone">
                                    <h4 class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Phone</h4>
                                    <p class="text-gray-900 dark:text-white" x-text="selectedContact.telephone"></p>
                                </div>
                                <div class="mb-6">
                                    <h4 class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Status</h4>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium"
                                        :class="{
                                            'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300': selectedContact.statut === 'traite',
                                            'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300': selectedContact.statut === 'en_cours',
                                            'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300': selectedContact.statut === 'non_lu'
                                        }"
                                        x-text="selectedContact.statut.replace('_', ' ').toUpperCase()">
                                    </span>
                                </div>
                                <div class="flex gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <a :href="`/admin_morocco_2030/contacts/${selectedContact.id}/edit`" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-xl font-medium transition-colors text-sm">
                                        Change Status
                                    </a>
                                    <button @click="showModal = false" class="px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors font-medium text-sm">
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
