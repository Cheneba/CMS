<?php

include "../config/database.php";
include "../classes/post.php";
include "../classes/user.php";

$user_object = new User();
$post_object = new Post();

// var_dump($user_object->getAll($connection));
// echo "<br>";
// echo "<br>";
// var_dump($post_object->getAll($connection));

function login() {}
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
function getPostsWithUserId() {}
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