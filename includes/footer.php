<!-- Footer -->
<footer class="text-center text-white" style="background-color: rgb(80, 79, 79)">
  <div class="container">
    <section class="mt-5">
      <!-- Grid row-->
      <div class="row text-center justify-content-center pt-5">
        <?php if ($_SESSION["status"] === "logged in"): ?>


          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="/CMS/public/dashboard.php" class="text-white">Home</a>
            </h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="/CMS/public/posts.php" class="text-white">Posts</a>
            </h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="/CMS/public/logout.php" class="text-white">Logout</a>
            </h6>
          </div>
          <!-- Grid column -->


        <?php else: ?>


          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="/CMS/public/dashboard.php" class="text-white">Home</a>
            </h6>
          </div>
          <!-- Grid column -->
          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="/CMS/public/login.php" class="text-white">Login</a>
            </h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="/CMS/public/register.php" class="text-white">Register</a>
            </h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="/CMS/public/post.php" class="text-white">View sample post</a>
            </h6>
          </div>
          <!-- Grid column -->


        <?php endif; ?>


      </div>
      <!-- Grid row-->
    </section>
  </div>

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    &copy; 2020 Al rights reserved:<a
      href="<?php if ($_SESSION["status"] === "logged in") echo '/CMS/public/dashboard.php';
            else echo '/CMS/public/index.php' ?>">Brand
      | <?php echo $user_name; ?></a>
  </div>
  <!-- Copyright -->
</footer>
<!-- End of Footer -->
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
  integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="/CMS/public/assets/js/scripts.js"></script>

</html>