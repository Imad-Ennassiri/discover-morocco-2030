@extends('layouts.admin')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4 no-print">
        <div>
            <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Dashboard</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Overview of Morocco 2030 platform.</p>
        </div>
        <button onclick="openReportModal()" class="btn-primary shadow-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Review & Download Report 
        </button>
    </div>

    <!-- Report Preview Modal -->
    <div id="reportModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeReportModal()"></div>

            <!-- Modal panel -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-middle bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-4xl sm:w-full">
                
                <!-- Modal Header -->
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4 border-b border-gray-100 dark:border-gray-700">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">
                                Official Report Preview
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Review the generated report before downloading.
                                </p>
                            </div>
                        </div>
                        <button onclick="closeReportModal()" type="button" class="bg-white dark:bg-gray-800 rounded-md text-gray-400 hover:text-gray-500 focus:outline-none">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Modal Body (Iframe) -->
                <div class="bg-gray-50 dark:bg-gray-900 px-4 py-4 sm:p-6" style="height: 65vh;">
                    <iframe id="reportFrame" src="" class="w-full h-full border rounded-md" frameborder="0"></iframe>
                    <div id="loadingReport" class="absolute inset-0 flex items-center justify-center bg-gray-50 dark:bg-gray-900 z-10">
                        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-red-800"></div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-100 dark:border-gray-700">
                    <a href="{{ route('admin.report.generate', ['download' => 'true']) }}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-900 text-base font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Download PDF
                    </a>
                    <button type="button" onclick="closeReportModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function openReportModal() {
            const modal = document.getElementById('reportModal');
            const frame = document.getElementById('reportFrame');
            const loader = document.getElementById('loadingReport');
            
            // Show modal
            modal.classList.remove('hidden');
            
            // Set source if not already set or refresh
            frame.src = "{{ route('admin.report.generate') }}";
            
            // Handle loading state
            loader.classList.remove('hidden');
            frame.onload = function() {
                loader.classList.add('hidden');
            };
        }

        function closeReportModal() {
            const modal = document.getElementById('reportModal');
            const frame = document.getElementById('reportFrame');
            
            modal.classList.add('hidden');
            // Clear src to stop memory usage or keep it if caching is preferred. 
            // Clearing it ensures fresh generation next time but feels slower.
            // Let's clear it to reset state.
            frame.src = 'about:blank';
        }
    </script>
    </div>

    <!-- Print-friendly PDF Report -->
    <div class="hidden print-only">
        @php
            $contentTotal = max($stats['cities'] + $stats['destinations'], 1);
            $engagementTotal = $stats['volontaires'] + $stats['contacts'] + $stats['commentaires'] + $stats['newsletters'];
            $cityPercent = round(($stats['cities'] / $contentTotal) * 100, 1);
            $destPercent = round(($stats['destinations'] / $contentTotal) * 100, 1);

            $channels = [
                'Volunteers' => $stats['volontaires'],
                'Contacts' => $stats['contacts'],
                'Comments' => $stats['commentaires'],
                'Subscribers' => $stats['newsletters'],
            ];
            arsort($channels);
            $topChannel = array_key_first($channels);
            $topChannelValue = $channels[$topChannel];
        @endphp

        <style>
            @page { size: A4; margin: 0; }
            .print-page { page-break-after: always; padding: 2.5cm 2cm 2cm 2cm; min-height: 29.7cm; background: white; color: #111827; font-family: 'Inter', system-ui, -apple-system, sans-serif; }
            .print-page:last-child { page-break-after: auto; }
            .cover {
                background: linear-gradient(135deg, #991b1b 0%, #111827 100%);
                color: white;
                padding: 2.5rem;
                margin: -2.5cm -2cm 2rem -2cm;
                border-bottom: 6px solid #f59e0b;
            }
            .cover h1 { font-size: 2.4rem; margin: 0; letter-spacing: 0.04em; }
            .cover p { margin: 0.35rem 0; font-size: 0.95rem; opacity: 0.9; }
            .pill { display: inline-block; padding: 0.35rem 0.75rem; background: rgba(255,255,255,0.14); border: 1px solid rgba(255,255,255,0.18); border-radius: 999px; font-size: 0.8rem; margin-top: 0.75rem; }
            .section-title { font-size: 1.1rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.06em; margin: 0 0 0.75rem 0; color: #991b1b; }
            .lead { font-size: 0.95rem; line-height: 1.6; color: #1f2937; margin-bottom: 1.25rem; }
            .kpi-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin: 1rem 0 1.75rem 0; }
            .kpi-card { border: 1px solid #e5e7eb; border-radius: 12px; padding: 1rem; background: #f9fafb; }
            .kpi-label { font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; color: #6b7280; margin-bottom: 0.35rem; }
            .kpi-value { font-size: 1.8rem; font-weight: 800; color: #991b1b; }
            .kpi-note { font-size: 0.8rem; color: #374151; margin-top: 0.35rem; }
            .bar-row { display: flex; align-items: center; gap: 0.5rem; margin: 0.35rem 0; }
            .bar-label { width: 42%; font-weight: 600; font-size: 0.85rem; color: #111827; }
            .bar-track { flex: 1; height: 14px; background: #e5e7eb; border-radius: 999px; overflow: hidden; }
            .bar-fill { height: 100%; background: linear-gradient(90deg, #991b1b, #f59e0b); }
            .bar-value { width: 48px; text-align: right; font-size: 0.85rem; color: #111827; }
            .card { border: 1px solid #e5e7eb; border-radius: 12px; padding: 1.25rem; background: white; margin-bottom: 1.25rem; }
            .two-col { display: grid; grid-template-columns: 1.2fr 1fr; gap: 1rem; }
            .list { margin: 0.5rem 0 0 0; padding-left: 1.1rem; color: #1f2937; }
            .list li { margin: 0.25rem 0; }
            .table { width: 100%; border-collapse: collapse; margin-top: 0.75rem; font-size: 0.85rem; }
            .table th { text-align: left; padding: 0.5rem; background: #991b1b; color: white; letter-spacing: 0.03em; font-size: 0.78rem; }
            .table td { padding: 0.45rem 0.5rem; border-bottom: 1px solid #e5e7eb; color: #111827; }
            .muted { color: #6b7280; font-size: 0.83rem; }
            .tag { display: inline-block; padding: 0.25rem 0.6rem; border-radius: 8px; background: #ecfeff; color: #0ea5e9; font-weight: 700; font-size: 0.78rem; letter-spacing: 0.02em; }
            .footer { text-align: center; margin-top: 2rem; padding-top: 1rem; border-top: 1px solid #e5e7eb; font-size: 0.78rem; color: #6b7280; }
        </style>

        <!-- Page 1: Cover + Executive Summary -->
        <div class="print-page">
            <div class="cover">
                <h1>Morocco 2030 — Performance Report</h1>
                <p>FIFA World Cup Edition · Generated {{ now()->format('F d, Y \\a\\t H:i') }}</p>
                <p class="pill">Reporting window: Last 30 days</p>
            </div>

            <h3 class="section-title">Executive Summary</h3>
            <p class="lead">
                The platform now carries <strong>{{ $stats['cities'] }}</strong> host cities and <strong>{{ $stats['destinations'] }}</strong> curated destinations,
                combining for <strong>{{ $contentTotal }}</strong> content items. Community engagement totals <strong>{{ $engagementTotal }}</strong> interactions,
                led by <strong>{{ $topChannel }}</strong> ({{ $topChannelValue }}). Coverage skews {{ $cityPercent }}% toward cities and
                {{ $destPercent }}% toward destinations, indicating balanced storytelling across host locations and attractions.
            </p>

            <div class="kpi-grid">
                <div class="kpi-card">
                    <div class="kpi-label">Content Footprint</div>
                    <div class="kpi-value">{{ $contentTotal }}</div>
                    <div class="kpi-note">Cities: {{ $stats['cities'] }} · Destinations: {{ $stats['destinations'] }}</div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-label">Engagement Volume</div>
                    <div class="kpi-value">{{ $engagementTotal }}</div>
                    <div class="kpi-note">Volunteers, contacts, comments, subscribers combined</div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-label">Top Channel</div>
                    <div class="kpi-value">{{ $topChannelValue }}</div>
                    <div class="kpi-note">{{ $topChannel }} lead current engagement mix</div>
                </div>
            </div>

            <div class="card">
                <div class="section-title" style="margin-bottom: 0.5rem;">Content Coverage</div>
                <div class="bar-row">
                    <div class="bar-label">Host Cities</div>
                    <div class="bar-track"><div class="bar-fill" style="width: {{ $cityPercent }}%;"></div></div>
                    <div class="bar-value">{{ $cityPercent }}%</div>
                </div>
                <div class="bar-row">
                    <div class="bar-label">Tourist Destinations</div>
                    <div class="bar-track"><div class="bar-fill" style="width: {{ $destPercent }}%; background: linear-gradient(90deg,#0ea5e9,#22c55e);"></div></div>
                    <div class="bar-value">{{ $destPercent }}%</div>
                </div>
                <p class="lead" style="margin-top: 0.75rem;">
                    City-led stories remain the core of the experience, while destination content closes the gap. Maintaining this mix keeps both
                    host-city readiness and cultural discovery visible to visitors.
                </p>
            </div>
        </div>

        <!-- Page 2: Engagement & Narrative -->
        <div class="print-page">
            <h3 class="section-title">Engagement Narrative</h3>
            <div class="two-col">
                <div class="card">
                    <p class="lead" style="margin-bottom: 0.8rem;">
                        Engagement is paced by <strong>{{ $topChannel }}</strong>, indicating strong interest through that channel. Contacts and comments
                        provide a healthy feedback loop, while newsletter subscribers form a nurture pool for future volunteer conversion.
                    </p>
                    <ul class="list">
                        <li><strong>Volunteers:</strong> {{ $stats['volontaires'] }} applications; keep the onboarding flow short and clear.</li>
                        <li><strong>Contacts:</strong> {{ $stats['contacts'] }} inquiries; add quick-response templates for faster follow-up.</li>
                        <li><strong>Comments:</strong> {{ $stats['commentaires'] }} community inputs; highlight top comments on destination pages.</li>
                        <li><strong>Subscribers:</strong> {{ $stats['newsletters'] }} readers; schedule a weekly “Road to 2030” digest.</li>
                    </ul>
                </div>
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Channel</th>
                                <th>Count</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Volunteers</td><td>{{ $stats['volontaires'] }}</td><td>Operational workforce</td></tr>
                            <tr><td>Contacts</td><td>{{ $stats['contacts'] }}</td><td>Service & partnerships</td></tr>
                            <tr><td>Comments</td><td>{{ $stats['commentaires'] }}</td><td>On-page signal</td></tr>
                            <tr><td>Subscribers</td><td>{{ $stats['newsletters'] }}</td><td>Nurture & re-engage</td></tr>
                            <tr><td><strong>Total</strong></td><td><strong>{{ $engagementTotal }}</strong></td><td><span class="tag">Healthy</span></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="section-title" style="margin-bottom: 0.5rem;">Platform Momentum</div>
                <p class="lead" style="margin-bottom: 0.4rem;">
                    The platform’s momentum is anchored by consistent content growth and multi-channel engagement. Converting high-intent
                    channels ({{ $topChannel }}) into deeper actions (volunteering and city discovery) should be prioritized.
                </p>
                <ul class="list">
                    <li>Pair new destination drops with a “nearby city” call-to-action to cross-pollinate traffic.</li>
                    <li>Use subscribers as a retargeting audience for volunteer drives and host-city updates.</li>
                    <li>Keep a weekly cadence of destination highlights to balance the {{ $cityPercent }}% city focus.</li>
                </ul>
            </div>

            <div class="card">
                <div class="section-title" style="margin-bottom: 0.5rem;">Recent Activity Snapshot</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>When</th>
                            <th>Event</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_activities->take(5) as $activity)
                            <tr>
                                <td>{{ $activity->created_at->format('M d, H:i') }}</td>
                                <td>{{ $activity->message }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="2" class="muted">No recent activity logged.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="footer">
                Morocco 2030 Platform · Confidential — {{ now()->year }} · Generated {{ now()->format('Y-m-d H:i:s') }}
            </div>
        </div>
    </div>

    <!-- Screen View (Dashboard) -->
    <div class="screen-only">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-8">
            @foreach($stats as $key => $value)
            <div class="glass-card rounded-2xl p-6 hover:shadow-lg transition-shadow duration-300">
                <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">{{ ucfirst($key) }}</p>
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white counter-number" data-target="{{ $value }}">0</h3>
            </div>
            @endforeach
        </div>

        <!-- Charts / Visuals -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Content Distribution Pie Chart -->
            <div class="glass-card rounded-2xl p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Content Distribution</h3>
                <div class="flex items-center justify-center" style="height: 280px;">
                    <canvas id="contentPieChart"></canvas>
                </div>
            </div>

            <!-- Engagement Bar Chart -->
            <div class="glass-card rounded-2xl p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Community Engagement</h3>
                <div style="height: 280px;">
                    <canvas id="engagementBarChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Full Width Line Chart -->
        <div class="glass-card rounded-2xl p-6 mb-8">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Platform Activity Overview</h3>
            <div style="height: 300px;">
                <canvas id="activityLineChart"></canvas>
            </div>
        </div>

        <!-- Recent Activity Feed (Limited to 5) -->
        <div class="glass-card rounded-2xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Recent Activity</h3>
                <span class="text-xs text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-800 px-3 py-1 rounded-full">Last 5 activities</span>
            </div>
            <div class="space-y-4">
                @forelse($recent_activities->take(5) as $activity)
                    <div class="flex items-start space-x-4 pb-4 border-b border-gray-100 dark:border-gray-800 last:border-0 last:pb-0 group">
                        <div class="h-10 w-10 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center shrink-0 group-hover:bg-primary-100 dark:group-hover:bg-primary-900/30 transition-colors">
                            @if($activity->type == 'City')
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                            @elseif($activity->type == 'Destination')
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /></svg>
                            @elseif($activity->type == 'Contact')
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            @else
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $activity->message }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $activity->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 dark:text-gray-400 py-8">No recent activity.</p>
                @endforelse
            </div>
        </div>
    </div>

    <style>
        /* Modern Animations */
        @keyframes slide-in {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fade-in-delay {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        @keyframes bounce-subtle {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }
        
        @keyframes floating-orb {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            33% {
                transform: translate(10px, -10px) rotate(120deg);
            }
            66% {
                transform: translate(-5px, 5px) rotate(240deg);
            }
        }
        
        @keyframes morph {
            0%, 100% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }
            50% {
                border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
            }
        }
        
        @keyframes glow-pulse {
            0%, 100% {
                box-shadow: 0 0 20px rgba(153, 27, 27, 0.3);
            }
            50% {
                box-shadow: 0 0 40px rgba(153, 27, 27, 0.6);
            }
        }
        
        @keyframes stat-card-enter {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .animate-slide-in {
            animation: slide-in 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        
        .animate-fade-in-delay {
            animation: fade-in-delay 0.8s ease-out 0.3s forwards;
            opacity: 0;
        }
        
        .animate-bounce-subtle {
            animation: bounce-subtle 2s ease-in-out infinite;
        }
        
        .floating-orb {
            animation: floating-orb 8s ease-in-out infinite;
        }
        
        .stat-card {
            animation: stat-card-enter 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        
        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .stat-card:hover .floating-orb {
            animation: morph 4s ease-in-out infinite, floating-orb 8s ease-in-out infinite;
        }
        
        .progress-bar {
            transition: width 1.5s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        /* Glassmorphism enhanced */
        .glass-card {
            backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.75);
            border: 1px solid rgba(209, 213, 219, 0.3);
        }
        
        .dark .glass-card {
            background-color: rgba(17, 24, 39, 0.7);
            border: 1px solid rgba(55, 65, 81, 0.3);
        }
        
        /* Chart visibility improvements for dark mode */
        canvas {
            max-width: 100%;
            height: auto;
        }
        
        .dark canvas {
            filter: brightness(1.1) contrast(1.05);
        }
        
        /* Ensure chart containers are visible */
        #contentPieChart,
        #engagementBarChart,
        #activityLineChart {
            position: relative;
        }
        
        .dark #contentPieChart,
        .dark #engagementBarChart,
        .dark #activityLineChart {
            background: transparent;
        }
        
        @media print {
            .no-print, .screen-only { display: none !important; }
            .print-only { display: block !important; }
            body { background: white; color: black; }
        }
        @media screen {
            .print-only { display: none; }
            .screen-only { display: block; }
        }
    </style>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animated Counter for Stats Numbers
            const counters = document.querySelectorAll('.counter-number');
            
            const animateCounter = (element, target, duration = 2000) => {
                const start = 0;
                const startTime = performance.now();
                
                const updateCounter = (currentTime) => {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    
                    // Easing function for smooth animation
                    const easeOutQuart = 1 - Math.pow(1 - progress, 4);
                    const current = Math.floor(start + (target - start) * easeOutQuart);
                    
                    element.textContent = current.toLocaleString();
                    
                    if (progress < 1) {
                        requestAnimationFrame(updateCounter);
                    } else {
                        element.textContent = target.toLocaleString();
                    }
                };
                
                requestAnimationFrame(updateCounter);
            };
            
            // Animate each counter with a slight delay for staggered effect
            counters.forEach((counter, index) => {
                const target = parseInt(counter.getAttribute('data-target')) || 0;
                setTimeout(() => {
                    animateCounter(counter, target, 2000);
                }, index * 150);
            });
            
            const isDark = localStorage.getItem('darkMode') === 'true';
            const textColor = isDark ? '#f3f4f6' : '#374151';
            const gridColor = isDark ? 'rgba(75, 85, 99, 0.3)' : '#e5e7eb';
            const axisColor = isDark ? '#9ca3af' : '#6b7280';
            
            // Morocco Colors - adjusted for dark mode visibility
            const moroccoRed = '#991b1b';
            const moroccoRedLight = isDark ? '#dc2626' : '#991b1b';
            const moroccoGrey = '#6b7280';
            const moroccoGreyLight = isDark ? '#9ca3af' : '#6b7280';
            const moroccoWhite = '#ffffff';
            const accentBlue = isDark ? '#60a5fa' : '#3b82f6';
            const accentGreen = isDark ? '#34d399' : '#10b981';
            const accentYellow = '#f59e0b';
            
            // Chart fill colors with better opacity for dark mode
            const fillOpacity = isDark ? '40' : '20';
            
            // Content Distribution Pie Chart
            const pieCtx = document.getElementById('contentPieChart');
            if (pieCtx) {
                new Chart(pieCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Cities', 'Destinations'],
                        datasets: [{
                            data: [{{ $stats['cities'] }}, {{ $stats['destinations'] }}],
                            backgroundColor: [moroccoRedLight, moroccoGreyLight],
                            borderColor: isDark ? '#1f2937' : moroccoWhite,
                            borderWidth: 3,
                            hoverOffset: 10
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    color: textColor,
                                    font: { size: 13, weight: '600' },
                                    padding: 15,
                                    usePointStyle: true,
                                    pointStyle: 'circle'
                                }
                            },
                            tooltip: {
                                backgroundColor: isDark ? '#1f2937' : '#ffffff',
                                titleColor: textColor,
                                bodyColor: textColor,
                                borderColor: gridColor,
                                borderWidth: 1,
                                padding: 12,
                                displayColors: true,
                                callbacks: {
                                    label: function(context) {
                                        const total = {{ $stats['cities'] + $stats['destinations'] }};
                                        const percentage = ((context.parsed / total) * 100).toFixed(1);
                                        return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                                    }
                                }
                            }
                        }
                    }
                });
            }
            
            // Community Engagement Bar Chart
            const barCtx = document.getElementById('engagementBarChart');
            if (barCtx) {
                new Chart(barCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Volunteers', 'Contacts', 'Comments', 'Subscribers'],
                        datasets: [{
                            label: 'Total Count',
                            data: [
                                {{ $stats['volontaires'] }},
                                {{ $stats['contacts'] }},
                                {{ $stats['commentaires'] }},
                                {{ $stats['newsletters'] }}
                            ],
                            backgroundColor: [moroccoRedLight, moroccoGreyLight, accentBlue, accentGreen],
                            borderColor: [moroccoRedLight, moroccoGreyLight, accentBlue, accentGreen],
                            borderWidth: 2,
                            borderRadius: 8,
                            borderSkipped: false
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: isDark ? '#111827' : '#ffffff',
                                titleColor: textColor,
                                bodyColor: textColor,
                                borderColor: isDark ? '#374151' : '#e5e7eb',
                                borderWidth: 1,
                                padding: 12,
                                titleFont: { size: 13, weight: '600' },
                                bodyFont: { size: 12 }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: axisColor,
                                    font: { size: 11 }
                                },
                                grid: {
                                    color: gridColor,
                                    drawBorder: false,
                                    lineWidth: 1
                                },
                                border: {
                                    color: axisColor,
                                    width: 1
                                }
                            },
                            x: {
                                ticks: {
                                    color: axisColor,
                                    font: { size: 11, weight: '600' }
                                },
                                grid: { display: false },
                                border: {
                                    color: axisColor,
                                    width: 1
                                }
                            }
                        }
                    }
                });
            }
            
            // Platform Activity Line Chart
            const lineCtx = document.getElementById('activityLineChart');
            if (lineCtx) {
                const activityLabels = @json($activityData['labels'] ?? []);
                const contentData = @json($activityData['content'] ?? []);
                const engagementData = @json($activityData['engagement'] ?? []);
                
                new Chart(lineCtx, {
                    type: 'line',
                    data: {
                        labels: activityLabels,
                        datasets: [
                            {
                                label: 'Content Items',
                                data: contentData,
                                borderColor: moroccoRedLight,
                                backgroundColor: moroccoRedLight + fillOpacity,
                                borderWidth: 3,
                                fill: true,
                                tension: 0.4,
                                pointBackgroundColor: moroccoRedLight,
                                pointBorderColor: isDark ? '#111827' : moroccoWhite,
                                pointBorderWidth: 2,
                                pointRadius: 5,
                                pointHoverRadius: 7,
                                pointHoverBackgroundColor: moroccoRedLight,
                                pointHoverBorderColor: isDark ? '#f3f4f6' : moroccoWhite
                            },
                            {
                                label: 'Community Engagement',
                                data: engagementData,
                                borderColor: moroccoGreyLight,
                                backgroundColor: moroccoGreyLight + fillOpacity,
                                borderWidth: 3,
                                fill: true,
                                tension: 0.4,
                                pointBackgroundColor: moroccoGreyLight,
                                pointBorderColor: isDark ? '#111827' : moroccoWhite,
                                pointBorderWidth: 2,
                                pointRadius: 5,
                                pointHoverRadius: 7,
                                pointHoverBackgroundColor: moroccoGreyLight,
                                pointHoverBorderColor: isDark ? '#f3f4f6' : moroccoWhite
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: 'index',
                            intersect: false
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    color: textColor,
                                    font: { size: 13, weight: '600' },
                                    padding: 15,
                                    usePointStyle: true,
                                    pointStyle: 'circle'
                                }
                            },
                            tooltip: {
                                backgroundColor: isDark ? '#111827' : '#ffffff',
                                titleColor: textColor,
                                bodyColor: textColor,
                                borderColor: isDark ? '#374151' : '#e5e7eb',
                                borderWidth: 1,
                                padding: 12,
                                titleFont: { size: 13, weight: '600' },
                                bodyFont: { size: 12 }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: axisColor,
                                    font: { size: 11 }
                                },
                                grid: {
                                    color: gridColor,
                                    drawBorder: false,
                                    lineWidth: 1
                                },
                                border: {
                                    color: axisColor,
                                    width: 1
                                }
                            },
                            x: {
                                ticks: {
                                    color: axisColor,
                                    font: { size: 11, weight: '600' }
                                },
                                grid: {
                                    color: gridColor,
                                    drawBorder: false
                                },
                                border: {
                                    color: axisColor,
                                    width: 1
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
@endsection
