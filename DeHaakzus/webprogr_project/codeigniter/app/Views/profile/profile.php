
<div class="container">
  <div class="">
    <div class="col-12 col-md-8 col-lg-6 mx-auto mt-3 mb-3">
      <div class="card text-center">
        <div class="card-body">
          <img src="" alt="No Profile Picture">
          <h5><?php
          $session = session();
          echo $session->get('user')['firstname']." ".$session->get('user')['surname'];
          ?></h5>
          <p><?php
          echo "E-mail: ".$session->get('user')['email'];
          ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
