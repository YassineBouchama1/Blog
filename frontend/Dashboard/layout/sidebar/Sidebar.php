    <style>
      .activeLink {
        border-bottom: solid red !important;
        color: red !important;
        width: 45px;
      }
    </style>

    <aside id="sidebar_dash" class="w-[270px] bg-white dark:bg-[#111c2d] dark:text-white rounded-[18px] h-screen  flex flex-col  z-20 fixed  top-5  lg:left-5  left-[-100%]   bottom-5  shadow-md transition-width duration-150 ease-in-out  ">
      <div class="h-[100px] p-5 flex justify-between ">
        <a class="text-center w-full " href="./">
          <!-- <img alt="logo" fetchpriority="high" width="174" height="70" decoding="async" data-nimg="1" src="https://spike-nextjs-pro-main.vercel.app/images/logos/logo-dark.svg" class="text-transparent" /> 
        -->
          <h1 class="text-center font-bold text-black/60 dark:text-white text-3xl">LOGO</h1>
        </a>
        <button id="toggleSideBarinside"><i class="lg:hidden  flex ti ti-x text-xl cursor-pointer block "> </i></button>

      </div>

      <!-- body sidebar -->
      <ul class="h-full  flex  flex-col   overflow-y-auto pr-5 w-full">

        <li id="mainlink" class="text-gray-400 mt-1 cursor-pointer	hover:bg-[#e5f3fb] hover:text-[#0085DB] duration-300   no-underline   whitespace-nowrap   text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-full rounded-br-full  font-normal   font-normal leading-6">
          <a href="./index.php">
            <i class="ti ti-home h-[24px] w-[24px] "></i>
            <span>Dashboard</span>

          </a>
        </li>

        <li class="text-gray-400 mt-1 cursor-pointer	hover:bg-[#e5f3fb] hover:text-[#0085DB] duration-300   no-underline   whitespace-nowrap   text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-full rounded-br-full  font-normal   font-normal leading-6 ">
          <a href="./posts.php">
            <i class="ti ti-article h-[24px] w-[24px] "></i>
            <span>Posts</span>

          </a>
        </li>

        <li class="text-gray-400 mt-1 cursor-pointer	hover:bg-[#e5f3fb]  hover:text-[#0085DB] duration-300   no-underline   whitespace-nowrap   text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-full rounded-br-full  font-normal   font-normal leading-6 ">
          <a href="./categories.php">
            <i class="ti ti-category h-[24px] w-[24px] "></i>
            <span>categories</span>

          </a>
        </li>


        <li class="text-gray-400 mt-1 cursor-pointer	hover:bg-[#e5f3fb]  hover:text-[#0085DB] duration-300   no-underline   whitespace-nowrap   text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-full rounded-br-full  font-normal   font-normal leading-6 ">
          <a href="./tags.php">
            <i class="ti ti-tag h-[24px] w-[24px] "></i>
            <span>Tags</span>

          </a>
        </li>


        <li class="text-gray-400 mt-1 cursor-pointer	hover:bg-[#e5f3fb]  hover:text-[#0085DB] duration-300   no-underline   whitespace-nowrap   text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-full rounded-br-full  font-normal   font-normal leading-6 ">
          <a href="./authors.php">
            <i class="ti ti-users h-[24px] w-[24px] "></i>
            <span>Authors</span>

          </a>
        </li>



      </ul>

      <!-- body sidebar -->

    </aside>


    <script src="layout\sidebar\sidebar.js"></script>

    <!--- toggle sidebar script >