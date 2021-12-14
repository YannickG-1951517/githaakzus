<div class="container bg-light">
    <a class="btn btn-light btn-outline-primary mt-3 mb-3" href="newMessage">Nieuw bericht</a>
    <div class="row g-1">
    <?php if (! empty($messages) && is_array($messages)): ?>
        <?php foreach ($messages as $message): ?>
          <div class="col-12">
            <div class="card mt-3 mb-3 max-size">
              <div class="card-body">
                <h5 class="card-title"><?php
                    $model = model(UserModel::class);
                    echo $model->getUserById($message['sender_id'])['firstname'];
                 ?></h5>
                <p class="card-text"><?= esc($message['message']) ?></p>
                <button class="btn btn-primary float-end">Antwoorden</button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
          <h3>No messages</h3>
          <p>Seems like you have no friends to send you messages.</p>
      <?php endif ?>
    </div>
</div>