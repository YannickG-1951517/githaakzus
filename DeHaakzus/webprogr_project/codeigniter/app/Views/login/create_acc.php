<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card border-0 shadow rounded-3 my-5">
        <div class="card-body p-4 p-sm-5">
          <h5 class="card-title text-center mb-5 fw-light fs-5">Nieuw Profiel</h5>
          <form action="/Login/create" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <?= service('validation')->listErrors() ?>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="John" name="firstname">
                <label for="firstname">First Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="Doe" name="surname">
                <label for="surname">Last Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" placeholder="name@email.com" name="email">
                <label for="email">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" placeholder="Password" name="pword">
                <label for="pword">Password</label>
              </div>
              <div class="form-group mb-3">
                <label for="profileImage">Profielfoto: </label>
                <input type="file" class="form-control-file" name="profileImage">
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Profiel Aanmaken</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>