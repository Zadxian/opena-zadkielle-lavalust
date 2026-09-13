<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            height: 100%;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;

            background-color: #FFFBEA;
            background-image: url('/images/durr.png');
            background-size: cover;
            background-position: center;
        }

        .login-card {
            background: #FFF3C4;
            border: 1px solid #F0DFA0;
            border-radius: 16px;
            padding: 32px 28px;
            width: 280px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(160, 130, 40, 0.15);
        }

        .login-card h1 {
            margin: 0 0 20px;
            font-size: 22px;
            color: #6B5B2A;
        }

        .login-card input {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #E8D89A;
            background: #FFFEF7;
            font-size: 14px;
            margin-bottom: 14px;
        }

        .login-card input:focus {
            outline: none;
            border-color: #C9A227;
        }

        .login-card button {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            background: #E8C34A;
            color: #4A3B0A;
            font-weight: 600;
            cursor: pointer;
            font-size: 14px;
        }

        .login-card button:hover {
            background: #D9AF2E;
        }

        .error-msg {
            background: #FBDFC9;
            color: #A05B3E;
            border: 1px solid #E8C0A0;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 13px;
            margin-bottom: 14px;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h1>Login</h1>
    <?php if (!empty($error)): ?>
        <div class="error-msg"><?= html_escape($error) ?></div>
    <?php endif; ?>
    <form method="post" action="<?= site_url('auth/login') ?>">
        <input type="text" name="name" placeholder="Your name" required>
        <button type="submit">Enter</button>
    </form>
</div>

</body>
</html>