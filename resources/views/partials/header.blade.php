<nav id="navbar" class="group/nav fixed w-full z-50 transition-all duration-500 ease-in-out py-6 px-6 md:px-12 top-0 flex justify-between items-center text-white bg-gradient-to-b from-black/80 to-transparent">
    <a href="/" class="flex items-center gap-1 group z-20 relative">
         <div class="text-3xl font-black tracking-widest uppercase font-outfit">
            Morocco<span class="text-[#C8102E]">.</span>
        </div>
    </a>
    <!-- Centered Navigation Links - Full Width Container to allow Mega Menu spanning -->
    <div class="hidden lg:flex absolute left-1/2 -translate-x-1/2 top-0 h-full items-center gap-8 text-sm font-bold uppercase tracking-wider text-white group-[.scrolled]/nav:text-stone-900 z-10">
        <a href="/" class="hover:text-[#C8102E] transition-colors duration-300 relative group/link {{ request()->is('/') ? 'text-[#C8102E]' : '' }} pointer-events-auto">
            Home
        </a>
        
        <!-- Discover Morocco with Mega Menu -->
        <div class="group h-full flex items-center pointer-events-auto">
            <a href="/discover" class="hover:text-[#C8102E] transition-colors duration-300 relative group/link {{ request()->is('discover') ? 'text-[#C8102E]' : '' }} py-6">
                Discover Morocco
            </a>
            
            <!-- MEGA MENU - ABU DHABI INSPIRED DESIGN (REFINED) -->
            <!-- WRAPPER: Position + Animation + Hover Bridge (Padding) -->
            <div class="mega-menu-dropdown absolute top-full transform origin-top transition-all duration-500 ease-out -translate-y-4 opacity-0 invisible cursor-default" 
                 style="z-index: 9999; padding-top: 0px; left: 50%; right: 50%; margin-left: -50vw; margin-right: -50vw; width: 100vw;">
                
                <!-- INNER CONTAINER: Visual Menu (White Box) -->
                <div class="w-full bg-white shadow-2xl relative" style="height: 600px;">
                    
                    <!-- Close Button REMOVED as requested -->

                    <!-- Moroccan Pattern Watermark - Subtle -->
                    <div class="absolute right-0 bottom-0 w-2/3 h-full opacity-[0.02] pointer-events-none mix-blend-multiply" 
                         style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 200px;">
                    </div>

                    <!-- Main Container for Alignment -->
                    <!-- Full width layout with padding instead of container -->
                    <div class="w-full h-full px-8 md:px-12">
                        <div class="flex h-full">
                            
                            <!-- LEFT SIDEBAR - CATEGORIES -->
                            <div class="w-72 md:w-80 h-full flex flex-col py-12 pr-8 border-r border-stone-100 bg-white relative z-10">
                                <!-- Header -->
                                <div class="mb-10 pl-4 border-l-4 border-[#C8102E]">
                                    <h3 class="text-xs font-bold font-outfit uppercase tracking-[0.2em] text-[#C8102E] mb-2">Discover</h3>
                                    <h2 class="text-3xl font-playfair font-bold text-stone-900 leading-none">Destinations</h2>
                                </div>

                                <!-- Menu Items -->
                                <div class="flex flex-col space-y-1 flex-1 overflow-y-auto">
                                    <a href="#" class="mega-category active group/item flex items-center justify-between py-4 px-5 rounded-r-full hover:bg-stone-50 transition-all duration-300 border-l-4 border-transparent hover:border-l-4 hover:border-stone-200 data-[active=true]:bg-stone-50 data-[active=true]:border-[#C8102E]" data-category="marrakech">
                                        <span class="text-lg font-bold text-stone-900 font-playfair group-hover/item:text-[#C8102E] transition-colors">Marrakech</span>
                                        <i class="fas fa-chevron-right text-xs text-[#C8102E] opacity-0 group-hover/item:opacity-100 group-[.active]/item:opacity-100 transition-opacity"></i>
                                    </a>

                                    <a href="#" class="mega-category group/item flex items-center justify-between py-4 px-5 rounded-r-full hover:bg-stone-50 transition-all duration-300 border-l-4 border-transparent hover:border-l-4 hover:border-[#4169E1]" data-category="chefchaouen">
                                        <span class="text-lg font-medium font-playfair text-stone-600 group-hover/item:text-[#4169E1] transition-colors">Chefchaouen</span>
                                        <i class="fas fa-chevron-right text-xs text-[#4169E1] opacity-0 group-hover/item:opacity-100 transition-opacity"></i>
                                    </a>

                                    <a href="#" class="mega-category group/item flex items-center justify-between py-4 px-5 rounded-r-full hover:bg-stone-50 transition-all duration-300 border-l-4 border-transparent hover:border-l-4 hover:border-[#d4af37]" data-category="sahara">
                                        <span class="text-lg font-medium font-playfair text-stone-600 group-hover/item:text-[#d4af37] transition-colors">Sahara Desert</span>
                                        <i class="fas fa-chevron-right text-xs text-[#d4af37] opacity-0 group-hover/item:opacity-100 transition-opacity"></i>
                                    </a>

                                    <a href="#" class="mega-category group/item flex items-center justify-between py-4 px-5 rounded-r-full hover:bg-stone-50 transition-all duration-300 border-l-4 border-transparent hover:border-l-4 hover:border-[#006233]" data-category="fez">
                                        <span class="text-lg font-medium font-playfair text-stone-600 group-hover/item:text-[#006233] transition-colors">Fez</span>
                                        <i class="fas fa-chevron-right text-xs text-[#006233] opacity-0 group-hover/item:opacity-100 transition-opacity"></i>
                                    </a>

                                    <a href="#" class="mega-category group/item flex items-center justify-between py-4 px-5 rounded-r-full hover:bg-stone-50 transition-all duration-300 border-l-4 border-transparent hover:border-l-4 hover:border-[#0891b2]" data-category="casablanca">
                                        <span class="text-lg font-medium font-playfair text-stone-600 group-hover/item:text-[#0891b2] transition-colors">Casablanca</span>
                                        <i class="fas fa-chevron-right text-xs text-[#0891b2] opacity-0 group-hover/item:opacity-100 transition-opacity"></i>
                                    </a>
                                </div>
                                
                                <!-- Bottom Link -->
                                <div class="mt-4 pt-4 border-t border-stone-100 pl-4">
                                    <a href="/discover" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-stone-400 hover:text-[#C8102E] transition-colors">
                                        View All Cities <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- RIGHT SIDE - CONTENT -->
                            <div class="flex-1 py-12 pl-12 md:pl-16 relative overflow-y-auto custom-scrollbar">
                                
                                <!-- CONTENT: MARRAKECH -->
                                <div class="mega-content active space-y-8 animate-fadeIn" data-content="marrakech">
                                    <!-- Title Block -->
                                    <div class="flex items-start justify-between border-b border-stone-100 pb-6">
                                        <div>
                                            <!-- Reduced text-6xl to text-5xl -->
                                            <h1 class="text-5xl font-playfair font-black text-stone-900 mb-2 tracking-tight">Marrakech</h1>
                                            <p class="text-xl text-[#C8102E] font-outfit font-light tracking-wide uppercase">The Red City</p>
                                        </div>
                                        <a href="#" class="group/link flex items-center gap-3 px-6 py-3 rounded-full border border-stone-200 hover:border-[#C8102E] hover:bg-[#C8102E] hover:text-white transition-all duration-300">
                                            <span class="text-xs font-bold uppercase tracking-widest">Explore City</span>
                                            <i class="fas fa-arrow-right text-xs transform -rotate-45 group-hover/link:rotate-0 transition-transform"></i>
                                        </a>
                                    </div>
                                    
                                    <!-- Top Experiences (Full Width Grid) -->
                                    <div class="w-full">
                                        <h4 class="text-sm font-bold uppercase tracking-widest text-[#d4af37] mb-6">Top Experiences</h4>
                                        <div class="grid grid-cols-3 gap-6">
                                            <a href="#" class="group/ex flex items-start gap-4 p-4 rounded-xl border border-stone-100 hover:border-stone-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 bg-white">
                                                <div class="w-16 h-16 rounded-lg bg-stone-200 overflow-hidden flex-shrink-0">
                                                    <img src="https://images.unsplash.com/photo-1549140462-811c75953051?ixlib=rb-4.0.3&w=100&q=80" class="w-full h-full object-cover">
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-stone-900 group-hover/ex:text-[#C8102E] transition-colors font-playfair text-lg">Jardin Majorelle</h5>
                                                    <p class="text-xs text-stone-500 mt-1">Botanical Garden</p>
                                                </div>
                                            </a>
                                            <a href="#" class="group/ex flex items-start gap-4 p-4 rounded-xl border border-stone-100 hover:border-stone-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 bg-white">
                                                <div class="w-16 h-16 rounded-lg bg-stone-200 overflow-hidden flex-shrink-0">
                                                    <img src="https://images.unsplash.com/photo-1558588942-930faae5a389?ixlib=rb-4.0.3&w=100&q=80" class="w-full h-full object-cover">
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-stone-900 group-hover/ex:text-[#C8102E] transition-colors font-playfair text-lg">Bahia Palace</h5>
                                                    <p class="text-xs text-stone-500 mt-1">19th Century Palace</p>
                                                </div>
                                            </a>
                                            <a href="#" class="group/ex flex items-start gap-4 p-4 rounded-xl border border-stone-100 hover:border-stone-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 bg-white">
                                                <div class="w-16 h-16 rounded-lg bg-stone-200 overflow-hidden flex-shrink-0">
                                                    <img src="https://plus.unsplash.com/premium_photo-1661962360662-6fce47a1c86d?ixlib=rb-4.0.3&w=100&q=80" class="w-full h-full object-cover">
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-stone-900 group-hover/ex:text-[#C8102E] transition-colors font-playfair text-lg">Koutoubia</h5>
                                                    <p class="text-xs text-stone-500 mt-1">Largest Mosque</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- CONTENT: CHEFCHAOUEN -->
                                <div class="mega-content hidden space-y-8 animate-fadeIn" data-content="chefchaouen">
                                    <div class="flex items-start justify-between border-b border-stone-100 pb-6">
                                        <div>
                                            <h1 class="text-5xl font-playfair font-black text-stone-900 mb-2 tracking-tight">Chefchaouen</h1>
                                            <p class="text-xl text-[#4169E1] font-outfit font-light tracking-wide uppercase">The Blue Pearl</p>
                                        </div>
                                        <a href="#" class="group/link flex items-center gap-3 px-6 py-3 rounded-full border border-stone-200 hover:border-[#4169E1] hover:bg-[#4169E1] hover:text-white transition-all duration-300">
                                            <span class="text-xs font-bold uppercase tracking-widest">Explore City</span>
                                            <i class="fas fa-arrow-right text-xs transform -rotate-45 group-hover/link:rotate-0 transition-transform"></i>
                                        </a>
                                    </div>
                                    <div class="w-full">
                                        <h4 class="text-sm font-bold uppercase tracking-widest text-[#4169E1] mb-6">Top Experiences</h4>
                                        <div class="grid grid-cols-3 gap-6">
                                            <a href="#" class="group/ex flex items-start gap-4 p-4 rounded-xl border border-stone-100 hover:border-stone-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 bg-white">
                                                <div class="w-16 h-16 rounded-lg bg-blue-100 flex items-center justify-center text-[#4169E1]">
                                                    <i class="fas fa-camera text-2xl"></i>
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-stone-900 group-hover/ex:text-[#4169E1] transition-colors font-playfair text-lg">Photography</h5>
                                                    <p class="text-xs text-stone-500 mt-1">Capture the colors</p>
                                                </div>
                                            </a>
                                            <a href="#" class="group/ex flex items-start gap-4 p-4 rounded-xl border border-stone-100 hover:border-stone-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 bg-white">
                                                <div class="w-16 h-16 rounded-lg bg-blue-100 flex items-center justify-center text-[#4169E1]">
                                                    <i class="fas fa-hiking text-2xl"></i>
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-stone-900 group-hover/ex:text-[#4169E1] transition-colors font-playfair text-lg">Rif Mountains</h5>
                                                    <p class="text-xs text-stone-500 mt-1">Hiking Adventures</p>
                                                </div>
                                            </a>
                                            <a href="#" class="group/ex flex items-start gap-4 p-4 rounded-xl border border-stone-100 hover:border-stone-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 bg-white">
                                                <div class="w-16 h-16 rounded-lg bg-blue-100 flex items-center justify-center text-[#4169E1]">
                                                    <i class="fas fa-shopping-bag text-2xl"></i>
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-stone-900 group-hover/ex:text-[#4169E1] transition-colors font-playfair text-lg">Medina</h5>
                                                    <p class="text-xs text-stone-500 mt-1">Local Crafts</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- CONTENT: SAHARA -->
                                <div class="mega-content hidden space-y-8 animate-fadeIn" data-content="sahara">
                                    <div class="flex items-start justify-between border-b border-stone-100 pb-6">
                                        <div>
                                            <h1 class="text-5xl font-playfair font-black text-stone-900 mb-2 tracking-tight">Sahara Desert</h1>
                                            <p class="text-xl text-[#d4af37] font-outfit font-light tracking-wide uppercase">Endless Horizons</p>
                                        </div>
                                        <a href="#" class="group/link flex items-center gap-3 px-6 py-3 rounded-full border border-stone-200 hover:border-[#d4af37] hover:bg-[#d4af37] hover:text-white transition-all duration-300">
                                            <span class="text-xs font-bold uppercase tracking-widest">Explore Desert</span>
                                            <i class="fas fa-arrow-right text-xs transform -rotate-45 group-hover/link:rotate-0 transition-transform"></i>
                                        </a>
                                    </div>
                                    <div class="w-full">
                                        <h4 class="text-sm font-bold uppercase tracking-widest text-[#d4af37] mb-6">Top Experiences</h4>
                                        <div class="grid grid-cols-3 gap-6">
                                            <a href="#" class="group/ex flex items-start gap-4 p-4 rounded-xl border border-stone-100 hover:border-stone-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 bg-white">
                                                <div class="w-16 h-16 rounded-lg bg-orange-100 flex items-center justify-center text-[#d4af37]">
                                                    <i class="fas fa-paw text-2xl"></i>
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-stone-900 group-hover/ex:text-[#d4af37] transition-colors font-playfair text-lg">Camel Trekking</h5>
                                                    <p class="text-xs text-stone-500 mt-1">Desert caravans</p>
                                                </div>
                                            </a>
                                            <a href="#" class="group/ex flex items-start gap-4 p-4 rounded-xl border border-stone-100 hover:border-stone-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 bg-white">
                                                <div class="w-16 h-16 rounded-lg bg-orange-100 flex items-center justify-center text-[#d4af37]">
                                                    <i class="fas fa-campground text-2xl"></i>
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-stone-900 group-hover/ex:text-[#d4af37] transition-colors font-playfair text-lg">Luxury Camping</h5>
                                                    <p class="text-xs text-stone-500 mt-1">Night under stars</p>
                                                </div>
                                            </a>
                                            <a href="#" class="group/ex flex items-start gap-4 p-4 rounded-xl border border-stone-100 hover:border-stone-200 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 bg-white">
                                                <div class="w-16 h-16 rounded-lg bg-orange-100 flex items-center justify-center text-[#d4af37]">
                                                    <i class="fas fa-motorcycle text-2xl"></i>
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-stone-900 group-hover/ex:text-[#d4af37] transition-colors font-playfair text-lg">4x4 Tours</h5>
                                                    <p class="text-xs text-stone-500 mt-1">Dune Bashing</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- CONTENT: FEZ -->
                                <div class="mega-content hidden space-y-8 animate-fadeIn" data-content="fez">
                                    <div class="flex items-start justify-between border-b border-stone-100 pb-6">
                                        <div>
                                            <h1 class="text-5xl font-playfair font-black text-stone-900 mb-2 tracking-tight">Fez</h1>
                                            <p class="text-xl text-[#006233] font-outfit font-light tracking-wide uppercase">Spiritual Capital</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- CONTENT: CASABLANCA -->
                                <div class="mega-content hidden space-y-8 animate-fadeIn" data-content="casablanca">
                                    <div class="flex items-start justify-between border-b border-stone-100 pb-6">
                                        <div>
                                            <h1 class="text-5xl font-playfair font-black text-stone-900 mb-2 tracking-tight">Casablanca</h1>
                                            <p class="text-xl text-[#0891b2] font-outfit font-light tracking-wide uppercase">Modern Hub</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <a href="/about" class="hover:text-[#C8102E] transition-colors duration-300 relative group/link {{ request()->is('about') ? 'text-[#C8102E]' : '' }} pointer-events-auto">
            About Us
        </a>
        <a href="/contact" class="hover:text-[#C8102E] transition-colors duration-300 relative group/link {{ request()->is('contact') ? 'text-[#C8102E]' : '' }} pointer-events-auto">
            Contact Us
        </a>
    </div>
    <div class="hidden lg:flex items-center gap-4 z-20 relative">
        <button class="px-3 py-2 border border-white/30 group-[.scrolled]/nav:border-stone-200 group-[.scrolled]/nav:text-stone-900 rounded-full text-xs font-bold hover:bg-white hover:text-black transition-all duration-300"><i class="fas fa-globe"></i> EN</button>
        
<button onclick="openCommentsModal()" class="px-6 py-2 border border-white group-[.scrolled]/nav:border-stone-900 group-[.scrolled]/nav:text-stone-900 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-white hover:text-black transition-all duration-300">Write Comments</button>

        <a href="/volunteer" class="px-6 py-2 bg-[#C8102E] border border-[#C8102E] rounded-full text-xs font-bold uppercase tracking-widest hover:bg-white hover:text-[#C8102E] transition-all duration-300 shadow-lg">Want Volunteer</a>
    </div>
    
    <!-- Mobile Menu Button - Only visible on mobile -->
    <button id="mobile-menu-btn" class="lg:hidden text-2xl z-[10000] relative transition-all duration-300 text-white group-[.scrolled]/nav:text-stone-900 w-8 h-8 flex items-center justify-center">
        <i class="fas fa-bars absolute" id="burger-icon"></i>
        <i class="fas fa-times absolute hidden" id="close-icon"></i>
    </button>
    
    <!-- Mobile Menu - Full width slide from left with Moroccan Design -->
    <div id="mobile-menu" class="fixed top-0 left-0 h-screen w-full bg-stone-50 text-stone-900 flex flex-col py-8 px-6 shadow-2xl transform -translate-x-full transition-transform duration-500 ease-in-out z-[10000] hidden lg:hidden overflow-y-auto">
        <!-- Left Zellige Border -->
        <div class="absolute left-0 top-0 bottom-0 w-2 bg-gradient-to-b from-[#006233] via-[#C8102E] to-[#006233] opacity-80"></div>
        
        <!-- Right Zellige Border -->
        <div class="absolute right-0 top-0 bottom-0 w-2 bg-gradient-to-b from-[#C8102E] via-[#006233] to-[#C8102E] opacity-80"></div>
        
        <!-- Zellige Pattern Overlay on borders -->
        <div class="absolute left-0 top-0 bottom-0 w-12 opacity-5 pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23000000\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/svg%3E');"></div>
        <div class="absolute right-0 top-0 bottom-0 w-12 opacity-5 pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23000000\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <!-- Close Button - Prominent X in top right -->
        <button onclick="toggleMobileMenu()" class="absolute top-6 right-6 w-12 h-12 rounded-full bg-[#C8102E] hover:bg-[#006233] text-white flex items-center justify-center transition-all duration-300 z-50 group shadow-lg">
            <i class="fas fa-times text-xl group-hover:rotate-90 transition-transform duration-300"></i>
        </button>
        
        <!-- Decorative Header with Moroccan Touch -->
        <div class="mb-8 pb-6 border-b-2 border-stone-200 relative">
            <div class="flex items-center gap-3">
                <div class="w-1 h-16 bg-gradient-to-b from-[#C8102E] to-[#006233] rounded-full"></div>
                <div>
                    <h3 class="text-3xl font-playfair font-bold text-stone-900">Menu</h3>
                    <p class="text-stone-500 text-sm mt-1">Discover Morocco</p>
                </div>
            </div>
            <!-- Decorative accent -->
            <div class="absolute -bottom-3 left-0 w-20 h-1 bg-gradient-to-r from-[#C8102E] via-[#006233] to-transparent rounded-full"></div>
        </div>
        
        <!-- Menu Items with Moroccan Style -->
        <div class="space-y-2">
            <a href="/" class="group flex items-center gap-4 hover:bg-stone-100 transition-all duration-300 text-base font-bold uppercase tracking-wider py-4 px-4 rounded-xl {{ request()->is('/') ? 'bg-[#C8102E]/10 border-l-4 border-[#C8102E]' : 'border-l-4 border-transparent' }}">
                <div class="w-11 h-11 rounded-lg bg-stone-200 flex items-center justify-center group-hover:bg-[#C8102E] transition-all duration-300">
                    <i class="fas fa-home text-stone-700 group-hover:text-white transition-colors"></i>
                </div>
                <span class="{{ request()->is('/') ? 'text-[#C8102E]' : 'text-stone-700' }} group-hover:text-[#C8102E]">Home</span>
            </a>
            
            <a href="/discover" class="group flex items-center gap-4 hover:bg-stone-100 transition-all duration-300 text-base font-bold uppercase tracking-wider py-4 px-4 rounded-xl {{ request()->is('discover') ? 'bg-[#C8102E]/10 border-l-4 border-[#C8102E]' : 'border-l-4 border-transparent' }}">
                <div class="w-11 h-11 rounded-lg bg-stone-200 flex items-center justify-center group-hover:bg-[#006233] transition-all duration-300">
                    <i class="fas fa-compass text-stone-700 group-hover:text-white transition-colors"></i>
                </div>
                <span class="{{ request()->is('discover') ? 'text-[#C8102E]' : 'text-stone-700' }} group-hover:text-[#006233]">Discover Morocco</span>
            </a>
            
            <a href="/about" class="group flex items-center gap-4 hover:bg-stone-100 transition-all duration-300 text-base font-bold uppercase tracking-wider py-4 px-4 rounded-xl {{ request()->is('about') ? 'bg-[#C8102E]/10 border-l-4 border-[#C8102E]' : 'border-l-4 border-transparent' }}">
                <div class="w-11 h-11 rounded-lg bg-stone-200 flex items-center justify-center group-hover:bg-[#C8102E] transition-all duration-300">
                    <i class="fas fa-info-circle text-stone-700 group-hover:text-white transition-colors"></i>
                </div>
                <span class="{{ request()->is('about') ? 'text-[#C8102E]' : 'text-stone-700' }} group-hover:text-[#C8102E]">About Us</span>
            </a>
            
            <a href="/contact" class="group flex items-center gap-4 hover:bg-stone-100 transition-all duration-300 text-base font-bold uppercase tracking-wider py-4 px-4 rounded-xl {{ request()->is('contact') ? 'bg-[#C8102E]/10 border-l-4 border-[#C8102E]' : 'border-l-4 border-transparent' }}">
                <div class="w-11 h-11 rounded-lg bg-stone-200 flex items-center justify-center group-hover:bg-[#006233] transition-all duration-300">
                    <i class="fas fa-envelope text-stone-700 group-hover:text-white transition-colors"></i>
                </div>
                <span class="{{ request()->is('contact') ? 'text-[#C8102E]' : 'text-stone-700' }} group-hover:text-[#006233]">Contact Us</span>
            </a>
        </div>
        
        <!-- Decorative Divider with Moroccan Pattern -->
        <div class="my-6 flex items-center gap-3">
            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-stone-300 to-transparent"></div>
            <div class="flex gap-1">
                <div class="w-2 h-2 bg-[#C8102E] rotate-45"></div>
                <div class="w-2 h-2 bg-[#006233] rotate-45"></div>
            </div>
            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-stone-300 to-transparent"></div>
        </div>
        
        <!-- Action Buttons with Moroccan Style -->
        <div class="space-y-3 mt-auto">
            <button onclick="openCommentsModal(); toggleMobileMenu();" class="w-full px-6 py-4 border-2 border-stone-300 rounded-xl font-bold uppercase tracking-widest text-sm hover:bg-[#006233] hover:text-white hover:border-[#006233] transition-all duration-300 text-stone-700 bg-white flex items-center justify-center gap-2 group shadow-sm">
                <i class="fas fa-comment-dots group-hover:scale-110 transition-transform"></i>
                Write Comments
            </button>
            
            <a href="/volunteer" class="w-full px-6 py-4 bg-[#C8102E] border-2 border-[#C8102E] rounded-xl font-bold uppercase tracking-widest text-sm text-center text-white hover:bg-white hover:text-[#C8102E] transition-all duration-300 shadow-lg flex items-center justify-center gap-2 group">
                <i class="fas fa-hands-helping group-hover:scale-110 transition-transform"></i>
                Want Volunteer
            </a>
        </div>
        
        <!-- Decorative Footer Pattern -->
        <div class="mt-6 pt-6 border-t-2 border-stone-200">
            <div class="flex items-center justify-center gap-2 text-stone-400 text-xs">
                <div class="w-8 h-px bg-stone-300"></div>
                <i class="fas fa-star text-[#C8102E]"></i>
                <div class="w-8 h-px bg-stone-300"></div>
            </div>
        </div>
    </div>
    
    <!-- Overlay for mobile menu - Hidden by default -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-500 z-[9998] hidden lg:hidden" onclick="toggleMobileMenu()"></div>
</nav>
