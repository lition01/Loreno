// ===============================
// ======= STATE (DATA) =========
// ===============================

// --- Cart ---
window.cart = window.cart || [];

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(window.cart));
}

function loadCart() {
    const savedCart = localStorage.getItem('cart');
    if (savedCart) {
        window.cart.length = 0;
        window.cart.push(...JSON.parse(savedCart));
    }
}

// --- Wishlist ---
window.wishlist = window.wishlist || [];

function saveWishlist() {
    localStorage.setItem('wishlist', JSON.stringify(window.wishlist));
}

function loadWishlist() {
    const savedWishlist = localStorage.getItem('wishlist');
    if (savedWishlist) {
        window.wishlist.length = 0;
        window.wishlist.push(...JSON.parse(savedWishlist));
    }
}

// --- Carousel ---
let currentIndex = 0;
let itemsPerView = 4;
const totalProducts = 8;

// --- Popup State ---
const popupState = {};
let activePopupId = null;

// ===============================
// ======= DOM HELPERS ==========
// ===============================

// Helper to get DOM elements safely
const getEl = (id) => document.getElementById(id);
const getQuery = (selector) => document.querySelector(selector);


// ===============================
// ======= DOM ELEMENTS =========
// ===============================

// --- Carousel ---
const carouselTrack = document.getElementById('carouselTrack');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const paginationDots = document.getElementById('paginationDots');

// --- Toast ---
const toast = document.getElementById('toast');
const toastMessage = document.getElementById('toastMessage');

// --- Cart ---
const cartBtn = document.getElementById('cartBtn');
const cartSidebar = document.getElementById('cartSidebar');
const cartOverlay = document.getElementById('cartOverlay');
const cartClose = document.getElementById('cartClose');
const cartBody = document.querySelector('.cart-body');
const cartCount = document.querySelector('.cart-count');

// --- Wishlist ---
const wishlistBtn = document.getElementById('wishlistBtn');
const wishlistCount = document.getElementById('wishlistCount');
const wishlistSidebar = document.getElementById('wishlistSidebar');
const wishlistOverlay = document.getElementById('wishlistOverlay');
const wishlistBody = document.getElementById('wishlistBody');
const wishlistClose = document.getElementById('wishlistClose');
const wishlistItemsCount = document.getElementById('wishlistItemsCount');

if (wishlistBtn) {
    wishlistBtn.addEventListener('click', () => {
        openWishlistSidebar();
    });
}


// ===============================
// ======= CART SIDEBAR =========
// ===============================

function openCart() {
    const sidebar = getEl('cartSidebar');
    const overlay = getEl('cartOverlay');
    if (sidebar) sidebar.classList.add('active');
    if (overlay) overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeCart() {
    const sidebar = getEl('cartSidebar');
    const overlay = getEl('cartOverlay');
    if (sidebar) sidebar.classList.remove('active');
    if (overlay) overlay.classList.remove('active');
    document.body.style.overflow = '';
}

cartBtn.addEventListener('click', openCart);
cartClose.addEventListener('click', closeCart);
cartOverlay.addEventListener('click', closeCart);

// Delegation for checkout button
document.addEventListener('click', (e) => {
    const checkoutBtn = e.target.closest('.checkout-btn');
    if (checkoutBtn) {
        const isLoggedIn = localStorage.getItem('isLoggedIn');
        if (isLoggedIn !== 'true') {
            e.preventDefault();
            
            // Show the auth modal instead of just a toast
            const authModal = document.getElementById('authModal');
            if (authModal) {
                authModal.classList.add('active');
                closeCart(); // Close the cart sidebar to show the modal clearly
            } else {
                // Fallback to toast if modal not found
                showToast('Ju lutem hyni në llogari për të bërë porosinë');
                setTimeout(() => {
                    window.location.href = 'login.php?redirect=' + encodeURIComponent('checkout.php');
                }, 1500);
            }
        }
    }

    // Close auth modal
    const closeAuthBtn = e.target.closest('#closeAuthModal');
    const authModalOverlay = e.target.closest('.auth-modal-overlay');
    if (closeAuthBtn || (authModalOverlay && e.target === authModalOverlay)) {
        const authModal = document.getElementById('authModal');
        if (authModal) authModal.classList.remove('active');
    }
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeCart();
});


// ===============================
// ======= INIT ==================
// ===============================

document.addEventListener('DOMContentLoaded', () => {

    // Load data
    loadCart();
    loadWishlist();

    // Handle user auth display in navbar
    const userAuthSection = document.getElementById('userAuthSection');
    if (userAuthSection) {
        const isLoggedIn = localStorage.getItem('isLoggedIn');
        if (isLoggedIn === 'true') {
            const userEmail = localStorage.getItem('userEmail') || 'User';
            const shortName = userEmail.split('@')[0];
            const firstLetter = shortName.charAt(0);
            
            userAuthSection.innerHTML = `
                <div class="user-profile-wrapper" id="userProfileWrapper">
                    <button class="user-profile-btn" id="userProfileBtn">
                        <div class="user-avatar-circle">${firstLetter}</div>
                        <span class="user-name">${shortName}</span>
                        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="user-dropdown-menu">
                        <div class="user-dropdown-header">
                            <span>Account</span>
                            <strong>${userEmail}</strong>
                        </div>
                        <a href="dashboard.php" class="user-dropdown-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            My Profile
                        </a>
                        <a href="orders.php" class="user-dropdown-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            My Orders
                        </a>
                        <button class="user-dropdown-item logout" id="logoutBtn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            Logout
                        </button>
                    </div>
                </div>
            `;

            // Dropdown toggle logic
            const profileBtn = document.getElementById('userProfileBtn');
            const profileWrapper = document.getElementById('userProfileWrapper');
            
            if (profileBtn && profileWrapper) {
                profileBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    profileWrapper.classList.toggle('active');
                });

                // Close dropdown on click outside
                document.addEventListener('click', (e) => {
                    if (!profileWrapper.contains(e.target)) {
                        profileWrapper.classList.remove('active');
                    }
                });
            }

            // Add logout functionality
            const logoutBtn = document.getElementById('logoutBtn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', () => {
                    localStorage.removeItem('isLoggedIn');
                    localStorage.removeItem('userEmail');
                    window.location.reload();
                });
            }
        }
    }

    // Render UI
    renderCart();
    renderWishlist();

    // Initialize components
    initCarousel();
    initPopups();
    initWishlist();
    initNavbarWishlist();
    initQuickView();
});

// ======= Quick View Button Handler =======
function initQuickView() {
    // Find all Quick View buttons (buttons with "Quick View" tooltip)
    document.querySelectorAll('.action-btn[data-tooltip="Quick View"]').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            // Find the parent product card
            const productCard = btn.closest('.product-card');
            if (productCard) {
                const productId = productCard.dataset.productId;
                if (productId) {
                    // Redirect to product page
                    window.location.href = `page-product.php?id=${productId}`;
                }
            }
        });
    });
}

// ========================================
// NAVBAR WISHLIST BUTTON & SIDEBAR
// ========================================
function initNavbarWishlist() {
    // Open wishlist sidebar
    if (wishlistBtn) {
        wishlistBtn.addEventListener('click', () => {
            openWishlistSidebar();
        });
    }

    // Close wishlist sidebar
    if (wishlistClose) {
        wishlistClose.addEventListener('click', () => {
            closeWishlistSidebar();
        });
    }

    // Close on overlay click
    if (wishlistOverlay) {
        wishlistOverlay.addEventListener('click', () => {
            closeWishlistSidebar();
        });
    }

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && wishlistSidebar && wishlistSidebar.classList.contains('active')) {
            closeWishlistSidebar();
        }
    });
}

function openWishlistSidebar() {
    if (!wishlistSidebar || !wishlistOverlay) return;
    renderWishlist();
    wishlistSidebar.classList.add('active');
    wishlistOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeWishlistSidebar() {
    if (!wishlistSidebar || !wishlistOverlay) return;
    wishlistSidebar.classList.remove('active');
    wishlistOverlay.classList.remove('active');
    document.body.style.overflow = '';
}

function renderWishlist() {
    if (!wishlistBody || !wishlistItemsCount) return;

    const count = wishlist.length;
    if (wishlistItemsCount) {
        const itemText = count === 1 ? 'item' : 'items';
        wishlistItemsCount.textContent = `(${count} ${itemText})`;
    }

    if (count === 0) {
        wishlistBody.innerHTML = `
            <div class="wishlist-empty">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
                <p>Your wishlist is empty</p>
            </div>
        `;
        return;
    }

    wishlistBody.innerHTML = wishlist.map((product, index) => {
        const colors = product.colors || [];
        const sizes = product.sizes || ['XS', 'S', 'M', 'L', 'XL'];
        const uniqueId = `wishlist-${product.id}`;
        
        return `
            <div class="wishlist-item" data-product-id="${product.id}" data-index="${index}">
                <div class="wishlist-item-content">
                    <div class="wishlist-item-img">
                        <img src="${product.image}" alt="${product.name}" loading="lazy">
                    </div>
                    <div class="wishlist-item-info">
                        <div class="wishlist-item-header">
                            <h3 class="wishlist-item-name">${product.name}</h3>
                            <button class="wishlist-item-remove" 
                                    data-index="${index}"
                                    data-product-id="${product.id}"
                                    aria-label="Remove from wishlist">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <div class="wishlist-item-price">$${product.price.toFixed(2)}</div>
                    </div>
                </div>
                <div class="wishlist-item-options">
                    ${colors.length > 0 ? `
                    <div class="wishlist-option-group">
                        <label class="wishlist-option-label">Color</label>
                        <div class="wishlist-colors">
                            ${colors.map((color, index) => `
                                <button class="wishlist-color-btn ${index === 0 ? 'selected' : ''}" 
                                        style="background-color: ${color}"
                                        data-color-index="${index}"
                                        data-product-id="${product.id}"
                                        aria-label="Select color"></button>
                            `).join('')}
                        </div>
                    </div>
                    ` : ''}
                    <div class="wishlist-option-group">
                        <label class="wishlist-option-label">Size</label>
                        <div class="wishlist-sizes">
                            ${sizes.map((size, index) => `
                                <button class="wishlist-size-btn ${index === 0 ? 'selected' : ''}" 
                                        data-size-index="${index}"
                                        data-product-id="${product.id}">${size}</button>
                            `).join('')}
                        </div>
                    </div>
                    <div class="wishlist-option-group">
                        <label class="wishlist-option-label">Quantity</label>
                        <div class="wishlist-quantity">
                            <div class="wishlist-qty-controls">
                                <button class="wishlist-qty-btn" 
                                        data-product-id="${product.id}"
                                        data-delta="-1"
                                        aria-label="Decrease quantity">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                                <span class="wishlist-qty-value" id="wishlist-qty-${product.id}">1</span>
                                <button class="wishlist-qty-btn" 
                                        data-product-id="${product.id}"
                                        data-delta="1"
                                        aria-label="Increase quantity">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button class="wishlist-add-to-cart" 
                            data-product-id="${product.id}"
                            aria-label="Add to cart">
                        Add to Cart
                    </button>
                </div>
            </div>
        `;
    }).join('');

    // Attach event listeners (REMOVED: Now handled by delegation in initWishlist)
}

function addToCartFromWishlist(productId) {
    const idx = wishlist.findIndex(p => String(p.id) === String(productId));
    const product = idx > -1 ? wishlist[idx] : null;
    if (!product) return;

    const item = document.querySelector(`.wishlist-item[data-product-id="${productId}"]`);
    if (!item) return;

    // Get selected color
    const selectedColorBtn = item.querySelector('.wishlist-color-btn.selected');
    const color = selectedColorBtn ? selectedColorBtn.style.backgroundColor : (product.colors[0] || '');

    // Get selected size
    const selectedSizeBtn = item.querySelector('.wishlist-size-btn.selected');
    const size = selectedSizeBtn ? selectedSizeBtn.textContent.trim() : (product.sizes[0] || 'M');

    // Get quantity
    const qtyEl = document.getElementById(`wishlist-qty-${productId}`);
    const quantity = qtyEl ? parseInt(qtyEl.textContent) || 1 : 1;

    // Add to cart
    const existingIndex = cart.findIndex(item => item.id === productId && item.color === color && item.size === size);
    if (existingIndex > -1) {
        cart[existingIndex].quantity += quantity;
    } else {
        cart.push({
            id: productId,
            name: product.name,
            price: product.price,
            color: color,
            size: size,
            quantity: quantity,
            image: product.image
        });
    }

    renderCart();
    saveCart();

    showToast('Added to cart!');
}

function addToCart(product, quantity, color, size) {
    if (!product) return;
    
    const existingIndex = window.cart.findIndex(item => 
        String(item.id) === String(product.id) && 
        item.color === color && 
        item.size === size
    );

    if (existingIndex > -1) {
        window.cart[existingIndex].quantity += quantity;
    } else {
        window.cart.push({
            id: product.id,
            name: product.name,
            price: product.price,
            color: color,
            size: size,
            quantity: quantity,
            image: product.image
        });
    }

    renderCart();
    saveCart();
    showToast('Added to cart!');
}

window.addToCart = addToCart;

// ========================================
// CAROUSEL FUNCTIONS
// ========================================
function initCarousel() {
    if (!carouselTrack || !prevBtn || !nextBtn || !paginationDots) {
        return;
    }

    updateItemsPerView();
    createPaginationDots();
    updateCarousel();
    
    window.addEventListener('resize', () => {
        updateItemsPerView();
        createPaginationDots();
        updateCarousel();
    });

    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    nextBtn.addEventListener('click', () => {
        const maxIndex = Math.max(0, totalProducts - itemsPerView);
        if (currentIndex < maxIndex) {
            currentIndex++;
            updateCarousel();
        }
    });
}

function updateItemsPerView() {
    const width = window.innerWidth;
    if (width <= 600) itemsPerView = 1;
    else if (width <= 900) itemsPerView = 2;
    else if (width <= 1200) itemsPerView = 3;
    else itemsPerView = 4;

    const maxIndex = Math.max(0, totalProducts - itemsPerView);
    if (currentIndex > maxIndex) currentIndex = maxIndex;
}

function updateCarousel() {
    const gap = window.innerWidth <= 600 ? 16 : 24;
    const cardWidth = carouselTrack.children[0]?.offsetWidth || 0;
    const offset = currentIndex * (cardWidth + gap);
    carouselTrack.style.transform = `translateX(-${offset}px)`;

    const maxIndex = Math.max(0, totalProducts - itemsPerView);
    prevBtn.disabled = currentIndex === 0;
    nextBtn.disabled = currentIndex >= maxIndex;

    updatePaginationDots();
}

function createPaginationDots() {
    const totalPages = Math.max(1, totalProducts - itemsPerView + 1);
    paginationDots.innerHTML = '';

    for (let i = 0; i < totalPages; i++) {
        const dot = document.createElement('button');
        dot.className = 'dot';
        dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
        dot.addEventListener('click', () => {
            currentIndex = i;
            updateCarousel();
        });
        paginationDots.appendChild(dot);
    }

    updatePaginationDots();
}

function updatePaginationDots() {
    const dots = paginationDots.querySelectorAll('.dot');
    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === currentIndex);
    });
}

// ========================================
// POPUP FUNCTIONS
// ========================================
function initPopups() {
    // Delegation for all popup interactions
    document.addEventListener('click', (e) => {
        const target = e.target;

        // Cart button click (Open popup)
        const cartBtn = target.closest('.cart-btn');
        if (cartBtn) {
            e.stopPropagation();
            const productId = cartBtn.dataset.productId;
            if (productId) togglePopup(productId);
            return;
        }

        // Close button handlers
        const closeBtn = target.closest('.popup-close');
        if (closeBtn) {
            e.stopPropagation();
            const productId = closeBtn.dataset.productId;
            if (productId) closePopup(productId);
            return;
        }

        // Color selection handlers
        const colorBtn = target.closest('.popup-color-btn');
        if (colorBtn) {
            e.stopPropagation();
            const productId = colorBtn.dataset.productId;
            const colorIndex = parseInt(colorBtn.dataset.colorIndex);
            if (productId && !isNaN(colorIndex)) selectColor(productId, colorIndex);
            return;
        }

        // Size selection handlers
        const sizeBtn = target.closest('.popup-size-btn');
        if (sizeBtn) {
            e.stopPropagation();
            const productId = sizeBtn.dataset.productId;
            const sizeIndex = parseInt(sizeBtn.dataset.sizeIndex);
            if (productId && !isNaN(sizeIndex)) selectSize(productId, sizeIndex);
            return;
        }

        // Quantity Minus
        const qtyMinus = target.closest('.qty-minus');
        if (qtyMinus) {
            e.stopPropagation();
            const productId = qtyMinus.dataset.productId;
            if (productId) updateQuantity(productId, -1);
            return;
        }

        // Quantity Plus
        const qtyPlus = target.closest('.qty-plus');
        if (qtyPlus) {
            e.stopPropagation();
            const productId = qtyPlus.dataset.productId;
            if (productId) updateQuantity(productId, 1);
            return;
        }

        // Add to cart button handlers
        const addBtn = target.closest('.popup-add-btn');
        if (addBtn) {
            e.stopPropagation();
            const productId = addBtn.dataset.productId;
            if (productId) addToCartFromPopup(productId);
            return;
        }

        // Close popup when clicking outside
        if (activePopupId !== null) {
            const popup = document.getElementById(`popup-${activePopupId}`);
            if (popup && !popup.contains(target)) {
                // Also check if we're clicking the button that opens it
                const opener = target.closest(`.cart-btn[data-product-id="${activePopupId}"]`);
                if (!opener) closePopup(activePopupId);
            }
        }
    });

    // Close popup on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && activePopupId !== null) {
            closePopup(activePopupId);
        }
    });
}

function togglePopup(productId) {
    if (activePopupId === productId) closePopup(productId);
    else {
        if (activePopupId !== null) closePopup(activePopupId);
        openPopup(productId);
    }
}

// ===============================
// ======= POPUP LOGIC ==========
// ===============================

function openPopup(productId) {
    const popup = getEl(`popup-${productId}`);
    if (!popup) {
        console.error(`Popup not found for product: ${productId}`);
        return;
    }

    const form = getEl(`popup-form-${productId}`);
    const success = getEl(`popup-success-${productId}`);
    
    // Initialize or reset state for this product
    popupState[productId] = { color: 0, size: 0, quantity: 1 };
    
    const qtyEl = getEl(`qty-${productId}`);
    if (qtyEl) qtyEl.textContent = '1';
    
    if (form) form.classList.remove('hide');
    if (success) success.classList.remove('show');

    // Reset selected states in UI
    popup.querySelectorAll('.popup-color-btn').forEach((opt, i) => opt.classList.toggle('selected', i === 0));
    popup.querySelectorAll('.popup-size-btn').forEach((opt, i) => opt.classList.toggle('selected', i === 0));

    // Close any other active popups first
    closeAllPopups();

    popup.classList.add('active');
    activePopupId = productId;
}

function closePopup(productId) {
    const popup = getEl(`popup-${productId}`);
    if (popup) popup.classList.remove('active');
    if (activePopupId === productId) activePopupId = null;
}

function closeAllPopups() {
    document.querySelectorAll('.quick-add-popup.active').forEach(p => p.classList.remove('active'));
    activePopupId = null;
}

function selectColor(productId, colorIndex) {
    if (!popupState[productId]) popupState[productId] = { color: 0, size: 0, quantity: 1 };
    popupState[productId].color = colorIndex;
    
    const popup = getEl(`popup-${productId}`);
    if (popup) {
        popup.querySelectorAll('.popup-color-btn').forEach((opt, i) => opt.classList.toggle('selected', i === colorIndex));
    }
}

function selectSize(productId, sizeIndex) {
    if (!popupState[productId]) popupState[productId] = { color: 0, size: 0, quantity: 1 };
    popupState[productId].size = sizeIndex;
    
    const popup = getEl(`popup-${productId}`);
    if (popup) {
        popup.querySelectorAll('.popup-size-btn').forEach((opt, i) => opt.classList.toggle('selected', i === sizeIndex));
    }
}

function updateQuantity(productId, delta) {
    if (!popupState[productId]) popupState[productId] = { color: 0, size: 0, quantity: 1 };
    const state = popupState[productId];
    state.quantity = Math.max(1, Math.min(10, state.quantity + delta));
    
    const qtyEl = getEl(`qty-${productId}`);
    if (qtyEl) qtyEl.textContent = state.quantity;
}

function addToCartFromPopup(productId) {
    if (!popupState[productId]) return;
    const state = popupState[productId];
    
    const productCard = document.querySelector(`.product-card[data-product-id="${productId}"]`);
    if (!productCard) return;

    const name = productCard.querySelector('.product-name')?.textContent.trim() || '';
    const priceText = productCard.querySelector('.product-price')?.textContent.trim() || '$0';
    const price = parseFloat(priceText.replace('$', '')) || 0;

    const colorBtns = productCard.querySelectorAll('.popup-color-btn');
    const colorBtn = colorBtns[state.color];
    const color = colorBtn ? colorBtn.style.backgroundColor : '';
    
    const sizeBtns = productCard.querySelectorAll('.popup-size-btn');
    const sizeBtn = sizeBtns[state.size];
    const size = sizeBtn ? sizeBtn.textContent : '';
    const quantity = state.quantity;

    // Grab product image
    const img = productCard.querySelector('.product-image')?.src || '';

    const existingIndex = cart.findIndex(item => item.id === productId && item.color === color && item.size === size);
    if (existingIndex > -1) {
        cart[existingIndex].quantity += quantity;
    } else {
        cart.push({ id: productId, name, price, color, size, quantity, image: img });
    }

    renderCart();
    saveCart();
    
    // Show success message
    const form = getEl(`popup-form-${productId}`);
    const success = getEl(`popup-success-${productId}`);
    if (form) form.classList.add('hide');
    if (success) success.classList.add('show');

    // Show toast as well
    if (typeof showToast === 'function') {
        showToast('Item added to cart');
    }

    setTimeout(() => closePopup(productId), 2000);
}


window.toggleWishlist = toggleWishlist;
window.saveWishlist = saveWishlist;
window.updateWishlistCount = updateWishlistCount;
window.renderWishlist = renderWishlist;
window.saveCart = saveCart;
window.renderCart = renderCart;
window.showToast = showToast;
window.syncWishlistButtons = syncWishlistButtons;

// ======= RGB to Color Name Converter =======
function rgbToColorName(color) {
    if (!color) return 'N/A';
    
    // Check if it's already a named color
    const namedColors = ['black', 'white', 'red', 'green', 'blue', 'yellow', 'orange', 'purple', 'pink', 'brown', 'gray', 'grey', 'silver', 'cyan', 'magenta', 'navy', 'maroon', 'olive', 'beige', 'gold'];
    const colorLower = color.toLowerCase().trim();
    if (namedColors.includes(colorLower)) {
        return colorLower.charAt(0).toUpperCase() + colorLower.slice(1);
    }
    
    // Check hex colors
    if (color.startsWith('#')) {
        const hexColors = {
            '#000000': 'Black', '#000': 'Black',
            '#ffffff': 'White', '#fff': 'White',
            '#ff0000': 'Red', '#f00': 'Red',
            '#00ff00': 'Green', '#0f0': 'Green',
            '#0000ff': 'Blue', '#00f': 'Blue',
            '#ffff00': 'Yellow', '#ff0': 'Yellow',
            '#ffa500': 'Orange',
            '#800080': 'Purple',
            '#ffc0cb': 'Pink',
            '#a52a2a': 'Brown',
            '#808080': 'Gray',
            '#c0c0c0': 'Silver'
        };
        const hexLower = color.toLowerCase();
        if (hexColors[hexLower]) return hexColors[hexLower];
    }
    
    // Check for RGB format
    if (color.toLowerCase().startsWith('rgb')) {
        const match = color.match(/rgb\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)/i);
        if (match) {
            const r = parseInt(match[1]);
            const g = parseInt(match[2]);
            const b = parseInt(match[3]);
            
            // Exact matches
            if (r === 0 && g === 0 && b === 0) return 'Black';
            if (r === 255 && g === 255 && b === 255) return 'White';
            if (r === 255 && g === 0 && b === 0) return 'Red';
            if (r === 0 && g === 255 && b === 0) return 'Green';
            if (r === 0 && g === 128 && b === 0) return 'Dark Green';
            if (r === 0 && g === 0 && b === 255) return 'Blue';
            if (r === 255 && g === 255 && b === 0) return 'Yellow';
            if (r === 255 && g === 165 && b === 0) return 'Orange';
            if (r === 128 && g === 0 && b === 128) return 'Purple';
            if (r === 255 && g === 192 && b === 203) return 'Pink';
            if (r === 165 && g === 42 && b === 42) return 'Brown';
            if (r === 128 && g === 128 && b === 128) return 'Gray';
            if (r === 0 && g === 0 && b === 128) return 'Navy';
            
            // Approximate detection
            if (r > 200 && g > 200 && b > 200) return 'White';
            if (r < 50 && g < 50 && b < 50) return 'Black';
            if (r > 200 && g < 100 && b < 100) return 'Red';
            if (r < 100 && g > 200 && b < 100) return 'Green';
            if (r < 100 && g < 100 && b > 200) return 'Blue';
            if (r > 200 && g > 200 && b < 100) return 'Yellow';
            if (r > 200 && g > 100 && g < 200 && b < 100) return 'Orange';
            if (r > 150 && g < 100 && b > 150) return 'Purple';
            if (r > 200 && g > 150 && b > 180) return 'Pink';
            if (Math.abs(r - g) < 30 && Math.abs(g - b) < 30) return 'Gray';
        }
    }
    
    return color;
}

function renderCart() {
    if (!cartBody || !cartCount) return;

    // Update total items in cart icon
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = totalItems;

    // Update cart items count in header
    const cartItemsCountEl = document.getElementById('cartItemsCount');
    if (cartItemsCountEl) {
        const itemText = totalItems === 1 ? 'item' : 'items';
        cartItemsCountEl.textContent = `(${totalItems} ${itemText})`;
    }

    // Generate cart item HTML
    if (cart.length === 0) {
        cartBody.innerHTML = `
            <div class="cart-empty">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
                <p>Your cart is empty</p>
            </div>
        `;
    } else {
        cartBody.innerHTML = cart
            .map((item, index) => {
                const itemTotal = item.price * item.quantity;
                const colorName = rgbToColorName(item.color);
                const sizeDisplay = item.size || "N/A";

                return `
            <div class="cart-item">
                <div class="cart-item-img">
                    <img src="${item.image}" alt="${item.name}" loading="lazy">
                </div>
                <div class="cart-item-details">
                    <div class="cart-item-header">
                        <h3 class="cart-item-name">${item.name}</h3>
                        <button class="cart-item-remove" 
                                data-index="${index}"
                                aria-label="Remove item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="cart-item-variant">
                        <span class="variant-label">Color:</span>
                        <span class="variant-value">${colorName}</span>
                        <span class="variant-separator">•</span>
                        <span class="variant-label">Size:</span>
                        <span class="variant-value">${sizeDisplay}</span>
                    </div>
                    <div class="cart-item-controls">
                        <div class="cart-item-qty">
                            <span class="qty-label">Quantity:</span>
                            <span class="qty-value">${item.quantity}</span>
                        </div>
                        <div class="cart-item-price">
                            <span class="price-label">Price:</span>
                            <span class="price-value">$${itemTotal.toFixed(2)}</span>
                        </div>
                    </div>
                </div>
            </div>
        `;
            })
            .join("");
    }

    // Calculate and update total
    const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    const cartTotalEl = document.getElementById('cartTotal');
    if (cartTotalEl) cartTotalEl.textContent = `$${total.toFixed(2)}`;
}

// Delegation for Cart interactions (Remove)
document.addEventListener('click', (e) => {
    const removeBtn = e.target.closest('.cart-item-remove');
    if (removeBtn) {
        const index = parseInt(removeBtn.dataset.index);
        if (!isNaN(index)) {
            removeFromCart(index);
        }
    }
});

// ======= Remove Item Function =======
function removeFromCart(index) {
    if (index >= 0 && index < cart.length) {
        cart.splice(index, 1);
        saveCart();
        renderCart();
    }
}



// ======= Remove Wishlist Item Function =======
function removeFromWishlist(index) {
    if (index >= 0 && index < wishlist.length) {
        wishlist.splice(index, 1);
        saveWishlist();
        updateWishlistCount();
        renderWishlist();
    }
}

// ========================================
// WISHLIST FUNCTIONS
// ========================================
function initWishlist() {
    // Delegation for wishlist buttons (heart icons on cards)
    document.addEventListener('click', (e) => {
        const wishlistBtn = e.target.closest('.wishlist-btn');
        // If it's a wishlist button but NOT the one in the sidebar or navbar
        if (wishlistBtn && !wishlistBtn.closest('.wishlist-sidebar') && wishlistBtn.id !== 'wishlistBtn') {
            e.stopPropagation();
            const productId = wishlistBtn.dataset.productId;
            if (productId) toggleWishlist(productId);
        }
    });
    
    // Delegation for wishlist sidebar interactions
    document.addEventListener('click', (e) => {
        const target = e.target;

        // Remove from wishlist
        const removeBtn = target.closest('.wishlist-item-remove');
        if (removeBtn) {
            const index = parseInt(removeBtn.dataset.index);
            if (!isNaN(index)) {
                removeFromWishlist(index);
                showToast('Removed from wishlist');
            }
            return;
        }

        // Color selection
        const colorBtn = target.closest('.wishlist-color-btn');
        if (colorBtn) {
            const productId = colorBtn.dataset.productId;
            const colorIndex = parseInt(colorBtn.dataset.colorIndex);
            const item = colorBtn.closest('.wishlist-item');
            if (item && !isNaN(colorIndex)) {
                item.querySelectorAll('.wishlist-color-btn').forEach((b, i) => {
                    b.classList.toggle('selected', i === colorIndex);
                });
            }
            return;
        }

        // Size selection
        const sizeBtn = target.closest('.wishlist-size-btn');
        if (sizeBtn) {
            const productId = sizeBtn.dataset.productId;
            const sizeIndex = parseInt(sizeBtn.dataset.sizeIndex);
            const item = sizeBtn.closest('.wishlist-item');
            if (item && !isNaN(sizeIndex)) {
                item.querySelectorAll('.wishlist-size-btn').forEach((b, i) => {
                    b.classList.toggle('selected', i === sizeIndex);
                });
            }
            return;
        }

        // Quantity controls
        const qtyBtn = target.closest('.wishlist-qty-btn');
        if (qtyBtn) {
            const productId = qtyBtn.dataset.productId;
            const delta = parseInt(qtyBtn.dataset.delta);
            const qtyEl = document.getElementById(`wishlist-qty-${productId}`);
            if (qtyEl && !isNaN(delta)) {
                let currentQty = parseInt(qtyEl.textContent) || 1;
                currentQty = Math.max(1, Math.min(10, currentQty + delta));
                qtyEl.textContent = currentQty;
            }
            return;
        }

        // Add to cart from wishlist
        const addToCartBtn = target.closest('.wishlist-add-to-cart');
        if (addToCartBtn) {
            const productId = addToCartBtn.dataset.productId;
            if (productId) {
                addToCartFromWishlist(productId);
                
                // Remove from wishlist after adding to cart
                const removeIndex = wishlist.findIndex(p => String(p.id) === String(productId));
                if (removeIndex > -1) {
                    wishlist.splice(removeIndex, 1);
                }
                
                const wishlistBtnEl = document.querySelector(`.wishlist-btn[data-product-id="${productId}"]`);
                if (wishlistBtnEl) wishlistBtnEl.classList.remove('active');

                saveWishlist();
                updateWishlistCount();
                renderWishlist();
                closeWishlistSidebar();
            }
            return;
        }
    });
    
    // Sync initial active states for all wishlist buttons in DOM
    syncWishlistButtons();
    
    // Initialize wishlist count
    updateWishlistCount();
}

function syncWishlistButtons() {
    document.querySelectorAll('.wishlist-btn').forEach(btn => {
        const productId = btn.dataset.productId;
        const exists = wishlist.some(p => String(p.id) === String(productId));
        btn.classList.toggle('active', !!exists);
    });
}

function getProductData(productId) {
    const productCard = document.querySelector(`.product-card[data-product-id="${productId}"]`);
    if (!productCard) return null;

    const name = productCard.querySelector('.product-name')?.textContent.trim() || '';
    const priceText = productCard.querySelector('.product-price')?.textContent.trim() || '$0';
    const price = parseFloat(priceText.replace('$', '')) || 0;
    const image = productCard.querySelector('.product-image')?.src || '';
    
    // Get colors from popup
    const popup = document.getElementById(`popup-${productId}`);
    const colors = [];
    if (popup) {
        popup.querySelectorAll('.popup-color-btn').forEach(btn => {
            colors.push(btn.style.backgroundColor);
        });
    }
    
    // Get sizes from popup
    const sizes = [];
    if (popup) {
        popup.querySelectorAll('.popup-size-btn').forEach(btn => {
            sizes.push(btn.textContent.trim());
        });
    }

    return { id: productId, name, price, image, colors, sizes };
}

function updateWishlistCount() {
    if (!wishlistCount || !wishlistBtn) return;
    
    const count = wishlist.length;
    wishlistCount.textContent = count > 0 ? count : '';
    
    // Update active state of navbar wishlist button
    if (count > 0) {
        wishlistBtn.classList.add('active');
    } else {
        wishlistBtn.classList.remove('active');
    }
    
    // Update wishlist items count in sidebar header if sidebar is open
    if (wishlistItemsCount) {
        const itemText = count === 1 ? 'item' : 'items';
        wishlistItemsCount.textContent = `(${count} ${itemText})`;
    }
}

function toggleWishlist(productId, data = null) {
    const btn = document.querySelector(`.wishlist-btn[data-product-id="${productId}"]`);
    const index = wishlist.findIndex(p => String(p.id) === String(productId));
    if (index > -1) {
        wishlist.splice(index, 1);
        if (btn) btn.classList.remove('active');
        showToast('Removed from wishlist');
    } else {
        const productData = data || getProductData(productId);
        if (productData) {
            wishlist.push(productData);
            if (btn) btn.classList.add('active');
            showToast('Added to wishlist');
        }
    }

    updateWishlistCount();

    if (wishlistSidebar && wishlistSidebar.classList.contains('active')) {
        renderWishlist();
    }

    saveWishlist();
}


// Listen for global wishlist updates (sync across tabs)
window.addEventListener('storage', (e) => {
    if (e.key === 'wishlist') {
        loadWishlist();
        updateWishlistCount();
        syncWishlistButtons();
        if (wishlistSidebar && wishlistSidebar.classList.contains('active')) {
            renderWishlist();
        }
    }
    if (e.key === 'cart') {
        loadCart();
        renderCart();
    }
});

// ========================================
// TOAST NOTIFICATION
// ========================================
function showToast(message) {
    toastMessage.textContent = message;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3000);
}
