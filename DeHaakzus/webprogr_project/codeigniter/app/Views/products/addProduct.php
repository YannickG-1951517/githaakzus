<div class="container">
  <div class="row">
    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
      <div class="card border-0 shadow rounded-3 my-5">
        <div class="card-body p-4 p-sm-5">
          <h5 class="card-title text-center mb-5 fw-light fs-5">Product toevoegen</h5>
          <form action="/Products/createProduct" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="name">
              <label for="name">Naam</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" name="price">
              <label for="price">Prijs (in €)</label>
            </div>
            <div class="form-group mb-3">
              <label for="description">Beschrijving</label>
              <textarea type="text" class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="inputImages">Afbeeldingen: </label>
              <input type="file" class="form-control-file" name="inputImage">
            </div>
            <div class="d-grid">
              <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Toevoegen</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
