<?php
// Product data structure
$products = [
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
$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = isset($products[$productId]) ? $products[$productId] : null;

// Redirect to home if product not found
if (!$product) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Fashion Store</title>
    <?php include "essentials/navbar.php" ?>
    <style>
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
</head>
<body>
    <?php include "essentials/navbar.php" ?>
    <div class="product-page">
        <div class="product-container">
            <div class="product-image-section">
                <div class="product-image-wrapper">
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <?php if ($product['badge']): ?>
                        <span class="product-badge"><?php echo htmlspecialchars($product['badge']); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="product-info-section">
                <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>
                <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
                <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>

                <div class="product-options">
                    <?php if (!empty($product['colors'])): ?>
                    <div class="option-group">
                        <label class="option-label">Color</label>
                        <div class="color-options">
                            <?php foreach ($product['colors'] as $index => $color): ?>
                                <button class="color-btn <?php echo $index === 0 ? 'selected' : ''; ?>" 
                                        style="background-color: <?php echo htmlspecialchars($color); ?>"
                                        data-color-index="<?php echo $index; ?>"
                                        data-color="<?php echo htmlspecialchars($color); ?>"
                                        aria-label="Select color <?php echo $index + 1; ?>"></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($product['sizes'])): ?>
                    <div class="option-group">
                        <label class="option-label">Size</label>
                        <div class="size-options">
                            <?php foreach ($product['sizes'] as $index => $size): ?>
                                <button class="size-btn <?php echo $index === 0 ? 'selected' : ''; ?>" 
                                        data-size-index="<?php echo $index; ?>"
                                        data-size="<?php echo htmlspecialchars($size); ?>"><?php echo htmlspecialchars($size); ?></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

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

                <button class="add-to-cart-btn" id="addToCartBtn" data-product-id="<?php echo $product['id']; ?>">
                    Add to Cart
                </button>
                <button class="wishlist-btn" id="wishlistBtn" data-product-id="<?php echo $product['id']; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" width="20" height="20">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    Add to Wishlist
                </button>
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
        // Product data from PHP
        const productData = <?php echo json_encode($product); ?>;
        
        // Product page state
        let selectedColor = 0;
        let selectedSize = 0;
        let quantity = 1;

        // DOM elements
        const colorButtons = document.querySelectorAll('.color-btn');
        const sizeButtons = document.querySelectorAll('.size-btn');
        const qtyMinus = document.querySelector('.qty-minus');
        const qtyPlus = document.querySelector('.qty-plus');
        const qtyValue = document.getElementById('productQty');
        const addToCartBtn = document.getElementById('addToCartBtn');
        const wishlistBtn = document.getElementById('wishlistBtn');

        // Color selection
        colorButtons.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                colorButtons.forEach(b => b.classList.remove('selected'));
                btn.classList.add('selected');
                selectedColor = index;
            });
        });

        // Size selection
        sizeButtons.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                sizeButtons.forEach(b => b.classList.remove('selected'));
                btn.classList.add('selected');
                selectedSize = index;
            });
        });

        // Quantity controls
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

        // Add to cart
        addToCartBtn.addEventListener('click', () => {
            const color = colorButtons[selectedColor]?.dataset.color || '';
            const size = sizeButtons[selectedSize]?.dataset.size || productData.sizes[0] || '';
            
            // Call global function from cart-handler.js
            if (typeof window.addToCart === 'function') {
                window.addToCart(productData, quantity, color, size);
            }
        });

        // Wishlist functionality
        wishlistBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const productId = wishlistBtn.dataset.productId;
            if (typeof window.toggleWishlist === 'function') {
                window.toggleWishlist(productId, productData);
                updateWishlistButtonState();
            }
        });

        function updateWishlistButtonState() {
            if (typeof window.wishlist !== 'undefined') {
                const isInWishlist = window.wishlist.some(p => String(p.id) === String(productData.id));
                wishlistBtn.classList.toggle('active', isInWishlist);
                const btnText = wishlistBtn.querySelector('span') || wishlistBtn;
                if (btnText.tagName === 'SPAN') {
                    btnText.textContent = isInWishlist ? 'Remove from Wishlist' : 'Add to Wishlist';
                }
            }
        }

        // Check if product is in wishlist on load
        document.addEventListener('DOMContentLoaded', () => {
            // Wait a tiny bit for cart-handler.js to finish loading data
            setTimeout(updateWishlistButtonState, 100);
        });

        // Listen for global wishlist updates (if needed)
        window.addEventListener('storage', (e) => {
            if (e.key === 'wishlist') {
                updateWishlistButtonState();
            }
        });
    </script>
</body>
</html>
