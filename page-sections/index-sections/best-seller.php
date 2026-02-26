<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Arrivals</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        /* ═══════════════════════════════════════
           CSS VARIABLES & RESET
        ═══════════════════════════════════════ */
        :root {
            --color-cream:    #faf8f5;
            --color-sand:     #c6baa5;
            --color-taupe:    #b39c80;
            --color-camel:    #a8845e;
            --color-coffee:   #7e5232;
            --color-espresso: #2f2716;
            --color-white:    #ffffff;

            --font-display: 'Cormorant Garamond', Georgia, serif;
            --font-body:    'Inter', -apple-system, sans-serif;

            --shadow-sm:    0 2px 8px  rgba(47,39,22,.06);
            --shadow-md:    0 8px 24px rgba(47,39,22,.10);
            --shadow-lg:    0 16px 48px rgba(47,39,22,.15);

            --ease-smooth: cubic-bezier(0.4, 0, 0.2, 1);
            --ease-bounce: cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: var(--font-body);
            background: var(--color-cream);
            color: var(--color-espresso);
        }

        /* ═══════════════════════════════════════
           SECTION WRAPPER
        ═══════════════════════════════════════ */
        .new-arrivals-section {
            padding: 80px 24px;
            background: linear-gradient(180deg, var(--color-cream) 0%, var(--color-white) 100%);
            position: relative;
            overflow: hidden;
        }

        .new-arrivals-section::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--color-sand), transparent);
        }

        .new-arrivals-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* ═══════════════════════════════════════
           SECTION HEADER
        ═══════════════════════════════════════ */
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: .75rem;
            font-weight: 600;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--color-camel);
            margin-bottom: 16px;
        }

        .section-label::before,
        .section-label::after {
            content: '';
            width: 40px;
            height: 1px;
        }
        .section-label::before { background: linear-gradient(90deg, transparent, var(--color-camel)); }
        .section-label::after  { background: linear-gradient(90deg, var(--color-camel), transparent); }

        .section-title {
            font-family: var(--font-display);
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 500;
            color: var(--color-espresso);
            margin-bottom: 16px;
            letter-spacing: -.5px;
        }

        .section-subtitle {
            font-size: 1rem;
            color: var(--color-coffee);
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* ═══════════════════════════════════════
           CAROUSEL
        ═══════════════════════════════════════ */
        .carousel-wrapper {
            position: relative;
            overflow: hidden;
        }

        .carousel-track {
            display: flex;
            gap: 24px;
            transition: transform .5s var(--ease-smooth);
            will-change: transform;
        }

        /* ═══════════════════════════════════════
           PRODUCT CARD
        ═══════════════════════════════════════ */
        .product-card {
            flex: 0 0 calc(25% - 18px);
            min-width: calc(25% - 18px);
            position: relative;
            background: var(--color-white);
            border-radius: 16px;
            overflow: visible;
            box-shadow: var(--shadow-sm);
            transition: box-shadow .4s var(--ease-smooth), transform .4s var(--ease-smooth);
        }

        .product-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-4px);
        }

        /* Image wrapper */
        .product-image-wrapper {
            position: relative;
            aspect-ratio: 3/4;
            overflow: hidden;
            background: linear-gradient(135deg, #f5f2ed 0%, #ebe7e0 100%);
            border-radius: 16px 16px 0 0;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .6s var(--ease-smooth);
            display: block;
        }

        .product-card:hover .product-image {
            transform: scale(1.04);
        }

        /* Badge */
        .product-badge {
            position: absolute;
            top: 16px; left: 16px;
            padding: 6px 14px;
            background: var(--color-espresso);
            color: var(--color-white);
            font-size: .65rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            border-radius: 4px;
            z-index: 2;
            pointer-events: none;
        }

        /* Wishlist */
        .wishlist-btn {
            position: absolute;
            top: 16px; right: 16px;
            width: 40px; height: 40px;
            background: var(--color-white);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity .4s var(--ease-smooth), transform .4s var(--ease-smooth), background .2s;
            box-shadow: var(--shadow-md);
            z-index: 2;
        }

        .product-card:hover .wishlist-btn { opacity: 1; transform: translateY(0); }

        .wishlist-btn:hover { background: var(--color-coffee); transform: scale(1.1); }

        .wishlist-btn svg {
            width: 18px; height: 18px;
            color: var(--color-espresso);
            transition: color .2s, fill .2s;
        }

        .wishlist-btn:hover svg          { color: var(--color-white); }
        .wishlist-btn.active svg         { fill: var(--color-coffee); color: var(--color-coffee); }
        .wishlist-btn.active:hover svg   { fill: var(--color-white);  color: var(--color-white); }

        /* Quick-action overlay */
        .quick-actions {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 20px;
            background: linear-gradient(to top, rgba(47,39,22,.85) 0%, transparent 100%);
            display: flex;
            justify-content: center;
            gap: 12px;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity .3s, transform .3s;
            z-index: 3;
        }

        .product-card:hover .quick-actions { opacity: 1; transform: translateY(0); }

        .action-btn {
            width: 44px; height: 44px;
            background: var(--color-white);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .2s, transform .5s var(--ease-bounce);
        }

        .action-btn:nth-child(1) { transition-delay: .05s; }
        .action-btn:nth-child(2) { transition-delay: .10s; }
        .action-btn:nth-child(3) { transition-delay: .15s; }

        .action-btn:hover {
            background: var(--color-coffee);
        }

        .action-btn svg {
            width: 18px; height: 18px;
            color: var(--color-espresso);
            transition: color .2s;
        }

        .action-btn:hover svg { color: var(--color-white); }

        /* Product info */
        .product-info { padding: 20px; }

        .product-name {
            font-size: .95rem;
            font-weight: 500;
            color: var(--color-espresso);
            margin-bottom: 8px;
            line-height: 1.4;
            transition: color .2s;
        }

        .product-card:hover .product-name { color: var(--color-coffee); }

        .product-price {
            font-family: var(--font-display);
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--color-coffee);
        }

        /* ═══════════════════════════════════════
           QUICK-ADD POPUP
        ═══════════════════════════════════════ */
        .quick-add-popup {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            background: rgba(255,255,255,.98);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 12px 12px 0 0;
            padding: 14px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: opacity .35s var(--ease-smooth),
                        visibility .35s var(--ease-smooth),
                        transform .35s var(--ease-smooth);
            z-index: 50;
            display: flex;
            flex-direction: column;
            max-height: 65%;
            overflow-y: auto;
        }

        .quick-add-popup.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Hide overlays when popup is open */
        .product-image-wrapper:has(.quick-add-popup.active) .quick-actions,
        .product-image-wrapper:has(.quick-add-popup.active) .wishlist-btn {
            opacity: 0 !important;
            pointer-events: none;
        }

        .popup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--color-sand);
        }

        .popup-header h4 {
            font-family: var(--font-display);
            font-size: .9rem;
            font-weight: 600;
            color: var(--color-espresso);
        }

        .popup-close {
            width: 24px; height: 24px;
            border-radius: 50%;
            background: var(--color-cream);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-espresso);
            transition: background .2s, color .2s;
        }

        .popup-close:hover { background: var(--color-coffee); color: var(--color-white); }
        .popup-close svg   { width: 12px; height: 12px; }

        .popup-option-group { margin-bottom: 8px; }

        .popup-option-label {
            display: block;
            font-size: .6rem;
            font-weight: 600;
            color: var(--color-espresso);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        /* Colour swatches */
        .popup-colors { display: flex; gap: 6px; flex-wrap: wrap; }

        .popup-color-btn {
            width: 20px; height: 20px;
            border-radius: 50%;
            border: 1.5px solid transparent;
            cursor: pointer;
            transition: transform .2s;
        }

        .popup-color-btn:hover { transform: scale(1.15); }

        .popup-color-btn.selected {
            border-color: var(--color-espresso);
            box-shadow: 0 0 0 1px var(--color-white), 0 0 0 2px var(--color-coffee);
        }

        /* Sizes */
        .popup-sizes { display: flex; flex-wrap: wrap; gap: 4px; }

        .popup-size-btn {
            min-width: 28px;
            padding: 4px 6px;
            border: 1px solid var(--color-sand);
            border-radius: 4px;
            background: var(--color-white);
            cursor: pointer;
            font-family: var(--font-body);
            font-size: .6rem;
            font-weight: 500;
            color: var(--color-espresso);
            transition: border-color .2s, background .2s, color .2s;
            text-align: center;
        }

        .popup-size-btn:hover { border-color: var(--color-taupe); background: var(--color-cream); }
        .popup-size-btn.selected { background: var(--color-coffee); border-color: var(--color-coffee); color: var(--color-white); }

        /* Quantity */
        .popup-quantity {
            display: flex;
            align-items: center;
            gap: 1px;
            border: 1px solid var(--color-sand);
            border-radius: 4px;
            width: fit-content;
            overflow: hidden;
        }

        .qty-btn {
            width: 24px; height: 24px;
            border: none;
            background: var(--color-cream);
            cursor: pointer;
            font-size: .8rem;
            color: var(--color-espresso);
            transition: background .2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover { background: var(--color-sand); }

        .qty-value {
            width: 28px;
            text-align: center;
            font-size: .7rem;
            font-weight: 600;
            color: var(--color-espresso);
            background: var(--color-white);
            line-height: 24px;
        }

        /* Add to cart */
        .popup-add-btn {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            background: var(--color-coffee);
            color: var(--color-white);
            border: none;
            border-radius: 6px;
            font-family: var(--font-body);
            font-size: .65rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background .4s var(--ease-smooth), transform .4s var(--ease-smooth), box-shadow .4s;
        }

        .popup-add-btn:hover {
            background: var(--color-espresso);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(47,39,22,.3);
        }

        /* Success state */
        .popup-success {
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px 0;
            animation: fadeInUp .4s ease;
        }

        .popup-success.show { display: flex; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .popup-form.hide { display: none; }

        .success-icon {
            width: 56px; height: 56px;
            background: #d4edda;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            color: #28a745;
        }

        .success-icon svg { width: 28px; height: 28px; }

        .popup-success h5 {
            font-family: var(--font-display);
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--color-espresso);
            margin-bottom: 6px;
        }

        .popup-success p { font-size: .85rem; color: var(--color-coffee); }

        /* ═══════════════════════════════════════
           CAROUSEL NAVIGATION
        ═══════════════════════════════════════ */
        .carousel-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 24px;
            margin-top: 48px;
        }

        .nav-btn {
            width: 52px; height: 52px;
            border-radius: 50%;
            background: var(--color-white);
            border: 2px solid var(--color-sand);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .4s var(--ease-smooth), border-color .4s, color .4s, transform .4s;
            color: var(--color-espresso);
        }

        .nav-btn:hover:not(:disabled) {
            background: var(--color-coffee);
            border-color: var(--color-coffee);
            color: var(--color-white);
            transform: scale(1.05);
        }

        .nav-btn:disabled { opacity: .4; cursor: not-allowed; }
        .nav-btn svg { width: 20px; height: 20px; }

        /* Dots */
        .pagination-dots { display: flex; gap: 12px; }

        .dot {
            width: 10px; height: 10px;
            border-radius: 50%;
            background: var(--color-sand);
            border: none;
            cursor: pointer;
            transition: background .4s var(--ease-smooth), width .4s var(--ease-smooth), border-radius .4s;
        }

        .dot:hover { background: var(--color-taupe); }

        .dot.active {
            background: var(--color-coffee);
            width: 28px;
            border-radius: 5px;
        }

        /* ═══════════════════════════════════════
           VIEW ALL
        ═══════════════════════════════════════ */
        .view-all-wrapper { text-align: center; margin-top: 48px; }

        .view-all-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 36px;
            background: transparent;
            border: 2px solid var(--color-espresso);
            color: var(--color-espresso);
            font-family: var(--font-body);
            font-size: .85rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 50px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: color .4s var(--ease-smooth);
        }

        .view-all-btn::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 0; height: 100%;
            background: var(--color-espresso);
            transition: width .4s var(--ease-smooth);
            z-index: -1;
        }

        .view-all-btn:hover { color: var(--color-white); }
        .view-all-btn:hover::before { width: 100%; }

        .view-all-btn svg {
            width: 18px; height: 18px;
            transition: transform .2s;
        }

        .view-all-btn:hover svg { transform: translateX(4px); }

        /* ═══════════════════════════════════════
           TOAST
        ═══════════════════════════════════════ */
        .toast {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            background: var(--color-espresso);
            color: var(--color-white);
            padding: 16px 28px;
            border-radius: 12px;
            font-size: .9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: var(--shadow-lg);
            opacity: 0;
            visibility: hidden;
            transition: all .4s var(--ease-smooth);
            z-index: 9999;
        }

        .toast.show {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .toast svg { width: 20px; height: 20px; color: #4ade80; }

        /* ═══════════════════════════════════════
           EMPTY / ERROR STATE
        ═══════════════════════════════════════ */
        .products-error {
            text-align: center;
            padding: 60px 20px;
            color: var(--color-coffee);
            font-size: 1rem;
        }

        /* ═══════════════════════════════════════
           RESPONSIVE
        ═══════════════════════════════════════ */
        @media (max-width: 1200px) {
            .product-card { flex: 0 0 calc(33.333% - 16px); min-width: calc(33.333% - 16px); }
        }

        @media (max-width: 900px) {
            .new-arrivals-section { padding: 60px 20px; }
            .section-header { margin-bottom: 40px; }
            .product-card { flex: 0 0 calc(50% - 12px); min-width: calc(50% - 12px); }
        }

        @media (max-width: 600px) {
            .new-arrivals-section { padding: 48px 16px; }
            .carousel-track { gap: 16px; }
            .product-card { flex: 0 0 100%; min-width: 100%; }
            .section-label::before, .section-label::after { width: 24px; }
            .quick-actions { opacity: 1; transform: translateY(0); }
            .wishlist-btn  { opacity: 1; transform: translateY(0); }
            .nav-btn { width: 46px; height: 46px; }
            .view-all-btn { padding: 14px 28px; font-size: .8rem; }
        }
    </style>
</head>
<body>

<!-- ═══════════════════════════════════════════
     HTML STRUCTURE
═══════════════════════════════════════════ -->
<section class="new-arrivals-section" aria-label="New Arrivals" id="best-seller">
    <div class="new-arrivals-container">

        <header class="section-header">
            <span class="section-label">Most Loved</span>
            <h2 class="section-title">Best Sellers</h2>
            <p class="section-subtitle">Our most popular pieces, chosen by our community</p>
        </header>

        <div class="carousel-wrapper">
            <!-- Product cards are injected here by main.js after products.js is loaded -->
            <div class="carousel-track" id="carouselTrack"></div>
        </div>

        <nav class="carousel-nav" aria-label="Product navigation">
            <button class="nav-btn" id="prevBtn" aria-label="Previous products">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <div class="pagination-dots" id="paginationDots"></div>
            <button class="nav-btn" id="nextBtn" aria-label="Next products">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </nav>

        <div class="view-all-wrapper">
            <a href="#" class="view-all-btn">
                View All Best Sellers
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

    </div>

    <!-- Toast notification -->
    <div class="toast" id="toast" role="status" aria-live="polite">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
        <span id="toastMessage">Item added to cart</span>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     SCRIPTS — order matters:
     1. products.js  →  declares the `products` array
     2. main.js      →  reads `products` and drives the UI
═══════════════════════════════════════════ -->
<script src="products.js"></script>
<script src="cart-handler.js"></script>
<script src="main.js"></script>

</body>
</html>
