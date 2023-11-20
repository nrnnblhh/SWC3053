<?php
include "dbconnect.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
    $entry_number = $_POST['entry_number'];
    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $isbn_number = $_POST['isbn_number'];
    $version = $_POST['version'];
    $shelf = $_POST['shelf'];

  $sql = "UPDATE `books` SET `entry_number`='$entry_number',`book_name`='$book_name',`author`='$author',`publisher`='$publisher',`isbn_number`='$isbn_number',`version`='$version',`shelf`='$shelf' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: adminonly.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>EDIT BOOKS</title>
  <style>
      body {
         background-color: #F3EEEA;
      }

  </style>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="color: white; font-weight: bold; background-color: #B0A695;">
    BLUU LIBRARY
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3 style="color: #776B5D; font-weight: bold;">Edit Book Detail</h3>
      <p class="text-muted" style="color: #776B5D;">Click update after information has been changed.</p>
    </div>

    <?php
    $sql = "SELECT * FROM `books` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Entry Number: </label>
            <input type="text" class="form-control" name="entry_number" value="<?php echo $row['entry_number'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Book Name: </label>
            <input type="text" class="form-control" name="book_name" value="<?php echo $row['book_name'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Author: </label>
          <input type="text" class="form-control" name="author" value="<?php echo $row['author'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Publisher: </label>
          <input type="text" class="form-control" name="publisher" value="<?php echo $row['publisher'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">ISBN Number: </label>
          <input type="text" class="form-control" name="isbn_number" value="<?php echo $row['isbn_number'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Version: </label>
          <input type="text" class="form-control" name="version" value="<?php echo $row['version'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Shelf: </label>
          <input type="text" class="form-control" name="shelf" value="<?php echo $row['shelf'] ?>">
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="admin_only.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>