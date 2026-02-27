<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup | Moreno Luxury Fashion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Allenoire';
            src: url('https://fonts.cdnfonts.com/s/91211/Allenoire.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --color-main: #b39c80;
            --color-secondary: #c6baa5;
            --color-hover: #a8845e;
            --color-accent: #7e5232;
            --color-dark: #1E1A14;
            --color-white: #ffffff;
            --color-light-bg: #faf9f7;
            --color-border: #e8e4de;
            --font-primary: 'Montserrat', system-ui, sans-serif;
            --font-heading: 'Allenoire', 'Playfair Display', serif;
            --font-serif: 'Cormorant Garamond', serif;
            --transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            height: 100vh;
            background: var(--color-light-bg);
            font-family: var(--font-primary);
            color: var(--color-dark);
            display: flex;
            overflow: hidden;
        }

        /* Back to home */
        .back-home {
            position: fixed;
            top: 2rem;
            left: 2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: var(--color-dark);
            text-decoration: none;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            transition: all var(--transition);
            z-index: 100;
            padding: 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            border: 1px solid var(--color-border);
        }

        .back-home:hover {
            color: var(--color-main);
            transform: translateX(-5px);
            border-color: var(--color-main);
        }

        /* Main Layout */
        .auth-page {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* Visual Side */
        .auth-visual {
            flex: 1.2;
            position: relative;
            background-color: var(--color-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem;
            overflow: hidden;
        }

        .auth-visual::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url('https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            opacity: 0.4;
            filter: grayscale(30%);
        }

        .auth-visual-content {
            position: relative;
            z-index: 2;
            max-width: 500px;
            text-align: center;
        }

        .visual-logo {
            font-family: var(--font-heading);
            font-size: 4rem;
            color: var(--color-secondary);
            margin-bottom: 2rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }

        .visual-ornament {
            width: 60px;
            height: 1px;
            background: var(--color-main);
            margin: 0 auto 2rem;
        }

        .visual-quote {
            font-family: var(--font-serif);
            font-size: 1.8rem;
            font-style: italic;
            color: var(--color-white);
            line-height: 1.4;
            margin-bottom: 1.5rem;
        }

        .visual-sub {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.3em;
            color: var(--color-main);
        }

        /* Form Side */
        .auth-form-side {
            flex: 1;
            background: var(--color-white);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4rem;
            position: relative;
        }

        .form-container {
            max-width: 420px;
            width: 100%;
            margin: 0 auto;
        }

        .auth-header {
            margin-bottom: 3rem;
            text-align: center;
        }

        .auth-header h1 {
            font-family: var(--font-heading);
            font-size: 2.5rem;
            color: var(--color-dark);
            margin-bottom: 0.5rem;
        }

        .auth-header p {
            font-size: 0.9rem;
            color: #777;
            font-weight: 400;
        }

        /* Toggle */
        .auth-toggle {
            display: flex;
            border-bottom: 1px solid var(--color-border);
            margin-bottom: 2.5rem;
        }

        .toggle-btn {
            flex: 1;
            padding: 1rem;
            background: none;
            border: none;
            font-family: var(--font-primary);
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #aaa;
            cursor: pointer;
            transition: all var(--transition);
            position: relative;
        }

        .toggle-btn.active {
            color: var(--color-dark);
        }

        .toggle-btn.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--color-dark);
        }

        /* Form Styles */
        .auth-form {
            display: none;
            animation: fadeIn 0.6s ease;
        }

        .auth-form.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .input-group {
            margin-bottom: 1.5rem;
        }

        .input-group label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--color-dark);
            margin-bottom: 0.6rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 0.9rem;
        }

        .input-wrapper input {
            width: 100%;
            padding: 1rem 1rem 1rem 2.8rem;
            border: 1px solid var(--color-border);
            border-radius: 8px;
            font-family: var(--font-primary);
            font-size: 0.95rem;
            transition: all var(--transition);
            background: var(--color-light-bg);
        }

        .input-wrapper input:focus {
            outline: none;
            border-color: var(--color-main);
            background: var(--color-white);
            box-shadow: 0 4px 15px rgba(179, 156, 128, 0.1);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            font-size: 0.85rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        .forgot-pass {
            color: var(--color-main);
            text-decoration: none;
            font-weight: 500;
        }

        .submit-btn {
            width: 100%;
            padding: 1.2rem;
            background: var(--color-dark);
            color: var(--color-white);
            border: none;
            border-radius: 8px;
            font-family: var(--font-primary);
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            cursor: pointer;
            transition: all var(--transition);
            margin-bottom: 2rem;
        }

        .submit-btn:hover {
            background: var(--color-accent);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .auth-visual {
                display: none;
            }
            .auth-form-side {
                flex: 1;
                padding: 2rem;
            }
        }

        @media (max-width: 480px) {
            .auth-header h1 {
                font-size: 2rem;
            }
            .back-home {
                top: 1rem;
                left: 1rem;
                font-size: 0.65rem;
            }
        }
    </style>
</head>
<body>

    <a href="index.php" class="back-home">
        <i class="fas fa-arrow-left"></i> Home
    </a>

    <main class="auth-page">
        <!-- Visual Side -->
        <div class="auth-visual">
            <div class="auth-visual-content">
                <div class="visual-logo">Moreno</div>
                <div class="visual-ornament"></div>
                <p class="visual-quote">"True luxury is not just what you wear, but the story you tell."</p>
                <div class="visual-sub">Est. 2026 • Private Collection</div>
            </div>
        </div>

        <!-- Form Side -->
        <div class="auth-form-side">
            <div class="form-container">
                <div class="auth-header">
                    <h1 id="authTitle">Welcome Back</h1>
                    <p id="authSubtitle">Please enter your details to access your account.</p>
                </div>

                <div class="auth-toggle">
                    <button class="toggle-btn active" onclick="switchTab('login')">Login</button>
                    <button class="toggle-btn" onclick="switchTab('signup')">Sign Up</button>
                </div>

                <!-- Login Form -->
                <form id="loginForm" class="auth-form active" onsubmit="handleAuth(event, 'login')">
                    <div class="input-group">
                        <label>Email Address</label>
                        <div class="input-wrapper">
                            <i class="far fa-envelope"></i>
                            <input type="email" id="loginEmail" placeholder="name@example.com" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="loginPassword" placeholder="••••••••" required>
                        </div>
                    </div>
                    <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox"> Remember me
                        </label>
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>
                    <button type="submit" class="submit-btn">Sign In</button>
                </form>

                <!-- Signup Form -->
                <form id="signupForm" class="auth-form" onsubmit="handleAuth(event, 'signup')">
                    <div class="input-group">
                        <label>Full Name</label>
                        <div class="input-wrapper">
                            <i class="far fa-user"></i>
                            <input type="text" id="signupName" placeholder="John Doe" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Email Address</label>
                        <div class="input-wrapper">
                            <i class="far fa-envelope"></i>
                            <input type="email" id="signupEmail" placeholder="name@example.com" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="signupPassword" placeholder="Create a password" required>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn">Create Account</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        function switchTab(tab) {
            const loginForm = document.getElementById('loginForm');
            const signupForm = document.getElementById('signupForm');
            const btns = document.querySelectorAll('.toggle-btn');
            const title = document.getElementById('authTitle');
            const subtitle = document.getElementById('authSubtitle');

            if (tab === 'login') {
                loginForm.classList.add('active');
                signupForm.classList.remove('active');
                btns[0].classList.add('active');
                btns[1].classList.remove('active');
                title.textContent = 'Welcome Back';
                subtitle.textContent = 'Please enter your details to access your account.';
            } else {
                loginForm.classList.remove('active');
                signupForm.classList.add('active');
                btns[0].classList.remove('active');
                btns[1].classList.add('active');
                title.textContent = 'Join Moreno';
                subtitle.textContent = 'Experience exclusivity and timeless fashion.';
            }
        }

        function handleAuth(event, type) {
            event.preventDefault();
            
            const email = type === 'login' ? 
                document.getElementById('loginEmail').value : 
                document.getElementById('signupEmail').value;

            // Simulating auth success
            localStorage.setItem('isLoggedIn', 'true');
            localStorage.setItem('userEmail', email);

            // Check for redirect
            const urlParams = new URLSearchParams(window.location.search);
            const redirect = urlParams.get('redirect');
            
            if (redirect) {
                window.location.href = redirect;
            } else {
                window.location.href = 'index.php';
            }
        }

        // Initialize from URL if needed
        document.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('mode') === 'signup') {
                switchTab('signup');
            }
        });
    </script>
</body>
</html>
