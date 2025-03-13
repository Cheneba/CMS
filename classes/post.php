<?php
class Post
{

  // protected $conn = $connection;

  public function getAll($conn)
  {
    $sql = "SELECT * FROM `posts`";

    $result = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_all($result);
    if ($rows[0]) {
      return $rows;
    } else {
      return false;
    }
  }

  public function getAllByUser($user_id, $conn)
  {
    $sql = "SELECT * FROM `posts` WHERE `author_id`=$user_id";

    $result = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_all($result);
    if ($rows[0]) {
      return $rows;
    } else {
      return false;
    }
  }

  public function getAllNotByUser($user_id, $conn)
  {

    $sql = "SELECT * FROM `posts` WHERE `author_id`!=$user_id";

    $result = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_all($result);
    if ($rows[0]) {
      return $rows;
    } else {
      return false;
    }
  }

  public function getOne($id, $conn)
  {
    $sql = "SELECT * FROM posts WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_all($result);
    if ($rows[0]) {
      return $rows;
    } else {
      return false;
    }
  }

  public function create($title, $image, $description, $content = "content", $author_id, $conn)
  {
    $sql = "INSERT INTO `posts` (`title`, `image`, `description`, `content`, `author_id`) VALUES ('" . $title . "', ' " . $image . "', '" . $description . "', '" . $content . "', '" . $author_id . "')";


    if (mysqli_query($conn, $sql)) {
      return true;
    } else {
      return false;
    }
  }

  public function update($id, $field_name, $value, $conn)
  {
    $sql = "UPDATE posts SET `$field_name` = '$value' WHERE `posts`.`id` = $id";

    if (mysqli_query($conn, $sql)) {
      return true;
    } else {
      return false;
    }
  }

  public function delete($id, $conn)
  {
    $sql = "DELETE FROM posts WHERE `posts`.`id` = $id";

    if (mysqli_query($conn, $sql)) {
      return true;
    } else {
      return false;
    }
  }
  public function deleteAll($conn) {}
}
