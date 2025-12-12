<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discover Morocco 2030</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Outfit:wght@100..900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    
    <!-- Swiper CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Mega Menu Hover Effect */
        .group:hover .mega-menu-dropdown {
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
            transform: translateY(0) !important;
        }

        /* Chatbot Animations */
        @keyframes pulse-ring {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        #chatbot-toggle {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        #chatbot-messages::-webkit-scrollbar {
            width: 6px;
        }

        #chatbot-messages::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        #chatbot-messages::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #C8102E, #a00d25);
            border-radius: 10px;
        }

        #chatbot-messages::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #a00d25, #8B0000);
        }

        /* Message Animation */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #chatbot-messages > div {
            animation: slideIn 0.3s ease-out;
        }

        /* Generic Fade In */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>
<body class="antialiased bg-stone-50 text-stone-900 font-outfit overflow-x-hidden selection:bg-[#006233] selection:text-white">

    <!-- NAVIGATION (Included from partial) -->
    @include('partials.header')

    <!-- Content -->
    @yield('content')

    <!-- NEWSLETTER (Included from partial) -->
    @include('partials.newsletter')

    <!-- FOOTER (Included from partial) -->
    @include('partials.footer')

    <!-- MOROCCAN CHATBOT -->
    <!-- Floating Chatbot Button -->
    <!-- Floating Chatbot Button -->
    <!-- Floating Chatbot Button -->
    <button id="chatbot-toggle" onclick="toggleChatbot()" class="fixed bottom-6 right-6 md:bottom-8 md:right-8 w-16 h-16 md:w-20 md:h-20 rounded-full bg-black text-white shadow-2xl hover:shadow-[0_20px_40px_-10px_rgba(0,0,0,0.6)] transform hover:scale-110 transition-all duration-300 flex items-center justify-center group border-4 border-stone-800 hover:border-[#C8102E] cursor-pointer" style="z-index: 99999 !important;">
        <!-- Chat Icon -->
        <i class="fas fa-comments text-2xl md:text-3xl group-hover:scale-110 transition-transform duration-300 text-white"></i>
        <!-- Pulsing Ring Animation -->
        <span class="absolute inset-0 rounded-full bg-white/20 animate-ping opacity-20"></span>
        <!-- Moroccan Star Decoration -->
        <div class="absolute -top-1 -right-1 w-6 h-6 bg-[#C8102E] rounded-full flex items-center justify-center border-2 border-white">
            <i class="fas fa-star text-[10px] text-white"></i>
        </div>
    </button>

    <!-- Chatbot Window -->
    <div id="chatbot-window" class="fixed bottom-20 right-4 left-4 md:left-auto md:w-96 md:right-8 h-[600px] md:h-[600px] max-h-[85vh] bg-white rounded-3xl shadow-2xl flex flex-col overflow-hidden border-4 border-[#006233]/20" style="z-index: 2147483647; opacity: 0; transform: scale(0); transform-origin: bottom right; pointer-events: auto; display: none;">
        <!-- Moroccan Pattern Background -->
        <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 100px;"></div>
        
        <!-- Header with Moroccan Design -->
        <!-- Header with Moroccan Design -->
        <div class="relative bg-black p-6 flex items-center justify-between border-b-4 border-[#C8102E]">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border-2 border-[#d4af37]">
                    <i class="fas fa-comments text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-white font-bold text-lg font-playfair">Marhaba!</h3>
                    <p class="text-white/80 text-xs">Discover Morocco Assistant</p>
                </div>
            </div>
            <button id="chatbot-close" class="w-8 h-8 rounded-full bg-white/20 hover:bg-white/30 text-white flex items-center justify-center transition-colors cursor-pointer">
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Messages Container -->
        <div id="chatbot-messages" class="flex-1 overflow-y-auto p-6 space-y-4 bg-gradient-to-b from-stone-50 to-white">
            <!-- Welcome Message -->
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#006233] to-[#004d28] flex items-center justify-center flex-shrink-0 border-2 border-[#d4af37]/30">
                    <i class="fas fa-star text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <div class="bg-white rounded-2xl rounded-tl-none p-4 shadow-md border-l-4 border-[#006233]">
                        <p class="text-stone-800 text-sm leading-relaxed">
                            <span class="font-bold text-[#C8102E]">Marhaba!</span> Welcome to Discover Morocco 2030. I'm here to help you explore the wonders of Morocco. How can I assist you today?
                        </p>
                    </div>
                    <span class="text-xs text-stone-400 mt-1 block">Just now</span>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="relative p-4 bg-white border-t-2 border-stone-200">
            <!-- Decorative Top Border -->
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#C8102E] via-[#d4af37] to-[#006233]"></div>
            
            <form id="chatbot-form" onsubmit="sendMessage(event)" class="flex items-center gap-2">
                <input 
                    type="text" 
                    id="chatbot-input" 
                    placeholder="Type your message..." 
                    class="flex-1 px-4 py-3 bg-stone-50 border-2 border-stone-200 rounded-full focus:outline-none focus:border-[#C8102E] focus:ring-2 focus:ring-[#C8102E]/20 transition-all text-sm"
                    autocomplete="off"
                >
                <button 
                    type="submit" 
                    class="w-12 h-12 rounded-full bg-gradient-to-br from-[#C8102E] to-[#a00d25] text-white hover:from-[#a00d25] hover:to-[#C8102E] transition-all shadow-lg hover:shadow-xl transform hover:scale-110 flex items-center justify-center"
                >
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
            
            <!-- Quick Actions Removed -->
        </div>
    </div>

    <!-- COMMENTS MODAL -->
    <div id="comments-modal" class="hidden fixed inset-0 flex items-center justify-center p-4" style="z-index: 99999;">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-stone-900/60 backdrop-blur-sm transition-opacity" onclick="closeCommentsModal()"></div>
        
        <!-- Modal Content -->
        <div class="relative w-full max-w-2xl bg-white rounded-[2rem] shadow-2xl overflow-hidden transform transition-all scale-100 p-8 md:p-12 border border-gray-100">
            <!-- Close Button -->
            <button onclick="closeCommentsModal()" class="absolute top-5 right-5 w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500 hover:text-red-600 flex items-center justify-center transition-colors focus:outline-none">
                <i class="fas fa-times"></i>
            </button>

            <!-- Professional Header -->
            <div class="mb-10 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3 font-playfair">
                    Leave a Comment
                </h2>
                <p class="text-stone-500 text-sm">We value your feedback and suggestions.</p>
                <div class="h-1 w-16 bg-[#C8102E] mx-auto rounded-full mt-6"></div>
            </div>

            <!-- Professional Boxed Form -->
            <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <!-- Boxed Input: First & Last Name -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="modal_prenom" class="block text-sm font-semibold text-gray-700 mb-2">
                             First Name
                        </label>
                        <input type="text" name="prenom" id="modal_prenom" 
                            class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#C8102E]/20 focus:border-[#C8102E] transition-all" 
                            placeholder="First Name" required />
                    </div>
                    <div>
                        <label for="modal_nom" class="block text-sm font-semibold text-gray-700 mb-2">
                             Last Name
                        </label>
                        <input type="text" name="nom" id="modal_nom" 
                            class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#C8102E]/20 focus:border-[#C8102E] transition-all" 
                            placeholder="Last Name" required />
                    </div>
                </div>

                <!-- Boxed Input: Email -->
                <div>
                    <label for="modal_email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email Address
                    </label>
                    <input type="email" name="email" id="modal_email" 
                        class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#C8102E]/20 focus:border-[#C8102E] transition-all" 
                        placeholder="name@company.com" required />
                </div>

                <!-- Boxed Input: Comment -->
                <div>
                    <label for="modal_comment" class="block text-sm font-semibold text-gray-700 mb-2">
                        Message
                    </label>
                    <textarea name="comment" id="modal_comment" rows="4" 
                        class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#C8102E]/20 focus:border-[#C8102E] transition-all resize-none" 
                        placeholder="Share your thoughts..." required></textarea>
                </div>

                <!-- Boxed Photo Upload -->
                <div>
                    <span class="block text-sm font-semibold text-gray-700 mb-2">Photo Attachment</span>
                    <label class="flex items-center gap-4 cursor-pointer group py-3 px-4 border border-dashed border-gray-300 rounded-lg bg-gray-50 hover:bg-white hover:border-[#C8102E] transition-all duration-200">
                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-gray-400 border border-gray-200 group-hover:border-[#C8102E] group-hover:text-[#C8102E] transition-all">
                            <i class="fas fa-camera text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <span class="block text-sm font-medium text-gray-600 group-hover:text-gray-900 transition-colors">Click to upload image</span>
                        </div>
                        <input type="file" name="photo" class="hidden">
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full py-4 px-6 mt-6 rounded-lg bg-[#C8102E] text-white font-bold text-sm tracking-widest hover:bg-[#a00d25] hover:shadow-lg transition-all duration-300 flex items-center justify-center gap-2">
                    Send Message <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Modal Logic
        function openCommentsModal() {
            const modal = document.getElementById('comments-modal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        }

        function closeCommentsModal() {
            const modal = document.getElementById('comments-modal');
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Close on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                closeCommentsModal();
                closeChatbot();
            }
        });

        // CHATBOT FUNCTIONALITY - Make it globally accessible
        window.toggleChatbot = function() {
            const chatbotWindow = document.getElementById('chatbot-window');
            const chatbotToggle = document.getElementById('chatbot-toggle');
            
            if (!chatbotWindow) return;
            
            // check inline style
            const isHidden = chatbotWindow.style.display === 'none' || chatbotWindow.style.display === '';
            
            if (isHidden) {
                // OPEN
                chatbotWindow.style.display = 'flex';
                // Force layout reflow
                void chatbotWindow.offsetWidth; 
                
                setTimeout(() => {
                    chatbotWindow.style.opacity = '1';
                    chatbotWindow.style.transform = 'scale(1)';
                }, 10);

                if (chatbotToggle) chatbotToggle.style.transform = 'scale(0.9)';
            } else {
                // CLOSE
                chatbotWindow.style.opacity = '0';
                chatbotWindow.style.transform = 'scale(0.8)';
                
                setTimeout(() => {
                    chatbotWindow.style.display = 'none';
                }, 300);
                
                if (chatbotToggle) chatbotToggle.style.transform = 'scale(1)';
            }
        };
        
        // Ensure chatbot button is visible on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Re-apply visibility just in case
            const toggle = document.getElementById('chatbot-toggle');
            if (toggle) {
                toggle.style.opacity = '1';
                toggle.style.visibility = 'visible';
            }
            
            const closeBtn = document.getElementById('chatbot-close');
            if (closeBtn) {
                closeBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    toggleChatbot();
                });
            }
        });

        function closeChatbot() {
             const chatbotWindow = document.getElementById('chatbot-window');
             if (chatbotWindow && !chatbotWindow.classList.contains('hidden')) {
                 toggleChatbot();
             }
        }

        function sendMessage(event) {
            event.preventDefault();
            const input = document.getElementById('chatbot-input');
            const message = input.value.trim();
            
            if (message) {
                addMessage(message, 'user');
                input.value = '';
                
                // TODO: Connect to n8n webhook or database API
                // Example: 
                // fetch('/api/chatbot', {
                //     method: 'POST',
                //     headers: { 'Content-Type': 'application/json' },
                //     body: JSON.stringify({ message: message })
                // })
                // .then(response => response.json())
                // .then(data => addMessage(data.response, 'bot'));
                
                // Simulate bot response (Replace with actual API call to n8n/database)
                setTimeout(() => {
                    addMessage('Thank you for your message! This feature will be connected to our database and n8n workflow soon. In the meantime, feel free to explore our website to discover more about Morocco.', 'bot');
                }, 1000);
            }
        }

        function sendQuickMessage(message) {
            const input = document.getElementById('chatbot-input');
            input.value = message;
            sendMessage(new Event('submit'));
        }

        function addMessage(message, sender) {
            const messagesContainer = document.getElementById('chatbot-messages');
            const messageDiv = document.createElement('div');
            messageDiv.className = `flex items-start gap-3 ${sender === 'user' ? 'flex-row-reverse' : ''}`;
            
            const timestamp = new Date().toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
            
            if (sender === 'user') {
                messageDiv.innerHTML = `
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#C8102E] to-[#a00d25] flex items-center justify-center flex-shrink-0 border-2 border-[#d4af37]/30">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="flex-1 max-w-[80%]">
                        <div class="bg-gradient-to-br from-[#C8102E] to-[#a00d25] text-white rounded-2xl rounded-tr-none p-4 shadow-md">
                            <p class="text-sm leading-relaxed">${escapeHtml(message)}</p>
                        </div>
                        <span class="text-xs text-stone-400 mt-1 block text-right">${timestamp}</span>
                    </div>
                `;
            } else {
                messageDiv.innerHTML = `
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#006233] to-[#004d28] flex items-center justify-center flex-shrink-0 border-2 border-[#d4af37]/30">
                        <i class="fas fa-star text-white text-sm"></i>
                    </div>
                    <div class="flex-1 max-w-[80%]">
                        <div class="bg-white rounded-2xl rounded-tl-none p-4 shadow-md border-l-4 border-[#006233]">
                            <p class="text-stone-800 text-sm leading-relaxed">${escapeHtml(message)}</p>
                        </div>
                        <span class="text-xs text-stone-400 mt-1 block">${timestamp}</span>
                    </div>
                `;
            }
            
            messagesContainer.appendChild(messageDiv);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // Mobile Menu Toggle - v2.0 (Simplified)
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileOverlay = document.getElementById('mobile-overlay');
        const burgerIcon = document.getElementById('burger-icon');
        const closeIcon = document.getElementById('close-icon');
        
        // Set initial state
        if (mobileMenu) {
            mobileMenu.setAttribute('data-open', 'false');
        }
        
        function toggleMobileMenu() {
            if (!mobileMenu || !mobileOverlay || !burgerIcon || !closeIcon) return;
            
            const isOpen = mobileMenu.getAttribute('data-open') === 'true';
            
            if (isOpen) {
                // CLOSE MENU
                console.log('Closing menu');
                mobileMenu.setAttribute('data-open', 'false');
                setTimeout(() => {
                    mobileMenu.classList.add('-translate-x-full');
                }, 10);
                
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('flex');
                }, 500);
                
                mobileOverlay.classList.remove('opacity-100');
                mobileOverlay.classList.add('opacity-0', 'pointer-events-none', 'hidden');
                
                // Show burger, hide X
                burgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                
                document.body.style.overflow = '';
            } else {
                // OPEN MENU
                console.log('Opening menu');
                mobileMenu.setAttribute('data-open', 'true');
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('flex');
                
                setTimeout(() => {
                    mobileMenu.classList.remove('-translate-x-full');
                }, 10);
                
                mobileOverlay.classList.remove('hidden', 'opacity-0', 'pointer-events-none');
                mobileOverlay.classList.add('opacity-100');
                
                // Hide burger, show X
                burgerIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                
                document.body.style.overflow = 'hidden';
            }
        }
        
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', toggleMobileMenu);
        }
        
        // Close menu when clicking on links
        if (mobileMenu) {
            const menuLinks = mobileMenu.querySelectorAll('a');
            menuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (mobileMenu.getAttribute('data-open') === 'true') {
                        toggleMobileMenu();
                    }
                });
            });
        }
        
        // Mega Menu Category Switching
        document.addEventListener('DOMContentLoaded', function() {
            const categories = document.querySelectorAll('.mega-category');
            const contents = document.querySelectorAll('.mega-content');
            
            categories.forEach(category => {
                category.addEventListener('mouseenter', function() {
                    const targetCategory = this.getAttribute('data-category');
                    
                    // Remove active class from all categories
                    categories.forEach(cat => {
                        cat.classList.remove('active', 'border-[#C8102E]');
                        cat.classList.add('border-transparent');
                        cat.querySelector('span').classList.remove('text-stone-900');
                        cat.querySelector('span').classList.add('text-stone-700');
                    });
                    
                    // Add active class to current category
                    this.classList.add('active', 'border-[#C8102E]');
                    this.classList.remove('border-transparent');
                    this.querySelector('span').classList.add('text-stone-900');
                    this.querySelector('span').classList.remove('text-stone-700');
                    
                    // Hide all content sections
                    contents.forEach(content => {
                        content.classList.add('hidden');
                        content.classList.remove('active');
                    });
                    
                    // Show target content
                    const targetContent = document.querySelector(`.mega-content[data-content="${targetCategory}"]`);
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                        targetContent.classList.add('active');
                    }
                });
            });
        });

        // Global Navbar Scroll Logic
        const navbar = document.getElementById('navbar');
        if (navbar) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled', 'bg-black/95', 'py-4');
                    navbar.classList.remove('bg-gradient-to-b', 'from-black/80', 'to-transparent', 'py-6');
                } else {
                    navbar.classList.remove('scrolled', 'bg-black/95', 'py-4');
                    navbar.classList.add('bg-gradient-to-b', 'from-black/80', 'to-transparent', 'py-6');
                }
            });
        }
    </script>
    @yield('scripts')
    <!-- ========================================== -->
    <!--          APPLE-STYLE CINEMATIC LOADER      -->


    <!-- ========================================== -->
    <!--       SNAKE TRAIL CURSOR (3 CIRCLES)       -->
    <!-- ========================================== -->

    <!-- The Snake Segments -->
    <!-- 1. Head (Big) -->
    <div class="cursor-dot will-change-[transform,left,top] shadow-sm" style="position: fixed; top: 0; left: 0; width: 32px; height: 32px; background-color: #C8102E; border-radius: 9999px; pointer-events: none; z-index: 2147483647; transform: translate(-50%, -50%); display: none;"></div>
    
    <!-- 2. Body (Medium) -->
    <div class="cursor-dot will-change-[transform,left,top]" style="position: fixed; top: 0; left: 0; width: 20px; height: 20px; background-color: rgba(200, 16, 46, 0.8); border-radius: 9999px; pointer-events: none; z-index: 2147483647; transform: translate(-50%, -50%); display: none;"></div>
    
    <!-- 3. Tail (Small) -->
    <div class="cursor-dot will-change-[transform,left,top]" style="position: fixed; top: 0; left: 0; width: 12px; height: 12px; background-color: rgba(200, 16, 46, 0.6); border-radius: 9999px; pointer-events: none; z-index: 2147483647; transform: translate(-50%, -50%); display: none;"></div>

    <style>
        /* Visibility Control for Cursor */
        @media (min-width: 640px) {
            .cursor-dot {
                display: block !important;
            }
        }

        /* Hide Default Cursor Globally */
        @media (min-width: 640px) {
            body, a, button, input, textarea, select, label, .btn, .btn-primary, .btn-secondary, [role="button"], .cursor-pointer {
                cursor: none !important;
            }
            *:hover { cursor: none !important; }
        }

        /* Hover Interaction */
        body.is-hovering .cursor-dot:nth-child(1) {
            transform: translate(-50%, -50%) scale(1.3);
            background-color: #ef4444; /* Bright Red */
            mix-blend-mode: normal;
        }


    </style>

    <script>


        // Cursor Logic
        document.addEventListener('DOMContentLoaded', () => {
            if (window.innerWidth < 640) return;

            const dots = Array.from(document.querySelectorAll('.cursor-dot'));
            
            // Start centered to avoid top-left glitch
            let mouseX = window.innerWidth / 2;
            let mouseY = window.innerHeight / 2;
            
            const positions = dots.map(() => ({ x: mouseX, y: mouseY }));
            
            // Speeds (Head fast, Tail slow)
            const speeds = [0.4, 0.25, 0.15]; 

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
            });

            function animate() {
                let targetX = mouseX;
                let targetY = mouseY;

                dots.forEach((dot, index) => {
                    let pos = positions[index];
                    
                    // Lerp towards target
                    pos.x += (targetX - pos.x) * speeds[index];
                    pos.y += (targetY - pos.y) * speeds[index];
                    
                    dot.style.left = `${pos.x}px`;
                    dot.style.top = `${pos.y}px`;

                    // Next dot follows this one
                    targetX = pos.x;
                    targetY = pos.y;
                });
                
                requestAnimationFrame(animate);
            }
            animate();

            // Interactions
            const selectors = 'a, button, input, textarea, select, [role="button"], .btn, .btn-primary, .cursor-pointer, .hover-trigger, label, tr';
            
            function attachListeners() {
                document.querySelectorAll(selectors).forEach(el => {
                    if(el.dataset.cursorAttached) return;
                    el.addEventListener('mouseenter', () => document.body.classList.add('is-hovering'));
                    el.addEventListener('mouseleave', () => document.body.classList.remove('is-hovering'));
                    el.dataset.cursorAttached = "true";
                });
            }
            attachListeners();
            new MutationObserver(() => attachListeners()).observe(document.body, { childList: true, subtree: true });

            document.addEventListener('mousedown', () => {
                dots.forEach(d => d.style.transform = "translate(-50%, -50%) scale(0.8)");
            });
            document.addEventListener('mouseup', () => {
                dots.forEach(d => d.style.transform = "translate(-50%, -50%) scale(1)");
            });
        });
    </script>
</body>
</html>
