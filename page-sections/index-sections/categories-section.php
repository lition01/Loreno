<?php
// Categories Section - Standalone PHP File
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop by Category</title>
    
    <style>
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f8f6f3;
            color: #2f2716;
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Categories Section */
        .categories-section {
            width: 100%;
            padding: 5rem 1.5rem;
        }

        .categories-wrapper {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Header - Centered */
        .categories-header {
            text-align: center;
            margin-bottom: 3.5rem;
        }

        .categories-tagline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #7e5232;
            margin-bottom: 1rem;
        }

        .categories-tagline::before,
        .categories-tagline::after {
            content: '';
            width: 3rem;
            height: 1px;
            background: #7e5232;
        }

        .categories-heading {
            font-family: 'Georgia', 'Times New Roman', serif;
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 400;
            color: #2f2716;
            line-height: 1.1;
            letter-spacing: -0.02em;
            margin-bottom: 1rem;
        }

        .categories-subheading {
            font-size: 1.0625rem;
            font-weight: 300;
            color: rgba(47, 39, 22, 0.65);
            line-height: 1.7;
            max-width: 550px;
            margin: 0 auto;
        }

        /* Grid Layout - Men Large Left, Others Stacked Right */
        .categories-grid {
            display: flex;
            gap: 1rem;
            height: 500px;
        }

        /* Men's Card - Takes 55% width */
        .category-card--men {
            flex: 0 0 55%;
            position: relative;
            overflow: hidden;
            border-radius: 1.25rem;
            cursor: pointer;
            text-decoration: none;
            display: block;
        }

        /* Right Column - 3 stacked cards */
        .categories-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .category-card--small {
            flex: 1;
            position: relative;
            overflow: hidden;
            border-radius: 1.25rem;
            cursor: pointer;
            text-decoration: none;
            display: block;
        }

        /* Image Wrapper */
        .category-image-wrapper {
            position: absolute;
            inset: 0;
            overflow: hidden;
        }

        .category-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .category-card--men:hover .category-image,
        .category-card--small:hover .category-image {
            transform: scale(1.05);
        }

        /* Overlay */
        .category-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                180deg,
                transparent 40%,
                rgba(47, 39, 22, 0.8) 100%
            );
            transition: background 0.4s ease;
        }

        .category-card--men:hover .category-overlay,
        .category-card--small:hover .category-overlay {
            background: linear-gradient(
                180deg,
                transparent 30%,
                rgba(47, 39, 22, 0.9) 100%
            );
        }

        /* Content */
        .category-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            z-index: 2;
        }

        .category-card--men .category-content {
            padding: 2.5rem;
            gap: 0.6rem;
        }

        .category-badge {
            display: inline-flex;
            align-self: flex-start;
            padding: 0.35rem 0.875rem;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            border-radius: 100px;
            font-size: 0.6rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.95);
        }

        .category-card--men .category-badge {
            font-size: 0.7rem;
        }

        .category-name {
            font-family: 'Georgia', 'Times New Roman', serif;
            font-size: 1.25rem;
            font-weight: 400;
            color: #ffffff;
            letter-spacing: -0.01em;
        }

        .category-card--men .category-name {
            font-size: 2.75rem;
        }

        .category-description {
            font-size: 1rem;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.5;
            max-width: 85%;
            display: none;
        }

        .category-card--men .category-description {
            display: block;
        }

        /* CTA */
        .category-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.25rem;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: #ffffff;
            opacity: 0;
            transform: translateY(8px);
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .category-card--men .category-cta {
            font-size: 0.85rem;
        }

        .category-card--men:hover .category-cta,
        .category-card--small:hover .category-cta {
            opacity: 1;
            transform: translateY(0);
        }

        .category-cta-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 1.5rem;
            height: 1.5rem;
            background: #7e5232;
            border-radius: 50%;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .category-card--men .category-cta-icon {
            width: 1.75rem;
            height: 1.75rem;
        }

        .category-card--men:hover .category-cta-icon,
        .category-card--small:hover .category-cta-icon {
            transform: translateX(3px);
            background: #ffffff;
        }

        .category-cta-icon svg {
            width: 10px;
            height: 10px;
            stroke: #ffffff;
            transition: stroke 0.3s ease;
        }

        .category-card--men:hover .category-cta-icon svg,
        .category-card--small:hover .category-cta-icon svg {
            stroke: #7e5232;
        }

        /* Item Count Badge */
        .category-count {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.35rem 0.75rem;
            background: #ffffff;
            border-radius: 100px;
            font-size: 0.65rem;
            font-weight: 600;
            color: #2f2716;
            box-shadow: 0 4px 12px rgba(47, 39, 22, 0.1);
            z-index: 3;
        }

        .category-card--men .category-count {
            top: 1.5rem;
            right: 1.5rem;
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
        }

        /* Tablet */
        @media (max-width: 1024px) {
            .categories-section {
                padding: 4rem 1.25rem;
            }

            .categories-grid {
                height: auto;
                flex-direction: column;
            }

            .category-card--men {
                flex: none;
                height: 450px;
            }

            .categories-right {
                flex-direction: row;
                height: 220px;
            }

            .category-card--men .category-name {
                font-size: 2.25rem;
            }

            .category-name {
                font-size: 1.125rem;
            }

            .category-card--men .category-content {
                padding: 2rem;
            }

            .category-content {
                padding: 1.25rem;
            }
        }

        /* Mobile */
        @media (max-width: 640px) {
            .categories-section {
                padding: 3rem 1rem;
            }

            .categories-header {
                margin-bottom: 2.5rem;
            }

            .categories-tagline::before,
            .categories-tagline::after {
                width: 2rem;
            }

            .categories-subheading {
                font-size: 0.9375rem;
            }

            .categories-grid {
                gap: 0.75rem;
            }

            .category-card--men {
                height: 380px;
            }

            .categories-right {
                flex-direction: column;
                height: auto;
            }

            .category-card--small {
                height: 200px;
            }

            .category-card--men .category-name {
                font-size: 2rem;
            }

            .category-name {
                font-size: 1.25rem;
            }

            .category-card--men .category-content {
                padding: 1.5rem;
            }

            .category-content {
                padding: 1.25rem;
            }

            .category-badge {
                font-size: 0.55rem;
                padding: 0.3rem 0.65rem;
            }

            .category-count {
                font-size: 0.6rem;
                padding: 0.3rem 0.6rem;
            }

            .category-cta {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Small Mobile */
        @media (max-width: 380px) {
            .categories-section {
                padding: 2.5rem 0.875rem;
            }

            .category-card--men {
                height: 320px;
            }

            .category-card--small {
                height: 180px;
            }

            .category-card--men .category-name {
                font-size: 1.75rem;
            }

            .category-name {
                font-size: 1.125rem;
            }
        }

        /* Reduced Motion */
        @media (prefers-reduced-motion: reduce) {
            .category-image,
            .category-cta,
            .category-cta-icon {
                transition: none;
            }

            .category-card--men:hover .category-image,
            .category-card--small:hover .category-image {
                transform: none;
            }

            .category-cta {
                opacity: 1;
                transform: none;
            }

            .category-card--men:hover .category-cta-icon,
            .category-card--small:hover .category-cta-icon {
                transform: none;
            }
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f8f6f3;
        }

        ::-webkit-scrollbar-thumb {
            background: #c6baa5;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #b39c80;
        }

        * {
            scrollbar-width: thin;
            scrollbar-color: #c6baa5 #f8f6f3;
        }
    </style>
</head>
<body>
    <section class="categories-section">
        <div class="categories-wrapper">
            <!-- Section Header -->
            <header class="categories-header">
                <span class="categories-tagline">Collections</span>
                <h2 class="categories-heading">Shop by Category</h2>
                <p class="categories-subheading">
                    Discover curated selections across our premium product ranges, designed for every style and occasion.
                </p>
            </header>

            <!-- Grid: Men Large Left, Others Stacked Right -->
            <div class="categories-grid">
                <!-- Men's Fashion - Large Left Card -->
                <a href="men-products.php" class="category-card--men" data-category="men">
                    <div class="category-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1617127365659-c47fa864d8bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                             alt="collections-sections/men-sections/men-section.php" 
                             class="category-image"
                             loading="eager">
                        <div class="category-overlay"></div>
                    </div>
                    <span class="category-count">248 Items</span>
                    <div class="category-content">
                        <span class="category-badge">New Arrivals</span>
                        <h3 class="category-name">Men</h3>
                        <p class="category-description">Sophisticated suits, shirts, and essentials for the distinguished gentleman</p>
                        <div class="category-cta">
                            <span>Shop Collection</span>
                            <div class="category-cta-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Right Column: Women, Kids, Accessories -->
                <div class="categories-right">
                    <!-- Women's Fashion -->
                    <a href="women-products.php" class="category-card--small" data-category="women">
                        <div class="category-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                 alt="Women's Fashion Collection" 
                                 class="category-image"
                                 loading="lazy">
                            <div class="category-overlay"></div>
                        </div>
                        <span class="category-count">312 Items</span>
                        <div class="category-content">
                            <span class="category-badge">Trending</span>
                            <h3 class="category-name">Women</h3>
                            <div class="category-cta">
                                <span>Shop Collection</span>
                                <div class="category-cta-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Kids Fashion -->
                    <a href="/category/kids" class="category-card--small" data-category="kids">
                        <div class="category-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1434389677669-e08b4cac3105?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                 alt="Kids Fashion Collection" 
                                 class="category-image"
                                 loading="lazy">
                            <div class="category-overlay"></div>
                        </div>
                        <span class="category-count">156 Items</span>
                        <div class="category-content">
                            <span class="category-badge">Best Sellers</span>
                            <h3 class="category-name">Kids</h3>
                            <div class="category-cta">
                                <span>Shop Collection</span>
                                <div class="category-cta-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Accessories -->
                    <a href="/category/accessories" class="category-card--small" data-category="accessories">
                        <div class="category-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1606760227091-3dd870d97f1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                 alt="Accessories Collection" 
                                 class="category-image"
                                 loading="lazy">
                            <div class="category-overlay"></div>
                        </div>
                        <span class="category-count">89 Items</span>
                        <div class="category-content">
                            <span class="category-badge">Limited Edition</span>
                            <h3 class="category-name">Accessories</h3>
                            <div class="category-cta">
                                <span>Shop Collection</span>
                                <div class="category-cta-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryCards = document.querySelectorAll('[data-category]');
            categoryCards.forEach(card => {
                card.addEventListener('click', function(e) {
                    const categoryName = this.dataset.category;
                });
            });

            const categoryImages = document.querySelectorAll('.category-image');
            categoryImages.forEach(img => { 
                if (img.complete) {
                    img.classList.add('loaded');
                } else {
                    img.addEventListener('load', function() {
                        this.classList.add('loaded');
                    });
                }
            });
        });
    </script>
</body>
</html>
