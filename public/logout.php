<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
if ($_SESSION['status'] === "logged in") {
  unset($_SESSION);
  session_destroy();
  header("Location: /CMS/public/index.php");
}
