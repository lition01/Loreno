

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
    // DATA SOURCE (products.js unification)
    // ========================================
    var DATA = Array.isArray(typeof summerCollection !== 'undefined' ? summerCollection : undefined)
        ? summerCollection
        : (Array.isArray(typeof products !== 'undefined' ? products : undefined) ? products : []);

    // ========================================
    // FILTER STATE
    // ========================================
    var filterState = {
        category: [],
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

        var hasAriaOnColors = (typeof product.hasAriaOnColors !== 'undefined') ? product.hasAriaOnColors : true;
        var hasAriaOnQty    = (typeof product.hasAriaOnQty    !== 'undefined') ? product.hasAriaOnQty    : true;
        var hasSuccessIcon  = (typeof product.hasSuccessIcon  !== 'undefined') ? product.hasSuccessIcon  : true;
        var altText         = product.alt || product.name || 'Product';
        var cartDataId      = product.cartBtnDataProductId || String(id);

        // Build color buttons for popup
        var popupColorBtns = '';
        for (var ci = 0; ci < product.colors.length; ci++) {
            var selectedClass = ci === 0 ? ' selected' : '';
            if (hasAriaOnColors) {
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
        if (hasAriaOnQty) {
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
        if (hasSuccessIcon) {
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
            '                            alt="' + altText + '"\n' +
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
            '                            <button class="action-btn cart-btn" data-tooltip="Add to Cart" data-product-id="' + cartDataId + '" aria-label="Add to cart">\n' +
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
        var filtered = DATA.filter(function(product) {
            // Category filter
            if (filterState.category.length > 0 && filterState.category.indexOf(product.category) === -1) return false;
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
            outerwear: 0, shirts: 0, accessories: 0, footwear: 0,
            XS: 0, S: 0, M: 0, L: 0, XL: 0,
            slim: 0, regular: 0, relaxed: 0
        };
        DATA.forEach(function(p) {
            counts[p.category]++;
            counts[p.fit]++;
            // Count sizes
            for (var i = 0; i < p.sizes.length; i++) {
                if (counts[p.sizes[i]] !== undefined) {
                    counts[p.sizes[i]]++;
                }
            }
        });
        Object.keys(counts).forEach(function(key) {
            var els = document.querySelectorAll('[data-count="' + key + '"]');
            els.forEach(function(el) {
                el.textContent = counts[key];
            });
        });
    }

    // ========================================
    // RENDER PRODUCTS
    // ========================================
    function renderProducts() {
        var filtered = filterAndSortProducts();
        var carouselTrack = document.getElementById('carouselTrack');
        
        document.getElementById('visibleCount').textContent = filtered.length;
        document.getElementById('totalCount').textContent = DATA.length;

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
    // CLOSE ALL POPUPS HELPER
    // ========================================
    function closeAllFilterPopups() {
        var filterPopup = document.getElementById('filterPopup');
        var filterOverlay = document.getElementById('filterPopupOverlay');
        var miniOverlay = document.getElementById('miniPopupOverlay');
        var orderPopup = document.getElementById('orderPopup');
        var orderOverlay = document.getElementById('orderPopupOverlay');

        filterPopup.classList.remove('active');
        filterOverlay.classList.remove('active');
        miniOverlay.classList.remove('active');
        orderPopup.classList.remove('active');
        orderOverlay.classList.remove('active');

        // Close all mini popups
        document.querySelectorAll('.mini-popup').forEach(function(mp) {
            mp.classList.remove('active');
        });
    }

    function closeMiniPopups() {
        document.querySelectorAll('.mini-popup').forEach(function(mp) {
            mp.classList.remove('active');
        });
        var miniOverlay = document.getElementById('miniPopupOverlay');
        miniOverlay.classList.remove('active');
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

        // Sort dropdown (hidden, but kept for compatibility)
        var sortDropdown = document.getElementById('sortDropdown');
        if (sortDropdown) {
            sortDropdown.addEventListener('change', function() {
                filterState.sortOrder = this.value;
                renderProducts();
            });
        }

        // Order radio buttons
        document.querySelectorAll('input[name="sortOrder"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                filterState.sortOrder = this.value;
                // Also sync hidden dropdown
                if (sortDropdown) sortDropdown.value = this.value;
                renderProducts();
            });
        });

        // Clear all
        document.getElementById('clearAllBtn').addEventListener('click', function() {
            filterState = { category: [], size: [], fit: [], minPrice: 0, maxPrice: 500, sortOrder: '' };
            document.querySelectorAll('input[type="checkbox"]').forEach(function(cb) { cb.checked = false; });
            document.querySelectorAll('input[name="sortOrder"]').forEach(function(r) { r.checked = r.value === ''; });
            minSlider.value = 0;
            maxSlider.value = 500;
            if (sortDropdown) sortDropdown.value = '';
            updatePriceSlider();
            renderProducts();
            closeAllFilterPopups();
        });

        // ========================================
        // FILTER BUTTON & POPUP LOGIC
        // ========================================
        var filterTriggerBtn = document.getElementById('filterTriggerBtn');
        var filterPopup = document.getElementById('filterPopup');
        var filterPopupOverlay = document.getElementById('filterPopupOverlay');
        var filterPopupClose = document.getElementById('filterPopupClose');

        filterTriggerBtn.addEventListener('click', function() {
            // Close order popup if open
            document.getElementById('orderPopup').classList.remove('active');
            document.getElementById('orderPopupOverlay').classList.remove('active');
            closeMiniPopups();

            filterPopup.classList.toggle('active');
            filterPopupOverlay.classList.toggle('active');
        });

        filterPopupClose.addEventListener('click', function() {
            filterPopup.classList.remove('active');
            filterPopupOverlay.classList.remove('active');
            closeMiniPopups();
        });

        filterPopupOverlay.addEventListener('click', function() {
            filterPopup.classList.remove('active');
            filterPopupOverlay.classList.remove('active');
            closeMiniPopups();
        });

        // ========================================
        // ORDER BUTTON & POPUP LOGIC
        // ========================================
        var orderTriggerBtn = document.getElementById('orderTriggerBtn');
        var orderPopup = document.getElementById('orderPopup');
        var orderPopupOverlay = document.getElementById('orderPopupOverlay');
        var orderPopupClose = document.getElementById('orderPopupClose');

        orderTriggerBtn.addEventListener('click', function() {
            // Close filter popup if open
            filterPopup.classList.remove('active');
            filterPopupOverlay.classList.remove('active');
            closeMiniPopups();

            orderPopup.classList.toggle('active');
            orderPopupOverlay.classList.toggle('active');
        });

        orderPopupClose.addEventListener('click', function() {
            orderPopup.classList.remove('active');
            orderPopupOverlay.classList.remove('active');
        });

        orderPopupOverlay.addEventListener('click', function() {
            orderPopup.classList.remove('active');
            orderPopupOverlay.classList.remove('active');
        });

        // ========================================
        // FILTER CATEGORY ITEMS -> MINI POPUPS
        // ========================================
        var miniPopupMap = {
            'category': document.getElementById('miniPopupCategory'),
            'size': document.getElementById('miniPopupSize'),
            'fit': document.getElementById('miniPopupFit'),
            'price': document.getElementById('miniPopupPrice')
        };
        var miniPopupOverlay = document.getElementById('miniPopupOverlay');

        document.querySelectorAll('.filter-category-item').forEach(function(item) {
            item.addEventListener('click', function() {
                var cat = this.getAttribute('data-filter-cat');
                var miniPopup = miniPopupMap[cat];
                if (miniPopup) {
                    // Close other mini popups
                    Object.keys(miniPopupMap).forEach(function(key) {
                        if (key !== cat) miniPopupMap[key].classList.remove('active');
                    });
                    miniPopup.classList.toggle('active');
                    // On mobile, show overlay for mini popup
                    if (window.innerWidth <= 900) {
                        miniPopupOverlay.classList.add('active');
                    }
                }
            });
        });

        // Mini popup back buttons
        document.querySelectorAll('.mini-popup-back').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var cat = this.getAttribute('data-back');
                if (miniPopupMap[cat]) {
                    miniPopupMap[cat].classList.remove('active');
                }
                if (window.innerWidth <= 900) {
                    miniPopupOverlay.classList.remove('active');
                }
            });
        });

        // Mini popup close buttons
        document.querySelectorAll('.mini-popup-close').forEach(function(btn) {
            btn.addEventListener('click', function() {
                closeAllFilterPopups();
            });
        });

        miniPopupOverlay.addEventListener('click', function() {
            closeMiniPopups();
            miniPopupOverlay.classList.remove('active');
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
    var section = document.getElementById('carouselTrack');

    section.addEventListener('click', function(e) {
        var target = e.target;

        var wishlistBtn = target.closest('.wishlist-btn');
        if (wishlistBtn) {
            var wishlistProductId = parseInt(wishlistBtn.getAttribute('data-product-id'), 10);
            if (typeof toggleWishlist === 'function' && !isNaN(wishlistProductId)) {
                toggleWishlist(wishlistProductId);
            } else {
                wishlistBtn.classList.toggle('active');
            }
            return;
        }

        var cartBtn = target.closest('.cart-btn');
        if (cartBtn) {
            var cartProductId = parseInt(cartBtn.getAttribute('data-product-id'), 10);
            if (typeof togglePopup === 'function' && !isNaN(cartProductId)) {
                togglePopup(cartProductId);
            } else {
                var fallbackPopup = document.getElementById('popup-' + cartProductId);
                if (fallbackPopup) {
                    fallbackPopup.classList.add('active');
                }
            }
            return;
        }

        var closeBtn = target.closest('.popup-close');
        if (closeBtn) {
            var closeProductId = parseInt(closeBtn.getAttribute('data-product-id'), 10);
            if (typeof closePopup === 'function' && !isNaN(closeProductId)) {
                closePopup(closeProductId);
            } else {
                var closePopupEl = document.getElementById('popup-' + closeProductId);
                if (closePopupEl) {
                    closePopupEl.classList.remove('active');
                }
            }
            return;
        }

        var colorBtn = target.closest('.popup-color-btn');
        if (colorBtn) {
            var colorProductId = parseInt(colorBtn.getAttribute('data-product-id'), 10);
            var colorIndex = parseInt(colorBtn.getAttribute('data-color-index'), 10);
            if (typeof selectColor === 'function' && !isNaN(colorProductId) && !isNaN(colorIndex)) {
                selectColor(colorProductId, colorIndex);
            } else {
                var colorsContainer = colorBtn.parentElement;
                var allColorBtns = colorsContainer.querySelectorAll('.popup-color-btn');
                for (var i = 0; i < allColorBtns.length; i++) {
                    allColorBtns[i].classList.remove('selected');
                }
                colorBtn.classList.add('selected');
            }
            return;
        }

        var sizeBtn = target.closest('.popup-size-btn');
        if (sizeBtn) {
            var sizeProductId = parseInt(sizeBtn.getAttribute('data-product-id'), 10);
            var sizeIndex = parseInt(sizeBtn.getAttribute('data-size-index'), 10);
            if (typeof selectSize === 'function' && !isNaN(sizeProductId) && !isNaN(sizeIndex)) {
                selectSize(sizeProductId, sizeIndex);
            } else {
                var sizesContainer = sizeBtn.parentElement;
                var allSizeBtns = sizesContainer.querySelectorAll('.popup-size-btn');
                for (var j = 0; j < allSizeBtns.length; j++) {
                    allSizeBtns[j].classList.remove('selected');
                }
                sizeBtn.classList.add('selected');
            }
            return;
        }

        var qtyMinus = target.closest('.qty-minus');
        if (qtyMinus) {
            var minusProductId = parseInt(qtyMinus.getAttribute('data-product-id'), 10);
            if (typeof updateQuantity === 'function' && !isNaN(minusProductId)) {
                updateQuantity(minusProductId, -1);
            } else {
                var qtyElMinus = document.getElementById('qty-' + minusProductId);
                if (qtyElMinus) {
                    var valMinus = parseInt(qtyElMinus.textContent, 10);
                    if (valMinus > 1) qtyElMinus.textContent = valMinus - 1;
                }
            }
            return;
        }

        var qtyPlus = target.closest('.qty-plus');
        if (qtyPlus) {
            var plusProductId = parseInt(qtyPlus.getAttribute('data-product-id'), 10);
            if (typeof updateQuantity === 'function' && !isNaN(plusProductId)) {
                updateQuantity(plusProductId, 1);
            } else {
                var qtyElPlus = document.getElementById('qty-' + plusProductId);
                if (qtyElPlus) {
                    var valPlus = parseInt(qtyElPlus.textContent, 10);
                    qtyElPlus.textContent = valPlus + 1;
                }
            }
            return;
        }

        var addBtn = target.closest('.popup-add-btn');
        if (addBtn) {
            var addProductId = parseInt(addBtn.getAttribute('data-product-id'), 10);
            if (typeof addToCartFromPopup === 'function' && !isNaN(addProductId)) {
                addToCartFromPopup(addProductId);
            }
            if (typeof showToast === 'function') {
                showToast('Item added to cart');
            } else {
                var toast = document.getElementById('toast');
                var toastMsg = document.getElementById('toastMessage');
                if (toast && toastMsg) {
                    toastMsg.textContent = 'Item added to cart';
                    toast.classList.add('show');
                    setTimeout(function() {
                        toast.classList.remove('show');
                    }, 3000);
                }
            }
            return;
        }
    });
})();
