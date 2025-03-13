<?php include "../includes/header.php" ?>
<?php include "../includes/functions.php" ?>
<?php
$user_name = getUserName($_SESSION["user_id"]);
$user_posts = getPostsWithUserId($_SESSION["user_id"]);
$other_posts = getPostsWithoutUserId($_SESSION["user_id"]);
?>


<div class="container">
  <div class="row">
    <div class="col-9">
      <h1>Hello, <?php echo $user_name; ?>
      </h1>
    </div>
    <div class="col-3">
      <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#myModal1">
        New Post
      </button>
    </div>
  </div>
  <br />
  <h3>Your Posts</h3>
  <br />

  <div class="row">

    <?php $counter = 0 ?>
    <?php foreach ($user_posts as $post): ?>
      <?php if ($counter == 3) break; ?>

      <!-- Single Post Description -->
      <div class="col-12 shadow">
        <div class="py-3 pl-3">
          <h3><?php echo $post[1] ?></h3>
          <h6 class="text-decoration-underline">Description</h6>
          <p>
            <?php echo $post[3] ?>
          </p>

          <div class="row">
            <div class="col-7">
              <span> Author: By me </span>
            </div>
            <div class="col-5 d-flex">

              <button class="btn btn-success wl-2" type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#myModal2">
                Edit</button>
              <form method="post" action="dashboard.php">
                <button class="btn btn-danger" name="delete"
                  value="<?php echo base64_encode($post[0] . "," . $post[5]) ?>">Delete</button>
              </form>
              <a href="post.php?d=<?php echo base64_encode($post[0]); ?>" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Single Post Description -->

    <?php endforeach; ?>



    <!-- View more -->
    <div class="col-12 text-center mt-5" style="height: 50px">
      <button class="btn btn-primary">View More...</button>
    </div>
    <!-- View more -->
  </div>
  <br />
  <h3>Other Posts</h3>
  <br />

  <div class="row">


    <?php $counter = 0 ?>
    <?php foreach ($other_posts['posts'] as $post): ?>
      <?php if ($counter == 3) break; ?>

      <!-- Single Post Description -->
      <div class="col-12 shadow">
        <div class="py-3 pl-3">
          <h3><?php echo $post[1] ?></h3>
          <h6 class="text-decoration-underline">Description</h6>
          <p>
            <?php echo $post[3] ?>
          </p>

          <div class="row">
            <div class="col-7">
              <span> Author: <?php echo $other_posts['authors'][$counter];
                              $counter++; ?> </span>
            </div>
            <div class="col-5 d-flex">

              <button class="btn btn-success wl-2" type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#myModal2">
                Edit</button>
              <form method="post" action="posts.php">
                <button class="btn btn-danger" name="delete"
                  value="<?php echo base64_encode($post[0] . "," . $post[5]) ?>">Delete</button>
              </form>
              <a href="post.php?d=<?php echo base64_encode($post[0]); ?>" class="btn btn-primary">View More</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Single Post Description -->

    <?php endforeach; ?>



    <!-- View more -->
    <div class="col-12 text-center mt-5" style="height: 50px">
      <button class="btn btn-primary">View More...</button>
    </div>
    <!-- View more -->
  </div>
</div>


<?php include "modal.php" ?>


<?php include "../includes/footer.php" ?>