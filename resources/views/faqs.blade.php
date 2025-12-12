@extends('layouts.app')

@section('content')
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        /* Accordion Animation */
        .faq-answer { display: grid; grid-template-rows: 0fr; transition: grid-template-rows 0.4s ease-out; }
        .faq-answer.open { grid-template-rows: 1fr; }
        .faq-inner { overflow: hidden; }
        
        /* Hero Animation */
        .hero-reveal-text { clip-path: polygon(0 100%, 100% 100%, 100% 100%, 0 100%); opacity: 0; transform: translateY(20px); }
        
        .zellige-pattern {
            background-image: url('{{ asset('assets/images/zellige_pattern.png') }}');
            background-repeat: repeat-x;
            background-size: 60px;
        }
    </style>

    <!-- HERO SECTION (Mindblowing) -->
    <!-- Concept: Split Screen Reveal. Image on left, Pattern/Text on right, then merge. -->
    <div class="relative w-full h-[80vh] flex overflow-hidden bg-black">
        
        <!-- Large Background Image with Parallax -->
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('assets/images/casablanca_cityscape.png') }}" class="w-full h-full object-cover opacity-60 scale-110" id="hero-bg">
            <div class="absolute inset-0 bg-gradient-to-t from-stone-50 via-transparent to-black/60"></div>
        </div>

        <!-- Floating Content -->
        <div class="relative z-10 container mx-auto px-6 h-full flex flex-col justify-end pb-32">
            <h1 class="text-7xl md:text-9xl font-black font-playfair text-white tracking-tighter mb-4 opacity-0 translate-y-10" id="hero-title">
                Help <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#d4af37] to-[#f3e5ab] italic pr-4">Center</span>
            </h1>
            <p class="text-xl md:text-2xl font-light text-stone-200 max-w-2xl opacity-0 translate-y-10" id="hero-subtitle">
                Everything you need to know for your journey to the Kingdom of Light.
            </p>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="relative z-20 -mt-20 container mx-auto px-6 md:px-12 pb-24">
        
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-stone-100 flex flex-col md:flex-row min-h-[800px]">
            
            <!-- LEFT: Sidebar Navigation (Sticky) -->
            <div class="md:w-1/4 bg-stone-50 p-8 border-r border-stone-100">
                <div class="sticky top-8">
                    <h3 class="font-bold text-xs uppercase tracking-[0.2em] text-stone-400 mb-8 pl-2">Categories</h3>
                    <div class="flex flex-col space-y-2">
                        <a href="#" class="px-5 py-4 text-sm font-bold text-stone-500 hover:text-[#C8102E] transition-all rounded-xl hover:bg-white hover:shadow-sm">General Info</a>
                        <a href="#" class="px-5 py-4 text-sm font-bold text-stone-500 hover:text-[#C8102E] transition-all rounded-xl hover:bg-white hover:shadow-sm">Visa & Entry</a>
                        <a href="#" class="px-5 py-4 text-sm font-bold text-stone-500 hover:text-[#C8102E] transition-all rounded-xl hover:bg-white hover:shadow-sm">Transport</a>
                        <!-- Active -->
                        <a href="#" class="px-5 py-4 text-sm font-bold text-white bg-[#C8102E] rounded-xl shadow-lg shadow-red-500/30 transform scale-105 flex justify-between items-center group">
                            Safety & Health
                            <i class="fas fa-chevron-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="#" class="px-5 py-4 text-sm font-bold text-stone-500 hover:text-[#C8102E] transition-all rounded-xl hover:bg-white hover:shadow-sm">Culture & Etiquette</a>
                        <a href="#" class="px-5 py-4 text-sm font-bold text-stone-500 hover:text-[#C8102E] transition-all rounded-xl hover:bg-white hover:shadow-sm">Money & Costs</a>
                        <a href="#" class="px-5 py-4 text-sm font-bold text-stone-500 hover:text-[#C8102E] transition-all rounded-xl hover:bg-white hover:shadow-sm">Accommodation</a>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Content Area -->
            <div class="md:w-3/4 p-8 md:p-12">
                <div class="mb-10 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#C8102E]/10 flex items-center justify-center text-[#C8102E] text-xl">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h2 class="text-3xl font-playfair font-bold text-stone-900">Safety & Health</h2>
                </div>

                <div class="space-y-4">
                    <!-- Q1 -->
                    <div class="group border border-stone-200 rounded-2xl overflow-hidden hover:border-[#C8102E] transition-colors cursor-pointer faq-item shadow-sm" onclick="toggleFaq(this)">
                        <div class="p-6 flex justify-between items-center bg-white z-10 relative">
                            <h4 class="font-bold text-lg text-stone-900 group-hover:text-[#C8102E] transition-colors">Is it safe to travel alone in Morocco?</h4>
                            <div class="w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-stone-400 group-hover:bg-[#C8102E] group-hover:text-white transition-all">
                                <i class="fas fa-plus text-xs icon-toggle transition-transform duration-300"></i>
                            </div>
                        </div>
                        <div class="faq-answer bg-stone-50">
                            <div class="faq-inner px-6 pb-6 text-stone-600 leading-relaxed text-base pt-2">
                                Yes, Morocco is generally very safe for solo travelers. Moroccans are famous for their hospitality. However, as with any destination, it is recommended to stay in well-lit areas at night and respect local customs. Millions of solo adventurers visit every year without issue.
                            </div>
                        </div>
                    </div>

                    <!-- Q2 -->
                     <div class="group border border-stone-200 rounded-2xl overflow-hidden hover:border-[#C8102E] transition-colors cursor-pointer faq-item shadow-sm" onclick="toggleFaq(this)">
                        <div class="p-6 flex justify-between items-center bg-white z-10 relative">
                            <h4 class="font-bold text-lg text-stone-900 group-hover:text-[#C8102E] transition-colors">What is the emergency number?</h4>
                            <div class="w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-stone-400 group-hover:bg-[#C8102E] group-hover:text-white transition-all">
                                <i class="fas fa-plus text-xs icon-toggle transition-transform duration-300"></i>
                            </div>
                        </div>
                        <div class="faq-answer bg-stone-50">
                            <div class="faq-inner px-6 pb-6 text-stone-600 leading-relaxed text-base pt-2">
                                In case of emergency, <strong>dial 19</strong> for Police or <strong>15</strong> for Ambulance/Fire within Morocco. There is also a dedicated "Brigade Touristique" in major cities specifically to assist visitors.
                            </div>
                        </div>
                    </div>

                    <!-- Q3 -->
                     <div class="group border border-stone-200 rounded-2xl overflow-hidden hover:border-[#C8102E] transition-colors cursor-pointer faq-item shadow-sm" onclick="toggleFaq(this)">
                        <div class="p-6 flex justify-between items-center bg-white z-10 relative">
                            <h4 class="font-bold text-lg text-stone-900 group-hover:text-[#C8102E] transition-colors">Is tap water safe to drink?</h4>
                            <div class="w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-stone-400 group-hover:bg-[#C8102E] group-hover:text-white transition-all">
                                <i class="fas fa-plus text-xs icon-toggle transition-transform duration-300"></i>
                            </div>
                        </div>
                        <div class="faq-answer bg-stone-50">
                            <div class="faq-inner px-6 pb-6 text-stone-600 leading-relaxed text-base pt-2">
                                In general, tap water in major cities is treated and safe to drink, though it may have a different mineral content than what you're used to. Many travelers prefer bottled water (easy to find everywhere) to be safe and avoid stomach upsets.
                            </div>
                        </div>
                    </div>

                    <!-- Q4 -->
                     <div class="group border border-stone-200 rounded-2xl overflow-hidden hover:border-[#C8102E] transition-colors cursor-pointer faq-item shadow-sm" onclick="toggleFaq(this)">
                        <div class="p-6 flex justify-between items-center bg-white z-10 relative">
                            <h4 class="font-bold text-lg text-stone-900 group-hover:text-[#C8102E] transition-colors">Do I need specific vaccinations?</h4>
                            <div class="w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-stone-400 group-hover:bg-[#C8102E] group-hover:text-white transition-all">
                                <i class="fas fa-plus text-xs icon-toggle transition-transform duration-300"></i>
                            </div>
                        </div>
                        <div class="faq-answer bg-stone-50">
                            <div class="faq-inner px-6 pb-6 text-stone-600 leading-relaxed text-base pt-2">
                                Not generally for travelers from Europe or North America. However, it's always smart to be up to date on routine vaccines like Hepatitis A and Tetanus. Consult your travel doctor 4-6 weeks before departure.
                            </div>
                        </div>
                    </div>

                    <!-- Q5 -->
                     <div class="group border border-stone-200 rounded-2xl overflow-hidden hover:border-[#C8102E] transition-colors cursor-pointer faq-item shadow-sm" onclick="toggleFaq(this)">
                        <div class="p-6 flex justify-between items-center bg-white z-10 relative">
                            <h4 class="font-bold text-lg text-stone-900 group-hover:text-[#C8102E] transition-colors">Are pharmaceuticals easy to find?</h4>
                            <div class="w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-stone-400 group-hover:bg-[#C8102E] group-hover:text-white transition-all">
                                <i class="fas fa-plus text-xs icon-toggle transition-transform duration-300"></i>
                            </div>
                        </div>
                        <div class="faq-answer bg-stone-50">
                            <div class="faq-inner px-6 pb-6 text-stone-600 leading-relaxed text-base pt-2">
                                Yes, Moroccan pharmacies are excellent and recognizable by a green crescent cross. Pharmacists are well-trained and many speak English or French. You don't need a prescription for many common ailments.
                            </div>
                        </div>
                    </div>

                    <!-- Q6 -->
                     <div class="group border border-stone-200 rounded-2xl overflow-hidden hover:border-[#C8102E] transition-colors cursor-pointer faq-item shadow-sm" onclick="toggleFaq(this)">
                        <div class="p-6 flex justify-between items-center bg-white z-10 relative">
                            <h4 class="font-bold text-lg text-stone-900 group-hover:text-[#C8102E] transition-colors">What about travel insurance?</h4>
                            <div class="w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-stone-400 group-hover:bg-[#C8102E] group-hover:text-white transition-all">
                                <i class="fas fa-plus text-xs icon-toggle transition-transform duration-300"></i>
                            </div>
                        </div>
                        <div class="faq-answer bg-stone-50">
                            <div class="faq-inner px-6 pb-6 text-stone-600 leading-relaxed text-base pt-2">
                                It is highly recommended to have comprehensive travel insurance that covers medical emergencies, trip cancellations, and lost luggage.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- STILL HAVE QUESTIONS (Rounded Corners Fixed) -->
    <section class="py-24 px-6 md:px-12 bg-white relative">
        <div class="container mx-auto">
            <div class="bg-[#0a0a0a] text-white rounded-[3rem] p-12 md:p-24 text-center relative overflow-hidden shadow-2xl">
                 <!-- Background Pattern Intensity -->
                <div class="absolute inset-0 opacity-10" style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 100px;"></div>
                
                <div class="relative z-10 max-w-3xl mx-auto">
                    <span class="text-[#d4af37] font-bold uppercase tracking-widest text-xs mb-4 block">Here to Help 24/7</span>
                    <h2 class="text-4xl md:text-6xl font-playfair font-black mb-6">Still have questions?</h2>
                    <p class="text-stone-400 text-lg md:text-xl font-light mb-10">
                        Our dedicated support team is ready to assist you with any inquiries regarding your travel plans.
                    </p>
                    <a href="/contact" class="inline-flex items-center gap-3 px-10 py-5 bg-[#C8102E] text-white font-bold uppercase tracking-widest rounded-full hover:bg-white hover:text-[#C8102E] transition-all transform hover:-translate-y-1 shadow-lg hover:shadow-red-500/50">
                        <span>Contact Support</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ZELLIGE BAND -->
    <div class="w-full h-6 bg-[#006233] relative overflow-hidden flex items-center">
        <div class="absolute inset-0 w-full h-full opacity-30 zellige-pattern"></div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>
    <script>
        // GSAP Animations
        gsap.registerPlugin(ScrollTrigger);

        // Hero Reveal
        gsap.to("#hero-title", { opacity: 1, y: 0, duration: 1.2, ease: "power4.out", delay: 0.2 });
        gsap.to("#hero-subtitle", { opacity: 1, y: 0, duration: 1, ease: "power4.out", delay: 0.5 });
        gsap.to("#hero-bg", { scale: 1, duration: 20, ease: "none", repeat: -1, yoyo: true }); // Slow breath

        // Accordion Logic
        function toggleFaq(element) {
            const answer = element.querySelector('.faq-answer');
            const icon = element.querySelector('.icon-toggle');
            
            // Close others (Optional, strict accordion)
            // document.querySelectorAll('.faq-answer').forEach(el => { if(el !== answer) el.classList.remove('open'); });

            answer.classList.toggle('open');
            
            if (answer.classList.contains('open')) {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
                icon.style.transform = 'rotate(180deg)';
                element.classList.add('border-[#C8102E]');
            } else {
                icon.classList.add('fa-plus');
                icon.classList.remove('fa-minus');
                icon.style.transform = 'rotate(0deg)';
                element.classList.remove('border-[#C8102E]');
            }
        }
    </script>
@endsection
