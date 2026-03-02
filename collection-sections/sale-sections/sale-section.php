<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seasonal Sale</title>
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
    --color-sale: #c0392b;
    
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
   PAGE WRAPPER
   ======================================== */
.page-wrapper {
    display: flex;
    width: 100%;
    min-height: 100vh;
}

.main-content-wrapper {
    flex: 1;
    min-width: 0;
    width: 100%;
}

/* ========================================
   TOP BAR
   ======================================== */
.top-bar {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 24px 40px;
    background: var(--color-white);
    border-bottom: 1px solid var(--color-sand);
}

.results-info {
    display: flex;
    align-items: center;
    gap: 16px;
}

.results-count {
    font-size: 1rem;
    color: var(--color-espresso);
}

.results-count span {
    font-weight: 700;
    color: var(--color-sale);
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
    color: var(--color-sale);
    margin-bottom: 16px;
}

.section-label::before,
.section-label::after {
    content: '';
    width: 40px;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--color-sale));
}

.section-label::after {
    background: linear-gradient(90deg, var(--color-sale), transparent);
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
   GRID LAYOUT
   ======================================== */
.carousel-track {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
}

.product-card {
    background: var(--color-white);
    border-radius: 12px;
    overflow: hidden;
    transition: all var(--transition-smooth);
    position: relative;
    box-shadow: var(--shadow-sm);
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
}

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
    transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.product-card:hover .product-image {
    transform: scale(1.1);
}

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

.wishlist-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    width: 36px;
    height: 36px;
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
    color: var(--color-coffee);
    transform: translateY(-2px);
}

.wishlist-btn:active {
    transform: scale(0.9);
    opacity: 0.7;
}

.wishlist-btn svg {
    width: 16px;
    height: 16px;
    color: var(--color-espresso);
    transition: all var(--transition-fast);
}

.wishlist-btn.active svg {
    fill: var(--color-coffee);
    color: var(--color-coffee);
}

.quick-actions {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 16px;
    background: linear-gradient(to top, rgba(47, 39, 22, 0.85) 0%, transparent 100%);
    display: flex;
    justify-content: center;
    gap: 10px;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.3s ease;
}

.product-card:hover .quick-actions {
    opacity: 1;
    transform: translateY(0);
}

.action-btn {
    width: 40px;
    height: 40px;
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

.action-btn svg {
    width: 20px;
    height: 20px;
}

.product-info {
    padding: 16px;
}

.product-name {
    font-family: var(--font-body);
    font-size: 0.9rem;
    font-weight: 500;
    color: var(--color-espresso);
    margin-bottom: 6px;
    line-height: 1.4;
    transition: color var(--transition-fast);
}

.product-card:hover .product-name {
    color: var(--color-coffee);
}

.product-price {
    font-family: var(--font-display);
    font-size: 1.15rem;
    font-weight: 600;
    color: var(--color-coffee);
}

/* ========================================
   QUICK ADD POPUP
   ======================================== */
.quick-add-popup {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--color-white);
    z-index: 10;
    padding: 24px;
    display: flex;
    flex-direction: column;
    transform: translateY(100%);
    transition: transform var(--transition-smooth);
}

.quick-add-popup.active {
    transform: translateY(0);
}

.popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.popup-header h4 {
    font-family: var(--font-display);
    font-size: 1.2rem;
    color: var(--color-espresso);
}

.popup-close {
    background: none;
    border: none;
    color: var(--color-espresso);
    cursor: pointer;
    padding: 4px;
}

.popup-close svg {
    width: 20px;
    height: 20px;
}

.popup-option-group {
    margin-bottom: 16px;
}

.popup-option-label {
    display: block;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    color: var(--color-taupe);
    margin-bottom: 10px;
}

.popup-colors, .popup-sizes {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.popup-color-btn {
    width: 32px;
    height: 32px;
    border: 2px solid transparent;
    border-radius: 50%;
    cursor: pointer;
    transition: all var(--transition-fast);
}

.popup-color-btn.selected {
    border-color: var(--color-espresso);
    transform: scale(1.1);
}

.popup-size-btn {
    min-width: 44px;
    height: 44px;
    background: var(--color-cream);
    border: 1px solid var(--color-sand);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--color-espresso);
    cursor: pointer;
    transition: all var(--transition-fast);
}

.popup-size-btn.selected {
    background: var(--color-espresso);
    border-color: var(--color-espresso);
    color: var(--color-white);
}

.popup-quantity {
    display: flex;
    align-items: center;
    gap: 15px;
    background: var(--color-cream);
    width: fit-content;
    padding: 6px;
    border-radius: 8px;
}

.qty-btn {
    width: 32px;
    height: 32px;
    border: none;
    background: var(--color-white);
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all var(--transition-fast);
}

.qty-btn:hover {
    background: var(--color-espresso);
    color: var(--color-white);
}

.qty-value {
    font-weight: 700;
    min-width: 20px;
    text-align: center;
}

.popup-add-btn {
    margin-top: auto;
    width: 100%;
    padding: 16px;
    background: var(--color-espresso);
    color: var(--color-white);
    border: none;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: all var(--transition-smooth);
}

.popup-add-btn:hover {
    background: var(--color-coffee);
    transform: translateY(-2px);
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

/* No Results Message */
.no-results {
    grid-column: 1 / -1;
    text-align: center;
    padding: 80px 20px;
    background: var(--color-white);
    border-radius: 20px;
    box-shadow: var(--shadow-sm);
}

.no-results-icon {
    width: 100px;
    height: 100px;
    margin: 0 auto 24px;
    background: linear-gradient(135deg, var(--color-cream) 0%, var(--color-sand) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.no-results-icon svg {
    width: 48px;
    height: 48px;
    color: var(--color-coffee);
}

.no-results h3 {
    font-family: var(--font-display);
    font-size: 1.8rem;
    color: var(--color-espresso);
    margin-bottom: 12px;
}

.no-results p {
    font-size: 1rem;
    color: var(--color-coffee);
    max-width: 400px;
    margin: 0 auto;
}

/* ========================================
   RESPONSIVE STYLES
   ======================================== */
@media (max-width: 1200px) {
    .carousel-track {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 900px) {
    .carousel-track {
        grid-template-columns: repeat(2, 1fr);
    }
    .new-arrivals-container {
        padding: 0 20px;
    }
}

@media (max-width: 600px) {
    .carousel-track {
        grid-template-columns: repeat(1, 1fr);
    }
}
    </style>
</head>
<body>

<div class="page-wrapper">
    <div class="main-content-wrapper">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="results-info">
                <p class="results-count">
                    Seasonal Sale — Showing <span id="visibleCount">0</span> products
                </p>
            </div>
        </div>

        <section class="new-arrivals-section" aria-label="Seasonal Sale">
            <div class="new-arrivals-container">
                <!-- Section Header -->
                <header class="section-header">
                    <span class="section-label">Limited Time Offers</span>
                    <h2 class="section-title">Seasonal Sale</h2>
                    <p class="section-subtitle">Unbeatable deals on our most sought-after styles. Grab them before they're gone.</p>
                </header>

                <!-- Grid Layout -->
                <div class="carousel-wrapper">
                    <div class="carousel-track" id="carouselTrack">
                        <!-- Product cards will be injected by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Toast Notification -->
            <div class="toast" id="toast">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span id="toastMessage">Item added to cart</span>
            </div>
        </section>
    </div>
</div>

<script src="products.js"></script>
<script src="sale-main.js"></script>
</body>
</html>

