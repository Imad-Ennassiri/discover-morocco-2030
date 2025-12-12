import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

    // --- 1. NAVBAR SCROLL EFFECT ---
    const navbar = document.getElementById('navbar');
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    // Store initial classes to restore them when scrolling back up
    let initialNavClasses = [];
    if (navbar) {
        initialNavClasses = Array.from(navbar.classList);
    }

    const scrollClasses = ['bg-white/95', 'backdrop-blur-md', 'shadow-sm', 'text-stone-900', 'py-4'];
    const textWhiteClasses = ['text-white'];

    function updateNavbar() {
        if (!navbar) return;

        if (window.scrollY > 50) {
            // SCROLLED DOWN
            navbar.classList.add(...scrollClasses);
            navbar.classList.add('scrolled'); // Custom class for CSS targeting
            // Remove classes that might conflict (like bg-black or text-white)
            navbar.classList.remove('bg-gradient-to-b', 'from-black/80', 'to-transparent', 'bg-black/95', 'py-6', ...textWhiteClasses);
        } else {
            // TOP
            navbar.classList.remove(...scrollClasses);
            navbar.classList.remove('scrolled');

            // Restore initial classes (this handles both Home's gradient and Contact's black bg)
            // We only add back the ones that were present initially
            navbar.classList.add(...initialNavClasses);

            // Safety: explicitly ensure text-white is back if it was there
            if (initialNavClasses.includes('text-white')) {
                navbar.classList.add('text-white');
            }
        }
    }

    window.addEventListener('scroll', updateNavbar);
    // Init on load in case we start down
    updateNavbar();




    // --- 2. HERO SLIDER LOGIC ---
    const slides = document.querySelectorAll('.hero-slide');
    const indicators = document.querySelectorAll('.hero-indicator');
    const slideDuration = 5000;
    let currentSlide = 0;
    let slideInterval;

    const activateSlide = (index) => {
        // Reset all
        slides.forEach(s => {
            s.classList.remove('active');
            s.classList.add('opacity-0', 'z-0');
            s.classList.remove('opacity-100', 'z-10');

            // Reset Ken Burns
            const img = s.querySelector('img');
            if (img) {
                img.style.animation = 'none';
                img.offsetHeight; /* reflow */
                img.style.animation = '';
            }

            // Reset Text
            const texts = s.querySelectorAll('.slide-text-enter');
            texts.forEach(t => t.classList.remove('visible'));
        });

        indicators.forEach(ind => ind.classList.remove('active'));

        // Activate new
        const activeSlide = slides[index];
        activeSlide.classList.remove('opacity-0', 'z-0');
        activeSlide.classList.add('opacity-100', 'z-10', 'active');

        // Trigger Text
        setTimeout(() => {
            const texts = activeSlide.querySelectorAll('.slide-text-enter');
            texts.forEach((t, i) => {
                setTimeout(() => t.classList.add('visible'), i * 200); // Stagger
            });
        }, 500);

        // Activate Indicator
        const activeInd = document.querySelector(`.hero-indicator[data-index="${index}"]`);
        if (activeInd) activeInd.classList.add('active');

        currentSlide = index;
    };

    const nextSlide = () => {
        let next = currentSlide + 1;
        if (next >= slides.length) next = 0;
        activateSlide(next);
    };

    const startSlider = () => {
        if (slideInterval) clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, slideDuration);
    };

    if (slides.length > 0) {
        activateSlide(0);
        startSlider();

        // Click events
        document.getElementById('hero-prev')?.addEventListener('click', () => {
            clearInterval(slideInterval);
            let prev = currentSlide - 1;
            if (prev < 0) prev = slides.length - 1;
            activateSlide(prev);
            startSlider();
        });

        document.getElementById('hero-next')?.addEventListener('click', () => {
            clearInterval(slideInterval);
            nextSlide();
            startSlider();
        });

        indicators.forEach(ind => {
            ind.addEventListener('click', (e) => {
                clearInterval(slideInterval);
                const idx = parseInt(e.currentTarget.dataset.index);
                activateSlide(idx);
                startSlider();
            });
        });
    }

    // --- 3. SCROLL OBSERVER ---
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.remove('opacity-0', 'translate-y-10');
                entry.target.classList.add('animate-fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));

    // --- 4. HORIZONTAL SCROLL (Trending) ---
    const scrollContainer = document.getElementById('trending-slider');
    if (scrollContainer) {
        document.getElementById('slide-next')?.addEventListener('click', () => {
            scrollContainer.scrollBy({ left: 400, behavior: 'smooth' });
        });
        document.getElementById('slide-prev')?.addEventListener('click', () => {
            scrollContainer.scrollBy({ left: -400, behavior: 'smooth' });
        });
    }

    // --- 5. CARD STACK SLIDER (Did You Know) ---
    function initCardStack() {
        const stackContainer = document.querySelector('.card-stack-container');
        if (!stackContainer) return;

        // Prevent double init
        if (stackContainer.dataset.init === "true") return;
        stackContainer.dataset.init = "true";

        console.log("Initializing Card Stack Slider...");

        const cards = Array.from(stackContainer.querySelectorAll('.stack-card'));
        const nextBtn = document.getElementById('stack-next');
        const prevBtn = document.getElementById('stack-prev');

        let currentIndex = 0;
        let isAnimating = false;

        // ignoreIndex: optional index of a card to skip (e.g., the one currently flying away)
        function updateStack(ignoreIndex = -1) {
            cards.forEach((card, index) => {
                if (index === ignoreIndex) return;

                let offset = (index - currentIndex + cards.length) % cards.length;

                // Reset classes
                card.classList.remove('active', 'next', 'next-2', 'leaving');

                // Reset styles
                card.style.transform = '';
                card.style.opacity = '';
                card.style.zIndex = '';
                card.style.filter = '';
                card.style.visibility = '';
                card.style.transition = ''; // Ensure transition is active

                if (offset === 0) {
                    card.classList.add('active');
                    card.style.zIndex = '30';
                } else if (offset === 1) {
                    card.classList.add('next');
                    card.style.zIndex = '20';
                } else if (offset === 2) {
                    card.classList.add('next-2');
                    card.style.zIndex = '10';
                } else {
                    // Hide others behind
                    card.style.opacity = '0';
                    card.style.zIndex = '0';
                    card.style.transform = 'scale(0.8) translateY(40px)';
                }
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (isAnimating) return;
                isAnimating = true;

                const leavingIndex = currentIndex;
                const leavingCard = cards[leavingIndex];

                // 1. Trigger "Leave" Animation
                leavingCard.classList.add('leaving');

                // 2. Update Index
                currentIndex = (currentIndex + 1) % cards.length;

                // 3. Update others (ignoring the leaving one)
                updateStack(leavingIndex);

                // 4. Cleanup
                setTimeout(() => {
                    // Reset the leaving card
                    leavingCard.style.transition = 'none'; // Disable transition for instant reset
                    leavingCard.classList.remove('leaving');

                    // Force reflow
                    void leavingCard.offsetWidth;

                    leavingCard.style.transition = ''; // Re-enable

                    // Place it correctly in the stack (now at back)
                    updateStack();

                    isAnimating = false;
                }, 600);
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (isAnimating) return;
                isAnimating = true;

                currentIndex = (currentIndex - 1 + cards.length) % cards.length;

                // For reverse, just update immediately. The new active card will slide/fade in.
                updateStack();

                setTimeout(() => {
                    isAnimating = false;
                }, 600);
            });
        }

        // Initial set
        updateStack();
    }

    // Attempt init immediately
    initCardStack();
    setTimeout(initCardStack, 200);
});
