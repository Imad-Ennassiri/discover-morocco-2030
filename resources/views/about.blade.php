@extends('layouts.app')

@section('content')
    <style>
        .zellige-pattern {
            background-color: #f7f5f2;
            background-image: 
                radial-gradient(#006233 15%, transparent 16%),
                radial-gradient(#C8102E 15%, transparent 16%);
            background-size: 60px 60px;
            background-position: 0 0, 30px 30px;
            opacity: 0.05;
        }
        .animate-slide-up { animation: slideUp 0.8s ease-out forwards; opacity: 0; transform: translateY(20px); }
        .animate-fade-in { animation: fadeIn 0.8s ease-out forwards; opacity: 0; }
        
        @keyframes slideUp { to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeIn { to { opacity: 1; } }
    </style>

    <!-- HERO SECTION -->
    <section class="relative pt-40 pb-20 px-6 overflow-hidden min-h-[50vh] flex items-center bg-stone-900">
        <div class="absolute inset-0 opacity-40">
            <img src="{{ asset('assets/images/morocco_hero_real.png') }}" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-stone-900 via-stone-900/60 to-transparent"></div>
        
        <div class="container mx-auto max-w-7xl relative z-10 text-center">
            <span class="text-[#006233] font-bold uppercase tracking-[0.2em] text-xs mb-4 block animate-fade-in bg-white/10 w-fit mx-auto px-4 py-1 rounded-full backdrop-blur-sm border border-white/10">The Untold Story</span>
            <h1 class="text-6xl md:text-8xl font-playfair font-black mb-6 text-white leading-tight animate-slide-up" style="animation-delay: 0.1s;">
                Discover the <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#C8102E] to-[#e61e40]">True Morocco</span>
            </h1>
            <p class="text-xl text-stone-300 max-w-2xl mx-auto font-light animate-slide-up" style="animation-delay: 0.3s;">
                More than a destination. A journey through time, colors, and soul.
            </p>
        </div>
    </section>

    <!-- SECTION 1: THE VISION (Creator's Story) -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-[#f7f5f2] z-0"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-[#C8102E]/5 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="flex flex-col lg:flex-row gap-16">
                <!-- Left: Text & Story -->
                <div class="lg:w-1/2">
                    <span class="text-[#C8102E] font-bold uppercase tracking-widest text-sm mb-2 block">Our Mission</span>
                    <h2 class="text-5xl font-playfair font-black mb-8 leading-tight">Simplifying the <span class="text-[#006233] relative inline-block">Complex<svg class="absolute w-full h-3 -bottom-1 left-0 text-[#C8102E]/20" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="3" fill="none"/></svg></span></h2>
                    
                    <div class="prose prose-lg text-stone-600 mb-8">
                        <p>
                            Morocco is a sensory overload in the best way possible. But for a first-time visitor, the "Red City" or the "Blue Pearl" can feel like a labyrinth.
                        </p>
                        <p>
                            We realized that while the beauty of the Kingdom is vast, finding clear, updated, and trusted information was a challenge. <strong>Discover Morocco 2030</strong> was born from a simple yet ambitious mission: to be the bridge between your curiosity and the Kingdom's reality.
                        </p>
                    </div>

                    <!-- Creator's Note -->
                    <div class="bg-stone-50 p-8 rounded-2xl border border-stone-100 relative">
                        <i class="fas fa-quote-left text-4xl text-[#006233]/10 absolute top-4 left-4"></i>
                        <p class="italic text-stone-700 font-medium relative z-10 mb-4">
                            "We are not just a travel guide. We are a team of locals, historians, and dreamers who want to show you the Morocco that isn't just in the brochures. The Morocco that smells of mint tea at 4 PM and sounds like the Atlas winds."
                        </p>
                        <div class="flex items-center gap-4 mt-6">
                            <div class="w-12 h-12 bg-stone-200 rounded-full overflow-hidden">
                                <img src="https://ui-avatars.com/api/?name=Morocco+Creator&background=C8102E&color=fff" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-stone-900 text-sm">Amine & The Team</h4>
                                <span class="text-xs text-stone-500 uppercase tracking-wider">Creators of DM2030</span>
                            </div>
                            <img src="{{ asset('assets/images/signature.png') }}" class="h-8 opacity-50 ml-auto" onerror="this.style.display='none'"> 
                        </div>
                    </div>
                </div>

                <!-- Right: Timeline of Discovery -->
                <div class="lg:w-1/2 relative">
                    <h3 class="text-2xl font-bold mb-8 font-playfair">The Timeline of Discovery</h3>
                    <div class="border-l-2 border-stone-200 ml-4 space-y-12">
                        <!-- Item 1 -->
                        <div class="relative pl-12 group">
                            <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-white border-4 border-[#006233] group-hover:scale-125 transition-transform"></div>
                            <span class="text-xs font-bold text-[#006233] uppercase tracking-widest mb-1 block">The Beginning</span>
                            <h4 class="text-xl font-bold text-stone-900 mb-2">Curating the Chaos</h4>
                            <p class="text-sm text-stone-500">We started by mapping out the most confusing aspects of travel: Transport, Visa, and Etiquette. We turned legal texts into simple guides.</p>
                        </div>
                        <!-- Item 2 -->
                        <div class="relative pl-12 group">
                            <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-white border-4 border-[#C8102E] group-hover:scale-125 transition-transform"></div>
                            <span class="text-xs font-bold text-[#C8102E] uppercase tracking-widest mb-1 block">The Expansion</span>
                            <h4 class="text-xl font-bold text-stone-900 mb-2">Visual Storytelling</h4>
                            <p class="text-sm text-stone-500">Words weren't enough. We launched our visual archive, capturing the colors of the souks and the silence of the Sahara.</p>
                        </div>
                        <!-- Item 3 -->
                        <div class="relative pl-12 group">
                            <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-white border-4 border-stone-900 group-hover:scale-125 transition-transform"></div>
                            <span class="text-xs font-bold text-stone-900 uppercase tracking-widest mb-1 block">The Future</span>
                            <h4 class="text-xl font-bold text-stone-900 mb-2">Vision 2030</h4>
                            <p class="text-sm text-stone-500">With the World Cup on the horizon, we are preparing the ultimate digital companion for millions of future visitors.</p>
                        </div>
                    </div>

                    <!-- Image Grid (Mini) -->
                    <div class="grid grid-cols-2 gap-4 mt-12">
                        <img src="{{ asset('assets/images/morocco_hype.png') }}" class="rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-500">
                        <img src="{{ asset('assets/images/morocco_stadium.png') }}" class="rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-500 mt-8">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 2: HISTORY & MONUMENTS -->
    <section class="py-24 bg-stone-900 text-white relative overflow-hidden">
        <!-- Zellige Overlay -->
        <div class="absolute inset-0 opacity-5" style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 100px;"></div>
        
        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="text-center mb-16">
                <span class="text-[#C8102E] font-bold uppercase tracking-widest text-sm">Timeless Heritage</span>
                <h2 class="text-5xl font-playfair font-black mt-2">Monuments of Glory</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="group relative h-[400px] rounded-3xl overflow-hidden cursor-pointer">
                    <img src="{{ asset('assets/images/casablanca_cityscape.png') }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
                    <div class="absolute bottom-0 left-0 p-8 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="text-[#d4af37] text-xs font-bold uppercase tracking-widest mb-2 block">Casablanca</span>
                        <h3 class="text-3xl font-playfair font-bold mb-2">Hassan II Mosque</h3>
                        <p class="text-sm text-stone-300 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            A masterpiece of modern Islamic architecture, sitting majestically on the Atlantic.
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="group relative h-[400px] rounded-3xl overflow-hidden cursor-pointer md:-translate-y-8">
                    <img src="{{ asset('assets/images/morocco_hero_real.png') }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
                    <div class="absolute bottom-0 left-0 p-8 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="text-[#d4af37] text-xs font-bold uppercase tracking-widest mb-2 block">Marrakech</span>
                        <h3 class="text-3xl font-playfair font-bold mb-2">Koutoubia</h3>
                        <p class="text-sm text-stone-300 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            The eternal symbol of the Red City, watching over the Jemaa el-Fnaa square for centuries.
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="group relative h-[400px] rounded-3xl overflow-hidden cursor-pointer">
                    <img src="{{ asset('assets/images/morocco_stadium.png') }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
                    <div class="absolute bottom-0 left-0 p-8 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="text-[#d4af37] text-xs font-bold uppercase tracking-widest mb-2 block">Rabat</span>
                        <h3 class="text-3xl font-playfair font-bold mb-2">Hassan Tower</h3>
                        <p class="text-sm text-stone-300 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            The ambitious minaret of an incomplete mosque, standing tall as a testament to history.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: IMMERSIVE QUOTE -->
    <section class="py-20 bg-[#006233] text-white text-center">
        <div class="container mx-auto px-6 max-w-4xl">
            <i class="fas fa-star text-4xl text-[#C8102E] mb-6 animate-pulse"></i>
            <h2 class="text-4xl md:text-6xl font-playfair font-black leading-tight">
                "Morocco is a tree whose roots lie in Africa but whose leaves breathe in Europe."
            </h2>
            <p class="mt-6 text-white/70 font-light italic">— King Hassan II</p>
        </div>
    </section>
@endsection
