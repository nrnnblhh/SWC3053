<?php
// Connect to the database
$host = 'localhost';
$dbname = 'bluulibrary';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
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

   <title>Bluu Library</title>

   <style>
      body {
         background-color: #fdf5e6;
      }

      .navbar {
         background-color: #B0A695;
         color: #fff;
      }

      .btn-logout {
         background-color: #776B5D;
         color: #fff;
      }

      .btn-logout:hover {
         background-color: #fff;
      }

      .table {
         background-color: #F3EEEA;
      }

      .table th,
      .table td {
         border: 1px solid #F3EEEA;
         padding: 8px;
      }

      .table thead th {
         background-color: #B0A695;
         color: #fff;
      }
   </style>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="color: white; font-weight: bold;">
      BLUU LIBRARY
   </nav>

   <div class="container">
      <a href="loginuser.php" class="btn btn-logout mb-3">Log Out</a>
      <table class="table table-hover text-center">
         <thead class="table-dark">
            <tr>
               <th scope="col">ID</th>
               <th scope="col">Entry Number</th>
               <th scope="col">Book Name</th>
               <th scope="col">Author</th>
               <th scope="col">Publisher</th>
               <th scope="col">ISBN Number</th>
               <th scope="col">Version</th>
               <th scope="col">Shelf</th>
            </tr>
         </thead>
         <?php
         // Fetch and display list of books
         $stmt = $pdo->query("SELECT * FROM books");
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         ?>
            <tr>
               <td><?php echo $row["id"] ?></td>
               <td><?php echo $row["entry_number"] ?></td>
               <td><?php echo $row["book_name"] ?></td>
               <td><?php echo $row["author"] ?></td>
               <td><?php echo $row["publisher"] ?></td>
               <td><?php echo $row["isbn_number"] ?></td>
               <td><?php echo $row["version"] ?></td>
               <td><?php echo $row["shelf"] ?></td>
            </tr>
         <?php
         }
         ?>
      </table>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>