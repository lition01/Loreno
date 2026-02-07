<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Reviews</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    /* Brand Color Variables */
    :root {
      --arv-taupe: #b39c80;
      --arv-sand: #c6baa5;
      --arv-camel: #a8845e;
      --arv-coffee: #7e5232;
      --arv-espresso: #2f2716;
      --arv-cream: #faf8f5;
      --arv-white: #ffffff;
    }

    /* Reset & Base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, sans-serif;
      background-color: var(--arv-cream);
      color: var(--arv-espresso);
      line-height: 1.6;
      min-height: 100vh;
    }

    /* Header Section */
    .arv-header {
      background: linear-gradient(135deg, var(--arv-espresso) 0%, var(--arv-coffee) 100%);
      padding: 80px 24px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .arv-header::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(179, 156, 128, 0.1) 0%, transparent 50%);
      animation: arv-pulse 8s ease-in-out infinite;
    }

    .arv-header::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 120px;
      background: linear-gradient(to top, var(--arv-cream), transparent);
    }

    @keyframes arv-pulse {
      0%, 100% { transform: scale(1); opacity: 0.5; }
      50% { transform: scale(1.1); opacity: 0.8; }
    }

    .arv-header-content {
      position: relative;
      z-index: 1;
      max-width: 900px;
      margin: 0 auto;
    }

    .arv-header-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      padding: 8px 20px;
      border-radius: 50px;
      color: var(--arv-sand);
      font-size: 0.85rem;
      font-weight: 500;
      margin-bottom: 24px;
      backdrop-filter: blur(10px);
    }

    .arv-header-title {
      font-family: 'Cormorant Garamond', Georgia, serif;
      font-size: clamp(2.8rem, 6vw, 4.5rem);
      font-weight: 600;
      color: var(--arv-white);
      margin-bottom: 20px;
      letter-spacing: 0.02em;
    }

    .arv-header-subtitle {
      font-size: 1.15rem;
      color: var(--arv-sand);
      font-weight: 300;
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.7;
    }

    /* Stats Section */
    .arv-stats-section {
      max-width: 1200px;
      margin: -60px auto 0;
      padding: 0 24px;
      position: relative;
      z-index: 10;
    }

    .arv-stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
    }

    .arv-stat-card {
      background: var(--arv-white);
      border-radius: 16px;
      padding: 20px 16px;
      text-align: center;
      box-shadow: 0 8px 32px rgba(47, 39, 22, 0.06);
      border: 1px solid rgba(198, 186, 165, 0.2);
      transition: all 0.3s ease;
    }

    .arv-stat-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 36px rgba(47, 39, 22, 0.1);
    }

    .arv-stat-icon {
      width: 40px;
      height: 40px;
      background: linear-gradient(135deg, var(--arv-camel), var(--arv-coffee));
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 12px;
    }

    .arv-stat-icon svg {
      width: 20px;
      height: 20px;
      stroke: var(--arv-white);
      fill: none;
    }

    .arv-stat-value {
      font-family: 'Cormorant Garamond', Georgia, serif;
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--arv-espresso);
      margin-bottom: 2px;
    }

    .arv-stat-label {
      font-size: 0.75rem;
      color: var(--arv-taupe);
      text-transform: uppercase;
      letter-spacing: 0.06em;
    }

    /* Filter & Controls Section */
    .arv-controls-section {
      max-width: 1200px;
      margin: 48px auto 0;
      padding: 0 24px;
    }

    .arv-controls-wrapper {
      background: var(--arv-white);
      border-radius: 20px;
      padding: 24px 28px;
      box-shadow: 0 4px 20px rgba(47, 39, 22, 0.05);
      border: 1px solid rgba(198, 186, 165, 0.2);
    }

    .arv-controls-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid rgba(198, 186, 165, 0.3);
    }

    .arv-search-wrapper {
      position: relative;
      flex: 1;
      max-width: 400px;
    }

    .arv-search-input {
      width: 100%;
      padding: 14px 18px 14px 48px;
      background: var(--arv-cream);
      border: 1px solid transparent;
      border-radius: 12px;
      font-family: 'Inter', sans-serif;
      font-size: 0.95rem;
      color: var(--arv-espresso);
      transition: all 0.3s ease;
      outline: none;
    }

    .arv-search-input:focus {
      background: var(--arv-white);
      border-color: var(--arv-camel);
      box-shadow: 0 0 0 3px rgba(168, 132, 94, 0.1);
    }

    .arv-search-input::placeholder {
      color: var(--arv-taupe);
    }

    .arv-search-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
      stroke: var(--arv-taupe);
    }

    .arv-view-toggle {
      display: flex;
      gap: 8px;
      background: var(--arv-cream);
      padding: 6px;
      border-radius: 10px;
    }

    .arv-view-btn {
      padding: 10px 14px;
      background: transparent;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .arv-view-btn svg {
      width: 20px;
      height: 20px;
      stroke: var(--arv-taupe);
    }

    .arv-view-btn.active {
      background: var(--arv-white);
      box-shadow: 0 2px 8px rgba(47, 39, 22, 0.08);
    }

    .arv-view-btn.active svg {
      stroke: var(--arv-espresso);
    }

    .arv-controls-bottom {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
    }

    .arv-filter-group {
      display: flex;
      align-items: center;
      gap: 12px;
      flex-wrap: wrap;
    }

    .arv-filter-label {
      font-size: 0.9rem;
      color: var(--arv-taupe);
      font-weight: 500;
    }

    .arv-rating-filters {
      display: flex;
      gap: 8px;
    }

    .arv-rating-chip {
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 8px 16px;
      background: var(--arv-cream);
      border: 1px solid transparent;
      border-radius: 50px;
      font-family: 'Inter', sans-serif;
      font-size: 0.85rem;
      color: var(--arv-espresso);
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .arv-rating-chip:hover {
      border-color: var(--arv-sand);
    }

    .arv-rating-chip.active {
      background: var(--arv-espresso);
      color: var(--arv-white);
    }

    .arv-rating-chip svg {
      width: 14px;
      height: 14px;
      fill: var(--arv-camel);
    }

    .arv-rating-chip.active svg {
      fill: var(--arv-sand);
    }

    .arv-sort-group {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .arv-sort-select {
      padding: 10px 36px 10px 16px;
      background: var(--arv-cream) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%237e5232' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E") no-repeat right 12px center;
      border: 1px solid transparent;
      border-radius: 10px;
      font-family: 'Inter', sans-serif;
      font-size: 0.9rem;
      color: var(--arv-espresso);
      cursor: pointer;
      outline: none;
      appearance: none;
      transition: all 0.3s ease;
    }

    .arv-sort-select:focus {
      border-color: var(--arv-camel);
      background-color: var(--arv-white);
    }

    /* Reviews Grid */
    .arv-reviews-section {
      max-width: 1200px;
      margin: 32px auto 0;
      padding: 0 24px 80px;
    }

    .arv-results-info {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 24px;
    }

    .arv-results-count {
      font-size: 0.95rem;
      color: var(--arv-taupe);
    }

    .arv-results-count strong {
      color: var(--arv-espresso);
    }

    .arv-reviews-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
      gap: 24px;
    }

    .arv-reviews-grid.list-view {
      grid-template-columns: 1fr;
    }

    .arv-review-card {
      background: var(--arv-white);
      border-radius: 20px;
      padding: 28px;
      border: 1px solid rgba(198, 186, 165, 0.2);
      transition: all 0.4s ease;
      opacity: 0;
      transform: translateY(30px);
      animation: arv-fade-up 0.6s ease forwards;
      position: relative;
      overflow: hidden;
    }

    @keyframes arv-fade-up {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .arv-review-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 24px 48px rgba(47, 39, 22, 0.1);
      border-color: var(--arv-camel);
    }

    .arv-card-ribbon {
      position: absolute;
      top: 20px;
      right: -32px;
      background: linear-gradient(135deg, var(--arv-camel), var(--arv-coffee));
      color: var(--arv-white);
      padding: 6px 40px;
      font-size: 0.7rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      transform: rotate(45deg);
    }

    .arv-card-top {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 20px;
    }

    .arv-author-section {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .arv-author-avatar {
      position: relative;
    }

    .arv-avatar-img {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid var(--arv-cream);
      box-shadow: 0 4px 12px rgba(47, 39, 22, 0.1);
    }

    .arv-avatar-initials {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--arv-camel), var(--arv-coffee));
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Cormorant Garamond', Georgia, serif;
      font-size: 1.3rem;
      font-weight: 600;
      color: var(--arv-white);
      border: 3px solid var(--arv-cream);
      box-shadow: 0 4px 12px rgba(47, 39, 22, 0.1);
    }

    .arv-online-indicator {
      position: absolute;
      bottom: 2px;
      right: 2px;
      width: 14px;
      height: 14px;
      background: #4ade80;
      border: 2px solid var(--arv-white);
      border-radius: 50%;
    }

    .arv-author-info {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .arv-author-name {
      font-family: 'Cormorant Garamond', Georgia, serif;
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--arv-espresso);
    }

    .arv-author-meta {
      display: flex;
      align-items: center;
      gap: 8px;
      flex-wrap: wrap;
    }

    .arv-author-role {
      font-size: 0.85rem;
      color: var(--arv-taupe);
    }

    .arv-author-location {
      display: flex;
      align-items: center;
      gap: 4px;
      font-size: 0.8rem;
      color: var(--arv-sand);
    }

    .arv-author-location svg {
      width: 12px;
      height: 12px;
    }

    .arv-rating-section {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 4px;
    }

    .arv-stars {
      display: flex;
      gap: 3px;
    }

    .arv-star {
      width: 18px;
      height: 18px;
      fill: var(--arv-camel);
    }

    .arv-star.empty {
      fill: var(--arv-sand);
      opacity: 0.4;
    }

    .arv-rating-text {
      font-size: 0.8rem;
      color: var(--arv-taupe);
    }

    .arv-review-title {
      font-family: 'Cormorant Garamond', Georgia, serif;
      font-size: 1.15rem;
      font-weight: 600;
      color: var(--arv-espresso);
      margin-bottom: 12px;
    }

    .arv-review-content {
      font-size: 0.95rem;
      color: var(--arv-espresso);
      line-height: 1.75;
      margin-bottom: 20px;
    }

    .arv-review-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 20px;
    }

    .arv-tag {
      padding: 6px 12px;
      background: var(--arv-cream);
      border-radius: 6px;
      font-size: 0.75rem;
      color: var(--arv-coffee);
      font-weight: 500;
    }

    .arv-card-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-top: 16px;
      border-top: 1px solid rgba(198, 186, 165, 0.2);
    }

    .arv-footer-left {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .arv-review-date {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 0.8rem;
      color: var(--arv-taupe);
    }

    .arv-review-date svg {
      width: 14px;
      height: 14px;
    }

    .arv-verified-badge {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      background: rgba(74, 222, 128, 0.1);
      color: #16a34a;
      padding: 5px 12px;
      border-radius: 50px;
      font-size: 0.75rem;
      font-weight: 500;
    }

    .arv-verified-badge svg {
      width: 14px;
      height: 14px;
    }

    .arv-footer-actions {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .arv-action-btn {
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 8px 12px;
      background: transparent;
      border: 1px solid rgba(198, 186, 165, 0.3);
      border-radius: 8px;
      font-family: 'Inter', sans-serif;
      font-size: 0.8rem;
      color: var(--arv-taupe);
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .arv-action-btn:hover {
      background: var(--arv-cream);
      border-color: var(--arv-sand);
      color: var(--arv-espresso);
    }

    .arv-action-btn.liked {
      background: rgba(168, 132, 94, 0.1);
      border-color: var(--arv-camel);
      color: var(--arv-coffee);
    }

    .arv-action-btn svg {
      width: 16px;
      height: 16px;
    }

    /* Load More */
    .arv-load-more-container {
      text-align: center;
      margin-top: 48px;
    }

    .arv-load-more-btn {
      padding: 18px 48px;
      background: transparent;
      border: 2px solid var(--arv-espresso);
      border-radius: 50px;
      font-family: 'Inter', sans-serif;
      font-size: 1rem;
      font-weight: 500;
      color: var(--arv-espresso);
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .arv-load-more-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: var(--arv-espresso);
      transition: left 0.4s ease;
      z-index: -1;
    }

    .arv-load-more-btn:hover {
      color: var(--arv-white);
    }

    .arv-load-more-btn:hover::before {
      left: 0;
    }

    /* Write Review Section (Inline) */
    .arv-write-section {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 24px 80px;
    }

    .arv-write-wrapper {
      background: linear-gradient(135deg, var(--arv-espresso) 0%, var(--arv-coffee) 100%);
      border-radius: 28px;
      padding: 60px;
      position: relative;
      overflow: hidden;
    }

    .arv-write-wrapper::before {
      content: '';
      position: absolute;
      top: -100px;
      right: -100px;
      width: 300px;
      height: 300px;
      background: radial-gradient(circle, rgba(179, 156, 128, 0.15) 0%, transparent 70%);
    }

    .arv-write-wrapper::after {
      content: '';
      position: absolute;
      bottom: -80px;
      left: -80px;
      width: 250px;
      height: 250px;
      background: radial-gradient(circle, rgba(168, 132, 94, 0.1) 0%, transparent 70%);
    }

    .arv-write-inner {
      position: relative;
      z-index: 1;
      display: grid;
      grid-template-columns: 1fr 1.5fr;
      gap: 60px;
      align-items: center;
    }

    .arv-write-content {
      color: var(--arv-white);
    }

    .arv-write-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(255, 255, 255, 0.1);
      padding: 8px 16px;
      border-radius: 50px;
      font-size: 0.8rem;
      color: var(--arv-sand);
      margin-bottom: 20px;
    }

    .arv-write-title {
      font-family: 'Cormorant Garamond', Georgia, serif;
      font-size: 2.5rem;
      font-weight: 600;
      margin-bottom: 16px;
      line-height: 1.2;
    }

    .arv-write-text {
      font-size: 1rem;
      color: var(--arv-sand);
      line-height: 1.7;
      margin-bottom: 24px;
    }

    .arv-write-features {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .arv-feature-item {
      display: flex;
      align-items: center;
      gap: 12px;
      font-size: 0.9rem;
      color: var(--arv-sand);
    }

    .arv-feature-icon {
      width: 24px;
      height: 24px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .arv-feature-icon svg {
      width: 12px;
      height: 12px;
      stroke: var(--arv-camel);
    }

    .arv-form-card {
      background: var(--arv-white);
      border-radius: 20px;
      padding: 36px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }

    .arv-form-header {
      text-align: center;
      margin-bottom: 28px;
    }

    .arv-form-title {
      font-family: 'Cormorant Garamond', Georgia, serif;
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--arv-espresso);
      margin-bottom: 8px;
    }

    .arv-form-subtitle {
      font-size: 0.9rem;
      color: var(--arv-taupe);
    }

    .arv-form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .arv-form-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .arv-form-label {
      font-size: 0.85rem;
      font-weight: 500;
      color: var(--arv-espresso);
    }

    .arv-form-input,
    .arv-form-textarea,
    .arv-form-select {
      width: 100%;
      padding: 14px 16px;
      background: var(--arv-cream);
      border: 1px solid transparent;
      border-radius: 12px;
      font-family: 'Inter', sans-serif;
      font-size: 0.95rem;
      color: var(--arv-espresso);
      transition: all 0.3s ease;
      outline: none;
    }

    .arv-form-input:focus,
    .arv-form-textarea:focus,
    .arv-form-select:focus {
      background: var(--arv-white);
      border-color: var(--arv-camel);
      box-shadow: 0 0 0 3px rgba(168, 132, 94, 0.1);
    }

    .arv-form-input::placeholder,
    .arv-form-textarea::placeholder {
      color: var(--arv-taupe);
    }

    .arv-form-textarea {
      min-height: 100px;
      resize: vertical;
    }

    .arv-form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }

    .arv-rating-selector {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .arv-rating-stars-wrapper {
      display: flex;
      justify-content: center;
      gap: 8px;
      padding: 16px;
      background: var(--arv-cream);
      border-radius: 14px;
      border: 2px solid transparent;
      transition: all 0.3s ease;
    }

    .arv-rating-stars-wrapper:hover {
      border-color: var(--arv-sand);
    }

    .arv-rating-stars-wrapper.selected {
      border-color: var(--arv-camel);
      background: rgba(168, 132, 94, 0.08);
    }

    .arv-star-input {
      position: relative;
      cursor: pointer;
    }

    .arv-star-input input {
      position: absolute;
      opacity: 0;
      pointer-events: none;
    }

    .arv-star-input label {
      display: block;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .arv-star-input label svg {
      width: 36px;
      height: 36px;
      fill: var(--arv-sand);
      opacity: 0.4;
      transition: all 0.2s ease;
    }

    .arv-star-input label:hover svg,
    .arv-star-input.hovered label svg {
      fill: var(--arv-camel);
      opacity: 0.7;
      transform: scale(1.1);
    }

    .arv-star-input.active label svg {
      fill: var(--arv-camel);
      opacity: 1;
      transform: scale(1);
    }

    .arv-rating-display {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-size: 0.9rem;
      color: var(--arv-taupe);
    }

    .arv-rating-display strong {
      color: var(--arv-espresso);
      font-family: 'Cormorant Garamond', Georgia, serif;
      font-size: 1.1rem;
    }

    .arv-submit-btn {
      width: 100%;
      padding: 16px;
      background: linear-gradient(135deg, var(--arv-camel) 0%, var(--arv-coffee) 100%);
      color: var(--arv-white);
      border: none;
      border-radius: 12px;
      font-family: 'Inter', sans-serif;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .arv-submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(126, 82, 50, 0.3);
    }

    .arv-submit-btn svg {
      width: 20px;
      height: 20px;
    }

    /* Success State */
    .arv-success-state {
      display: none;
      text-align: center;
      padding: 40px 20px;
    }

    .arv-success-state.show {
      display: block;
      animation: arv-fade-up 0.5s ease;
    }

    .arv-success-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, var(--arv-camel), var(--arv-coffee));
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
    }

    .arv-success-icon svg {
      width: 40px;
      height: 40px;
      stroke: var(--arv-white);
    }

    .arv-success-title {
      font-family: 'Cormorant Garamond', Georgia, serif;
      font-size: 1.8rem;
      font-weight: 600;
      color: var(--arv-espresso);
      margin-bottom: 12px;
    }

    .arv-success-text {
      color: var(--arv-taupe);
      margin-bottom: 24px;
    }

    .arv-success-btn {
      padding: 14px 32px;
      background: var(--arv-cream);
      border: none;
      border-radius: 10px;
      font-family: 'Inter', sans-serif;
      font-size: 0.95rem;
      color: var(--arv-espresso);
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .arv-success-btn:hover {
      background: var(--arv-sand);
    }

    /* Back Link */
    .arv-back-link {
      position: fixed;
      top: 24px;
      left: 24px;
      display: flex;
      align-items: center;
      gap: 8px;
      color: var(--arv-white);
      text-decoration: none;
      font-size: 0.9rem;
      font-weight: 500;
      z-index: 100;
      padding: 12px 20px;
      background: rgba(47, 39, 22, 0.4);
      border-radius: 50px;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }

    .arv-back-link:hover {
      background: rgba(47, 39, 22, 0.6);
      transform: translateX(-4px);
    }

    .arv-back-link svg {
      width: 18px;
      height: 18px;
    }

    /* Responsive */
    @media (max-width: 1024px) {
      .arv-stats-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .arv-write-inner {
        grid-template-columns: 1fr;
        gap: 40px;
      }

      .arv-write-content {
        text-align: center;
      }

      .arv-write-features {
        align-items: center;
      }

      .arv-form-card {
        padding: 28px 24px;
      }
    }

    @media (max-width: 768px) {
      .arv-header {
        padding: 100px 20px 80px;
      }

      .arv-reviews-grid {
        grid-template-columns: 1fr;
      }

      .arv-form-row {
        grid-template-columns: 1fr;
      }

      .arv-stats-section {
        margin-top: -40px;
        padding: 0 16px;
      }

      .arv-stats-grid {
        grid-template-columns: 1fr 1fr;
        gap: 10px;
      }

      .arv-stat-card {
        padding: 16px 12px;
        border-radius: 12px;
      }

      .arv-stat-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        margin-bottom: 10px;
      }

      .arv-stat-icon svg {
        width: 18px;
        height: 18px;
      }

      .arv-stat-value {
        font-size: 1.5rem;
      }

      .arv-stat-label {
        font-size: 0.65rem;
        letter-spacing: 0.04em;
      }

      .arv-controls-section {
        padding: 0 16px;
      }

      .arv-controls-wrapper {
        padding: 20px 16px;
        border-radius: 16px;
      }

      .arv-controls-top {
        flex-direction: column;
        gap: 16px;
      }

      .arv-search-wrapper {
        max-width: 100%;
        width: 100%;
      }

      .arv-search-input {
        padding: 12px 14px 12px 44px;
        font-size: 0.9rem;
      }

      .arv-view-toggle {
        display: none;
      }

      .arv-controls-bottom {
        flex-direction: column;
        align-items: stretch;
        gap: 14px;
      }

      .arv-filter-group {
        flex-direction: column;
        align-items: center;
        gap: 10px;
      }

      .arv-rating-filters {
        justify-content: center;
        flex-wrap: wrap;
        gap: 6px;
      }

      .arv-rating-chip {
        padding: 6px 12px;
        font-size: 0.8rem;
      }

      .arv-sort-group {
        justify-content: center;
        flex-direction: column;
        align-items: center;
        gap: 8px;
      }

      .arv-sort-select {
        width: 100%;
        text-align: center;
      }

      .arv-reviews-section {
        padding: 0 16px 60px;
      }

      .arv-write-wrapper {
        padding: 40px 16px;
      }

      .arv-write-title {
        font-size: 1.8rem;
      }

      .arv-write-subtitle {
        font-size: 0.95rem;
      }

      .arv-form-card {
        padding: 24px 20px;
        border-radius: 16px;
      }

      .arv-form-title {
        font-size: 1.3rem;
      }

      .arv-form-input,
      .arv-form-textarea,
      .arv-form-select {
        padding: 12px 14px;
        font-size: 0.9rem;
        border-radius: 10px;
      }

      .arv-form-textarea {
        min-height: 90px;
      }

      .arv-star-input label svg {
        width: 32px;
        height: 32px;
      }

      .arv-rating-stars-wrapper {
        padding: 14px 12px;
        gap: 6px;
      }

      .arv-submit-btn {
        padding: 14px;
        font-size: 0.95rem;
        border-radius: 10px;
      }

      .arv-back-link {
        top: 16px;
        left: 16px;
        padding: 10px 16px;
        font-size: 0.85rem;
      }
    }

    @media (max-width: 480px) {
      .arv-header {
        padding: 90px 16px 70px;
      }

      .arv-header-badge {
        padding: 6px 14px;
        font-size: 0.75rem;
      }

      .arv-stats-grid {
        gap: 8px;
      }

      .arv-stat-card {
        padding: 14px 10px;
      }

      .arv-stat-icon {
        width: 32px;
        height: 32px;
        margin-bottom: 8px;
      }

      .arv-stat-icon svg {
        width: 16px;
        height: 16px;
      }

      .arv-stat-value {
        font-size: 1.3rem;
      }

      .arv-stat-label {
        font-size: 0.6rem;
      }

      .arv-rating-chip {
        padding: 5px 10px;
        font-size: 0.75rem;
      }

      .arv-star-input label svg {
        width: 28px;
        height: 28px;
      }

      .arv-rating-stars-wrapper {
        padding: 12px 8px;
        gap: 4px;
      }

      .arv-form-card {
        padding: 20px 16px;
      }

      .arv-write-features {
        gap: 12px;
      }

      .arv-feature-item {
        font-size: 0.85rem;
        gap: 10px;
      }
    }
  </style>
</head>
<body>
  <!-- Back Link -->
  <a href="index.php" class="arv-back-link">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <path d="M19 12H5M12 19l-7-7 7-7"/>
    </svg>
    Back to Home
  </a>

  <!-- Header -->
  <header class="arv-header">
    <div class="arv-header-content">
      <div class="arv-header-badge">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
        </svg>
        Trusted by 2,800+ Clients
      </div>
      <h1 class="arv-header-title">Client Experiences</h1>
      <p class="arv-header-subtitle">Real stories from real people. Discover how we've helped transform businesses and exceed expectations.</p>
    </div>
  </header>

  <!-- Stats Section -->
  <section class="arv-stats-section">
    <div class="arv-stats-grid">
      <div class="arv-stat-card">
        <div class="arv-stat-icon">
          <svg viewBox="0 0 24 24" stroke-width="2">
            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
          </svg>
        </div>
        <div class="arv-stat-value">4.9</div>
        <div class="arv-stat-label">Average Rating</div>
      </div>
      <div class="arv-stat-card">
        <div class="arv-stat-icon">
          <svg viewBox="0 0 24 24" stroke-width="2">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
          </svg>
        </div>
        <div class="arv-stat-value">2,847</div>
        <div class="arv-stat-label">Total Reviews</div>
      </div>
      <div class="arv-stat-card">
        <div class="arv-stat-icon">
          <svg viewBox="0 0 24 24" stroke-width="2">
            <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/>
          </svg>
        </div>
        <div class="arv-stat-value">98%</div>
        <div class="arv-stat-label">Recommend Us</div>
      </div>
      <div class="arv-stat-card">
        <div class="arv-stat-icon">
          <svg viewBox="0 0 24 24" stroke-width="2">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
            <polyline points="22 4 12 14.01 9 11.01"/>
          </svg>
        </div>
        <div class="arv-stat-value">100%</div>
        <div class="arv-stat-label">Verified Reviews</div>
      </div>
    </div>
  </section>

  <!-- Controls Section -->
  <section class="arv-controls-section">
    <div class="arv-controls-wrapper">
      <div class="arv-controls-top">
        <div class="arv-search-wrapper">
          <svg class="arv-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"/>
            <path d="M21 21l-4.35-4.35"/>
          </svg>
          <input type="text" class="arv-search-input" placeholder="Search reviews by keyword..." id="searchInput">
        </div>
        <div class="arv-view-toggle">
          <button class="arv-view-btn active" data-view="grid" title="Grid View">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="3" width="7" height="7"/>
              <rect x="14" y="3" width="7" height="7"/>
              <rect x="3" y="14" width="7" height="7"/>
              <rect x="14" y="14" width="7" height="7"/>
            </svg>
          </button>
          <button class="arv-view-btn" data-view="list" title="List View">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <line x1="8" y1="6" x2="21" y2="6"/>
              <line x1="8" y1="12" x2="21" y2="12"/>
              <line x1="8" y1="18" x2="21" y2="18"/>
              <line x1="3" y1="6" x2="3.01" y2="6"/>
              <line x1="3" y1="12" x2="3.01" y2="12"/>
              <line x1="3" y1="18" x2="3.01" y2="18"/>
            </svg>
          </button>
        </div>
      </div>
      <div class="arv-controls-bottom">
        <div class="arv-filter-group">
          <span class="arv-filter-label">Filter by:</span>
          <div class="arv-rating-filters">
            <button class="arv-rating-chip active" data-filter="all">All</button>
            <button class="arv-rating-chip" data-filter="5">
              <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
              5
            </button>
            <button class="arv-rating-chip" data-filter="4">
              <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
              4
            </button>
            <button class="arv-rating-chip" data-filter="3">
              <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
              3+
            </button>
          </div>
        </div>
        <div class="arv-sort-group">
          <span class="arv-filter-label">Sort by:</span>
          <select class="arv-sort-select" id="sortSelect">
            <option value="newest">Newest First</option>
            <option value="oldest">Oldest First</option>
            <option value="highest">Highest Rated</option>
            <option value="lowest">Lowest Rated</option>
            <option value="helpful">Most Helpful</option>
          </select>
        </div>
      </div>
    </div>
  </section>

  <!-- Reviews Section -->
  <section class="arv-reviews-section">
    <div class="arv-results-info">
      <span class="arv-results-count">Showing <strong id="resultsCount">6</strong> of <strong>2,847</strong> reviews</span>
    </div>
    <div class="arv-reviews-grid" id="reviewsGrid">
      <!-- Reviews populated by JS -->
    </div>
    <div class="arv-load-more-container">
      <button class="arv-load-more-btn" id="loadMoreBtn">Load More Reviews</button>
    </div>
  </section>

  <!-- Write Review Section (Inline) -->
  <section class="arv-write-section">
    <div class="arv-write-wrapper">
      <div class="arv-write-inner">
        <div class="arv-write-content">
          <div class="arv-write-badge">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
            </svg>
            Share Your Story
          </div>
          <h2 class="arv-write-title">Your Experience Matters to Us</h2>
          <p class="arv-write-text">Help others make informed decisions by sharing your honest feedback. Every review helps us improve and serve you better.</p>
          <div class="arv-write-features">
            <div class="arv-feature-item">
              <div class="arv-feature-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"/>
                </svg>
              </div>
              Takes less than 2 minutes
            </div>
            <div class="arv-feature-item">
              <div class="arv-feature-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"/>
                </svg>
              </div>
              100% anonymous if preferred
            </div>
            <div class="arv-feature-item">
              <div class="arv-feature-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="20 6 9 17 4 12"/>
                </svg>
              </div>
              Helps improve our services
            </div>
          </div>
        </div>
        <div class="arv-form-card">
          <div class="arv-form-header">
            <h3 class="arv-form-title">Write Your Review</h3>
            <p class="arv-form-subtitle">Share your experience with our community</p>
          </div>
          <form class="arv-form" id="reviewForm">
            <div class="arv-form-group">
              <label class="arv-form-label">Your Rating</label>
              <div class="arv-rating-selector">
                <div class="arv-rating-stars-wrapper" id="starsWrapper">
                  <div class="arv-star-input" data-value="1">
                    <input type="radio" name="rating" value="1" id="rate1" required>
                    <label for="rate1">
                      <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </label>
                  </div>
                  <div class="arv-star-input" data-value="2">
                    <input type="radio" name="rating" value="2" id="rate2">
                    <label for="rate2">
                      <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </label>
                  </div>
                  <div class="arv-star-input" data-value="3">
                    <input type="radio" name="rating" value="3" id="rate3">
                    <label for="rate3">
                      <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </label>
                  </div>
                  <div class="arv-star-input" data-value="4">
                    <input type="radio" name="rating" value="4" id="rate4">
                    <label for="rate4">
                      <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </label>
                  </div>
                  <div class="arv-star-input" data-value="5">
                    <input type="radio" name="rating" value="5" id="rate5">
                    <label for="rate5">
                      <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </label>
                  </div>
                </div>
                <div class="arv-rating-display" id="ratingDisplay">
                  <span>Select your rating:</span> <strong id="ratingText">Not rated yet</strong>
                </div>
              </div>
            </div>
            <div class="arv-form-row">
              <div class="arv-form-group">
                <label class="arv-form-label" for="reviewName">Your Name</label>
                <input type="text" class="arv-form-input" id="reviewName" placeholder="John Doe" required>
              </div>
              <div class="arv-form-group">
                <label class="arv-form-label" for="reviewRole">Your Role / Title</label>
                <input type="text" class="arv-form-input" id="reviewRole" placeholder="CEO, Designer, etc.">
              </div>
            </div>
            <div class="arv-form-group">
              <label class="arv-form-label" for="reviewTitle">Review Title</label>
              <input type="text" class="arv-form-input" id="reviewTitle" placeholder="Summarize your experience" required>
            </div>
            <div class="arv-form-group">
              <label class="arv-form-label" for="reviewText">Your Review</label>
              <textarea class="arv-form-textarea" id="reviewText" placeholder="Share the details of your experience..." required></textarea>
            </div>
            <button type="submit" class="arv-submit-btn">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="22" y1="2" x2="11" y2="13"/>
                <polygon points="22 2 15 22 11 13 2 9 22 2"/>
              </svg>
              Submit Review
            </button>
          </form>
          <div class="arv-success-state" id="successState">
            <div class="arv-success-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="20 6 9 17 4 12"/>
              </svg>
            </div>
            <h3 class="arv-success-title">Thank You!</h3>
            <p class="arv-success-text">Your review has been submitted successfully and will appear shortly.</p>
            <button class="arv-success-btn" onclick="resetForm()">Write Another Review</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    // Review Data
    const reviewsData = [
      {
        id: 1,
        name: "Alexandra Chen",
        role: "CEO, TechVentures",
        location: "San Francisco, CA",
        initials: "AC",
        rating: 5,
        title: "Exceeded All Expectations",
        text: "Working with this team has been an absolute game-changer for our business. Their attention to detail and commitment to excellence is unmatched. The results speak for themselves - we've seen a 40% increase in engagement.",
        tags: ["Professional", "Responsive", "Quality Work"],
        date: "2 days ago",
        verified: true,
        helpful: 42,
        featured: true
      },
      {
        id: 2,
        name: "Marcus Williams",
        role: "Creative Director",
        location: "New York, NY",
        initials: "MW",
        rating: 5,
        title: "Phenomenal Creative Partnership",
        text: "The creative vision and execution were beyond what we imagined. They understood our brand identity perfectly and delivered designs that truly resonate with our audience. Highly recommend!",
        tags: ["Creative", "Brand-Focused", "Timely"],
        date: "1 week ago",
        verified: true,
        helpful: 38
      },
      {
        id: 3,
        name: "Sarah Mitchell",
        role: "Marketing Manager",
        location: "Austin, TX",
        initials: "SM",
        rating: 5,
        title: "Best Decision We Made This Year",
        text: "From the initial consultation to the final delivery, every step was handled with professionalism. The communication was excellent, and they were always available to address our concerns promptly.",
        tags: ["Great Communication", "Professional", "On Budget"],
        date: "2 weeks ago",
        verified: true,
        helpful: 29
      },
      {
        id: 4,
        name: "David Park",
        role: "Startup Founder",
        location: "Seattle, WA",
        initials: "DP",
        rating: 4,
        title: "Solid Work with Room for Growth",
        text: "Overall a great experience. The team delivered quality work within the timeline. There were minor revision rounds needed, but they handled feedback gracefully and made the necessary adjustments quickly.",
        tags: ["Reliable", "Good Value", "Flexible"],
        date: "3 weeks ago",
        verified: true,
        helpful: 18
      },
      {
        id: 5,
        name: "Emily Rodriguez",
        role: "Brand Strategist",
        location: "Miami, FL",
        initials: "ER",
        rating: 5,
        title: "Transformed Our Digital Presence",
        text: "Our online presence has been completely transformed. The strategic approach combined with stunning execution has resulted in measurable improvements across all our digital channels.",
        tags: ["Strategic", "Results-Driven", "Innovative"],
        date: "1 month ago",
        verified: true,
        helpful: 35
      },
      {
        id: 6,
        name: "James Thompson",
        role: "Operations Director",
        location: "Chicago, IL",
        initials: "JT",
        rating: 5,
        title: "Smooth Process from Start to Finish",
        text: "The entire process was seamless. Clear milestones, transparent pricing, and exceptional deliverables. They made what seemed like a complex project feel manageable and even enjoyable.",
        tags: ["Organized", "Transparent", "Efficient"],
        date: "1 month ago",
        verified: true,
        helpful: 24
      }
    ];

    const additionalReviews = [
      {
        id: 7,
        name: "Lisa Chang",
        role: "Product Manager",
        location: "Los Angeles, CA",
        initials: "LC",
        rating: 5,
        title: "A True Partner in Success",
        text: "They don't just deliver work - they become invested in your success. The proactive suggestions and insights they provided helped shape our product strategy significantly.",
        tags: ["Strategic Partner", "Insightful", "Dedicated"],
        date: "5 weeks ago",
        verified: true,
        helpful: 31
      },
      {
        id: 8,
        name: "Robert Kim",
        role: "E-commerce Director",
        location: "Boston, MA",
        initials: "RK",
        rating: 4,
        title: "Great ROI on Our Investment",
        text: "The return on investment has been substantial. Within three months, we saw significant improvements in our conversion rates. The data-driven approach really paid off.",
        tags: ["ROI Focused", "Data-Driven", "Effective"],
        date: "6 weeks ago",
        verified: true,
        helpful: 27
      },
      {
        id: 9,
        name: "Amanda Foster",
        role: "CMO",
        location: "Denver, CO",
        initials: "AF",
        rating: 5,
        title: "Unmatched Quality and Service",
        text: "Having worked with many agencies, I can confidently say this team stands above the rest. Their commitment to quality and customer satisfaction is truly remarkable.",
        tags: ["Premium Quality", "Customer-Centric", "Expert Team"],
        date: "2 months ago",
        verified: true,
        helpful: 45
      }
    ];

    // Render Reviews
    function renderStars(rating) {
      let stars = '';
      for (let i = 1; i <= 5; i++) {
        stars += `<svg class="arv-star ${i > rating ? 'empty' : ''}" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>`;
      }
      return stars;
    }

    function renderReviewCard(review, index) {
      return `
        <article class="arv-review-card" style="animation-delay: ${index * 0.08}s">
          ${review.featured ? '<div class="arv-card-ribbon">Featured</div>' : ''}
          <div class="arv-card-top">
            <div class="arv-author-section">
              <div class="arv-author-avatar">
                <div class="arv-avatar-initials">${review.initials}</div>
                ${review.verified ? '<div class="arv-online-indicator"></div>' : ''}
              </div>
              <div class="arv-author-info">
                <h3 class="arv-author-name">${review.name}</h3>
                <div class="arv-author-meta">
                  <span class="arv-author-role">${review.role}</span>
                  <span class="arv-author-location">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                      <circle cx="12" cy="10" r="3"/>
                    </svg>
                    ${review.location}
                  </span>
                </div>
              </div>
            </div>
            <div class="arv-rating-section">
              <div class="arv-stars">${renderStars(review.rating)}</div>
              <span class="arv-rating-text">${review.rating}.0 / 5.0</span>
            </div>
          </div>
          <h4 class="arv-review-title">${review.title}</h4>
          <p class="arv-review-content">${review.text}</p>
          <div class="arv-review-tags">
            ${review.tags.map(tag => `<span class="arv-tag">${tag}</span>`).join('')}
          </div>
          <div class="arv-card-footer">
            <div class="arv-footer-left">
              <span class="arv-review-date">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="12" cy="12" r="10"/>
                  <polyline points="12 6 12 12 16 14"/>
                </svg>
                ${review.date}
              </span>
              ${review.verified ? `
                <span class="arv-verified-badge">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                    <polyline points="22 4 12 14.01 9 11.01"/>
                  </svg>
                  Verified
                </span>
              ` : ''}
            </div>
            <div class="arv-footer-actions">
              <button class="arv-action-btn" onclick="toggleLike(this, ${review.id})">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/>
                </svg>
                <span>${review.helpful}</span>
              </button>
              <button class="arv-action-btn" onclick="shareReview(${review.id})">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="18" cy="5" r="3"/>
                  <circle cx="6" cy="12" r="3"/>
                  <circle cx="18" cy="19" r="3"/>
                  <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>
                  <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
                </svg>
              </button>
            </div>
          </div>
        </article>
      `;
    }

    // Initialize
    const reviewsGrid = document.getElementById('reviewsGrid');
    let displayedReviews = [...reviewsData];
    let allReviews = [...reviewsData, ...additionalReviews];

    function renderReviews(reviews) {
      reviewsGrid.innerHTML = reviews.map((review, index) => renderReviewCard(review, index)).join('');
      document.getElementById('resultsCount').textContent = reviews.length;
    }

    renderReviews(displayedReviews);

    // Load More
    document.getElementById('loadMoreBtn').addEventListener('click', function() {
      displayedReviews = [...allReviews];
      renderReviews(displayedReviews);
      this.style.display = 'none';
    });

    // Filter by Rating
    document.querySelectorAll('.arv-rating-chip').forEach(chip => {
      chip.addEventListener('click', function() {
        document.querySelectorAll('.arv-rating-chip').forEach(c => c.classList.remove('active'));
        this.classList.add('active');
        
        const filter = this.dataset.filter;
        let filtered;
        
        if (filter === 'all') {
          filtered = displayedReviews;
        } else if (filter === '3') {
          filtered = displayedReviews.filter(r => r.rating >= 3);
        } else {
          filtered = displayedReviews.filter(r => r.rating === parseInt(filter));
        }
        
        renderReviews(filtered);
      });
    });

    // Sort
    document.getElementById('sortSelect').addEventListener('change', function() {
      const sortedReviews = [...displayedReviews];
      
      switch(this.value) {
        case 'highest':
          sortedReviews.sort((a, b) => b.rating - a.rating);
          break;
        case 'lowest':
          sortedReviews.sort((a, b) => a.rating - b.rating);
          break;
        case 'helpful':
          sortedReviews.sort((a, b) => b.helpful - a.helpful);
          break;
        default:
          break;
      }
      
      renderReviews(sortedReviews);
    });

    // Search
    document.getElementById('searchInput').addEventListener('input', function() {
      const query = this.value.toLowerCase();
      const filtered = displayedReviews.filter(r => 
        r.text.toLowerCase().includes(query) || 
        r.title.toLowerCase().includes(query) ||
        r.name.toLowerCase().includes(query)
      );
      renderReviews(filtered);
    });

    // View Toggle
    document.querySelectorAll('.arv-view-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        document.querySelectorAll('.arv-view-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        
        if (this.dataset.view === 'list') {
          reviewsGrid.classList.add('list-view');
        } else {
          reviewsGrid.classList.remove('list-view');
        }
      });
    });

    // Like Toggle
    function toggleLike(btn, id) {
      btn.classList.toggle('liked');
      const countSpan = btn.querySelector('span');
      let count = parseInt(countSpan.textContent);
      countSpan.textContent = btn.classList.contains('liked') ? count + 1 : count - 1;
    }

    // Share
    function shareReview(id) {
      if (navigator.share) {
        navigator.share({
          title: 'Check out this review',
          url: window.location.href + '#review-' + id
        });
      } else {
        navigator.clipboard.writeText(window.location.href + '#review-' + id);
        alert('Link copied to clipboard!');
      }
    }

    // Star Rating Interactive
    const starInputs = document.querySelectorAll('.arv-star-input');
    const starsWrapper = document.getElementById('starsWrapper');
    const ratingText = document.getElementById('ratingText');
    const ratingLabels = ['Poor', 'Fair', 'Good', 'Very Good', 'Excellent'];
    let currentRating = 0;

    starInputs.forEach((star, index) => {
      star.addEventListener('mouseenter', () => {
        updateStarsVisual(index + 1, 'hover');
      });

      star.addEventListener('mouseleave', () => {
        updateStarsVisual(currentRating, 'active');
      });

      star.addEventListener('click', () => {
        currentRating = index + 1;
        star.querySelector('input').checked = true;
        starsWrapper.classList.add('selected');
        ratingText.textContent = `${currentRating} Star${currentRating > 1 ? 's' : ''} - ${ratingLabels[currentRating - 1]}`;
        updateStarsVisual(currentRating, 'active');
      });
    });

    function updateStarsVisual(rating, type) {
      starInputs.forEach((star, index) => {
        star.classList.remove('active', 'hovered');
        if (index < rating) {
          star.classList.add(type === 'hover' ? 'hovered' : 'active');
        }
      });
    }

    // Form Submission
    document.getElementById('reviewForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      this.style.display = 'none';
      document.querySelector('.arv-form-header').style.display = 'none';
      document.getElementById('successState').classList.add('show');
    });

    function resetForm() {
      document.getElementById('reviewForm').reset();
      document.getElementById('reviewForm').style.display = 'flex';
      document.querySelector('.arv-form-header').style.display = 'block';
      document.getElementById('successState').classList.remove('show');
      
      // Reset star rating
      currentRating = 0;
      starsWrapper.classList.remove('selected');
      ratingText.textContent = 'Not rated yet';
      updateStarsVisual(0, 'active');
    }
  </script>
</body>
</html>
