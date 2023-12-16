<?php
$dataPoints = array(
    array("label" => "Dhaka", "y" => 41),
    array("label" => "Chittagong", "y" => 35, "indexLabel" => "Lowest"),
    array("label" => "Rajshahi", "y" => 50),
    array("label" => "Barishal", "y" => 45),
    array("label" => "Noakhali", "y" => 52),
    array("label" => "Sylhet", "y" => 68),
    array("label" => "Rangpur", "y" => 38),
    array("label" => "Coxs Bazar", "y" => 71, "indexLabel" => "Highest"),

);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Chart - admin </title>
    <script>
    window.onload = function () {
 
 var chart = new CanvasJS.Chart("chartContainer", {
   animationEnabled: true,
   exportEnabled: true,
   theme: "light1", // "light1", "light2", "dark1", "dark2"
   title:{
     text: "Area wise order chart"
   },
   axisY:{
     includeZero: true
   },
   data: [{
     type: "column", //change type to bar, line, area, pie, etc
     //indexLabel: "{y}", //Shows y value on all Data Points
     indexLabelFontColor: "#5A5757",
     indexLabelPlacement: "outside",   
     dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
   }]
 });
 chart.render();
  
 }
 </script>
     <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav class="">
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
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>