<?php
include "dbconnect.php";
$id = $_GET["id"];

//Delete for books
$sqlBooks = "DELETE FROM `books` WHERE id = $id";
$resultBooks = mysqli_query($conn, $sqlBooks);

//Delete for users
$sqlUsers = "DELETE FROM `users` WHERE id = $id";
$resultUsers = mysqli_query($conn, $sqlUsers);

if ($resultBooks) {
  header("Location: adminonly.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}

if ($resultBooks) {
  header("Location: adminonly.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}

if ($resultUsers) {
  header("Location: adminonly.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}