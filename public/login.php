<?php include "../includes/header.php" ?>
<?php include "../includes/functions.php" ?>
<?php echo $msg ?: null; ?>

<div class="container">
  <div class="shadow mx-auto pb-3" style="width: 350px; margin-bottom: 140px; margin-top: 140px">
    <div class="px-5 py-2">
      <form action="" method="post">
        <br />
        <br />
        <!-- User input -->
        <div class="form-floating">
          <input type="text" name="email" id="email" class="form-control" placeholder="Email" />
          <label for="email" class="form-label">Email</label>
          <br />
        </div>
        <!-- Password input -->
        <div class="form-floating">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
          <label for="password" class="form-label">Password</label>
          <br />
        </div>
        <input type="checkbox" name="checkbox" id="checkbox" class="form-check-label" />
        <!-- Remember me checkbox -->
        <label for="checkbox">Remember me</label>
        <br />
        <br />
        <!-- Login button -->
        <button type="submit" name="submit-login" class="btn btn-primary btn-lg"
          style="margin-left: 90px">Login</button>
      </form>
    </div>
  </div>
</div>


<?php include "../includes/footer.php" ?>