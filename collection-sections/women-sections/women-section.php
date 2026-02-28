<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's Collection</title>
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
    justify-content: space-between;
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

.top-bar-buttons {
    display: flex;
    gap: 10px;
}

.filter-trigger-btn,
.order-trigger-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 18px;
    background: var(--color-white);
    border: 2px solid var(--color-sand);
    border-radius: 8px;
    color: var(--color-espresso);
    font-family: var(--font-body);
    font-size: 0.85rem;
    font-weight: 600;
    cursor: pointer;
    transition: all var(--transition-fast);
}

.filter-trigger-btn:hover,
.order-trigger-btn:hover {
    border-color: var(--color-coffee);
    background: var(--color-cream);
}

.filter-trigger-btn svg,
.order-trigger-btn svg {
    width: 18px;
    height: 18px;
}

.results-count {
    font-size: 1rem;
    color: var(--color-espresso);
}

.results-count span {
    font-weight: 700;
    color: var(--color-coffee);
}

/* ========================================
   FILTER POPUP (Desktop: dropdown, Mobile: bottom sheet)
   ======================================== */
.filter-popup-overlay,
.mini-popup-overlay,
.order-popup-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    z-index: 998;
    opacity: 0;
    transition: opacity var(--transition-smooth);
}

.filter-popup-overlay.active,
.mini-popup-overlay.active,
.order-popup-overlay.active {
    display: block;
    opacity: 1;
}

.filter-popup {
    position: absolute;
    top: 110px;
    left: 40px;
    width: 400px;
    background: var(--color-white);
    border-radius: 16px;
    box-shadow: var(--shadow-popup);
    z-index: 999;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
}

.filter-popup.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.filter-popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    border-bottom: 1px solid var(--color-sand);
}

.filter-popup-header h3 {
    font-family: var(--font-display);
    font-size: 1.4rem;
    font-weight: 600;
    color: var(--color-espresso);
}

.filter-popup-close,
.mini-popup-close,
.order-popup-close {
    width: 32px;
    height: 32px;
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

.filter-popup-close:hover,
.mini-popup-close:hover,
.order-popup-close:hover {
    background: var(--color-coffee);
    color: var(--color-white);
}

.filter-popup-close svg,
.mini-popup-close svg,
.order-popup-close svg {
    width: 16px;
    height: 16px;
}

.filter-popup-body {
    padding: 12px 0;
}

.filter-category-item {
    cursor: pointer;
    transition: background var(--transition-fast);
}

.filter-category-item:hover {
    background: var(--color-cream);
}

.filter-category-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 24px;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--color-espresso);
}

.filter-category-header svg {
    width: 18px;
    height: 18px;
    color: var(--color-camel);
    flex-shrink: 0;
}

.filter-category-header span {
    flex: 1;
}

.filter-category-header .chevron-icon {
    width: 14px;
    height: 14px;
    color: var(--color-taupe);
}

/* ========================================
   MINI POPUP (Desktop: positioned next to filter popup)
   ======================================== */
.mini-popup {
    position: absolute;
    top: 110px;
    left: 470px;
    width: 300px;
    background: var(--color-white);
    border-radius: 16px;
    box-shadow: var(--shadow-popup);
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transform: translateX(-10px);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
}

.mini-popup.active {
    opacity: 1;
    visibility: visible;
    transform: translateX(0);
}

.mini-popup-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px 20px;
    border-bottom: 1px solid var(--color-sand);
}

.mini-popup-back {
    width: 28px;
    height: 28px;
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

.mini-popup-back:hover {
    background: var(--color-coffee);
    color: var(--color-white);
}

.mini-popup-back svg {
    width: 14px;
    height: 14px;
}

.mini-popup-header h4 {
    flex: 1;
    font-family: var(--font-display);
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--color-espresso);
}

.mini-popup-body {
    padding: 12px 16px;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

/* ========================================
   ORDER POPUP
   ======================================== */
.order-popup {
    position: absolute;
    top: 110px;
    left: 170px;
    width: 280px;
    background: var(--color-white);
    border-radius: 16px;
    box-shadow: var(--shadow-popup);
    z-index: 999;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
}

.order-popup.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.order-popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    border-bottom: 1px solid var(--color-sand);
}

.order-popup-header h3 {
    font-family: var(--font-display);
    font-size: 1.4rem;
    font-weight: 600;
    color: var(--color-espresso);
}

.order-popup-body {
    padding: 12px 16px;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.order-option {
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
    padding: 12px 14px;
    border-radius: 8px;
    transition: all var(--transition-fast);
}

.order-option:hover {
    background: var(--color-cream);
}

.order-option input[type="radio"] {
    display: none;
}

.order-radio {
    width: 18px;
    height: 18px;
    border: 2px solid var(--color-sand);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all var(--transition-fast);
    flex-shrink: 0;
}

.order-radio::after {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--color-coffee);
    opacity: 0;
    transition: opacity var(--transition-fast);
}

.order-option input[type="radio"]:checked + .order-radio {
    border-color: var(--color-coffee);
}

.order-option input[type="radio"]:checked + .order-radio::after {
    opacity: 1;
}

.order-label {
    font-size: 0.9rem;
    color: var(--color-espresso);
    font-weight: 500;
}

/* ========================================
   FILTER OPTIONS (shared between sidebar and popups)
   ======================================== */
.filter-option {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    padding: 8px 12px;
    border-radius: 8px;
    transition: all var(--transition-fast);
}

.filter-option:hover {
    background: var(--color-cream);
}

.filter-checkbox {
    width: 18px;
    height: 18px;
    border: 2px solid var(--color-sand);
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all var(--transition-fast);
    flex-shrink: 0;
}

.filter-option input[type="checkbox"] {
    display: none;
}

.filter-option input[type="checkbox"]:checked + .filter-checkbox {
    background: var(--color-coffee);
    border-color: var(--color-coffee);
}

.filter-checkbox svg {
    width: 12px;
    height: 12px;
    color: var(--color-white);
    opacity: 0;
    transition: opacity var(--transition-fast);
}

.filter-option input[type="checkbox"]:checked + .filter-checkbox svg {
    opacity: 1;
}

.filter-label {
    font-size: 0.9rem;
    color: var(--color-espresso);
    font-weight: 500;
    flex: 1;
}

.filter-count {
    font-size: 0.75rem;
    color: var(--color-taupe);
    font-weight: 600;
}

/* ========================================
   PRICE RANGE
   ======================================== */
.price-range-container {
    padding: 0 4px;
}

.price-values {
    display: flex;
    justify-content: space-between;
    margin-bottom: 16px;
}

.price-value {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--color-coffee);
}

.price-slider-wrapper {
    position: relative;
    height: 6px;
    background: var(--color-cream);
    border-radius: 3px;
    margin-bottom: 20px;
}

.price-slider-track {
    position: absolute;
    height: 100%;
    background: var(--color-coffee);
    border-radius: 3px;
}

.price-slider {
    position: relative;
}

.price-input-range {
    position: absolute;
    width: 100%;
    height: 6px;
    top: 0;
    left: 0;
    -webkit-appearance: none;
    appearance: none;
    background: transparent;
    pointer-events: none;
}

.price-input-range::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 18px;
    height: 18px;
    background: var(--color-coffee);
    border: 3px solid var(--color-white);
    border-radius: 50%;
    cursor: pointer;
    pointer-events: auto;
    box-shadow: 0 2px 6px rgba(47, 39, 22, 0.2);
}

.price-input-range::-moz-range-thumb {
    width: 18px;
    height: 18px;
    background: var(--color-coffee);
    border: 3px solid var(--color-white);
    border-radius: 50%;
    cursor: pointer;
    pointer-events: auto;
    box-shadow: 0 2px 6px rgba(47, 39, 22, 0.2);
}

/* ========================================
   CLEAR ALL BUTTON
   ======================================== */
.clear-all-btn {
    width: calc(100% - 32px);
    margin: 8px 16px 16px;
    padding: 12px;
    background: transparent;
    border: 2px solid var(--color-sand);
    border-radius: 8px;
    color: var(--color-coffee);
    font-family: var(--font-body);
    font-size: 0.85rem;
    font-weight: 600;
    cursor: pointer;
    transition: all var(--transition-fast);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.clear-all-btn:hover {
    background: var(--color-coffee);
    border-color: var(--color-coffee);
    color: var(--color-white);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(126, 82, 50, 0.2);
}

.clear-all-btn svg {
    width: 16px;
    height: 16px;
}

/* ========================================
   ACTIVE FILTERS BAR
   ======================================== */
.active-filters-bar {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    padding: 16px 40px;
    background: var(--color-cream);
    min-height: 56px;
    align-items: center;
}

.active-filters-bar.empty {
    display: none;
}

.filter-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 12px;
    background: var(--color-coffee);
    color: var(--color-white);
    font-size: 0.8rem;
    font-weight: 600;
    border-radius: 20px;
    animation: pillFadeIn 0.3s ease;
}

@keyframes pillFadeIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.filter-pill button {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 16px;
    height: 16px;
    padding: 0;
    background: rgba(255, 255, 255, 0.3);
    border: none;
    border-radius: 50%;
    cursor: pointer;
    transition: all var(--transition-fast);
}

.filter-pill button:hover {
    background: rgba(255, 255, 255, 0.5);
    transform: scale(1.1);
}

.filter-pill button svg {
    width: 10px;
    height: 10px;
    color: var(--color-white);
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
   GRID LAYOUT
   ======================================== */
.carousel-wrapper {
    position: relative;
}

.carousel-track {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
}

/* Product Card */
.product-card {
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

.wishlist-btn.active:active svg {
    fill: var(--color-coffee);
    color: var(--color-coffee);
    opacity: 0.7;
}

/* Quick Actions Overlay */
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

.action-btn:nth-child(1) { transition-delay: 0.05s; }
.action-btn:nth-child(2) { transition-delay: 0.1s; }
.action-btn:nth-child(3) { transition-delay: 0.15s; }

/* Product Info */
.product-info {
    padding: 16px;
}

.product-colors {
    display: flex;
    gap: 5px;
    margin-bottom: 10px;
}

.color-dot {
    width: 12px;
    height: 12px;
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
   NAVIGATION CONTROLS - HIDDEN
   ======================================== */
.carousel-nav {
    display: none;
}

.nav-btn {
    display: none;
}

.pagination-dots {
    display: none;
}

.dot {
    display: none;
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

    .new-arrivals-section {
        padding: 60px 20px;
    }

    .section-header {
        margin-bottom: 40px;
    }
    
    .quick-add-popup {
        padding: 20px 16px;
    }

    .top-bar {
        padding: 20px;
        flex-direction: column;
        gap: 16px;
        align-items: stretch;
    }

    .results-info {
        flex-direction: column;
        gap: 12px;
    }

    .active-filters-bar {
        padding: 12px 20px;
    }

    /* Filter popup becomes bottom sheet on mobile */
    .filter-popup {
        position: fixed;
        top: auto;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        max-height: 80vh;
        border-radius: 24px 24px 0 0;
        transform: translateY(100%);
        overflow-y: auto;
    }

    .filter-popup.active {
        transform: translateY(0);
    }

    /* Mini popups also become bottom sheets */
    .mini-popup {
        position: fixed;
        top: auto;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        max-height: 70vh;
        border-radius: 24px 24px 0 0;
        transform: translateY(100%);
        overflow-y: auto;
    }

    .mini-popup.active {
        transform: translateX(0);
        transform: translateY(0);
    }

    /* Order popup also becomes bottom sheet */
    .order-popup {
        position: fixed;
        top: auto;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        max-height: 70vh;
        border-radius: 24px 24px 0 0;
        transform: translateY(100%);
        overflow-y: auto;
    }

    .order-popup.active {
        transform: translateY(0);
    }

    /* Show overlay on mobile */
    .filter-popup-overlay.active,
    .mini-popup-overlay.active,
    .order-popup-overlay.active {
        display: block;
        opacity: 1;
    }
}

@media (max-width: 600px) {
    .carousel-track {
        grid-template-columns: repeat(1, 1fr);
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

    .top-bar {
        padding: 16px;
    }

    .active-filters-bar {
        padding: 12px 16px;
    }
}
    </style>
</head>
<body>

<div class="page-wrapper">
    <!-- Main Content -->
    <div class="main-content-wrapper">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="results-info">
                <div class="top-bar-buttons">
                    <button class="filter-trigger-btn" id="filterTriggerBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Filter
                    </button>
                    <button class="order-trigger-btn" id="orderTriggerBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                        </svg>
                        Order
                    </button>
                </div>
                <p class="results-count">
                    Showing <span id="visibleCount">16</span> of <span id="totalCount">16</span> products
                </p>
            </div>
            <div class="sort-dropdown-wrapper" style="display:none;">
                <select class="sort-dropdown" id="sortDropdown">
                    <option value="">Sort by: Featured</option>
                    <option value="asc">Price: Low to High</option>
                    <option value="desc">Price: High to Low</option>
                    <option value="name">Name: A to Z</option>
                </select>
            </div>
        </div>

        <!-- Filter Popup -->
        <div class="filter-popup-overlay" id="filterPopupOverlay"></div>
        <div class="filter-popup" id="filterPopup">
            <div class="filter-popup-header">
                <h3>Filters</h3>
                <button class="filter-popup-close" id="filterPopupClose">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="filter-popup-body">
                <div class="filter-category-item" data-filter-cat="category">
                    <div class="filter-category-header">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        <span>Kind</span>
                        <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
                <div class="filter-category-item" data-filter-cat="size">
                    <div class="filter-category-header">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        <span>Size</span>
                        <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
                <div class="filter-category-item" data-filter-cat="fit">
                    <div class="filter-category-header">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                        </svg>
                        <span>Fit</span>
                        <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
                <div class="filter-category-item" data-filter-cat="price">
                    <div class="filter-category-header">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Price Range</span>
                        <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
                <button class="clear-all-btn" id="clearAllBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Clear All Filters
                </button>
            </div>
        </div>

        <!-- Mini Popup for Category -->
        <div class="mini-popup-overlay" id="miniPopupOverlay"></div>
        <div class="mini-popup" id="miniPopupCategory">
            <div class="mini-popup-header">
                <button class="mini-popup-back" data-back="category">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <h4>Kind</h4>
                <button class="mini-popup-close" data-close-mini="category">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mini-popup-body">
                <label class="filter-option">
                    <input type="checkbox" value="outerwear" data-filter="subcategory">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Outerwear</span>
                    <span class="filter-count" data-count="outerwear">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="shirt" data-filter="subcategory">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Shirt</span>
                    <span class="filter-count" data-count="shirt">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="jeans" data-filter="subcategory">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Jeans</span>
                    <span class="filter-count" data-count="jeans">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="t-shirt" data-filter="subcategory">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">T-shirt</span>
                    <span class="filter-count" data-count="t-shirt">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="pants" data-filter="subcategory">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Pants</span>
                    <span class="filter-count" data-count="pants">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="shorts" data-filter="subcategory">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Shorts</span>
                    <span class="filter-count" data-count="shorts">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="sweater" data-filter="subcategory">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Sweater</span>
                    <span class="filter-count" data-count="sweater">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="footwear" data-filter="subcategory">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Footwear</span>
                    <span class="filter-count" data-count="footwear">0</span>
                </label>
            </div>
        </div>

        <!-- Mini Popup for Size -->
        <div class="mini-popup" id="miniPopupSize">
            <div class="mini-popup-header">
                <button class="mini-popup-back" data-back="size">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <h4>Size</h4>
                <button class="mini-popup-close" data-close-mini="size">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mini-popup-body" id="womenSizeFilterContainer">
                <!-- Sizes will be populated dynamically from dashboard products -->
            </div>
        </div>

        <!-- Mini Popup for Fit -->
        <div class="mini-popup" id="miniPopupFit">
            <div class="mini-popup-header">
                <button class="mini-popup-back" data-back="fit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <h4>Fit</h4>
                <button class="mini-popup-close" data-close-mini="fit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mini-popup-body">
                <label class="filter-option">
                    <input type="checkbox" value="slim" data-filter="fit">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Slim Fit</span>
                    <span class="filter-count" data-count="slim">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="regular" data-filter="fit">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Regular Fit</span>
                    <span class="filter-count" data-count="regular">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="relaxed" data-filter="fit">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Relaxed Fit</span>
                    <span class="filter-count" data-count="relaxed">0</span>
                </label>
            </div>
        </div>

        <!-- Mini Popup for Price -->
        <div class="mini-popup" id="miniPopupPrice">
            <div class="mini-popup-header">
                <button class="mini-popup-back" data-back="price">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <h4>Price Range</h4>
                <button class="mini-popup-close" data-close-mini="price">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mini-popup-body">
                <div class="price-range-container">
                    <div class="price-values">
                        <span class="price-value" id="minPriceDisplay">$0</span>
                        <span class="price-value" id="maxPriceDisplay">$500</span>
                    </div>
                    <div class="price-slider-wrapper">
                        <div class="price-slider-track" id="priceTrack"></div>
                    </div>
                    <div class="price-slider">
                        <input type="range" class="price-input-range" id="minPriceSlider" min="0" max="500" value="0" step="5">
                        <input type="range" class="price-input-range" id="maxPriceSlider" min="0" max="500" value="500" step="5">
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Popup -->
        <div class="order-popup-overlay" id="orderPopupOverlay"></div>
        <div class="order-popup" id="orderPopup">
            <div class="order-popup-header">
                <h3>Sort By</h3>
                <button class="order-popup-close" id="orderPopupClose">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="order-popup-body">
                <label class="order-option">
                    <input type="radio" name="sortOrder" value="" checked>
                    <span class="order-radio"></span>
                    <span class="order-label">Featured</span>
                </label>
                <label class="order-option">
                    <input type="radio" name="sortOrder" value="asc">
                    <span class="order-radio"></span>
                    <span class="order-label">Price: Low to High</span>
                </label>
                <label class="order-option">
                    <input type="radio" name="sortOrder" value="desc">
                    <span class="order-radio"></span>
                    <span class="order-label">Price: High to Low</span>
                </label>
                <label class="order-option">
                    <input type="radio" name="sortOrder" value="name">
                    <span class="order-radio"></span>
                    <span class="order-label">Name: A to Z</span>
                </label>
            </div>
        </div>

        <!-- Active Filters Pills -->
        <div class="active-filters-bar" id="activeFiltersBar"></div>

        <section class="new-arrivals-section" aria-label="Men's Collection">
            <div class="new-arrivals-container">
                <!-- Section Header -->
                <header class="section-header">
                    <span class="section-label">Premium Menswear</span>
                    <h2 class="section-title">Women's Collection</h2>
                    <p class="section-subtitle">Discover timeless style and modern sophistication with our curated men's collection</p>
                </header>

                <!-- Grid Layout -->
                <div class="carousel-wrapper">
                    <div class="carousel-track" id="carouselTrack">
                        <!-- Product cards will be injected by JavaScript -->
                    </div>
                </div>

                <!-- Navigation removed (hidden via CSS) -->
                <nav class="carousel-nav" aria-label="Product navigation" style="display: none;">
                    <button class="nav-btn" id="prevBtn" aria-label="Previous products"></button>
                    <div class="pagination-dots" id="paginationDots"></div>
                    <button class="nav-btn" id="nextBtn" aria-label="Next products"></button>
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
    </div>
</div>

<script src="products.js"></script>
<script src="women-main.js"></script>


</body>
</html>
