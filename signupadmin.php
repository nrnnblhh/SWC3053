<?php
// Database connection (replace with your database credentials)
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

// Admin Registration logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); //hash the password

    try {
        $stmt = $pdo->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);
        $registrationSuccess = true;
    } catch (PDOException $e) {
        $registrationError = "Registration failed: " . $e->getMessage();
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

   <title>Admin Sign Up</title>

   <style>
      body {
         background-color: #F3EEEA;
      }

      label{
         color: #776B5D;
         font-weight: bold;
      }

      .navbar {
         background-color: #665A48;
         color: white;
         font-weight: bold;
      }

      .container {
         background-color: #B0A695;
         border-radius: 20px;
         padding: 50px;
         margin-top: 40px;
      }

      .form-label {
         color: #8b4513;
      }

      .btn-success {
         background-color: #8b4513;
         border: none;
      }

      .btn-success:hover {
         background-color: #634b32;
      }

   </style>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
      BLUU LIBRARY
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3 style="color: white; font-weight: bold;">ADMIN SIGN UP</h3>
      </div>

      <?php if (isset($registrationError)): ?>
         <p style="color: red;"><?php echo $registrationError; ?></p>
      <?php endif; ?>

      <?php if (isset($registrationSuccess)): ?>
         <p style="color: white;">Registration successful! You can login as admin now.</p>
      <?php endif; ?>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label" style="color: white; font-weight: bold;">Username: </label>
                  <input type="text" class="form-control" name="username" placeholder="Username" required>
               </div>

               <div class="col">
                  <label class="form-label" style="color: white; font-weight: bold;">Password: </label>
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
               </div>
            </div>

            <div>
               <button type="submit" style="background-color: #776B5D"; class="btn btn-success" name="register">SIGN UP</button><br><br>
               <a href="loginadmin.php" class="btn btn-dark mb-3">Back</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>