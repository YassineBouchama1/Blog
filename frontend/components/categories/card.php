<main id="container_list" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 min-h-[400px] w-full">


  <article class="relative flex flex-col  m-8 rounded-[18px] shadow-md  min-h-[270px] h-auto  w-full animate-pulse" <article class="animate-pulse relative flex flex-col jusitfy-between gap-4 items-center min-h-[250px] h-auto  w-full bg-[#e5e5e5] dark:bg-[#252936] dark:text-white text-black transition-shadow rounded-[18px] shadow-md  backdrop-blur-md  ">

    <button class="absolute top-[-4%]  bg-[#0085DB] rounded-lg text-white px-4 py-2 ">Loading...</button>
    <div class="">
      <img class="bg-white rounded-tl-[18px] rounded-tr-[18px] " src="https://www.ancmedia.net/instant-blog/uploads/1640090535.jpg">

    </div>
    <div class="p-2 text-center ">
      <div class="flex justify-around mb-4">
        <p><i class="ti ti-clock-hour-5"></i> <span>Loading...</span></p>
        <p><i class="ti ti-eye"></i> <span>Loading...</span></p>

      </div>
      <a href="#" class="text-center  mb-2 text-md font-bold leading-none tracking-tight text-gray-900 md:text-2xl   dark:text-white   ">Title Post</a>
      <p class="max-w-xs break-words text-center overflow-ellipsis">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum aspernatur quod dolorum necessitatibus... </p>


      <div class="flex flex-wrap gap-2 mt-2 ">
        <button class=" inline-flex items-center justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-8 rounded-full text-xs py-1 px-1">
          Design
        </button>
        <button class="inline-flex items-center justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-8 rounded-full text-xs py-1 px-1">
          Development
        </button>
        <button class="inline-flex items-center justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-8 rounded-full text-xs py-1 px-1">
          Marketing
        </button>
        <button class="inline-flex items-center justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-8 rounded-full text-xs py-1 px-1">
          SEO
        </button>
        <button class="inline-flex items-center justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-8 rounded-full text-xs py-1 px-1">
          UI/UX
        </button>
      </div>

    </div>
    <div class="pb-4 pl-4	self-start flex  justify-between w-full px-4 	 text-md flex   items-center ">

      <div class="flex items-center">
        <img class="w-5 h-5" src="${IMG_BASE_URL}${item.image_author}">
        <a href="profile.php?action=userPosts&user_id=${item.user_id}" class="pl-1"><span>Yassine</span></a>
        <i class="ti ti-discount-check-filled ml-1  text-[#1DA1F2] "></i>
      </div>
      <div class="flex gap-x-4 items-center">

        <button><i class="ti ti-edit text-green-500"></i></button>
        <button><i class="ti ti-trash text-red-500"></i> </button>
      </div>

    </div>

  </article>





</main>

<?php require('components\loader.php') ?>
<script src="lib\timeAgo.js"></script>
<script src="components/categories/builder.js"></script>