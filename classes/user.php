<?php
class User
{

  // protected $conn = $connection;

  public function getAll($conn)
  {
    $sql = "SELECT * FROM users";

    $result = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_all($result);
    if ($rows[0]) {
      return $rows;
    } else {
      return false;
    }
  }
  public function create($name, $email, $password, $conn)
  {
    $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('" . $name . "', '" . $email . "', '" . $password . "')";

    if (mysqli_query($conn, $sql)) {
      return true;
    } else {
      return false;
    }
  }
  public function getOne($id, $conn)
  {
    $sql = "SELECT * FROM users WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_all($result);
    if ($rows[0]) {
      return $rows;
    } else {
      return false;
    }
  }


  public function getUserId($email, $password, $conn)
  {
    $sql = "SELECT `users`.`id` FROM `users` WHERE `users`.`email`='$email' AND `users`.`password`='$password'";

    $result = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_all($result);

    if ($rows[0]) {
      return (int)$rows[0][0];
    } else {
      return false;
    }
  }

  public function verify($email, $password, $conn)
  {
    $sql = "SELECT * FROM users WHERE `email`='$email' AND `password`='$password'";

    $result = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_all($result);
    if ($rows[0]) {
      return $rows;
    } else {
      return false;
    }
  }

  public function update($id, $param, $value, $conn)
  {
    $field_name = $param == 'e' ? "email" : "name";
    $sql = "UPDATE users SET `$field_name` = '$value' WHERE `users`.`id` = $id";

    if (mysqli_query($conn, $sql)) {
      return true;
    } else {
      return false;
    }
  }

  public function delete($id, $conn)
  {
    $sql = "DELETE FROM users WHERE users.id = $id";

    if (mysqli_query($conn, $sql)) {
      return true;
    } else {
      return false;
    }
  }
  public function deleteAll($conn) {}
}
