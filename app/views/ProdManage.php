<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProdManage</title>
</head>
<body>
 <h1>Products</h1>
<a href="<?= site_url('auth/logout') ?>">Logout</a>

<h2><?= $edit_product ? 'Edit Product' : 'Add Product' ?></h2>
<form method="post" action="<?= $edit_product ? site_url('products/edit/'.$edit_product->id) : site_url('products/create') ?>">
  <input type="text" name="product_name" placeholder="Product name"
         value="<?= $edit_product ? html_escape($edit_product->product_name) : '' ?>" required>
  <textarea name="description" placeholder="Description"><?= $edit_product ? html_escape($edit_product->description) : '' ?></textarea>
  <input type="number" step="0.01" name="price" placeholder="Price"
         value="<?= $edit_product ? html_escape($edit_product->price) : '' ?>" required>
  <input type="number" name="quantity" placeholder="Quantity"
         value="<?= $edit_product ? html_escape($edit_product->quantity) : '' ?>" required>

  <button type="submit"><?= $edit_product ? 'Update' : 'Create' ?></button>
  <?php if ($edit_product): ?>
    <a href="<?= site_url('products') ?>">Cancel</a>
  <?php endif; ?>
</form>

<hr>

<table border="1" cellpadding="6">
  <tr>
    <th>Name</th><th>Description</th><th>Price</th><th>Qty</th><th>Actions</th>
  </tr>
  <?php foreach ($products as $p): ?>
  <tr>
 <td><?= html_escape($p['id'] ?? ''); ?></td>
                        <td><?= html_escape($p['product_name'] ?? ''); ?></td>
                        <td><?= html_escape($p['description'] ?? ''); ?></td>
                        <td><?= html_escape($p['price'] ?? ''); ?></td>
                        <td><?= html_escape($p['quantity'] ?? ''); ?></td>
    <td>
      <a href="<?= site_url('products/edit/'.$p->id) ?>">
        <button type="button">Edit</button>
      </a>
      <a href="<?= site_url('products/delete/'.$p->id) ?>"
         onclick="return confirm('Delete this product?')">
        <button type="button">Delete</button>
      </a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
</body>
  </html>