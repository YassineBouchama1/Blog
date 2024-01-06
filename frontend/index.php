<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="tailwind.config.js"></script>
    <script>
        /**
         * Loads the theme stored
         */
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="dark flex  flex-row w-[100%] p-5 m-0 text-[#111C2D] bg-[#f0f5f9] dark:bg-slate-800 text-base font-normal leading-5 font-sans">

    <aside class="w-[270px] bg-white rounded-[18px] h-screen  flex flex-col  z-20 fixed  top-5  lg:left-5 left-[-100%]   bottom-5  shadow-md transition-width duration-150 ease-in-out  ">
        <div class="h-[100px] p-5 ">
            <a class="modernize-13biwtz" href="/">
                <img alt="logo" fetchpriority="high" width="174" height="70" decoding="async" data-nimg="1" src="https://spike-nextjs-pro-main.vercel.app/images/logos/logo-dark.svg" class="text-transparent" />
            </a>

        </div>

        <!-- body sidebar -->
        <ul class="h-full  flex  flex-col   overflow-y-auto pr-5 w-full">

            <li class="bg-[#e5f3fb] mt-1 cursor-pointer	  no-underline   whitespace-nowrap   text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-full rounded-br-full  font-normal  text-[#0085DB] font-normal leading-6 ">
                <a href="#">
                    <i class="ti ti-home h-[24px] w-[24px] "></i>
                    <span>Dashboard</span>

                </a>
            </li>

            <li class="text-gray-400 mt-1 cursor-pointer	hover:bg-[#e5f3fb] duration-300   no-underline   whitespace-nowrap   text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-full rounded-br-full  font-normal   font-normal leading-6 ">
                <a href="#">
                    <i class="ti ti-home h-[24px] w-[24px] "></i>
                    <span>Clients</span>

                </a>
            </li>

            <li class="text-gray-400 mt-1 cursor-pointer	hover:bg-[#e5f3fb] duration-300   no-underline   whitespace-nowrap   text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-full rounded-br-full  font-normal   font-normal leading-6 ">
                <a href="#">
                    <i class="ti ti-home h-[24px] w-[24px] "></i>
                    <span>Workers</span>

                </a>
            </li>


            <li class="text-gray-400 mt-1 cursor-pointer	hover:bg-[#e5f3fb] duration-300   no-underline   whitespace-nowrap   text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-full rounded-br-full  font-normal   font-normal leading-6 ">
                <a href="#">
                    <i class="ti ti-home h-[24px] w-[24px] "></i>
                    <span>Contracts</span>

                </a>
            </li>



        </ul>

        <!-- body sidebar -->

    </aside>


    <!--  inside page  -->
    <div class="w-full ml-auto block lg:ml-[280px]  px-5 rounded-lg lg:px-[16px]  max-w-[1200px] box-border ">

        <header class="bg-white transition-shadow px-5  min-h-[70px] rounded-[18px] duration-300 ease-in-out flex  w-full box-border  items-center justify-between sticky top-0 right-0 color-opacity-87   shadow-md backdrop-blur-md">


            <i class="ti ti-menu-2 text-xl cursor-pointer lg:block hidden"></i>



            <div class="flex justify-center items-center gap-x-4">

                <div class="relative flex items-center w-full  rounded-full  border-2	 py-1 bg-white overflow-hidden">
                    <div class="grid place-items-center h-full w-12 text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text" id="search" placeholder="Search something.." />
                </div>
                <!-- switcher drk mode -->
                <div>

                    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400    text-sm p-2.5">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>


                <!-- switcher drk mode -->
                <div>

                    <i class="ti ti-bell text-3xl cursor-pointer"></i>
                </div>


                <div class="flex w-full gap-x-2">
                    <img alt="ProfileImg" src="https://spike-nextjs-pro-main.vercel.app/images/profile/user5.jpg" class="rounded-full object-cover object-center w-10 h-10 modernize-1hy9t21">

                    <h3 class="font-bold flex flex-col dark:text-white">Yassine Bouc <span class="font-light  dark:text-white">Admin</span></h3>

                </div>

            </div>

        </header>


        <!--  start page content  -->
        <div class="  rounded-[18px] h-full mt-6 ">

            <!--  start Cards  -->
            <div class="bg-white transition-shadow rounded-[18px] shadow-md backdrop-blur-md h-[250px] w-[250px] p-4">
                ffd

            </div>
            <!--  end Cards  -->



        </div>
        <!--  start page content  -->


    </div>
    <!--  inside page  -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            /* 'class' or 'media', we use 'class' to enable dark mode manually */
        }
    </script>
    <script src="theme.js"></script>


</body>

</html>