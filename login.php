<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Fashion Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
            --color-dark: #2f2716;
            --color-white: #ffffff;
            --color-light-bg: #faf9f7;
            --color-border: #e8e4de;
            --font-primary: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --font-heading: 'Georgia', 'Times New Roman', serif;
            --transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            min-height: 100vh;
            background: var(--color-light-bg);
            font-family: var(--font-primary);
            color: var(--color-dark);
            display: flex;
            flex-direction: column;
        }

        /* Back to home link */
        .back-home {
            position: absolute;
            top: 2rem;
            left: 2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--color-dark);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all var(--transition);
            z-index: 10;
        }

        .back-home:hover {
            color: var(--color-accent);
            transform: translateX(-3px);
        }

        .back-home i {
            font-size: 0.85rem;
        }

        /* Login Page Container */
        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem;
            min-height: 100vh;
            position: relative;
        }

        .login-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 1000px;
            width: 100%;
            background: var(--color-white);
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(47, 39, 22, 0.1);
            overflow: hidden;
        }

        /* Left side - Hero section */
        .hero-section {
            background: linear-gradient(135deg, var(--color-dark), var(--color-accent));
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2.5rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=800&h=1200&fit=crop');
            background-size: cover;
            background-position: center;
            opacity: 0.15;
            z-index: 0;
        }

        .hero-content {
            max-width: 100%;
            color: var(--color-white);
            z-index: 2;
            position: relative;
        }

        .hero-title {
            font-family: var(--font-heading);
            font-size: 2rem;
            font-weight: 600;
            line-height: 1.2;
            margin-bottom: 1rem;
            color: var(--color-white);
        }

        .hero-subtitle {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.5;
            margin-bottom: 1.5rem;
        }

        .features {
            margin-top: 1.5rem;
        }

        .feature {
            display: flex;
            align-items: center;
            margin-bottom: 0.875rem;
            color: rgba(255, 255, 255, 0.95);
            font-size: 0.85rem;
        }

        .feature i {
            color: var(--color-main);
            margin-right: 1rem;
            font-size: 1.1rem;
            width: 20px;
        }

        /* Right side - Auth section */
        .auth-section {
            padding: 2.5rem 2rem;
            display: flex;
            flex-direction: column;
            background: var(--color-white);
        }

        .auth-container {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Toggle between login and signup */
        .auth-toggle {
            display: flex;
            background: var(--color-light-bg);
            border-radius: 10px;
            padding: 4px;
            margin-bottom: 1.75rem;
        }

        .toggle-btn {
            flex: 1;
            padding: 0.75rem 0.875rem;
            text-align: center;
            color: var(--color-dark);
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            border-radius: 8px;
            transition: all var(--transition);
        }

        .toggle-btn.active {
            background: var(--color-white);
            color: var(--color-accent);
            box-shadow: 0 2px 8px rgba(47, 39, 22, 0.1);
        }

        .auth-form {
            display: none;
            flex-direction: column;
            animation: fadeIn 0.5s ease;
        }

        .auth-form.active {
            display: flex;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-title {
            font-family: var(--font-heading);
            color: var(--color-dark);
            font-size: 1.75rem;
            margin-bottom: 0.375rem;
            font-weight: 600;
        }

        .form-subtitle {
            color: var(--color-main);
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        /* Input groups */
        .input-group {
            position: relative;
            margin-bottom: 1.25rem;
        }

        .input-group input {
            width: 100%;
            padding: 0.875rem 0.875rem 0.875rem 2.75rem;
            background: var(--color-light-bg);
            border: 1px solid var(--color-border);
            border-radius: 8px;
            color: var(--color-dark);
            font-size: 0.9rem;
            transition: all var(--transition);
            outline: none;
            font-family: var(--font-primary);
        }

        .input-group input:focus {
            border-color: var(--color-main);
            box-shadow: 0 0 0 3px rgba(179, 156, 128, 0.1);
            background: var(--color-white);
        }

        .input-group input::placeholder {
            color: var(--color-main);
            opacity: 0.6;
        }

        .input-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--color-main);
            transition: color var(--transition);
        }

        .input-group input:focus ~ i {
            color: var(--color-accent);
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--color-main);
            cursor: pointer;
            transition: color var(--transition);
            z-index: 1;
        }

        .password-toggle:hover {
            color: var(--color-accent);
        }

        /* Terms checkbox */
        .terms {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.25rem;
            color: var(--color-dark);
            font-size: 0.8rem;
            line-height: 1.5;
        }

        .terms input {
            margin-top: 0.25rem;
            margin-right: 0.75rem;
            accent-color: var(--color-main);
            cursor: pointer;
        }

        .terms label {
            cursor: pointer;
        }

        .terms a {
            color: var(--color-accent);
            text-decoration: none;
            font-weight: 500;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        /* Submit button */
        .submit-btn {
            width: 100%;
            padding: 0.875rem;
            background: var(--color-dark);
            border: none;
            border-radius: 8px;
            color: var(--color-white);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition);
            position: relative;
            overflow: hidden;
            margin-bottom: 1.25rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .submit-btn:hover {
            background: var(--color-accent);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(47, 39, 22, 0.25);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 1.25rem 0;
            color: var(--color-main);
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--color-border);
        }

        .divider span {
            padding: 0 1rem;
            font-size: 0.85rem;
            color: var(--color-main);
        }

        /* Social login */
        .social-login {
            display: flex;
            justify-content: center;
            gap: 0.875rem;
            margin-bottom: 1.25rem;
        }

        .social-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--color-light-bg);
            border: 1px solid var(--color-border);
            color: var(--color-dark);
            font-size: 1rem;
            cursor: pointer;
            transition: all var(--transition);
        }

        .social-btn:hover {
            transform: translateY(-3px);
            background: var(--color-white);
            box-shadow: 0 4px 12px rgba(47, 39, 22, 0.1);
        }

        .google:hover { color: #DB4437; border-color: #DB4437; }
        .github:hover { color: var(--color-dark); border-color: var(--color-dark); }
        .twitter:hover { color: #1DA1F2; border-color: #1DA1F2; }

        /* Loading animation */
        .loading {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Forgot password link */
        .forgot-link {
            text-align: center;
            margin-top: 1rem;
        }

        .forgot-link a {
            color: var(--color-accent);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .forgot-link a:hover {
            text-decoration: underline;
        }

        /* Responsive design */
        @media (max-width: 968px) {
            .login-wrapper {
                grid-template-columns: 1fr;
            }
            
            .hero-section {
                padding: 3rem 2rem;
                min-height: auto;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .auth-section {
                padding: 2.5rem 2rem;
            }
        }

        @media (max-width: 768px) {
            .back-home {
                top: 1rem;
                left: 1rem;
                font-size: 0.85rem;
            }

            .back-home span {
                display: none;
            }

            .login-container {
                padding: 3rem 1rem 2rem;
            }

            .login-wrapper {
                border-radius: 12px;
            }
            
            .hero-section {
                padding: 2rem 1.5rem;
            }
            
            .hero-title {
                font-size: 1.75rem;
            }
            
            .auth-section {
                padding: 2rem 1.5rem;
            }
            
            .features {
                display: none;
            }
        }
    </style>
</head>
<body>
    <a href="index.php" class="back-home">
        <i class="fas fa-arrow-left"></i>
        <span>Back to Home</span>
    </a>
    <div class="login-container">
        <div class="login-wrapper">
            <!-- Left side - Hero section -->
            <div class="hero-section">
                <div class="hero-content">
                    <h1 class="hero-title">Welcome Back</h1>
                    <p class="hero-subtitle">Sign in to access your account and continue shopping our exclusive collection of premium fashion.</p>
                    
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-shopping-bag"></i>
                            <span>Access your saved items and wishlist</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-shipping-fast"></i>
                            <span>Track your orders and delivery status</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-heart"></i>
                            <span>Save your favorite products for later</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-user"></i>
                            <span>Manage your profile and preferences</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right side - Auth section -->
            <div class="auth-section">
                <div class="auth-container">
            <!-- Toggle between login and signup -->
            <div class="auth-toggle">
                <div class="toggle-btn active" id="loginToggle">Login</div>
                <div class="toggle-btn" id="signupToggle">Sign Up</div>
            </div>

            <!-- Login Form -->
            <form class="auth-form active" id="loginForm">
                <h2 class="form-title">Welcome Back</h2>
                <p class="form-subtitle">Sign in to access your Nexus account</p>
                
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="loginEmail" placeholder="Email or Username" required>
                </div>
                
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="loginPassword" placeholder="Password" required>
                    <span class="password-toggle" id="toggleLoginPassword">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                
                <div class="forgot-link">
                    <a href="#" id="forgotPassword">Forgot your password?</a>
                </div>
                
                <button type="submit" class="submit-btn" id="loginBtn">
                    <span id="loginBtnText">Sign In</span>
                    <div class="loading" id="loginLoading"></div>
                </button>
                
                <div class="divider">
                    <span>Or continue with</span>
                </div>
                
                <div class="social-login">
                    <div class="social-btn google">
                        <i class="fab fa-google"></i>
                    </div>
                    <div class="social-btn github">
                        <i class="fab fa-github"></i>
                    </div>
                    <div class="social-btn twitter">
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>
            </form>

            <!-- Signup Form -->
            <form class="auth-form" id="signupForm">
                <h2 class="form-title">Create Account</h2>
                <p class="form-subtitle">Join Nexus today for a secure digital future</p>
                
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="signupName" placeholder="Full Name" required>
                </div>
                
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="signupEmail" placeholder="Email Address" required>
                </div>
                
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="signupPassword" placeholder="Create Password" required>
                    <span class="password-toggle" id="toggleSignupPassword">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="signupConfirmPassword" placeholder="Confirm Password" required>
                </div>
                
                <div class="terms">
                    <input type="checkbox" id="agreeTerms" required>
                    <label for="agreeTerms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                </div>
                
                <button type="submit" class="submit-btn" id="signupBtn">
                    <span id="signupBtnText">Create Account</span>
                    <div class="loading" id="signupLoading"></div>
                </button>
                
                <div class="divider">
                    <span>Or sign up with</span>
                </div>
                
                <div class="social-login">
                    <div class="social-btn google">
                        <i class="fab fa-google"></i>
                    </div>
                    <div class="social-btn github">
                        <i class="fab fa-github"></i>
                    </div>
                    <div class="social-btn twitter">
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>
            </form>

            <!-- Forgot Password Form (hidden by default) -->
            <form class="auth-form" id="forgotForm">
                <h2 class="form-title">Reset Password</h2>
                <p class="form-subtitle">Enter your email to receive a reset link</p>
                
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="forgotEmail" placeholder="Email Address" required>
                </div>
                
                <button type="submit" class="submit-btn" id="forgotBtn">
                    <span id="forgotBtnText">Send Reset Link</span>
                    <div class="loading" id="forgotLoading"></div>
                </button>
                
                <div class="forgot-link">
                    <a href="#" id="backToLogin">Back to login</a>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        // Toggle between login and signup forms
        const loginToggle = document.getElementById('loginToggle');
        const signupToggle = document.getElementById('signupToggle');
        const loginForm = document.getElementById('loginForm');
        const signupForm = document.getElementById('signupForm');
        const forgotForm = document.getElementById('forgotForm');
        const forgotPasswordLink = document.getElementById('forgotPassword');
        const backToLoginLink = document.getElementById('backToLogin');

        loginToggle.addEventListener('click', () => {
            loginToggle.classList.add('active');
            signupToggle.classList.remove('active');
            loginForm.classList.add('active');
            signupForm.classList.remove('active');
            forgotForm.classList.remove('active');
        });

        signupToggle.addEventListener('click', () => {
            signupToggle.classList.add('active');
            loginToggle.classList.remove('active');
            signupForm.classList.add('active');
            loginForm.classList.remove('active');
            forgotForm.classList.remove('active');
        });

        forgotPasswordLink.addEventListener('click', (e) => {
            e.preventDefault();
            loginForm.classList.remove('active');
            signupForm.classList.remove('active');
            forgotForm.classList.add('active');
            loginToggle.classList.remove('active');
            signupToggle.classList.remove('active');
        });

        backToLoginLink.addEventListener('click', (e) => {
            e.preventDefault();
            loginForm.classList.add('active');
            forgotForm.classList.remove('active');
            loginToggle.classList.add('active');
            signupToggle.classList.remove('active');
        });

        // Password visibility toggle
        function setupPasswordToggle(passwordInputId, toggleButtonId) {
            const toggleBtn = document.getElementById(toggleButtonId);
            const passwordInput = document.getElementById(passwordInputId);
            
            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', function() {
                    const eyeIcon = this.querySelector('i');
                    
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        eyeIcon.classList.remove('fa-eye');
                        eyeIcon.classList.add('fa-eye-slash');
                    } else {
                        passwordInput.type = 'password';
                        eyeIcon.classList.remove('fa-eye-slash');
                        eyeIcon.classList.add('fa-eye');
                    }
                });
            }
        }

        // Setup password toggles
        setupPasswordToggle('loginPassword', 'toggleLoginPassword');
        setupPasswordToggle('signupPassword', 'toggleSignupPassword');

        // Form submission handlers
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            const loginBtn = document.getElementById('loginBtn');
            const loginBtnText = document.getElementById('loginBtnText');
            const loginLoading = document.getElementById('loginLoading');
            
            // Show loading
            loginBtnText.style.display = 'none';
            loginLoading.style.display = 'block';
            loginBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Reset button
                loginBtnText.style.display = 'block';
                loginLoading.style.display = 'none';
                loginBtn.disabled = false;
                
                // Simple validation
                if (email && password) {
                    loginBtn.innerHTML = '<i class="fas fa-check"></i> Login Successful';
                    loginBtn.style.background = 'var(--color-accent)';
                    
                    setTimeout(() => {
                        alert(`Welcome back! You've successfully logged in.`);
                        loginBtn.innerHTML = '<span id="loginBtnText">Sign In</span><div class="loading" id="loginLoading"></div>';
                        loginBtn.style.background = 'var(--color-dark)';
                        this.reset();
                    }, 1000);
                } else {
                    loginBtn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Invalid Credentials';
                    loginBtn.style.background = '#dc3545';
                    
                    setTimeout(() => {
                        loginBtn.innerHTML = '<span id="loginBtnText">Sign In</span><div class="loading" id="loginLoading"></div>';
                        loginBtn.style.background = 'var(--color-dark)';
                    }, 2000);
                }
            }, 1500);
        });

        document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('signupName').value;
            const email = document.getElementById('signupEmail').value;
            const password = document.getElementById('signupPassword').value;
            const confirmPassword = document.getElementById('signupConfirmPassword').value;
            const agreeTerms = document.getElementById('agreeTerms').checked;
            
            const signupBtn = document.getElementById('signupBtn');
            const signupBtnText = document.getElementById('signupBtnText');
            const signupLoading = document.getElementById('signupLoading');
            
            // Show loading
            signupBtnText.style.display = 'none';
            signupLoading.style.display = 'block';
            signupBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Reset button
                signupBtnText.style.display = 'block';
                signupLoading.style.display = 'none';
                signupBtn.disabled = false;
                
                // Validation
                if (!name || !email || !password || !confirmPassword) {
                    signupBtn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> All fields required';
                    signupBtn.style.background = '#dc3545';
                    
                    setTimeout(() => {
                        signupBtn.innerHTML = '<span id="signupBtnText">Create Account</span><div class="loading" id="signupLoading"></div>';
                        signupBtn.style.background = 'var(--color-dark)';
                    }, 2000);
                    return;
                }
                
                if (password !== confirmPassword) {
                    signupBtn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Passwords don\'t match';
                    signupBtn.style.background = '#dc3545';
                    
                    setTimeout(() => {
                        signupBtn.innerHTML = '<span id="signupBtnText">Create Account</span><div class="loading" id="signupLoading"></div>';
                        signupBtn.style.background = 'var(--color-dark)';
                    }, 2000);
                    return;
                }
                
                if (!agreeTerms) {
                    signupBtn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Accept terms & conditions';
                    signupBtn.style.background = '#dc3545';
                    
                    setTimeout(() => {
                        signupBtn.innerHTML = '<span id="signupBtnText">Create Account</span><div class="loading" id="signupLoading"></div>';
                        signupBtn.style.background = 'var(--color-dark)';
                    }, 2000);
                    return;
                }
                
                // Success
                signupBtn.innerHTML = '<i class="fas fa-check"></i> Account Created';
                signupBtn.style.background = 'var(--color-accent)';
                
                setTimeout(() => {
                    alert(`Welcome, ${name}! Your account has been created successfully.`);
                    signupBtn.innerHTML = '<span id="signupBtnText">Create Account</span><div class="loading" id="signupLoading"></div>';
                    signupBtn.style.background = 'var(--color-dark)';
                    this.reset();
                    // Switch to login form
                    loginToggle.click();
                }, 1000);
            }, 1500);
        });

        document.getElementById('forgotForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('forgotEmail').value;
            const forgotBtn = document.getElementById('forgotBtn');
            const forgotBtnText = document.getElementById('forgotBtnText');
            const forgotLoading = document.getElementById('forgotLoading');
            
            // Show loading
            forgotBtnText.style.display = 'none';
            forgotLoading.style.display = 'block';
            forgotBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Reset button
                forgotBtnText.style.display = 'block';
                forgotLoading.style.display = 'none';
                forgotBtn.disabled = false;
                
                if (email) {
                    forgotBtn.innerHTML = '<i class="fas fa-check"></i> Reset Link Sent';
                    forgotBtn.style.background = 'var(--color-accent)';
                    
                    setTimeout(() => {
                        alert(`Password reset link has been sent to ${email}. Please check your inbox.`);
                        forgotBtn.innerHTML = '<span id="forgotBtnText">Send Reset Link</span><div class="loading" id="forgotLoading"></div>';
                        forgotBtn.style.background = 'var(--color-dark)';
                        this.reset();
                        backToLoginLink.click();
                    }, 1000);
                } else {
                    forgotBtn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Please enter email';
                    forgotBtn.style.background = '#dc3545';
                    
                    setTimeout(() => {
                        forgotBtn.innerHTML = '<span id="forgotBtnText">Send Reset Link</span><div class="loading" id="forgotLoading"></div>';
                        forgotBtn.style.background = 'var(--color-dark)';
                    }, 2000);
                }
            }, 1500);
        });

        // Social buttons interaction
        document.querySelectorAll('.social-btn').forEach(button => {
            button.addEventListener('click', function() {
                const platform = this.classList.contains('google') ? 'Google' : 
                                this.classList.contains('github') ? 'GitHub' : 'Twitter';
                
                // Add pulse effect
                this.style.transform = 'scale(1.1)';
                this.style.boxShadow = '0 0 20px rgba(255, 255, 255, 0.3)';
                
                setTimeout(() => {
                    this.style.transform = '';
                    this.style.boxShadow = '';
                    alert(`Connecting with ${platform}...`);
                }, 300);
            });
        });
    </script>
</body>
</html>