/**
 * sale-main.js
 * Sale Collection — Simplified rendering without filters.
 */
(function () {
  var SVG_HEART =
    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>';
  var SVG_BAG =
    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>';
  var SVG_EYE =
    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>';
  var SVG_SHARE =
    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" /></svg>';
  var SVG_CLOSE =
    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>';
  var SVG_CHECK =
    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>';
  var SVG_SEARCH =
    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>';

  function generateProductCard(product) {
    var id = product.id;
    var subcatInfo = product.subcategory ? '<span style="text-transform:capitalize;">' + product.subcategory + '</span>' : '';
    var fitInfo = product.fit ? '<span style="text-transform:capitalize;">' + product.fit + '</span>' : '';
    var metaInfo = (subcatInfo || fitInfo) ? 
      '<div style="font-size:12px;color:var(--color-sand);margin-bottom:4px;">' + 
      subcatInfo + (subcatInfo && fitInfo ? ' &bull; ' : '') + fitInfo + 
      '</div>' : '';

    var priceHTML = '<span style="color:#c0392b;font-weight:700;">$' + product.salePrice + '</span>' +
                  '<span style="text-decoration:line-through;color:var(--color-sand);font-size:0.85rem;margin-left:8px;">' + product.price + '</span>';
    
    var badgeHTML = '<span class="product-badge" style="background:#c0392b;">-' + product.saleDiscount + '%</span>';

    var popupColorBtns = "";
    for (var ci = 0; ci < product.colors.length; ci++) {
      var selectedClass = ci === 0 ? " selected" : "";
      popupColorBtns +=
        '<button class="popup-color-btn' +
        selectedClass +
        '" style="background-color:' +
        product.colors[ci] +
        '" data-color-index="' +
        ci +
        '" data-product-id="' +
        id +
        '" aria-label="Select color ' +
        (ci + 1) +
        '"></button>\n';
    }
    var popupSizeBtns = "";
    for (var si = 0; si < product.sizes.length; si++) {
      var selectedSizeClass = si === 0 ? " selected" : "";
      popupSizeBtns +=
        '<button class="popup-size-btn' +
        selectedSizeClass +
        '" data-size-index="' +
        si +
        '" data-product-id="' +
        id +
        '">' +
        product.sizes[si] +
        "</button>\n";
    }

    return (
      '<article class="product-card" data-product-id="' + id + '">' +
      '<div class="product-image-wrapper">' +
      '<img src="' + product.image + '" alt="' + product.name + '" class="product-image" loading="lazy">' +
      badgeHTML +
      '<button class="wishlist-btn" aria-label="Add to wishlist" data-product-id="' + id + '">' + SVG_HEART + '</button>' +
      '<div class="quick-actions">' +
      '<button class="action-btn cart-btn" data-tooltip="Add to Cart" data-product-id="' + id + '">' + SVG_BAG + '</button>' +
      '<button class="action-btn" data-tooltip="Quick View">' + SVG_EYE + '</button>' +
      '<button class="action-btn" data-tooltip="Share">' + SVG_SHARE + '</button>' +
      '</div>' +
      '<div class="quick-add-popup" id="popup-' + id + '">' +
      '<div class="popup-form" id="popup-form-' + id + '">' +
      '<div class="popup-header">' +
      '<h4>Quick Add</h4>' +
      '<button class="popup-close" data-product-id="' + id + '">' + SVG_CLOSE + '</button>' +
      '</div>' +
      '<div class="popup-option-group"><label class="popup-option-label">Color</label><div class="popup-colors">' + popupColorBtns + '</div></div>' +
      '<div class="popup-option-group"><label class="popup-option-label">Size</label><div class="popup-sizes">' + popupSizeBtns + '</div></div>' +
      '<div class="popup-option-group"><label class="popup-option-label">Quantity</label><div class="popup-quantity">' +
      '<button class="qty-btn qty-minus" data-product-id="' + id + '">-</button>' +
      '<span class="qty-value" id="qty-' + id + '">1</span>' +
      '<button class="qty-btn qty-plus" data-product-id="' + id + '">+</button>' +
      '</div></div>' +
      '<button class="popup-add-btn" data-product-id="' + id + '">Add to Cart</button>' +
      '</div>' +
      '<div class="popup-success" id="popup-success-' + id + '">' +
      '<div class="success-icon">' + SVG_CHECK + '</div>' +
      '<h5>Added to Cart!</h5>' +
      '<p>Item added successfully</p>' +
      '</div>' +
      '</div>' +
      '</div>' +
      '<div class="product-info">' +
      metaInfo +
      '<h3 class="product-name">' + product.name + '</h3>' +
      '<p class="product-price">' + priceHTML + '</p>' +
      '</div>' +
      '</article>'
    );
  }

  function renderProducts() {
    var carouselTrack = document.getElementById("carouselTrack");
    var collection = (typeof saleCollection !== 'undefined') ? saleCollection : [];
    
    var visibleCountEl = document.getElementById("visibleCount");
    if (visibleCountEl) visibleCountEl.textContent = collection.length;

    if (!carouselTrack) return;

    if (collection.length === 0) {
      carouselTrack.innerHTML =
        '<div class="no-results"><div class="no-results-icon">' +
        SVG_SEARCH +
        "</div><h3>No sale products found</h3><p>Check back later for new deals.</p></div>";
    } else {
      var html = "";
      for (var i = 0; i < collection.length; i++) {
        html += generateProductCard(collection[i]);
      }
      carouselTrack.innerHTML = html;
    }
    syncWishlistActiveState();
  }

  function init() {
    renderProducts();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }

  function syncWishlistActiveState() {
    if (typeof window.syncWishlistButtons === "function") {
      window.syncWishlistButtons();
    }
  }
})();
