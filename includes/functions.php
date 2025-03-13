<?php

include "../config/database.php";
include "../classes/post.php";
include "../classes/user.php";

$user_object = new User();
$post_object = new Post();


function loggable($user_name, $email)
{
  global $user_object;
  global $connection;

  if ($user_object->verify($user_name, $email, $connection)) {
    if ($user_id = $user_object->getUserId($user_name, $email, $connection)) {
      return $user_id;
    }
  } else {
    return false;
  }
}
function createUser($name, $email, $password)
{
  global $user_object;
  global $connection;

  if ($user_object->create($name, $email, $password, $connection)) {
    if ($user_id = $user_object->getUserId($name, $email, $connection)) {
      return $user_id;
    }
  } else {
    return false;
  }
}
function logout() {}
function getAllPosts()
{

  global $post_object;
  global $user_object;
  global $connection;

  $posts = $post_object->getAll($connection) ?: false;
  foreach ($posts as $post) {
    $author_id = $post[5];
    $authors[] = $user_object->getOne($author_id, $connection)[0][1] ?: false;
  }

  return ["posts" => $posts, "authors" => $authors];
}
function getPostsWithUserId($user_id)
{
  global $post_object;
  global $user_object;
  global $connection;

  $posts = $post_object->getAllByUser($user_id, $connection) ?: false;
  return $posts;
}
function getPost($id)
{
  global $post_object;
  global $user_object;
  global $connection;

  $author_id = $post_object->getOne($id, $connection)[0][5] ?: false;
  $post = $post_object->getOne($id, $connection)[0] ?: false;
  $author = $user_object->getOne($author_id, $connection)[0][1] ?: false;
  return ["post" => $post, "author" => $author];
}
function editPostWithUserId() {}
function newPostWithUserId($user_id, $title, $description, $content, $image = "No image")
{
  global $post_object;
  global $connection;

  if ($post_object->create($title, $image, $description, $content, $user_id, $connection)) {
    return true;
  } else {
    return false;
  }
}
function deletePostWithUserId($post_id, $user_id)
{
  global $post_object;
  global $user_object;
  global $connection;

  if ($p = $user_object->getOne($user_id, $connection)) {
    if ($p[0][0] === $user_id) {
      try {
        return $post_object->delete($post_id, $connection);
      } catch (Exception $e) {
      }
    }
  } else {
    return false;
  }
}
function deleteAllPostsWithUserId() {}



if (isset($_POST["submit-newmodal"])) {
  $title = htmlspecialchars($_POST['title']);
  $description = htmlspecialchars($_POST['description']);
  $content = htmlspecialchars($_POST['content']);
  $user_id = $_SESSION["user_id"] ?: 2;

  if ($title && $description && $user_id) {
    if (newPostWithUserId($user_id, $title, $description, $content)) {
      $msg = "Successful";
    }
  }
}


if (isset($_POST["submit-editmodal"])) {
  $title = htmlspecialchars($_POST['title']);
  $description = htmlspecialchars($_POST['description']);
  $content = htmlspecialchars($_POST['content']);
  $user_id = $_SESSION["user_id"] ?: 2;

  if ($title && $description && $user_id) {
    if (newPostWithUserId($user_id, $title, $description, $content)) {
      $msg = "Successful";
    }
  }
}


if (isset($_POST['submit-login'])) {
  $email = htmlspecialchars($_POST["email"]);
  $password = htmlspecialchars($_POST["password"]);
  $r_me = htmlspecialchars($_POST["checkbox"]);

  if ($email && $password) {
    try {
      if ($user_id = loggable($email, $password)) {
        session_start();

        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        $_SESSION["r_me"] = $r_me;
        $_SESSION["status"] = "logged in";
        $_SESSION["user_id"] = $user_id;

        header("Location: /CMS/public/dashboard.php");
      }
    } catch (Exception $e) {
      $msg = "User does not exist";
    }
  }
}


if (isset($_POST['submit-register'])) {
  $name = htmlspecialchars($_POST["name"]);
  $password = htmlspecialchars($_POST["password"]);
  $email = htmlspecialchars($_POST["email"]);

  var_dump($name && $email && $password);
  if ($name && $email && $password) {
    try {
      if ($user_id = createUser($name, $email, $password)) {
        session_start();

        $_SESSION["name"] = $name;
        $_SESSION["password"] = $password;
        $_SESSION["email"] = $email;
        $_SESSION["user_id"] = $user_id;
        $_SESSION["status"] = "logged in";

        header("Location: /CMS/public/dashboard.php");
      }
    } catch (Exception $e) {
      $msg = "Validation Error";
    }
  }
}
