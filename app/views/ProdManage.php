<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProdManage</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background-image: url('/images/durr.png');
            background: #FFFBEA;
            color: #4A4030;
            padding: 32px 24px 64px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1000px;
            margin: 0 auto 24px;
        }

        .topbar h1 {
            margin: 0;
            font-size: 28px;
            color: #7A6A2E;
        }

        .topbar a {
            color: #8A7B3E;
            text-decoration: none;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 8px;
            background: #FFF3C4;
            border: 1px solid #F0DFA0;
        }

        .topbar a:hover {
            background: #FCE8A0;
        }

        .form-card {
            max-width: 1000px;
            margin: 0 auto 32px;
            background: #FFF3C4;
            border: 1px solid #F0DFA0;
            border-radius: 16px;
            padding: 24px 28px;
        }

        .form-card h2 {
            margin: 0 0 16px;
            font-size: 20px;
            color: #6B5B2A;
        }

        .form-card form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px 16px;
        }

        .form-card textarea { grid-column: 1 / -1; min-height: 70px; }
        .form-card .form-actions { grid-column: 1 / -1; display: flex; gap: 12px; align-items: center; }

        .form-card input,
        .form-card textarea {
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #E8D89A;
            background: #FFFEF7;
            font-size: 14px;
        }

        .form-card input:focus,
        .form-card textarea:focus {
            outline: none;
            border-color: #C9A227;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            background: #E8C34A;
            color: #4A3B0A;
            font-weight: 600;
            cursor: pointer;
        }

        .btn:hover { background: #D9AF2E; }

        .cancel-link {
            color: #8A7B3E;
            text-decoration: underline;
            font-size: 14px;
        }

        .grid {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
            gap: 20px;
        }

        .card {
            background: #FFF8DC;
            border: 1px solid #F0DFA0;
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .card-image {
            height: 140px;
            background-color: #FCEEB0;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #B8A24A;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.3px;
            border-bottom: 1px solid #F0DFA0;
        }

        .card-body {
            padding: 16px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .card-body h3 {
            margin: 0;
            font-size: 16px;
            color: #6B5B2A;
        }

        .card-body p {
            margin: 0;
            font-size: 13px;
            color: #7A6A45;
            flex: 1;
        }

        .card-meta {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            font-weight: 600;
            color: #4A3B0A;
        }

        .card-actions {
            display: flex;
            gap: 8px;
            margin-top: 8px;
        }

        .card-actions a { flex: 1; text-decoration: none; }

        .card-actions button {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #E8D89A;
            background: #FFFEF7;
            color: #6B5B2A;
            font-weight: 600;
            cursor: pointer;
            font-size: 13px;
        }

        .card-actions button:hover { background: #FCE8A0; }

        .delete-btn { border-color: #E8C0A0 !important; color: #A05B3E !important; }
        .delete-btn:hover { background: #FBDFC9 !important; }
    </style>
</head>
<body>

<?php $updateProd = $updateProd ?? null; ?>
<?php $products = $products ?? []; ?>

<div class="topbar">
    <h1>Products</h1>
    <a href="<?= site_url('auth/logout') ?>">Logout</a>
</div>

<div class="form-card">
    <h2><?= $updateProd ? 'Edit Product' : 'Add Product' ?></h2>
    <form method="post" action="<?= $updateProd ? site_url('products/edit/'.$updateProd['id']) : site_url('products/create') ?>">
        <input type="text" name="product_name" placeholder="Product name"
               value="<?= $updateProd ? html_escape($updateProd['product_name']) : '' ?>" required>

        <input type="number" step="0.01" name="price" placeholder="Price"
               value="<?= $updateProd ? html_escape($updateProd['price']) : '' ?>" required>

        <textarea name="description" placeholder="Description"><?= $updateProd ? html_escape($updateProd['description']) : '' ?></textarea>

        <input type="number" name="quantity" placeholder="Quantity"
               value="<?= $updateProd ? html_escape($updateProd['quantity']) : '' ?>" required>

        <div class="form-actions">
            <button type="submit" class="btn"><?= $updateProd ? 'Update' : 'Create' ?></button>
            <?php if ($updateProd): ?>
                <a class="cancel-link" href="<?= site_url('products') ?>">Cancel</a>
            <?php endif; ?>
        </div>
    </form>
</div>

<div class="grid">
    <?php foreach ($products as $p): ?>
    <div class="card">
        <!-- PLACEHOLDER: swap this div's background-image (see .card-image CSS above)
             or add style="background-image:url('...')" here per product -->
        <div class="card-image">Add photo</div>

        <div class="card-body">
            <h3><?= html_escape($p['product_name'] ?? '') ?></h3>
            <p><?= html_escape($p['description'] ?? '') ?></p>
            <div class="card-meta">
                <span>₱<?= html_escape($p['price'] ?? '') ?></span>
                <span>Qty: <?= html_escape($p['quantity'] ?? '') ?></span>
            </div>
            <div class="card-actions">
                <a href="<?= site_url('products/edit/'.$p['id']) ?>">
                    <button type="button">Edit</button>
                </a>
                <a href="<?= site_url('products/delete/'.$p['id']) ?>"
                   onclick="return confirm('Delete this product?')">
                    <button type="button" class="delete-btn">Delete</button>
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

</body>
</html>