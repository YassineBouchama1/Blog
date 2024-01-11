<!DOCTYPE html>
<html lang="en">

<head>
    
    <script src="midleWars\admin.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../tailwind.config.js"></script>



</head>

<body class=" flex  flex-row w-[100%] p-5 m-0 text-[#111C2D] bg-[#f0f5f9] dark:bg-slate-800 text-base font-normal leading-5 font-sans">


    <!-- start sidebar -->
    <?php require('layout/sidebar/Sidebar.php') ?>

    <!-- start sidebar -->

    <!--  inside page  -->
    <div class="w-full ml-auto block lg:ml-[280px]  px-5 rounded-lg lg:px-[16px]  max-w-[1200px] box-border ">



        <!-- Header Start -->

        <?php require('layout/header/Header.php') ?>

        <!-- Header Start -->




        <!--  start page content  -->
        <div class="rounded-[18px] h-full mt-6 ">



            <!--  start Cards  -->
            <section class=" h-auto bg-white dark:bg-[#111c2d] dark:text-white text-black transition-shadow rounded-[18px] shadow-md  backdrop-blur-md  w-full ">
                <h5 class="dark:text-white border-b py-2     text-2xl font-semibold leading-tight px-4 ">
                    Categories</h5>
                <div class="p-4">

                    <?php require('components/categories/card.php') ?>
                </div>
            </section>


            <!--  end Cards  -->




        </div>
        <!--  end page content  -->






    </div>


    <script src="../theme.js"></script>

</body>

</html>