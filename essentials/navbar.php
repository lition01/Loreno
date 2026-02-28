<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Allenoire';
            src: url('https://fonts.cdnfonts.com/s/91211/Allenoire.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

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
            --color-dark: #1E1A14; /* Më e errët, luxury */
            --color-white: #ffffff;
            --color-light-bg: #faf9f7;
            --color-border: #e8e4de;
            --font-primary: 'Montserrat', system-ui, -apple-system, sans-serif;
            --font-heading: 'Allenoire', 'Playfair Display', serif;
            --font-serif: 'Cormorant Garamond', serif;
            --transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            --navbar-height: 80px;
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

        .navbar-top-row {
            display: contents;
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

        .logo {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
            order: 1;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            background: var(--color-dark);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .logo:hover .logo-icon {
            transform: scale(1.05);
        }

        .logo-icon svg {
            width: 20px;
            height: 20px;
            fill: var(--color-white);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            list-style: none;
            order: 2;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 0.15rem;
            order: 3;
        }

        .nav-links > li {
            position: static;
        }

        .nav-links > li > a {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.6rem 0.8rem;
            color: var(--color-dark);
            text-decoration: none;
            font-family: var(--font-heading);
            font-size: 0.9rem;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 0.05em;
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

        /* User Nav Section Improvements */
        .user-profile-wrapper {
            position: relative;
        }

        .user-profile-btn {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.5rem 0.8rem;
            border-radius: 50px;
            background: var(--color-light-bg);
            border: 1px solid var(--color-border);
            cursor: pointer;
            transition: all var(--transition);
        }

        .user-profile-btn:hover {
            background: var(--color-white);
            border-color: var(--color-main);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .user-avatar-circle {
            width: 24px;
            height: 24px;
            background: var(--color-dark);
            color: var(--color-white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .user-profile-btn .user-name {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--color-dark);
            max-width: 80px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .user-dropdown-menu {
            position: absolute;
            top: 120%;
            right: 0;
            width: 200px;
            background: var(--color-white);
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 0.5rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all var(--transition);
            z-index: 1002;
        }

        .user-profile-wrapper.active .user-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .user-dropdown-header {
            padding: 0.8rem 1rem;
            border-bottom: 1px solid var(--color-border);
            margin-bottom: 0.5rem;
        }

        .user-dropdown-header span {
            display: block;
            font-size: 0.75rem;
            color: var(--color-main);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .user-dropdown-header strong {
            display: block;
            font-size: 0.9rem;
            color: var(--color-dark);
            margin-top: 0.2rem;
            word-break: break-all;
        }

        .user-dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.7rem 1rem;
            color: var(--color-dark);
            text-decoration: none;
            font-size: 0.85rem;
            border-radius: 8px;
            transition: all var(--transition);
            width: 100%;
            border: none;
            background: none;
            cursor: pointer;
            text-align: left;
        }

        .user-dropdown-item:hover {
            background: var(--color-light-bg);
            color: var(--color-accent);
        }

        .user-dropdown-item svg {
            width: 16px;
            height: 16px;
            opacity: 0.7;
        }

        .user-dropdown-item.logout {
            color: #d93025;
            margin-top: 0.3rem;
            border-top: 1px solid var(--color-border);
            border-radius: 0 0 8px 8px;
        }

        .user-dropdown-item.logout:hover {
            background: #fff5f5;
        }

        /* Actions Group */
        .nav-actions {
            display: flex;
            align-items: center;
            gap: 0.15rem; /* Reduced gap to bring icons closer together */
        }

        .action-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: none;
            color: var(--color-dark);
            cursor: pointer;
            transition: all var(--transition);
            position: relative;
            border-radius: 50%;
        }

        .action-btn:hover {
            color: var(--color-accent);
            transform: translateY(-2px);
        }

        .action-btn:active {
            transform: scale(0.9);
            opacity: 0.7;
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

        /* Modern Minimal Burger Toggle */
        .menu-toggle {
            display: none;
            width: 44px;
            height: 44px;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: none;
            cursor: pointer;
            position: relative;
            border-radius: 50%;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1001;
        }

        .menu-toggle:hover {
            color: var(--color-accent);
            transform: translateY(-2px);
        }

        .menu-toggle:active {
            transform: scale(0.9);
            opacity: 0.7;
        }

        .burger-container {
            width: 22px;
            height: 14px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu-toggle span {
            width: 100%;
            height: 1.5px;
            background: var(--color-dark);
            display: block;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 2px;
            transform-origin: center;
        }

        /* Modern 2-line style (shorter second line) */
        .menu-toggle span:nth-child(2) {
            width: 100%;
            transform: translateY(0);
        }
        
        .menu-toggle span:nth-child(3) {
            width: 60%;
            margin-left: auto;
        }

        .menu-toggle.active .burger-container {
            transform: rotate(180deg);
        }

        .menu-toggle.active span:nth-child(1) {
            transform: translateY(6px) rotate(45deg);
        }

        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
            transform: translateX(-10px);
        }

        .menu-toggle.active span:nth-child(3) {
            width: 100%;
            transform: translateY(-6.5px) rotate(-45deg);
            margin-left: 0;
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

        /* Auth Required Modal */
        .auth-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(47, 39, 22, 0.6);
            backdrop-filter: blur(4px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
        }

        .auth-modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .auth-modal {
            background: var(--color-white);
            width: 90%;
            max-width: 400px;
            border-radius: 16px;
            padding: 2.5rem 2rem;
            text-align: center;
            transform: scale(0.9);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .auth-modal-overlay.active .auth-modal {
            transform: scale(1);
        }

        .auth-modal-icon {
            width: 64px;
            height: 64px;
            background: var(--color-light-bg);
            color: var(--color-accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .auth-modal-icon svg {
            width: 32px;
            height: 32px;
        }

        .auth-modal-title {
            font-family: var(--font-heading);
            font-size: 1.5rem;
            color: var(--color-dark);
            margin-bottom: 0.75rem;
        }

        .auth-modal-text {
            font-size: 0.95rem;
            color: #666;
            line-height: 1.5;
            margin-bottom: 2rem;
        }

        .auth-modal-btns {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .auth-modal-btn {
            padding: 0.875rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            transition: all var(--transition);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .auth-modal-btn.primary {
            background: var(--color-dark);
            color: var(--color-white);
        }

        .auth-modal-btn.primary:hover {
            background: var(--color-accent);
            transform: translateY(-2px);
        }

        .auth-modal-btn.secondary {
            background: transparent;
            color: var(--color-dark);
            border: 1px solid var(--color-border);
        }

        .auth-modal-btn.secondary:hover {
            background: var(--color-light-bg);
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
            position: fixed;
            top: calc(var(--topbar-height) + var(--navbar-height));
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            z-index: 998;
            overflow-y: auto;
            padding: 1rem 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20px);
            transition: 
                opacity 0.4s ease,
                visibility 0.4s ease,
                transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            display: block;
        }

        .mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .mobile-nav-item {
            border-bottom: 1px solid rgba(232, 228, 222, 0.5);
            opacity: 0;
            transform: translateX(-15px);
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .mobile-menu-overlay.active .mobile-nav-item {
            opacity: 1;
            transform: translateX(0);
        }

        /* Staggered animation for menu items */
        .mobile-menu-overlay.active .mobile-nav-item:nth-child(1) { transition-delay: 0.1s; }
        .mobile-menu-overlay.active .mobile-nav-item:nth-child(2) { transition-delay: 0.15s; }
        .mobile-menu-overlay.active .mobile-nav-item:nth-child(3) { transition-delay: 0.2s; }
        .mobile-menu-overlay.active .mobile-nav-item:nth-child(4) { transition-delay: 0.25s; }
        .mobile-menu-overlay.active .mobile-nav-item:nth-child(5) { transition-delay: 0.3s; }

        .mobile-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.4rem 1.75rem;
            color: var(--color-dark);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            background: transparent;
            border: none;
            width: 100%;
            cursor: pointer;
            text-align: left;
            transition: all 0.3s ease;
        }

        .mobile-nav-link:active {
            background: rgba(179, 156, 128, 0.05);
            color: var(--color-accent);
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
            max-height: 0;
            overflow: hidden;
            background: var(--color-light-bg);
            transition: max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-nav-item.open .mobile-submenu {
            max-height: 1000px; /* High enough value for dynamic content */
        }

        .mobile-submenu-section {
            padding: 0.5rem 1.75rem 1.5rem;
        }

        .mobile-submenu-title {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--color-main);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.5rem;
            margin-top: 1rem;
            opacity: 0.8;
        }

        .mobile-submenu a {
            display: block;
            padding: 0.7rem 0;
            color: var(--color-dark);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 400;
            transition: all 0.3s ease;
            border: none;
        }

        .mobile-submenu a:hover,
        .mobile-submenu a:active {
            color: var(--color-accent);
            padding-left: 5px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .menu-toggle {
                display: flex;
            }
            .navbar {
                height: var(--navbar-height);
            }

            .navbar-inner {
                flex-direction: row;
                height: 100%;
                justify-content: space-between;
                padding: 0 1.25rem;
            }

            .navbar-top-row {
                display: contents;
            }

            .logo {
                order: 1;
                margin-bottom: 0;
            }

            .nav-actions {
                order: 2;
                position: static;
                display: flex;
                align-items: center;
                gap: 0.1rem;
            }

            #userAuthSection {
                display: flex;
                align-items: center;
            }

            .user-profile-btn {
                padding: 0;
                width: 40px;
                height: 40px;
                justify-content: center;
                background: transparent;
                border: none;
            }

            .user-profile-btn .user-name,
            .user-profile-btn svg:not(.logo-icon svg) {
                display: none;
            }

            .user-profile-btn:hover {
                color: var(--color-accent);
                transform: translateY(-2px);
            }

            .user-profile-btn:active {
                transform: scale(0.9);
                opacity: 0.7;
            }

            .user-avatar-circle {
                width: 30px;
                height: 30px;
                font-size: 0.75rem;
            }

            .nav-links {
                display: none;
            }

            .page-spacer {
                height: calc(var(--topbar-height) + var(--navbar-height));
            }
        }

        @media (max-width: 480px) {
            .navbar-inner {
                padding: 0 0.75rem;
            }

            .logo-icon {
                width: 30px;
                height: 30px;
            }

            .cart-sidebar, .wishlist-sidebar {
                max-width: 100%;
            }

            .action-btn, .user-profile-btn {
                width: 36px;
                height: 36px;
            }

            .user-avatar-circle {
                width: 26px;
                height: 26px;
                font-size: 0.7rem;
            }

            .action-btn svg {
                width: 18px;
                height: 18px;
            }

            .menu-toggle {
                width: 36px;
                height: 36px;
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
            <div class="navbar-top-row">
                <!-- Logo -->
                <a href="/" class="logo">
                    <div class="logo-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                </a>

                <!-- Actions Group (Auth, Wishlist, Cart, Burger) -->
                <div class="nav-actions">
                    <div id="userAuthSection">
                        <a href="login.php" class="action-btn" id="loginBtnNav" aria-label="Login">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </a>
                    </div>

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
                        <div class="burger-container">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Nav Links (Visible on Desktop, Scrollable on Mobile) -->
            <ul class="nav-links" id="navLinks">
                <li><a href="men-products.php">Men</a></li>
                <li><a href="women-products.php">Women</a></li>
                <li><a href="kids-products.php">Kids</a></li>
                <li><a href="accessories-products.php">Accessories</a></li>
                <li><a href="sale-products.php">Sale</a></li>
            </ul>
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
            <a href="accessories-products.php" class="mobile-nav-link">Accessories</a>
        </div>
        <div class="mobile-nav-item">
            <a href="sale-products.php" class="mobile-nav-link">Sale</a>
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

    <!-- Auth Required Modal -->
    <div class="auth-modal-overlay" id="authModal">
        <div class="auth-modal">
            <div class="auth-modal-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="8.5" cy="7" r="4"></circle>
                    <line x1="20" y1="8" x2="20" y2="14"></line>
                    <line x1="23" y1="11" x2="17" y2="11"></line>
                </svg>
            </div>
            <h3 class="auth-modal-title">Account Required</h3>
            <p class="auth-modal-text">Ju nuk keni një llogari. Ju lutem regjistrohuni ose hyni në llogarinë tuaj për të vazhduar me porosinë.</p>
            <div class="auth-modal-btns">
                <a href="login.php?redirect=checkout.php" class="auth-modal-btn primary">Hyni / Regjistrohuni</a>
                <button class="auth-modal-btn secondary" id="closeAuthModal">Më vonë</button>
            </div>
        </div>
    </div>

    <!-- Page Spacer -->
    <div class="page-spacer"></div>

    <!-- Load Cart Manager -->
    <script src="cart-handler.js"></script>

   <script>
    // BURGER MENU
    document.addEventListener('DOMContentLoaded', () => {
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        if (menuToggle && mobileMenu) {
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

            menuToggle.addEventListener('click', (e) => {
                e.stopPropagation();
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

            // Close when clicking outside
            document.addEventListener('click', (e) => {
                if (mobileMenu.classList.contains('active') && !mobileMenu.contains(e.target) && !menuToggle.contains(e.target)) {
                    closeMobileMenu();
                }
            });
        }

        // Submenu logic
        const mobileNavItems = document.querySelectorAll('.mobile-nav-item[data-has-submenu="true"]');
        mobileNavItems.forEach(item => {
            const btn = item.querySelector('.mobile-nav-link');
            if (btn) {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    item.classList.toggle('open');
                });
            }
        });

        // CART & WISHLIST BUTTONS
        const cartBtn = document.getElementById('cartBtn');
        const wishlistBtn = document.getElementById('wishlistBtn');
        const cartClose = document.getElementById('cartClose');
        const wishlistClose = document.getElementById('wishlistClose');
        const cartOverlay = document.getElementById('cartOverlay');
        const wishlistOverlay = document.getElementById('wishlistOverlay');

        if (cartBtn) cartBtn.addEventListener('click', () => { if (typeof openCart === 'function') openCart(); });
        if (wishlistBtn) wishlistBtn.addEventListener('click', () => { if (typeof openWishlistSidebar === 'function') openWishlistSidebar(); });
        if (cartClose) cartClose.addEventListener('click', () => { if (typeof closeCart === 'function') closeCart(); });
        if (wishlistClose) wishlistClose.addEventListener('click', () => { if (typeof closeWishlistSidebar === 'function') closeWishlistSidebar(); });
        if (cartOverlay) cartOverlay.addEventListener('click', () => { if (typeof closeCart === 'function') closeCart(); });
        if (wishlistOverlay) wishlistOverlay.addEventListener('click', () => { if (typeof closeWishlistSidebar === 'function') closeWishlistSidebar(); });
    });
   </script>
    

</body>
</html>