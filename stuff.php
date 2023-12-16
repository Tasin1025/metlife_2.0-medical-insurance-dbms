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

    <!--- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@600;700;800&family=Poppins:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="shortcut icon" href="./fav.png" type="image/x-icon">
    <title>Add A Product</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
    
    
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>

  </head>
  <body>
  
<?php
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_description']) && isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $pName = $_POST['product_name'];
        $price = $_POST['product_price'];
        $des = $_POST['product_description'];
        
        // Handle image upload
        $imgData = file_get_contents($_FILES['img']['tmp_name']);

        // Use prepared statement to insert image binary data into the database
        $statement = $conn->prepare("INSERT INTO products(name, image, price, product_details) VALUES(?, ?, ?, ?)");
        $statement->bind_param("ssds", $pName, $imgData, $price, $des);

        if ($statement->execute()) {
            session_start();
            echo "<script> alert('Product Added'); </script>";
        } else {
            // Handle insertion error
            echo "<script>alert('Product addition failed.');</script>";
        }

        $statement->close();
    } else {
        // Handle missing or incomplete form data
        echo "<script>alert('Please fill in all required fields.');</script>";
    }
}
?>

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
                    <a class="btn btn-ghost text-lg text-white font-medium" href="./showOrder.php">Recent Orders</a>
                    <a class="btn btn-ghost text-lg text-white font-medium"href="./addProduct.php">Add Product</a>
                    <a class="btn btn-ghost text-lg text-white font-medium" href="./manageStuffs.php">Manage Stuffs</a>
                    <a class="btn btn-ghost text-lg text-white font-medium" href="./login.php" > 👤 Logout </a>
                </div>

                <div class="flex justify-between flex-row-reverse">

                    <a class="btn btn-ghost normal-case text-4xl text-black font-fatface font-bold">
                    Metlife 2.0 - admin panel
                    </a>
                </div>

            </div>
  </nav>
  
    
    <h2 class="text-center py-3 text-3xl"><b>Add Stuff</b></h2>
    <section class="container  my-2 w-50  p-3">
        <div class="text-center text-2xl font-semibold">
        <form action="addProduct.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <label class="px-10">Name</label>
                <input class="border-2 border-solid border-black rounded p-2" type="text" id="product-name" name="product_name" required>
            </fieldset>
            <fieldset>
                <label>Email</label>
                <input class="border-2 border-solid border-black rounded p-2 m-2 mr-7 " type="number" id="product-price" name="product_price" min="0" step="0.01" required>
                </fieldset>
            <fieldset>
                <label class="p-2">Description</label>
                <textarea id="product-description" class="form-control" name="product_description" rows="6" required></textarea>  
            </fieldset>
            <fieldset class="flex justify-around m-3" >
            <label >Product Image</label><br>
                <input type="file" id="img" name="img" accept="image/*">
            </fieldset>  
            <fieldset>
                <label>Department </label>
                <select id="product-category" name="product_category">
                    <option value="games">Makreting</option>
                    <option value="electronics">Management</option>
                    <option value="jersey">HR</option>
            
                </select>
            </fieldset>
            <input class="btn btn-success" id="submit" type="submit" value="Add Product">
            </form>
        </div>
        
    </section>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
