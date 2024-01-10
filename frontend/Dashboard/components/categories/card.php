<div class="">
    <button id="toggle_category" class=" relative inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-[#0085DB] rounded-lg hover:bg-[#0173BE] ">New Category</button>


    <!-- form caregory  -->
    <div id="form_category" class=" absolute h-[300px] max-w-[280px] w-full transition-all ease-in-out duration-300 scale-0  bg-white dark:bg-[#111c2d] dark:text-white text-black transition-shadow rounded-[18px] shadow-md  backdrop-blur-md  ">

        <?php require('form.php') ?>
    </div>
    <!-- form caregory  -->
</div>


<div id="container_list" class="mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-6  mt-10 mb-5">








</div>

<script src="components\categories\category.js"></script>

<script src="components\categories\delete.js"></script>
<script src="components\categories\builder.js"></script>
<script src="components\categories\create.js"></script>