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
            <form id="search-form" action="{{ route('admin.volontaires.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 w-full">
                <div class="relative w-full md:w-full">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" id="searchInput" name="search" value="{{ request('search') }}" placeholder="Search volunteers..." class="pl-10 pr-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500 w-full has-icon">
                </div>
                <div class="flex gap-4 w-full md:w-auto shrink-0">
                    <input type="text" name="volunteer_city" value="{{ request('volunteer_city') }}" placeholder="Filter by city..." class="px-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500 w-full md:w-48">
                    <select name="sort" onchange="this.form.submit()" class="px-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500" style="padding-right: 2.5rem;">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Newest First</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                    </select>
                </div>
            </form>
        </div>

        <div id="table-container" class="glass-card rounded-2xl overflow-hidden shadow-xl">
             @include('admin.volontaires.partials.table')
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                const tableContainer = document.getElementById('table-container');
                let timeout = null;

                const fetchResults = () => {
                   const form = document.getElementById('search-form');
                   const query = searchInput.value;
                   const volunteerCity = form.querySelector('input[name="volunteer_city"]').value;
                   const sort = form.querySelector('select[name="sort"]').value;

                   const url = new URL("{{ route('admin.volontaires.index') }}");
                   url.searchParams.set('search', query);
                   if (volunteerCity) url.searchParams.set('volunteer_city', volunteerCity);
                   if (sort) url.searchParams.set('sort', sort);

                   fetch(url, {
                       headers: {
                           'X-Requested-With': 'XMLHttpRequest'
                       }
                   })
                   .then(response => response.text())
                   .then(html => {
                       tableContainer.innerHTML = html;
                   })
                   .catch(error => console.error('Error:', error));
                };

                searchInput.addEventListener('input', function() {
                    clearTimeout(timeout);
                    timeout = setTimeout(fetchResults, 300);
                });
                
                // Also trigger on city filter change (with debounce)
                const cityInput = document.querySelector('input[name="volunteer_city"]');
                cityInput.addEventListener('input', function() {
                     clearTimeout(timeout);
                     timeout = setTimeout(fetchResults, 300);
                });

                // Event delegation for View buttons (Dynamic content)
                tableContainer.addEventListener('click', function(e) {
                    const btn = e.target.closest('.view-btn');
                    if (btn) {
                        try {
                            const volontaire = JSON.parse(btn.dataset.volontaire);
                            const alpineEl = tableContainer.closest('[x-data]');
                            if (alpineEl && alpineEl.__x) {
                                alpineEl.__x.$data.selectedVolontaire = volontaire;
                                alpineEl.__x.$data.showModal = true;
                            }
                        } catch (e) {
                            console.error('Error parsing volunteer data', e);
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
                <div class="relative bg-white dark:bg-gray-800 rounded-2xl max-w-2xl w-full shadow-2xl transform transition-all max-h-[85vh] overflow-y-auto">
                    <button @click="showModal = false" class="absolute top-4 right-4 p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full transition-colors z-10">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="p-6">
                        <template x-if="selectedVolontaire">
                            <div>
                                <div class="flex items-start mb-4">
                                    <div class="h-12 w-12 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center mr-3 shrink-0">
                                        <span class="text-primary-700 dark:text-primary-400 font-bold text-base" x-text="selectedVolontaire.nom.charAt(0) + selectedVolontaire.prenom.charAt(0)"></span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-bold text-gray-900 dark:text-white truncate" x-text="selectedVolontaire.nom + ' ' + selectedVolontaire.prenom"></h3>
                                        <p class="text-xs text-gray-600 dark:text-gray-400 truncate" x-text="selectedVolontaire.email"></p>
                                        <p class="text-xs text-gray-500 dark:text-gray-500 mt-0.5" x-text="new Date(selectedVolontaire.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })"></p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 mb-4 text-xs">
                                    <div>
                                        <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Phone</h4>
                                        <p class="text-gray-900 dark:text-white text-xs" x-text="selectedVolontaire.telephone || 'N/A'"></p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Birth Date</h4>
                                        <p class="text-gray-900 dark:text-white text-xs" x-text="selectedVolontaire.date_naissance ? new Date(selectedVolontaire.date_naissance).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' }) : 'N/A'"></p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">ID Number</h4>
                                        <p class="text-gray-900 dark:text-white text-xs" x-text="selectedVolontaire.identite || 'N/A'"></p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Country</h4>
                                        <p class="text-gray-900 dark:text-white text-xs" x-text="selectedVolontaire.pays || 'N/A'"></p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">City</h4>
                                        <p class="text-gray-900 dark:text-white text-xs" x-text="selectedVolontaire.ville || 'N/A'"></p>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Volunteer City</h4>
                                        <p class="text-gray-900 dark:text-white text-xs" x-text="selectedVolontaire.ville_volontariat || 'N/A'"></p>
                                    </div>
                                    <div class="col-span-2" x-show="selectedVolontaire.adresse">
                                        <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Address</h4>
                                        <p class="text-gray-900 dark:text-white text-xs" x-text="selectedVolontaire.adresse"></p>
                                    </div>
                                    <div x-show="selectedVolontaire.niveau_etudes">
                                        <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Education</h4>
                                        <p class="text-gray-900 dark:text-white text-xs" x-text="selectedVolontaire.niveau_etudes"></p>
                                    </div>
                                    <div x-show="selectedVolontaire.langues && selectedVolontaire.langues.length > 0">
                                        <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Languages</h4>
                                        <p class="text-gray-900 dark:text-white text-xs" x-text="Array.isArray(selectedVolontaire.langues) ? selectedVolontaire.langues.join(', ') : 'N/A'"></p>
                                    </div>
                                </div>
                                <div class="mb-3" x-show="selectedVolontaire.disponibilite">
                                    <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Availability</h4>
                                    <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-2">
                                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap text-xs leading-relaxed" x-text="selectedVolontaire.disponibilite"></p>
                                    </div>
                                </div>
                                <div class="mb-3" x-show="selectedVolontaire.competences">
                                    <h4 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Skills</h4>
                                    <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-2">
                                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap text-xs leading-relaxed" x-text="selectedVolontaire.competences"></p>
                                    </div>
                                </div>
                                <div class="flex gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <a :href="`/admin_morocco_2030/volontaires/${selectedVolontaire.id}/edit`" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-xl font-medium transition-colors text-sm">
                                        Edit Profile
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

