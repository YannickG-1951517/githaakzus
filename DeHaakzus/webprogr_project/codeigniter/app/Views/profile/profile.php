
<div class="container">
  <div class="">
    <div class="col-12 col-md-8 col-lg-6 mx-auto mt-3 mb-3">
      <div class="card text-center mb-3">
        <div class="card-body">
          <img src="<?php echo "/uploads/".$image['image'] ?>" alt="Geen profielfoto gevonden">
          <h5><?= esc($user['firstname']).' '.esc($user['surname']) ?></h5>
          <?php if($user['street'] != null): ?>
          <p><?= esc($user['email']) ?></p>
          <p><?= esc($user['street'].' '.$user['house_nr']) ?></p>
          <p><?= esc($user['city'].', '.$user['country']) ?></p>
          <?php endif; ?>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <a class="btn btn-primary" href="updateProfile">Profiel aanpassen</a>
      </div>
    </div>
  </div>
</div>
