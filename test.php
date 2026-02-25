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

        body.filter-open {
            overflow: hidden;
        }

        /* ========================================
           PAGE WRAPPER
           ======================================== */
        .page-wrapper {
            display: flex;
            flex-direction: column;
            width: 100%;
            min-height: 100vh;
        }

        /* ========================================
           TOP FILTER BAR
           ======================================== */
        .filter-top-bar {
            background: var(--color-white);
            border-bottom: 1px solid var(--color-sand);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .filter-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 40px;
            gap: 16px;
            flex-wrap: wrap;
        }

        .filter-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* Main Filter Dropdown Button */
        .main-filter-dropdown {
            position: relative;
        }

        .main-filter-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            background: var(--color-white);
            border: 2px solid var(--color-sand);
            border-radius: 10px;
            color: var(--color-espresso);
            font-family: var(--font-body);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .main-filter-btn:hover {
            border-color: var(--color-coffee);
            background: var(--color-cream);
        }

        .main-filter-btn.active {
            border-color: var(--color-coffee);
            background: var(--color-coffee);
            color: var(--color-white);
        }

        .main-filter-btn.has-filters {
            border-color: var(--color-coffee);
            background: var(--color-coffee);
            color: var(--color-white);
        }

        .main-filter-btn svg {
            width: 18px;
            height: 18px;
            transition: transform var(--transition-fast);
        }

        .main-filter-btn.open svg.chevron-icon {
            transform: rotate(180deg);
        }

        .filter-total-badge {
            display: none;
            background: var(--color-white);
            color: var(--color-coffee);
            font-size: 0.75rem;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 12px;
            margin-left: 4px;
        }

        .main-filter-btn.has-filters .filter-total-badge {
            display: inline-block;
        }

        /* Main Filter Panel - Desktop */
        .main-filter-panel {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            width: 380px;
            max-height: 500px;
            background: var(--color-white);
            border: 1px solid var(--color-sand);
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all var(--transition-fast);
            z-index: 200;
            display: flex;
            flex-direction: column;
        }

        .main-filter-panel.open {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .filter-panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 20px;
            border-bottom: 1px solid var(--color-sand);
            flex-shrink: 0;
        }

        .filter-panel-title {
            font-family: var(--font-display);
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--color-espresso);
        }

        .filter-panel-clear {
            font-size: 0.8rem;
            color: var(--color-coffee);
            background: none;
            border: none;
            cursor: pointer;
            text-decoration: underline;
            transition: color var(--transition-fast);
        }

        .filter-panel-clear:hover {
            color: var(--color-espresso);
        }

        .filter-panel-content {
            flex: 1;
            overflow-y: auto;
            padding: 8px 0;
        }

        /* Mini Dropdown / Accordion */
        .filter-accordion {
            border-bottom: 1px solid var(--color-cream);
        }

        .filter-accordion:last-child {
            border-bottom: none;
        }

        .filter-accordion-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 20px;
            cursor: pointer;
            transition: background var(--transition-fast);
        }

        .filter-accordion-header:hover {
            background: var(--color-cream);
        }

        .filter-accordion-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: var(--font-body);
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--color-espresso);
        }

        .filter-accordion-title svg {
            width: 16px;
            height: 16px;
            color: var(--color-camel);
        }

        .filter-accordion-badge {
            display: none;
            background: var(--color-coffee);
            color: var(--color-white);
            font-size: 0.7rem;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 10px;
            margin-left: 8px;
        }

        .filter-accordion.has-selection .filter-accordion-badge {
            display: inline-block;
        }

        .filter-accordion-arrow {
            width: 20px;
            height: 20px;
            color: var(--color-taupe);
            transition: transform var(--transition-fast);
        }

        .filter-accordion.open .filter-accordion-arrow {
            transform: rotate(180deg);
        }

        .filter-accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height var(--transition-smooth);
        }

        .filter-accordion.open .filter-accordion-content {
            max-height: 400px;
        }

        .filter-accordion-inner {
            padding: 0 20px 16px;
        }

        /* Filter Options */
        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .filter-option {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 10px 12px;
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

        /* Price Range */
        .price-range-container {
            padding: 8px 0;
        }

        .price-inputs {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .price-input-group {
            flex: 1;
        }

        .price-input-label {
            display: block;
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--color-taupe);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .price-input-field {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid var(--color-sand);
            border-radius: 8px;
            font-family: var(--font-body);
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--color-espresso);
            background: var(--color-white);
            transition: all var(--transition-fast);
        }

        .price-input-field:focus {
            outline: none;
            border-color: var(--color-coffee);
            box-shadow: 0 0 0 3px rgba(126, 82, 50, 0.1);
        }

        .price-separator {
            color: var(--color-taupe);
            font-weight: 600;
            padding-top: 20px;
        }

        .price-slider-container {
            position: relative;
            height: 40px;
            margin-bottom: 8px;
        }

        .price-slider-track-bg {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 6px;
            background: var(--color-cream);
            border-radius: 3px;
            transform: translateY(-50%);
        }

        .price-slider-track {
            position: absolute;
            top: 50%;
            height: 6px;
            background: var(--color-coffee);
            border-radius: 3px;
            transform: translateY(-50%);
        }

        .price-input-range {
            position: absolute;
            width: 100%;
            height: 40px;
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
            width: 20px;
            height: 20px;
            background: var(--color-coffee);
            border: 3px solid var(--color-white);
            border-radius: 50%;
            cursor: pointer;
            pointer-events: auto;
            box-shadow: 0 2px 8px rgba(47, 39, 22, 0.25);
            transition: transform var(--transition-fast);
        }

        .price-input-range::-webkit-slider-thumb:hover {
            transform: scale(1.1);
        }

        .price-input-range::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: var(--color-coffee);
            border: 3px solid var(--color-white);
            border-radius: 50%;
            cursor: pointer;
            pointer-events: auto;
            box-shadow: 0 2px 8px rgba(47, 39, 22, 0.25);
        }

        .price-presets {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 12px;
        }

        .price-preset-btn {
            padding: 6px 12px;
            background: var(--color-cream);
            border: 1px solid var(--color-sand);
            border-radius: 20px;
            font-family: var(--font-body);
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--color-espresso);
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .price-preset-btn:hover {
            background: var(--color-coffee);
            border-color: var(--color-coffee);
            color: var(--color-white);
        }

        .price-preset-btn.active {
            background: var(--color-coffee);
            border-color: var(--color-coffee);
            color: var(--color-white);
        }

        /* Filter Panel Footer */
        .filter-panel-footer {
            display: none;
            padding: 16px 20px;
            border-top: 1px solid var(--color-sand);
            background: var(--color-white);
            flex-shrink: 0;
        }

        .apply-filters-btn {
            width: 100%;
            padding: 14px;
            background: var(--color-coffee);
            border: none;
            border-radius: 10px;
            color: var(--color-white);
            font-family: var(--font-body);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .apply-filters-btn:hover {
            background: var(--color-espresso);
        }

        /* Controls */
        .filter-controls {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .clear-all-btn {
            padding: 10px 16px;
            background: transparent;
            border: 2px solid var(--color-sand);
            border-radius: 8px;
            color: var(--color-coffee);
            font-family: var(--font-body);
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-fast);
            display: none;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .clear-all-btn.visible {
            display: flex;
        }

        .clear-all-btn:hover {
            background: var(--color-coffee);
            border-color: var(--color-coffee);
            color: var(--color-white);
        }

        .clear-all-btn svg {
            width: 16px;
            height: 16px;
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

        /* Results Info Bar */
        .results-info-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 40px;
            background: var(--color-cream);
            border-bottom: 1px solid var(--color-sand);
        }

        .results-count {
            font-size: 0.9rem;
            color: var(--color-espresso);
        }

        .results-count span {
            font-weight: 700;
            color: var(--color-coffee);
        }

        /* Active Filters Pills */
        .active-filters-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding: 12px 40px;
            background: var(--color-cream);
            min-height: 0;
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
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 20px;
            animation: pillFadeIn 0.3s ease;
        }

        @keyframes pillFadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
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
           MOBILE BOTTOM SHEET
           ======================================== */
        @media (max-width: 768px) {
            .filter-header {
                padding: 12px 16px;
            }

            .filter-controls {
                width: 100%;
                justify-content: space-between;
                margin-top: 8px;
            }

            .clear-all-btn {
                padding: 8px 12px;
                font-size: 0.8rem;
            }

            .sort-dropdown {
                padding: 8px 32px 8px 12px;
                font-size: 0.8rem;
            }

            /* Bottom Sheet Style */
            .main-filter-panel {
                position: fixed;
                top: auto;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100%;
                max-height: 80vh;
                height: 80vh;
                border-radius: 24px 24px 0 0;
                transform: translateY(100%);
            }

            .main-filter-panel.open {
                transform: translateY(0);
            }

            .bottom-sheet-handle {
                display: block;
                width: 40px;
                height: 4px;
                background: var(--color-sand);
                border-radius: 2px;
                margin: 12px auto;
                flex-shrink: 0;
            }

            .filter-panel-header {
                padding: 0 20px 16px;
            }

            .filter-panel-content {
                padding: 0;
            }

            .filter-accordion-header {
                padding: 16px 20px;
            }

            .filter-accordion-inner {
                padding: 0 20px 20px;
            }

            .filter-option {
                padding: 12px;
            }

            .filter-label {
                font-size: 1rem;
            }

            .filter-checkbox {
                width: 22px;
                height: 22px;
            }

            .filter-panel-footer {
                display: block;
            }

            .results-info-bar {
                padding: 12px 16px;
            }

            .active-filters-bar {
                padding: 12px 16px;
            }
        }

        @media (min-width: 769px) {
            .bottom-sheet-handle {
                display: none;
            }
        }

        /* ========================================
           MAIN CONTENT WRAPPER
           ======================================== */
        .main-content-wrapper {
            flex: 1;
            width: 100%;
        }

        /* ========================================
           NEW ARRIVALS SECTION
           ======================================== */
        .new-arrivals-section {
            padding: 60px 24px 80px;
            background: linear-gradient(180deg, var(--color-cream) 0%, var(--color-white) 100%);
            font-family: var(--font-body);
            position: relative;
            overflow: hidden;
        }

        .new-arrivals-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 48px;
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
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .product-card {
            position: relative;
            background: var(--color-white);
            border-radius: 16px;
            overflow: visible;
            box-shadow: var(--shadow-sm);
            transition: all var(--transition-smooth);
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
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
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

        .product-info {
            padding: 20px;
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
           QUICK ADD POPUP
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
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
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
           RESPONSIVE GRID
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
                padding: 40px 20px 60px;
            }

            .section-header {
                margin-bottom: 32px;
            }
        }

        @media (max-width: 600px) {
            .carousel-track {
                grid-template-columns: 1fr;
            }

            .new-arrivals-section {
                padding: 32px 16px 48px;
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
        }
    </style>
</head>
<body>

<div class="page-wrapper">
    <!-- Top Filter Bar -->
    <div class="filter-top-bar">
        <div class="filter-header">
            <div class="filter-left">
                <!-- Main Filter Dropdown -->
                <div class="main-filter-dropdown">
                    <button class="main-filter-btn" id="mainFilterBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        <span>Filters</span>
                        <span class="filter-total-badge" id="filterTotalBadge">0</span>
                        <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Main Filter Panel -->
                    <div class="main-filter-panel" id="mainFilterPanel">
                        <div class="bottom-sheet-handle"></div>
                        <div class="filter-panel-header">
                            <span class="filter-panel-title">Filters</span>
                            <button class="filter-panel-clear" id="clearAllFiltersBtn">Clear All</button>
                        </div>
                        <div class="filter-panel-content">
                            <!-- Category Accordion -->
                            <div class="filter-accordion" id="categoryAccordion" data-filter-type="category">
                                <div class="filter-accordion-header">
                                    <span class="filter-accordion-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        Category
                                        <span class="filter-accordion-badge" id="categoryBadge">0</span>
                                    </span>
                                    <svg class="filter-accordion-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                                <div class="filter-accordion-content">
                                    <div class="filter-accordion-inner">
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
                                                <input type="checkbox" value="shirts" data-filter="category">
                                                <span class="filter-checkbox">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </span>
                                                <span class="filter-label">Shirts</span>
                                                <span class="filter-count" data-count="shirts">0</span>
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
                                </div>
                            </div>

                            <!-- Size Accordion -->
                            <div class="filter-accordion" id="sizeAccordion" data-filter-type="size">
                                <div class="filter-accordion-header">
                                    <span class="filter-accordion-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Size
                                        <span class="filter-accordion-badge" id="sizeBadge">0</span>
                                    </span>
                                    <svg class="filter-accordion-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                                <div class="filter-accordion-content">
                                    <div class="filter-accordion-inner">
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
                                </div>
                            </div>

                            <!-- Fit Accordion -->
                            <div class="filter-accordion" id="fitAccordion" data-filter-type="fit">
                                <div class="filter-accordion-header">
                                    <span class="filter-accordion-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                        </svg>
                                        Fit
                                        <span class="filter-accordion-badge" id="fitBadge">0</span>
                                    </span>
                                    <svg class="filter-accordion-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                                <div class="filter-accordion-content">
                                    <div class="filter-accordion-inner">
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
                                </div>
                            </div>

                            <!-- Price Accordion -->
                            <div class="filter-accordion" id="priceAccordion" data-filter-type="price">
                                <div class="filter-accordion-header">
                                    <span class="filter-accordion-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Price
                                        <span class="filter-accordion-badge" id="priceBadge">0</span>
                                    </span>
                                    <svg class="filter-accordion-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                                <div class="filter-accordion-content">
                                    <div class="filter-accordion-inner">
                                        <div class="price-range-container">
                                            <div class="price-inputs">
                                                <div class="price-input-group">
                                                    <label class="price-input-label">Min</label>
                                                    <input type="text" class="price-input-field" id="minPriceInput" value="$0">
                                                </div>
                                                <span class="price-separator">—</span>
                                                <div class="price-input-group">
                                                    <label class="price-input-label">Max</label>
                                                    <input type="text" class="price-input-field" id="maxPriceInput" value="$500">
                                                </div>
                                            </div>
                                            <div class="price-slider-container">
                                                <div class="price-slider-track-bg"></div>
                                                <div class="price-slider-track" id="priceTrack"></div>
                                                <input type="range" class="price-input-range" id="minPriceSlider" min="0" max="500" value="0" step="5">
                                                <input type="range" class="price-input-range" id="maxPriceSlider" min="0" max="500" value="500" step="5">
                                            </div>
                                            <div class="price-presets">
                                                <button class="price-preset-btn" data-min="0" data-max="100">Under $100</button>
                                                <button class="price-preset-btn" data-min="100" data-max="200">$100 - $200</button>
                                                <button class="price-preset-btn" data-min="200" data-max="300">$200 - $300</button>
                                                <button class="price-preset-btn" data-min="300" data-max="500">$300+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-panel-footer">
                            <button class="apply-filters-btn" id="applyFiltersBtn">Apply Filters</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="filter-controls">
                <button class="clear-all-btn" id="clearAllBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Clear All
                </button>
                <div class="sort-dropdown-wrapper">
                    <select class="sort-dropdown" id="sortDropdown">
                        <option value="">Sort: Featured</option>
                        <option value="asc">Price: Low to High</option>
                        <option value="desc">Price: High to Low</option>
                        <option value="name">Name: A to Z</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Results Info Bar -->
        <div class="results-info-bar">
            <p class="results-count">
                Showing <span id="visibleCount">16</span> of <span id="totalCount">16</span> products
            </p>
        </div>

        <!-- Active Filters Pills -->
        <div class="active-filters-bar" id="activeFiltersBar"></div>
    </div>

    <!-- Main Content -->
    <div class="main-content-wrapper">
        <section class="new-arrivals-section" aria-label="Men's Collection">
            <div class="new-arrivals-container">
                <header class="section-header">
                    <span class="section-label">Premium Menswear</span>
                    <h2 class="section-title">Men's Collection</h2>
                    <p class="section-subtitle">Discover timeless style and modern sophistication with our curated men's collection</p>
                </header>

                <div class="carousel-wrapper">
                    <div class="carousel-track" id="carouselTrack"></div>
                </div>
            </div>

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
    var SVG_HEART = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>';
    var SVG_BAG = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>';
    var SVG_EYE = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>';
    var SVG_SHARE = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" /></svg>';
    var SVG_CLOSE = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>';
    var SVG_CHECK = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>';
    var SVG_SEARCH = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>';

    var products = [
        { id: 1, image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop", alt: "Classic Wool Blazer", badge: "New", name: "Classic Wool Blazer", price: "$425.00", priceValue: 425, category: "outerwear", fit: "slim", colors: ["#2f2716", "#4a4a4a", "#1a472a"], sizes: ["S", "M", "L", "XL"] },
        { id: 2, image: "https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=600&h=800&fit=crop", alt: "Oxford Dress Shirt", badge: "New", name: "Oxford Dress Shirt", price: "$145.00", priceValue: 145, category: "shirts", fit: "regular", colors: ["#ffffff", "#87ceeb", "#c6baa5"], sizes: ["S", "M", "L", "XL"] },
        { id: 3, image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop", alt: "Leather Belt", badge: "New", name: "Leather Belt", price: "$95.00", priceValue: 95, category: "accessories", fit: "regular", colors: ["#2f2716", "#7e5232"], sizes: ["S", "M", "L"] },
        { id: 4, image: "https://images.unsplash.com/photo-1608256246200-53e635b5b65f?w=600&h=800&fit=crop", alt: "Leather Dress Shoes", badge: "New", name: "Leather Dress Shoes", price: "$325.00", priceValue: 325, category: "footwear", fit: "regular", colors: ["#2f2716", "#7e5232"], sizes: ["8", "9", "10", "11", "12"] },
        { id: 5, image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop", alt: "Trench Coat", badge: "New", name: "Trench Coat", price: "$485.00", priceValue: 485, category: "outerwear", fit: "relaxed", colors: ["#c6baa5", "#2f2716"], sizes: ["M", "L", "XL"] },
        { id: 6, image: "https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=600&h=800&fit=crop", alt: "Linen Casual Shirt", badge: "New", name: "Linen Casual Shirt", price: "$125.00", priceValue: 125, category: "shirts", fit: "relaxed", colors: ["#ffffff", "#c6baa5", "#87ceeb"], sizes: ["S", "M", "L", "XL"] },
        { id: 7, image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop", alt: "Silk Tie", badge: "New", name: "Silk Tie", price: "$75.00", priceValue: 75, category: "accessories", fit: "regular", colors: ["#8b0000", "#2f2716", "#1a472a"], sizes: ["One Size"] },
        { id: 8, image: "https://images.unsplash.com/photo-1608256246200-53e635b5b65f?w=600&h=800&fit=crop", alt: "Suede Loafers", badge: "New", name: "Suede Loafers", price: "$275.00", priceValue: 275, category: "footwear", fit: "regular", colors: ["#7e5232", "#2f2716"], sizes: ["8", "9", "10", "11", "12"] },
        { id: 9, image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop", alt: "Denim Jacket", badge: "New", name: "Denim Jacket", price: "$195.00", priceValue: 195, category: "outerwear", fit: "regular", colors: ["#4169e1", "#2f2716"], sizes: ["S", "M", "L", "XL"] },
        { id: 10, image: "https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=600&h=800&fit=crop", alt: "Polo Shirt", badge: "New", name: "Polo Shirt", price: "$95.00", priceValue: 95, category: "shirts", fit: "slim", colors: ["#ffffff", "#2f2716", "#1a472a"], sizes: ["S", "M", "L", "XL"] },
        { id: 11, image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop", alt: "Leather Wallet", badge: "New", name: "Leather Wallet", price: "$125.00", priceValue: 125, category: "accessories", fit: "regular", colors: ["#2f2716", "#7e5232"], sizes: ["One Size"] },
        { id: 12, image: "https://images.unsplash.com/photo-1608256246200-53e635b5b65f?w=600&h=800&fit=crop", alt: "Canvas Sneakers", badge: "New", name: "Canvas Sneakers", price: "$145.00", priceValue: 145, category: "footwear", fit: "regular", colors: ["#ffffff", "#2f2716"], sizes: ["8", "9", "10", "11", "12"] },
        { id: 13, image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop", alt: "Bomber Jacket", badge: "New", name: "Bomber Jacket", price: "$295.00", priceValue: 295, category: "outerwear", fit: "regular", colors: ["#2f2716", "#1a472a"], sizes: ["S", "M", "L", "XL"] },
        { id: 14, image: "https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=600&h=800&fit=crop", alt: "Flannel Shirt", badge: "New", name: "Flannel Shirt", price: "$115.00", priceValue: 115, category: "shirts", fit: "relaxed", colors: ["#8b0000", "#2f2716"], sizes: ["S", "M", "L", "XL"] },
        { id: 15, image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop", alt: "Watch", badge: "New", name: "Watch", price: "$385.00", priceValue: 385, category: "accessories", fit: "regular", colors: ["#c0c0c0", "#ffd700"], sizes: ["One Size"] },
        { id: 16, image: "https://images.unsplash.com/photo-1608256246200-53e635b5b65f?w=600&h=800&fit=crop", alt: "Chelsea Boots", badge: "New", name: "Chelsea Boots", price: "$345.00", priceValue: 345, category: "footwear", fit: "regular", colors: ["#2f2716", "#7e5232"], sizes: ["8", "9", "10", "11", "12"] }
    ];

    var filterState = { category: [], size: [], fit: [], minPrice: 0, maxPrice: 500, sortOrder: '' };
    var isFilterPanelOpen = false;

    function generateProductCard(product) {
        var id = product.id;
        var popupColorBtns = product.colors.map(function(c, i) {
            return '<button class="popup-color-btn' + (i === 0 ? ' selected' : '') + '" style="background-color: ' + c + '" data-color-index="' + i + '" data-product-id="' + id + '"></button>';
        }).join('');
        var popupSizeBtns = product.sizes.map(function(s, i) {
            return '<button class="popup-size-btn' + (i === 0 ? ' selected' : '') + '" data-size-index="' + i + '" data-product-id="' + id + '">' + s + '</button>';
        }).join('');

        return '<article class="product-card" data-product-id="' + id + '"><div class="product-image-wrapper"><img src="' + product.image + '" alt="' + product.alt + '" class="product-image" loading="lazy"><span class="product-badge">' + product.badge + '</span><button class="wishlist-btn" aria-label="Add to wishlist" data-product-id="' + id + '">' + SVG_HEART + '</button><div class="quick-actions"><button class="action-btn cart-btn" data-tooltip="Add to Cart" data-product-id="' + id + '" aria-label="Add to cart">' + SVG_BAG + '</button><button class="action-btn" data-tooltip="Quick View" aria-label="Quick view">' + SVG_EYE + '</button><button class="action-btn" data-tooltip="Share" aria-label="Share product">' + SVG_SHARE + '</button></div><div class="quick-add-popup" id="popup-' + id + '"><div class="popup-form" id="popup-form-' + id + '"><div class="popup-header"><h4>Quick Add</h4><button class="popup-close" data-product-id="' + id + '" aria-label="Close popup">' + SVG_CLOSE + '</button></div><div class="popup-option-group"><label class="popup-option-label">Color</label><div class="popup-colors">' + popupColorBtns + '</div></div><div class="popup-option-group"><label class="popup-option-label">Size</label><div class="popup-sizes">' + popupSizeBtns + '</div></div><div class="popup-option-group"><label class="popup-option-label">Quantity</label><div class="popup-quantity"><button class="qty-btn qty-minus" data-product-id="' + id + '">-</button><span class="qty-value" id="qty-' + id + '">1</span><button class="qty-btn qty-plus" data-product-id="' + id + '">+</button></div></div><button class="popup-add-btn" data-product-id="' + id + '">Add to Cart</button></div><div class="popup-success" id="popup-success-' + id + '"><div class="success-icon">' + SVG_CHECK + '</div><h5>Added to Cart!</h5><p>Item added successfully</p></div></div></div><div class="product-info"><h3 class="product-name">' + product.name + '</h3><p class="product-price">' + product.price + '</p></div></article>';
    }

    function filterAndSortProducts() {
        var filtered = products.filter(function(product) {
            if (filterState.category.length > 0 && filterState.category.indexOf(product.category) === -1) return false;
            if (filterState.size.length > 0) {
                var hasSize = false;
                for (var i = 0; i < filterState.size.length; i++) {
                    if (product.sizes.indexOf(filterState.size[i]) !== -1) { hasSize = true; break; }
                }
                if (!hasSize) return false;
            }
            if (filterState.fit.length > 0 && filterState.fit.indexOf(product.fit) === -1) return false;
            if (product.priceValue < filterState.minPrice || product.priceValue > filterState.maxPrice) return false;
            return true;
        });
        if (filterState.sortOrder === 'asc') filtered.sort(function(a, b) { return a.priceValue - b.priceValue; });
        else if (filterState.sortOrder === 'desc') filtered.sort(function(a, b) { return b.priceValue - a.priceValue; });
        else if (filterState.sortOrder === 'name') filtered.sort(function(a, b) { return a.name.localeCompare(b.name); });
        return filtered;
    }

    function updateCounts() {
        var counts = { outerwear: 0, shirts: 0, accessories: 0, footwear: 0, XS: 0, S: 0, M: 0, L: 0, XL: 0, slim: 0, regular: 0, relaxed: 0 };
        products.forEach(function(p) {
            counts[p.category]++;
            counts[p.fit]++;
            p.sizes.forEach(function(s) { if (counts[s] !== undefined) counts[s]++; });
        });
        Object.keys(counts).forEach(function(key) {
            var el = document.querySelector('[data-count="' + key + '"]');
            if (el) el.textContent = counts[key];
        });
    }

    function updateBadges() {
        var categoryCount = filterState.category.length;
        var sizeCount = filterState.size.length;
        var fitCount = filterState.fit.length;
        var priceCount = (filterState.minPrice > 0 || filterState.maxPrice < 500) ? 1 : 0;
        var totalCount = categoryCount + sizeCount + fitCount + priceCount;

        document.getElementById('categoryBadge').textContent = categoryCount;
        document.getElementById('sizeBadge').textContent = sizeCount;
        document.getElementById('fitBadge').textContent = fitCount;
        document.getElementById('priceBadge').textContent = priceCount;
        document.getElementById('filterTotalBadge').textContent = totalCount;

        document.getElementById('categoryAccordion').classList.toggle('has-selection', categoryCount > 0);
        document.getElementById('sizeAccordion').classList.toggle('has-selection', sizeCount > 0);
        document.getElementById('fitAccordion').classList.toggle('has-selection', fitCount > 0);
        document.getElementById('priceAccordion').classList.toggle('has-selection', priceCount > 0);

        var mainBtn = document.getElementById('mainFilterBtn');
        mainBtn.classList.toggle('has-filters', totalCount > 0);

        // Show/hide Clear All button based on whether any filters are selected
        var clearAllBtn = document.getElementById('clearAllBtn');
        clearAllBtn.classList.toggle('visible', totalCount > 0);
    }

    function renderProducts() {
        var filtered = filterAndSortProducts();
        var carouselTrack = document.getElementById('carouselTrack');
        document.getElementById('visibleCount').textContent = filtered.length;
        document.getElementById('totalCount').textContent = products.length;
        if (filtered.length === 0) {
            carouselTrack.innerHTML = '<div class="no-results"><div class="no-results-icon">' + SVG_SEARCH + '</div><h3>No products found</h3><p>Try adjusting your filters to find what you\'re looking for.</p></div>';
        } else {
            carouselTrack.innerHTML = filtered.map(generateProductCard).join('');
        }
        updateActiveFilters();
        updateBadges();
    }

    function updateActiveFilters() {
        var bar = document.getElementById('activeFiltersBar');
        var pills = [];
        filterState.category.forEach(function(c) {
            pills.push('<div class="filter-pill">' + c + '<button data-remove="category:' + c + '"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></button></div>');
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
        bar.innerHTML = pills.join('');
        bar.classList.toggle('empty', pills.length === 0);
    }

    function openFilterPanel() {
        document.getElementById('mainFilterPanel').classList.add('open');
        document.getElementById('mainFilterBtn').classList.add('open');
        document.body.classList.add('filter-open');
        isFilterPanelOpen = true;
    }

    function closeFilterPanel() {
        document.getElementById('mainFilterPanel').classList.remove('open');
        document.getElementById('mainFilterBtn').classList.remove('open');
        document.body.classList.remove('filter-open');
        isFilterPanelOpen = false;
    }

    function toggleAccordion(accordion) {
        var isOpen = accordion.classList.contains('open');
        // Close all accordions
        document.querySelectorAll('.filter-accordion').forEach(function(acc) {
            acc.classList.remove('open');
        });
        // Open clicked one if it was closed
        if (!isOpen) {
            accordion.classList.add('open');
        }
    }

    function updatePriceSlider() {
        var minSlider = document.getElementById('minPriceSlider');
        var maxSlider = document.getElementById('maxPriceSlider');
        var minInput = document.getElementById('minPriceInput');
        var maxInput = document.getElementById('maxPriceInput');
        var track = document.getElementById('priceTrack');

        var min = parseInt(minSlider.value);
        var max = parseInt(maxSlider.value);
        if (min > max - 10) { minSlider.value = max - 10; min = max - 10; }

        filterState.minPrice = min;
        filterState.maxPrice = max;
        minInput.value = '$' + min;
        maxInput.value = '$' + max;

        var percentMin = (min / 500) * 100;
        var percentMax = (max / 500) * 100;
        track.style.left = percentMin + '%';
        track.style.width = (percentMax - percentMin) + '%';

        document.querySelectorAll('.price-preset-btn').forEach(function(btn) {
            var presetMin = parseInt(btn.getAttribute('data-min'));
            var presetMax = parseInt(btn.getAttribute('data-max'));
            btn.classList.toggle('active', min === presetMin && max === presetMax);
        });

        renderProducts();
    }

    function clearAllFilters() {
        filterState = { category: [], size: [], fit: [], minPrice: 0, maxPrice: 500, sortOrder: '' };
        document.querySelectorAll('input[type="checkbox"]').forEach(function(cb) { cb.checked = false; });
        document.getElementById('minPriceSlider').value = 0;
        document.getElementById('maxPriceSlider').value = 500;
        document.getElementById('sortDropdown').value = '';
        updatePriceSlider();
        renderProducts();
    }

    function initFilters() {
        // Checkbox filters
        document.querySelectorAll('input[type="checkbox"][data-filter]').forEach(function(cb) {
            cb.addEventListener('change', function() {
                var filterType = this.getAttribute('data-filter');
                var value = this.value;
                if (this.checked) {
                    if (filterState[filterType].indexOf(value) === -1) filterState[filterType].push(value);
                } else {
                    var idx = filterState[filterType].indexOf(value);
                    if (idx > -1) filterState[filterType].splice(idx, 1);
                }
                renderProducts();
            });
        });

        // Main filter button
        document.getElementById('mainFilterBtn').addEventListener('click', function(e) {
            e.stopPropagation();
            if (isFilterPanelOpen) closeFilterPanel();
            else openFilterPanel();
        });

        // Close filter panel when clicking outside
        document.addEventListener('click', function(e) {
            if (isFilterPanelOpen) {
                var filterPanel = document.getElementById('mainFilterPanel');
                var filterBtn = document.getElementById('mainFilterBtn');
                if (!filterPanel.contains(e.target) && !filterBtn.contains(e.target)) {
                    closeFilterPanel();
                }
            }
        });

        // Accordion headers
        document.querySelectorAll('.filter-accordion-header').forEach(function(header) {
            header.addEventListener('click', function() {
                var accordion = this.closest('.filter-accordion');
                toggleAccordion(accordion);
            });
        });

        // Price sliders
        document.getElementById('minPriceSlider').addEventListener('input', updatePriceSlider);
        document.getElementById('maxPriceSlider').addEventListener('input', updatePriceSlider);

        // Price inputs
        document.getElementById('minPriceInput').addEventListener('change', function() {
            var val = parseInt(this.value.replace(/[^0-9]/g, '')) || 0;
            val = Math.max(0, Math.min(val, 490));
            document.getElementById('minPriceSlider').value = val;
            updatePriceSlider();
        });
        document.getElementById('maxPriceInput').addEventListener('change', function() {
            var val = parseInt(this.value.replace(/[^0-9]/g, '')) || 500;
            val = Math.max(10, Math.min(val, 500));
            document.getElementById('maxPriceSlider').value = val;
            updatePriceSlider();
        });

        // Price presets
        document.querySelectorAll('.price-preset-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.getElementById('minPriceSlider').value = this.getAttribute('data-min');
                document.getElementById('maxPriceSlider').value = this.getAttribute('data-max');
                updatePriceSlider();
            });
        });

        // Sort dropdown
        document.getElementById('sortDropdown').addEventListener('change', function() {
            filterState.sortOrder = this.value;
            renderProducts();
        });

        // Clear all buttons
        document.getElementById('clearAllBtn').addEventListener('click', clearAllFilters);
        document.getElementById('clearAllFiltersBtn').addEventListener('click', clearAllFilters);

        // Apply button (mobile)
        document.getElementById('applyFiltersBtn').addEventListener('click', closeFilterPanel);

        // Remove filter pills
        document.getElementById('activeFiltersBar').addEventListener('click', function(e) {
            var btn = e.target.closest('button[data-remove]');
            if (btn) {
                var removeData = btn.getAttribute('data-remove').split(':');
                if (removeData[0] === 'price') {
                    filterState.minPrice = 0;
                    filterState.maxPrice = 500;
                    document.getElementById('minPriceSlider').value = 0;
                    document.getElementById('maxPriceSlider').value = 500;
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

        updatePriceSlider();
    }

    updateCounts();
    renderProducts();
    initFilters();

    // Product card events
    document.querySelector('.new-arrivals-section').addEventListener('click', function(e) {
        var target = e.target;
        var wishlistBtn = target.closest('.wishlist-btn');
        if (wishlistBtn) { wishlistBtn.classList.toggle('active'); return; }
        var cartBtn = target.closest('.cart-btn');
        if (cartBtn) { var popup = document.getElementById('popup-' + cartBtn.getAttribute('data-product-id')); if (popup) popup.classList.add('active'); return; }
        var closeBtn = target.closest('.popup-close');
        if (closeBtn) { var id = closeBtn.getAttribute('data-product-id'); var popup = document.getElementById('popup-' + id); if (popup) popup.classList.remove('active'); var form = document.getElementById('popup-form-' + id); var success = document.getElementById('popup-success-' + id); if (form) form.classList.remove('hide'); if (success) success.classList.remove('show'); return; }
        var colorBtn = target.closest('.popup-color-btn');
        if (colorBtn) { colorBtn.parentElement.querySelectorAll('.popup-color-btn').forEach(function(b) { b.classList.remove('selected'); }); colorBtn.classList.add('selected'); return; }
        var sizeBtn = target.closest('.popup-size-btn');
        if (sizeBtn) { sizeBtn.parentElement.querySelectorAll('.popup-size-btn').forEach(function(b) { b.classList.remove('selected'); }); sizeBtn.classList.add('selected'); return; }
        var qtyMinus = target.closest('.qty-minus');
        if (qtyMinus) { var qtyEl = document.getElementById('qty-' + qtyMinus.getAttribute('data-product-id')); if (qtyEl) { var val = parseInt(qtyEl.textContent); if (val > 1) qtyEl.textContent = val - 1; } return; }
        var qtyPlus = target.closest('.qty-plus');
        if (qtyPlus) { var qtyEl = document.getElementById('qty-' + qtyPlus.getAttribute('data-product-id')); if (qtyEl) qtyEl.textContent = parseInt(qtyEl.textContent) + 1; return; }
        var addBtn = target.closest('.popup-add-btn');
        if (addBtn) {
            var id = addBtn.getAttribute('data-product-id');
            var form = document.getElementById('popup-form-' + id);
            var success = document.getElementById('popup-success-' + id);
            if (form) form.classList.add('hide');
            if (success) success.classList.add('show');
            var toast = document.getElementById('toast');
            toast.classList.add('show');
            setTimeout(function() { toast.classList.remove('show'); }, 3000);
            setTimeout(function() {
                var popup = document.getElementById('popup-' + id);
                if (popup) popup.classList.remove('active');
                if (form) form.classList.remove('hide');
                if (success) success.classList.remove('show');
                var qtyEl = document.getElementById('qty-' + id);
                if (qtyEl) qtyEl.textContent = '1';
            }, 2000);
        }
    });
})();
</script>

</body>
</html>