<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tag</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="tailwind.config.js"></script>



</head>

<body class=" text-[#111C2D] bg-white dark:bg-[#1f1d2b]  duration-300 ease-in-out text-base font-normal leading-5 font-sans">
    <div id="container" class="flex  flex-col w-[100%] p-5 m-0 mb-10">


        <!-- Header Start -->

        <?php require('components/header/Header.php') ?>

        <!-- Header Start -->






        <!--  start page content  -->
        <div class="rounded-[18px] h-full mt-6 ">

            <h2 class="font-extrabold dark:text-white mb-20 text-4xl  text-2xl md:text-4xl text-center" id="tag_Title">Loading...</h2>


            <?php require('components/popular/card.php') ?>





        </div>
        <!--  end page content  -->




    </div>

    <?php require('components\searchBar\search.php') ?>
    <!-- <?php require('components/footer/footer.php') ?> -->
    <script src="theme.js"></script>
</body>

</html>