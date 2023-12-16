<?php
include 'config.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- tailwind  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="./assets/health-insurance.png" type="image/x-icon">
    <link rel="stylesheet" href="admin.css">
    <title>Metlife 2.0 - Registration</title>
  </head>
  <body >
  <div class="container-contact100">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form" method="post">
            <p class="text-center text-4xl bg-sky-500 rounded-xl p-3 m-5 text-white font-serif contact100-form-title">
            Metlife 2.0
            </p>
            <p class="text-2xl text-center pb-4 font-bold font-fatface ">
                    Your perfect destination for right medical insurance 
                </p>
            <span class="contact100-form-title">
                User Registration  
            </span>

            <div class="wrap-input100 validate-input" data-validate="Please enter Name">
                <input class="input100" type="text" name="name" placeholder="Name" required>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Please enter email">
                <input class="input100" type="text" name="email" placeholder="Email" required>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Please enter password">
                <input class="input100" type="text" name="password" placeholder="Password" required>
                <span class="focus-input100"></span>
            </div>
<div class=" flex gap-10 ">
            
            <div class="container-contact100-form-btn">
                <input class="bg-sky-500 contact100-form-btn rounded-xl" type="submit" name="adminlogin" value="Register">
            </div>
            
            <div class="container-contact100-form-btn">
                <input class="bg-sky-500 contact100-form-btn rounded-xl" type="submit" value="Back">
            </div>
            </div>
        </form>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_POST["email"];
$password = $_POST["password"];
$name = $_POST["name"];

$sql = "INSERT INTO users(name,email, password) VALUES ('$name','$email','$password');";
$result = mysqli_query($conn, $sql) ;

header("location: ./login.php");
mysqli_close($conn);
}

?>


</body>
</html>