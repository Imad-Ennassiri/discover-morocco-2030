@extends('layouts.admin')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Cities</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Manage Moroccan cities and their details.</p>
        </div>
        <a href="{{ route('admin.cities.create') }}" class="btn-primary shadow-lg shadow-primary-500/30">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create City
        </a>
    </div>

    <!-- Filters -->
    <div class="glass-card p-4 mb-8 rounded-2xl flex flex-col md:flex-row gap-4 items-center justify-between">
        <form id="search-form" action="{{ route('admin.cities.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 w-full">
            <div class="relative w-full md:w-full">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" id="searchInput" name="search" value="{{ request('search') }}" placeholder="Search cities..." class="pl-10 pr-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500 w-full has-icon">
            </div>
            <div class="flex gap-4 w-full md:w-auto shrink-0">
                <select name="category" onchange="this.form.submit()" class="py-2 pl-4 pr-8 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500 w-full md:w-auto">
                    <option value="">All Categories</option>
                    @foreach($available_categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                    @endforeach
                </select>
                <select name="sort" onchange="this.form.submit()" class="py-2 pl-4 pr-8 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500 w-full md:w-auto">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Newest First</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                </select>
            </div>
        </form>
    </div>

    <div id="table-container" class="glass-card rounded-2xl overflow-hidden shadow-xl">
        @include('admin.cities.partials.table')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableContainer = document.getElementById('table-container');
            let timeout = null;

            searchInput.addEventListener('input', function() {
                clearTimeout(timeout);
                const query = this.value;
                const form = document.getElementById('search-form');
                
                // Get other filters (category, sort)
                const category = form.querySelector('select[name="category"]').value;
                const sort = form.querySelector('select[name="sort"]').value;

                timeout = setTimeout(() => {
                    const url = new URL("{{ route('admin.cities.index') }}");
                    url.searchParams.set('search', query);
                    if (category) url.searchParams.set('category', category);
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
                }, 300); // Debounce duration
            });
        });
    </script>
@endsection
