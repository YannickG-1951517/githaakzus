<h2><?= esc($name) ?></h2>

<?php if (! empty($products) && is_array($products)): ?>

    <?php foreach ($products as $product): ?>

        <h3><?= esc($product['name']) ?></h3>

        <div class="main">
            <?= esc($product['body']) ?>
        </div>

    <?php endforeach; ?>

<?php else: ?>

    <h3>No products</h3>

    <p>Unable to find any products for you.</p>

<?php endif ?>
