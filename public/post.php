<?php include "../includes/header.php" ?>
<?php include "../includes/functions.php" ?>
<?php $id = (int)base64_decode($_GET['d']) ?: 4;
$data = getPost($id);
if (isset($_POST['delete'])) {
  $d = explode(
    ',',
    base64_decode($_POST['delete'])
  );
  var_dump(deletePostWithUserId(...$d));
  header("Location: /CMS/public/posts.php");
}
?>



<div class="container">
  <div class="row shadow py-5 px-3">
    <!-- Single Post Description -->

    <div class="col-12">
      <h3><?php echo $data["post"][1] ?></h3>
    </div>
    <div class="col-12">
      <div class="py-3 pl-3">
        <img src="<?php echo $data["post"][2]; ?>" alt="<?php echo $data["post"][2]; ?>" width="100%" />
        <h6 class="text-decoration-underline">Description</h6>
        <p>
          <?php echo $data["post"][3]; ?>
        </p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, omnis eaque quis, culpa sed maiores
        similique sit voluptatibus perferendis repudiandae repellat, beatae quam. Veritatis omnis ut ipsum dicta
        delectus doloremque odit, itaque praesentium repellendus, odio reiciendis mollitia laboriosam saepe sunt magni
        iure fuga nisi recusandae a laborum molestiae! Itaque, tempore!
        <h6 class="text-decoration-underline">Content</h6>
        <p>
          <?php  ?>
        </p>
        <p>
          <?php echo $data["post"][4]; ?>
        </p>

        <div class="col-12 mt-5">
          <div class="row">
            <div class="col-9">
              <span> Author: <?php echo $data["author"] ?> </span>
            </div>
            <form method="post" action="dashboard.php" class="col-3">
              <button class="btn btn-success" type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#myModal2">Edit</button>
              <button href="#" class="btn btn-danger" name="delete"
                value="<?php echo base64_encode($post[0] . "," . $post[5]) ?>">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Single Post Description -->
  </div>
</div>

<?php include "modal.php" ?>


<?php include "../includes/footer.php" ?>