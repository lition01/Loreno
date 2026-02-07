<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Featured Collections</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        /* ========================================
           CSS VARIABLES & RESET
           ======================================== */
        :root {
            --color-cream: #faf8f5;
            --color-sand: #c6baa5;
            --color-taupe: #b39c80;
            --color-camel: #a8845e;
            --color-coffee: #7e5232;
            --color-espresso: #2f2716;
            --color-white: #ffffff;
            
            --font-heading: 'Cormorant Garamond', Georgia, serif;
            --font-body: 'Inter', -apple-system, sans-serif;
            
            --transition-smooth: cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background: var(--color-cream);
        }

        /* ========================================
           FEATURED COLLECTIONS SECTION
           ======================================== */
        .featured-collections {
            padding: 80px 24px;
            background-color: var(--color-cream);
            font-family: var(--font-body);
        }

        .collections-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Section Header */
        .collections-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .collections-subtitle {
            font-family: var(--font-body);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--color-camel);
            margin-bottom: 12px;
        }

        .collections-title {
            font-family: var(--font-heading);
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 500;
            color: var(--color-espresso);
            margin-bottom: 16px;
            letter-spacing: -0.5px;
        }

        .collections-description {
            font-family: var(--font-body);
            font-size: 1rem;
            color: var(--color-coffee);
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Collections Grid */
        .collections-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        /* Collection Card */
        .collection-card {
            position: relative;
            height: 600px;
            border-radius: 16px;
            overflow: hidden;
            cursor: pointer;
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s var(--transition-smooth),
                        transform 0.8s var(--transition-smooth);
        }

        .collection-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .collection-card:nth-child(2) {
            transition-delay: 0.15s;
        }

        /* Collection Image */
        .collection-image-wrapper {
            position: absolute;
            inset: 0;
            overflow: hidden;
        }

        .collection-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s var(--transition-smooth);
        }

        .collection-card:hover .collection-image {
            transform: scale(1.08);
        }

        /* Overlay */
        .collection-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to top,
                rgba(47, 39, 22, 0.85) 0%,
                rgba(47, 39, 22, 0.4) 40%,
                rgba(47, 39, 22, 0.1) 70%,
                transparent 100%
            );
            transition: background 0.5s var(--transition-smooth);
        }

        .collection-card:hover .collection-overlay {
            background: linear-gradient(
                to top,
                rgba(47, 39, 22, 0.9) 0%,
                rgba(47, 39, 22, 0.5) 50%,
                rgba(47, 39, 22, 0.2) 80%,
                rgba(47, 39, 22, 0.1) 100%
            );
        }

        /* Collection Content */
        .collection-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 40px;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .collection-label {
            font-family: var(--font-body);
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--color-sand);
            margin-bottom: 12px;
            padding: 6px 14px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .collection-name {
            font-family: var(--font-heading);
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            font-weight: 500;
            color: var(--color-white);
            margin-bottom: 12px;
            letter-spacing: 0.5px;
            line-height: 1.2;
        }

        .collection-tagline {
            font-family: var(--font-body);
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 28px;
            line-height: 1.5;
            max-width: 300px;
        }

        /* Shop Now Button */
        .shop-now-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 32px;
            background: var(--color-camel);
            color: var(--color-white);
            font-family: var(--font-body);
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.4s var(--transition-smooth);
        }

        .shop-now-btn::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--color-coffee);
            transform: translateX(-100%);
            transition: transform 0.4s var(--transition-smooth);
        }

        .shop-now-btn:hover::before {
            transform: translateX(0);
        }

        .shop-now-btn span,
        .shop-now-btn svg {
            position: relative;
            z-index: 1;
        }

        .shop-now-btn svg {
            width: 16px;
            height: 16px;
            transition: transform 0.3s var(--transition-smooth);
        }

        .shop-now-btn:hover svg {
            transform: translateX(4px);
        }

        .shop-now-btn:hover {
            box-shadow: 0 8px 30px rgba(126, 82, 50, 0.4);
            transform: translateY(-2px);
        }

        /* Decorative Corner Elements */
        .collection-corner {
            position: absolute;
            width: 60px;
            height: 60px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            opacity: 0;
            transition: all 0.5s var(--transition-smooth);
        }

        .collection-corner--top-left {
            top: 20px;
            left: 20px;
            border-right: none;
            border-bottom: none;
        }

        .collection-corner--top-right {
            top: 20px;
            right: 20px;
            border-left: none;
            border-bottom: none;
        }

        .collection-corner--bottom-left {
            bottom: 20px;
            left: 20px;
            border-right: none;
            border-top: none;
        }

        .collection-corner--bottom-right {
            bottom: 20px;
            right: 20px;
            border-left: none;
            border-top: none;
        }

        .collection-card:hover .collection-corner {
            opacity: 1;
        }

        .collection-card:hover .collection-corner--top-left {
            transform: translate(-5px, -5px);
        }

        .collection-card:hover .collection-corner--top-right {
            transform: translate(5px, -5px);
        }

        .collection-card:hover .collection-corner--bottom-left {
            transform: translate(-5px, 5px);
        }

        .collection-card:hover .collection-corner--bottom-right {
            transform: translate(5px, 5px);
        }

        /* Season Icon */
        .season-icon {
            position: absolute;
            top: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--color-white);
            opacity: 0;
            transform: scale(0.8) rotate(-10deg);
            transition: all 0.5s var(--transition-smooth);
        }

        .season-icon svg {
            width: 24px;
            height: 24px;
        }

        .collection-card:hover .season-icon {
            opacity: 1;
            transform: scale(1) rotate(0deg);
        }

        /* ========================================
           RESPONSIVE STYLES
           ======================================== */
        @media (max-width: 1024px) {
            .featured-collections {
                padding: 60px 20px;
            }

            .collection-card {
                height: 500px;
            }

            .collection-content {
                padding: 30px;
            }
        }

        @media (max-width: 768px) {
            .collections-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .collection-card {
                height: 450px;
            }

            .collection-card:nth-child(2) {
                transition-delay: 0s;
            }

            .collections-header {
                margin-bottom: 40px;
            }

            .shop-now-btn {
                padding: 12px 28px;
                font-size: 0.75rem;
            }

            .collection-corner {
                width: 40px;
                height: 40px;
            }

            .season-icon {
                width: 44px;
                height: 44px;
                top: 20px;
                right: 20px;
            }

            .season-icon svg {
                width: 20px;
                height: 20px;
            }
        }

        @media (max-width: 480px) {
            .featured-collections {
                padding: 50px 16px;
            }

            .collection-card {
                height: 400px;
            }

            .collection-content {
                padding: 24px;
            }

            .collection-name {
                font-size: 1.5rem;
            }

            .collection-tagline {
                font-size: 0.875rem;
                margin-bottom: 20px;
            }

            .collection-label {
                font-size: 0.65rem;
                padding: 5px 12px;
            }
        }
    </style>
</head>
<body>

<section class="featured-collections" aria-label="Featured Collections" id="collections">
    <div class="collections-container">
        <header class="collections-header">
            <p class="collections-subtitle">Curated For You</p>
            <h2 class="collections-title">Featured Collections</h2>
            <p class="collections-description">Explore our carefully curated seasonal collections, designed to elevate your wardrobe with timeless style.</p>
        </header>

        <div class="collections-grid" id="collectionsGrid">
            <!-- Collections will be dynamically generated here -->
        </div>
    </div>
</section>

<script>
    // Collection data
    const collections = [
        {
            id: 'winter',
            name: 'Winter Collection',
            tagline: 'Embrace the cold with timeless elegance',
            image: 'https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=1920&auto=format&fit=crop',
            link: 'winter-collection.php'
        },
        {
            id: 'summer',
            name: 'Summer Collection',
            tagline: 'Light fabrics for sun-kissed days',
            image: 'https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=1920&auto=format&fit=crop',
            link: 'summer-collection.php'
        }
    ];

    // Render collections
    function renderCollections() {
        const grid = document.getElementById('collectionsGrid');
        
        grid.innerHTML = collections.map(collection => {
            const isWinter = collection.id === 'winter';
            const seasonLabel = isWinter ? 'Autumn / Winter' : 'Spring / Summer';
            const seasonIcon = isWinter ? `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m0-18l-3 3m3-3l3 3m-3 15l-3-3m3 3l3-3M3 12h18M3 12l3-3m-3 3l3 3m15-3l-3-3m3 3l-3 3M7.5 7.5l9 9m0-9l-9 9" />
                </svg>
            ` : `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                </svg>
            `;

            return `
                <article class="collection-card" data-collection="${collection.id}">
                    <!-- Corner Decorations -->
                    <span class="collection-corner collection-corner--top-left"></span>
                    <span class="collection-corner collection-corner--top-right"></span>
                    <span class="collection-corner collection-corner--bottom-left"></span>
                    <span class="collection-corner collection-corner--bottom-right"></span>

                    <!-- Season Icon -->
                    <div class="season-icon">
                        ${seasonIcon}
                    </div>

                    <!-- Image -->
                    <div class="collection-image-wrapper">
                        <img 
                            src="${collection.image}" 
                            alt="${collection.name}"
                            class="collection-image"
                            loading="lazy"
                        >
                    </div>

                    <!-- Overlay -->
                    <div class="collection-overlay"></div>

                    <!-- Content -->
                    <div class="collection-content">
                        <span class="collection-label">${seasonLabel}</span>
                        <h3 class="collection-name">${collection.name}</h3>
                        <p class="collection-tagline">${collection.tagline}</p>
                        <a href="${collection.link}" class="shop-now-btn">
                            <span>Shop Now</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </article>
            `;
        }).join('');
    }

    // ========================================
    // SCROLL ANIMATION - INTERSECTION OBSERVER
    // ========================================
    document.addEventListener('DOMContentLoaded', function() {
        // Render collections first
        renderCollections();

        const collectionCards = document.querySelectorAll('.collection-card');

        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -100px 0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        collectionCards.forEach(card => {
            observer.observe(card);
        });

        // ========================================
        // PARALLAX EFFECT ON MOUSE MOVE
        // ========================================
        collectionCards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const deltaX = (x - centerX) / centerX;
                const deltaY = (y - centerY) / centerY;
                
                const image = card.querySelector('.collection-image');
                image.style.transform = `scale(1.08) translate(${deltaX * -5}px, ${deltaY * -5}px)`;
            });

            card.addEventListener('mouseleave', () => {
                const image = card.querySelector('.collection-image');
                image.style.transform = 'scale(1)';
            });
        });

        // ========================================
        // BUTTON RIPPLE EFFECT
        // ========================================
        const buttons = document.querySelectorAll('.shop-now-btn');
        
        buttons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                const ripple = document.createElement('span');
                ripple.style.cssText = `
                    position: absolute;
                    background: rgba(255, 255, 255, 0.3);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;
                
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
                
                this.appendChild(ripple);
                
                setTimeout(() => ripple.remove(), 600);
                
                // Navigate after animation
                const href = this.getAttribute('href');
                setTimeout(() => {
                    window.location.href = href;
                }, 300);
            });
        });

        // Add ripple keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    });
</script>

</body>
</html>