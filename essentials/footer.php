<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Luxury Footer</title>
    <style>
        /* ========================================
           PREMIUM FOOTER STYLES
           Matches the checkout design aesthetic
           ======================================== */

        /* ========================================
           COLOR PALETTE (Same as checkout)
           ======================================== */
        :root {
            --primary: #2f2716;
            --secondary: #7e5232;
            --accent: #a8845e;
            --bg-light: #c6baa5;
            --bg-soft: #b39c80;
            --text-dark: #2f2716;
            --text-light: #c6baa5;
            --white: #ffffff;
            --shadow-soft: rgba(47, 39, 22, 0.08);
            --shadow-medium: rgba(47, 39, 22, 0.15);
            --shadow-dark: rgba(47, 39, 22, 0.25);
            --transition-smooth: cubic-bezier(0.23, 1, 0.32, 1);
        }

        /* ========================================
           RESET & BASE STYLES
           ======================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cormorant', serif;
            background: var(--white);
            color: var(--text-dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            padding: 60px 40px;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .content-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 20px;
            letter-spacing: 0.5px;
        }

        .content-text {
            font-size: 18px;
            color: var(--secondary);
            max-width: 600px;
            margin-bottom: 30px;
        }

        /* ========================================
           PREMIUM FOOTER CONTAINER
           ======================================== */
        .premium-footer {
            background: linear-gradient(135deg, var(--primary) 0%, #3a3020 100%);
            color: var(--text-light);
            padding: 80px 0 40px;
            position: relative;
            overflow: hidden;
            margin-top: auto;
            border-top: 3px solid var(--accent);
        }

        /* Shimmer Effect */
        .footer-shimmer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, 
                transparent 30%, 
                rgba(168, 132, 94, 0.1) 50%, 
                transparent 70%);
            animation: shimmer 8s infinite linear;
            pointer-events: none;
            z-index: 1;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* ========================================
           FOOTER LAYOUT
           ======================================== */
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
            position: relative;
            z-index: 2;
        }

        .footer-main {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 60px;
            margin-bottom: 60px;
        }

        .footer-section {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s var(--transition-smooth);
        }

        .footer-section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ========================================
           BRAND SECTION
           ======================================== */
        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 600;
            color: var(--text-light);
            margin-bottom: 20px;
            letter-spacing: 1px;
            position: relative;
            display: inline-block;
        }

        .footer-logo::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--accent);
            transition: width 0.4s ease;
        }

        .footer-logo:hover::after {
            width: 100px;
        }

        .footer-tagline {
            font-size: 16px;
            color: var(--bg-light);
            line-height: 1.8;
            margin-bottom: 30px;
            max-width: 300px;
        }

        /* ========================================
           SOCIAL LINKS
           ======================================== */
        .social-links {
            display: flex;
            gap: 20px;
            margin-top: 25px;
        }

        .social-link {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-light);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.4s var(--transition-smooth);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(198, 186, 165, 0.2);
        }

        .social-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: var(--accent);
            transform: scale(0);
            transition: transform 0.4s ease;
        }

        .social-link i {
            position: relative;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .social-link:hover {
            transform: translateY(-3px);
            border-color: var(--accent);
        }

        .social-link:hover::before {
            transform: scale(1);
        }

        .social-link:hover i {
            color: var(--primary);
        }

        /* ========================================
           FOOTER LINKS SECTION
           ======================================== */
        .footer-heading {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--text-light);
            margin-bottom: 25px;
            letter-spacing: 0.5px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 30px;
            height: 1px;
            background: var(--accent);
            transition: width 0.4s ease;
        }

        .footer-section:hover .footer-heading::after {
            width: 50px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-link-item {
            margin-bottom: 12px;
        }

        .footer-link {
            color: var(--bg-light);
            text-decoration: none;
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 0.5px;
            transition: all 0.4s var(--transition-smooth);
            padding: 5px 0;
            display: inline-block;
            position: relative;
        }

        .footer-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--accent);
            transition: width 0.4s ease;
        }

        .footer-link:hover {
            color: var(--accent);
            transform: translateX(8px);
        }

        .footer-link:hover::before {
            width: 30px;
        }

        /* ========================================
           NEWSLETTER SECTION
           ======================================== */
        .newsletter-text {
            font-size: 14px;
            color: var(--bg-light);
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .newsletter-form {
            margin-bottom: 30px;
        }

        .newsletter-input-group {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .newsletter-input {
            flex: 1;
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(198, 186, 165, 0.3);
            color: var(--text-light);
            font-family: 'Cormorant', serif;
            font-size: 15px;
            transition: all 0.4s var(--transition-smooth);
        }

        .newsletter-input:focus {
            outline: none;
            border-color: var(--accent);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 2px rgba(168, 132, 94, 0.2);
        }

        .newsletter-input::placeholder {
            color: rgba(198, 186, 165, 0.6);
        }

        .newsletter-btn {
            background: var(--accent);
            color: var(--primary);
            border: none;
            padding: 0 28px;
            font-family: 'Cormorant', serif;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.4s var(--transition-smooth);
            position: relative;
            overflow: hidden;
            white-space: nowrap;
        }

        .newsletter-btn:hover {
            background: var(--text-light);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(168, 132, 94, 0.4);
        }

        .newsletter-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.7s ease;
        }

        .newsletter-btn:hover::before {
            left: 100%;
        }

        .newsletter-message {
            font-size: 13px;
            padding: 8px 0;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.4s ease;
        }

        .newsletter-message.success {
            color: #9bc53d;
            opacity: 1;
            transform: translateY(0);
        }

        .newsletter-message.error {
            color: #ff6b6b;
            opacity: 1;
            transform: translateY(0);
        }

        /* ========================================
           CONTACT INFO
           ======================================== */
        .contact-info {
            list-style: none;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            transform: translateX(5px);
        }

        .contact-icon {
            color: var(--accent);
            font-size: 18px;
            margin-top: 2px;
            transition: transform 0.3s ease;
        }

        .contact-item:hover .contact-icon {
            transform: scale(1.2) rotate(5deg);
        }

        .contact-details {
            flex: 1;
        }

        .contact-label {
            font-size: 12px;
            color: rgba(198, 186, 165, 0.7);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .contact-value {
            font-size: 16px;
            color: var(--text-light);
            font-weight: 400;
        }

        .contact-value a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-value a:hover {
            color: var(--accent);
        }

        /* ========================================
           FOOTER BOTTOM
           ======================================== */
        .footer-bottom {
            border-top: 1px solid rgba(198, 186, 165, 0.2);
            padding-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .copyright {
            font-size: 14px;
            color: var(--bg-light);
            letter-spacing: 0.5px;
        }

        .footer-legal {
            display: flex;
            gap: 30px;
        }

        .legal-link {
            color: var(--bg-light);
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            position: relative;
        }

        .legal-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--accent);
            transition: width 0.4s ease;
        }

        .legal-link:hover {
            color: var(--accent);
        }

        .legal-link:hover::after {
            width: 100%;
        }

        /* Back to Top Button */
        .back-to-top {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(198, 186, 165, 0.3);
            color: var(--text-light);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.4s var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .back-to-top:hover {
            background: var(--accent);
            color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(168, 132, 94, 0.4);
        }

        .back-to-top i {
            transition: transform 0.4s ease;
        }

        .back-to-top:hover i {
            transform: translateY(-2px);
        }

        /* ========================================
           FOOTER TOAST NOTIFICATION
           ======================================== */
        .footer-toast {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: var(--primary);
            color: var(--text-light);
            padding: 18px 28px;
            border-radius: 2px;
            box-shadow: 0 6px 25px var(--shadow-dark);
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.5s var(--transition-smooth);
            z-index: 10000;
            font-size: 15px;
            font-weight: 400;
            letter-spacing: 0.5px;
            backdrop-filter: blur(10px);
            border-left: 3px solid var(--accent);
            max-width: 400px;
        }

        .footer-toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        .footer-toast.success {
            background: var(--secondary);
            border-left-color: #9bc53d;
        }

        .footer-toast.error {
            background: #8b4513;
            border-left-color: #ff6b6b;
        }

        /* ========================================
           RESPONSIVE DESIGN
           ======================================== */
        @media (max-width: 992px) {
            .footer-main {
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
            }

            .main-content {
                padding: 40px 30px;
            }

            .content-title {
                font-size: 32px;
            }
        }

        @media (max-width: 768px) {
            .premium-footer {
                padding: 60px 0 30px;
            }

            .footer-container {
                padding: 0 30px;
            }

            .footer-main {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
                gap: 25px;
            }

            .footer-legal {
                justify-content: center;
            }

            .back-to-top {
                position: fixed;
                bottom: 20px;
                right: 20px;
                background: var(--accent);
                color: var(--primary);
                box-shadow: 0 4px 15px rgba(168, 132, 94, 0.4);
            }

            .footer-toast {
                right: 20px;
                left: 20px;
                max-width: none;
            }
        }

        @media (max-width: 480px) {
            .premium-footer {
                padding: 50px 0 25px;
            }

            .footer-container {
                padding: 0 20px;
            }

            .footer-logo {
                font-size: 28px;
            }

            .footer-heading {
                font-size: 18px;
            }

            .newsletter-input-group {
                flex-direction: column;
            }

            .newsletter-btn {
                padding: 16px;
                justify-content: center;
            }

            .main-content {
                padding: 30px 20px;
            }

            .content-title {
                font-size: 28px;
            }

            .social-links {
                justify-content: center;
            }
        }

        /* Animation Utilities */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Main Content (Demo) -->
    

    <!-- Premium Footer -->
    <footer class="premium-footer" id="premiumFooter">
        <!-- Shimmer Effect -->
        <div class="footer-shimmer"></div>

        <!-- Footer Container -->
        <div class="footer-container">
            <!-- Main Footer Content -->
            <div class="footer-main">
                <!-- Brand Section -->
                <div class="footer-section" id="brandSection">
                    <h3 class="footer-logo">MONTE CARLO</h3>
                    <p class="footer-tagline">Crafting timeless luxury since 1928. Experience unparalleled quality and sophistication in every detail.</p>
                    
                    <!-- Social Links -->
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Instagram" data-platform="instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Facebook" data-platform="facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Pinterest" data-platform="pinterest">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter" data-platform="twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-section" id="linksSection">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-links">
                        <li class="footer-link-item">
                            <a href="#" class="footer-link">Collections</a>
                        </li>
                        <li class="footer-link-item">
                            <a href="#" class="footer-link">Bespoke Services</a>
                        </li>
                        <li class="footer-link-item">
                            <a href="#" class="footer-link">Showrooms</a>
                        </li>
                        <li class="footer-link-item">
                            <a href="#" class="footer-link">Client Stories</a>
                        </li>
                        <li class="footer-link-item">
                            <a href="#" class="footer-link">Press & Media</a>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter & Contact -->
                <div class="footer-section" id="newsletterSection">
                    <h4 class="footer-heading">Stay Informed</h4>
                    <p class="newsletter-text">Subscribe to our newsletter for exclusive previews and private events.</p>
                    
                    <!-- Newsletter Form -->
                    <form class="newsletter-form" id="newsletterForm">
                        <div class="newsletter-input-group">
                            <input type="email" 
                                   class="newsletter-input" 
                                   placeholder="Your email address" 
                                   required
                                   aria-label="Email address for newsletter">
                            <button type="submit" class="newsletter-btn" aria-label="Subscribe to newsletter">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                        <div class="newsletter-message" id="newsletterMessage"></div>
                    </form>

                    <!-- Contact Info -->
                    <ul class="contact-info">
                        <li class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <div class="contact-label">By Appointment</div>
                                <div class="contact-value">+1 (212) 555-0189</div>
                            </div>
                        </li>
                        <li class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <div class="contact-label">Correspondence</div>
                                <div class="contact-value">
                                    <a href="mailto:atelier@montecarlo.com">atelier@montecarlo.com</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="copyright">
                    &copy; 2024 MONTE CARLO. All rights reserved.
                </div>
                
                <div class="footer-legal">
                    <a href="#" class="legal-link">Privacy Policy</a>
                    <a href="#" class="legal-link">Terms of Service</a>
                    <a href="#" class="legal-link">Cookie Policy</a>
                </div>

                <button class="back-to-top" id="backToTop" aria-label="Back to top">
                    <i class="fas fa-chevron-up"></i>
                </button>
            </div>
        </div>

        <!-- Toast Notification -->
        <div class="footer-toast" id="footerToast">
            <span id="footerToastMessage">Successfully subscribed to newsletter</span>
        </div>
    </footer>

    <script>
        // ========================================
        // PREMIUM FOOTER JAVASCRIPT
        // ========================================
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const backToTopBtn = document.getElementById('backToTop');
            const newsletterForm = document.getElementById('newsletterForm');
            const newsletterMessage = document.getElementById('newsletterMessage');
            const footerToast = document.getElementById('footerToast');
            const footerToastMessage = document.getElementById('footerToastMessage');
            const footerSections = document.querySelectorAll('.footer-section');
            const socialLinks = document.querySelectorAll('.social-link');
            const footerLinks = document.querySelectorAll('.footer-link');
            const contactItems = document.querySelectorAll('.contact-item');

            // ========================================
            // BACK TO TOP FUNCTIONALITY
            // ========================================
            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
                
                // Add click animation
                this.style.transform = 'translateY(-5px) scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 300);
            });

            // Show/hide back to top button
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopBtn.style.opacity = '1';
                    backToTopBtn.style.visibility = 'visible';
                    backToTopBtn.style.transform = 'translateY(0)';
                } else {
                    backToTopBtn.style.opacity = '0';
                    backToTopBtn.style.visibility = 'hidden';
                    backToTopBtn.style.transform = 'translateY(10px)';
                }
            });

            // ========================================
            // NEWSLETTER FORM
            // ========================================
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const emailInput = this.querySelector('.newsletter-input');
                const email = emailInput.value.trim();
                
                // Reset message
                newsletterMessage.className = 'newsletter-message';
                newsletterMessage.textContent = '';
                
                // Validation
                if (!email) {
                    showMessage('Please enter your email address.', 'error');
                    return;
                }
                
                if (!isValidEmail(email)) {
                    showMessage('Please enter a valid email address.', 'error');
                    return;
                }
                
                // Simulate API call
                showMessage('Subscribing...', '');
                
                setTimeout(() => {
                    // Success simulation
                    emailInput.value = '';
                    showMessage('Thank you for subscribing to our newsletter.', 'success');
                    
                    // Show toast
                    showToast('Successfully subscribed to our exclusive newsletter.');
                    
                    // Form animation
                    newsletterForm.style.transform = 'translateY(-5px)';
                    setTimeout(() => {
                        newsletterForm.style.transform = '';
                    }, 300);
                }, 1500);
            });

            function isValidEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }

            function showMessage(text, type) {
                newsletterMessage.textContent = text;
                newsletterMessage.className = 'newsletter-message';
                
                if (type) {
                    setTimeout(() => {
                        newsletterMessage.classList.add(type);
                    }, 10);
                }
            }

            // ========================================
            // TOAST NOTIFICATION
            // ========================================
            function showToast(message, type = 'success') {
                footerToastMessage.textContent = message;
                footerToast.className = 'footer-toast';
                footerToast.classList.add(type);
                
                setTimeout(() => {
                    footerToast.classList.add('show');
                }, 10);
                
                // Auto hide
                setTimeout(() => {
                    footerToast.classList.remove('show');
                }, 5000);
            }

            // ========================================
            // ANIMATE FOOTER SECTIONS
            // ========================================
            function animateFooterSections() {
                footerSections.forEach((section, index) => {
                    const sectionTop = section.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    
                    if (sectionTop < windowHeight - 100) {
                        setTimeout(() => {
                            section.classList.add('visible');
                        }, index * 200);
                    }
                });
            }

            // Initial animation
            animateFooterSections();
            window.addEventListener('scroll', animateFooterSections);

            // ========================================
            // SOCIAL LINKS INTERACTION
            // ========================================
            socialLinks.forEach((link, index) => {
                link.style.transitionDelay = `${index * 0.05}s`;
                
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Animation
                    this.style.transform = 'translateY(-3px) scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = 'translateY(-3px) scale(1)';
                    }, 150);
                    
                    // Toast notification
                    const platform = this.getAttribute('data-platform') || 'social media';
                    showToast(`Opening ${platform}...`, 'success');
                });
            });

            // ========================================
            // FOOTER LINKS ENHANCEMENT
            // ========================================
            footerLinks.forEach(link => {
                link.addEventListener('mouseenter', function() {
                    this.style.transitionDelay = '0s';
                });
                
                link.addEventListener('mouseleave', function() {
                    this.style.transitionDelay = '0.1s';
                });
                
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    showToast(`Navigating to ${this.textContent}...`, 'success');
                });
            });

            // ========================================
            // CONTACT ITEMS INTERACTION
            // ========================================
            contactItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    const icon = this.querySelector('.contact-icon');
                    icon.style.transform = 'scale(1.2) rotate(5deg)';
                });
                
                item.addEventListener('mouseleave', function() {
                    const icon = this.querySelector('.contact-icon');
                    icon.style.transform = '';
                });
            });

            // ========================================
            // LEGAL LINKS
            // ========================================
            const legalLinks = document.querySelectorAll('.legal-link');
            legalLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    showToast(`Opening ${this.textContent}...`, 'success');
                });
            });

            // ========================================
            // INITIALIZATION
            // ========================================
            setTimeout(() => {
                footerSections.forEach((section, index) => {
                    setTimeout(() => {
                        section.classList.add('visible');
                    }, index * 200);
                });
            }, 500);

            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && footerToast.classList.contains('show')) {
                    footerToast.classList.remove('show');
                }
            });

            // Expose showToast globally
            window.showFooterToast = function(message, type = 'success') {
                showToast(message, type);
            };
        });
    </script>
</body>
</html>