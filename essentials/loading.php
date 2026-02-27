<!-- Loreno Loading Screen Component -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">

<style>
    /* Scope all loading styles to prevent leakage */
    #loreno-loading-wrapper {
        position: fixed;
        inset: 0;
        z-index: 99999;
        background-color: #1E1A14;
        width: 100%;
        height: 100%;
    }

    #loreno-loading-wrapper .loading-screen {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #1E1A14;
        overflow: hidden;
        opacity: 1;
        transition: opacity 1.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    #loreno-loading-wrapper .loading-screen.fade-out {
        opacity: 0;
        pointer-events: none;
    }

    #loreno-loading-wrapper .loading-screen.hidden {
        display: none;
    }

    /* Background layers */
    #loreno-loading-wrapper .loading-bg-warm {
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at 50% 40%, rgba(168, 132, 94, 0.04) 0%, transparent 60%);
    }

    #loreno-loading-wrapper .loading-bg-vignette {
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at center, transparent 0%, rgba(0, 0, 0, 0.5) 100%);
    }

    /* Corner accents */
    #loreno-loading-wrapper .corner-accent {
        position: absolute;
        background-color: rgba(168, 132, 94, 0.2);
        transition: all 1.8s cubic-bezier(0.25, 0.1, 0.25, 1) 0.8s;
    }

    #loreno-loading-wrapper .corner-tl-h {
        top: 8%;
        left: 8%;
        height: 1px;
        width: 0;
    }

    #loreno-loading-wrapper .corner-tl-v {
        top: 8%;
        left: 8%;
        width: 1px;
        height: 0;
    }

    #loreno-loading-wrapper .corner-br-h {
        bottom: 8%;
        right: 8%;
        height: 1px;
        width: 0;
    }

    #loreno-loading-wrapper .corner-br-v {
        bottom: 8%;
        right: 8%;
        width: 1px;
        height: 0;
    }

    #loreno-loading-wrapper .loading-screen.visible .corner-tl-h,
    #loreno-loading-wrapper .loading-screen.visible .corner-br-h {
        width: 40px;
    }

    #loreno-loading-wrapper .loading-screen.visible .corner-tl-v,
    #loreno-loading-wrapper .loading-screen.visible .corner-br-v {
        height: 40px;
    }

    /* Main content wrapper */
    #loreno-loading-wrapper .loading-content {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Ornament row */
    #loreno-loading-wrapper .ornament-row {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 40px;
        opacity: 0;
        transition: opacity 1.5s cubic-bezier(0.4, 0, 0.2, 1) 0.3s;
    }

    #loreno-loading-wrapper .loading-screen.visible .ornament-row {
        opacity: 1;
    }

    #loreno-loading-wrapper .ornament-line {
        height: 1px;
        width: 0;
        background-color: #A8845E;
        transition: width 1.6s cubic-bezier(0.25, 0.1, 0.25, 1) 0.6s;
    }

    #loreno-loading-wrapper .loading-screen.visible .ornament-line {
        width: 50px;
    }

    #loreno-loading-wrapper .ornament-diamond {
        width: 4px;
        height: 4px;
        background-color: #A8845E;
        transform: rotate(45deg);
        flex-shrink: 0;
        opacity: 0;
        transition: opacity 0.8s ease 1.4s;
    }

    #loreno-loading-wrapper .loading-screen.visible .ornament-diamond {
        opacity: 1;
    }

    /* Brand name */
    #loreno-loading-wrapper .loading-brand {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(2.8rem, 10vw, 6rem);
        font-weight: 400;
        color: #C6BAA5;
        letter-spacing: 0.3em;
        line-height: 1;
        margin-right: -0.3em;
        text-align: center;
        opacity: 0;
        transform: translateY(12px);
        transition: opacity 2s cubic-bezier(0.25, 0.1, 0.25, 1) 0.1s, transform 2s cubic-bezier(0.25, 0.1, 0.25, 1) 0.1s;
    }

    #loreno-loading-wrapper .loading-screen.visible .loading-brand {
        opacity: 1;
        transform: translateY(0);
    }

    /* Separator */
    #loreno-loading-wrapper .loading-separator {
        margin-top: 24px;
        margin-bottom: 20px;
        width: 0%;
        max-width: 280px;
        height: 1px;
        background: linear-gradient(90deg, transparent 0%, rgba(168, 132, 94, 0.35) 30%, rgba(168, 132, 94, 0.35) 70%, transparent 100%);
        transition: width 1.8s cubic-bezier(0.25, 0.1, 0.25, 1) 0.8s;
    }

    #loreno-loading-wrapper .loading-screen.visible .loading-separator {
        width: 100%;
    }

    /* Tagline */
    #loreno-loading-wrapper .loading-tagline {
        font-family: 'Cormorant Garamond', Georgia, serif;
        font-size: clamp(0.65rem, 1.5vw, 0.8rem);
        font-weight: 400;
        color: #B39C80;
        text-transform: uppercase;
        letter-spacing: 0.35em;
        margin-right: -0.35em;
        text-align: center;
        opacity: 0;
        transition: opacity 1.5s cubic-bezier(0.4, 0, 0.2, 1) 1.2s;
    }

    #loreno-loading-wrapper .loading-screen.visible .loading-tagline {
        opacity: 1;
    }

    /* Est. year */
    #loreno-loading-wrapper .loading-est {
        font-family: 'Cormorant Garamond', Georgia, serif;
        font-size: clamp(0.55rem, 1.2vw, 0.65rem);
        font-weight: 300;
        font-style: italic;
        color: rgba(179, 156, 128, 0.5);
        letter-spacing: 0.5em;
        margin-right: -0.5em;
        margin-top: 8px;
        text-align: center;
        opacity: 0;
        transition: opacity 1.5s cubic-bezier(0.4, 0, 0.2, 1) 1.5s;
    }

    #loreno-loading-wrapper .loading-screen.visible .loading-est {
        opacity: 1;
    }

    /* Progress bar */
    #loreno-loading-wrapper .loading-progress-wrap {
        margin-top: 56px;
        display: flex;
        flex-direction: column;
        align-items: center;
        opacity: 0;
        transition: opacity 1s cubic-bezier(0.4, 0, 0.2, 1) 1.6s;
    }

    #loreno-loading-wrapper .loading-screen.visible .loading-progress-wrap {
        opacity: 1;
    }

    #loreno-loading-wrapper .loading-progress-track {
        width: 140px;
        height: 1px;
        background-color: rgba(168, 132, 94, 0.12);
        overflow: hidden;
        position: relative;
    }

    #loreno-loading-wrapper .loading-progress-bar {
        width: 0%;
        height: 100%;
        background-color: #A8845E;
        transition: width 0.15s linear;
        box-shadow: 0 0 8px rgba(168, 132, 94, 0.3);
    }

    #loreno-loading-wrapper .loading-progress-number {
        font-family: 'Cormorant Garamond', Georgia, serif;
        font-size: 0.6rem;
        font-weight: 300;
        color: rgba(179, 156, 128, 0.35);
        letter-spacing: 0.3em;
        margin-top: 16px;
        text-align: center;
    }
</style>

<div id="loreno-loading-wrapper">
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-bg-warm"></div>
        <div class="loading-bg-vignette"></div>

        <!-- Corner accents -->
        <div class="corner-accent corner-tl-h"></div>
        <div class="corner-accent corner-tl-v"></div>
        <div class="corner-accent corner-br-h"></div>
        <div class="corner-accent corner-br-v"></div>

        <!-- Center content -->
        <div class="loading-content">
            <!-- Top ornament -->
            <div class="ornament-row">
                <div class="ornament-line"></div>
                <div class="ornament-diamond"></div>
                <div class="ornament-line"></div>
            </div>

            <!-- Brand -->
            <h1 class="loading-brand">LORENO</h1>

            <!-- Separator -->
            <div class="loading-separator"></div>

            <!-- Tagline -->
            <p class="loading-tagline">Quiet Luxury, Timeless Heritage</p>

            <!-- Est. year -->
            <p class="loading-est">Est. 1892</p>

            <!-- Progress -->
            <div class="loading-progress-wrap">
                <div class="loading-progress-track">
                    <div class="loading-progress-bar" id="progressBar"></div>
                </div>
                <p class="loading-progress-number" id="progressNumber">0</p>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        'use strict';

        var wrapper = document.getElementById('loreno-loading-wrapper');
        var screen = document.getElementById('loadingScreen');
        var bar = document.getElementById('progressBar');
        var num = document.getElementById('progressNumber');

        // Prevent scrolling while loading
        document.body.style.overflow = 'hidden';

        var progress = 0;
        var progressInterval = null;

        // Phase 1: Start transitions
        setTimeout(function() {
            if (screen) screen.classList.add('visible');
        }, 200);

        // Phase 2: Progress bar
        progressInterval = setInterval(function() {
            if (progress >= 100) {
                clearInterval(progressInterval);
                return;
            }
            var remaining = 100 - progress;
            var increment = Math.max(0.3, remaining * 0.025);
            progress = Math.min(100, progress + increment);
            if (bar) bar.style.width = progress + '%';
            if (num) num.textContent = Math.round(progress);
        }, 30);

        // Phase 3: Completion
        setTimeout(function() {
            progress = 100;
            if (bar) bar.style.width = '100%';
            if (num) num.textContent = '100';
            clearInterval(progressInterval);

            setTimeout(function() {
                if (screen) screen.classList.add('fade-out');

                setTimeout(function() {
                    document.body.style.overflow = 'auto';
                    if (wrapper) wrapper.style.display = 'none';
                }, 500);

                setTimeout(function() {
                    if (wrapper && wrapper.parentNode) {
                        wrapper.parentNode.removeChild(wrapper);
                    }
                }, 1800);
            }, 400);
        }, 4000);
    })();
</script>