<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Stuffs - admin</title>
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
</body>
</html>