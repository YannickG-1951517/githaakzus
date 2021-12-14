
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="loginForm.css">
  </head>
    <body>
      <?= service('validation')->listErrors() ?>
      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
              <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">New Account</h5>
                <form action="/Login/create" method="post">
                  <?= csrf_field() ?>
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
                  <div class="d-grid">
                    <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Create Account</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
