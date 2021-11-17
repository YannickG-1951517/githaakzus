<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?= service('validation')->listErrors() ?>
    <form action="Login/create" method="post">
      <?= csrf_field() ?>
      <div class="form-group">
        <label for="firstName">First name:</label>
        <input type="text" class="form-control" id="firstName">
      </div>
      <div class="form-group">
        <label for="surname">Last name:</label>
        <input type="text" class="form-control" id="surname">
      </div>
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd">
      </div>
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
     </form>
  </body>
</html>
