<?php
// Product data structure (Static Fallback)
$staticProducts = [
    1 => [
        'id' => 1,
        'name' => 'Linen Blend Shirt',
        'price' => 89.00,
        'image' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=600&h=800&fit=crop',
        'description' => 'Classic linen blend shirt perfect for any occasion. Made from premium materials with a relaxed fit and comfortable feel.',
        'colors' => ['#c6baa5', '#2f2716', '#ffffff'],
        'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
        'badge' => 'New'
    ],
    2 => [
        'id' => 2,
        'name' => 'Pleated Midi Skirt',
        'price' => 125.00,
        'image' => 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600&h=800&fit=crop',
        'description' => 'Elegant pleated midi skirt with a flowing silhouette. Perfect for both casual and formal occasions.',
        'colors' => ['#a8845e', '#7e5232', '#c6baa5'],
        'sizes' => ['XS', 'S', 'M', 'L'],
        'badge' => 'New'
    ],
    3 => [
        'id' => 3,
        'name' => 'Oversized Wool Coat',
        'price' => 345.00,
        'image' => 'https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=600&h=800&fit=crop',
        'description' => 'Stylish oversized wool coat for the modern wardrobe. Warm, comfortable, and effortlessly chic.',
        'colors' => ['#b39c80', '#2f2716'],
        'sizes' => ['S', 'M', 'L', 'XL'],
        'badge' => 'New'
    ],
    4 => [
        'id' => 4,
        'name' => 'Silk Camisole Top',
        'price' => 78.00,
        'image' => 'https://images.unsplash.com/photo-1485462537746-965f33f7f6a7?w=600&h=800&fit=crop',
        'description' => 'Luxurious silk camisole top with delicate details. Perfect for layering or wearing alone.',
        'colors' => ['#c6baa5', '#a8845e', '#ffffff'],
        'sizes' => ['XS', 'S', 'M', 'L'],
        'badge' => 'New'
    ],
    5 => [
        'id' => 5,
        'name' => 'High-Waist Trousers',
        'price' => 145.00,
        'image' => 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600&h=800&fit=crop',
        'description' => 'Comfortable high-waist trousers with a flattering fit. Versatile and perfect for any occasion.',
        'colors' => ['#2f2716', '#7e5232', '#b39c80'],
        'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
        'badge' => 'New'
    ],
    6 => [
        'id' => 6,
        'name' => 'Cashmere Turtleneck',
        'price' => 195.00,
        'image' => 'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=600&h=800&fit=crop',
        'description' => 'Premium cashmere turtleneck sweater. Soft, warm, and timeless in design.',
        'colors' => ['#c6baa5', '#a8845e', '#2f2716'],
        'sizes' => ['S', 'M', 'L', 'XL'],
        'badge' => 'New'
    ],
    7 => [
        'id' => 7,
        'name' => 'Leather Belt Bag',
        'price' => 165.00,
        'image' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=600&h=800&fit=crop',
        'description' => 'Stylish leather belt bag with multiple compartments. Perfect for everyday use.',
        'colors' => ['#7e5232', '#2f2716', '#a8845e'],
        'sizes' => ['One Size'],
        'badge' => 'New'
    ],
    8 => [
        'id' => 8,
        'name' => 'Structured Blazer',
        'price' => 265.00,
        'image' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop',
        'description' => 'Elegant structured blazer with sharp tailoring. A wardrobe essential for professional and casual looks.',
        'colors' => ['#b39c80', '#2f2716', '#7e5232'],
        'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
        'badge' => 'New'
    ]
];

// Get product ID from URL
$productId = isset($_GET['id']) ? (string)$_GET['id'] : '';
?>
<style>
    /* ... existing styles preserved ... */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --color-main: #b39c80;
            --color-secondary: #c6baa5;
            --color-hover: #a8845e;
            --color-accent: #7e5232;
            --color-dark: #2f2716;
            --color-white: #ffffff;
            --color-light-bg: #faf9f7;
            --color-border: #e8e4de;
            --font-primary: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --font-heading: 'Georgia', 'Times New Roman', serif;
            --transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --navbar-height: 70px;
            --topbar-height: 36px;
        }

        body {
            font-family: var(--font-primary);
            background-color: var(--color-light-bg);
            color: var(--color-dark);
            line-height: 1.6;
            padding-top: calc(var(--topbar-height) + var(--navbar-height));
        }

        .product-page {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        .product-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            margin-bottom: 4rem;
        }

        .product-image-section {
            position: relative;
        }

        .product-image-wrapper {
            position: relative;
            width: 100%;
            padding-top: 125%; /* 4:5 aspect ratio */
            background: var(--color-white);
            border-radius: 8px;
            overflow: hidden;
        }

        .product-image-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--color-dark);
            color: var(--color-white);
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            z-index: 10;
        }

        .product-info-section {
            display: flex;
            flex-direction: column;
        }

        .product-title {
            font-family: var(--font-heading);
            font-size: 2.5rem;
            font-weight: 400;
            margin-bottom: 1rem;
            color: var(--color-dark);
        }

        .product-price {
            font-size: 2rem;
            font-weight: 600;
            color: var(--color-dark);
            margin-bottom: 2rem;
        }

        .product-description {
            font-size: 1rem;
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .product-options {
            margin-bottom: 2rem;
        }

        .option-group {
            margin-bottom: 2rem;
        }

        .option-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.75rem;
            color: var(--color-dark);
        }

        .color-options {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .color-btn {
            width: 48px;
            height: 48px;
            border: 2px solid var(--color-border);
            border-radius: 50%;
            cursor: pointer;
            transition: all var(--transition);
            position: relative;
        }

        .color-btn:hover {
            transform: scale(1.1);
        }

        .color-btn.selected {
            border-color: var(--color-dark);
            border-width: 3px;
        }

        .color-btn.selected::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--color-white);
            font-size: 1.2rem;
            font-weight: bold;
            text-shadow: 0 0 3px rgba(0,0,0,0.5);
        }

        .size-options {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .size-btn {
            min-width: 60px;
            padding: 0.75rem 1.25rem;
            border: 2px solid var(--color-border);
            background: var(--color-white);
            color: var(--color-dark);
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            cursor: pointer;
            transition: all var(--transition);
            border-radius: 4px;
        }

        .size-btn:hover {
            border-color: var(--color-dark);
        }

        .size-btn.selected {
            background: var(--color-dark);
            color: var(--color-white);
            border-color: var(--color-dark);
        }

        .quantity-group {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .product-not-found {
            text-align: center;
            padding: 5rem 2rem;
            max-width: 600px;
            margin: 0 auto;
        }
        .product-not-found h2 {
            font-family: var(--font-heading);
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .product-not-found p {
            color: #666;
            margin-bottom: 2rem;
        }
        .loading-state {
            text-align: center;
            padding: 5rem 2rem;
        }
        .spinner {
            width: 40px;
            height: 40px;
            border: 3px solid var(--color-border);
            border-top-color: var(--color-dark);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            border: 2px solid var(--color-border);
            border-radius: 4px;
            overflow: hidden;
        }

        .qty-btn {
            width: 48px;
            height: 48px;
            border: none;
            background: var(--color-white);
            color: var(--color-dark);
            font-size: 1.25rem;
            font-weight: 600;
            cursor: pointer;
            transition: background var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover {
            background: var(--color-light-bg);
        }

        .qty-value {
            width: 60px;
            text-align: center;
            font-size: 1rem;
            font-weight: 600;
        }

        .add-to-cart-btn {
            width: 100%;
            padding: 1.25rem 2rem;
            background: var(--color-dark);
            color: var(--color-white);
            border: none;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            cursor: pointer;
            transition: all var(--transition);
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .add-to-cart-btn:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .add-to-cart-btn:active {
            transform: scale(0.98);
            opacity: 0.9;
        }

        .wishlist-btn {
            width: 100%;
            padding: 1.25rem 2rem;
            background: transparent;
            color: var(--color-dark);
            border: 2px solid var(--color-dark);
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            cursor: pointer;
            transition: all var(--transition);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .wishlist-btn:hover {
            color: var(--color-accent);
            border-color: var(--color-accent);
            transform: translateY(-2px);
        }

        .wishlist-btn:active {
            transform: scale(0.98);
            opacity: 0.9;
        }

        .wishlist-btn.active {
            background: var(--color-dark);
            color: var(--color-white);
        }

        .toast {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--color-dark);
            color: var(--color-white);
            padding: 1rem 1.5rem;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            opacity: 0;
            transform: translateY(20px);
            transition: all var(--transition);
            z-index: 10000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        .toast svg {
            width: 20px;
            height: 20px;
        }

        @media (max-width: 968px) {
            .product-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .product-title {
                font-size: 2rem;
            }

            .product-price {
                font-size: 1.75rem;
            }
        }
    </style>

    <div id="productDetailContainer">
        <div class="loading-state">
            <div class="spinner"></div>
            <p>Loading product details...</p>
        </div>
    </div>

    <!-- Suggestions Section -->
    <div id="suggestionsWrapper" style="display: none; background: var(--color-white); padding: 4rem 0; border-top: 1px solid var(--color-border);">
        <div style="max-width: 1400px; margin: 0 auto; padding: 0 2rem;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-family: var(--font-heading); font-size: 2.5rem; color: var(--color-dark); margin-bottom: 1rem;">You May Also Like</h2>
                <div style="width: 60px; height: 2px; background: var(--color-main); margin: 0 auto;"></div>
            </div>
            <div id="suggestionsGrid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2rem;">
                <!-- Suggestions will be loaded here -->
            </div>
        </div>
    </div>

    <div class="toast" id="toast">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
        <span id="toastMessage">Item added to cart</span>
    </div>

    <script>
        (function() {
            const urlParams = new URLSearchParams(window.location.search);
            const productId = urlParams.get('id');

            function findProduct(id) {
                // 1. Try Dashboard Products (localStorage)
                const dashboardProducts = JSON.parse(localStorage.getItem('dashboard_products') || '[]');
                const dashProd = dashboardProducts.find(p => String(p.id) === String(id));
                if (dashProd) {
                    const sizesArray = dashProd.sizes ? (Array.isArray(dashProd.sizes) ? dashProd.sizes : Object.keys(dashProd.sizes)) : ["XS", "S", "M", "L", "XL"];
                    return {
                        id: dashProd.id,
                        name: dashProd.name,
                        price: typeof dashProd.price === 'string' ? parseFloat(dashProd.price.replace(/[$,]/g, '')) : dashProd.price,
                        image: dashProd.imageUrl || dashProd.image,
                        description: dashProd.description || 'No description available.',
                        colors: dashProd.colors || ["#b39c80", "#2f2716"],
                        sizes: sizesArray,
                        badge: dashProd.badge || "New"
                    };
                }

                // 2. Try Static Fallback (Hardcoded)
                const staticProducts = {
                    1: { id: 1, name: 'Linen Blend Shirt', price: 89, image: 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=600&h=800&fit=crop', description: 'Classic linen blend shirt perfect for any occasion.', colors: ['#c6baa5', '#2f2716', '#ffffff'], sizes: ['XS', 'S', 'M', 'L', 'XL'], badge: 'New' },
                    2: { id: 2, name: 'Pleated Midi Skirt', price: 125, image: 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600&h=800&fit=crop', description: 'Elegant pleated midi skirt with a flowing silhouette.', colors: ['#a8845e', '#7e5232', '#c6baa5'], sizes: ['XS', 'S', 'M', 'L'], badge: 'New' },
                    3: { id: 3, name: 'Oversized Wool Coat', price: 345, image: 'https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=600&h=800&fit=crop', description: 'Stylish oversized wool coat for the modern wardrobe.', colors: ['#b39c80', '#2f2716'], sizes: ['S', 'M', 'L', 'XL'], badge: 'New' },
                    4: { id: 4, name: 'Silk Camisole Top', price: 78, image: 'https://images.unsplash.com/photo-1485462537746-965f33f7f6a7?w=600&h=800&fit=crop', description: 'Luxurious silk camisole top with delicate details.', colors: ['#c6baa5', '#a8845e', '#ffffff'], sizes: ['XS', 'S', 'M', 'L'], badge: 'New' },
                    5: { id: 5, name: 'High-Waist Trousers', price: 145, image: 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600&h=800&fit=crop', description: 'Comfortable high-waist trousers with a flattering fit.', colors: ['#2f2716', '#7e5232', '#b39c80'], sizes: ['XS', 'S', 'M', 'L', 'XL'], badge: 'New' },
                    6: { id: 6, name: 'Cashmere Turtleneck', price: 195, image: 'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=600&h=800&fit=crop', description: 'Premium cashmere turtleneck sweater.', colors: ['#c6baa5', '#a8845e', '#2f2716'], sizes: ['S', 'M', 'L', 'XL'], badge: 'New' },
                    7: { id: 7, name: 'Leather Belt Bag', price: 165, image: 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=600&h=800&fit=crop', description: 'Stylish leather belt bag with multiple compartments.', colors: ['#7e5232', '#2f2716', '#a8845e'], sizes: ['One Size'], badge: 'New' },
                    8: { id: 8, name: 'Structured Blazer', price: 265, image: 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop', description: 'Elegant structured blazer with sharp tailoring.', colors: ['#b39c80', '#2f2716', '#7e5232'], sizes: ['XS', 'S', 'M', 'L', 'XL'], badge: 'New' }
                };
                return staticProducts[id] || null;
            }

            function renderNotFound() {
                document.getElementById('productDetailContainer').innerHTML = `
                    <div class="product-not-found">
                        <h2>Product Not Found</h2>
                        <p>We couldn't find the product you're looking for. It might have been removed or the link is incorrect.</p>
                        <a href="index.php" class="add-to-cart-btn" style="display: inline-block; text-decoration: none; width: auto;">Back to Shop</a>
                    </div>
                `;
            }

            function renderProduct(product) {
                window.productData = product;
                const container = document.getElementById('productDetailContainer');
                const suggestionsWrapper = document.getElementById('suggestionsWrapper');
                if (suggestionsWrapper) suggestionsWrapper.style.display = 'block';
                container.innerHTML = `
                    <div class="product-page">
                        <div class="product-container">
                            <div class="product-image-section">
                                <div class="product-image-wrapper">
                                    <img src="${product.image}" alt="${product.name}">
                                    ${product.badge ? `<span class="product-badge">${product.badge}</span>` : ''}
                                </div>
                            </div>
                            <div class="product-info-section">
                                <h1 class="product-title">${product.name}</h1>
                                <p class="product-price">$${parseFloat(product.price).toFixed(2)}</p>
                                <p class="product-description">${product.description}</p>
                                <div class="product-options">
                                    ${product.colors && product.colors.length > 0 ? `
                                    <div class="option-group">
                                        <label class="option-label">Color</label>
                                        <div class="color-options">
                                            ${product.colors.map((color, index) => `
                                                <button class="color-btn ${index === 0 ? 'selected' : ''}" 
                                                        style="background-color: ${color}"
                                                        data-color-index="${index}"
                                                        data-color="${color}"
                                                        aria-label="Select color ${index + 1}"></button>
                                            `).join('')}
                                        </div>
                                    </div>
                                    ` : ''}
                                    ${product.sizes && product.sizes.length > 0 ? `
                                    <div class="option-group">
                                        <label class="option-label">Size</label>
                                        <div class="size-options">
                                            ${product.sizes.map((size, index) => `
                                                <button class="size-btn ${index === 0 ? 'selected' : ''}" 
                                                        data-size-index="${index}"
                                                        data-size="${size}">${size}</button>
                                            `).join('')}
                                        </div>
                                    </div>
                                    ` : ''}
                                    <div class="option-group">
                                        <label class="option-label">Quantity</label>
                                        <div class="quantity-group">
                                            <div class="quantity-controls">
                                                <button class="qty-btn qty-minus" aria-label="Decrease quantity">-</button>
                                                <span class="qty-value" id="productQty">1</span>
                                                <button class="qty-btn qty-plus" aria-label="Increase quantity">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="add-to-cart-btn" id="addToCartBtn" data-product-id="${product.id}">Add to Cart</button>
                                <button class="wishlist-btn" id="productWishlistBtn" data-product-id="${product.id}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="20" height="20">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    <span>Add to Wishlist</span>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                initProductPageInteractions();
            }

            function initProductPageInteractions() {
                const productData = window.productData;
                let selectedColor = 0;
                let selectedSize = 0;
                let quantity = 1;

                const container = document.getElementById('productDetailContainer');
                const colorButtons = container.querySelectorAll('.color-btn');
                const sizeButtons = container.querySelectorAll('.size-btn');
                const qtyMinus = container.querySelector('.qty-minus');
                const qtyPlus = container.querySelector('.qty-plus');
                const qtyValue = container.querySelector('#productQty');
                const addToCartBtn = container.querySelector('#addToCartBtn');
                const wishlistBtn = container.querySelector('#productWishlistBtn');

                colorButtons.forEach((btn, index) => {
                    btn.addEventListener('click', () => {
                        colorButtons.forEach(b => b.classList.remove('selected'));
                        btn.classList.add('selected');
                        selectedColor = index;
                    });
                });

                sizeButtons.forEach((btn, index) => {
                    btn.addEventListener('click', () => {
                        sizeButtons.forEach(b => b.classList.remove('selected'));
                        btn.classList.add('selected');
                        selectedSize = index;
                    });
                });

                qtyMinus.addEventListener('click', () => {
                    if (quantity > 1) {
                        quantity--;
                        qtyValue.textContent = quantity;
                    }
                });

                qtyPlus.addEventListener('click', () => {
                    if (quantity < 10) {
                        quantity++;
                        qtyValue.textContent = quantity;
                    }
                });

                addToCartBtn.addEventListener('click', () => {
                    const color = colorButtons[selectedColor]?.dataset.color || '';
                    const size = sizeButtons[selectedSize]?.dataset.size || productData.sizes[0] || '';
                    if (typeof window.addToCart === 'function') {
                        window.addToCart(productData, quantity, color, size);
                    }
                });

                wishlistBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    if (typeof window.toggleWishlist === 'function') {
                        window.toggleWishlist(productData.id, productData);
                        updateWishlistButtonState();
                    }
                });

                function updateWishlistButtonState() {
                    if (typeof window.wishlist !== 'undefined') {
                        const isInWishlist = window.wishlist.some(p => String(p.id) === String(productData.id));
                        wishlistBtn.classList.toggle('active', isInWishlist);
                        const btnText = wishlistBtn.querySelector('span');
                        if (btnText) {
                            btnText.textContent = isInWishlist ? 'Remove from Wishlist' : 'Add to Wishlist';
                        }
                    }
                }

                updateWishlistButtonState();
                renderProductSuggestions();
            }

            async function renderProductSuggestions() {
                const grid = document.getElementById('suggestionsGrid');
                const wrapper = document.getElementById('suggestionsWrapper');
                if (!grid || !wrapper) return;

                const currentProduct = window.productData;
                
                // 1. Exclusively fetch dashboard products
                const dashboardProducts = JSON.parse(localStorage.getItem('dashboard_products') || '[]');
                
                // 2. Filter out current product and validate dashboard-only items
                let suggestions = dashboardProducts
                    .filter(p => String(p.id) !== String(currentProduct.id))
                    .map(p => ({
                        id: p.id,
                        name: p.name,
                        price: typeof p.price === 'string' ? parseFloat(p.price.replace(/[$,]/g, '')) : p.price,
                        image: p.imageUrl || p.image,
                        cat: p.cat || 'General'
                    }));

                // 3. Logging for audit/tracking
                console.log(`[Suggestion Engine] Generated ${suggestions.length} suggestions from dashboard inventory.`);
                
                // 4. Handle empty dashboard or no matching suggestions
                if (suggestions.length === 0) {
                    wrapper.style.display = 'none';
                    console.warn('[Suggestion Engine] No dashboard products available for recommendations.');
                    return;
                }

                // 5. Shuffle and pick up to 4
                suggestions.sort(() => Math.random() - 0.5);
                suggestions = suggestions.slice(0, 4);

                wrapper.style.display = 'block';
                grid.innerHTML = suggestions.map(p => `
                    <div class="product-card" onclick="window.location.href='page-product.php?id=${p.id}'" style="cursor: pointer; background: var(--color-light-bg); border-radius: 8px; overflow: hidden; transition: var(--transition); border: 1px solid var(--color-border);">
                        <div style="position: relative; width: 100%; padding-top: 125%; overflow: hidden;">
                            <img src="${p.image}" alt="${p.name}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div style="padding: 1.5rem; text-align: center;">
                            <h3 style="font-family: var(--font-heading); font-size: 1.1rem; margin-bottom: 0.5rem; color: var(--color-dark);">${p.name}</h3>
                            <p style="font-weight: 600; color: var(--color-accent);">$${parseFloat(p.price).toFixed(2)}</p>
                        </div>
                    </div>
                `).join('');
            }

            // Start initialization
            window.addEventListener('DOMContentLoaded', () => {
                setTimeout(() => {
                    const product = findProduct(productId);
                    if (product) {
                        renderProduct(product);
                    } else {
                        renderNotFound();
                    }
                }, 500);
            });
        })();
    </script>
<?php
// Stop original script execution here as we handled it with JS
return;
?>
