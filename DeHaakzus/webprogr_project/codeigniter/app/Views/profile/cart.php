<div class="container bg-light">
  <div class="row">
  <?php if (! empty($products) && is_array($products)): ?>
        <?php
        $counter = 0;
        foreach ($products as $product): ?>
        <div class="col-12">
          <div class="card mt-3">
            <div class="card-body">
              <img class="float-start col-3 col-md-2 col-lg-1" src="<?php echo "uploads/".$images[$counter]['image'] ?>" alt="no image found"> 
              <h5 class="float-start"><?= esc($product['name']) ?></h5>
              <div class="float-end">
                <p><?php echo '€ '.$product['price'] ?></p>
                <p><?php echo 'Aantal: '.$cartItem[$counter++]['amount'] ?></p>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-primary">+</button>
                  <button type="button" class="btn btn-primary">-</button>
                </div>
              </div>

            </div>
            
          </div>
          
        </div>
        <?php endforeach; ?>
        <?php else: ?>
          <h3>No products</h3>
          <p>No products added to your cart</p>
        <?php endif ?>
  </div>
</div>
