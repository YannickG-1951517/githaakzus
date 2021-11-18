<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?= service('validation')->listErrors() ?>
    <form action="/Login/create" method="post">
      <?= csrf_field() ?>
      <div class="form-group">
        <label for="firstname">First name:</label>
        <input type="text" class="form-control" name="firstname">
      </div>
      <div class="form-group">
        <label for="surname">Last name:</label>
        <input type="text" class="form-control" name="surname">
      </div>
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" name="email">
      </div>
      <div class="form-group">
        <label for="pword">Password:</label>
        <input type="password" class="form-control" name="pword">
      </div>
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
     </form>
  </body>
</html>
