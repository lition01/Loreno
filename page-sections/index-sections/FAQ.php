<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ - Frequently Asked Questions</title>
  <style>
    :root {
      --rvw-taupe: #b39c80;
      --rvw-sand: #c6baa5;
      --rvw-camel: #a8845e;
      --rvw-coffee: #7e5232;
      --rvw-espresso: #2f2716;
      --rvw-cream: #faf8f5;
      --rvw-white: #ffffff;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      background-color: var(--rvw-cream);
      color: var(--rvw-espresso);
      line-height: 1.6;
      min-height: 100vh;
    }

    .rvw-faq-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 80px 48px 120px;
    }

    .rvw-faq-header {
      text-align: center;
      margin-bottom: 80px;
    }

    .rvw-faq-label {
      display: inline-block;
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--rvw-camel);
      margin-bottom: 20px;
      padding: 8px 20px;
      border: 1px solid var(--rvw-camel);
      border-radius: 100px;
    }

    .rvw-faq-title {
      font-size: 3.5rem;
      font-weight: 300;
      letter-spacing: -0.02em;
      color: var(--rvw-espresso);
      margin-bottom: 20px;
    }

    .rvw-faq-subtitle {
      font-size: 1.125rem;
      color: var(--rvw-coffee);
      max-width: 480px;
      margin: 0 auto;
      font-weight: 400;
    }

    .rvw-faq-grid {
      display: flex;
      flex-direction: column;
      gap: 40px;
    }

    @media (min-width: 1024px) {
      .rvw-faq-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: start;
      }
    }

    .rvw-faq-column {
      display: flex;
      flex-direction: column;
    }

    .rvw-faq-category {
      background: var(--rvw-white);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(47, 39, 22, 0.06);
      border: 1px solid rgba(198, 186, 165, 0.3);
    }

    .rvw-faq-category-header {
      display: flex;
      align-items: center;
      gap: 20px;
      padding: 32px;
      border-bottom: 1px solid rgba(198, 186, 165, 0.4);
      background: linear-gradient(to bottom, var(--rvw-white), var(--rvw-cream));
    }

    .rvw-faq-category-icon {
      width: 56px;
      height: 56px;
      background: var(--rvw-espresso);
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .rvw-faq-category-icon svg {
      width: 28px;
      height: 28px;
      stroke: var(--rvw-cream);
    }

    .rvw-faq-category-info {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .rvw-faq-category-title {
      font-size: 1.5rem;
      font-weight: 500;
      color: var(--rvw-espresso);
      letter-spacing: -0.01em;
    }

    .rvw-faq-category-count {
      font-size: 0.875rem;
      color: var(--rvw-taupe);
    }

    .rvw-faq-items {
      list-style: none;
    }

    .rvw-faq-item {
      border-bottom: 1px solid rgba(198, 186, 165, 0.3);
    }

    .rvw-faq-item:last-child {
      border-bottom: none;
    }

    .rvw-faq-question {
      width: 100%;
      background: none;
      border: none;
      padding: 24px 32px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 20px;
      cursor: pointer;
      text-align: left;
      font-family: inherit;
      font-size: 1rem;
      font-weight: 500;
      color: var(--rvw-espresso);
      transition: all 0.25s ease;
    }

    .rvw-faq-question:hover {
      background-color: rgba(250, 248, 245, 0.7);
    }

    .rvw-faq-question:focus {
      outline: none;
      background-color: rgba(250, 248, 245, 0.7);
    }

    .rvw-faq-question:focus-visible {
      outline: 2px solid var(--rvw-camel);
      outline-offset: -2px;
    }

    .rvw-faq-question-text {
      flex: 1;
      line-height: 1.5;
    }

    .rvw-faq-icon-wrapper {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: var(--rvw-cream);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      transition: all 0.3s ease;
    }

    .rvw-faq-item.rvw-active .rvw-faq-icon-wrapper {
      background: var(--rvw-espresso);
    }

    .rvw-faq-chevron {
      width: 16px;
      height: 16px;
      stroke: var(--rvw-coffee);
      transition: all 0.3s ease;
    }

    .rvw-faq-item.rvw-active .rvw-faq-chevron {
      transform: rotate(180deg);
      stroke: var(--rvw-cream);
    }

    .rvw-faq-answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .rvw-faq-item.rvw-active .rvw-faq-answer {
      max-height: 400px;
    }

    .rvw-faq-answer-content {
      padding: 0 32px 28px 32px;
      font-size: 0.9375rem;
      color: var(--rvw-coffee);
      line-height: 1.8;
    }

    .rvw-faq-contact {
      margin-top: 80px;
      text-align: center;
      padding: 60px 40px;
      background: var(--rvw-espresso);
      border-radius: 20px;
      color: var(--rvw-cream);
    }

    .rvw-faq-contact-title {
      font-size: 1.75rem;
      font-weight: 400;
      margin-bottom: 12px;
      letter-spacing: -0.01em;
    }

    .rvw-faq-contact-text {
      font-size: 1rem;
      color: var(--rvw-sand);
      margin-bottom: 32px;
      max-width: 400px;
      margin-left: auto;
      margin-right: auto;
    }

    .rvw-faq-contact-btn {
      display: inline-block;
      padding: 16px 40px;
      background: var(--rvw-cream);
      color: var(--rvw-espresso);
      text-decoration: none;
      font-size: 0.875rem;
      font-weight: 600;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      border-radius: 100px;
      transition: all 0.25s ease;
    }

    .rvw-faq-contact-btn:hover {
      background: var(--rvw-white);
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 1023px) {
      .rvw-faq-container {
        padding: 60px 24px 80px;
      }

      .rvw-faq-header {
        margin-bottom: 48px;
      }

      .rvw-faq-title {
        font-size: 2.5rem;
      }

      .rvw-faq-category-header {
        padding: 24px;
      }

      .rvw-faq-category-icon {
        width: 48px;
        height: 48px;
      }

      .rvw-faq-category-icon svg {
        width: 24px;
        height: 24px;
      }

      .rvw-faq-category-title {
        font-size: 1.25rem;
      }

      .rvw-faq-question {
        padding: 20px 24px;
      }

      .rvw-faq-answer-content {
        padding: 0 24px 24px 24px;
      }

      .rvw-faq-contact {
        margin-top: 48px;
        padding: 48px 24px;
      }
    }

    @media (max-width: 480px) {
      .rvw-faq-container {
        padding: 40px 16px 60px;
      }

      .rvw-faq-title {
        font-size: 2rem;
      }

      .rvw-faq-subtitle {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>
  <section class="rvw-faq-container">
    <header class="rvw-faq-header">
      <span class="rvw-faq-label">Help Center</span>
      <h1 class="rvw-faq-title">How can we help?</h1>
      <p class="rvw-faq-subtitle">Find quick answers to your questions about payments and order tracking</p>
    </header>

    <div class="rvw-faq-grid">
      <!-- Payment Methods - Left Column -->
      <div class="rvw-faq-column">
        <div class="rvw-faq-category">
          <div class="rvw-faq-category-header">
            <div class="rvw-faq-category-icon">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
              </svg>
            </div>
            <div class="rvw-faq-category-info">
              <h2 class="rvw-faq-category-title">Payment Methods</h2>
              <span class="rvw-faq-category-count">4 questions</span>
            </div>
          </div>
          <ul class="rvw-faq-items">
            <li class="rvw-faq-item">
              <button class="rvw-faq-question" aria-expanded="false">
                <span class="rvw-faq-question-text">What payment methods do you accept?</span>
                <span class="rvw-faq-icon-wrapper">
                  <svg class="rvw-faq-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>
                </span>
              </button>
              <div class="rvw-faq-answer">
                <p class="rvw-faq-answer-content">We accept all major credit cards including Visa, Mastercard, and American Express. We also support PayPal, Apple Pay, Google Pay, and Shop Pay for a seamless checkout experience.</p>
              </div>
            </li>
            <li class="rvw-faq-item">
              <button class="rvw-faq-question" aria-expanded="false">
                <span class="rvw-faq-question-text">Do you offer buy now, pay later options?</span>
                <span class="rvw-faq-icon-wrapper">
                  <svg class="rvw-faq-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>
                </span>
              </button>
              <div class="rvw-faq-answer">
                <p class="rvw-faq-answer-content">Yes! We partner with Klarna and Afterpay so you can split your purchase into 4 interest-free installments. Select your preferred option at checkout.</p>
              </div>
            </li>
            <li class="rvw-faq-item">
              <button class="rvw-faq-question" aria-expanded="false">
                <span class="rvw-faq-question-text">Is my payment information secure?</span>
                <span class="rvw-faq-icon-wrapper">
                  <svg class="rvw-faq-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>
                </span>
              </button>
              <div class="rvw-faq-answer">
                <p class="rvw-faq-answer-content">Absolutely. We use industry-standard SSL encryption and never store your full card details. All transactions are processed through PCI-compliant payment providers.</p>
              </div>
            </li>
            <li class="rvw-faq-item">
              <button class="rvw-faq-question" aria-expanded="false">
                <span class="rvw-faq-question-text">Can I use multiple payment methods?</span>
                <span class="rvw-faq-icon-wrapper">
                  <svg class="rvw-faq-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>
                </span>
              </button>
              <div class="rvw-faq-answer">
                <p class="rvw-faq-answer-content">Currently, we support one payment method per order. However, you can combine a gift card with any other payment method to complete your purchase.</p>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <!-- Order Tracking - Right Column -->
      <div class="rvw-faq-column">
        <div class="rvw-faq-category">
          <div class="rvw-faq-category-header">
            <div class="rvw-faq-category-icon">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
              </svg>
            </div>
            <div class="rvw-faq-category-info">
              <h2 class="rvw-faq-category-title">Order Tracking</h2>
              <span class="rvw-faq-category-count">4 questions</span>
            </div>
          </div>
          <ul class="rvw-faq-items">
            <li class="rvw-faq-item">
              <button class="rvw-faq-question" aria-expanded="false">
                <span class="rvw-faq-question-text">How can I track my order?</span>
                <span class="rvw-faq-icon-wrapper">
                  <svg class="rvw-faq-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>
                </span>
              </button>
              <div class="rvw-faq-answer">
                <p class="rvw-faq-answer-content">Once your order ships, you will receive an email with a tracking number and link. You can also track your order by logging into your account and viewing your order history.</p>
              </div>
            </li>
            <li class="rvw-faq-item">
              <button class="rvw-faq-question" aria-expanded="false">
                <span class="rvw-faq-question-text">My tracking has not updated. What should I do?</span>
                <span class="rvw-faq-icon-wrapper">
                  <svg class="rvw-faq-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>
                </span>
              </button>
              <div class="rvw-faq-answer">
                <p class="rvw-faq-answer-content">Tracking updates can sometimes be delayed by 24-48 hours. If your tracking has not updated for more than 3 days, please contact our support team and we will investigate.</p>
              </div>
            </li>
            <li class="rvw-faq-item">
              <button class="rvw-faq-question" aria-expanded="false">
                <span class="rvw-faq-question-text">Can I change my shipping address after ordering?</span>
                <span class="rvw-faq-icon-wrapper">
                  <svg class="rvw-faq-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>
                </span>
              </button>
              <div class="rvw-faq-answer">
                <p class="rvw-faq-answer-content">Address changes are possible if your order has not yet shipped. Contact us immediately after placing your order and we will do our best to accommodate your request.</p>
              </div>
            </li>
            <li class="rvw-faq-item">
              <button class="rvw-faq-question" aria-expanded="false">
                <span class="rvw-faq-question-text">What if my package is marked delivered but I did not receive it?</span>
                <span class="rvw-faq-icon-wrapper">
                  <svg class="rvw-faq-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>
                </span>
              </button>
              <div class="rvw-faq-answer">
                <p class="rvw-faq-answer-content">First, check with neighbors and look for a safe spot notice. Wait 24 hours as packages sometimes arrive after being marked delivered. If still missing, contact us and we will help resolve the issue.</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="rvw-faq-contact">
      <h3 class="rvw-faq-contact-title">Still have questions?</h3>
      <p class="rvw-faq-contact-text">Our customer service team is here to help you with any inquiries</p>
      <a href="mailto:support@example.com" class="rvw-faq-contact-btn">Contact Us</a>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const questions = document.querySelectorAll('.rvw-faq-question');
      
      questions.forEach(function(question) {
        question.addEventListener('click', function() {
          const item = this.parentElement;
          const isActive = item.classList.contains('rvw-active');
          const expanded = this.getAttribute('aria-expanded') === 'true';
          
          // Close all items in the same category
          const category = item.closest('.rvw-faq-category');
          const allItems = category.querySelectorAll('.rvw-faq-item');
          allItems.forEach(function(otherItem) {
            otherItem.classList.remove('rvw-active');
            otherItem.querySelector('.rvw-faq-question').setAttribute('aria-expanded', 'false');
          });
          
          // Toggle current item if it was not active
          if (!isActive) {
            item.classList.add('rvw-active');
            this.setAttribute('aria-expanded', 'true');
          }
        });
      });
    });
  </script>
</body>
</html>
