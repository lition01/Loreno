<!-- Hero Section -->
<style>
    /* Hero Section Styles */
    .hero {
        position: relative;
        width: 100%;
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        overflow: hidden;
    }

    /* Overlay */
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(
            135deg,
            rgba(47, 39, 22, 0.75) 0%,
            rgba(126, 82, 50, 0.55) 50%,
            rgba(47, 39, 22, 0.7) 100%
        );
        z-index: 1;
    }

    /* Hero Content */
    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 900px;
        padding: 2rem;
        margin-top: 60px;
    }

    /* Tagline */
    .hero-tagline {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: 500;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: #c6baa5;
        margin-bottom: 1.5rem;
        padding: 0.5rem 1.25rem;
        border: 1px solid rgba(198, 186, 165, 0.4);
        border-radius: 2px;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeSlideUp 0.8s ease forwards;
        animation-delay: 0.2s;
    }

    /* Main Heading */
    .hero-heading {
        font-family: 'Georgia', 'Times New Roman', serif;
        font-size: clamp(2.5rem, 6vw, 5rem);
        font-weight: 400;
        color: #ffffff;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        letter-spacing: -0.02em;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeSlideUp 0.8s ease forwards;
        animation-delay: 0.4s;
    }

    .hero-heading span {
        display: block;
        font-style: italic;
        color: #c6baa5;
    }

    /* Subheading */
    .hero-subheading {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: clamp(1rem, 2vw, 1.25rem);
        font-weight: 300;
        color: rgba(255, 255, 255, 0.85);
        line-height: 1.7;
        max-width: 600px;
        margin: 0 auto 2.5rem;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeSlideUp 0.8s ease forwards;
        animation-delay: 0.6s;
    }

    /* CTA Buttons Container */
    .hero-cta {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeSlideUp 0.8s ease forwards;
        animation-delay: 0.8s;
    }

    /* Primary CTA Button */
    .hero-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 1rem 2.5rem;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 0.85rem;
        font-weight: 500;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        text-decoration: none;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .hero-btn-primary {
        background-color: #ffffff;
        color: #2f2716;
    }

    .hero-btn-primary:hover,
    .hero-btn-primary:focus {
        background-color: #b39c80;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
    }

    /* Secondary CTA Button */
    .hero-btn-secondary {
        background-color: transparent;
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.5);
    }

    .hero-btn-secondary:hover,
    .hero-btn-secondary:focus {
        background-color: rgba(255, 255, 255, 0.1);
        border-color: #ffffff;
        transform: translateY(-2px);
    }

    /* Arrow Icon */
    .hero-btn svg {
        width: 16px;
        height: 16px;
        transition: transform 0.3s ease;
    }

    .hero-btn:hover svg {
        transform: translateX(4px);
    }

    /* Scroll Indicator */
    .hero-scroll {
        position: absolute;
        bottom: 2.5rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
        opacity: 0;
        animation: fadeIn 1s ease forwards;
        animation-delay: 1.2s;
    }

    .hero-scroll-text {
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.6);
    }

    .hero-scroll-line {
        width: 1px;
        height: 50px;
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0.6), transparent);
        animation: scrollPulse 2s ease-in-out infinite;
    }

    /* Decorative Elements */
    .hero-decoration {
        position: absolute;
        z-index: 1;
        pointer-events: none;
    }

    .hero-decoration-left {
        left: 3rem;
        top: 50%;
        transform: translateY(-50%);
        writing-mode: vertical-rl;
        text-orientation: mixed;
        font-size: 0.65rem;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.3);
        opacity: 0;
        animation: fadeIn 1s ease forwards;
        animation-delay: 1s;
    }

    .hero-decoration-right {
        right: 3rem;
        top: 50%;
        transform: translateY(-50%);
        writing-mode: vertical-rl;
        text-orientation: mixed;
        font-size: 0.65rem;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.3);
        opacity: 0;
        animation: fadeIn 1s ease forwards;
        animation-delay: 1s;
    }

    /* Animations */
    @keyframes fadeSlideUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    @keyframes scrollPulse {
        0%, 100% {
            opacity: 0.6;
            transform: scaleY(1);
        }
        50% {
            opacity: 1;
            transform: scaleY(1.1);
        }
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .hero-decoration-left,
        .hero-decoration-right {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .hero {
            min-height: 90vh;
            background-attachment: scroll;
        }

        .hero-content {
            padding: 1.5rem;
            margin-top: 80px;
        }

        .hero-tagline {
            font-size: 0.7rem;
            padding: 0.4rem 1rem;
            margin-bottom: 1.25rem;
        }

        .hero-heading {
            margin-bottom: 1.25rem;
        }

        .hero-subheading {
            font-size: 1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .hero-btn {
            padding: 0.9rem 2rem;
            font-size: 0.8rem;
        }

        .hero-scroll {
            bottom: 1.5rem;
        }

        .hero-scroll-line {
            height: 35px;
        }
    }

    @media (max-width: 480px) {
        .hero {
            min-height: 85vh;
        }

        .hero-content {
            padding: 1rem;
        }

        .hero-tagline {
            font-size: 0.65rem;
            letter-spacing: 0.2em;
        }

        .hero-cta {
            flex-direction: column;
            gap: 0.75rem;
        }

        .hero-btn {
            width: 100%;
            max-width: 280px;
            padding: 1rem 1.5rem;
        }

        .hero-scroll {
            display: none;
        }
    }

    /* Reduced Motion */
    @media (prefers-reduced-motion: reduce) {
        .hero-tagline,
        .hero-heading,
        .hero-subheading,
        .hero-cta,
        .hero-scroll,
        .hero-decoration-left,
        .hero-decoration-right {
            animation: none;
            opacity: 1;
            transform: none;
        }

        .hero-scroll-line {
            animation: none;
        }

        .hero-btn:hover {
            transform: none;
        }
    }
</style>

<section class="hero" role="banner" aria-label="Welcome to FashionHub">
    <!-- Overlay -->
    <div class="hero-overlay" aria-hidden="true"></div>

    <!-- Decorative Elements -->
    <span class="hero-decoration hero-decoration-left" aria-hidden="true">New Collection 2026</span>
    <span class="hero-decoration hero-decoration-right" aria-hidden="true">Free Shipping Worldwide</span>

    <!-- Hero Content -->
    <div class="hero-content">
        <span class="hero-tagline">Spring / Summer Collection</span>
        
        <h1 class="hero-heading">
            Elevate Your
            <span>Style</span>
        </h1>
        
        <p class="hero-subheading">
            Discover timeless elegance and contemporary fashion. 
            Curated collections designed for those who appreciate quality and sophistication.
        </p>
        
        <div class="hero-cta">
            <a href="#best-seller" class="hero-btn hero-btn-primary">
                Shop Now
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
            <a href="#collections" class="hero-btn hero-btn-secondary">
                View Collections
            </a>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="hero-scroll" aria-hidden="true">
        <span class="hero-scroll-text">Scroll</span>
        <div class="hero-scroll-line"></div>
    </div>
</section>
