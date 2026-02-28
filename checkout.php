<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - E-Commerce Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
/* ========================================
   PREMIUM CHECKOUT - REDESIGNED
   Old Money / Luxury / Minimal Aesthetic
   ======================================== */

:root {
    --primary: #1E1A14;
    --secondary: #7e5232;
    --accent: #a8845e;
    --bg-light: #faf9f7;
    --bg-soft: #f0ede8;
    --text-dark: #1E1A14;
    --text-light: #c6baa5;
    --white: #ffffff;
    --border: #e8e4de;
    --shadow-soft: rgba(0, 0, 0, 0.04);
    --shadow-medium: rgba(0, 0, 0, 0.08);
    --font-heading: 'Allenoire', 'Playfair Display', serif;
    --font-primary: 'Montserrat', sans-serif;
}

/* ========================================
   GLOBAL STYLES
   ======================================== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: var(--font-primary);
    background: var(--bg-light);
    min-height: 100vh;
    color: var(--text-dark);
    line-height: 1.6;
}

@font-face {
    font-family: 'Allenoire';
    src: url('https://fonts.cdnfonts.com/s/91211/Allenoire.woff') format('woff');
    font-weight: normal;
    font-style: normal;
}

/* ========================================
   TOAST NOTIFICATION
   ======================================== */
.toast {
    position: fixed;
    top: 24px;
    right: 24px;
    background: var(--primary);
    color: var(--text-light);
    padding: 16px 24px;
    border-radius: 4px;
    box-shadow: 0 8px 32px var(--shadow-dark);
    transform: translateX(120%);
    opacity: 0;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 10000;
    font-size: 14px;
    letter-spacing: 0.3px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.toast.show {
    transform: translateX(0);
    opacity: 1;
}

.toast.error {
    background: #8b4513;
}

.toast.success {
    background: var(--secondary);
}

.toast svg {
    flex-shrink: 0;
}

/* ========================================
   HEADER
   ======================================== */
.checkout-header {
    background: var(--primary);
    padding: 30px 0;
    border-bottom: 1px solid var(--border);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.header-inner {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.back-link {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--text-light);
    text-decoration: none;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    transition: all 0.4s var(--transition-smooth);
    padding: 10px 0;
}

.back-link:hover {
    color: var(--white);
    transform: translateX(-5px);
}

.back-link svg {
    transition: transform 0.3s ease;
}

.back-link:hover svg {
    transform: translateX(-4px);
}

.logo {
    font-family: var(--font-heading);
    font-size: 28px;
    font-weight: 400;
    color: var(--text-light);
    letter-spacing: 4px;
    text-transform: uppercase;
}

.secure-badge {
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--bg-soft);
    font-size: 12px;
    letter-spacing: 0.5px;
}

/* ========================================
   PROGRESS BAR
   ======================================== */
.progress-container {
    background: var(--white);
    border-bottom: 1px solid rgba(47, 39, 22, 0.1);
    padding: 24px 0;
}

.progress-inner {
    max-width: 600px;
    margin: 0 auto;
    padding: 0 24px;
}

.progress-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
}

.progress-bar::before {
    content: '';
    position: absolute;
    top: 16px;
    left: 40px;
    right: 40px;
    height: 2px;
    background: var(--bg-light);
}

.progress-line {
    position: absolute;
    top: 16px;
    left: 40px;
    height: 2px;
    background: var(--accent);
    transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    width: 0%;
}

.progress-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    position: relative;
    z-index: 2;
}

.step-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--white);
    border: 2px solid var(--bg-light);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.step-number {
    font-family: 'Playfair Display', serif;
    font-size: 14px;
    font-weight: 500;
    color: var(--bg-soft);
    transition: all 0.3s ease;
}

.step-check {
    display: none;
    color: var(--white);
}

.progress-step.active .step-circle {
    border-color: var(--accent);
    background: var(--accent);
}

.progress-step.active .step-number {
    color: var(--white);
}

.progress-step.completed .step-circle {
    border-color: var(--secondary);
    background: var(--secondary);
}

.progress-step.completed .step-number {
    display: none;
}

.progress-step.completed .step-check {
    display: block;
}

.step-label {
    font-size: 11px;
    font-weight: 500;
    color: var(--bg-soft);
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: color 0.3s ease;
}

.progress-step.active .step-label,
.progress-step.completed .step-label {
    color: var(--primary);
}

/* ========================================
   MAIN LAYOUT
   ======================================== */
.checkout-main {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 24px;
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 48px;
    align-items: start;
}

/* ========================================
   LEFT COLUMN - FORMS
   ======================================== */
.checkout-forms {
    background: var(--white);
    border-radius: 12px;
    box-shadow: 0 15px 50px var(--shadow-soft);
    border: 1px solid var(--border);
    overflow: hidden;
}

.checkout-step {
    display: none;
    padding: 40px;
    animation: fadeIn 0.4s ease;
}

.checkout-step.active {
    display: block;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.step-header {
    margin-bottom: 32px;
}

.step-title {
    font-family: var(--font-heading);
    font-size: 32px;
    font-weight: 400;
    color: var(--text-dark);
    margin-bottom: 12px;
    letter-spacing: 1px;
}

.step-subtitle {
    font-family: var(--font-primary);
    font-size: 14px;
    color: var(--secondary);
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* ========================================
   CART ITEMS
   ======================================== */
.cart-items-container {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.cart-item-checkout {
    display: flex;
    gap: 20px;
    padding: 20px;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 12px;
    transition: all 0.4s var(--transition-smooth);
}

.cart-item-checkout:hover {
    border-color: var(--accent);
    box-shadow: 0 10px 30px var(--shadow-soft);
}

.item-image {
    width: 100px;
    height: 120px;
    object-fit: cover;
    border-radius: 8px;
}

.item-details {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.item-name {
    font-family: 'Playfair Display', serif;
    font-size: 16px;
    font-weight: 500;
    color: var(--text-dark);
}

.item-variant {
    display: flex;
    gap: 12px;
    font-size: 13px;
    color: var(--secondary);
}

.variant-item {
    display: flex;
    align-items: center;
    gap: 4px;
}

.color-swatch {
    width: 14px;
    height: 14px;
    border-radius: 50%;
    border: 1px solid var(--bg-soft);
}

.item-price-qty {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
}

.item-qty {
    font-size: 13px;
    color: var(--secondary);
}

.item-price {
    font-family: 'Playfair Display', serif;
    font-size: 16px;
    font-weight: 500;
    color: var(--primary);
}

.cart-empty {
    text-align: center;
    padding: 48px 24px;
    color: var(--secondary);
}

.cart-empty svg {
    margin-bottom: 16px;
    opacity: 0.5;
}

.cart-empty p {
    font-size: 16px;
    margin-bottom: 24px;
}

/* ========================================
   FORMS
   ======================================== */
.checkout-form {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    position: relative;
}

.form-group label {
    display: block;
    font-size: 12px;
    font-weight: 500;
    color: var(--secondary);
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-bottom: 8px;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 14px 16px;
    border: 1px solid var(--bg-light);
    background: var(--white);
    font-size: 15px;
    font-family: 'Cormorant', serif;
    color: var(--text-dark);
    border-radius: 4px;
    transition: all 0.3s ease;
}

.form-group input:focus,
.form-group select:focus {
    outline: none;
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(168, 132, 94, 0.15);
}

.form-group input::placeholder {
    color: var(--bg-soft);
}

.form-group.error input,
.form-group.error select {
    border-color: #c44;
}

.form-group .error-message {
    font-size: 12px;
    color: #c44;
    margin-top: 4px;
    display: none;
}

.form-group.error .error-message {
    display: block;
}

/* ========================================
   PAYMENT METHODS
   ======================================== */
.payment-methods {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 24px;
}

.payment-method {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 20px;
    border: 2px solid var(--bg-light);
    background: var(--white);
    cursor: pointer;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.payment-method:hover {
    border-color: var(--accent);
}

.payment-method.active {
    border-color: var(--accent);
    background: rgba(168, 132, 94, 0.05);
}

.method-radio {
    width: 20px;
    height: 20px;
    border: 2px solid var(--bg-soft);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.payment-method.active .method-radio {
    border-color: var(--accent);
}

.radio-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: var(--accent);
    transform: scale(0);
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.payment-method.active .radio-dot {
    transform: scale(1);
}

.method-info {
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--text-dark);
    font-size: 15px;
    font-weight: 500;
}

.method-info svg {
    color: var(--secondary);
}

.payment-form {
    display: none;
    animation: fadeIn 0.3s ease;
}

.payment-form.active {
    display: block;
}

.cod-info {
    display: none;
    animation: fadeIn 0.3s ease;
}

.cod-info.active {
    display: block;
}

.info-box {
    display: flex;
    gap: 16px;
    padding: 20px;
    background: var(--bg-light);
    border-radius: 6px;
    border-left: 3px solid var(--accent);
}

.info-box svg {
    flex-shrink: 0;
    color: var(--accent);
}

.info-box h4 {
    font-family: 'Playfair Display', serif;
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 4px;
    color: var(--text-dark);
}

.info-box p {
    font-size: 14px;
    color: var(--secondary);
    line-height: 1.5;
}

/* ========================================
   STEP ACTIONS
   ======================================== */
.step-actions {
    display: flex;
    gap: 16px;
    margin-top: 32px;
    padding-top: 24px;
    border-top: 1px solid var(--bg-light);
}

.btn {
    padding: 14px 28px;
    border: none;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    font-family: var(--font-primary);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    letter-spacing: 2px;
    text-transform: uppercase;
    border-radius: 8px;
}

.btn-primary {
    background: var(--primary);
    color: var(--white);
    flex: 1;
}

.btn-primary:hover {
    background: var(--secondary);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px var(--shadow-medium);
}

.btn-primary:disabled {
    background: var(--bg-soft);
    color: var(--text-light);
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

.btn-secondary {
    background: var(--bg-soft);
    color: var(--text-dark);
    border: 1px solid var(--border);
}

.btn-secondary:hover {
    background: var(--white);
    border-color: var(--accent);
    color: var(--accent);
}

.btn-loading {
    pointer-events: none;
}

.btn-loading .btn-text {
    opacity: 0;
}

.btn-loading .spinner {
    position: absolute;
}

.spinner {
    width: 20px;
    height: 20px;
    border: 2px solid transparent;
    border-top-color: currentColor;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
    display: none;
}

.btn-loading .spinner {
    display: block;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* ========================================
   RIGHT COLUMN - ORDER SUMMARY
   ======================================== */
.order-summary-sidebar {
    position: sticky;
    top: 100px;
}

.summary-card {
    background: var(--white);
    border-radius: 12px;
    box-shadow: 0 10px 40px var(--shadow-soft);
    border: 1px solid var(--border);
    overflow: hidden;
}

.summary-header {
    background: var(--primary);
    padding: 24px;
    color: var(--white);
}

.summary-header h3 {
    font-family: var(--font-heading);
    font-size: 20px;
    font-weight: 400;
    letter-spacing: 1px;
}

.summary-body {
    padding: 24px;
}

.summary-items {
    max-height: 240px;
    overflow-y: auto;
    margin-bottom: 20px;
    padding-right: 8px;
}

.summary-items::-webkit-scrollbar {
    width: 4px;
}

.summary-items::-webkit-scrollbar-track {
    background: var(--bg-light);
    border-radius: 2px;
}

.summary-items::-webkit-scrollbar-thumb {
    background: var(--bg-soft);
    border-radius: 2px;
}

.summary-item {
    display: flex;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid var(--bg-light);
}

.summary-item:last-child {
    border-bottom: none;
}

.summary-item-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 4px;
    background: var(--bg-light);
}

.summary-item-details {
    flex: 1;
}

.summary-item-name {
    font-size: 14px;
    font-weight: 500;
    color: var(--text-dark);
    margin-bottom: 2px;
}

.summary-item-variant {
    font-size: 12px;
    color: var(--secondary);
}

.summary-item-price {
    font-family: 'Playfair Display', serif;
    font-size: 14px;
    font-weight: 500;
    color: var(--primary);
}

.summary-totals {
    border-top: 1px solid var(--bg-light);
    padding-top: 16px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0;
    font-size: 14px;
}

.summary-row span:first-child {
    color: var(--secondary);
}

.summary-row span:last-child {
    font-family: 'Playfair Display', serif;
    color: var(--text-dark);
}

.summary-row.total {
    border-top: 2px solid var(--primary);
    margin-top: 12px;
    padding-top: 16px;
}

.summary-row.total span:first-child {
    font-size: 15px;
    font-weight: 500;
    color: var(--text-dark);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.summary-row.total span:last-child {
    font-size: 28px;
    font-weight: 600;
    color: var(--primary);
    font-family: var(--font-heading);
}

.promo-code {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid var(--bg-light);
}

.promo-toggle {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: var(--accent);
    cursor: pointer;
    transition: color 0.3s ease;
}

.promo-toggle:hover {
    color: var(--secondary);
}

.promo-form {
    display: none;
    margin-top: 12px;
}

.promo-form.active {
    display: flex;
    gap: 8px;
}

.promo-form input {
    flex: 1;
    padding: 10px 12px;
    border: 1px solid var(--bg-light);
    border-radius: 4px;
    font-size: 14px;
    font-family: 'Cormorant', serif;
}

.promo-form input:focus {
    outline: none;
    border-color: var(--accent);
}

.promo-form button {
    padding: 10px 16px;
    background: var(--accent);
    color: var(--white);
    border: none;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.promo-form button:hover {
    background: var(--secondary);
}

/* Security badges */
.security-badges {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    margin-top: 24px;
    padding: 16px;
    background: var(--bg-light);
    border-radius: 6px;
}

.security-badge {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 11px;
    color: var(--secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.security-badge svg {
    color: var(--accent);
}

/* ========================================
   CONFIRMATION STEP
   ======================================== */
.confirmation-content {
    text-align: center;
    padding: 40px 20px;
}

.success-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 24px;
    background: var(--accent);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    animation: scaleIn 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

@keyframes scaleIn {
    from {
        transform: scale(0);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

.confirmation-title {
    font-family: var(--font-heading);
    font-size: 42px;
    font-weight: 400;
    color: var(--text-dark);
    margin-bottom: 16px;
    letter-spacing: 2px;
}

.confirmation-message {
    font-family: var(--font-primary);
    font-size: 16px;
    color: var(--secondary);
    margin-bottom: 40px;
    line-height: 1.8;
}

.order-details {
    background: var(--bg-light);
    border-radius: 6px;
    padding: 24px;
    text-align: left;
    margin-bottom: 32px;
}

.order-details h4 {
    font-family: 'Playfair Display', serif;
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 16px;
    color: var(--text-dark);
}

.order-details-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.order-detail-item {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.order-detail-item strong {
    font-size: 11px;
    color: var(--secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 500;
}

.order-detail-item span {
    font-size: 15px;
    color: var(--text-dark);
}

.order-detail-item.full-width {
    grid-column: 1 / -1;
}

.confirmation-actions {
    display: flex;
    gap: 16px;
    justify-content: center;
}

/* ========================================
   RESPONSIVE DESIGN
   ======================================== */
@media (max-width: 968px) {
    .checkout-main {
        grid-template-columns: 1fr;
        gap: 32px;
    }

    .order-summary-sidebar {
        position: static;
        order: -1;
    }

    .summary-items {
        max-height: none;
    }
}

@media (max-width: 768px) {
    .header-inner {
        flex-wrap: wrap;
        gap: 12px;
    }

    .logo {
        order: -1;
        width: 100%;
        text-align: center;
    }

    .secure-badge {
        display: none;
    }

    .progress-bar::before,
    .progress-line {
        left: 20px;
        right: 20px;
    }

    .step-label {
        font-size: 10px;
    }

    .checkout-step {
        padding: 24px;
    }

    .step-title {
        font-size: 24px;
    }

    .form-row {
        grid-template-columns: 1fr;
    }

    .step-actions {
        flex-direction: column-reverse;
    }

    .btn {
        width: 100%;
    }

    .confirmation-actions {
        flex-direction: column;
    }

    .order-details-grid {
        grid-template-columns: 1fr;
    }

    .security-badges {
        flex-direction: column;
        gap: 8px;
    }
}

@media (max-width: 480px) {
    .checkout-header {
        padding: 16px 0;
    }

    .logo {
        font-size: 20px;
    }

    .progress-container {
        padding: 16px 0;
    }

    .step-circle {
        width: 28px;
        height: 28px;
    }

    .step-number {
        font-size: 12px;
    }

    .step-label {
        display: none;
    }

    .checkout-main {
        padding: 20px 16px;
    }

    .checkout-step {
        padding: 20px;
    }

    .cart-item-checkout {
        flex-direction: column;
    }

    .item-image {
        width: 100%;
        height: 160px;
    }
}

/* ========================================
   PRINT STYLES
   ======================================== */

    </style>
</head>
<body>
    <script>
        // Immediate auth check
        (function() {
            const isLoggedIn = localStorage.getItem('isLoggedIn');
            if (isLoggedIn !== 'true') {
                window.location.href = 'login.php?redirect=' + encodeURIComponent(window.location.href);
            }
        })();
    </script>
    
    <!-- Toast Notification -->
    <div id="toast" class="toast">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
        <span id="toastMessage"></span>
    </div>

    <!-- Header -->
    <header class="checkout-header">
        <div class="header-inner">
            <a href="index.php" class="back-link" id="checkoutBackLink">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                Back to Shop
            </a>
            <span class="logo">CHECKOUT</span>
            <div class="secure-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                Secure Checkout
            </div>
        </div>
    </header>

    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-inner">
            <div class="progress-bar">
                <div class="progress-line" id="progressLine"></div>
                <div class="progress-step active" data-step="1">
                    <div class="step-circle">
                        <span class="step-number">1</span>
                        <svg class="step-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <span class="step-label">Cart</span>
                </div>
                <div class="progress-step" data-step="2">
                    <div class="step-circle">
                        <span class="step-number">2</span>
                        <svg class="step-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <span class="step-label">Shipping</span>
                </div>
                <div class="progress-step" data-step="3">
                    <div class="step-circle">
                        <span class="step-number">3</span>
                        <svg class="step-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <span class="step-label">Payment</span>
                </div>
                <div class="progress-step" data-step="4">
                    <div class="step-circle">
                        <span class="step-number">4</span>
                        <svg class="step-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <span class="step-label">Done</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="checkout-main">
        <!-- Left Column - Forms -->
        <div class="checkout-forms">
            <!-- Step 1: Cart Review -->
            <div class="checkout-step active" id="step1">
                <div class="step-header">
                    <h2 class="step-title">Review Your Cart</h2>
                    <p class="step-subtitle">Confirm your items before proceeding</p>
                </div>
                <div class="cart-items-container" id="cartItemsContainer">
                    <!-- Cart items will be dynamically inserted here -->
                </div>
                <div class="step-actions">
                    <button class="btn btn-primary" onclick="goToStep(2)">
                        <span class="btn-text">Continue to Shipping</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Step 2: Shipping Information -->
            <div class="checkout-step" id="step2">
                <div class="step-header">
                    <h2 class="step-title">Shipping Information</h2>
                    <p class="step-subtitle">Where should we deliver your order?</p>
                </div>
                <form id="shippingForm" class="checkout-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fullName">Full Name *</label>
                            <input type="text" id="fullName" name="fullName" required placeholder="John Doe">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required placeholder="john@example.com">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required placeholder="+1 (555) 123-4567">
                        </div>
                        <div class="form-group">
                            <label for="country">Country *</label>
                            <select id="country" name="country" required>
                                <option value="">Select Country</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="GB">United Kingdom</option>
                                <option value="AU">Australia</option>
                                <option value="DE">Germany</option>
                                <option value="FR">France</option>
                                <option value="IT">Italy</option>
                                <option value="ES">Spain</option>
                                <option value="JP">Japan</option>
                                <option value="CN">China</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Street Address *</label>
                        <input type="text" id="address" name="address" required placeholder="123 Main Street, Apt 4B">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="city">City *</label>
                            <input type="text" id="city" name="city" required placeholder="New York">
                        </div>
                        <div class="form-group">
                            <label for="zipCode">ZIP / Postal Code *</label>
                            <input type="text" id="zipCode" name="zipCode" required placeholder="10001">
                        </div>
                    </div>
                </form>
                <div class="step-actions">
                    <button class="btn btn-secondary" onclick="goToStep(1)">Back</button>
                    <button class="btn btn-primary" onclick="validateAndContinue(2, 3)">
                        <span class="btn-text">Continue to Payment</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Step 3: Payment -->
            <div class="checkout-step" id="step3">
                <div class="step-header">
                    <h2 class="step-title">Payment Method</h2>
                    <p class="step-subtitle">Choose how you'd like to pay</p>
                </div>
                
                <!-- Payment Method Selection -->
                <div class="payment-methods">
                    <div class="payment-method active" data-method="card" onclick="selectPaymentMethod('card')">
                        <div class="method-radio">
                            <div class="radio-dot"></div>
                        </div>
                        <div class="method-info">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            <span>Credit / Debit Card</span>
                        </div>
                    </div>
                    <div class="payment-method" data-method="cod" onclick="selectPaymentMethod('cod')">
                        <div class="method-radio">
                            <div class="radio-dot"></div>
                        </div>
                        <div class="method-info">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                            <span>Cash on Delivery</span>
                        </div>
                    </div>
                </div>

                <!-- Card Payment Form -->
                <form id="cardForm" class="checkout-form payment-form active">
                    <div class="form-group">
                        <label for="cardNumber">Card Number *</label>
                        <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cardExpiry">Expiry Date *</label>
                            <input type="text" id="cardExpiry" name="cardExpiry" placeholder="MM/YY" maxlength="5">
                        </div>
                        <div class="form-group">
                            <label for="cardCVV">CVV *</label>
                            <input type="text" id="cardCVV" name="cardCVV" placeholder="123" maxlength="4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cardName">Cardholder Name *</label>
                        <input type="text" id="cardName" name="cardName" placeholder="John Doe">
                    </div>
                </form>

                <!-- Cash on Delivery Info -->
                <div id="codInfo" class="cod-info">
                    <div class="info-box">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                        <div>
                            <h4>Cash on Delivery</h4>
                            <p>Pay with cash when your order is delivered to your doorstep. Please have the exact amount ready.</p>
                        </div>
                    </div>
                </div>

                <!-- PayPal Info -->
                <div id="paypalInfo" class="cod-info">
                    <div class="info-box" style="border-left-color: #0070ba;">
                        <div style="font-size: 22px; flex-shrink: 0;">🅿️</div>
                        <div>
                            <h4>PayPal Checkout</h4>
                            <p>You will be redirected to PayPal to complete your purchase securely. Fast and easy checkout.</p>
                        </div>
                    </div>
                </div>

                <div class="step-actions">
                    <button class="btn btn-secondary" onclick="goToStep(2)">Back</button>
                    <button class="btn btn-primary" onclick="placeOrder()" id="placeOrderBtn">
                        <span class="btn-text">Place Order</span>
                        <span class="spinner"></span>
                    </button>
                </div>
            </div>

            <!-- Step 4: Confirmation -->
            <div class="checkout-step" id="step4">
                <div class="confirmation-content">
                    <div class="success-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <h2 class="confirmation-title">Thank You!</h2>
                    <p class="confirmation-message">Your order has been successfully placed. We'll send you a confirmation email with tracking details shortly.</p>
                    
                    <div class="order-details">
                        <h4>Order Details</h4>
                        <div class="order-details-grid" id="orderSummaryDetails">
                            <!-- Order details will be inserted here -->
                        </div>
                    </div>

                    <div class="confirmation-actions">
                        <a href="index.php" class="btn btn-primary">Explore Collections</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Order Summary -->
        <aside class="order-summary-sidebar">
            <div class="summary-card">
                <div class="summary-header">
                    <h3>Order Summary</h3>
                </div>
                <div class="summary-body">
                    <div class="summary-items" id="summaryItems">
                        <!-- Summary items will be inserted here -->
                    </div>
                    <div class="summary-totals">
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span id="subtotal">$0.00</span>
                        </div>
                        <div class="summary-row">
                            <span>Shipping</span>
                            <span id="shipping">$10.00</span>
                        </div>
                        <div class="summary-row total">
                            <span>Total</span>
                            <span id="total">$0.00</span>
                        </div>
                    </div>
                    <div class="promo-code">
                        <div class="promo-toggle" onclick="togglePromoForm()">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Add promo code
                        </div>
                        <div class="promo-form" id="promoForm">
                            <input type="text" placeholder="Enter code">
                            <button type="button">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="security-badges">
                <div class="security-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    Secure Payment
                </div>
                <div class="security-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    SSL Encrypted
                </div>
            </div>
        </aside>
    </main>

<script>
// ========================================
// CHECKOUT PAGE JAVASCRIPT
// Handles step navigation, cart reading from localStorage,
// form validation, and order processing
// ========================================

// Global variables
let currentStep = 1;
let cart = [];
let orderData = {};

// Default settings (will be overridden by dashboard data)
let STORE_SETTINGS = {
    name: 'Atelier Clothing Co.',
    email: 'hello@atelier.com',
    currency: 'USD ($)',
    timezone: 'Europe/Paris',
    address: '123 Fashion Ave, Paris, France',
    phone: '+33 1 23 45 67 89',
    taxid: 'FR 88 123456789',
    shiprate: '10.00',
    shipfree: '150.00',
    shipintl: true,
    paycod: true,
    paystripe: false,
    paypaypal: false,
    brandcolor: '#b39c80',
    accentcolor: '#2f2716',
    motto: 'Timeless Elegance, Modern Craftsmanship'
};

let shippingCost = 10.00;

// ========================================
// INITIALIZATION
// ========================================
document.addEventListener('DOMContentLoaded', () => {
    loadSettings();
    loadCartFromLocalStorage();
    renderCartItems();
    renderSummaryItems();
    renderPaymentMethods();
    updateProgressBar();
    initializeCardFormatting();
});

// ========================================
// LOAD SETTINGS FROM LOCALSTORAGE
// ========================================
function loadSettings() {
    const savedSettings = localStorage.getItem('dashboard_settings');
    if (savedSettings) {
        try {
            const parsed = JSON.parse(savedSettings);
            STORE_SETTINGS = { ...STORE_SETTINGS, ...parsed };
            
            // Update store name in header if applicable
            const logoEl = document.querySelector('.header-inner .logo');
            if (logoEl) {
                logoEl.textContent = STORE_SETTINGS.name.toUpperCase();
            }

            // Update shipping cost default
             shippingCost = parseFloat(STORE_SETTINGS.shiprate) || 0;

             // Apply Brand Colors
             if (STORE_SETTINGS.brandcolor) {
                 document.documentElement.style.setProperty('--primary', STORE_SETTINGS.brandcolor);
             }
             if (STORE_SETTINGS.accentcolor) {
                 document.documentElement.style.setProperty('--accent', STORE_SETTINGS.accentcolor);
             }

         } catch (error) {
            console.error('Error parsing settings:', error);
        }
    }
}

// ========================================
// RENDER PAYMENT METHODS
// ========================================
function renderPaymentMethods() {
    const container = document.querySelector('.payment-methods');
    if (!container) return;

    let html = '';
    let firstMethod = '';

    // Card (Stripe)
    if (STORE_SETTINGS.paystripe) {
        if (!firstMethod) firstMethod = 'card';
        html += `
            <div class="payment-method ${firstMethod === 'card' ? 'active' : ''}" data-method="card" onclick="selectPaymentMethod('card')">
                <div class="method-radio">
                    <div class="radio-dot"></div>
                </div>
                <div class="method-info">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>
                    <span>Credit / Debit Card</span>
                </div>
            </div>
        `;
    }

    // Cash on Delivery
    if (STORE_SETTINGS.paycod) {
        if (!firstMethod) firstMethod = 'cod';
        html += `
            <div class="payment-method ${firstMethod === 'cod' ? 'active' : ''}" data-method="cod" onclick="selectPaymentMethod('cod')">
                <div class="method-radio">
                    <div class="radio-dot"></div>
                </div>
                <div class="method-info">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                    <span>Cash on Delivery</span>
                </div>
            </div>
        `;
    }

    // PayPal
    if (STORE_SETTINGS.paypaypal) {
        if (!firstMethod) firstMethod = 'paypal';
        html += `
            <div class="payment-method ${firstMethod === 'paypal' ? 'active' : ''}" data-method="paypal" onclick="selectPaymentMethod('paypal')">
                <div class="method-radio">
                    <div class="radio-dot"></div>
                </div>
                <div class="method-info">
                    <div style="font-size: 20px;">🅿️</div>
                    <span>PayPal</span>
                </div>
            </div>
        `;
    }

    if (!html) {
        container.innerHTML = '<p style="color: #c44; font-size: 14px; text-align: center; padding: 20px;">No payment methods available. Please contact support.</p>';
        const placeOrderBtn = document.getElementById('placeOrderBtn');
        if (placeOrderBtn) placeOrderBtn.disabled = true;
    } else {
        container.innerHTML = html;
        selectPaymentMethod(firstMethod);
    }
}

// ========================================
// LOAD CART FROM LOCALSTORAGE
// ========================================
function loadCartFromLocalStorage() {
    const savedCart = localStorage.getItem('cart');
    if (savedCart) {
        try {
            cart = JSON.parse(savedCart);
            // Ensure each item has a valid quantity (default to 1 if missing or invalid)
            cart = cart.map(item => ({
                ...item,
                quantity: parseInt(item.quantity) || 1,
                price: parseFloat(item.price) || 0
            }));

        } catch (error) {
            console.error('[v0] Error parsing cart from localStorage:', error);
            cart = [];
        }
    } else {
        cart = [];
    }
}

// ========================================
// COLOR NAME CONVERTER
// ========================================
function rgbToColorName(color) {
    if (!color) return 'N/A';
    
    // Common color name mapping
    const colorNames = {
        'rgb(0, 0, 0)': 'Black',
        'rgb(255, 255, 255)': 'White',
        'rgb(255, 0, 0)': 'Red',
        'rgb(0, 255, 0)': 'Green',
        'rgb(0, 0, 255)': 'Blue',
        'rgb(255, 255, 0)': 'Yellow',
        'rgb(255, 165, 0)': 'Orange',
        'rgb(128, 0, 128)': 'Purple',
        'rgb(255, 192, 203)': 'Pink',
        'rgb(165, 42, 42)': 'Brown',
        'rgb(128, 128, 128)': 'Gray',
        'rgb(192, 192, 192)': 'Silver',
        'rgb(0, 255, 255)': 'Cyan',
        'rgb(255, 0, 255)': 'Magenta',
        'rgb(0, 128, 0)': 'Dark Green',
        'rgb(0, 0, 128)': 'Navy',
        'rgb(128, 0, 0)': 'Maroon',
        'rgb(128, 128, 0)': 'Olive',
        'rgb(245, 245, 220)': 'Beige',
        'rgb(255, 215, 0)': 'Gold',
        'rgb(75, 0, 130)': 'Indigo',
        'rgb(64, 224, 208)': 'Turquoise',
        'rgb(255, 127, 80)': 'Coral',
        'rgb(250, 128, 114)': 'Salmon',
        'rgb(240, 230, 140)': 'Khaki',
        'rgb(230, 230, 250)': 'Lavender',
        'rgb(245, 222, 179)': 'Wheat',
        'rgb(210, 180, 140)': 'Tan',
        'rgb(244, 164, 96)': 'Sandy Brown'
    };
    
    // Normalize the color string
    const normalizedColor = color.toLowerCase().replace(/\s/g, '').replace(/,/g, ', ');
    
    // Check if it's already a named color
    const namedColors = ['black', 'white', 'red', 'green', 'blue', 'yellow', 'orange', 'purple', 'pink', 'brown', 'gray', 'grey', 'silver', 'cyan', 'magenta', 'navy', 'maroon', 'olive', 'beige', 'gold', 'indigo', 'turquoise', 'coral', 'salmon', 'khaki', 'lavender', 'wheat', 'tan'];
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
            '#c0c0c0': 'Silver',
            '#00ffff': 'Cyan', '#0ff': 'Cyan',
            '#ff00ff': 'Magenta', '#f0f': 'Magenta',
            '#008000': 'Dark Green',
            '#000080': 'Navy',
            '#800000': 'Maroon',
            '#808000': 'Olive',
            '#f5f5dc': 'Beige',
            '#ffd700': 'Gold'
        };
        const hexLower = color.toLowerCase();
        if (hexColors[hexLower]) return hexColors[hexLower];
    }
    
    // Check for RGB format and try to match
    if (color.toLowerCase().startsWith('rgb')) {
        // Normalize rgb string
        const rgbNorm = color.toLowerCase().replace(/\s+/g, ' ').replace(/,\s*/g, ', ');
        if (colorNames[rgbNorm]) return colorNames[rgbNorm];
        
        // Try to extract and approximate
        const match = color.match(/rgb\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)/i);
        if (match) {
            const r = parseInt(match[1]);
            const g = parseInt(match[2]);
            const b = parseInt(match[3]);
            
            // Simple color approximation
            if (r > 200 && g > 200 && b > 200) return 'White';
            if (r < 50 && g < 50 && b < 50) return 'Black';
            if (r > 200 && g < 100 && b < 100) return 'Red';
            if (r < 100 && g > 200 && b < 100) return 'Green';
            if (r < 100 && g < 100 && b > 200) return 'Blue';
            if (r > 200 && g > 200 && b < 100) return 'Yellow';
            if (r > 200 && g > 100 && g < 200 && b < 100) return 'Orange';
            if (r > 150 && g < 100 && b > 150) return 'Purple';
            if (r > 200 && g > 150 && b > 180) return 'Pink';
            if (r > 100 && r < 180 && g > 50 && g < 100 && b < 80) return 'Brown';
            if (Math.abs(r - g) < 30 && Math.abs(g - b) < 30) return 'Gray';
        }
    }
    
    // Return the original if no match found
    return color;
}

// ========================================
// RENDER CART ITEMS (STEP 1)
// ========================================
function renderCartItems() {
    const container = document.getElementById('cartItemsContainer');
    
    if (!cart || cart.length === 0) {
        container.innerHTML = `
            <div class="cart-empty" style="padding: 100px 24px;">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" style="margin-bottom: 24px; opacity: 0.2;">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
                <p style="font-family: var(--font-heading); font-size: 24px; color: var(--text-dark); margin-bottom: 32px;">Your cart is currently empty</p>
                <a href="index.php" class="btn btn-primary" style="max-width: 280px; margin: 0 auto;">Explore Collections</a>
            </div>
        `;
        
        // Hide step actions if cart is empty
        const stepActions = document.querySelector('#step1 .step-actions');
        if (stepActions) {
            stepActions.style.display = 'none';
        }
        
        return;
    }

    // Render each cart item
    container.innerHTML = cart.map(item => {
        const qty = parseInt(item.quantity) || 1;
        const price = parseFloat(item.price) || 0;
        const itemTotal = (price * qty).toFixed(2);
        const colorName = rgbToColorName(item.color);
        const sizeDisplay = item.size || 'N/A';
        
        return `
            <div class="cart-item-checkout">
                <img src="${item.image || 'https://via.placeholder.com/100x100?text=No+Image'}" 
                     alt="${item.name}" 
                     class="item-image"
                     loading="lazy">
                <div class="item-details">
                    <h3 class="item-name">${item.name}</h3>
                    <div class="item-variant">
                        <div class="variant-item">
                            <span>Color: ${colorName}</span>
                        </div>
                        <div class="variant-item">
                            <span>Size: ${sizeDisplay}</span>
                        </div>
                    </div>
                    <div class="item-price-qty">
                        <span class="item-qty">Quantity: ${qty}</span>
                        <span class="item-price">$${itemTotal}</span>
                    </div>
                </div>
            </div>
        `;
    }).join('');

    // Update cart summary
    updateCartSummary();
}

// ========================================
// RENDER SUMMARY ITEMS (SIDEBAR)
// ========================================
function renderSummaryItems() {
    const container = document.getElementById('summaryItems');
    
    if (!cart || cart.length === 0) {
        container.innerHTML = '<p style="color: var(--secondary); font-size: 14px; text-align: center; padding: 20px 0;">No items in cart</p>';
        return;
    }

    container.innerHTML = cart.map(item => {
        const qty = parseInt(item.quantity) || 1;
        const price = parseFloat(item.price) || 0;
        const itemTotal = (price * qty).toFixed(2);
        const colorName = rgbToColorName(item.color);
        return `
            <div class="summary-item">
                <img src="${item.image || 'https://via.placeholder.com/50x50?text=No+Image'}" 
                     alt="${item.name}" 
                     class="summary-item-image">
                <div class="summary-item-details">
                    <div class="summary-item-name">${item.name}</div>
                    <div class="summary-item-variant">Quantity: ${qty} | Color: ${colorName}</div>
                </div>
                <div class="summary-item-price">$${itemTotal}</div>
            </div>
        `;
    }).join('');
}

// ========================================
// UPDATE CART SUMMARY
// ========================================
function updateCartSummary() {
    const subtotal = cart.reduce((sum, item) => {
        const qty = parseInt(item.quantity) || 1;
        const price = parseFloat(item.price) || 0;
        return sum + (price * qty);
    }, 0);

    // Apply free shipping threshold
    const threshold = parseFloat(STORE_SETTINGS.shipfree) || 0;
    if (threshold > 0 && subtotal >= threshold) {
        shippingCost = 0;
    } else {
        shippingCost = parseFloat(STORE_SETTINGS.shiprate) || 0;
    }

    const total = subtotal + shippingCost;

    document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
    document.getElementById('shipping').textContent = shippingCost === 0 ? 'FREE' : `$${shippingCost.toFixed(2)}`;
    document.getElementById('total').textContent = `$${total.toFixed(2)}`;
}

// ========================================
// STEP NAVIGATION
// ========================================
function goToStep(stepNumber) {
    // Hide all steps
    document.querySelectorAll('.checkout-step').forEach(step => {
        step.classList.remove('active');
    });

    // Show target step
    const targetStep = document.getElementById(`step${stepNumber}`);
    if (targetStep) {
        targetStep.classList.add('active');
        currentStep = stepNumber;
        updateProgressBar();
        
        // Hide sidebar on confirmation step
        const sidebar = document.querySelector('.order-summary-sidebar');
        const main = document.querySelector('.checkout-main');
        if (sidebar && main) {
            if (stepNumber === 4) {
                sidebar.style.display = 'none';
                main.style.gridTemplateColumns = '1fr';
                main.style.maxWidth = '800px';
            } else {
                sidebar.style.display = 'block';
                main.style.gridTemplateColumns = '1fr 400px';
                main.style.maxWidth = '1200px';
            }
        }

        // Hide back link on confirmation step
        const backLink = document.getElementById('checkoutBackLink');
        if (backLink) {
            backLink.style.display = stepNumber === 4 ? 'none' : 'flex';
        }

        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
}

// ========================================
// UPDATE PROGRESS BAR
// ========================================
function updateProgressBar() {
    const steps = document.querySelectorAll('.progress-step');
    const progressLine = document.getElementById('progressLine');

    steps.forEach((step, index) => {
        const stepNumber = index + 1;
        
        if (stepNumber < currentStep) {
            step.classList.add('completed');
            step.classList.remove('active');
        } else if (stepNumber === currentStep) {
            step.classList.add('active');
            step.classList.remove('completed');
        } else {
            step.classList.remove('active', 'completed');
        }
    });

    // Update progress line width
    const progressPercent = ((currentStep - 1) / (steps.length - 1)) * 100;
    progressLine.style.width = `${progressPercent}%`;
}

// ========================================
// FORM VALIDATION AND NAVIGATION
// ========================================
function validateAndContinue(fromStep, toStep) {
    if (fromStep === 2) {
        // Validate shipping form
        const form = document.getElementById('shippingForm');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        // Store shipping data
        orderData.shipping = {
            fullName: document.getElementById('fullName').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            address: document.getElementById('address').value,
            city: document.getElementById('city').value,
            country: document.getElementById('country').value,
            zipCode: document.getElementById('zipCode').value
        };

        showToast('Shipping information saved', 'success');
    }

    goToStep(toStep);
}

// ========================================
// PAYMENT METHOD SELECTION
// ========================================
function selectPaymentMethod(method) {
    // Update active state
    document.querySelectorAll('.payment-method').forEach(el => {
        el.classList.remove('active');
    });
    
    const selectedMethod = document.querySelector(`.payment-method[data-method="${method}"]`);
    if (selectedMethod) {
        selectedMethod.classList.add('active');
    }

    // Show/hide appropriate forms
    const cardForm = document.getElementById('cardForm');
    const codInfo = document.getElementById('codInfo');
    const paypalInfo = document.getElementById('paypalInfo');

    // Hide all first
    if (cardForm) cardForm.classList.remove('active');
    if (codInfo) codInfo.classList.remove('active');
    if (paypalInfo) paypalInfo.classList.remove('active');

    if (method === 'card') {
        if (cardForm) cardForm.classList.add('active');
        
        // Make card fields required
        if (document.getElementById('cardNumber')) document.getElementById('cardNumber').required = true;
        if (document.getElementById('cardExpiry')) document.getElementById('cardExpiry').required = true;
        if (document.getElementById('cardCVV')) document.getElementById('cardCVV').required = true;
        if (document.getElementById('cardName')) document.getElementById('cardName').required = true;
    } else if (method === 'cod') {
        if (codInfo) codInfo.classList.add('active');
        
        // Remove required from card fields
        if (document.getElementById('cardNumber')) document.getElementById('cardNumber').required = false;
        if (document.getElementById('cardExpiry')) document.getElementById('cardExpiry').required = false;
        if (document.getElementById('cardCVV')) document.getElementById('cardCVV').required = false;
        if (document.getElementById('cardName')) document.getElementById('cardName').required = false;
    } else if (method === 'paypal') {
        if (paypalInfo) paypalInfo.classList.add('active');

        // Remove required from card fields
        if (document.getElementById('cardNumber')) document.getElementById('cardNumber').required = false;
        if (document.getElementById('cardExpiry')) document.getElementById('cardExpiry').required = false;
        if (document.getElementById('cardCVV')) document.getElementById('cardCVV').required = false;
        if (document.getElementById('cardName')) document.getElementById('cardName').required = false;
    }

    orderData.paymentMethod = method;
}

// ========================================
// CARD NUMBER FORMATTING
// ========================================
function initializeCardFormatting() {
    const cardNumberInput = document.getElementById('cardNumber');
    const cardExpiryInput = document.getElementById('cardExpiry');
    const cardCVVInput = document.getElementById('cardCVV');

    // Format card number (XXXX XXXX XXXX XXXX)
    if (cardNumberInput) {
        cardNumberInput.addEventListener('input', (e) => {
            let value = e.target.value.replace(/\s/g, '');
            value = value.replace(/\D/g, '');
            value = value.substring(0, 16);
            
            const parts = value.match(/.{1,4}/g);
            e.target.value = parts ? parts.join(' ') : value;
        });
    }

    // Format expiry date (MM/YY)
    if (cardExpiryInput) {
        cardExpiryInput.addEventListener('input', (e) => {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            
            e.target.value = value;
        });
    }

    // Format CVV (numbers only)
    if (cardCVVInput) {
        cardCVVInput.addEventListener('input', (e) => {
            e.target.value = e.target.value.replace(/\D/g, '').substring(0, 4);
        });
    }
}

// ========================================
// PLACE ORDER
// ========================================
function placeOrder() {
    const btn = document.getElementById('placeOrderBtn');
    
    // Validate payment method selection
    if (!orderData.paymentMethod) {
        orderData.paymentMethod = 'card'; // Default to card
    }

    // If card payment, validate card form
    if (orderData.paymentMethod === 'card') {
        const cardForm = document.getElementById('cardForm');
        if (!cardForm.checkValidity()) {
            cardForm.reportValidity();
            return;
        }

        // Store card data (in real app, this would be sent to payment processor)
        orderData.payment = {
            cardNumber: document.getElementById('cardNumber').value,
            cardExpiry: document.getElementById('cardExpiry').value,
            cardCVV: document.getElementById('cardCVV').value,
            cardName: document.getElementById('cardName').value
        };
    }

    // Show loading state
    btn.classList.add('btn-loading');

    // Simulate processing
    setTimeout(() => {
        // Store cart and totals
        orderData.cart = cart;
        orderData.subtotal = cart.reduce((sum, item) => {
            const qty = parseInt(item.quantity) || 1;
            const price = parseFloat(item.price) || 0;
            return sum + (price * qty);
        }, 0);
        orderData.shippingCost = shippingCost;
        orderData.total = orderData.subtotal + orderData.shippingCost;
        orderData.orderDate = new Date().toLocaleString();
        orderData.orderNumber = 'ORD-' + Date.now();

        // Display order summary
        displayOrderSummary();

        // Save order to dashboard data (localStorage)
        saveOrderToDashboard(orderData);

        // Clear cart from localStorage
        localStorage.removeItem('cart');
        cart = [];

        // Remove loading state
        btn.classList.remove('btn-loading');

        // Show confirmation step
        goToStep(4);

        showToast('Order placed successfully!', 'success');
    }, 1500);
}

// ========================================
// DISPLAY ORDER SUMMARY (STEP 4)
// ========================================
function displayOrderSummary() {
    const summaryContainer = document.getElementById('orderSummaryDetails');
    
    const html = `
        <div class="order-detail-item">
            <strong>Order Number</strong>
            <span>${orderData.orderNumber}</span>
        </div>
        <div class="order-detail-item">
            <strong>Order Date</strong>
            <span>${orderData.orderDate}</span>
        </div>
        <div class="order-detail-item">
            <strong>Customer</strong>
            <span>${orderData.shipping?.fullName || 'N/A'}</span>
        </div>
        <div class="order-detail-item">
            <strong>Email</strong>
            <span>${orderData.shipping?.email || 'N/A'}</span>
        </div>
        <div class="order-detail-item full-width">
            <strong>Shipping Address</strong>
            <span>${orderData.shipping?.address || ''}, ${orderData.shipping?.city || ''}, ${orderData.shipping?.country || ''} ${orderData.shipping?.zipCode || ''}</span>
        </div>
        <div class="order-detail-item">
            <strong>Payment Method</strong>
            <span>${orderData.paymentMethod === 'card' ? 'Credit/Debit Card' : (orderData.paymentMethod === 'paypal' ? 'PayPal' : 'Cash on Delivery')}</span>
        </div>
        <div class="order-detail-item">
            <strong>Total</strong>
            <span style="font-size: 18px; font-weight: 600; color: var(--primary);">$${orderData.total?.toFixed(2) || '0.00'}</span>
        </div>
    `;

    summaryContainer.innerHTML = html;
}

// ========================================
// SAVE ORDER TO DASHBOARD
// ========================================
function saveOrderToDashboard(data) {
    try {
        // 1. Save the Order
        let orders = JSON.parse(localStorage.getItem('dashboard_orders') || '[]');
        const newOrder = {
            id: data.orderNumber,
            cust: data.shipping.fullName,
            prod: data.cart.length > 1 ? data.cart[0].name + ' (+' + (data.cart.length - 1) + ')' : data.cart[0].name,
            size: data.cart[0].size || 'N/A',
            qty: data.cart.reduce((s, item) => s + (parseInt(item.quantity) || 1), 0),
            status: data.paymentMethod === 'cod' ? 'Pending' : 'Processing',
            price: '$' + data.total.toFixed(2),
            isoDate: new Date().toISOString(),
            date: new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' }),
            items: data.cart // Full items list for details
        };
        orders.unshift(newOrder);
        localStorage.setItem('dashboard_orders', JSON.stringify(orders));

        // 2. Save/Update the Customer
        let customers = JSON.parse(localStorage.getItem('dashboard_customers') || '[]');
        let custIdx = customers.findIndex(c => c.email.toLowerCase() === data.shipping.email.toLowerCase());
        
        if (custIdx > -1) {
            // Update existing customer
            customers[custIdx].orders++;
            let currentSpent = parseFloat(customers[custIdx].spent.replace(/[$,]/g, '') || 0);
            customers[custIdx].spent = '$' + (currentSpent + data.total).toFixed(2);
            customers[custIdx].status = 'Active';
        } else {
            // Create new customer
            const colors = ['#a8845e', '#7e5232', '#b39c80', '#c6baa5'];
            customers.push({
                initials: data.shipping.fullName.split(' ').map(w => w[0]).join('').substring(0, 2).toUpperCase(),
                name: data.shipping.fullName,
                email: data.shipping.email,
                loc: data.shipping.city + ', ' + data.shipping.country,
                orders: 1,
                spent: '$' + data.total.toFixed(2),
                status: 'Active',
                color: colors[Math.floor(Math.random() * colors.length)]
            });
        }
        localStorage.setItem('dashboard_customers', JSON.stringify(customers));

    } catch (error) {
        console.error('Error saving order to dashboard:', error);
    }
}

// ========================================
// TOAST NOTIFICATION
// ========================================
function showToast(message, type = 'success') {
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toastMessage');
    
    toastMessage.textContent = message;
    toast.className = 'toast show ' + type;
    
    setTimeout(() => {
        toast.classList.remove('show');
    }, 3000);
}

// ========================================
// PROMO CODE TOGGLE
// ========================================
function togglePromoForm() {
    const form = document.getElementById('promoForm');
    form.classList.toggle('active');
}

// ========================================
// UTILITY FUNCTIONS
// ========================================

// Prevent form submission on Enter key (except in textareas)
document.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
        e.preventDefault();
    }
});

// Handle browser back button
window.addEventListener('popstate', (e) => {
    if (currentStep > 1) {
        goToStep(currentStep - 1);
    }
});

// Initialize default payment method
orderData.paymentMethod = 'card';
</script>
    
</body>
</html>
