<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winter Collection</title>
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
           FILTER SIDEBAR - NEW
           ======================================== */
        .page-wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        .filter-sidebar {
            width: 280px;
            background: var(--color-white);
            padding: 32px 24px;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            border-right: 1px solid var(--color-sand);
            transition: all var(--transition-smooth);
            flex-shrink: 0;
        }

        .filter-sidebar.collapsed {
            width: 0;
            padding: 0;
            opacity: 0;
            overflow: hidden;
        }

        .sidebar-header {
            margin-bottom: 32px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--color-sand);
        }

        .sidebar-title {
            font-family: var(--font-display);
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--color-espresso);
            margin-bottom: 8px;
        }

        .sidebar-subtitle {
            font-size: 0.85rem;
            color: var(--color-coffee);
            line-height: 1.5;
        }

        .filter-group {
            margin-bottom: 28px;
        }

        .filter-group-title {
            font-family: var(--font-body);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--color-espresso);
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-group-title svg {
            width: 14px;
            height: 14px;
            color: var(--color-camel);
        }

        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

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

        .clear-all-btn {
            width: 100%;
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
            margin-top: 24px;
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

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 199;
            opacity: 0;
            transition: opacity var(--transition-smooth);
        }

        .sidebar-overlay.active {
            display: block;
            opacity: 1;
        }

        .main-content-wrapper {
            flex: 1;
            min-width: 0;
            width: 100%;
        }

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

        .toggle-sidebar-btn {
            display: none;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
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

        .toggle-sidebar-btn:hover {
            border-color: var(--color-coffee);
            background: var(--color-cream);
        }

        .toggle-sidebar-btn svg {
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

        .sort-dropdown-wrapper {
            position: relative;
        }

        .sort-dropdown {
            padding: 10px 40px 10px 16px;
            background: var(--color-white);
            border: 2px solid var(--color-sand);
            border-radius: 8px;
            color: var(--color-espresso);
            font-family: var(--font-body);
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            transition: all var(--transition-fast);
        }

        .sort-dropdown:hover {
            border-color: var(--color-coffee);
            background: var(--color-cream);
        }

        .sort-dropdown:focus {
            outline: none;
            border-color: var(--color-coffee);
            box-shadow: 0 0 0 3px rgba(126, 82, 50, 0.1);
        }

        .sort-dropdown-wrapper::after {
            content: '';
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 6px solid var(--color-coffee);
            pointer-events: none;
        }

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
           GRID LAYOUT (REPLACES CAROUSEL)
           ======================================== */
        .carousel-wrapper {
            position: relative;
        }

        .carousel-track {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
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
            .filter-sidebar {
                position: fixed;
                left: 0;
                top: 0;
                z-index: 200;
                width: 300px;
                box-shadow: var(--shadow-lg);
                transform: translateX(-100%);
            }

            .filter-sidebar.open {
                transform: translateX(0);
            }

            .filter-sidebar.collapsed {
                transform: translateX(-100%);
            }

            .toggle-sidebar-btn {
                display: flex;
            }

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

            .filter-sidebar {
                width: 100%;
            }

            .top-bar {
                padding: 16px;
            }

            .active-filters-bar {
                padding: 12px 16px;
            }
        }

        @media (min-width: 901px) {
            .sidebar-overlay {
                display: none !important;
            }
        }
    </style>
</head>
<body>

<div class="page-wrapper">
    <!-- Filter Sidebar -->
    <aside class="filter-sidebar" id="filterSidebar">
        <div class="sidebar-header">
            <h2 class="sidebar-title">Filters</h2>
            <p class="sidebar-subtitle">Refine your search with instant results</p>
        </div>

        <!-- Category Filter -->
        <div class="filter-group">
            <h3 class="filter-group-title">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                Category
            </h3>
            <div class="filter-options">
                <label class="filter-option">
                    <input type="checkbox" value="outerwear" data-filter="category">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Outerwear</span>
                    <span class="filter-count" data-count="outerwear">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="sweaters" data-filter="category">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Sweaters</span>
                    <span class="filter-count" data-count="sweaters">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="accessories" data-filter="category">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Accessories</span>
                    <span class="filter-count" data-count="accessories">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="footwear" data-filter="category">
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

        <!-- Gender Filter -->
        <div class="filter-group">
            <h3 class="filter-group-title">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Gender
            </h3>
            <div class="filter-options">
                <label class="filter-option">
                    <input type="checkbox" value="men" data-filter="gender">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Men</span>
                    <span class="filter-count" data-count="men">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="women" data-filter="gender">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Women</span>
                    <span class="filter-count" data-count="women">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="unisex" data-filter="gender">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Unisex</span>
                    <span class="filter-count" data-count="unisex">0</span>
                </label>
            </div>
        </div>

        <!-- Size Filter -->
        <div class="filter-group">
            <h3 class="filter-group-title">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                Size
            </h3>
            <div class="filter-options">
                <label class="filter-option">
                    <input type="checkbox" value="XS" data-filter="size">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">XS</span>
                    <span class="filter-count" data-count="XS">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="S" data-filter="size">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">S</span>
                    <span class="filter-count" data-count="S">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="M" data-filter="size">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">M</span>
                    <span class="filter-count" data-count="M">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="L" data-filter="size">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">L</span>
                    <span class="filter-count" data-count="L">0</span>
                </label>
                <label class="filter-option">
                    <input type="checkbox" value="XL" data-filter="size">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">XL</span>
                    <span class="filter-count" data-count="XL">0</span>
                </label>
            </div>
        </div>

        <!-- Fit Filter -->
        <div class="filter-group">
            <h3 class="filter-group-title">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                </svg>
                Fit
            </h3>
            <div class="filter-options">
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
                    <input type="checkbox" value="oversized" data-filter="fit">
                    <span class="filter-checkbox">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span class="filter-label">Oversized</span>
                    <span class="filter-count" data-count="oversized">0</span>
                </label>
            </div>
        </div>

        <!-- Price Range Filter -->
        <div class="filter-group">
            <h3 class="filter-group-title">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Price Range
            </h3>
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

        <!-- Clear All Button -->
        <button class="clear-all-btn" id="clearAllBtn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            Clear All Filters
        </button>
    </aside>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Content -->
    <div class="main-content-wrapper">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="results-info">
                <button class="toggle-sidebar-btn" id="toggleSidebarBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    Filters
                </button>
                <p class="results-count">
                    Showing <span id="visibleCount">16</span> of <span id="totalCount">16</span> products
                </p>
            </div>
            <div class="sort-dropdown-wrapper">
                <select class="sort-dropdown" id="sortDropdown">
                    <option value="">Sort by: Featured</option>
                    <option value="asc">Price: Low to High</option>
                    <option value="desc">Price: High to Low</option>
                    <option value="name">Name: A to Z</option>
                </select>
            </div>
        </div>

        <!-- Active Filters Pills -->
        <div class="active-filters-bar" id="activeFiltersBar"></div>

        <section class="new-arrivals-section" aria-label="Winter Collection">
            <div class="new-arrivals-container">
                <!-- Section Header -->
                <header class="section-header">
                    <span class="section-label">Seasonal Essentials</span>
                    <h2 class="section-title">Winter Collection</h2>
                    <p class="section-subtitle">Embrace the cold in style with our curated selection of premium winter essentials</p>
                </header>

                <!-- Grid Layout (Previously Carousel) -->
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

<script>
(function() {
    // ========================================
    // SVG ICON CONSTANTS
    // ========================================
    var SVG_HEART = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />\n                            </svg>';

    var SVG_BAG = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />\n                                </svg>';

    var SVG_EYE = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />\n                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />\n                                </svg>';

    var SVG_SHARE = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />\n                                </svg>';

    var SVG_CLOSE = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />\n                                        </svg>';

    var SVG_CHECK = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\n                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />\n                                    </svg>';

    var SVG_SEARCH = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>';

    // ========================================
    // PRODUCT DATA ARRAY
    // ========================================
    var products = [
        {
            id: 1,
            image: "https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=600&h=800&fit=crop",
            alt: "Wool Overcoat",
            badge: "Winter",
            name: "Wool Overcoat",
            price: "$385.00",
            priceValue: 385,
            category: "outerwear",
            gender: "men",
            fit: "regular",
            colors: ["#b39c80", "#2f2716", "#4a4a4a"],
            sizes: ["XS", "S", "M", "L", "XL"],
            cartBtnDataProductId: "1",
            hasAriaOnColors: true,
            hasAriaOnQty: true,
            hasSuccessIcon: true
        },
        {
            id: 2,
            image: "https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=600&h=800&fit=crop",
            alt: "Cashmere Sweater",
            badge: "Winter",
            name: "Cashmere Sweater",
            price: "$225.00",
            priceValue: 225,
            category: "sweaters",
            gender: "women",
            fit: "slim",
            colors: ["#c6baa5", "#8b4513", "#2f2716"],
            sizes: ["XS", "S", "M", "L"],
            cartBtnDataProductId: "2",
            hasAriaOnColors: true,
            hasAriaOnQty: true,
            hasSuccessIcon: true
        },
        {
            id: 3,
            image: "https://images.unsplash.com/photo-1520903920243-00d872a2d1c9?w=600&h=800&fit=crop",
            alt: "Merino Wool Scarf",
            badge: "Winter",
            name: "Merino Wool Scarf",
            price: "$95.00",
            priceValue: 95,
            category: "accessories",
            gender: "unisex",
            fit: "regular",
            colors: ["#8b0000", "#2f2716", "#c6baa5"],
            sizes: ["One Size"],
            cartBtnDataProductId: "3",
            hasAriaOnColors: true,
            hasAriaOnQty: true,
            hasSuccessIcon: true
        },
        {
            id: 4,
            image: "https://images.unsplash.com/photo-1608256246200-53e635b5b65f?w=600&h=800&fit=crop",
            alt: "Leather Winter Boots",
            badge: "Winter",
            name: "Leather Winter Boots",
            price: "$295.00",
            priceValue: 295,
            category: "footwear",
            gender: "women",
            fit: "regular",
            colors: ["#2f2716", "#7e5232"],
            sizes: ["36", "37", "38", "39", "40"],
            cartBtnDataProductId: "4",
            hasAriaOnColors: true,
            hasAriaOnQty: true,
            hasSuccessIcon: true
        },
        {
            id: 5,
            image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop",
            alt: "Quilted Puffer Jacket",
            badge: "Winter",
            name: "Quilted Puffer Jacket",
            price: "$345.00",
            priceValue: 345,
            category: "outerwear",
            gender: "men",
            fit: "oversized",
            colors: ["#2f2716", "#1a472a", "#c6baa5"],
            sizes: ["XS", "S", "M", "L", "XL"],
            cartBtnDataProductId: "5",
            hasAriaOnColors: true,
            hasAriaOnQty: true,
            hasSuccessIcon: true
        },
        {
            id: 6,
            image: "https://images.unsplash.com/photo-1578932750294-f5075e85f44a?w=600&h=800&fit=crop",
            alt: "Knit Beanie Hat",
            badge: "Winter",
            name: "Knit Beanie Hat",
            price: "$55.00",
            priceValue: 55,
            category: "accessories",
            gender: "unisex",
            fit: "regular",
            colors: ["#c6baa5", "#2f2716", "#8b0000"],
            sizes: ["One Size"],
            cartBtnDataProductId: "6",
            hasAriaOnColors: true,
            hasAriaOnQty: true,
            hasSuccessIcon: true
        },
        {
            id: 7,
            image: "https://images.unsplash.com/photo-1601924994987-69e26d50dc26?w=600&h=800&fit=crop",
            alt: "Leather Gloves",
            badge: "Winter",
            name: "Leather Gloves",
            price: "$125.00",
            priceValue: 125,
            category: "accessories",
            gender: "men",
            fit: "slim",
            colors: ["#2f2716", "#7e5232"],
            sizes: ["S", "M", "L"],
            cartBtnDataProductId: "7",
            hasAriaOnColors: true,
            hasAriaOnQty: true,
            hasSuccessIcon: true
        },
        {
            id: 8,
            image: "https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=600&h=800&fit=crop",
            alt: "Fleece-Lined Cardigan",
            badge: "Winter",
            name: "Fleece-Lined Cardigan",
            price: "$185.00",
            priceValue: 185,
            category: "sweaters",
            gender: "women",
            fit: "oversized",
            colors: ["#c6baa5", "#2f2716", "#7e5232"],
            sizes: ["XS", "S", "M", "L", "XL"],
            cartBtnDataProductId: "8",
            hasAriaOnColors: true,
            hasAriaOnQty: true,
            hasSuccessIcon: true
        },
        {
            id: 9,
            image: "https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=600&h=800&fit=crop",
            alt: "Fleece-Lined Cardigan",
            badge: "Winter",
            name: "Fleece-Lined Cardigan",
            price: "$185.00",
            priceValue: 185,
            category: "sweaters",
            gender: "unisex",
            fit: "regular",
            colors: ["#c6baa5", "#2f2716", "#7e5232"],
            sizes: ["XS", "S", "M", "L", "XL"],
            cartBtnDataProductId: "9",
            hasAriaOnColors: true,
            hasAriaOnQty: true,
            hasSuccessIcon: true
        },
        {
            id: 10,
            image: "https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=600&h=800&fit=crop",
            alt: "Fleece-Lined Cardigan",
            badge: "Winter",
            name: "Fleece-Lined Cardigan",
            price: "$185.00",
            priceValue: 185,
            category: "outerwear",
            gender: "women",
            fit: "slim",
            colors: ["#c6baa5", "#2f2716", "#7e5232"],
            sizes: ["XS", "S", "M", "L", "XL"],
            cartBtnDataProductId: "10",
            hasAriaOnColors: true,
            hasAriaOnQty: true,
            hasSuccessIcon: true
        },
        {
            id: 11,
            image: "https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=600&h=800&fit=crop",
            alt: "Fleece-Lined Cardigan",
            badge: "Winter",
            name: "Fleece-Lined Cardigan",
            price: "$185.00",
            priceValue: 185,
            category: "accessories",
            gender: "men",
            fit: "regular",
            colors: ["#c6baa5", "#2f2716", "#7e5232"],
            sizes: ["XS", "S", "M", "L", "XL"],
            cartBtnDataProductId: "11",
            hasAriaOnColors: false,
            hasAriaOnQty: false,
            hasSuccessIcon: false
        },
        {
            id: 12,
            image: "https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=600&h=800&fit=crop",
            alt: "Fleece-Lined Cardigan",
            badge: "Winter",
            name: "Fleece-Lined Cardigan",
            price: "$185.00",
            priceValue: 185,
            category: "footwear",
            gender: "unisex",
            fit: "oversized",
            colors: ["#c6baa5", "#2f2716", "#7e5232"],
            sizes: ["XS", "S", "M", "L", "XL"],
            cartBtnDataProductId: "12",
            hasAriaOnColors: false,
            hasAriaOnQty: false,
            hasSuccessIcon: false
        },
        {
            id: 13,
            image: "https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=600&h=800&fit=crop",
            alt: "Fleece-Lined Cardigan",
            badge: "Winter",
            name: "Fleece-Lined Cardigan",
            price: "$185.00",
            priceValue: 185,
            category: "sweaters",
            gender: "women",
            fit: "slim",
            colors: ["#c6baa5", "#2f2716", "#7e5232"],
            sizes: ["XS", "S", "M", "L", "XL"],
            cartBtnDataProductId: "13",
            hasAriaOnColors: false,
            hasAriaOnQty: false,
            hasSuccessIcon: false
        },
        {
            id: 14,
            image: "https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=600&h=800&fit=crop",
            alt: "Fleece-Lined Cardigan",
            badge: "Winter",
            name: "Fleece-Lined Cardigan",
            price: "$185.00",
            priceValue: 185,
            category: "outerwear",
            gender: "men",
            fit: "oversized",
            colors: ["#c6baa5", "#2f2716", "#7e5232"],
            sizes: ["XS", "S", "M", "L", "XL"],
            cartBtnDataProductId: "13",
            hasAriaOnColors: false,
            hasAriaOnQty: false,
            hasSuccessIcon: false
        },
        {
            id: 15,
            image: "https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=600&h=800&fit=crop",
            alt: "Fleece-Lined Cardigan",
            badge: "Winter",
            name: "Fleece-Lined Cardigan",
            price: "$185.00",
            priceValue: 185,
            category: "accessories",
            gender: "unisex",
            fit: "regular",
            colors: ["#c6baa5", "#2f2716", "#7e5232"],
            sizes: ["XS", "S", "M", "L", "XL"],
            cartBtnDataProductId: "13",
            hasAriaOnColors: false,
            hasAriaOnQty: false,
            hasSuccessIcon: false
        },
        {
            id: 16,
            image: "https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=600&h=800&fit=crop",
            alt: "Fleece-Lined Cardigan",
            badge: "Winter",
            name: "Fleece-Lined Cardigan",
            price: "$185.00",
            priceValue: 185,
            category: "footwear",
            gender: "women",
            fit: "slim",
            colors: ["#c6baa5", "#2f2716", "#7e5232"],
            sizes: ["XS", "S", "M", "L", "XL"],
            cartBtnDataProductId: "13",
            hasAriaOnColors: false,
            hasAriaOnQty: false,
            hasSuccessIcon: false
        }
    ];

    // ========================================
    // FILTER STATE
    // ========================================
    var filterState = {
        category: [],
        gender: [],
        size: [],
        fit: [],
        minPrice: 0,
        maxPrice: 500,
        sortOrder: ''
    };

    // ========================================
    // CARD GENERATION FUNCTION
    // ========================================
    function generateProductCard(product) {
        var id = product.id;

        // Build color buttons for popup
        var popupColorBtns = '';
        for (var ci = 0; ci < product.colors.length; ci++) {
            var selectedClass = ci === 0 ? ' selected' : '';
            if (product.hasAriaOnColors) {
                popupColorBtns += '                                        <button class="popup-color-btn' + selectedClass + '" style="background-color: ' + product.colors[ci] + '" data-color-index="' + ci + '" data-product-id="' + id + '" aria-label="Select color ' + (ci + 1) + '"></button>\n';
            } else {
                popupColorBtns += '                                        <button class="popup-color-btn' + selectedClass + '" style="background-color: ' + product.colors[ci] + '" data-color-index="' + ci + '" data-product-id="' + id + '"></button>\n';
            }
        }

        // Build size buttons for popup
        var popupSizeBtns = '';
        for (var si = 0; si < product.sizes.length; si++) {
            var selectedSizeClass = si === 0 ? ' selected' : '';
            popupSizeBtns += '                                        <button class="popup-size-btn' + selectedSizeClass + '" data-size-index="' + si + '" data-product-id="' + id + '">' + product.sizes[si] + '</button>\n';
        }

        // Build quantity section
        var qtySection = '';
        if (product.hasAriaOnQty) {
            qtySection =
                '                                        <button class="qty-btn qty-minus" data-product-id="' + id + '" aria-label="Decrease quantity">-</button>\n' +
                '                                        <span class="qty-value" id="qty-' + id + '">1</span>\n' +
                '                                        <button class="qty-btn qty-plus" data-product-id="' + id + '" aria-label="Increase quantity">+</button>\n';
        } else {
            qtySection =
                '                                        <button class="qty-btn qty-minus" data-product-id="' + id + '">-</button>\n' +
                '                                        <span class="qty-value" id="qty-' + id + '">1</span>\n' +
                '                                        <button class="qty-btn qty-plus" data-product-id="' + id + '">+</button>\n';
        }

        // Build success section
        var successSection = '';
        if (product.hasSuccessIcon) {
            successSection =
                '                            <div class="popup-success" id="popup-success-' + id + '">\n' +
                '                                <div class="success-icon">\n' +
                '                                    ' + SVG_CHECK + '\n' +
                '                                </div>\n' +
                '                                <h5>Added to Cart!</h5>\n' +
                '                                <p>Item added successfully</p>\n' +
                '                            </div>\n';
        } else {
            successSection =
                '                            <div class="popup-success" id="popup-success-' + id + '">\n' +
                '                                <h5>Added to Cart!</h5>\n' +
                '                                <p>Item added successfully</p>\n' +
                '                            </div>\n';
        }

        var html =
            '<article class="product-card" data-product-id="' + id + '">\n' +
            '                    <div class="product-image-wrapper">\n' +
            '                        <img \n' +
            '                            src="' + product.image + '" \n' +
            '                            alt="' + product.alt + '"\n' +
            '                            class="product-image"\n' +
            '                            loading="lazy"\n' +
            '                        >\n' +
            '                        <span class="product-badge">' + product.badge + '</span>\n' +
            '                        \n' +
            '                        <button class="wishlist-btn" aria-label="Add to wishlist" data-product-id="' + id + '">\n' +
            '                            ' + SVG_HEART + '\n' +
            '                        </button>\n' +
            '\n' +
            '                        <div class="quick-actions">\n' +
            '                            <button class="action-btn cart-btn" data-tooltip="Add to Cart" data-product-id="' + product.cartBtnDataProductId + '" aria-label="Add to cart">\n' +
            '                                ' + SVG_BAG + '\n' +
            '                            </button>\n' +
            '                            <button class="action-btn" data-tooltip="Quick View" aria-label="Quick view">\n' +
            '                                ' + SVG_EYE + '\n' +
            '                            </button>\n' +
            '                            <button class="action-btn" data-tooltip="Share" aria-label="Share product">\n' +
            '                                ' + SVG_SHARE + '\n' +
            '                            </button>\n' +
            '                        </div>\n' +
            '\n' +
            '                        <div class="quick-add-popup" id="popup-' + id + '">\n' +
            '                            <div class="popup-form" id="popup-form-' + id + '">\n' +
            '                                <div class="popup-header">\n' +
            '                                    <h4>Quick Add</h4>\n' +
            '                                    <button class="popup-close" data-product-id="' + id + '" aria-label="Close popup">\n' +
            '                                        ' + SVG_CLOSE + '\n' +
            '                                    </button>\n' +
            '                                </div>\n' +
            '\n' +
            '                                <div class="popup-option-group">\n' +
            '                                    <label class="popup-option-label">Color</label>\n' +
            '                                    <div class="popup-colors">\n' +
            popupColorBtns +
            '                                    </div>\n' +
            '                                </div>\n' +
            '\n' +
            '                                <div class="popup-option-group">\n' +
            '                                    <label class="popup-option-label">Size</label>\n' +
            '                                    <div class="popup-sizes">\n' +
            popupSizeBtns +
            '                                    </div>\n' +
            '                                </div>\n' +
            '\n' +
            '                                <div class="popup-option-group">\n' +
            '                                    <label class="popup-option-label">Quantity</label>\n' +
            '                                    <div class="popup-quantity">\n' +
            qtySection +
            '                                    </div>\n' +
            '                                </div>\n' +
            '\n' +
            '                                <button class="popup-add-btn" data-product-id="' + id + '">Add to Cart</button>\n' +
            '                            </div>\n' +
            '\n' +
            successSection +
            '                        </div>\n' +
            '                    </div>\n' +
            '\n' +
            '                    <div class="product-info">\n' +
            '                        <h3 class="product-name">' + product.name + '</h3>\n' +
            '                        <p class="product-price">' + product.price + '</p>\n' +
            '                    </div>\n' +
            '                </article>';

        return html;
    }

    // ========================================
    // FILTER & SORT PRODUCTS
    // ========================================
    function filterAndSortProducts() {
        var filtered = products.filter(function(product) {
            // Category filter
            if (filterState.category.length > 0 && filterState.category.indexOf(product.category) === -1) return false;
            // Gender filter
            if (filterState.gender.length > 0 && filterState.gender.indexOf(product.gender) === -1) return false;
            // Size filter - check if product has any of the selected sizes
            if (filterState.size.length > 0) {
                var hasSize = false;
                for (var i = 0; i < filterState.size.length; i++) {
                    if (product.sizes.indexOf(filterState.size[i]) !== -1) {
                        hasSize = true;
                        break;
                    }
                }
                if (!hasSize) return false;
            }
            // Fit filter
            if (filterState.fit.length > 0 && filterState.fit.indexOf(product.fit) === -1) return false;
            // Price filter
            if (product.priceValue < filterState.minPrice || product.priceValue > filterState.maxPrice) return false;
            return true;
        });

        // Sort
        if (filterState.sortOrder === 'asc') {
            filtered.sort(function(a, b) { return a.priceValue - b.priceValue; });
        } else if (filterState.sortOrder === 'desc') {
            filtered.sort(function(a, b) { return b.priceValue - a.priceValue; });
        } else if (filterState.sortOrder === 'name') {
            filtered.sort(function(a, b) { return a.name.localeCompare(b.name); });
        }

        return filtered;
    }

    // ========================================
    // UPDATE COUNTS
    // ========================================
    function updateCounts() {
        var counts = { 
            outerwear: 0, sweaters: 0, accessories: 0, footwear: 0,
            men: 0, women: 0, unisex: 0,
            XS: 0, S: 0, M: 0, L: 0, XL: 0,
            slim: 0, regular: 0, oversized: 0
        };
        products.forEach(function(p) {
            counts[p.category]++;
            counts[p.gender]++;
            counts[p.fit]++;
            // Count sizes
            for (var i = 0; i < p.sizes.length; i++) {
                if (counts[p.sizes[i]] !== undefined) {
                    counts[p.sizes[i]]++;
                }
            }
        });
        Object.keys(counts).forEach(function(key) {
            var el = document.querySelector('[data-count="' + key + '"]');
            if (el) el.textContent = counts[key];
        });
    }

    // ========================================
    // RENDER PRODUCTS
    // ========================================
    function renderProducts() {
        var filtered = filterAndSortProducts();
        var carouselTrack = document.getElementById('carouselTrack');
        
        document.getElementById('visibleCount').textContent = filtered.length;
        document.getElementById('totalCount').textContent = products.length;

        if (filtered.length === 0) {
            carouselTrack.innerHTML = '<div class="no-results"><div class="no-results-icon">' + SVG_SEARCH + '</div>' +
                '<h3>No products found</h3><p>Try adjusting your filters to find what you\'re looking for.</p></div>';
        } else {
            var cardsHTML = '';
            for (var i = 0; i < filtered.length; i++) {
                cardsHTML += '\n                ' + generateProductCard(filtered[i]) + '\n';
            }
            carouselTrack.innerHTML = cardsHTML;
        }

        updateActiveFilters();
    }

    // ========================================
    // UPDATE ACTIVE FILTERS
    // ========================================
    function updateActiveFilters() {
        var bar = document.getElementById('activeFiltersBar');
        var pills = [];

        filterState.category.forEach(function(c) {
            pills.push('<div class="filter-pill">' + c + '<button data-remove="category:' + c + '"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></button></div>');
        });
        filterState.gender.forEach(function(g) {
            pills.push('<div class="filter-pill">' + g + '<button data-remove="gender:' + g + '"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></button></div>');
        });
        filterState.size.forEach(function(s) {
            pills.push('<div class="filter-pill">Size: ' + s + '<button data-remove="size:' + s + '"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></button></div>');
        });
        filterState.fit.forEach(function(f) {
            pills.push('<div class="filter-pill">' + f + ' fit<button data-remove="fit:' + f + '"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></button></div>');
        });
        if (filterState.minPrice > 0 || filterState.maxPrice < 500) {
            pills.push('<div class="filter-pill">$' + filterState.minPrice + ' - $' + filterState.maxPrice + '<button data-remove="price"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></button></div>');
        }

        if (pills.length > 0) {
            bar.innerHTML = pills.join('');
            bar.classList.remove('empty');
        } else {
            bar.classList.add('empty');
        }
    }

    // ========================================
    // INIT FILTERS
    // ========================================
    function initFilters() {
        // Checkbox filters
        document.querySelectorAll('input[type="checkbox"][data-filter]').forEach(function(cb) {
            cb.addEventListener('change', function() {
                var filterType = this.getAttribute('data-filter');
                var value = this.value;
                if (this.checked) {
                    if (filterState[filterType].indexOf(value) === -1) {
                        filterState[filterType].push(value);
                    }
                } else {
                    var idx = filterState[filterType].indexOf(value);
                    if (idx > -1) filterState[filterType].splice(idx, 1);
                }
                renderProducts();
            });
        });

        // Price sliders
        var minSlider = document.getElementById('minPriceSlider');
        var maxSlider = document.getElementById('maxPriceSlider');
        var minDisplay = document.getElementById('minPriceDisplay');
        var maxDisplay = document.getElementById('maxPriceDisplay');
        var track = document.getElementById('priceTrack');

        function updatePriceSlider() {
            var min = parseInt(minSlider.value);
            var max = parseInt(maxSlider.value);
            if (min > max - 10) {
                minSlider.value = max - 10;
                min = max - 10;
            }
            filterState.minPrice = min;
            filterState.maxPrice = max;
            minDisplay.textContent = '$' + min;
            maxDisplay.textContent = '$' + max;
            var percentMin = (min / 500) * 100;
            var percentMax = (max / 500) * 100;
            track.style.left = percentMin + '%';
            track.style.width = (percentMax - percentMin) + '%';
            renderProducts();
        }

        minSlider.addEventListener('input', updatePriceSlider);
        maxSlider.addEventListener('input', updatePriceSlider);

        // Sort dropdown
        document.getElementById('sortDropdown').addEventListener('change', function() {
            filterState.sortOrder = this.value;
            renderProducts();
        });

        // Clear all
        document.getElementById('clearAllBtn').addEventListener('click', function() {
            filterState = { category: [], gender: [], size: [], fit: [], minPrice: 0, maxPrice: 500, sortOrder: '' };
            document.querySelectorAll('input[type="checkbox"]').forEach(function(cb) { cb.checked = false; });
            minSlider.value = 0;
            maxSlider.value = 500;
            document.getElementById('sortDropdown').value = '';
            updatePriceSlider();
            renderProducts();
        });

        // Toggle sidebar (mobile)
        var sidebar = document.getElementById('filterSidebar');
        var overlay = document.getElementById('sidebarOverlay');
        var toggleBtn = document.getElementById('toggleSidebarBtn');

        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', function() {
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
        });

        // Remove filter pills
        document.getElementById('activeFiltersBar').addEventListener('click', function(e) {
            var btn = e.target.closest('button[data-remove]');
            if (btn) {
                var removeData = btn.getAttribute('data-remove').split(':');
                if (removeData[0] === 'price') {
                    filterState.minPrice = 0;
                    filterState.maxPrice = 500;
                    minSlider.value = 0;
                    maxSlider.value = 500;
                    updatePriceSlider();
                } else {
                    var filterType = removeData[0];
                    var value = removeData[1];
                    var idx = filterState[filterType].indexOf(value);
                    if (idx > -1) filterState[filterType].splice(idx, 1);
                    var checkbox = document.querySelector('input[data-filter="' + filterType + '"][value="' + value + '"]');
                    if (checkbox) checkbox.checked = false;
                }
                renderProducts();
            }
        });
    }

    // ========================================
    // INJECT CARDS INTO THE DOM & INIT
    // ========================================
    updateCounts();
    renderProducts();
    initFilters();

    // ========================================
    // EVENT HANDLERS (delegated to section)
    // ========================================
    var section = document.querySelector('.new-arrivals-section');

    section.addEventListener('click', function(e) {
        var target = e.target;

        // Wishlist button
        var wishlistBtn = target.closest('.wishlist-btn');
        if (wishlistBtn) {
            wishlistBtn.classList.toggle('active');
            return;
        }

        // Cart button (quick actions overlay)
        var cartBtn = target.closest('.cart-btn');
        if (cartBtn) {
            var productId = cartBtn.getAttribute('data-product-id');
            var popup = document.getElementById('popup-' + productId);
            if (popup) {
                popup.classList.add('active');
            }
            return;
        }

        // Popup close button
        var closeBtn = target.closest('.popup-close');
        if (closeBtn) {
            var productId = closeBtn.getAttribute('data-product-id');
            var popup = document.getElementById('popup-' + productId);
            if (popup) {
                popup.classList.remove('active');
            }
            // Reset form state
            var form = document.getElementById('popup-form-' + productId);
            var success = document.getElementById('popup-success-' + productId);
            if (form) form.classList.remove('hide');
            if (success) success.classList.remove('show');
            return;
        }

        // Popup color button
        var colorBtn = target.closest('.popup-color-btn');
        if (colorBtn) {
            var colorsContainer = colorBtn.parentElement;
            var allColorBtns = colorsContainer.querySelectorAll('.popup-color-btn');
            for (var i = 0; i < allColorBtns.length; i++) {
                allColorBtns[i].classList.remove('selected');
            }
            colorBtn.classList.add('selected');
            return;
        }

        // Popup size button
        var sizeBtn = target.closest('.popup-size-btn');
        if (sizeBtn) {
            var sizesContainer = sizeBtn.parentElement;
            var allSizeBtns = sizesContainer.querySelectorAll('.popup-size-btn');
            for (var i = 0; i < allSizeBtns.length; i++) {
                allSizeBtns[i].classList.remove('selected');
            }
            sizeBtn.classList.add('selected');
            return;
        }

        // Quantity minus
        var qtyMinus = target.closest('.qty-minus');
        if (qtyMinus) {
            var productId = qtyMinus.getAttribute('data-product-id');
            var qtyEl = document.getElementById('qty-' + productId);
            if (qtyEl) {
                var val = parseInt(qtyEl.textContent);
                if (val > 1) qtyEl.textContent = val - 1;
            }
            return;
        }

        // Quantity plus
        var qtyPlus = target.closest('.qty-plus');
        if (qtyPlus) {
            var productId = qtyPlus.getAttribute('data-product-id');
            var qtyEl = document.getElementById('qty-' + productId);
            if (qtyEl) {
                var val = parseInt(qtyEl.textContent);
                qtyEl.textContent = val + 1;
            }
            return;
        }

        // Add to cart button (popup)
        var addBtn = target.closest('.popup-add-btn');
        if (addBtn) {
            var productId = addBtn.getAttribute('data-product-id');
            var form = document.getElementById('popup-form-' + productId);
            var success = document.getElementById('popup-success-' + productId);

            if (form) form.classList.add('hide');
            if (success) success.classList.add('show');

            // Show toast
            var toast = document.getElementById('toast');
            var toastMsg = document.getElementById('toastMessage');
            if (toast && toastMsg) {
                toastMsg.textContent = 'Item added to cart';
                toast.classList.add('show');
                setTimeout(function() {
                    toast.classList.remove('show');
                }, 3000);
            }

            // Auto-close popup after delay
            setTimeout(function() {
                var popup = document.getElementById('popup-' + productId);
                if (popup) popup.classList.remove('active');
                if (form) form.classList.remove('hide');
                if (success) success.classList.remove('show');
                // Reset quantity
                var qtyEl = document.getElementById('qty-' + productId);
                if (qtyEl) qtyEl.textContent = '1';
            }, 2000);
            return;
        }
    });
})();
</script>

</body>
</html>
