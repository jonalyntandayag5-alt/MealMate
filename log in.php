<?php
$displayError = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $displayError = 'Please enter both email and password.';
    } elseif ($email === 'admin@mealmate.com' && $password === 'mealmate123') {
        header('Location: index.html');
        exit;
    } else {
        $displayError = 'Invalid email or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MealMate Login</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body class="auth-body">
    <div class="auth-shell">
      <div class="auth-card">
        <div class="brand"><span class="dot"></span> MealMate</div>
        <h1>Welcome back</h1>
        <p class="subtitle">Sign in to plan your next healthy meal.</p>

        <?php if ($displayError !== ''): ?>
          <div class="alert"><?php echo htmlspecialchars($displayError, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>

        <form method="POST" action="log in.php">
          <div class="form-row">
            <div class="field">
              <label for="email">Email address</label>
              <input id="email" name="email" type="email" placeholder="you@example.com" required />
            </div>

            <div class="field">
              <label for="password">Password</label>
              <input id="password" name="password" type="password" placeholder="Enter your password" required />
            </div>

            <div class="form-options">
              <label class="checkbox">
                <input type="checkbox" name="remember" />
                <span>Remember me</span>
              </label>
              <a href="#">Forgot password?</a>
            </div>

            <button class="primary-btn" type="submit">Log in</button>
          </div>
        </form>

        <div class="auth-links">
          <span>Need an account?</span>
          <a href="#">Create one</a>
        </div>
      </div>
    </div>
  </body>
</html>
