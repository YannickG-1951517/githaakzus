<?= service('validation')->listErrors() ?>
<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card border-0 shadow rounded-3 my-5">
        <div class="card-body p-4 p-sm-5">
          <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
          <form action="/Login/login" method="post">
            <?= csrf_field() ?>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" placeholder="name@example.com">
              <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="pword" placeholder="Password">
              <label for="pword">Password</label>
            </div>
          <!--     <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
              <label class="form-check-label" for="rememberPasswordCheck">
                Remember password
              </label>
            </div> -->
            <div class="d-grid float-start">
              <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign in</button>
            </div>
            <div class="btn text-uppercase fw-bold float-end">
              <a href="createAcc">Create Account</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
