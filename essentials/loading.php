<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://public-frontend-cos.metadl.com/mgx/img/favicon_atoms.ico" type="image/x-icon">
    <title>Luxury Collection</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Cormorant+Garamond:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cormorant Garamond', serif;
            background: #2F2716;
        }

        /* Loading Screen */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: linear-gradient(135deg, #2F2716 0%, #7E5232 20%, #A8845E 40%, #C6BAA5 60%, #B39C80 80%, #C6BAA5 100%);
            background-size: 400% 400%;
            animation: gradientShift 20s ease infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .loading-screen.fade-out {
            opacity: 0;
            pointer-events: none;
        }

        /* Animated Background Particles */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 15s infinite ease-in-out;
        }

        .particle:nth-child(1) { left: 10%; top: 20%; animation-delay: 0s; animation-duration: 12s; }
        .particle:nth-child(2) { left: 20%; top: 80%; animation-delay: 2s; animation-duration: 15s; }
        .particle:nth-child(3) { left: 30%; top: 40%; animation-delay: 4s; animation-duration: 18s; }
        .particle:nth-child(4) { left: 40%; top: 60%; animation-delay: 1s; animation-duration: 14s; }
        .particle:nth-child(5) { left: 50%; top: 30%; animation-delay: 3s; animation-duration: 16s; }
        .particle:nth-child(6) { left: 60%; top: 70%; animation-delay: 5s; animation-duration: 13s; }
        .particle:nth-child(7) { left: 70%; top: 50%; animation-delay: 2.5s; animation-duration: 17s; }
        .particle:nth-child(8) { left: 80%; top: 25%; animation-delay: 4.5s; animation-duration: 15s; }
        .particle:nth-child(9) { left: 90%; top: 85%; animation-delay: 1.5s; animation-duration: 19s; }
        .particle:nth-child(10) { left: 15%; top: 55%; animation-delay: 3.5s; animation-duration: 14s; }

        /* Geometric Background Pattern */
        .geometric-pattern {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(30deg, transparent 40%, rgba(255,255,255,.02) 40%, rgba(255,255,255,.02) 60%, transparent 60%),
                linear-gradient(60deg, transparent 40%, rgba(255,255,255,.02) 40%, rgba(255,255,255,.02) 60%, transparent 60%),
                linear-gradient(90deg, transparent 40%, rgba(255,255,255,.02) 40%, rgba(255,255,255,.02) 60%, transparent 60%);
            background-size: 80px 140px, 80px 140px, 80px 140px;
            background-position: 0 0, 40px 70px, 80px 140px;
            opacity: 0.5;
            animation: patternShift 30s linear infinite;
        }

        /* Multiple Glow Effects */
        .glow-effect {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(198, 186, 165, 0.4) 0%, rgba(168, 132, 94, 0.2) 30%, transparent 70%);
            animation: pulseGlow 6s ease-in-out infinite;
            pointer-events: none;
        }

        .glow-effect-secondary {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(126, 82, 50, 0.3) 0%, transparent 60%);
            animation: pulseGlow 8s ease-in-out infinite reverse;
            pointer-events: none;
        }

        /* Loading Content */
        .loading-content {
            text-align: center;
            z-index: 10;
            animation: contentFadeIn 1.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        /* Decorative Frame */
        .decorative-frame {
            position: relative;
            padding: 4rem 3rem;
        }

        .decorative-frame::before,
        .decorative-frame::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 100px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .decorative-frame::before {
            top: 0;
            left: 0;
            border-right: none;
            border-bottom: none;
            animation: frameExpand 2s ease-out;
        }

        .decorative-frame::after {
            bottom: 0;
            right: 0;
            border-left: none;
            border-top: none;
            animation: frameExpand 2s ease-out 0.3s backwards;
        }

        /* Monogram Container with Enhanced Effects */
        .logo-container {
            position: relative;
            margin-bottom: 2.5rem;
            animation: floatBounce 4s ease-in-out infinite;
        }

        .monogram-wrapper {
            position: relative;
            display: inline-block;
        }

        .monogram {
            font-family: 'Playfair Display', serif;
            font-size: 6rem;
            font-weight: 700;
            color: #FFFFFF;
            text-shadow: 
                0 0 40px rgba(198, 186, 165, 0.6),
                0 0 80px rgba(198, 186, 165, 0.4),
                0 5px 15px rgba(0, 0, 0, 0.3);
            letter-spacing: 0.4rem;
            position: relative;
            background: linear-gradient(135deg, #FFFFFF 0%, #F5F5F5 50%, #FFFFFF 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmerText 3s ease-in-out infinite;
        }

        /* Ornamental Lines */
        .ornamental-line {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
            animation: lineGrow 2s ease-out;
        }

        .ornamental-line.top {
            top: -30px;
            width: 150px;
        }

        .ornamental-line.bottom {
            bottom: -30px;
            width: 150px;
            animation-delay: 0.3s;
        }

        /* Decorative Corners */
        .corner-ornament {
            position: absolute;
            width: 20px;
            height: 20px;
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .corner-ornament.top-left {
            top: -40px;
            left: -40px;
            border-right: none;
            border-bottom: none;
            animation: cornerFade 2s ease-out;
        }

        .corner-ornament.top-right {
            top: -40px;
            right: -40px;
            border-left: none;
            border-bottom: none;
            animation: cornerFade 2s ease-out 0.2s backwards;
        }

        .corner-ornament.bottom-left {
            bottom: -40px;
            left: -40px;
            border-right: none;
            border-top: none;
            animation: cornerFade 2s ease-out 0.4s backwards;
        }

        .corner-ornament.bottom-right {
            bottom: -40px;
            right: -40px;
            border-left: none;
            border-top: none;
            animation: cornerFade 2s ease-out 0.6s backwards;
        }

        /* Brand Name with Enhanced Typography */
        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 500;
            color: #FFFFFF;
            letter-spacing: 0.6rem;
            margin-bottom: 0.8rem;
            text-shadow: 0 3px 15px rgba(0, 0, 0, 0.4);
            animation: fadeInUp 1.5s ease-out 0.5s backwards;
        }

        .tagline {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1rem;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.9);
            letter-spacing: 0.25rem;
            margin-bottom: 3.5rem;
            font-style: italic;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1.5s ease-out 0.8s backwards;
        }

        /* Enhanced Loading Dots */
        .loading-dots {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.2rem;
            animation: fadeInUp 1.5s ease-out 1.1s backwards;
        }

        .dot {
            width: 12px;
            height: 12px;
            background: linear-gradient(135deg, #FFFFFF, #F0F0F0);
            border-radius: 50%;
            box-shadow: 
                0 0 25px rgba(198, 186, 165, 0.9),
                0 0 50px rgba(198, 186, 165, 0.5),
                inset 0 0 10px rgba(255, 255, 255, 0.5);
            animation: shimmerDot 1.8s ease-in-out infinite;
            position: relative;
        }

        .dot::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.3), transparent);
            animation: ripple 1.8s ease-in-out infinite;
        }

        .dot:nth-child(1) {
            animation-delay: 0s;
        }

        .dot:nth-child(1)::after {
            animation-delay: 0s;
        }

        .dot:nth-child(2) {
            animation-delay: 0.4s;
        }

        .dot:nth-child(2)::after {
            animation-delay: 0.4s;
        }

        .dot:nth-child(3) {
            animation-delay: 0.8s;
        }

        .dot:nth-child(3)::after {
            animation-delay: 0.8s;
        }

        /* Main Content */
        .main-content {
            opacity: 0;
            transition: opacity 2s cubic-bezier(0.4, 0, 0.2, 1) 0.5s;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #F5F5F5 0%, #E8E8E8 100%);
        }

        .main-content.show {
            opacity: 1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
            text-align: center;
        }

        .container h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            color: #2F2716;
            margin-bottom: 1.5rem;
            letter-spacing: 0.1rem;
        }

        .container p {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            color: #7E5232;
            letter-spacing: 0.05rem;
        }

        /* Animations */
        @keyframes gradientShift {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0);
                opacity: 0.3;
            }
            50% {
                transform: translate(30px, -30px);
                opacity: 0.8;
            }
        }

        @keyframes patternShift {
            0% {
                background-position: 0 0, 40px 70px, 80px 140px;
            }
            100% {
                background-position: 80px 140px, 120px 210px, 160px 280px;
            }
        }

        @keyframes pulseGlow {
            0%, 100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.4;
            }
            50% {
                transform: translate(-50%, -50%) scale(1.15);
                opacity: 0.6;
            }
        }

        @keyframes floatBounce {
            0%, 100% {
                transform: translateY(0px);
            }
            25% {
                transform: translateY(-20px);
            }
            50% {
                transform: translateY(-10px);
            }
            75% {
                transform: translateY(-20px);
            }
        }

        @keyframes shimmerText {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        @keyframes shimmerDot {
            0%, 100% {
                opacity: 0.4;
                transform: scale(0.9);
                box-shadow: 
                    0 0 25px rgba(198, 186, 165, 0.9),
                    0 0 50px rgba(198, 186, 165, 0.5),
                    inset 0 0 10px rgba(255, 255, 255, 0.5);
            }
            50% {
                opacity: 1;
                transform: scale(1.3);
                box-shadow: 
                    0 0 35px rgba(198, 186, 165, 1),
                    0 0 70px rgba(198, 186, 165, 0.7),
                    inset 0 0 15px rgba(255, 255, 255, 0.8);
            }
        }

        @keyframes ripple {
            0% {
                width: 20px;
                height: 20px;
                opacity: 0.6;
            }
            100% {
                width: 40px;
                height: 40px;
                opacity: 0;
            }
        }

        @keyframes contentFadeIn {
            0% {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes lineGrow {
            0% {
                width: 0;
                opacity: 0;
            }
            100% {
                width: 150px;
                opacity: 1;
            }
        }

        @keyframes cornerFade {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes frameExpand {
            0% {
                width: 0;
                height: 0;
                opacity: 0;
            }
            100% {
                width: 100px;
                height: 100px;
                opacity: 1;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .monogram {
                font-size: 4rem;
                letter-spacing: 0.3rem;
            }

            .ornamental-line.top,
            .ornamental-line.bottom {
                width: 100px;
            }

            .brand-name {
                font-size: 1.5rem;
                letter-spacing: 0.4rem;
            }

            .tagline {
                font-size: 0.9rem;
                letter-spacing: 0.2rem;
            }

            .glow-effect {
                width: 500px;
                height: 500px;
            }

            .glow-effect-secondary {
                width: 400px;
                height: 400px;
            }

            .decorative-frame {
                padding: 3rem 2rem;
            }

            .decorative-frame::before,
            .decorative-frame::after {
                width: 60px;
                height: 60px;
            }

            .container h1 {
                font-size: 2.5rem;
            }

            .container p {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 480px) {
            .monogram {
                font-size: 3rem;
                letter-spacing: 0.2rem;
            }

            .ornamental-line.top,
            .ornamental-line.bottom {
                width: 80px;
            }

            .brand-name {
                font-size: 1.2rem;
                letter-spacing: 0.3rem;
            }

            .tagline {
                font-size: 0.8rem;
                letter-spacing: 0.15rem;
            }

            .dot {
                width: 10px;
                height: 10px;
            }

            .glow-effect {
                width: 350px;
                height: 350px;
            }

            .glow-effect-secondary {
                width: 280px;
                height: 280px;
            }

            .decorative-frame {
                padding: 2rem 1.5rem;
            }

            .decorative-frame::before,
            .decorative-frame::after {
                width: 40px;
                height: 40px;
            }

            .corner-ornament {
                width: 15px;
                height: 15px;
            }

            .corner-ornament.top-left,
            .corner-ornament.top-right {
                top: -30px;
            }

            .corner-ornament.bottom-left,
            .corner-ornament.bottom-right {
                bottom: -30px;
            }

            .corner-ornament.top-left,
            .corner-ornament.bottom-left {
                left: -30px;
            }

            .corner-ornament.top-right,
            .corner-ornament.bottom-right {
                right: -30px;
            }

            .container h1 {
                font-size: 2rem;
            }

            .container p {
                font-size: 1rem;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #C6BAA5;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #7E5232, #A8845E);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #A8845E, #B39C80);
        }

        * {
            scrollbar-width: thin;
            scrollbar-color: #7E5232 #C6BAA5;
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <!-- Animated Particles -->
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>

        <!-- Geometric Pattern -->
        <div class="geometric-pattern"></div>

        <!-- Glow Effects -->
        <div class="glow-effect"></div>
        <div class="glow-effect-secondary"></div>

        <!-- Loading Content -->
        <div class="loading-content">
            <div class="decorative-frame">
                <div class="logo-container">
                    <div class="monogram-wrapper">
                        <!-- Corner Ornaments -->
                        <div class="corner-ornament top-left"></div>
                        <div class="corner-ornament top-right"></div>
                        <div class="corner-ornament bottom-left"></div>
                        <div class="corner-ornament bottom-right"></div>

                        <!-- Ornamental Lines -->
                        <div class="ornamental-line top"></div>
                        <div class="monogram">LC</div>
                        <div class="ornamental-line bottom"></div>
                    </div>
                </div>

                <!-- Brand Name -->
                <h1 class="brand-name">LUXURY COLLECTION</h1>
                <p class="tagline">Timeless Elegance Since 1892</p>

                <!-- Loading Dots -->
                <div class="loading-dots">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    

    <script>
        // Professional Loading Screen Logic
        (function() {
            'use strict';

            const loadingScreen = document.getElementById('loadingScreen');
            const mainContent = document.getElementById('mainContent');
            const loadingDuration = 4000; // 4 seconds for premium feel
            const fadeOutDuration = 2000; // 2 seconds fade out

            // Ensure smooth loading experience
            window.addEventListener('load', function() {
                setTimeout(function() {
                    // Start fade-out animation
                    loadingScreen.classList.add('fade-out');

                    // Show main content after fade-out begins
                    setTimeout(function() {
                        mainContent.classList.add('show');
                        document.body.style.overflow = 'auto';
                    }, 500);

                    // Remove loading screen from DOM after animation completes
                    setTimeout(function() {
                        loadingScreen.style.display = 'none';
                    }, fadeOutDuration);

                }, loadingDuration);
            });

            // Handle page visibility changes
            document.addEventListener('visibilitychange', function() {
                if (!document.hidden) {
                    console.log('Luxury experience active');
                }
            });

            // Prevent right-click on loading screen for premium feel
            loadingScreen.addEventListener('contextmenu', function(e) {
                e.preventDefault();
            });

            // Add subtle interaction feedback
            const dots = document.querySelectorAll('.dot');
            dots.forEach(function(dot, index) {
                dot.style.animationDelay = (index * 0.4) + 's';
            });

            console.log('Premium luxury loading experience initialized');
        })();
    </script>
</body>

</html>