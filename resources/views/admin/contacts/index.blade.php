@extends('layouts.admin')

@section('content')
    <div>
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
                   const url = new URL("{{ route('admin.contacts.index') }}");
                   url.searchParams.set('search', searchInput.value);
                   if (form.querySelector('select[name="status"]').value) url.searchParams.set('status', form.querySelector('select[name="status"]').value);
                   if (form.querySelector('select[name="sort"]').value) url.searchParams.set('sort', form.querySelector('select[name="sort"]').value);

                   fetch(url, {
                       headers: {'X-Requested-With': 'XMLHttpRequest'}
                   })
                   .then(response => response.text())
                   .then(html => { tableContainer.innerHTML = html; })
                   .catch(error => console.error('Error:', error));
                };

                searchInput.addEventListener('input', () => {
                    clearTimeout(timeout);
                    timeout = setTimeout(fetchResults, 300);
                });

                // Event delegation for ViewButtons
                tableContainer.addEventListener('click', function(e) {
                    const btn = e.target.closest('.view-btn');
                    if (btn && btn.dataset.contact) {
                        e.preventDefault();
                        try {
                            const contact = JSON.parse(btn.dataset.contact);
                            window.premiumModal.open(contact, 'contact');
                        } catch (error) {
                            console.error('Error:', error);
                        }
                    }
                });
            });
        </script>
    </div>
@endsection
