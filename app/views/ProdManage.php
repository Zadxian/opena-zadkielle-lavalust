<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProdManage</title>
</head>
<body>
    <h1>Welcome to ProdManage View</h1>
     <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= html_escape($product['id'] ?? ''); ?></td>
                        <td><?= html_escape($product['product_name'] ?? ''); ?></td>
                        <td><?= html_escape($product['description'] ?? ''); ?></td>
                        <td><?= html_escape($product['price'] ?? ''); ?></td>
                        <td><?= html_escape($product['quantity'] ?? ''); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="empty">No products found in the database.</td>
                </tr>
            <?php endif; ?>
</body>
</html>