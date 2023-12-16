<?php
include 'config.php';
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Insurance</title>
    <link rel="shortcut icon" href="./assets/health-insurance.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Saira+Semi+Condensed&display=swap" rel="stylesheet">
    <style>

      *{
        font-family: 'Saira Semi Condensed', sans-serif;
      }
      .font-fatface {
        font-family: 'Abril Fatface', serif;
        letter-spacing: 2px;
      }
    </style>
</head>
<body class="bg-slate-200">
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
    <main>


        <section>
            <div>
                <p class="text-4xl text-center pt-10 font-extrabold font-fatfaace">
                    Welcome to Metlife 2.0 
                </p>
                <p class="text-2xl text-center pt-10 font-extrabold font-fatface ">
                    Your perfect destination for right medical insurance 
                </p>
            </div>
            <!-- cards -->
            <p class="text-center text-4xl pt-4 font-bold"> Our Packages </p>

            <div class="flex flex-wrap  justify-around m-4 px-10" id="packages">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>
                <!-- bronze card  -->
                <div class="card w-96 bg-base-100 shadow-xl m-10">
                    <figure class="px-10 pt-10 rounded-full">
                      <img src="data:image;base64,<?php echo base64_encode($fetch_product['image']); ?>" alt="bronze" class="" />
                    </figure>
                    <div class="card-body items-center text-center">
                      <h2 class="card-title"><?php echo $fetch_product['name']; ?></h2>
                      <p>
                          <li> Lowest monthly premiums</li>
                          <li> Higher out-of-pocket costs (deductibles, co payments, and coinsurance)</li>
                          <li> Suitable for relatively healthy individuals</li>
                          <li> Covers essential services with a higher share of costs paid by the insured</li>
                        </p>
                      <div class="card-actions">
                        <button class="btn btn-primary bg-sky-500 text-white" onclick="window.location.href='./checkout.php'">Buy Now </button>
                      </div>
                    </div>
                  </div>
            <?php 
            };
            };
            ?>
                <!-- silver card  -->
                <!-- <div class="card w-96 bg-base-100 shadow-xl m-10">
                    <figure class="px-10 pt-10 rounded-full">
                      <img src="./silver.jpg" alt="bronze" class="" />
                    </figure>
                    <div class="card-body items-center text-center">
                      <h2 class="card-title">Silver Package</h2>
                      <p>
                          <li> Moderate monthly premiums.</li>
                          <li> Balanced cost-sharing approach.</li>
                          <li> Chosen by those expecting moderate healthcare needs</li>
                          <li> Offers coverage for a broader range of services</li>
                        </p>
                      <div class="card-actions">
                        <button class="btn btn-primary bg-sky-500 text-white">Buy Now</button>
                      </div>
                    </div>
                  </div> -->
                <!-- gold card  -->
                <!-- <div class="card w-96 bg-base-100 shadow-xl m-10">
                    <figure class="px-10 pt-10 rounded-full">
                      <img src="./gold.jpg" alt="bronze" class="" />
                    </figure>
                    <div class="card-body items-center text-center">
                      <h2 class="card-title">Gold Package</h2>
                      <p>
                          <li> Higher monthly premiums</li>
                          <li> Lower out-of-pocket costs (lower deductibles and copayments).</li>
                          <li> Ideal for individuals with regular healthcare needs</li>
                          <li> More comprehensive coverage with a wider range of services</li>
                        </p>
                      <div class="card-actions">
                        <button class="btn btn-primary bg-sky-500 text-white">Buy Now</button>
                      </div>
                    </div>
                  </div> -->
            </div>
    
        </section>
        <section class="flex justify-center m-10">
            <!-- cover  -->
            <div class="relative">
                <img src="./cover.jpg" alt="" class="w-full p-10">
                <div>
                    <p class="absolute top-1/4 left-1/4  transform -translate-x-1/2 -translate-y-1/2 text-white font-bold text-3xl"> 
                        Make your own plan  <br> <br> Easy custom features   
                    </p>
                </div>
            </div>
            <!-- form  -->
            <div class="flex flex-col m-10">
                <!-- <form class="p-10" action=""> -->
                    <label class="" for="name"> Name: 
                        <input class="bg-white p-5 m-3 border-solid border-2 border-zinc-950" type="text" placeholder="Your name" id="name">
                    </label>
                    
                    <label for="email">Email: 
                        <input  class="bg-white p-5 m-3 border-solid border-2 border-zinc-950" type="text" placeholder="Your email" id="email">
                    </label>
            
                    <label for="phone">Phone:
                        <input  class="bg-white p-5 m-3 border-solid border-2 border-zinc-950" type="text" placeholder="Your Phone" id="phone">
                    </label>
                    <button class="btn btn-success mt-4 mx-3">Submit</button>
                    
                <!-- </form> -->

            </div>

           
        </section>
        <footer>
            <footer class="footer p-10 bg-neutral text-neutral-content" id="footer">
                <aside>
                  <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="fill-current"><path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path></svg>
                  <p>Metlife 2.0<br/>Providing reliable medical insurance since 1999</p>
                </aside> 
                <nav>
                  <header class="footer-title">Social</header> 
                  <div class="grid grid-flow-col gap-4">
                    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a>
                    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
                    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
                  </div>
                </nav>
              </footer>
        </footer>
    </main>
</body>
</html>