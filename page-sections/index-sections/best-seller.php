<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Arrivals</title>
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
            
            --font-display: 'Cormorant Garamond', Georgia, serif;
            --font-body: 'Inter', -apple-system, sans-serif;
            
            --shadow-sm: 0 2px 8px rgba(47, 39, 22, 0.06);
            --shadow-md: 0 8px 24px rgba(47, 39, 22, 0.1);
            --shadow-lg: 0 16px 48px rgba(47, 39, 22, 0.15);
            --shadow-popup: 0 12px 40px rgba(47, 39, 22, 0.25);
            
            --transition-fast: 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-smooth: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-bounce: 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
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
           NEW ARRIVALS SECTION
           ======================================== */
        .new-arrivals-section {
            padding: 80px 24px;
            background: linear-gradient(180deg, var(--color-cream) 0%, var(--color-white) 100%);
            font-family: var(--font-body);
            position: relative;
            overflow: hidden;
        }

        .new-arrivals-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--color-sand), transparent);
        }

        .new-arrivals-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Section Header */
        .section-header {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: var(--font-body);
            font-size: 0.75rem;
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
            background: linear-gradient(90deg, transparent, var(--color-camel));
        }

        .section-label::after {
            background: linear-gradient(90deg, var(--color-camel), transparent);
        }

        .section-title {
            font-family: var(--font-display);
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 500;
            color: var(--color-espresso);
            margin-bottom: 16px;
            letter-spacing: -0.5px;
        }

        .section-subtitle {
            font-size: 1rem;
            color: var(--color-coffee);
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* ========================================
           CAROUSEL
           ======================================== */
        .carousel-wrapper {
            position: relative;
            overflow: hidden;
        }

        .carousel-track {
            display: flex;
            gap: 24px;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Product Card */
        .product-card {
            flex: 0 0 calc(25% - 18px);
            min-width: calc(25% - 18px);
            position: relative;
            background: var(--color-white);
            border-radius: 16px;
            overflow: visible;
            box-shadow: var(--shadow-sm);
            transition: all var(--transition-smooth);
        }

        

        /* Product Image Container */
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
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

      

        /* Badge */
        .product-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            padding: 6px 14px;
            background: var(--color-espresso);
            color: var(--color-white);
            font-size: 0.65rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            border-radius: 4px;
            z-index: 2;
        }

        /* Wishlist Button */
        .wishlist-btn {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 40px;
            height: 40px;
            background: var(--color-white);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transform: translateY(-10px);
            transition: all var(--transition-smooth);
            box-shadow: var(--shadow-md);
            z-index: 2;
        }

        .product-card:hover .wishlist-btn {
            opacity: 1;
            transform: translateY(0);
        }

        .wishlist-btn:hover {
            background: var(--color-coffee);
            transform: scale(1.1);
        }

        .wishlist-btn svg {
            width: 18px;
            height: 18px;
            color: var(--color-espresso);
            transition: all var(--transition-fast);
        }

        .wishlist-btn:hover svg {
            color: var(--color-white);
        }

        .wishlist-btn.active svg {
            fill: var(--color-coffee);
            color: var(--color-coffee);
        }

        .wishlist-btn.active:hover svg {
            fill: var(--color-white);
            color: var(--color-white);
        }

        /* Quick Actions Overlay */
        .quick-actions {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(to top, rgba(47, 39, 22, 0.85) 0%, transparent 100%);
            display: flex;
            justify-content: center;
            gap: 12px;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .product-card:hover .quick-actions {
            opacity: 1;
            transform: translateY(0);
        }

        .action-btn {
            width: 44px;
            height: 44px;
            background: var(--color-white);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-bounce);
            position: relative;
        }

        .action-btn:nth-child(1) { transition-delay: 0.05s; }
        .action-btn:nth-child(2) { transition-delay: 0.1s; }
        .action-btn:nth-child(3) { transition-delay: 0.15s; }

        
        /* Product Info */
        .product-info {
            padding: 20px;
        }

        .product-colors {
            display: flex;
            gap: 6px;
            margin-bottom: 12px;
        }

        .color-dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            border: 2px solid var(--color-white);
            box-shadow: 0 0 0 1px var(--color-sand);
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .color-dot:hover {
            transform: scale(1.2);
        }

        .product-name {
            font-family: var(--font-body);
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--color-espresso);
            margin-bottom: 8px;
            line-height: 1.4;
            transition: color var(--transition-fast);
        }

        .product-card:hover .product-name {
            color: var(--color-coffee);
        }

        .product-price {
            font-family: var(--font-display);
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--color-coffee);
        }

        /* ========================================
           QUICK ADD POPUP - COVERS FULL CARD WIDTH
           ======================================== */
        .quick-add-popup {
            position: absolute;
            top: auto;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 12px 12px 0 0;
            padding: 14px 14px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 50;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            overflow-y: auto;
            max-height: 65%;
        }

        .quick-add-popup.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        /* Hide quick actions when popup is active */
        .product-image-wrapper:has(.quick-add-popup.active) .quick-actions {
            opacity: 0 !important;
            pointer-events: none;
        }
        
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
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--color-espresso);
            margin: 0;
        }

        .popup-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--color-cream);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-espresso);
            transition: all var(--transition-fast);
        }

        .popup-close:hover {
            background: var(--color-coffee);
            color: var(--color-white);
        }

        .popup-close svg {
            width: 12px;
            height: 12px;
        }

        /* Popup Option Groups */
        .popup-option-group {
            margin-bottom: 8px;
        }

        .popup-option-label {
            font-size: 0.6rem;
            font-weight: 600;
            color: var(--color-espresso);
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
        }

        /* Color Options */
        .popup-colors {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .popup-color-btn {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1.5px solid transparent;
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .popup-color-btn:hover {
            transform: scale(1.15);
        }

        .popup-color-btn.selected {
            border-color: var(--color-espresso);
            box-shadow: 0 0 0 1px var(--color-white), 0 0 0 2px var(--color-coffee);
        }

        /* Size Options */
        .popup-sizes {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
        }

        .popup-size-btn {
            min-width: 28px;
            padding: 4px 6px;
            border: 1px solid var(--color-sand);
            border-radius: 4px;
            background: var(--color-white);
            cursor: pointer;
            font-family: var(--font-body);
            font-size: 0.6rem;
            font-weight: 500;
            color: var(--color-espresso);
            transition: all var(--transition-fast);
            text-align: center;
        }

        .popup-size-btn:hover {
            border-color: var(--color-taupe);
            background: var(--color-cream);
        }

        .popup-size-btn.selected {
            background: var(--color-coffee);
            border-color: var(--color-coffee);
            color: var(--color-white);
        }

        /* Quantity Selector */
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
            width: 24px;
            height: 24px;
            border: none;
            background: var(--color-cream);
            cursor: pointer;
            font-size: 0.8rem;
            color: var(--color-espresso);
            transition: all var(--transition-fast);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover {
            background: var(--color-sand);
        }

        .qty-value {
            width: 28px;
            text-align: center;
            font-family: var(--font-body);
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--color-espresso);
            background: var(--color-white);
        }

        /* Add to Cart Button */
        .popup-add-btn {
            width: 100%;
            padding: 8px;
            background: var(--color-coffee);
            color: var(--color-white);
            border: none;
            border-radius: 6px;
            font-family: var(--font-body);
            font-size: 0.65rem;
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-smooth);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
        }

        .popup-add-btn:hover {
            background: var(--color-espresso);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(47, 39, 22, 0.3);
        }

        /* Success State */
        .popup-success {
            display: none;
            text-align: center;
            padding: 20px 0;
        }

        .popup-success.show {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            animation: fadeInUp 0.4s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .popup-form.hide {
            display: none;
        }

        .success-icon {
            width: 56px;
            height: 56px;
            background: #d4edda;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            color: #28a745;
        }

        .success-icon svg {
            width: 28px;
            height: 28px;
        }

        .popup-success h5 {
            font-family: var(--font-display);
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--color-espresso);
            margin: 0 0 6px 0;
        }

        .popup-success p {
            font-size: 0.85rem;
            color: var(--color-coffee);
            margin: 0;
        }

        /* ========================================
           NAVIGATION CONTROLS
           ======================================== */
        .carousel-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 24px;
            margin-top: 48px;
        }

        .nav-btn {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: var(--color-white);
            border: 2px solid var(--color-sand);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-smooth);
            color: var(--color-espresso);
        }

        .nav-btn:hover:not(:disabled) {
            background: var(--color-coffee);
            border-color: var(--color-coffee);
            color: var(--color-white);
            transform: scale(1.05);
        }

        .nav-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .nav-btn svg {
            width: 20px;
            height: 20px;
        }

        /* Pagination Dots */
        .pagination-dots {
            display: flex;
            gap: 12px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--color-sand);
            border: none;
            cursor: pointer;
            transition: all var(--transition-smooth);
        }

        .dot:hover {
            background: var(--color-taupe);
        }

        .dot.active {
            background: var(--color-coffee);
            width: 28px;
            border-radius: 5px;
        }

        /* View All Button */
        .view-all-wrapper {
            text-align: center;
            margin-top: 48px;
        }

        .view-all-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 36px;
            background: transparent;
            border: 2px solid var(--color-espresso);
            color: var(--color-espresso);
            font-family: var(--font-body);
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 50px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all var(--transition-smooth);
        }

        .view-all-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: var(--color-espresso);
            transition: width var(--transition-smooth);
            z-index: -1;
        }

        .view-all-btn:hover {
            color: var(--color-white);
        }

        .view-all-btn:hover::before {
            width: 100%;
        }

        .view-all-btn svg {
            width: 18px;
            height: 18px;
            transition: transform var(--transition-fast);
        }

        .view-all-btn:hover svg {
            transform: translateX(4px);
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            background: var(--color-espresso);
            color: var(--color-white);
            padding: 16px 28px;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: var(--shadow-lg);
            opacity: 0;
            visibility: hidden;
            transition: all var(--transition-smooth);
            z-index: 1000;
        }

        .toast.show {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .toast svg {
            width: 20px;
            height: 20px;
            color: #4ade80;
        }
        

        /* ========================================
           RESPONSIVE STYLES
           ======================================== */
        @media (max-width: 1200px) {
            .product-card {
                flex: 0 0 calc(33.333% - 16px);
                min-width: calc(33.333% - 16px);
            }
        }

        @media (max-width: 900px) {
            .product-card {
                flex: 0 0 calc(50% - 12px);
                min-width: calc(50% - 12px);
            }

            .new-arrivals-section {
                padding: 60px 20px;
            }

            .section-header {
                margin-bottom: 40px;
            }
            
            .quick-add-popup {
                padding: 20px 16px;
            }
        }

        @media (max-width: 600px) {
            .product-card {
                flex: 0 0 100%;
                min-width: 100%;
            }

            .new-arrivals-section {
                padding: 48px 16px;
            }

            .carousel-track {
                gap: 16px;
            }

            .section-label::before,
            .section-label::after {
                width: 24px;
            }

            .quick-actions {
                opacity: 1;
                transform: translateY(0);
            }

            .wishlist-btn {
                opacity: 1;
                transform: translateY(0);
            }

            .nav-btn {
                width: 46px;
                height: 46px;
            }

            .view-all-btn {
                padding: 14px 28px;
                font-size: 0.8rem;
            }

            .quick-add-popup {
                padding: 18px 16px;
            }
            
            .popup-header h4 {
                font-size: 1rem;
            }
            
            .popup-color-btn {
                width: 28px;
                height: 28px;
            }
            
            .popup-size-btn {
                min-width: 40px;
                padding: 7px 10px;
            }
        }

        /* Make the cart item the positioning context */



    </style>
</head>
<body>

<section class="new-arrivals-section" aria-label="New Arrivals" id="best-seller">
    <div class="new-arrivals-container">
        <!-- Section Header -->
        <header class="section-header">
            <span class="section-label">Fresh Styles</span>
            <h2 class="section-title">Just In</h2>
            <p class="section-subtitle">Discover our latest arrivals, crafted with premium materials for the modern wardrobe</p>
        </header>

        <!-- Carousel -->
        <div class="carousel-wrapper">
            <div class="carousel-track" id="carouselTrack">
                <!-- Product cards are injected dynamically via JavaScript -->
            </div>
        </div>

        <!-- Navigation -->
        <nav class="carousel-nav" aria-label="Product navigation">
            <button class="nav-btn" id="prevBtn" aria-label="Previous products">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            
            <div class="pagination-dots" id="paginationDots"></div>
            
            <button class="nav-btn" id="nextBtn" aria-label="Next products">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </nav>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
        <span id="toastMessage">Item added to cart</span>
    </div>
</section>



<script>
(function() {
    var products = [
        {
            id: 1,
            name: "Linen Blend Shirt",
            price: "$89.00",
            image: "https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=600&h=800&fit=crop",
            badge: "New",
            colors: ["#c6baa5", "#2f2716", "#ffffff"],
            sizes: ["XS", "S", "M", "L", "XL"]
        },
        {
            id: 2,
            name: "Pleated Midi Skirt",
            price: "$125.00",
            image: "https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600&h=800&fit=crop",
            badge: "New",
            colors: ["#a8845e", "#7e5232", "#c6baa5"],
            sizes: ["XS", "S", "M", "L"]
        },
        {
            id: 3,
            name: "Oversized Wool Coat",
            price: "$345.00",
            image: "https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=600&h=800&fit=crop",
            badge: "New",
            colors: ["#b39c80", "#2f2716"],
            sizes: ["S", "M", "L", "XL"]
        },
        {
            id: 4,
            name: "Silk Camisole Top",
            price: "$78.00",
            image: "https://images.unsplash.com/photo-1485462537746-965f33f7f6a7?w=600&h=800&fit=crop",
            badge: "New",
            colors: ["#c6baa5", "#a8845e", "#ffffff"],
            sizes: ["XS", "S", "M", "L"]
        },
        {
            id: 5,
            name: "High-Waist Trousers",
            price: "$145.00",
            image: "https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600&h=800&fit=crop",
            badge: "New",
            colors: ["#2f2716", "#7e5232", "#b39c80"],
            sizes: ["XS", "S", "M", "L", "XL"]
        },
        {
            id: 6,
            name: "Cashmere Turtleneck",
            price: "$195.00",
            image: "https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=600&h=800&fit=crop",
            badge: "New",
            colors: ["#c6baa5", "#a8845e", "#2f2716"],
            sizes: ["S", "M", "L", "XL"]
        },
        {
            id: 7,
            name: "Leather Belt Bag",
            price: "$165.00",
            image: "https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=600&h=800&fit=crop",
            badge: "New",
            colors: ["#7e5232", "#2f2716", "#a8845e"],
            sizes: ["One Size"]
        },
        {
            id: 8,
            name: "Structured Blazer",
            price: "$265.00",
            image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop",
            badge: "New",
            colors: ["#b39c80", "#2f2716", "#7e5232"],
            sizes: ["XS", "S", "M", "L", "XL"]
        }
    ];

    function buildProductCard(product) {
        var id = product.id;

        // Build color buttons for popup
        var popupColorBtns = product.colors.map(function(color, index) {
            var selectedClass = index === 0 ? ' selected' : '';
            return '<button class="popup-color-btn' + selectedClass + '" style="background-color: ' + color + '" data-color-index="' + index + '" data-product-id="' + id + '" aria-label="Select color ' + (index + 1) + '"></button>';
        }).join('\n                                        ');

        // Build size buttons for popup
        var popupSizeBtns = product.sizes.map(function(size, index) {
            var selectedClass = index === 0 ? ' selected' : '';
            return '<button class="popup-size-btn' + selectedClass + '" data-size-index="' + index + '" data-product-id="' + id + '">' + size + '</button>';
        }).join('\n                                        ');

        return '\n                <!-- Product Card ' + id + ' -->\n' +
'                <article class="product-card" data-product-id="' + id + '">\n' +
'                    <div class="product-image-wrapper">\n' +
'                        <img \n' +
'                            src="' + product.image + '" \n' +
'                            alt="' + product.name + '"\n' +
'                            class="product-image"\n' +
'                            loading="lazy"\n' +
'                        >\n' +
'                        <span class="product-badge">' + product.badge + '</span>\n' +
'                        \n' +
'                        <button class="wishlist-btn" aria-label="Add to wishlist" data-product-id="' + id + '">\n' +
'                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n' +
'                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />\n' +
'                            </svg>\n' +
'                        </button>\n' +
'\n' +
'                        <div class="quick-actions">\n' +
'                            <button class="action-btn cart-btn" data-tooltip="Add to Cart" data-product-id="' + id + '" aria-label="Add to cart">\n' +
'                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n' +
'                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />\n' +
'                                </svg>\n' +
'                            </button>\n' +
'                            <button class="action-btn" data-tooltip="Quick View" aria-label="Quick view">\n' +
'                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n' +
'                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />\n' +
'                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />\n' +
'                                </svg>\n' +
'                            </button>\n' +
'                            <button class="action-btn" data-tooltip="Share" aria-label="Share product">\n' +
'                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n' +
'                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />\n' +
'                                </svg>\n' +
'                            </button>\n' +
'                        </div>\n' +
'\n' +
'                        <div class="quick-add-popup" id="popup-' + id + '">\n' +
'                            <div class="popup-form" id="popup-form-' + id + '">\n' +
'                                <div class="popup-header">\n' +
'                                    <h4>Quick Add</h4>\n' +
'                                    <button class="popup-close" data-product-id="' + id + '" aria-label="Close popup">\n' +
'                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n' +
'                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />\n' +
'                                        </svg>\n' +
'                                    </button>\n' +
'                                </div>\n' +
'\n' +
'                                <div class="popup-option-group">\n' +
'                                    <label class="popup-option-label">Color</label>\n' +
'                                    <div class="popup-colors">\n' +
'                                        ' + popupColorBtns + '\n' +
'                                    </div>\n' +
'                                </div>\n' +
'\n' +
'                                <div class="popup-option-group">\n' +
'                                    <label class="popup-option-label">Size</label>\n' +
'                                    <div class="popup-sizes">\n' +
'                                        ' + popupSizeBtns + '\n' +
'                                    </div>\n' +
'                                </div>\n' +
'\n' +
'                                <div class="popup-option-group">\n' +
'                                    <label class="popup-option-label">Quantity</label>\n' +
'                                    <div class="popup-quantity">\n' +
'                                        <button class="qty-btn qty-minus" data-product-id="' + id + '" aria-label="Decrease quantity">-</button>\n' +
'                                        <span class="qty-value" id="qty-' + id + '">1</span>\n' +
'                                        <button class="qty-btn qty-plus" data-product-id="' + id + '" aria-label="Increase quantity">+</button>\n' +
'                                    </div>\n' +
'                                </div>\n' +
'\n' +
'                                <button class="popup-add-btn" data-product-id="' + id + '">Add to Cart</button>\n' +
'                            </div>\n' +
'\n' +
'                            <div class="popup-success" id="popup-success-' + id + '">\n' +
'                                <div class="success-icon">\n' +
'                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n' +
'                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />\n' +
'                                    </svg>\n' +
'                                </div>\n' +
'                                <h5>Added to Cart!</h5>\n' +
'                                <p>Item added successfully</p>\n' +
'                            </div>\n' +
'                        </div>\n' +
'                    </div>\n' +
'\n' +
'                    <div class="product-info">\n' +
'                        \n' +
'                        <h3 class="product-name">' + product.name + '</h3>\n' +
'                        <p class="product-price">' + product.price + '</p>\n' +
'                    </div>\n' +
'                </article>\n';
    }

    function renderProducts() {
        var track = document.getElementById('carouselTrack');
        if (!track) return;
        var html = '';
        for (var i = 0; i < products.length; i++) {
            html += buildProductCard(products[i]);
        }
        html += '\n            ';
        track.innerHTML = html;
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', renderProducts);
    } else {
        renderProducts();
    }
})();
</script>

</body>
</html>