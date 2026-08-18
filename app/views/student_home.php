<?php
/**
 * @var string $title
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
           background-image: url('/images/zad.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
             background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

       nav { position: sticky;
            top: 0;
            left: 0;
            width: 100%;
            background: #1f2937;
            padding: 16px 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            z-index: 100;
            text-align: left;
        }

nav a {
    color: #ffffff;
    text-decoration: none;
    font-weight: 600;
    margin: 0 10px;
}

nav a:hover {
    color: #fbbf24;
}
        .card {
            margin-top: 100px;
            background: #1f293785;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            padding: 40px 32px;
            max-width: 420px;
            width: 100%;
            text-align: center;
            
        }
        .card .avatar {
    width: 300px;
    height: 300px;
    border-radius: 50%;
    object-fit: cover;
    margin: 0 auto 20px;
    display: block;

    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

        .card h1 {
            font-size: 28px;
            color: #cfd9e7;
            margin-bottom: 12px;
        }

        .card p {
            color: #e9effa;
            font-size: 16px;
            line-height: 1.5;
        }

        .card .icon {
            font-size: 40px;
            margin-bottom: 16px;
        }
   
    </style>
</head>
<body>
    <nav>
        <a href="<?= site_url('/') ?>">Home</a> 
        <a href="<?= site_url('/student') ?>">Student Profile</a>
    </nav>

    <div class="card">
        <div class="card">
    <img src="/images/duurr.png" alt="Profile picture" class="avatar">
        <h1><?= $title ?></h1>
        <p>Welcome to my gloomy profile</p>
    </div>
</body>
</html>