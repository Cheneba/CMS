<?php include "../includes/header.php" ?>
<?php include "../includes/functions.php" ?>
<?php

$posts = getAllPosts();

if (isset($_POST['delete'])) {
  $d = explode(',', base64_decode($_POST['delete']));
  if (deletePostWithUserId(...$d)) {
    header("Location: /CMS/public/posts.php");
  }
}

if (isset($_POST["submit-newmodal"])) {
  $title = htmlspecialchars($_POST['title']);
  $description = htmlspecialchars($_POST['description']);
  $content = htmlspecialchars($_POST['content']);
  $user_id = $user_id ?: 2;

  if ($title && $description && $user_id) {
    if (newPostWithUserId($user_id, $title, $description, $content)) {
      header("Location: /CMS/public/posts.php");
    }
  }
}


if (isset($_POST["submit-editmodal"])) {
  $title = htmlspecialchars($_POST['title']);
  $description = htmlspecialchars($_POST['description']);
  $content = htmlspecialchars($_POST['content']);
  $user_id = $user_id ?: 2;

  if ($title && $description && $user_id) {
    if (newPostWithUserId($user_id, $title, $description, $content)) {
      $msg = "Successful";
    }
  }
}

?>
<div class="container">
  <div class="row">
    <div class="col-12 mb-5">
      <div class="row">
        <div class="col-8"></div>
        <div class="col-3">
          <button class="btn btn-outline-success" type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#myModal1">
            New Post
          </button>
        </div>
      </div>
    </div>
    <?php $counter = 0 ?>
    <?php foreach ($posts['posts'] as $post): ?>

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
            <span> Author: <?php echo $posts['authors'][$counter];
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