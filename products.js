/**
 * products.js
 * ─────────────────────────────────────────────────────────────
 * Dynamic product data — loaded from localStorage (Dashboard).
 *
 * This file replaces static arrays with live data managed via the dashboard.
 * If no dashboard data is found, it falls back to the original collections.
 * ─────────────────────────────────────────────────────────────
 */

(function () {
    // 1. Get products from localStorage
    const dashboardProducts = JSON.parse(localStorage.getItem('dashboard_products') || '[]');

    // 2. Helper to transform dashboard product to collection format
    function transformProduct(p) {
        // Ensure sizes is an array for the collections
        const sizesArray = p.sizes ? Object.keys(p.sizes) : ["XS", "S", "M", "L", "XL"];
        // Ensure colors is an array
        const colorsArray = p.colors || ["#b39c80", "#2f2716"];

        return {
            id: p.id,
            name: p.name,
            price: p.price,
            priceValue: p.priceValue || parseFloat(p.price.replace(/[$,]/g, '')),
            image: p.imageUrl || p.image,
            badge: p.badge || "New",
            colors: colorsArray,
            sizes: sizesArray,
            category: (p.cat || "").toLowerCase(),
            fit: p.fit || "regular"
        };
    }

    // 3. Populate global collection variables
    // These variables are expected by collection-specific main.js files (men-main.js, etc.)
    
    // Default empty arrays
    window.products = [];             // Homepage New Arrivals (id: 'new')
    window.menCollection = [];        // Men (id: 'men')
    window.womenCollection = [];      // Women (id: 'women')
    window.kidsCollection = [];       // Kids (id: 'kids')
    window.accessoriesCollection = []; // Accessories (id: 'acc')
    window.bestSellersCollection = []; // Best Sellers (id: 'bestseller')
    window.winterCollection = [];     // Winter (id: 'winter')
    window.summerCollection = [];     // Summer (id: 'summer')

    // 4. Map dashboard products to collections based on placements
    if (dashboardProducts.length > 0) {
        dashboardProducts.forEach(p => {
            const transformed = transformProduct(p);
            const placements = p.placements || [];

            if (placements.includes('new')) window.products.push(transformed);
            if (placements.includes('men')) window.menCollection.push(transformed);
            if (placements.includes('women')) window.womenCollection.push(transformed);
            if (placements.includes('kids')) window.kidsCollection.push(transformed);
            if (placements.includes('acc')) window.accessoriesCollection.push(transformed);
            if (placements.includes('bestseller')) window.bestSellersCollection.push(transformed);
            if (placements.includes('winter')) window.winterCollection.push(transformed);
            if (placements.includes('summer')) window.summerCollection.push(transformed);
        });
    }

    // 5. Backwards compatibility for variable names
    // Some older scripts might use these names
    window.mensProducts = window.menCollection;
    window.womensProducts = window.womenCollection;

    console.log('[products.js] Loaded dynamic data from Dashboard:', {
        total: dashboardProducts.length,
        men: window.menCollection.length,
        women: window.womenCollection.length,
        kids: window.kidsCollection.length,
        accessories: window.accessoriesCollection.length,
        bestSellers: window.bestSellersCollection.length,
        winter: window.winterCollection.length,
        summer: window.summerCollection.length,
        home: window.products.length
    });
})();
