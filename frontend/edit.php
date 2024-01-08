<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        if (localStorage.getItem('role') !== 'author') {

            window.location.href = './';
        } else if (localStorage.getItem('role') === undefined) {
            window.location.href = './';
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="tailwind.config.js"></script>



</head>

<body class=" flex  flex-col w-[100%] p-5 m-0 text-[#111C2D] bg-[#f0f5f9] dark:bg-slate-800 text-base font-normal leading-5 font-sans">
    <!-- Header Start -->

    <?php require('components/header/Header.php') ?>

    <!-- Header Start -->






    <!--  start page content  -->
    <div class="rounded-[18px] h-full mt-6 ">


        <?php require('components/editPost/form.php') ?>





    </div>
    <!--  end page content  -->




    <script src="theme.js"></script>

</body>

</html>