<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login to edit products</h1>
<?php if (!empty($error)): ?><p style="color:red"><?= html_escape($error) ?></p><?php endif; ?>
<form method="post" action="<?= site_url('ProdManage') ?>">
  <input type="text" name="name" placeholder="Your name" required><br>
  <button type="submit">Enter</button>
</form>
</body>
</html>