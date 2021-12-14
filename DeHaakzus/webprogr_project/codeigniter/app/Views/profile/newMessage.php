<div class="container">
  <div class="row">
    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
      <div class="card border-0 shadow rounded-3 my-5">
        <div class="card-body p-4 p-sm-5">
          <h5 class="card-title text-center mb-5 fw-light fs-5">Product toevoegen</h5>
          <form action="/Profile/createMessage" method="post">
            <?= csrf_field() ?>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="receiver">
              <label for="receiver">Ontvanger</label>
            </div>
            <div class="form-group mb-3">
              <label for="description">Bericht</label>
              <textarea type="text" class="form-control" name="message" rows="5"></textarea>
            </div>
            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Versturen</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
