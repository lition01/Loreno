/**
 * main.js
 * ─────────────────────────────────────────────────────────────
 * New Arrivals — DOM rendering & interaction logic.
 *
 * Depends on:  products.js  (must be loaded first in HTML)
 *   <script src="products.js"></script>
 *   <script src="main.js"></script>
 *
 * Responsibilities:
 *   - Build and inject product card HTML into the carousel
 *   - Handle wishlist toggle
 *   - Handle Quick-Add popup (open / close / color & size
 *     selection / quantity controls / add-to-cart flow)
 *   - Show toast notifications
 *   - Drive carousel navigation (prev / next / dot pagination)
 * ─────────────────────────────────────────────────────────────
 */

(function () {
  /* ── Guard: verify products.js was loaded before this file ── */
  if (typeof products === "undefined" || !Array.isArray(products)) {
    console.error(
      "[main.js] Error: `products` is not defined.\n" +
        "Make sure products.js is loaded BEFORE main.js in your HTML:\n" +
        '  <script src="products.js"><\/script>\n' +
        '  <script src="main.js"><\/script>',
    );
    var track = document.getElementById("carouselTrack");
    if (track) {
      track.innerHTML =
        '<p class="products-error">Unable to load products. Please check the console for details.</p>';
    }
    return; // halt execution gracefully
  }

  /* ═══════════════════════════════════════════════════════════
       1. HTML BUILDERS
       ═══════════════════════════════════════════════════════════ */

  /**
   * Build the inner HTML for one product card.
   * @param {Object} product  – single entry from products.js
   * @returns {string}        – HTML string
   */
  function buildProductCard(product) {
    var id = product.id;

    // ── Popup: colour swatches ──
    var popupColorBtns = product.colors
      .map(function (color, index) {
        var selectedClass = index === 0 ? " selected" : "";
        return (
          "<button" +
          ' class="popup-color-btn' +
          selectedClass +
          '"' +
          ' style="background-color:' +
          color +
          '"' +
          ' data-color-index="' +
          index +
          '"' +
          ' data-product-id="' +
          id +
          '"' +
          ' aria-label="Select color ' +
          (index + 1) +
          '"' +
          "></button>"
        );
      })
      .join("\n");

    // ── Popup: size buttons ──
    var popupSizeBtns = product.sizes
      .map(function (size, index) {
        var selectedClass = index === 0 ? " selected" : "";
        return (
          "<button" +
          ' class="popup-size-btn' +
          selectedClass +
          '"' +
          ' data-size-index="' +
          index +
          '"' +
          ' data-product-id="' +
          id +
          '"' +
          ">" +
          size +
          "</button>"
        );
      })
      .join("\n");

    return (
      '<article class="product-card" data-product-id="' +
      id +
      '">' +
      '<div class="product-image-wrapper">' +
      "<img" +
      ' src="' +
      product.image +
      '"' +
      ' alt="' +
      product.name +
      '"' +
      ' class="product-image"' +
      ' loading="lazy"' +
      ">" +
      '<span class="product-badge">' +
      product.badge +
      "</span>" +
      /* ── Wishlist button ── */
      '<button class="wishlist-btn" aria-label="Add to wishlist" data-product-id="' +
      id +
      '">' +
      '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">' +
      '<path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />' +
      "</svg>" +
      "</button>" +
      /* ── Quick-action overlay ── */
      '<div class="quick-actions">' +
      '<button class="action-btn cart-btn" data-tooltip="Add to Cart" data-product-id="' +
      id +
      '" aria-label="Add to cart">' +
      '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">' +
      '<path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />' +
      "</svg>" +
      "</button>" +
      '<button class="action-btn" data-tooltip="Quick View" aria-label="Quick view">' +
      '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">' +
      '<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />' +
      '<path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />' +
      "</svg>" +
      "</button>" +
      '<button class="action-btn" data-tooltip="Share" aria-label="Share product">' +
      '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">' +
      '<path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />' +
      "</svg>" +
      "</button>" +
      "</div>" +
      /* ── Quick-add popup ── */
      '<div class="quick-add-popup" id="popup-' +
      id +
      '">' +
      '<div class="popup-form" id="popup-form-' +
      id +
      '">' +
      '<div class="popup-header">' +
      "<h4>Quick Add</h4>" +
      '<button class="popup-close" data-product-id="' +
      id +
      '" aria-label="Close popup">' +
      '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">' +
      '<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />' +
      "</svg>" +
      "</button>" +
      "</div>" +
      '<div class="popup-option-group">' +
      '<label class="popup-option-label">Color</label>' +
      '<div class="popup-colors">' +
      popupColorBtns +
      "</div>" +
      "</div>" +
      '<div class="popup-option-group">' +
      '<label class="popup-option-label">Size</label>' +
      '<div class="popup-sizes">' +
      popupSizeBtns +
      "</div>" +
      "</div>" +
      '<div class="popup-option-group">' +
      '<label class="popup-option-label">Quantity</label>' +
      '<div class="popup-quantity">' +
      '<button class="qty-btn qty-minus" data-product-id="' +
      id +
      '" aria-label="Decrease quantity">-</button>' +
      '<span class="qty-value" id="qty-' +
      id +
      '">1</span>' +
      '<button class="qty-btn qty-plus"  data-product-id="' +
      id +
      '" aria-label="Increase quantity">+</button>' +
      "</div>" +
      "</div>" +
      '<button class="popup-add-btn" data-product-id="' +
      id +
      '">Add to Cart</button>' +
      "</div>" /* /.popup-form */ +
      /* ── Success state ── */
      '<div class="popup-success" id="popup-success-' +
      id +
      '">' +
      '<div class="success-icon">' +
      '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">' +
      '<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />' +
      "</svg>" +
      "</div>" +
      "<h5>Added to Cart!</h5>" +
      "<p>Item added successfully</p>" +
      "</div>" +
      "</div>" /* /.quick-add-popup */ +
      "</div>" /* /.product-image-wrapper */ +
      '<div class="product-info">' +
      '<h3 class="product-name">' +
      product.name +
      "</h3>" +
      '<p class="product-price">' +
      product.price +
      "</p>" +
      "</div>" +
      "</article>"
    );
  }

  /* ═══════════════════════════════════════════════════════════
       2. RENDER
       ═══════════════════════════════════════════════════════════ */

  function renderProducts() {
    var track = document.getElementById("carouselTrack");
    if (!track) return;

    var html = "";
    for (var i = 0; i < products.length; i++) {
      html += buildProductCard(products[i]);
    }
    track.innerHTML = html;
    syncWishlistActiveState();
  }

  function syncWishlistActiveState() {
    if (typeof window.syncWishlistButtons === "function") {
      window.syncWishlistButtons();
    }
  }

  /* ═══════════════════════════════════════════════════════════
       3. TOAST HELPER
       ═══════════════════════════════════════════════════════════ */

  var toastTimer = null;

  function showToast(message) {
    var toast = document.getElementById("toast");
    var toastMsg = document.getElementById("toastMessage");
    if (!toast || !toastMsg) return;

    toastMsg.textContent = message;
    toast.classList.add("show");

    clearTimeout(toastTimer);
    toastTimer = setTimeout(function () {
      toast.classList.remove("show");
    }, 3000);
  }

  /* ═══════════════════════════════════════════════════════════
       4. POPUP HELPERS
       ═══════════════════════════════════════════════════════════ */

  function openPopup(productId) {
    var popup = document.getElementById("popup-" + productId);
    if (!popup) return;
    // Resets form view, adds 'active' class
    // But does NOT initialize popupState
    popup.classList.add("active");
  }

  function closePopup(productId) {
    var popup = document.getElementById("popup-" + productId);
    if (popup) popup.classList.remove("active");
  }

  function closeAllPopups() {
    document
      .querySelectorAll(".quick-add-popup.active")
      .forEach(function (popup) {
        popup.classList.remove("active");
      });
  }

  /* ═══════════════════════════════════════════════════════════
       5. CAROUSEL
       ═══════════════════════════════════════════════════════════ */

  var currentIndex = 0;
  var cardsPerView = 4; // updated on resize

  function getCardsPerView() {
    var w = window.innerWidth;
    if (w <= 600) return 1;
    if (w <= 900) return 2;
    if (w <= 1200) return 3;
    return 4;
  }

  function getMaxIndex() {
    return Math.max(0, products.length - cardsPerView);
  }

  function updateCarousel() {
    var track = document.getElementById("carouselTrack");
    if (!track) return;

    cardsPerView = getCardsPerView();
    var maxIndex = getMaxIndex();
    currentIndex = Math.min(currentIndex, maxIndex);

    var card = track.querySelector(".product-card");
    var cardWidth = card
      ? card.getBoundingClientRect().width + 24 /* gap = 24 px */
      : 0;

    track.style.transform = "translateX(-" + currentIndex * cardWidth + "px)";

    // Prev / next buttons
    var prevBtn = document.getElementById("prevBtn");
    var nextBtn = document.getElementById("nextBtn");
    if (prevBtn) prevBtn.disabled = currentIndex === 0;
    if (nextBtn) nextBtn.disabled = currentIndex >= maxIndex;

    // Pagination dots
    updateDots();
  }

  function buildDots() {
    var container = document.getElementById("paginationDots");
    if (!container) return;

    cardsPerView = getCardsPerView();
    var totalDots = getMaxIndex() + 1;
    var html = "";
    for (var i = 0; i < totalDots; i++) {
      var activeClass = i === currentIndex ? " active" : "";
      html +=
        '<button class="dot' +
        activeClass +
        '" data-dot-index="' +
        i +
        '" aria-label="Go to slide ' +
        (i + 1) +
        '"></button>';
    }
    container.innerHTML = html;
  }

  function updateDots() {
    document.querySelectorAll(".dot").forEach(function (dot) {
      var idx = parseInt(dot.getAttribute("data-dot-index"), 10);
      dot.classList.toggle("active", idx === currentIndex);
    });
  }

  /* ═══════════════════════════════════════════════════════════
       6. EVENT DELEGATION
       ═══════════════════════════════════════════════════════════ */

  function attachEvents() {
    var section = document.querySelector(".new-arrivals-section");
    if (!section) return;

    /* ── Delegated click handler ── */
    section.addEventListener("click", function (e) {
      var target = e.target;

      // Only handle carousel navigation here. Cart/wishlist/popups are handled globally.

      // ── Pagination dots ──
      var dot = target.closest(".dot");
      if (dot) {
        currentIndex = parseInt(dot.getAttribute("data-dot-index"), 10);
        updateCarousel();
        return;
      }

      // ── Previous carousel button ──
      if (target.closest("#prevBtn")) {
        if (currentIndex > 0) {
          currentIndex--;
          updateCarousel();
        }
        return;
      }

      // ── Next carousel button ──
      if (target.closest("#nextBtn")) {
        if (currentIndex < getMaxIndex()) {
          currentIndex++;
          updateCarousel();
        }
        return;
      }
    });

    /* ── Resize: recalculate carousel layout ── */
    var resizeTimer;
    window.addEventListener("resize", function () {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function () {
        buildDots();
        updateCarousel();
      }, 200);
    });
  }

  /* ═══════════════════════════════════════════════════════════
       7. INIT
       ═══════════════════════════════════════════════════════════ */

  function init() {
    renderProducts(); // inject cards (uses `products` from products.js)
    buildDots(); // build pagination dots
    updateCarousel(); // set initial carousel position & button states
    attachEvents(); // wire up all interactivity
  }

  // Run after DOM is ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
