<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <title>Checkout Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>

    <?php

include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $address = $_POST['address'];
  

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         // $product_count += number_format($product_item['qty']);
         $product_name[] = $product_item['name'] .' ('. $product_item['qty'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['qty']);
         $price_total += $product_price;
         
      };
   };

   // $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `orders`(name, number, email, method, address,  total_price) VALUES('$name','$number','$email','$method', '$address', '$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <style>
      .order-message-container {
        
        display: flex;
        justify-content:center;
        align-items: center;
      }
      .order-message-container h3{
        font-size: 30px;
      }
      </style>
      <div class='order-message-container py-5'>
      <div class='message-container'>
         <h3>Thank you for shopping!</h3>
         <div class='order-detail'>
           
            <span class='total text-center'><b>Grand Total : $".$price_total."/-  </b></span>
         </div>
         <div class='customer-details'>
            <p><b> Customer name : </b><span>".$name."</span> </p>
            <p><b>Contact number : </b><span>".$number."</span> </p>
            <p><b>Your E-mail : </b><span>".$email."</span> </p>
            <p><b>Shipping Address : </b><span>".$address."</span> </p>
            <p><b>Payment Mode : </b><span>".$method."</span> </p>
            
         </div>
            <a href='shop.php' class='button-div'>Done</a>
         </div>
      </div>
      ";
      mysqli_query($conn, "DELETE FROM cart");
   }

}

?>
<div class="container">

    <section class="checkout-form">

            <form action="" method="post">

                <style>
                .details {
                    background-color: white;
                    padding: 20px;
                    border-radius: 5px;
                }

                .inputBox {
                    margin-bottom: 10px;
                }

                .inputBox span {
                    font-size: 16px;
                    font-weight: bold;
                    color: #333;
                }

                .inputBox input {
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 3px;
                }

                .select {
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 3px;
                }

                .btn {
                    background-color: blue;
                }
                </style>
    <header class="">
        <nav>
            <div
                class="navbar flex justify-between flex-row-reverse md:flex-row-reverse md:bg-sky-500 rounded-xl  py-6 ">

                <div class="md:hidden flex-row-reverse">
                    <button class="btn btn-ghost normal-case text-black">
                        <span class="icon">
                            <i class="fas fa-bars"></i>
                        </span>
                    </button>
                </div>

                <div class="hidden md:flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 ">
                    <a class="btn btn-ghost text-lg text-white font-medium" href="./index.php">Home</a>
                    <a class="btn btn-ghost text-lg text-white font-medium" href="#footer">About Us</a>
                    <a class="btn btn-ghost text-lg text-white font-medium" href="#packages">Packages</a>
                    <a class="btn btn-ghost text-lg text-white font-medium" href="./login.php" > 👤 Login </a>
                </div>

                <div class="flex justify-between flex-row-reverse">

                    <a class="btn btn-ghost normal-case text-4xl text-black font-fatface font-bold">
                       Metlife 2.0 
                    </a>
                </div>
            </div>
        </nav>
    </header>
                <div class="details">

                    <div class="inputBox">
                        <span>Name</span>
                        <input type="text" placeholder="Full Name" name="name" required>
                    </div>
                    <div class="inputBox">
                        <span>Number</span>
                        <input type="text" placeholder="Contact Number" name="number" required>
                    </div>
                    <div class="inputBox">
                        <span>Email</span>
                        <input type="email" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="inputBox">
                        <span>Payment method</span>
                        <select name="method">
                            <option value="cash on delivery" selected>Cash On Devlivery</option>
                            <option value="credit card">Credit Card</option>
                            <option value="paypal">Paypal</option>
                            <option value="bkash">Bkash</option>
                            <option value="nagad">Nagad</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Package </span>
                        <select name="method">
                            <option value="Bronze" selected>Bronze</option>
                            <option value="Silver">Silver</option>
                            <option value="Gold">Gold</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Address </span>
                        <input type="text" placeholder="Delivery Address" name="address" required>
                    </div>
                </div>
                <input type="submit" value="order now" name="order_btn" class="btn">
            </form>
        </section>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>