<?php
include 'config.php';
session_start();
$statement = "SELECT * FROM orders";
$result = mysqli_query($conn, $statement);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>

    <style>
      table {
    border-collapse: collapse;
    margin: 0 auto;
    text-align: center;
  }
  
  h2{
    font-size: 25px;
    text-align: center;

  }

  td, th {
    border: 1px solid white;
    padding: 8px;
  }
    </style>
    <link rel="shortcut icon" href="./assets/health-insurance.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav>
            <div
                class="navbar flex justify-between flex-row-reverse md:flex-row-reverse md:bg-sky-500   py-4">

                <div class="md:hidden flex-row-reverse">
                    <button class="btn btn-ghost normal-case text-black">
                        <span class="icon">
                            <i class="fas fa-bars"></i>
                        </span>
                    </button>
                </div>

                <div class="hidden md:flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 ">
                    <a class="btn btn-ghost text-lg text-white font-medium"href="./chart.php">Order chart </a>
                    <a class="btn btn-ghost text-lg text-white font-medium"href="./showOrder.php">Recent Orders</a>
                    <a class="btn btn-ghost text-lg text-white font-medium "href="./addProduct.php">Add Product</a>
                    <a class="btn btn-ghost text-lg text-white font-medium "href="./manageStuffs.php">Manage Stuffs</a>
                    <a class="btn btn-ghost text-lg text-white font-medium" href="./login.php" > 👤 Logout </a>
                </div>

                <div class="flex justify-between flex-row-reverse">

                    <a class="btn btn-ghost normal-case text-4xl text-black font-fatface font-bold">
                    Metlife 2.0 - admin panel
                    </a>
                </div>

            </div>
  </nav>
    <p class=" text-4xl font-semibold text-center p-4 mb-4 "> Recent Orders </p>

<div class="overflow-x-auto p-8 mx-4">
  <table class="table table-zebra">
    <!-- head -->
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Package</th>
        <th>Address</th>
      <!-- <th>Total Price</th> -->
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($row['name']) . "</td>";
          echo "<td>" . htmlspecialchars($row['number']) . "</td>";
          echo "<td>" . htmlspecialchars($row['email']) . "</td>";
          echo "<td>" . htmlspecialchars($row['method']) . "</td>";
          echo "<td>" . htmlspecialchars($row['address']) . "</td>";
          //echo "<td>" . htmlspecialchars($row['total_price']) . "</td>";
          echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<?php
mysqli_close($conn);
?>

</body>
</html>
