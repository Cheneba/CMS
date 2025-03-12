<div class="modal fade" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3>New Post Details</h3>
        <button class="btn-close" data-bs-dismiss="modal" data-bs-target="#modal"></button>
      </div>
      <div class="modal-body">
        <form action="/CMS/public/posts.php" method="post">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control">

          <label for="description">Description</label>
          <input type="text" name="description" id="description" class="form-control">
          <br>
          <label for="image"></label>
          <input type="file" name="image" id="image">
          <br>
          <label for="content">Content</label>
          <textarea type="text" name="content" id="content" class="form-control"
            style="width:450px; height: 100px;"></textarea>
          <br>
          <button type="submit" name="submit-newmodal" class="btn btn-success">Create New Post</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">Edit Post Details
        <button class="btn-close" data-bs-dismiss="modal" data-bs-target="#modal"></button>
      </div>
      <div class="modal-body">
        <form action="/CMS/public/posts.php" method="post">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control">

          <label for="description">Description</label>
          <input type="text" name="description" id="description" class="form-control">
          <br>
          <label for="image">Upload a different image</label>
          <input type="file" name="image" id="image">
          <br>
          <label for="content">Content</label>
          <textarea type="text" name="content" id="content" class="form-control"
            style="width:450px; height: 100px;"></textarea>
          <br>
          <button type=" submit" name="submit-newmodal" class="btn btn-success">Create New Post</button>
        </form>
      </div>
    </div>
  </div>
</div>