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
    $password = password_hash($password,  PASSWORD_BCRYPT);
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


  public function getUserId($email, $conn)
  {
    $sql = "SELECT `users`.`id` FROM `users` WHERE `users`.`email`='$email'";

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
    $sql = "SELECT `users`.`password` FROM `users` WHERE `users`.`email`='$email'";

    $result = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_all($result);
    $p_word = $rows[0][0];

    if (password_verify($password, $p_word)) {
      return true;
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
