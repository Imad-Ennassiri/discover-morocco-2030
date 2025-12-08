@extends('layouts.admin')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Newsletters</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Manage newsletter subscribers.</p>
        </div>
    </div>

    <!-- Filters & Export -->
    <!-- Filters & Export -->
    <div class="glass-card p-4 mb-8 rounded-2xl flex flex-col md:flex-row gap-4 items-center justify-between">
        <form id="search-form" action="{{ route('admin.newsletters.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
            <div class="relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" id="searchInput" name="search" value="{{ request('search') }}" placeholder="Search subscribers..." class="pl-10 pr-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500 w-full md:w-64 has-icon">
            </div>
            <select name="sort" onchange="this.form.submit()" class="px-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500" style="padding-right: 2.5rem;">
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                <option value="email_asc" {{ request('sort') == 'email_asc' ? 'selected' : '' }}>Email (A-Z)</option>
                <option value="email_desc" {{ request('sort') == 'email_desc' ? 'selected' : '' }}>Email (Z-A)</option>
            </select>
        </form>

        <!-- Export Button -->
        <a href="{{ route('admin.newsletters.export') }}" class="btn-primary whitespace-nowrap text-sm">
            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Export to Excel
        </a>
    </div>

    <!-- Table -->
    <div id="table-container" class="glass-card rounded-2xl overflow-hidden shadow-xl">
        @include('admin.newsletters.partials.table')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableContainer = document.getElementById('table-container');
            let timeout = null;

            const fetchResults = () => {
                const form = document.getElementById('search-form');
                const query = searchInput.value;
                const sort = form.querySelector('select[name="sort"]').value;

                const url = new URL("{{ route('admin.newsletters.index') }}");
                url.searchParams.set('search', query);
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
        });
    </script>
@endsection
