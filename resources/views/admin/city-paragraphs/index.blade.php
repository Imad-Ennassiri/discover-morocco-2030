@extends('layouts.admin')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">City Content</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Manage content paragraphs for cities.</p>
        </div>
        <a href="{{ route('admin.city-paragraphs.create') }}" class="btn-primary shadow-lg shadow-primary-500/30">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Content
        </a>
    </div>

    <!-- Filters -->
    <div class="glass-card p-4 mb-8 rounded-2xl flex flex-col md:flex-row gap-4 items-center justify-between">
        <form id="search-form" action="{{ route('admin.city-paragraphs.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
            <div class="relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" id="searchInput" name="search" value="{{ request('search') }}" placeholder="Search content..." class="pl-10 pr-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500 w-full md:w-64 has-icon">
            </div>
            <select name="sort" onchange="this.form.submit()" class="px-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500" style="padding-right: 2.5rem;">
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Newest First</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>Title (A-Z)</option>
                <option value="title_desc" {{ request('sort') == 'title_desc' ? 'selected' : '' }}>Title (Z-A)</option>
            </select>
        </form>
    </div>

    <div id="table-container" class="glass-card rounded-2xl overflow-hidden shadow-xl">
        @include('admin.city-paragraphs.partials.table')
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

                const url = new URL("{{ route('admin.city-paragraphs.index') }}");
                url.searchParams.set('search', query);
                if (sort) url.searchParams.set('sort', sort);

                fetch(url, {
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
                })
                .then(response => response.text())
                .then(html => { tableContainer.innerHTML = html; })
                .catch(error => console.error('Error:', error));
            };

            searchInput.addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(fetchResults, 300);
            });

            // Event delegation for View buttons
            tableContainer.addEventListener('click', function(e) {
                const btn = e.target.closest('.view-btn');
                if (btn && btn.dataset.paragraph) {
                    e.preventDefault();
                    try {
                        const paragraph = JSON.parse(btn.dataset.paragraph);
                        window.premiumModal.open(paragraph, 'cityParagraph', 'selectedParagraph', 'showModal');
                    } catch (error) {
                        console.error('Error:', error);
                    }
                }
            });
        });
    </script>
@endsection
