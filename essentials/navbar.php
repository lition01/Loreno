<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store</title>
    <style>
        *, *::before, *::after {
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
        }

        /* Topbar */
        .topbar {
            background: var(--color-dark);
            height: var(--topbar-height);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1001;
            overflow: hidden;
        }

        .topbar-track {
            display: flex;
            animation: scroll 30s linear infinite;
            white-space: nowrap;
        }

        .topbar-content {
            display: flex;
            align-items: center;
            height: var(--topbar-height);
            gap: 3rem;
            padding: 0 2rem;
        }

        .topbar-item {
            color: var(--color-white);
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .topbar-item::before {
            content: '';
            width: 4px;
            height: 4px;
            background: var(--color-main);
            border-radius: 50%;
        }

        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: var(--topbar-height);
            left: 0;
            right: 0;
            height: var(--navbar-height);
            background: var(--color-white);
            border-bottom: 1px solid var(--color-border);
            z-index: 1000;
        }

        .navbar-inner {
            max-width: 1400px;
            height: 100%;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Logo */
        .logo {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            background: var(--color-dark);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon svg {
            width: 20px;
            height: 20px;
            fill: var(--color-white);
        }

        /* Nav Links */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            list-style: none;
        }

        .nav-links > li {
            position: static;
        }

        .nav-links > li > a {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.6rem 1rem;
            color: var(--color-dark);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            transition: all var(--transition);
            border-radius: 6px;
            position: relative;
        }

        .nav-links > li > a:hover {
            color: var(--color-accent);
            
        }

        .nav-links > li > a .arrow {
            width: 12px;
            height: 12px;
            opacity: 0.5;
            transition: transform var(--transition);
        }

        .nav-links > li:hover > a .arrow {
            transform: rotate(180deg);
        }

        /* Mega Menu */
        .mega-menu {
            position: fixed;
            top: calc(var(--topbar-height) + var(--navbar-height));
            left: 0;
            right: 0;
            background: var(--color-white);
            border-bottom: 1px solid var(--color-border);
            padding: 2rem 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all var(--transition);
            box-shadow: 0 20px 50px rgba(47, 39, 22, 0.12);
            z-index: 999;
        }

        .nav-links > li:hover .mega-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .mega-menu-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(4, 1fr) 280px;
            gap: 2rem;
        }

        .mega-menu-column h3 {
            font-family: var(--font-heading);
            font-size: 1rem;
            font-weight: 600;
            color: var(--color-dark);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--color-main);
        }

        .mega-menu-column ul {
            list-style: none;
        }

        .mega-menu-column ul li {
            margin-bottom: 0.5rem;
        }

        .mega-menu-column ul li a {
            color: var(--color-dark);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all var(--transition);
            display: inline-block;
            padding: 0.25rem 0;
        }

        .mega-menu-column ul li a:hover {
            color: var(--color-accent);
            transform: translateX(5px);
        }

        .mega-menu-featured {
            background: var(--color-light-bg);
            border-radius: 12px;
            padding: 1.25rem;
            text-align: center;
        }

        .mega-menu-featured img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .mega-menu-featured h4 {
            font-family: var(--font-heading);
            font-size: 1.1rem;
            color: var(--color-dark);
            margin-bottom: 0.5rem;
        }

        .mega-menu-featured p {
            font-size: 0.85rem;
            color: var(--color-main);
            margin-bottom: 1rem;
        }

        .mega-menu-featured a {
            display: inline-block;
            padding: 0.6rem 1.25rem;
            background: var(--color-dark);
            color: var(--color-white);
            text-decoration: none;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            transition: background var(--transition);
        }

        .mega-menu-featured a:hover {
            background: var(--color-accent);
        }

        /* Simple Dropdown for non-mega items */
        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 200px;
            background: var(--color-white);
            border: 1px solid var(--color-border);
            border-radius: 8px;
            padding: 0.75rem 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all var(--transition);
            box-shadow: 0 10px 30px rgba(47, 39, 22, 0.1);
        }

        .nav-links > li.has-dropdown {
            position: relative;
        }

        .nav-links > li.has-dropdown:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown a {
            display: block;
            padding: 0.6rem 1.25rem;
            color: var(--color-dark);
            text-decoration: none;
            font-size: 0.875rem;
            transition: all var(--transition);
        }

        .dropdown a:hover {
            background: var(--color-light-bg);
            color: var(--color-accent);
            padding-left: 1.5rem;
        }

        /* Search */
        .search-box {
            position: relative;
            max-width: 240px;
        }

        .search-box input {
            width: 100%;
            padding: 0.6rem 1rem 0.6rem 2.5rem;
            border: 1px solid var(--color-border);
            border-radius: 6px;
            font-size: 0.85rem;
            background: var(--color-light-bg);
            transition: all var(--transition);
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--color-main);
            background: var(--color-white);
        }

        .search-box svg {
            position: absolute;
            left: 0.8rem;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: var(--color-main);
        }

        /* Actions */
        .nav-actions {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: none;
            color: var(--color-dark);
            cursor: pointer;
            transition: color var(--transition);
            position: relative;
        }

        .action-btn:hover {
            color: var(--color-main);
        }

        .action-btn svg {
            width: 20px;
            height: 20px;
            stroke-width: 1.75;
        }

        .cart-count,
        .wishlist-count {
            position: absolute;
            top: 2px;
            right: 2px;
            min-width: 16px;
            height: 16px;
            padding: 0 4px;
            background: var(--color-accent);
            color: var(--color-white);
            font-size: 0.6rem;
            font-weight: 600;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }

        .wishlist-count {
            background: var(--color-main);
        }

        .wishlist-count:not(:empty) {
            display: flex;
        }

        .wishlist-count:empty {
            display: none;
        }

        .action-btn.active svg {
            fill: var(--color-main);
            color: var(--color-main);
        }

        #wishlistBtn.active svg {
            fill: var(--color-main);
            color: var(--color-main);
        }

        /* Simple Mobile Toggle - No Hover Effects */
        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            width: 36px;
            height: 36px;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 8px;
        }

        .menu-toggle span {
            width: 20px;
            height: 2px;
            background: var(--color-dark);
            display: block;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        /* Cart Sidebar */
        .cart-overlay {
            position: fixed;
            inset: 0;
            background: rgba(47, 39, 22, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all var(--transition);
            z-index: 2000;
        }

        .cart-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .cart-sidebar {
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            max-width: 420px;
            height: 100%;
            background: var(--color-white);
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 2001;
            display: flex;
            flex-direction: column;
            box-shadow: -10px 0 40px rgba(47, 39, 22, 0.15);
        }

        .cart-sidebar.active {
            transform: translateX(0);
        }

        /* Wishlist Sidebar */
        .wishlist-overlay {
            position: fixed;
            inset: 0;
            background: rgba(47, 39, 22, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all var(--transition);
            z-index: 2000;
        }

        .wishlist-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .wishlist-sidebar {
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            max-width: 420px;
            height: 100%;
            background: var(--color-white);
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 2001;
            display: flex;
            flex-direction: column;
            box-shadow: -10px 0 40px rgba(47, 39, 22, 0.15);
        }

        .wishlist-sidebar.active {
            transform: translateX(0);
        }

        .wishlist-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--color-border);
        }

        .wishlist-header h2 {
            font-family: var(--font-heading);
            font-size: 1.3rem;
            font-weight: 400;
            color: var(--color-dark);
        }

        .wishlist-header h2 span {
            font-size: 0.85rem;
            color: var(--color-main);
            font-family: var(--font-primary);
        }

        .wishlist-close {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--color-light-bg);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            transition: all var(--transition);
        }

        .wishlist-close:hover {
            background: var(--color-border);
        }

        .wishlist-close svg {
            width: 18px;
            height: 18px;
            color: var(--color-dark);
        }

        .wishlist-body {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem;
        }

        .wishlist-empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 1.5rem;
            text-align: center;
            color: var(--color-main);
        }

        .wishlist-empty svg {
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .wishlist-empty p {
            font-size: 0.95rem;
            color: var(--color-dark);
            opacity: 0.7;
        }

        .wishlist-item {
            padding: 1.25rem 0;
            border-bottom: 1px solid var(--color-border);
        }

        .wishlist-item:last-child {
            border-bottom: none;
        }

        .wishlist-item-content {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .wishlist-item-img {
            width: 90px;
            height: 110px;
            min-width: 90px;
            background: var(--color-light-bg);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(47, 39, 22, 0.08);
        }

        .wishlist-item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .wishlist-item-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .wishlist-item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .wishlist-item-name {
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--color-dark);
            line-height: 1.4;
            margin: 0;
            flex: 1;
        }

        .wishlist-item-remove {
            width: 28px;
            height: 28px;
            min-width: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: 1px solid var(--color-border);
            border-radius: 6px;
            color: var(--color-main);
            cursor: pointer;
            transition: all var(--transition);
            padding: 0;
            flex-shrink: 0;
        }

        .wishlist-item-remove:hover {
            background: var(--color-accent);
            border-color: var(--color-accent);
            color: var(--color-white);
            transform: scale(1.05);
        }

        .wishlist-item-remove svg {
            width: 14px;
            height: 14px;
        }

        .wishlist-item-price {
            font-weight: 700;
            font-size: 1rem;
            color: var(--color-accent);
        }

        .wishlist-item-options {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--color-border);
        }

        .wishlist-option-group {
            margin-bottom: 1rem;
        }

        .wishlist-option-group:last-child {
            margin-bottom: 0.75rem;
        }

        .wishlist-option-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--color-dark);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .wishlist-colors {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .wishlist-color-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all var(--transition);
            position: relative;
        }

        .wishlist-color-btn.selected {
            border-color: var(--color-dark);
            transform: scale(1.1);
        }

        .wishlist-color-btn:hover {
            transform: scale(1.15);
        }

        .wishlist-sizes {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .wishlist-size-btn {
            min-width: 36px;
            height: 36px;
            padding: 0 0.75rem;
            background: var(--color-light-bg);
            border: 1px solid var(--color-border);
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--color-dark);
            cursor: pointer;
            transition: all var(--transition);
        }

        .wishlist-size-btn:hover {
            background: var(--color-border);
        }

        .wishlist-size-btn.selected {
            background: var(--color-dark);
            border-color: var(--color-dark);
            color: var(--color-white);
        }

        .wishlist-quantity {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .wishlist-qty-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--color-light-bg);
            border: 1px solid var(--color-border);
            border-radius: 8px;
            padding: 0.25rem;
        }

        .wishlist-qty-btn {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--color-white);
            border: none;
            border-radius: 6px;
            color: var(--color-dark);
            cursor: pointer;
            transition: all var(--transition);
            padding: 0;
        }

        .wishlist-qty-btn:hover {
            background: var(--color-main);
            color: var(--color-white);
            transform: scale(1.1);
        }

        .wishlist-qty-btn:active {
            transform: scale(0.95);
        }

        .wishlist-qty-btn svg {
            width: 14px;
            height: 14px;
        }

        .wishlist-qty-value {
            font-size: 0.9rem;
            font-weight: 600;
            min-width: 24px;
            text-align: center;
            color: var(--color-dark);
        }

        .wishlist-add-to-cart {
            width: 100%;
            padding: 0.875rem;
            background: var(--color-dark);
            color: var(--color-white);
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            cursor: pointer;
            transition: all var(--transition);
            margin-top: 0.75rem;
        }

        .wishlist-add-to-cart:hover {
            background: var(--color-accent);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(47, 39, 22, 0.2);
        }

        .cart-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--color-border);
        }

        .cart-header h2 {
            font-family: var(--font-heading);
            font-size: 1.3rem;
            font-weight: 400;
            color: var(--color-dark);
        }

        .cart-header h2 span {
            font-size: 0.85rem;
            color: var(--color-main);
            font-family: var(--font-primary);
        }

        .cart-close {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--color-light-bg);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            transition: all var(--transition);
        }

        .cart-close:hover {
            background: var(--color-border);
        }

        .cart-close svg {
            width: 18px;
            height: 18px;
            color: var(--color-dark);
        }

        .cart-body {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem;
        }

        .cart-empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 1.5rem;
            text-align: center;
            color: var(--color-main);
        }

        .cart-empty svg {
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .cart-empty p {
            font-size: 0.95rem;
            color: var(--color-dark);
            opacity: 0.7;
        }

        .cart-item {
            display: flex;
            gap: 1rem;
            padding: 1.25rem 0;
            border-bottom: 1px solid var(--color-border);
            transition: background-color var(--transition);
        }

        .cart-item:first-child {
            padding-top: 0;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item:hover {
            background-color: rgba(179, 156, 128, 0.03);
        }

        .cart-item-img {
            width: 90px;
            height: 110px;
            min-width: 90px;
            background: var(--color-light-bg);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(47, 39, 22, 0.08);
        }

        .cart-item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform var(--transition);
        }

        .cart-item:hover .cart-item-img img {
            transform: scale(1.05);
        }

        .cart-item-details {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            position: relative;
        }

        .cart-item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .cart-item-name {
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--color-dark);
            line-height: 1.4;
            margin: 0;
            flex: 1;
        }

        .cart-item-remove {
            width: 28px;
            height: 28px;
            min-width: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: 1px solid var(--color-border);
            border-radius: 6px;
            color: var(--color-main);
            cursor: pointer;
            transition: all var(--transition);
            padding: 0;
            flex-shrink: 0;
        }

        .cart-item-remove:hover {
            background: var(--color-accent);
            border-color: var(--color-accent);
            color: var(--color-white);
            transform: scale(1.05);
        }

        .cart-item-remove svg {
            width: 14px;
            height: 14px;
        }

        .cart-item-variant {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.8rem;
            color: var(--color-main);
            margin-top: 0.25rem;
        }

        .variant-label {
            font-weight: 500;
            opacity: 0.8;
        }

        .variant-value {
            font-weight: 600;
            color: var(--color-dark);
        }

        .variant-separator {
            margin: 0 0.25rem;
            opacity: 0.4;
        }

        .cart-item-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 0.75rem;
            gap: 1rem;
        }

        .cart-item-qty {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--color-light-bg);
            border: 1px solid var(--color-border);
            border-radius: 8px;
            padding: 0.25rem;
        }

        .qty-btn {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--color-white);
            border: none;
            border-radius: 6px;
            color: var(--color-dark);
            cursor: pointer;
            transition: all var(--transition);
            padding: 0;
        }

        .qty-btn:hover {
            background: var(--color-main);
            color: var(--color-white);
            transform: scale(1.1);
        }

        .qty-btn:active {
            transform: scale(0.95);
        }

        .qty-btn svg {
            width: 14px;
            height: 14px;
        }

        .qty-value {
            font-size: 0.9rem;
            font-weight: 600;
            min-width: 24px;
            text-align: center;
            color: var(--color-dark);
        }

        .cart-item-price {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-left: auto;
        }

        .price-label {
            font-size: 0.85rem;
            color: var(--color-main);
            opacity: 0.8;
        }

        .price-value {
            font-weight: 700;
            font-size: 1rem;
            color: var(--color-accent);
        }

        .cart-footer {
            padding: 1.5rem;
            border-top: 1px solid var(--color-border);
            background: var(--color-white);
        }

        .cart-total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            margin-bottom: 1rem;
            border-top: 1px solid var(--color-border);
            border-bottom: 1px solid var(--color-border);
        }

        .cart-total-row span:first-child {
            font-weight: 600;
            font-size: 1rem;
            color: var(--color-dark);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .cart-total-row strong {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--color-accent);
        }

        .cart-subtotal {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .cart-subtotal span:first-child {
            color: var(--color-main);
            font-size: 0.9rem;
        }

        .cart-subtotal span:last-child {
            font-weight: 600;
            color: var(--color-dark);
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            padding-top: 0.75rem;
            border-top: 1px solid var(--color-border);
            margin-bottom: 1rem;
        }

        .cart-total span:first-child {
            font-weight: 500;
            color: var(--color-dark);
        }

        .cart-total span:last-child {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--color-dark);
        }

        .checkout-btn {
    display: block;
    width: 100%;
    padding: 1rem;
    background: #1f1f1f;      /* ngjyrë e fortë, elegante */
    color: #ffffff;
    text-align: center;
    font-size: 0.95rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    border-radius: 10px;
    text-decoration: none;
    transition: 
        background 0.3s ease,
        transform 0.2s ease,
        box-shadow 0.3s ease;
}

.checkout-btn:hover {
    background: #000000;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
}

.checkout-btn:active {
    transform: translateY(0);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}


        .continue-shopping {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: var(--color-main);
            font-size: 0.85rem;
            text-decoration: none;
            transition: color var(--transition);
        }

        .continue-shopping:hover {
            color: var(--color-accent);
        }

        /* Page Spacer */
        .page-spacer {
            height: calc(var(--topbar-height) + var(--navbar-height));
        }

        /* Mobile Menu Overlay */
        .mobile-menu-overlay {
            display: none;
            position: fixed;
            top: calc(var(--topbar-height) + var(--navbar-height));
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--color-white);
            z-index: 998;
            overflow-y: auto;
            padding: 0;
        }

        .mobile-menu-overlay.active {
            display: block;
        }

        .mobile-nav-item {
            border-bottom: 1px solid var(--color-border);
        }

        .mobile-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            color: var(--color-dark);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            background: var(--color-white);
            border: none;
            width: 100%;
            cursor: pointer;
            text-align: left;
        }

        .mobile-nav-link svg {
            width: 18px;
            height: 18px;
            transition: transform 0.3s ease;
        }

        .mobile-nav-item.open .mobile-nav-link svg {
            transform: rotate(180deg);
        }

        .mobile-submenu {
            display: none;
            background: var(--color-light-bg);
        }

        .mobile-nav-item.open .mobile-submenu {
            display: block;
        }

        .mobile-submenu-section {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--color-border);
        }

        .mobile-submenu-section:last-child {
            border-bottom: none;
        }

        .mobile-submenu-title {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--color-main);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.75rem;
        }

        .mobile-submenu a {
            display: block;
            padding: 0.6rem 0;
            color: var(--color-dark);
            text-decoration: none;
            font-size: 0.9rem;
            border-bottom: 1px solid var(--color-border);
        }

        .mobile-submenu a:last-child {
            border-bottom: none;
        }

        .mobile-submenu a:active {
            color: var(--color-accent);
        }

        /* Responsive */
        @media (max-width: 900px) {
            .nav-links, .search-box {
                display: none;
            }

            .menu-toggle {
                display: flex;
            }
        }

        @media (max-width: 480px) {
            .cart-sidebar {
                max-width: 100%;
            }

            .action-btn {
                width: 32px;
                height: 32px;
            }

            .action-btn svg {
                width: 18px;
                height: 18px;
            }

            .menu-toggle {
                width: 32px;
                height: 32px;
            }

            .menu-toggle span {
                width: 18px;
            }

            .nav-actions {
                gap: 0;
            }
        }

        /* Focus states */
        :focus-visible {
            outline: 2px solid var(--color-main);
            outline-offset: 2px;
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body>
    <!-- Topbar -->
    <div class="topbar">
        <div class="topbar-track">
            <div class="topbar-content">
                <span class="topbar-item">Free Shipping on Orders Over $99</span>
                <span class="topbar-item">New Summer Collection Available</span>
                <span class="topbar-item">Use Code STYLE20 for 20% Off</span>
                <span class="topbar-item">Free Returns Within 30 Days</span>
            </div>
            <div class="topbar-content" aria-hidden="true">
                <span class="topbar-item">Free Shipping on Orders Over $99</span>
                <span class="topbar-item">New Summer Collection Available</span>
                <span class="topbar-item">Use Code STYLE20 for 20% Off</span>
                <span class="topbar-item">Free Returns Within 30 Days</span>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-inner">
            <!-- Logo -->
            <a href="/" class="logo">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
            </a>

            <!-- Nav Links with Mega Menu -->
            <ul class="nav-links" id="navLinks">
                <li>
                    <a href="/men">
                        Men
                        <svg class="arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="mega-menu">
                        <div class="mega-menu-inner">
                            <div class="mega-menu-column">
                                <h3>Clothing</h3>
                                <ul>
                                    <li><a href="/men/t-shirts">T-Shirts</a></li>
                                    <li><a href="/men/shirts">Shirts</a></li>
                                    <li><a href="/men/jackets">Jackets</a></li>
                                    <li><a href="/men/pants">Pants</a></li>
                                    <li><a href="/men/jeans">Jeans</a></li>
                                    <li><a href="/men/suits">Suits</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-column">
                                <h3>Shoes</h3>
                                <ul>
                                    <li><a href="/men/sneakers">Sneakers</a></li>
                                    <li><a href="/men/boots">Boots</a></li>
                                    <li><a href="/men/loafers">Loafers</a></li>
                                    <li><a href="/men/sandals">Sandals</a></li>
                                    <li><a href="/men/formal">Formal Shoes</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-column">
                                <h3>Accessories</h3>
                                <ul>
                                    <li><a href="/men/watches">Watches</a></li>
                                    <li><a href="/men/bags">Bags</a></li>
                                    <li><a href="/men/belts">Belts</a></li>
                                    <li><a href="/men/wallets">Wallets</a></li>
                                    <li><a href="/men/sunglasses">Sunglasses</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-column">
                                <h3>Collections</h3>
                                <ul>
                                    <li><a href="/men/new">New Arrivals</a></li>
                                    <li><a href="/men/bestsellers">Bestsellers</a></li>
                                    <li><a href="/men/sale">Sale</a></li>
                                    <li><a href="/men/premium">Premium</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-featured">
                                <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?w=300&h=200&fit=crop" alt="Men's Collection">
                                <h4>Summer Collection</h4>
                                <p>Fresh styles for the warm season</p>
                                <a href="/men/summer">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="/women">
                        Women
                        <svg class="arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="mega-menu">
                        <div class="mega-menu-inner">
                            <div class="mega-menu-column">
                                <h3>Clothing</h3>
                                <ul>
                                    <li><a href="/women/dresses">Dresses</a></li>
                                    <li><a href="/women/tops">Tops</a></li>
                                    <li><a href="/women/blouses">Blouses</a></li>
                                    <li><a href="/women/skirts">Skirts</a></li>
                                    <li><a href="/women/pants">Pants</a></li>
                                    <li><a href="/women/jackets">Jackets</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-column">
                                <h3>Shoes</h3>
                                <ul>
                                    <li><a href="/women/heels">Heels</a></li>
                                    <li><a href="/women/flats">Flats</a></li>
                                    <li><a href="/women/sneakers">Sneakers</a></li>
                                    <li><a href="/women/boots">Boots</a></li>
                                    <li><a href="/women/sandals">Sandals</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-column">
                                <h3>Accessories</h3>
                                <ul>
                                    <li><a href="/women/bags">Bags</a></li>
                                    <li><a href="/women/jewelry">Jewelry</a></li>
                                    <li><a href="/women/scarves">Scarves</a></li>
                                    <li><a href="/women/sunglasses">Sunglasses</a></li>
                                    <li><a href="/women/watches">Watches</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-column">
                                <h3>Collections</h3>
                                <ul>
                                    <li><a href="/women/new">New Arrivals</a></li>
                                    <li><a href="/women/bestsellers">Bestsellers</a></li>
                                    <li><a href="/women/sale">Sale</a></li>
                                    <li><a href="/women/premium">Premium</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-featured">
                                <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?w=300&h=200&fit=crop" alt="Women's Collection">
                                <h4>New Arrivals</h4>
                                <p>Discover the latest trends</p>
                                <a href="/women/new">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="/kids">
                        Kids
                        <svg class="arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="mega-menu">
                        <div class="mega-menu-inner">
                            <div class="mega-menu-column">
                                <h3>Boys</h3>
                                <ul>
                                    <li><a href="/kids/boys/tops">Tops</a></li>
                                    <li><a href="/kids/boys/pants">Pants</a></li>
                                    <li><a href="/kids/boys/shoes">Shoes</a></li>
                                    <li><a href="/kids/boys/outerwear">Outerwear</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-column">
                                <h3>Girls</h3>
                                <ul>
                                    <li><a href="/kids/girls/dresses">Dresses</a></li>
                                    <li><a href="/kids/girls/tops">Tops</a></li>
                                    <li><a href="/kids/girls/shoes">Shoes</a></li>
                                    <li><a href="/kids/girls/outerwear">Outerwear</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-column">
                                <h3>Baby</h3>
                                <ul>
                                    <li><a href="/kids/baby/clothing">Clothing</a></li>
                                    <li><a href="/kids/baby/shoes">Shoes</a></li>
                                    <li><a href="/kids/baby/accessories">Accessories</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-column">
                                <h3>Collections</h3>
                                <ul>
                                    <li><a href="/kids/new">New Arrivals</a></li>
                                    <li><a href="/kids/sale">Sale</a></li>
                                    <li><a href="/kids/school">Back to School</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu-featured">
                                <img src="https://images.unsplash.com/photo-1503919545889-aef636e10ad4?w=300&h=200&fit=crop" alt="Kids Collection">
                                <h4>Back to School</h4>
                                <p>Get ready for the new year</p>
                                <a href="/kids/school">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="/accessories">Accessories</a>
                </li>
                <li>
                    <a href="/sale">Sale</a>
                </li>
            </ul>

            <!-- Search -->
            <div class="search-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" placeholder="Search products...">
            </div>

            <!-- Actions -->
            <div class="nav-actions">
                <a href="login.php" class="action-btn" aria-label="Login">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>
                <button class="action-btn" id="wishlistBtn" aria-label="Wishlist">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                    <span class="wishlist-count" id="wishlistCount">0</span>
                </button>
                <button class="action-btn" id="cartBtn" aria-label="Shopping Cart">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                        <path d="M3 6h18"></path>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                    <span class="cart-count">0</span>
                </button>
                <button class="menu-toggle" id="menuToggle" aria-label="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobileMenu">
        <div class="mobile-nav-item" data-has-submenu="true">
            <button class="mobile-nav-link">
                Men
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <div class="mobile-submenu">
                <div class="mobile-submenu-section">
                    <div class="mobile-submenu-title">Clothing</div>
                    <a href="/men/t-shirts">T-Shirts</a>
                    <a href="/men/shirts">Shirts</a>
                    <a href="/men/jackets">Jackets</a>
                    <a href="/men/pants">Pants</a>
                    <a href="/men/jeans">Jeans</a>
                </div>
                <div class="mobile-submenu-section">
                    <div class="mobile-submenu-title">Shoes</div>
                    <a href="/men/sneakers">Sneakers</a>
                    <a href="/men/boots">Boots</a>
                    <a href="/men/loafers">Loafers</a>
                </div>
                <div class="mobile-submenu-section">
                    <div class="mobile-submenu-title">Accessories</div>
                    <a href="/men/watches">Watches</a>
                    <a href="/men/bags">Bags</a>
                    <a href="/men/belts">Belts</a>
                </div>
            </div>
        </div>
        <div class="mobile-nav-item" data-has-submenu="true">
            <button class="mobile-nav-link">
                Women
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <div class="mobile-submenu">
                <div class="mobile-submenu-section">
                    <div class="mobile-submenu-title">Clothing</div>
                    <a href="/women/dresses">Dresses</a>
                    <a href="/women/tops">Tops</a>
                    <a href="/women/blouses">Blouses</a>
                    <a href="/women/skirts">Skirts</a>
                    <a href="/women/pants">Pants</a>
                </div>
                <div class="mobile-submenu-section">
                    <div class="mobile-submenu-title">Shoes</div>
                    <a href="/women/heels">Heels</a>
                    <a href="/women/flats">Flats</a>
                    <a href="/women/sneakers">Sneakers</a>
                    <a href="/women/boots">Boots</a>
                </div>
                <div class="mobile-submenu-section">
                    <div class="mobile-submenu-title">Accessories</div>
                    <a href="/women/bags">Bags</a>
                    <a href="/women/jewelry">Jewelry</a>
                    <a href="/women/scarves">Scarves</a>
                </div>
            </div>
        </div>
        <div class="mobile-nav-item" data-has-submenu="true">
            <button class="mobile-nav-link">
                Kids
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <div class="mobile-submenu">
                <div class="mobile-submenu-section">
                    <div class="mobile-submenu-title">Boys</div>
                    <a href="/kids/boys/tops">Tops</a>
                    <a href="/kids/boys/pants">Pants</a>
                    <a href="/kids/boys/shoes">Shoes</a>
                </div>
                <div class="mobile-submenu-section">
                    <div class="mobile-submenu-title">Girls</div>
                    <a href="/kids/girls/dresses">Dresses</a>
                    <a href="/kids/girls/tops">Tops</a>
                    <a href="/kids/girls/shoes">Shoes</a>
                </div>
            </div>
        </div>
        <div class="mobile-nav-item">
            <a href="/accessories" class="mobile-nav-link">Accessories</a>
        </div>
        <div class="mobile-nav-item">
            <a href="/sale" class="mobile-nav-link">Sale</a>
        </div>
    </div>

    <!-- Cart Overlay -->
    <div class="cart-overlay" id="cartOverlay"></div>

    <!-- Wishlist Overlay -->
    <div class="wishlist-overlay" id="wishlistOverlay"></div>

    <!-- Cart Sidebar -->
    <aside class="cart-sidebar" id="cartSidebar" aria-label="Shopping Cart">

    <!-- HEADER -->
    <div class="cart-header">
        <h2>Your Cart <span id="cartItemsCount">(0 items)</span></h2>

        <button class="cart-close" id="cartClose" aria-label="Close cart">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 6 6 18"></path>
                <path d="M6 6 18 18"></path>
            </svg>
        </button>
    </div>

    <!-- BODY -->
    <div class="cart-body">
        <!-- Products rendered by JavaScript -->
    </div>

    <!-- FOOTER -->
    <div class="cart-footer">
        <div class="cart-total-row">
            <span>Total</span>
            <strong id="cartTotal">$0.00</strong>
        </div>

        <a href="checkout.php" class="checkout-btn">
            Përfundo Porosinë
        </a>
    </div>

</aside>

    <!-- Wishlist Sidebar -->
    <aside class="wishlist-sidebar" id="wishlistSidebar" aria-label="Wishlist">
        <!-- HEADER -->
        <div class="wishlist-header">
            <h2>Your Wishlist <span id="wishlistItemsCount">(0 items)</span></h2>
            <button class="wishlist-close" id="wishlistClose" aria-label="Close wishlist">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6 6 18"></path>
                    <path d="M6 6 18 18"></path>
                </svg>
            </button>
        </div>

        <!-- BODY -->
        <div class="wishlist-body" id="wishlistBody">
            <!-- Products rendered by JavaScript -->
        </div>
    </aside>

    <!-- Page Spacer -->
    <div class="page-spacer"></div>

    <!-- Load Cart Manager -->
  

   <script>
    // BURGER MENU

const menuToggle = document.getElementById('menuToggle');
const mobileMenu = document.getElementById('mobileMenu');

function openMobileMenu() {
    menuToggle.classList.add('active');
    mobileMenu.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeMobileMenu() {
    menuToggle.classList.remove('active');
    mobileMenu.classList.remove('active');
    document.body.style.overflow = '';
}

menuToggle.addEventListener('click', () => {
    if (mobileMenu.classList.contains('active')) {
        closeMobileMenu();
    } else {
        openMobileMenu();
    }
});

// Close with ESC
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeMobileMenu();
    }
});

// Submenu
const mobileNavItems = document.querySelectorAll('.mobile-nav-item[data-has-submenu="true"]');

mobileNavItems.forEach(item => {
    const btn = item.querySelector('.mobile-nav-link');
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        item.classList.toggle('open');
    });
});
   </script>
    

</body>
</html>