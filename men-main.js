/**
 * men-main.js
 * Men's Collection — DOM rendering & interaction logic.
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

  var filterState = {
    category: [],
    size: [],
    fit: [],
    minPrice: 0,
    maxPrice: 500,
    sortOrder: "",
  };

  function generateProductCard(product) {
    var id = product.id;
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
      '<article class="product-card" data-product-id="' +
      id +
      '">' +
      '<div class="product-image-wrapper">' +
      '<img src="' +
      product.image +
      '" alt="' +
      product.name +
      '" class="product-image" loading="lazy">' +
      '<span class="product-badge">' +
      product.badge +
      "</span>" +
      '<button class="wishlist-btn" aria-label="Add to wishlist" data-product-id="' +
      id +
      '">' +
      SVG_HEART +
      "</button>" +
      '<div class="quick-actions">' +
      '<button class="action-btn cart-btn" data-tooltip="Add to Cart" data-product-id="' +
      id +
      '" aria-label="Add to cart">' +
      SVG_BAG +
      "</button>" +
      '<button class="action-btn" data-tooltip="Quick View" aria-label="Quick view">' +
      SVG_EYE +
      "</button>" +
      '<button class="action-btn" data-tooltip="Share" aria-label="Share product">' +
      SVG_SHARE +
      "</button>" +
      "</div>" +
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
      SVG_CLOSE +
      "</button>" +
      "</div>" +
      '<div class="popup-option-group"><label class="popup-option-label">Color</label><div class="popup-colors">' +
      popupColorBtns +
      "</div></div>" +
      '<div class="popup-option-group"><label class="popup-option-label">Size</label><div class="popup-sizes">' +
      popupSizeBtns +
      "</div></div>" +
      '<div class="popup-option-group"><label class="popup-option-label">Quantity</label><div class="popup-quantity">' +
      '<button class="qty-btn qty-minus" data-product-id="' +
      id +
      '" aria-label="Decrease quantity">-</button>' +
      '<span class="qty-value" id="qty-' +
      id +
      '">1</span>' +
      '<button class="qty-btn qty-plus" data-product-id="' +
      id +
      '" aria-label="Increase quantity">+</button>' +
      "</div></div>" +
      '<button class="popup-add-btn" data-product-id="' +
      id +
      '">Add to Cart</button>' +
      "</div>" +
      '<div class="popup-success" id="popup-success-' +
      id +
      '">' +
      '<div class="success-icon">' +
      SVG_CHECK +
      "</div>" +
      "<h5>Added to Cart!</h5>" +
      "<p>Item added successfully</p>" +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="product-info"><h3 class="product-name">' +
      product.name +
      '</h3><p class="product-price">' +
      product.price +
      "</p></div>" +
      "</article>"
    );
  }

  function filterAndSortProducts() {
    var collection = (typeof menCollection !== 'undefined') ? menCollection : [];
    var filtered = collection.filter(function (product) {
      if (
        filterState.category.length > 0 &&
        filterState.category.indexOf(product.category) === -1
      )
        return false;
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
      if (
        filterState.fit.length > 0 &&
        filterState.fit.indexOf(product.fit) === -1
      )
        return false;
      if (
        product.priceValue < filterState.minPrice ||
        product.priceValue > filterState.maxPrice
      )
        return false;
      return true;
    });
    if (filterState.sortOrder === "asc") {
      filtered.sort(function (a, b) {
        return a.priceValue - b.priceValue;
      });
    } else if (filterState.sortOrder === "desc") {
      filtered.sort(function (a, b) {
        return b.priceValue - a.priceValue;
      });
    } else if (filterState.sortOrder === "name") {
      filtered.sort(function (a, b) {
        return a.name.localeCompare(b.name);
      });
    }
    return filtered;
  }

  function updateCounts() {
    var counts = {
      outerwear: 0,
      shirts: 0,
      accessories: 0,
      footwear: 0,
      XS: 0,
      S: 0,
      M: 0,
      L: 0,
      XL: 0,
      slim: 0,
      regular: 0,
      relaxed: 0,
    };
    var collection = (typeof menCollection !== 'undefined') ? menCollection : [];
    collection.forEach(function (p) {
      if (counts[p.category] !== undefined) counts[p.category]++;
      if (counts[p.fit] !== undefined) counts[p.fit]++;
      for (var i = 0; i < p.sizes.length; i++) {
        if (counts[p.sizes[i]] !== undefined) counts[p.sizes[i]]++;
      }
    });
    Object.keys(counts).forEach(function (key) {
      document
        .querySelectorAll('[data-count="' + key + '"]')
        .forEach(function (el) {
          el.textContent = counts[key];
        });
    });
  }

  function updateActiveFilters() {
    var bar = document.getElementById("activeFiltersBar");
    var pills = [];
    filterState.category.forEach(function (c) {
      pills.push(
        '<div class="filter-pill">' +
          c +
          '<button data-remove="category:' +
          c +
          '">' +
          SVG_CLOSE +
          "</button></div>",
      );
    });
    filterState.size.forEach(function (s) {
      pills.push(
        '<div class="filter-pill">Size: ' +
          s +
          '<button data-remove="size:' +
          s +
          '">' +
          SVG_CLOSE +
          "</button></div>",
      );
    });
    filterState.fit.forEach(function (f) {
      pills.push(
        '<div class="filter-pill">' +
          f +
          ' fit<button data-remove="fit:' +
          f +
          '">' +
          SVG_CLOSE +
          "</button></div>",
      );
    });
    if (filterState.minPrice > 0 || filterState.maxPrice < 500) {
      pills.push(
        '<div class="filter-pill">$' +
          filterState.minPrice +
          " – $" +
          filterState.maxPrice +
          '<button data-remove="price">' +
          SVG_CLOSE +
          "</button></div>",
      );
    }
    if (pills.length > 0) {
      bar.innerHTML = pills.join("");
      bar.classList.remove("empty");
    } else {
      bar.classList.add("empty");
    }
  }

  function renderProducts() {
    var filtered = filterAndSortProducts();
    var carouselTrack = document.getElementById("carouselTrack");
    var collection = (typeof menCollection !== 'undefined') ? menCollection : [];
    document.getElementById("visibleCount").textContent = filtered.length;
    document.getElementById("totalCount").textContent = collection.length;
    if (filtered.length === 0) {
      carouselTrack.innerHTML =
        '<div class="no-results"><div class="no-results-icon">' +
        SVG_SEARCH +
        "</div><h3>No products found</h3><p>Try adjusting your filters to find what you're looking for.</p></div>";
    } else {
      var html = "";
      for (var i = 0; i < filtered.length; i++) {
        html += generateProductCard(filtered[i]);
      }
      carouselTrack.innerHTML = html;
    }
    updateActiveFilters();
    syncWishlistActiveState();
  }

  function closeAllFilterPopups() {
    document.getElementById("filterPopup").classList.remove("active");
    document.getElementById("filterPopupOverlay").classList.remove("active");
    document.getElementById("miniPopupOverlay").classList.remove("active");
    document.getElementById("orderPopup").classList.remove("active");
    document.getElementById("orderPopupOverlay").classList.remove("active");
    document.querySelectorAll(".mini-popup").forEach(function (mp) {
      mp.classList.remove("active");
    });
  }
  function closeMiniPopups() {
    document.querySelectorAll(".mini-popup").forEach(function (mp) {
      mp.classList.remove("active");
    });
    document.getElementById("miniPopupOverlay").classList.remove("active");
  }

  function initFilters() {
    document
      .querySelectorAll('input[type="checkbox"][data-filter]')
      .forEach(function (cb) {
        cb.addEventListener("change", function () {
          var filterType = this.getAttribute("data-filter");
          var value = this.value;
          if (this.checked) {
            if (filterState[filterType].indexOf(value) === -1)
              filterState[filterType].push(value);
          } else {
            var idx = filterState[filterType].indexOf(value);
            if (idx > -1) filterState[filterType].splice(idx, 1);
          }
          renderProducts();
        });
      });
    var minSlider = document.getElementById("minPriceSlider");
    var maxSlider = document.getElementById("maxPriceSlider");
    var minDisplay = document.getElementById("minPriceDisplay");
    var maxDisplay = document.getElementById("maxPriceDisplay");
    var priceTrack = document.getElementById("priceTrack");
    function updatePriceSlider() {
      var min = parseInt(minSlider.value);
      var max = parseInt(maxSlider.value);
      if (min > max - 10) {
        minSlider.value = max - 10;
        min = max - 10;
      }
      filterState.minPrice = min;
      filterState.maxPrice = max;
      minDisplay.textContent = "$" + min;
      maxDisplay.textContent = "$" + max;
      var pMin = (min / 500) * 100;
      var pMax = (max / 500) * 100;
      priceTrack.style.left = pMin + "%";
      priceTrack.style.width = pMax - pMin + "%";
      renderProducts();
    }
    minSlider.addEventListener("input", updatePriceSlider);
    maxSlider.addEventListener("input", updatePriceSlider);
    var sortDropdown = document.getElementById("sortDropdown");
    if (sortDropdown) {
      sortDropdown.addEventListener("change", function () {
        filterState.sortOrder = this.value;
        renderProducts();
      });
    }
    document
      .querySelectorAll('input[name="sortOrder"]')
      .forEach(function (radio) {
        radio.addEventListener("change", function () {
          filterState.sortOrder = this.value;
          if (sortDropdown) sortDropdown.value = this.value;
          renderProducts();
        });
      });
    document
      .getElementById("clearAllBtn")
      .addEventListener("click", function () {
        filterState = {
          category: [],
          size: [],
          fit: [],
          minPrice: 0,
          maxPrice: 500,
          sortOrder: "",
        };
        document
          .querySelectorAll('input[type="checkbox"]')
          .forEach(function (cb) {
            cb.checked = false;
          });
        document
          .querySelectorAll('input[name="sortOrder"]')
          .forEach(function (r) {
            r.checked = r.value === "";
          });
        minSlider.value = 0;
        maxSlider.value = 500;
        if (sortDropdown) sortDropdown.value = "";
        updatePriceSlider();
        closeAllFilterPopups();
      });
    var filterPopup = document.getElementById("filterPopup");
    var filterOverlay = document.getElementById("filterPopupOverlay");
    var filterClose = document.getElementById("filterPopupClose");
    document
      .getElementById("filterTriggerBtn")
      .addEventListener("click", function () {
        document.getElementById("orderPopup").classList.remove("active");
        document.getElementById("orderPopupOverlay").classList.remove("active");
        closeMiniPopups();
        filterPopup.classList.toggle("active");
        filterOverlay.classList.toggle("active");
      });
    filterClose.addEventListener("click", function () {
      filterPopup.classList.remove("active");
      filterOverlay.classList.remove("active");
      closeMiniPopups();
    });
    filterOverlay.addEventListener("click", function () {
      filterPopup.classList.remove("active");
      filterOverlay.classList.remove("active");
      closeMiniPopups();
    });
    var orderPopup = document.getElementById("orderPopup");
    var orderOverlay = document.getElementById("orderPopupOverlay");
    var orderClose = document.getElementById("orderPopupClose");
    document
      .getElementById("orderTriggerBtn")
      .addEventListener("click", function () {
        filterPopup.classList.remove("active");
        filterOverlay.classList.remove("active");
        closeMiniPopups();
        orderPopup.classList.toggle("active");
        orderOverlay.classList.toggle("active");
      });
    orderClose.addEventListener("click", function () {
      orderPopup.classList.remove("active");
      orderOverlay.classList.remove("active");
    });
    orderOverlay.addEventListener("click", function () {
      orderPopup.classList.remove("active");
      orderOverlay.classList.remove("active");
    });
    var miniPopupMap = {
      category: document.getElementById("miniPopupCategory"),
      size: document.getElementById("miniPopupSize"),
      fit: document.getElementById("miniPopupFit"),
      price: document.getElementById("miniPopupPrice"),
    };
    var miniOverlay = document.getElementById("miniPopupOverlay");
    document.querySelectorAll(".filter-category-item").forEach(function (item) {
      item.addEventListener("click", function () {
        var cat = this.getAttribute("data-filter-cat");
        var target = miniPopupMap[cat];
        if (!target) return;
        Object.keys(miniPopupMap).forEach(function (key) {
          if (key !== cat) miniPopupMap[key].classList.remove("active");
        });
        target.classList.toggle("active");
        if (window.innerWidth <= 900) miniOverlay.classList.add("active");
      });
    });
    document.querySelectorAll(".mini-popup-back").forEach(function (btn) {
      btn.addEventListener("click", function () {
        var cat = this.getAttribute("data-back");
        if (miniPopupMap[cat]) miniPopupMap[cat].classList.remove("active");
        if (window.innerWidth <= 900) miniOverlay.classList.remove("active");
      });
    });
    document.querySelectorAll(".mini-popup-close").forEach(function (btn) {
      btn.addEventListener("click", function () {
        closeAllFilterPopups();
      });
    });
    miniOverlay.addEventListener("click", function () {
      closeMiniPopups();
    });
    document
      .getElementById("activeFiltersBar")
      .addEventListener("click", function (e) {
        var btn = e.target.closest("button[data-remove]");
        if (!btn) return;
        var parts = btn.getAttribute("data-remove").split(":");
        if (parts[0] === "price") {
          filterState.minPrice = 0;
          filterState.maxPrice = 500;
          minSlider.value = 0;
          maxSlider.value = 500;
          updatePriceSlider();
        } else {
          var filterType = parts[0];
          var value = parts[1];
          var idx = filterState[filterType].indexOf(value);
          if (idx > -1) filterState[filterType].splice(idx, 1);
          var checkbox = document.querySelector(
            'input[data-filter="' + filterType + '"][value="' + value + '"]',
          );
          if (checkbox) checkbox.checked = false;
          renderProducts();
        }
      });
  }

  function init() {
    updateCounts();
    renderProducts();
    initFilters();
    // The cart popup and interactions are now handled by cart-handler.js delegation
  }
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }

  function syncWishlistActiveState() {
    try {
      if (typeof wishlist === "undefined") return;
      document
        .querySelectorAll(".wishlist-btn[data-product-id]")
        .forEach(function (btn) {
          var pid = btn.getAttribute("data-product-id");
          if (pid && wishlist.has(pid)) {
            btn.classList.add("active");
          } else {
            btn.classList.remove("active");
          }
        });
      if (typeof updateWishlistCount === "function") {
        updateWishlistCount();
      }
    } catch (e) {
      /* no-op */
    }
  }
})();
