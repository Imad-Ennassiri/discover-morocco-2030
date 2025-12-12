@extends('layouts.app')

@section('content')
    <!-- WRAPPER -->
    <div class="relative w-full bg-[#FDFBF7] pb-24 font-outfit overflow-hidden">
        
        <!-- BUBBLE BACKGROUND ANIMATION -->
        <div class="absolute inset-0 w-full h-full pointer-events-none z-0 overflow-hidden">
            <div class="bubble w-96 h-96 bg-[#C8102E]/5 rounded-full blur-3xl absolute -top-20 -left-20 animate-float-slow"></div>
            <div class="bubble w-80 h-80 bg-[#d4af37]/5 rounded-full blur-3xl absolute top-1/3 right-0 animate-float-delay"></div>
            <div class="bubble w-64 h-64 bg-[#006233]/5 rounded-full blur-3xl absolute bottom-0 left-1/4 animate-float-reverse"></div>
            <div class="bubble w-40 h-40 bg-stone-200/50 rounded-full blur-2xl absolute top-1/2 left-1/2 animate-pulse-slow"></div>
        </div>

        <!-- SIDE QUOTES (FILLING EMPTY SPACE) -->
        <div class="absolute top-[110vh] left-0 h-[150vh] w-48 hidden 2xl:flex flex-col justify-around items-center z-10 opacity-30 select-none pointer-events-none text-center px-4">
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform -rotate-90 whitespace-nowrap">"Service is Joy"</h3>
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform -rotate-90 whitespace-nowrap">"Be The Change"</h3>
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform -rotate-90 whitespace-nowrap">"Impact & Serve"</h3>
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform -rotate-90 whitespace-nowrap">"Love Morocco"</h3>
        </div>
        <div class="absolute top-[110vh] right-0 h-[150vh] w-48 hidden 2xl:flex flex-col justify-around items-center z-10 opacity-30 select-none pointer-events-none text-center px-4">
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform rotate-90 whitespace-nowrap">"Heart of Gold"</h3>
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform rotate-90 whitespace-nowrap">"Build The Future"</h3>
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform rotate-90 whitespace-nowrap">"Unity in Action"</h3>
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform rotate-90 whitespace-nowrap">"Travel & Help"</h3>
        </div>

        <!-- 1. HERO SECTION (Scroll Shrink Effect) -->
        <div id="hero-container" class="relative w-full h-[110vh] overflow-hidden bg-stone-900 mx-auto z-10">
             <!-- Background Image -->
            <img src="{{ asset('assets/images/morocco_hero_real.png') }}" class="absolute inset-0 w-full h-full object-cover opacity-80 scale-105 animate-slow-zoom">
            <!-- Stronger Gradient for Header Transition -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-transparent to-black/60"></div>
            
            <!-- Hero Content -->
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4 z-10 pt-20">
                <div class="inline-flex items-center gap-3 mb-6 opacity-0 translate-y-4 animate-fade-up delay-300">
                    <span class="h-px w-12 bg-white/50"></span>
                    <span class="text-[#d4af37] font-bold uppercase tracking-[0.3em] text-xs">National Program 2030</span>
                    <span class="h-px w-12 bg-white/50"></span>
                </div>
                
                <h1 class="text-6xl md:text-8xl lg:text-9xl font-playfair font-black mb-6 leading-none tracking-tighter drop-shadow-2xl opacity-0 translate-y-4 animate-fade-up delay-500">
                    Be The <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#C8102E] to-[#e61e40] italic pr-2">Pulse</span>
                </h1>
                
                <p class="text-lg md:text-2xl font-light text-stone-200 max-w-2xl mx-auto leading-relaxed drop-shadow-lg opacity-0 translate-y-4 animate-fade-up delay-700">
                    Join the movement reshaping Morocco. Your skills, our heritage, one shared future.
                </p>

                <!-- Scroll Indicator -->
                <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-white animate-bounce z-20 opacity-0 animate-fade-in delay-1000">
                    <i class="fas fa-arrow-down text-2xl opacity-70"></i>
                </div>
            </div>
        </div>

        <!-- 2. MAIN CONTENT (Overlapping Card) -->
        <div class="container mx-auto px-4 md:px-8 -mt-24 relative z-20 max-w-6xl">
            <!-- TRANSPARENCY ADDED: bg-white/90 backdrop-blur-xl -->
            <div class="bg-white/90 backdrop-blur-xl rounded-[3rem] shadow-2xl border border-white/50 overflow-hidden relative">
                
                <div class="flex flex-col lg:flex-row">
                    
                    <!-- LEFT: FORM SECTION -->
                    <div class="w-full lg:w-2/3 p-8 md:p-16 relative">
                        <div class="mb-12 text-center md:text-left">
                            <span class="text-[#C8102E] font-bold uppercase tracking-widest text-sm mb-4 block">Join Us</span>
                            <h2 class="text-4xl md:text-5xl font-playfair font-black text-stone-900 mb-4">Volunteer Application</h2>
                            <p class="text-stone-500 text-lg">Please provide your details below to join our national database.</p>
                        </div>

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('volunteer.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10 relative z-10">
                            @csrf
                            
                            <!-- Section: Personal Identity -->
                            <div class="group/section">
                                <div class="flex items-center gap-4 mb-8">
                                    <div class="w-10 h-10 rounded-full bg-[#C8102E]/10 flex items-center justify-center text-[#C8102E] border border-[#C8102E]/20">
                                        <i class="fas fa-user text-lg"></i>
                                    </div>
                                    <h3 class="text-2xl font-playfair font-bold text-stone-900 border-b-2 border-[#C8102E]/20 pb-1 pr-12">
                                        Who are you?
                                    </h3>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <!-- Input: First Name -->
                                    <div class="mb-4">
                                        <label for="prenom" class="block text-sm font-bold text-stone-700 mb-2 ml-4 uppercase tracking-wide">First Name <span class="text-red-500">*</span></label>
                                        <div class="rounded-full bg-white/50 border border-stone-200 focus-within:border-[#C8102E] focus-within:ring-4 focus-within:ring-[#C8102E]/10 transition-all shadow-sm backdrop-blur-md">
                                            <input type="text" name="prenom" id="prenom" class="w-full bg-transparent border-none px-6 py-3 text-stone-900 placeholder-stone-400 focus:ring-0 font-medium" placeholder="Enter your first name" required />
                                        </div>
                                    </div>

                                    <!-- Input: Last Name -->
                                    <div class="mb-4">
                                        <label for="nom" class="block text-sm font-bold text-stone-700 mb-2 ml-4 uppercase tracking-wide">Last Name <span class="text-red-500">*</span></label>
                                        <div class="rounded-full bg-white/50 border border-stone-200 focus-within:border-[#C8102E] focus-within:ring-4 focus-within:ring-[#C8102E]/10 transition-all shadow-sm backdrop-blur-md">
                                            <input type="text" name="nom" id="nom" class="w-full bg-transparent border-none px-6 py-3 text-stone-900 placeholder-stone-400 focus:ring-0 font-medium" placeholder="Enter your last name" required />
                                        </div>
                                    </div>

                                    <!-- Input: Date of Birth -->
                                    <div class="mb-4">
                                        <label for="date_naissance" class="block text-sm font-bold text-stone-700 mb-2 ml-4 uppercase tracking-wide">Date of Birth <span class="text-red-500">*</span></label>
                                        <div class="rounded-full bg-white/50 border border-stone-200 focus-within:border-[#C8102E] focus-within:ring-4 focus-within:ring-[#C8102E]/10 transition-all shadow-sm backdrop-blur-md">
                                            <input type="date" name="date_naissance" id="date_naissance" class="w-full bg-transparent border-none px-6 py-3 text-stone-900 placeholder-stone-400 focus:ring-0 font-medium" required />
                                        </div>
                                    </div>

                                    <!-- Input: ID -->
                                    <div class="mb-4">
                                        <label for="identite" class="block text-sm font-bold text-stone-700 mb-2 ml-4 uppercase tracking-wide">CIN / Passport <span class="text-red-500">*</span></label>
                                        <div class="rounded-full bg-white/50 border border-stone-200 focus-within:border-[#C8102E] focus-within:ring-4 focus-within:ring-[#C8102E]/10 transition-all shadow-sm backdrop-blur-md">
                                            <input type="text" name="identite" id="identite" class="w-full bg-transparent border-none px-6 py-3 text-stone-900 placeholder-stone-400 focus:ring-0 font-medium" placeholder="Enter your ID number" required />
                                        </div>
                                        <p class="text-xs text-stone-500 ml-4 mt-1">National ID card or Passport number</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Section: Contact Info -->
                            <div class="group/section">
                                <div class="flex items-center gap-4 mb-8">
                                    <div class="w-10 h-10 rounded-full bg-[#006233]/10 flex items-center justify-center text-[#006233] border border-[#006233]/20">
                                        <i class="fas fa-map-marker-alt text-lg"></i>
                                    </div>
                                    <h3 class="text-2xl font-playfair font-bold text-stone-900 border-b-2 border-[#006233]/20 pb-1 pr-12">
                                        How to reach you?
                                    </h3>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <!-- Input: Email -->
                                    <div class="mb-4">
                                        <label for="email" class="block text-sm font-bold text-stone-700 mb-2 ml-4 uppercase tracking-wide">Email Address <span class="text-red-500">*</span></label>
                                        <div class="rounded-full bg-white/50 border border-stone-200 focus-within:border-[#006233] focus-within:ring-4 focus-within:ring-[#006233]/10 transition-all shadow-sm backdrop-blur-md">
                                            <input type="email" name="email" id="email" class="w-full bg-transparent border-none px-6 py-3 text-stone-900 placeholder-stone-400 focus:ring-0 font-medium" placeholder="name@example.com" required />
                                        </div>
                                    </div>

                                    <!-- Input: Phone -->
                                    <div class="mb-4">
                                        <label for="telephone" class="block text-sm font-bold text-stone-700 mb-2 ml-4 uppercase tracking-wide">Phone Number <span class="text-red-500">*</span></label>
                                        <div class="rounded-full bg-white/50 border border-stone-200 focus-within:border-[#006233] focus-within:ring-4 focus-within:ring-[#006233]/10 transition-all shadow-sm backdrop-blur-md">
                                            <input type="tel" name="telephone" id="telephone" class="w-full bg-transparent border-none px-6 py-3 text-stone-900 placeholder-stone-400 focus:ring-0 font-medium" placeholder="+212 600 000 000" required />
                                        </div>
                                    </div>

                                     <!-- Input: Country -->
                                    <div class="mb-4">
                                        <label for="pays" class="block text-sm font-bold text-stone-700 mb-2 ml-4 uppercase tracking-wide">Country <span class="text-red-500">*</span></label>
                                        <div class="rounded-full bg-white/50 border border-stone-200 focus-within:border-[#006233] focus-within:ring-4 focus-within:ring-[#006233]/10 transition-all shadow-sm backdrop-blur-md">
                                            <input type="text" name="pays" id="pays" class="w-full bg-transparent border-none px-6 py-3 text-stone-900 placeholder-stone-400 focus:ring-0 font-medium" placeholder="Select Country" required />
                                        </div>
                                    </div>

                                     <!-- Input: City -->
                                    <div class="mb-4">
                                        <label for="ville" class="block text-sm font-bold text-stone-700 mb-2 ml-4 uppercase tracking-wide">City <span class="text-red-500">*</span></label>
                                        <div class="rounded-full bg-white/50 border border-stone-200 focus-within:border-[#006233] focus-within:ring-4 focus-within:ring-[#006233]/10 transition-all shadow-sm backdrop-blur-md">
                                            <input type="text" name="ville" id="ville" class="w-full bg-transparent border-none px-6 py-3 text-stone-900 placeholder-stone-400 focus:ring-0 font-medium" placeholder="Select City" required />
                                        </div>
                                    </div>

                                    <!-- Input: Address -->
                                    <div class="md:col-span-2 mb-4">
                                        <label for="adresse" class="block text-sm font-bold text-stone-700 mb-2 ml-4 uppercase tracking-wide">Address <span class="text-red-500">*</span></label>
                                        <div class="rounded-3xl bg-white/50 border border-stone-200 focus-within:border-[#006233] focus-within:ring-4 focus-within:ring-[#006233]/10 transition-all shadow-sm backdrop-blur-md">
                                            <textarea name="adresse" id="adresse" rows="2" class="w-full bg-transparent border-none px-6 py-3 text-stone-900 placeholder-stone-400 focus:ring-0 font-medium resize-none" placeholder="Your full address" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Section: Skills & Documents -->
                            <div class="group/section">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-10 h-10 rounded-full bg-[#d4af37]/10 flex items-center justify-center text-[#d4af37] border border-[#d4af37]/20">
                                        <i class="fas fa-briefcase text-lg"></i>
                                    </div>
                                    <h3 class="text-2xl font-playfair font-bold text-stone-900 border-b-2 border-[#d4af37]/20 pb-1 pr-12">
                                        Your Potential
                                    </h3>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                                    <!-- Select: Education Level -->
                                    <div class="mb-4">
                                        <label for="niveau_etudes" class="block text-sm font-bold text-stone-700 mb-2 ml-4 uppercase tracking-wide">Education Level</label>
                                        <div class="relative rounded-full bg-white/50 border border-stone-200 focus-within:border-[#d4af37] focus-within:ring-4 focus-within:ring-[#d4af37]/10 transition-all shadow-sm backdrop-blur-md">
                                            <select name="niveau_etudes" id="niveau_etudes" class="w-full bg-transparent border-none px-6 py-3 text-stone-900 focus:ring-0 font-medium cursor-pointer" style="appearance: none; -webkit-appearance: none; -moz-appearance: none;" required>
                                                <option value="" disabled selected>Select Level</option>
                                                <option value="High School">High School</option>
                                                <option value="Bachelor's Degree">Bachelor's Degree</option>
                                                <option value="Master's Degree">Master's Degree</option>
                                                <option value="PhD">PhD</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-stone-500">
                                                <i class="fas fa-chevron-down text-xs"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Select: Availability -->
                                    <div class="mb-4">
                                        <label for="disponibilite" class="block text-sm font-bold text-stone-700 mb-2 ml-4 uppercase tracking-wide">Availability</label>
                                        <div class="relative rounded-full bg-white/50 border border-stone-200 focus-within:border-[#d4af37] focus-within:ring-4 focus-within:ring-[#d4af37]/10 transition-all shadow-sm backdrop-blur-md">
                                            <select name="disponibilite" id="disponibilite" class="w-full bg-transparent border-none px-6 py-3 text-stone-900 focus:ring-0 font-medium cursor-pointer" style="appearance: none; -webkit-appearance: none; -moz-appearance: none;" required>
                                                <option value="" disabled selected>Select Availability</option>
                                                <option value="Full Time">Full Time</option>
                                                <option value="Part Time">Part Time</option>
                                                <option value="Weekends Only">Weekends Only</option>
                                                <option value="Summer Only">Summer Only</option>
                                            </select>
                                            <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-stone-500">
                                                <i class="fas fa-chevron-down text-xs"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Languages Bubbles -->
                                <div class="mb-8 p-6 bg-stone-50/50 rounded-2xl border border-stone-100 backdrop-blur-sm">
                                    <label class="text-xs font-bold uppercase tracking-widest text-[#d4af37] mb-4 block">Languages Spoken</label>
                                    <div class="flex flex-wrap gap-3">
                                         @foreach(['Arabic', 'French', 'English', 'Spanish', 'Amazigh'] as $lang)
                                            <label class="cursor-pointer group">
                                                <input type="checkbox" name="langues[]" value="{{ $lang }}" class="peer sr-only lang-checkbox">
                                                <span class="px-5 py-2 rounded-full border border-stone-200 bg-white text-stone-600 text-sm font-medium transition-all shadow-sm hover:border-[#d4af37] flex items-center gap-2">
                                                    {{ $lang }}
                                                    <i class="fas fa-check text-[10px] opacity-0 transition-opacity"></i>
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- File Uploads (Drag & Drop Look Consistent) -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- CV Upload -->
                                    <!-- CV Upload -->
                                    <label id="cv-label" class="relative h-40 rounded-3xl border-2 border-dashed border-stone-300 bg-stone-50/50 hover:bg-[#C8102E]/5 hover:border-[#C8102E] transition-all cursor-pointer flex flex-col items-center justify-center gap-3 group overflow-hidden backdrop-blur-sm shadow-sm hover:shadow-md">
                                        <div class="absolute inset-0 bg-[#C8102E]/5 scale-0 group-hover:scale-100 transition-transform duration-500 rounded-3xl"></div>
                                        <input type="file" name="cv" id="cv-upload" class="hidden" accept=".pdf,.docx,.doc">
                                        <div class="w-12 h-12 rounded-full bg-white shadow-sm flex items-center justify-center z-10 group-hover:scale-110 transition-transform border border-stone-100">
                                            <i id="cv-icon" class="fas fa-cloud-upload-alt text-xl text-[#C8102E]"></i>
                                        </div>
                                        <div class="text-center z-10">
                                            <span id="cv-text" class="block text-stone-700 font-bold text-sm">Upload Resume</span>
                                            <span class="block text-stone-400 text-[10px] uppercase tracking-wider mt-1">PDF or DOCX (Max 5MB)</span>
                                        </div>
                                    </label>

                                    <!-- Photo Upload -->
                                    <label id="photo-label" class="relative h-40 rounded-3xl border-2 border-dashed border-stone-300 bg-stone-50/50 hover:bg-[#d4af37]/5 hover:border-[#d4af37] transition-all cursor-pointer flex flex-col items-center justify-center gap-3 group overflow-hidden backdrop-blur-sm shadow-sm hover:shadow-md">
                                        <div class="absolute inset-0 bg-[#d4af37]/5 scale-0 group-hover:scale-100 transition-transform duration-500 rounded-3xl"></div>
                                        <input type="file" name="photo" id="photo-upload" class="hidden" accept="image/*">
                                        <div class="w-12 h-12 rounded-full bg-white shadow-sm flex items-center justify-center z-10 group-hover:scale-110 transition-transform border border-stone-100">
                                            <i id="photo-icon" class="fas fa-camera text-xl text-[#d4af37]"></i>
                                        </div>
                                        <div class="text-center z-10">
                                            <span id="photo-text" class="block text-stone-700 font-bold text-sm">Upload Photo</span>
                                            <span class="block text-stone-400 text-[10px] uppercase tracking-wider mt-1">JPG or PNG (Max 2MB)</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- City Preference Chips -->
                            <div class="pt-6">
                                <label class="text-xs font-bold uppercase tracking-widest text-stone-500 mb-4 block">Where would you like to volunteer?</label>
                                <div class="flex flex-wrap gap-3">
                                    @foreach(['Marrakech', 'Casablanca', 'Rabat', 'Fez', 'Tangier', 'Agadir', 'Ouarzazate', 'Chefchaouen'] as $city)
                                    <label class="cursor-pointer group relative">
                                        <input type="radio" name="ville_volontariat" value="{{ $city }}" class="peer sr-only city-radio" required>
                                        <span class="block px-6 py-3 rounded-full border border-stone-200 bg-white text-stone-600 font-bold text-sm transition-all hover:border-[#C8102E] shadow-sm">
                                            {{ $city }}
                                        </span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-8">
                                <button type="submit" class="group w-full py-5 bg-gradient-to-r from-[#C8102E] to-[#960d23] text-white rounded-full font-black uppercase tracking-widest shadow-xl shadow-[#C8102E]/20 hover:shadow-2xl hover:shadow-[#C8102E]/40 hover:-translate-y-1 transition-all duration-300 relative overflow-hidden">
                                    <span class="relative z-10 flex items-center justify-center gap-3">
                                        Submit Application <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform"></i>
                                    </span>
                                    <!-- Shine Effect -->
                                    <div class="absolute top-0 -left-[100%] w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-12 group-hover:animate-shine"></div>
                                </button>
                                <p class="text-center text-xs text-stone-400 mt-4">By submitting this form, you agree to our Terms of Service and Privacy Policy.</p>
                            </div>
                        </form>
                    </div>

                    <!-- RIGHT: INFO / IMAGE COLUMN (Sticky) -->
                    <div class="w-full lg:w-1/3 bg-stone-900 border-l border-stone-800 relative flex flex-col text-white">
                        <!-- Background Pattern (Darkened) -->
                        <div class="absolute inset-0 opacity-20" 
                             style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 200px;">
                        </div>
                         <div class="absolute inset-0 bg-gradient-to-b from-stone-900/90 via-stone-900/80 to-stone-900/90"></div>
                        
                        <div class="p-12 relative z-10 h-full flex flex-col justify-between sticky top-0">
                            <div>
                                <div class="w-16 h-16 bg-[#C8102E] text-white rounded-2xl flex items-center justify-center text-2xl shadow-lg mb-8 rotate-3">
                                    <i class="fas fa-hand-holding-heart"></i>
                                </div>
                                <h3 class="text-2xl font-playfair font-bold text-white mb-4">Why Volunteer?</h3>
                                <p class="text-stone-300 leading-relaxed mb-8">
                                    Volunteering with Discover Morocco 2030 is more than just service—it's about becoming part of a legacy. You will:
                                </p>
                                <ul class="space-y-4">
                                    <li class="flex items-start gap-3">
                                        <i class="fas fa-check-circle text-[#d4af37] mt-1"></i>
                                        <span class="text-stone-300 font-medium">Gain exclusive access to national events.</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <i class="fas fa-check-circle text-[#d4af37] mt-1"></i>
                                        <span class="text-stone-300 font-medium">Develop professional skills in tourism.</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <i class="fas fa-check-circle text-[#d4af37] mt-1"></i>
                                        <span class="text-stone-300 font-medium">Connect with a global community.</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-12 p-6 bg-white/5 border border-white/10 rounded-xl shadow-sm backdrop-blur-sm">
                                <h4 class="font-bold text-white mb-2">Need Help?</h4>
                                <p class="text-sm text-stone-400 mb-4">Contact our coordinator support.</p>
                                <a href="mailto:volunteers@visitmorocco.com" class="text-[#d4af37] font-bold text-sm tracking-widest uppercase hover:text-white transition-colors">
                                    volunteers@visitmorocco.com
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- INFINITE SCROLLING BAR (Before Footer) -->
        <div class="relative overflow-hidden py-6 bg-black mt-16">
            <!-- Scrolling Content -->
            <div class="relative marquee-container">
                <div class="marquee-content flex items-center gap-16 whitespace-nowrap">
                    <!-- First Set -->
                    <span class="text-white text-xl md:text-2xl font-outfit font-bold">
                        Join the movement reshaping Morocco
                    </span>
                    <span class="text-yellow-400 text-3xl font-bold" style="color: #FFD700;">✦</span>
                    <span class="text-white text-xl md:text-2xl font-outfit font-bold">
                        Your skills, our heritage, one shared future
                    </span>
                    <span class="text-yellow-400 text-3xl font-bold" style="color: #FFD700;">✦</span>
                    <span class="text-white text-xl md:text-2xl font-outfit font-bold">
                        Be the pulse of Morocco 2030
                    </span>
                    <span class="text-yellow-400 text-3xl font-bold" style="color: #FFD700;">✦</span>
                    
                    <!-- Duplicate for seamless loop -->
                    <span class="text-white text-xl md:text-2xl font-outfit font-bold">
                        Join the movement reshaping Morocco
                    </span>
                    <span class="text-yellow-400 text-3xl font-bold" style="color: #FFD700;">✦</span>
                    <span class="text-white text-xl md:text-2xl font-outfit font-bold">
                        Your skills, our heritage, one shared future
                    </span>
                    <span class="text-yellow-400 text-3xl font-bold" style="color: #FFD700;">✦</span>
                    <span class="text-white text-xl md:text-2xl font-outfit font-bold">
                        Be the pulse of Morocco 2030
                    </span>
                    <span class="text-yellow-400 text-3xl font-bold" style="color: #FFD700;">✦</span>
                </div>
            </div>
        </div>
    </div>

    <style>
        .animate-slow-zoom { animation: slowZoom 20s infinite alternate; }
        @keyframes slowZoom { from { transform: scale(1); } to { transform: scale(1.1); } }
        
        .animate-fade-up { animation: fadeUp 0.8s ease-out forwards; }
        @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }

        .animate-fade-in { animation: fadeIn 1s ease-out forwards; }
        @keyframes fadeIn { to { opacity: 1; } }
        
        /* Floating Bubbles*/
        @keyframes float {
            0% { transform: translate(0, 0); }
            50% { transform: translate(20px, -20px); }
            100% { transform: translate(0, 0); }
        }
        .animate-float-slow { animation: float 8s ease-in-out infinite; }
        .animate-float-delay { animation: float 10s ease-in-out infinite 2s; }
        .animate-float-reverse { animation: float 9s ease-in-out infinite reverse; }
        .animate-pulse-slow { animation: pulse 6s infinite; }
        
        /* Marquee Animation */
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 30s linear infinite;
        }
        
        /* Marquee Container & Content */
        .marquee-container {
            display: flex;
            overflow: hidden;
        }
        .marquee-content {
            display: flex;
            animation: marquee 40s linear infinite;
        }

        /* FORCE OVERRIDES FOR SELECTION VISIBILITY */
        .lang-checkbox:checked + span {
            background-color: #d4af37 !important;
            color: white !important;
            border-color: #d4af37 !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .lang-checkbox:checked + span i {
            opacity: 1 !important;
        }

        .city-radio:checked + span {
            background-color: #C8102E !important;
            color: white !important;
            border-color: #C8102E !important;
            box-shadow: 0 10px 15px -3px rgba(200, 16, 46, 0.3);
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>
    <script>
        gsap.registerPlugin(ScrollTrigger);

        // HERO SCROLL ANIMATION (Matches Contact Page)
        gsap.to("#hero-container", {
            scrollTrigger: {
                trigger: "body",
                start: "top top",
                end: "+=500",
                scrub: 1, 
            },
            width: "90%",
            borderRadius: "3rem",
            y: 50,
            duration: 1
        });

        // FILE UPLOAD HANDLING (Drag & Drop + Feedback)
        document.addEventListener('DOMContentLoaded', function() {
            const uploadZones = [
                { inputId: 'cv-upload', labelId: 'cv-label', textId: 'cv-text', iconId: 'cv-icon' },
                { inputId: 'photo-upload', labelId: 'photo-label', textId: 'photo-text', iconId: 'photo-icon' }
            ];

            uploadZones.forEach(zone => {
                const input = document.getElementById(zone.inputId);
                const label = document.getElementById(zone.labelId);
                const textSpan = document.getElementById(zone.textId);
                const icon = document.getElementById(zone.iconId);
                
                if (!input || !label) return;

                // Handle File Selection via Click
                input.addEventListener('change', function(e) {
                    handleFileSelect(e.target.files[0], textSpan, icon, label);
                });

                // Drag & Drop Events
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    label.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                ['dragenter', 'dragover'].forEach(eventName => {
                    label.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    label.addEventListener(eventName, unhighlight, false);
                });

                function highlight(e) {
                    label.classList.add('border-[#C8102E]', 'bg-[#C8102E]/5', 'scale-[1.02]');
                    label.classList.remove('border-stone-300', 'bg-stone-50/50');
                }

                function unhighlight(e) {
                    label.classList.remove('border-[#C8102E]', 'bg-[#C8102E]/5', 'scale-[1.02]');
                    label.classList.add('border-stone-300', 'bg-stone-50/50');
                }

                label.addEventListener('drop', handleDrop, false);

                function handleDrop(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;
                    
                    if (files.length > 0) {
                        input.files = files; // Assign dropped file to input
                        handleFileSelect(files[0], textSpan, icon, label);
                    }
                }

                function handleFileSelect(file, textElement, iconElement, labelElement) {
                    if (file) {
                        textElement.textContent = file.name;
                        textElement.classList.add('text-[#C8102E]', 'font-bold');
                        
                        // Change icon to checkmark
                        iconElement.className = 'fas fa-check-circle text-2xl text-green-500';
                        
                        // Add success style to label
                        labelElement.classList.add('border-green-500', 'bg-green-50');
                        labelElement.classList.remove('border-stone-300', 'bg-stone-50/50');
                    }
                }
            });
        });
    </script>
@endsection
