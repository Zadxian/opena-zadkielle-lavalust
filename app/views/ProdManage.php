<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProdManage</title>
</head>
<body>
    <h1>Welcome to ProdManage View</h1>
     <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= html_escape($user['id'] ?? ''); ?></td>
                        <td><?= html_escape($user['product_name'] ?? ''); ?></td>
                        <td><?= html_escape($user['description'] ?? ''); ?></td>
                        <td><?= html_escape($user['price'] ?? ''); ?></td>
                        <td><?= html_escape($user['quantity'] ?? ''); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="empty">No products found in the database.</td>
                </tr>
            <?php endif; ?>
</body>
</html>