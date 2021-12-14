
<footer class="bg-light text-center">
  <?php
  $session = session();
  if ($session->get('logged-in') == true){
    echo $session->get('user')['firstname']." is logged in";
  }
  ?><br>
  <!-- <?php
  $session = session();
  if ($session->get('logged-in') == true){
    echo "user is logged in";
  }else{
    echo "user is not logged in";
  }
  ?><br> -->

  <!-- <?php echo $session->get('debug'); ?><br> -->
  <em>&copy; 2021</em><br>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
