<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <script>
        // check if url has userid 
        const searchParamsChecker = new URLSearchParams(window.location.search);

        if (!searchParamsChecker.has('user_id')) {

            window.location.href = './'
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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


            <?php require('components/profile/profile.php') ?>





        </div>
        <!--  end page content  -->





        <script src="theme.js"></script>

    </div>
    <?php require('components\searchBar\search.php') ?>
    <?php require('components/footer/footer.php') ?>

</body>

</html>