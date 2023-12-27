<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Teluten</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="grid-container">
        <div class="greeting-section">
            <h1 class="greeting">Halo, Teluten!</h1>
        </div>
        <div class="login-section">
            <div class="logo"> <!-- Asumsi logo adalah gambar -->
                <img src="images/tel-1.png" alt="Teluten Logo" />
            </div>
            <p class="welcome-text">Welcome back! Please login to your account.</p>
            <form class="login-form">
                <div class="input-group">
                    <input type="text" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" required>
                </div>
                <div class="bottom-section">
                    <div class="remember-me">
                        <input type="checkbox" id="rememberMe">
                        <label for="rememberMe">Remember Me</label>
                    </div>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>
                <button type="submit" class="login-button">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
