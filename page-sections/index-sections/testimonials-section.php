<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client Reviews</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    /* ========================================
       LUXE REVIEWS - CUSTOM STYLES
       Unique class prefix: rvw-
    ======================================== */

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, sans-serif;
      background-color: #faf8f5;
      color: #2f2716;
      line-height: 1.6;
    }

    /* Color Variables */
    :root {
      --rvw-taupe: #b39c80;
      --rvw-sand: #c6baa5;
      --rvw-camel: #a8845e;
      --rvw-coffee: #7e5232;
      --rvw-espresso: #2f2716;
      --rvw-cream: #faf8f5;
      --rvw-white: #ffffff;
    }

    /* Section Container */
    .rvw-section {
      padding: 100px 24px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    /* Decorative Background Elements */
    .rvw-bg-shape {
      position: absolute;
      border-radius: 50%;
      opacity: 0.15;
      pointer-events: none;
    }

    .rvw-bg-shape--one {
      width: 400px;
      height: 400px;
      background: var(--rvw-taupe);
      top: -100px;
      left: -150px;
      filter: blur(80px);
    }

    .rvw-bg-shape--two {
      width: 300px;
      height: 300px;
      background: var(--rvw-camel);
      bottom: -50px;
      right: -100px;
      filter: blur(60px);
    }

    /* Section Header */
    .rvw-header {
      text-align: center;
      margin-bottom: 60px;
      position: relative;
      z-index: 1;
    }

    .rvw-label {
      font-family: 'Inter', sans-serif;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--rvw-camel);
      margin-bottom: 16px;
      display: block;
    }

    .rvw-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(36px, 6vw, 56px);
      font-weight: 500;
      color: var(--rvw-espresso);
      letter-spacing: -0.02em;
      line-height: 1.1;
    }

    .rvw-title span {
      font-style: italic;
      color: var(--rvw-coffee);
    }

    /* Cards Container */
    .rvw-cards-wrapper {
      display: flex;
      gap: 32px;
      max-width: 1200px;
      width: 100%;
      justify-content: center;
      align-items: stretch;
      position: relative;
      z-index: 1;
      flex-wrap: wrap;
    }

    /* Individual Card */
    .rvw-card {
      flex: 1;
      min-width: 300px;
      max-width: 380px;
      background: var(--rvw-white);
      border-radius: 24px;
      padding: 40px 32px;
      position: relative;
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      border: 1px solid rgba(179, 156, 128, 0.15);
      display: flex;
      flex-direction: column;
      opacity: 0;
      transform: translateY(30px);
      animation: rvw-fadeIn 0.6s ease forwards;
    }

    .rvw-card:nth-child(1) { animation-delay: 0.1s; }
    .rvw-card:nth-child(2) { animation-delay: 0.25s; }
    .rvw-card:nth-child(3) { animation-delay: 0.4s; }

    @keyframes rvw-fadeIn {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .rvw-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 60px rgba(47, 39, 22, 0.12);
    }

    /* Featured Card (Middle) */
    .rvw-card--featured {
      background: linear-gradient(160deg, var(--rvw-espresso) 0%, var(--rvw-coffee) 100%);
      border: none;
      transform: scale(1.05) translateY(30px);
      box-shadow: 0 30px 80px rgba(47, 39, 22, 0.25);
    }

    .rvw-card--featured:hover {
      transform: scale(1.05) translateY(-8px);
      box-shadow: 0 40px 100px rgba(47, 39, 22, 0.35);
    }

    @keyframes rvw-fadeInFeatured {
      to {
        opacity: 1;
        transform: scale(1.05) translateY(0);
      }
    }

    .rvw-card--featured {
      animation: rvw-fadeInFeatured 0.6s ease forwards;
      animation-delay: 0.25s;
    }

    .rvw-card--featured .rvw-card-quote,
    .rvw-card--featured .rvw-card-text,
    .rvw-card--featured .rvw-author-name,
    .rvw-card--featured .rvw-author-role {
      color: var(--rvw-cream);
    }

    .rvw-card--featured .rvw-card-quote {
      color: var(--rvw-sand);
    }

    .rvw-card--featured .rvw-author-role {
      color: var(--rvw-taupe);
    }

    .rvw-card--featured .rvw-stars svg {
      fill: var(--rvw-sand);
    }

    /* Quote Icon */
    .rvw-card-quote {
      font-family: 'Cormorant Garamond', serif;
      font-size: 72px;
      line-height: 1;
      color: var(--rvw-sand);
      margin-bottom: 8px;
      opacity: 0.6;
    }

    /* Stars Rating */
    .rvw-stars {
      display: flex;
      gap: 4px;
      margin-bottom: 20px;
    }

    .rvw-stars svg {
      width: 18px;
      height: 18px;
      fill: var(--rvw-camel);
    }

    /* Review Text */
    .rvw-card-text {
      font-family: 'Inter', sans-serif;
      font-size: 15px;
      line-height: 1.75;
      color: var(--rvw-espresso);
      flex-grow: 1;
      margin-bottom: 32px;
    }

    /* Author Section */
    .rvw-author {
      display: flex;
      align-items: center;
      gap: 16px;
      padding-top: 24px;
      border-top: 1px solid rgba(179, 156, 128, 0.2);
    }

    .rvw-card--featured .rvw-author {
      border-top-color: rgba(198, 186, 165, 0.2);
    }

    .rvw-author-avatar {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid var(--rvw-sand);
    }

    .rvw-author-initials {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--rvw-taupe), var(--rvw-camel));
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Cormorant Garamond', serif;
      font-size: 18px;
      font-weight: 600;
      color: var(--rvw-white);
    }

    .rvw-card--featured .rvw-author-initials {
      background: linear-gradient(135deg, var(--rvw-sand), var(--rvw-taupe));
      color: var(--rvw-espresso);
    }

    .rvw-author-info {
      display: flex;
      flex-direction: column;
    }

    .rvw-author-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 18px;
      font-weight: 600;
      color: var(--rvw-espresso);
      margin-bottom: 2px;
    }

    .rvw-author-role {
      font-family: 'Inter', sans-serif;
      font-size: 13px;
      color: var(--rvw-taupe);
    }

    /* View More Button */
    .rvw-btn-wrapper {
      margin-top: 60px;
      position: relative;
      z-index: 1;
    }

    .rvw-btn {
      font-family: 'Inter', sans-serif;
      font-size: 14px;
      font-weight: 500;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: var(--rvw-espresso);
      background: transparent;
      border: 2px solid var(--rvw-espresso);
      padding: 18px 48px;
      border-radius: 50px;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: color 0.4s ease;
    }

    .rvw-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 0;
      height: 100%;
      background: var(--rvw-espresso);
      transition: width 0.4s ease;
      z-index: -1;
    }

    .rvw-btn:hover {
      color: var(--rvw-cream);
    }

    .rvw-btn:hover::before {
      width: 100%;
    }

    .rvw-btn-text {
      position: relative;
      z-index: 1;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .rvw-btn-arrow {
      transition: transform 0.3s ease;
    }

    .rvw-btn:hover .rvw-btn-arrow {
      transform: translateX(4px);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
      .rvw-cards-wrapper {
        flex-direction: column;
        align-items: center;
      }

      .rvw-card {
        max-width: 500px;
        width: 100%;
      }

      .rvw-card--featured {
        transform: scale(1) translateY(30px);
        order: -1;
      }

      .rvw-card--featured:hover {
        transform: scale(1) translateY(-8px);
      }

      @keyframes rvw-fadeInFeatured {
        to {
          opacity: 1;
          transform: scale(1) translateY(0);
        }
      }
    }

    @media (max-width: 480px) {
      .rvw-section {
        padding: 60px 16px;
      }

      .rvw-card {
        padding: 32px 24px;
        min-width: unset;
      }

      .rvw-header {
        margin-bottom: 40px;
      }

      .rvw-btn {
        padding: 16px 36px;
      }
    }
  </style>
</head>
<body>

  <section class="rvw-section">
    <!-- Background Decorative Shapes -->
    <div class="rvw-bg-shape rvw-bg-shape--one"></div>
    <div class="rvw-bg-shape rvw-bg-shape--two"></div>

    <!-- Section Header -->
    <header class="rvw-header">
      <span class="rvw-label">Testimonials</span>
      <h2 class="rvw-title">What Our <span>Clients</span> Say</h2>
    </header>

    <!-- Review Cards -->
    <div class="rvw-cards-wrapper" id="rvw-cards">
      <!-- Card 1 -->
      <article class="rvw-card">
        <div class="rvw-card-quote">"</div>
        <div class="rvw-stars">
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        </div>
        <p class="rvw-card-text">The attention to detail and personalized approach exceeded all my expectations. Every interaction felt thoughtful and intentional, creating an experience that was truly memorable.</p>
        <div class="rvw-author">
          <div class="rvw-author-initials">EM</div>
          <div class="rvw-author-info">
            <span class="rvw-author-name">Elena Martinez</span>
            <span class="rvw-author-role">Creative Director</span>
          </div>
        </div>
      </article>

      <!-- Card 2 (Featured) -->
      <article class="rvw-card rvw-card--featured">
        <div class="rvw-card-quote">"</div>
        <div class="rvw-stars">
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        </div>
        <p class="rvw-card-text">An absolutely transformative experience. The level of craftsmanship and dedication to excellence is unparalleled. I've never encountered such refined quality and genuine care for client satisfaction.</p>
        <div class="rvw-author">
          <div class="rvw-author-initials">JC</div>
          <div class="rvw-author-info">
            <span class="rvw-author-name">James Chen</span>
            <span class="rvw-author-role">CEO, Lumina Ventures</span>
          </div>
        </div>
      </article>

      <!-- Card 3 -->
      <article class="rvw-card">
        <div class="rvw-card-quote">"</div>
        <div class="rvw-stars">
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        </div>
        <p class="rvw-card-text">From start to finish, the process was seamless and elegant. The results speak for themselves — sophisticated, timeless, and exactly what I envisioned. Highly recommend to anyone.</p>
        <div class="rvw-author">
          <div class="rvw-author-initials">SW</div>
          <div class="rvw-author-info">
            <span class="rvw-author-name">Sophia Williams</span>
            <span class="rvw-author-role">Interior Designer</span>
          </div>
        </div>
      </article>
    </div>

    <!-- View More Button -->
    <div class="rvw-btn-wrapper">
      <button class="rvw-btn" id="rvw-view-more">
        <span class="rvw-btn-text">
          View More Reviews
          <svg class="rvw-btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14M12 5l7 7-7 7"/>
          </svg>
        </span>
      </button>
    </div>
  </section>

  <script>
    // View More Button - Navigate to All Reviews page
    document.getElementById('rvw-view-more').addEventListener('click', function() {
      window.location.href = 'all-reviews.php';
    });
  </script>

</body>
</html>
