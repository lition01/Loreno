<?php
/**
 * Modern Minimalist Collections Section
 * Redesigned for a clean, sophisticated aesthetic.
 */
?>

<style>
    :root {
        --color-bg: #ffffff;
        --color-text-main: #1a1a1a;
        --color-text-muted: #666666;
        --color-accent-brown: #7e5232;
        --color-border: rgba(0, 0, 0, 0.05);
        --transition-base: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .collections-section {
        padding: 100px 0;
        background-color: var(--color-bg);
        overflow: hidden;
    }

    .container-wide {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Section Header */
    .collections-header {
        margin-bottom: 60px;
        max-width: 600px;
    }

    .collections-label {
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--color-text-muted);
        margin-bottom: 1rem;
        display: block;
    }

    .collections-title {
        font-size: clamp(2.5rem, 5vw, 3.5rem);
        font-weight: 700;
        line-height: 1.1;
        color: var(--color-text-main);
        letter-spacing: -0.02em;
    }

    /* Collections Grid */
    .collections-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 2rem;
    }

    /* Collection Card */
    .collection-item {
        position: relative;
        text-decoration: none;
        color: inherit;
        overflow: hidden;
        border-radius: 4px;
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .collection-item.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Layout Variations - Balanced for 2 cards */
    .collection-item.large,
    .collection-item.medium { 
        grid-column: span 6; 
        height: 600px; 
    }

    .collection-img-wrapper {
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: #f5f5f5;
        position: relative;
    }

    .collection-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 1.2s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .collection-item:hover .collection-img {
        transform: scale(1.05);
    }

    /* Card Content Overlay */
    .collection-overlay {
        position: absolute;
        inset: 0;
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        background: linear-gradient(to top, rgba(0,0,0,0.4) 0%, transparent 60%);
        transition: background 0.4s ease;
    }

    .collection-item:hover .collection-overlay {
        background: linear-gradient(to top, rgba(0,0,0,0.6) 0%, transparent 80%);
    }

    .collection-info {
        transform: translateY(10px);
        transition: transform 0.4s ease;
    }

    .collection-item:hover .collection-info {
        transform: translateY(0);
    }

    .collection-tag {
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 0.5rem;
        display: block;
    }

    .collection-name {
        font-size: 2rem;
        font-weight: 600;
        color: #ffffff;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    /* CTA Link */
    .collection-link {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        color: #ffffff;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        transition: gap 0.3s ease;
    }

    .collection-link svg {
        width: 18px;
        height: 18px;
        stroke-width: 2px;
    }

    .collection-item:hover .collection-link {
        gap: 1.25rem;
        color: #ffffff;
    }

    .collection-link::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 0;
        height: 1px;
        background: #ffffff;
        transition: width 0.3s ease;
    }

    .collection-item:hover .collection-link::after {
        width: 100%;
    }

    /* Responsive Grid */
    @media (max-width: 1024px) {
        .collection-item.large,
        .collection-item.medium,
        .collection-item.small {
            grid-column: span 6;
            height: 500px;
        }
        .collection-item.small { margin-top: 0; }
    }

    @media (max-width: 768px) {
        .collections-section { padding: 60px 0; }
        .collection-item.large,
        .collection-item.medium,
        .collection-item.small {
            grid-column: span 12;
            height: 400px;
        }
        .collection-overlay { padding: 2rem; }
        .collection-name { font-size: 1.5rem; }
    }
</style>

<section class="collections-section" id="collections">
    <div class="container-wide">
        <header class="collections-header">
            <span class="collections-label">Exclusive Selections</span>
            <h2 class="collections-title">The Seasonal Collections</h2>
        </header>

        <div class="collections-grid">
            <!-- Winter Collection Card -->
            <a href="winter-collection.php" class="collection-item large">
                <div class="collection-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=1920&auto=format&fit=crop" alt="Winter Collection" class="collection-img">
                </div>
                <div class="collection-overlay">
                    <div class="collection-info">
                        <span class="collection-tag">Autumn / Winter</span>
                        <h3 class="collection-name">Winter<br>Collection</h3>
                        <div class="collection-link">
                            Shop Now
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14m-7-7l7 7-7 7"/></svg>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Summer Collection Card -->
            <a href="summer-collection.php" class="collection-item medium">
                <div class="collection-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=1920&auto=format&fit=crop" alt="Summer Collection" class="collection-img">
                </div>
                <div class="collection-overlay">
                    <div class="collection-info">
                        <span class="collection-tag">Spring / Summer</span>
                        <h3 class="collection-name">Summer<br>Collection</h3>
                        <div class="collection-link">
                            Shop Now
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14m-7-7l7 7-7 7"/></svg>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observerOptions = {
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.collection-item').forEach(item => {
            observer.observe(item);
        });
    });
</script>
