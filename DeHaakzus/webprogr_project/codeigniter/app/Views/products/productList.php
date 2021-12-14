<div class="container bg-light">
  <div class="row g-3">
      <?php if (! empty($products) && is_array($products)): ?>
        <?php foreach ($products as $product): ?>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card text-center mt-3 max-size">
              <div class="card-body">
                <img src="" alt="No Image Found">
                <a href="/products/<?= esc($product['slug'], 'url') ?>">
                  <h5 class="card-title"><?= esc($product['name']) ?></h5>
                </a>
                <p class="card-text"><?= esc($product['body']) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
          <h3>No products</h3>

          <p>Unable to find any products for you.</p>
      <?php endif ?>
  </div>
</div>
