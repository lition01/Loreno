/**
 * products.js
 * ─────────────────────────────────────────────────────────────
 * Pure product data — Women's New Arrivals + Women's Collection
 *                   + Men's Collection.
 * No DOM manipulation. No event listeners. Data only.
 *
 * Globals:
 *   products        — Women's New Arrivals (ids 1–8)
 *   womensProducts  — Women's Collection   (ids 9–24)
 *   mensProducts    — Men's Collection     (ids 25–40)
 * ─────────────────────────────────────────────────────────────
 */


/* ═══════════════════════════════════════════════════════════
   WOMEN'S NEW ARRIVALS  (used by main.js / index.html)
═══════════════════════════════════════════════════════════ */
var products = [
    {
        id: 1,
        name: "Linen Blend Shirt",
        price: "$89.00",
        priceValue: 89,
        image: "https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=600&h=800&fit=crop",
        badge: "New",
        colors: ["#c6baa5", "#2f2716", "#ffffff"],
        sizes: ["XS", "S", "M", "L", "XL"]
    },
    {
        id: 2,
        name: "Pleated Midi Skirt",
        price: "$125.00",
        priceValue: 125,
        image: "https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600&h=800&fit=crop",
        badge: "New",
        colors: ["#a8845e", "#7e5232", "#c6baa5"],
        sizes: ["XS", "S", "M", "L"]
    },
    {
        id: 3,
        name: "Oversized Wool Coat",
        price: "$345.00",
        priceValue: 345,
        image: "https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=600&h=800&fit=crop",
        badge: "New",
        colors: ["#b39c80", "#2f2716"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 4,
        name: "Silk Camisole Top",
        price: "$78.00",
        priceValue: 78,
        image: "https://images.unsplash.com/photo-1485462537746-965f33f7f6a7?w=600&h=800&fit=crop",
        badge: "New",
        colors: ["#c6baa5", "#a8845e", "#ffffff"],
        sizes: ["XS", "S", "M", "L"]
    },
    {
        id: 5,
        name: "High-Waist Trousers",
        price: "$145.00",
        priceValue: 145,
        image: "https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600&h=800&fit=crop",
        badge: "New",
        colors: ["#2f2716", "#7e5232", "#b39c80"],
        sizes: ["XS", "S", "M", "L", "XL"]
    },
    {
        id: 6,
        name: "Cashmere Turtleneck",
        price: "$195.00",
        priceValue: 195,
        image: "https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=600&h=800&fit=crop",
        badge: "New",
        colors: ["#c6baa5", "#a8845e", "#2f2716"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 7,
        name: "Leather Belt Bag",
        price: "$165.00",
        priceValue: 165,
        image: "https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=600&h=800&fit=crop",
        badge: "New",
        colors: ["#7e5232", "#2f2716", "#a8845e"],
        sizes: ["One Size"]
    },
    {
        id: 8,
        name: "Structured Blazer",
        price: "$265.00",
        priceValue: 265,
        image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop",
        badge: "New",
        colors: ["#b39c80", "#2f2716", "#7e5232"],
        sizes: ["XS", "S", "M", "L", "XL"]
    }
];


/* ═══════════════════════════════════════════════════════════
   SUMMER COLLECTION
═══════════════════════════════════════════════════════════ */
var summerCollection = [
    {
        id: 9,
        name: "Wrap Midi Dress",
        price: "$175.00",
        priceValue: 175,
        image: "https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?w=600&h=800&fit=crop",
        badge: "New",
        category: "dresses",
        fit: "regular",
        colors: ["#a8845e", "#c6baa5", "#2f2716"],
        sizes: ["XS", "S", "M", "L", "XL"]
    },
    {
        id: 10,
        name: "Linen Wide-Leg Trousers",
        price: "$155.00",
        priceValue: 155,
        image: "https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600&h=800&fit=crop",
        badge: "New",
        category: "trousers",
        fit: "relaxed",
        colors: ["#c6baa5", "#ffffff", "#2f2716"],
        sizes: ["XS", "S", "M", "L", "XL"]
    },
    {
        id: 11,
        name: "Satin Slip Skirt",
        price: "$115.00",
        priceValue: 115,
        image: "https://images.unsplash.com/photo-1583496661160-fb5886a0aaaa?w=600&h=800&fit=crop",
        badge: "New",
        category: "skirts",
        fit: "slim",
        colors: ["#c6baa5", "#7e5232", "#2f2716"],
        sizes: ["XS", "S", "M", "L"]
    },
    {
        id: 12,
        name: "Merino Wool Cardigan",
        price: "$210.00",
        priceValue: 210,
        image: "https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=600&h=800&fit=crop",
        badge: "New",
        category: "knitwear",
        fit: "relaxed",
        colors: ["#b39c80", "#a8845e", "#ffffff"],
        sizes: ["XS", "S", "M", "L", "XL"]
    },
    {
        id: 13,
        name: "Tailored Wool Blazer",
        price: "$295.00",
        priceValue: 295,
        image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop",
        badge: "New",
        category: "outerwear",
        fit: "slim",
        colors: ["#2f2716", "#b39c80", "#4a4a4a"],
        sizes: ["XS", "S", "M", "L", "XL"]
    },
    {
        id: 14,
        name: "Leather Tote Bag",
        price: "$385.00",
        priceValue: 385,
        image: "https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=600&h=800&fit=crop",
        badge: "New",
        category: "accessories",
        fit: "regular",
        colors: ["#7e5232", "#2f2716", "#c6baa5"],
        sizes: ["One Size"]
    },
    {
        id: 15,
        name: "Silk Button-Down Blouse",
        price: "$165.00",
        priceValue: 165,
        image: "https://images.unsplash.com/photo-1485462537746-965f33f7f6a7?w=600&h=800&fit=crop",
        badge: "New",
        category: "tops",
        fit: "regular",
        colors: ["#ffffff", "#c6baa5", "#a8845e"],
        sizes: ["XS", "S", "M", "L"]
    },
    {
        id: 16,
        name: "Suede Ankle Boots",
        price: "$315.00",
        priceValue: 315,
        image: "https://images.unsplash.com/photo-1608256246200-53e635b5b65f?w=600&h=800&fit=crop",
        badge: "New",
        category: "footwear",
        fit: "regular",
        colors: ["#7e5232", "#2f2716"],
        sizes: ["36", "37", "38", "39", "40", "41"]
    },
    {
        id: 17,
        name: "Ribbed Knit Midi Dress",
        price: "$195.00",
        priceValue: 195,
        image: "https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?w=600&h=800&fit=crop",
        badge: "New",
        category: "dresses",
        fit: "slim",
        colors: ["#2f2716", "#b39c80", "#a8845e"],
        sizes: ["XS", "S", "M", "L"]
    },
    {
        id: 18,
        name: "Cashmere Wrap Scarf",
        price: "$145.00",
        priceValue: 145,
        image: "https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=600&h=800&fit=crop",
        badge: "New",
        category: "accessories",
        fit: "regular",
        colors: ["#c6baa5", "#b39c80", "#2f2716"],
        sizes: ["One Size"]
    },
    {
        id: 19,
        name: "Cropped Linen Jacket",
        price: "$245.00",
        priceValue: 245,
        image: "https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=600&h=800&fit=crop",
        badge: "New",
        category: "outerwear",
        fit: "regular",
        colors: ["#c6baa5", "#a8845e", "#ffffff"],
        sizes: ["XS", "S", "M", "L", "XL"]
    },
    {
        id: 20,
        name: "High-Rise Straight Jeans",
        price: "$185.00",
        priceValue: 185,
        image: "https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600&h=800&fit=crop",
        badge: "New",
        category: "trousers",
        fit: "regular",
        colors: ["#4169e1", "#2f2716"],
        sizes: ["XS", "S", "M", "L", "XL"]
    },
    {
        id: 21,
        name: "Slip-On Leather Loafers",
        price: "$275.00",
        priceValue: 275,
        image: "https://images.unsplash.com/photo-1608256246200-53e635b5b65f?w=600&h=800&fit=crop",
        badge: "New",
        category: "footwear",
        fit: "regular",
        colors: ["#2f2716", "#7e5232", "#c6baa5"],
        sizes: ["36", "37", "38", "39", "40", "41"]
    },
    {
        id: 22,
        name: "Ruched Mini Skirt",
        price: "$98.00",
        priceValue: 98,
        image: "https://images.unsplash.com/photo-1583496661160-fb5886a0aaaa?w=600&h=800&fit=crop",
        badge: "New",
        category: "skirts",
        fit: "slim",
        colors: ["#a8845e", "#2f2716", "#8b0000"],
        sizes: ["XS", "S", "M", "L"]
    },
    {
        id: 23,
        name: "Oversized Knit Sweater",
        price: "$225.00",
        priceValue: 225,
        image: "https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=600&h=800&fit=crop",
        badge: "New",
        category: "knitwear",
        fit: "relaxed",
        colors: ["#c6baa5", "#b39c80", "#2f2716"],
        sizes: ["XS", "S", "M", "L", "XL"]
    },
    {
        id: 24,
        name: "Chain Strap Shoulder Bag",
        price: "$295.00",
        priceValue: 295,
        image: "https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=600&h=800&fit=crop",
        badge: "New",
        category: "accessories",
        fit: "regular",
        colors: ["#7e5232", "#2f2716", "#c0c0c0"],
        sizes: ["One Size"]
    }
];


/* ═══════════════════════════════════════════════════════════
   WINTER COLLECTION
═══════════════════════════════════════════════════════════ */
var winterCollection = [
    {
        id: 25,
        name: "Classic Wool Blazer",
        price: "$425.00",
        priceValue: 425,
        image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop",
        badge: "New",
        category: "outerwear",
        fit: "slim",
        colors: ["#2f2716", "#4a4a4a", "#1a472a"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 26,
        name: "Oxford Dress Shirt",
        price: "$145.00",
        priceValue: 145,
        image: "https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=600&h=800&fit=crop",
        badge: "New",
        category: "shirts",
        fit: "regular",
        colors: ["#ffffff", "#87ceeb", "#c6baa5"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 27,
        name: "Leather Belt",
        price: "$95.00",
        priceValue: 95,
        image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop",
        badge: "New",
        category: "accessories",
        fit: "regular",
        colors: ["#2f2716", "#7e5232"],
        sizes: ["S", "M", "L"]
    },
    {
        id: 28,
        name: "Leather Dress Shoes",
        price: "$325.00",
        priceValue: 325,
        image: "https://images.unsplash.com/photo-1608256246200-53e635b5b65f?w=600&h=800&fit=crop",
        badge: "New",
        category: "footwear",
        fit: "regular",
        colors: ["#2f2716", "#7e5232"],
        sizes: ["8", "9", "10", "11", "12"]
    },
    {
        id: 29,
        name: "Trench Coat",
        price: "$485.00",
        priceValue: 485,
        image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop",
        badge: "New",
        category: "outerwear",
        fit: "relaxed",
        colors: ["#c6baa5", "#2f2716"],
        sizes: ["M", "L", "XL"]
    },
    {
        id: 30,
        name: "Linen Casual Shirt",
        price: "$125.00",
        priceValue: 125,
        image: "https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=600&h=800&fit=crop",
        badge: "New",
        category: "shirts",
        fit: "relaxed",
        colors: ["#ffffff", "#c6baa5", "#87ceeb"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 31,
        name: "Silk Tie",
        price: "$75.00",
        priceValue: 75,
        image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop",
        badge: "New",
        category: "accessories",
        fit: "regular",
        colors: ["#8b0000", "#2f2716", "#1a472a"],
        sizes: ["One Size"]
    },
    {
        id: 32,
        name: "Suede Loafers",
        price: "$275.00",
        priceValue: 275,
        image: "https://images.unsplash.com/photo-1608256246200-53e635b5b65f?w=600&h=800&fit=crop",
        badge: "New",
        category: "footwear",
        fit: "regular",
        colors: ["#7e5232", "#2f2716"],
        sizes: ["8", "9", "10", "11", "12"]
    },
    {
        id: 33,
        name: "Denim Jacket",
        price: "$195.00",
        priceValue: 195,
        image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop",
        badge: "New",
        category: "outerwear",
        fit: "regular",
        colors: ["#4169e1", "#2f2716"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 34,
        name: "Polo Shirt",
        price: "$95.00",
        priceValue: 95,
        image: "https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=600&h=800&fit=crop",
        badge: "New",
        category: "shirts",
        fit: "slim",
        colors: ["#ffffff", "#2f2716", "#1a472a"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 35,
        name: "Leather Wallet",
        price: "$125.00",
        priceValue: 125,
        image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop",
        badge: "New",
        category: "accessories",
        fit: "regular",
        colors: ["#2f2716", "#7e5232"],
        sizes: ["One Size"]
    },
    {
        id: 36,
        name: "Canvas Sneakers",
        price: "$145.00",
        priceValue: 145,
        image: "https://images.unsplash.com/photo-1608256246200-53e635b5b65f?w=600&h=800&fit=crop",
        badge: "New",
        category: "footwear",
        fit: "regular",
        colors: ["#ffffff", "#2f2716"],
        sizes: ["8", "9", "10", "11", "12"]
    },
    {
        id: 37,
        name: "Bomber Jacket",
        price: "$295.00",
        priceValue: 295,
        image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop",
        badge: "New",
        category: "outerwear",
        fit: "regular",
        colors: ["#2f2716", "#1a472a"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 38,
        name: "Flannel Shirt",
        price: "$115.00",
        priceValue: 115,
        image: "https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=600&h=800&fit=crop",
        badge: "New",
        category: "shirts",
        fit: "relaxed",
        colors: ["#8b0000", "#2f2716"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 39,
        name: "Watch",
        price: "$385.00",
        priceValue: 385,
        image: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&h=800&fit=crop",
        badge: "New",
        category: "accessories",
        fit: "regular",
        colors: ["#c0c0c0", "#ffd700"],
        sizes: ["One Size"]
    },
    {
        id: 40,
        name: "Chelsea Boots",
        price: "$345.00",
        priceValue: 345,
        image: "https://images.unsplash.com/photo-1608256246200-53e635b5b65f?w=600&h=800&fit=crop",
        badge: "New",
        category: "footwear",
        fit: "regular",
        colors: ["#2f2716", "#7e5232"],
        sizes: ["8", "9", "10", "11", "12"]
    }
];










var menCollection = [
    {
        id: 41,
        name: "Tech Stretch Chinos",
        price: "$120.00",
        priceValue: 120,
        image: "https://images.unsplash.com/photo-1516826957135-700dedea698c?w=600&h=800&fit=crop",
        badge: "New",
        category: "trousers",
        fit: "regular",
        colors: ["#2f2716", "#4a4a4a", "#c6baa5"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 42,
        name: "Pima Cotton Tee",
        price: "$45.00",
        priceValue: 45,
        image: "https://images.unsplash.com/photo-1539533113208-f6df8cc8b543?w=600&h=800&fit=crop",
        badge: "New",
        category: "shirts",
        fit: "regular",
        colors: ["#ffffff", "#1a472a", "#2f2716"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 43,
        name: "Lightweight Hoodie",
        price: "$89.00",
        priceValue: 89,
        image: "https://images.unsplash.com/photo-1544441892-55cb3b0026c2?w=600&h=800&fit=crop",
        badge: "New",
        category: "knitwear",
        fit: "relaxed",
        colors: ["#4a4a4a", "#2f2716", "#87ceeb"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 44,
        name: "Minimalist Sneakers",
        price: "$140.00",
        priceValue: 140,
        image: "https://images.unsplash.com/photo-1519741497674-611481863552?w=600&h=800&fit=crop",
        badge: "New",
        category: "footwear",
        fit: "regular",
        colors: ["#ffffff", "#2f2716"],
        sizes: ["8", "9", "10", "11", "12"]
    },
    {
        id: 45,
        name: "Nylon Crossbody Bag",
        price: "$95.00",
        priceValue: 95,
        image: "https://images.unsplash.com/photo-1618354691243-d2e1d9d4978d?w=600&h=800&fit=crop",
        badge: "New",
        category: "accessories",
        fit: "regular",
        colors: ["#2f2716", "#4a4a4a"],
        sizes: ["One Size"]
    },
    {
        id: 46,
        name: "Seersucker Shirt",
        price: "$110.00",
        priceValue: 110,
        image: "https://images.unsplash.com/photo-1503341455253-b2e723bb3dbb?w=600&h=800&fit=crop",
        badge: "New",
        category: "shirts",
        fit: "slim",
        colors: ["#87ceeb", "#ffffff", "#2f2716"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 53,
        name: "Linen Resort Shirt",
        price: "$135.00",
        priceValue: 135,
        image: "https://images.unsplash.com/photo-1514996937319-344454492b37?w=600&h=800&fit=crop",
        badge: "New",
        category: "shirts",
        fit: "relaxed",
        colors: ["#ffffff", "#87ceeb", "#c6baa5"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 54,
        name: "Tailored Linen Blazer",
        price: "$325.00",
        priceValue: 325,
        image: "https://images.unsplash.com/photo-1528701800489-20be3c30c1d5?w=600&h=800&fit=crop",
        badge: "New",
        category: "outerwear",
        fit: "slim",
        colors: ["#c6baa5", "#2f2716", "#4a4a4a"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 55,
        name: "Cotton Drawstring Shorts",
        price: "$95.00",
        priceValue: 95,
        image: "https://images.unsplash.com/photo-1512436991641-6745cdb1723f?w=600&h=800&fit=crop",
        badge: "New",
        category: "trousers",
        fit: "regular",
        colors: ["#c6baa5", "#ffffff", "#2f2716"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 56,
        name: "Textured Knit Polo",
        price: "$120.00",
        priceValue: 120,
        image: "https://images.unsplash.com/photo-1543076447-215ad9ba6923?w=600&h=800&fit=crop",
        badge: "New",
        category: "knitwear",
        fit: "regular",
        colors: ["#4a4a4a", "#2f2716", "#c6baa5"],
        sizes: ["S", "M", "L", "XL"]
    },
    {
        id: 57,
        name: "Leather Weekend Bag",
        price: "$395.00",
        priceValue: 395,
        image: "https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=600&h=800&fit=crop",
        badge: "New",
        category: "accessories",
        fit: "regular",
        colors: ["#7e5232", "#2f2716", "#c6baa5"],
        sizes: ["One Size"]
    },
    {
        id: 58,
        name: "Suede Desert Boots",
        price: "$210.00",
        priceValue: 210,
        image: "https://images.unsplash.com/photo-1514996937319-344454492b37?w=600&h=800&fit=crop",
        badge: "New",
        category: "footwear",
        fit: "regular",
        colors: ["#7e5232", "#2f2716"],
        sizes: ["8", "9", "10", "11", "12"]
    },
    {
        id: 59,
        name: "Slim Stretch Jeans",
        price: "$155.00",
        priceValue: 155,
        image: "https://images.unsplash.com/photo-1519895609939-d2a6491c1196?w=600&h=800&fit=crop",
        badge: "New",
        category: "trousers",
        fit: "slim",
        colors: ["#4169e1", "#2f2716"],
        sizes: ["S", "M", "L", "XL"]
    }
];







var womenCollection = [
    {
        id: 47,
        name: "Pleated Midi Skirt",
        price: "$130.00",
        priceValue: 130,
        image: "https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?w=600&h=800&fit=crop",
        badge: "New",
        category: "skirts",
        fit: "regular",
        colors: ["#c6baa5", "#ffffff", "#2f2716"],
        sizes: ["XS", "S", "M", "L"]
    },
    {
        id: 48,
        name: "Poplin Shirt Dress",
        price: "$165.00",
        priceValue: 165,
        image: "https://images.unsplash.com/photo-1520975916090-3105956dac38?w=600&h=800&fit=crop",
        badge: "New",
        category: "dresses",
        fit: "relaxed",
        colors: ["#ffffff", "#b39c80", "#2f2716"],
        sizes: ["XS", "S", "M", "L", "XL"]
    },
    {
        id: 49,
        name: "Knit Tank Top",
        price: "$55.00",
        priceValue: 55,
        image: "https://images.unsplash.com/photo-1520975922284-7b2bd283e1d0?w=600&h=800&fit=crop",
        badge: "New",
        category: "tops",
        fit: "slim",
        colors: ["#a8845e", "#c6baa5", "#2f2716"],
        sizes: ["XS", "S", "M", "L"]
    },
    {
        id: 50,
        name: "Strappy Sandals",
        price: "$145.00",
        priceValue: 145,
        image: "https://images.unsplash.com/photo-1520975619016-68d6df9a2f1c?w=600&h=800&fit=crop",
        badge: "New",
        category: "footwear",
        fit: "regular",
        colors: ["#ffffff", "#b39c80"],
        sizes: ["5", "6", "7", "8", "9"]
    },
    {
        id: 51,
        name: "Structured Mini Bag",
        price: "$180.00",
        priceValue: 180,
        image: "https://images.unsplash.com/photo-1548036873-7d4c3e46d680?w=600&h=800&fit=crop",
        badge: "New",
        category: "accessories",
        fit: "regular",
        colors: ["#7e5232", "#2f2716"],
        sizes: ["One Size"]
    },
    {
        id: 52,
        name: "Linen Blend Shorts",
        price: "$75.00",
        priceValue: 75,
        image: "https://images.unsplash.com/photo-1519689682421-28b91433a95e?w=600&h=800&fit=crop",
        badge: "New",
        category: "trousers",
        fit: "relaxed",
        colors: ["#c6baa5", "#ffffff", "#2f2716"],
        sizes: ["XS", "S", "M", "L"]
    }
];
