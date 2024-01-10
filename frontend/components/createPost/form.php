<section class="w-full  px-4 mx-auto bg-white dark:bg-[#111c2d] rounded-lg shadow-xl">




    <form class="p-4 flex flex-col min-w-0 break-words min-h-[500px]  w-full mb-6  mt-16">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-white">Create Post</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-white">You can use Our AI To Help You Create Your Article.</p>
                <p id="error_msg" class="text-red-500"></p>
                <p id="successfully_msg" class="text-green-500"></p>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900  dark:text-white">Title<span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                <input type="text" name="title" id="title" class="block flex-1 border-0 bg-transparent py-1.5 px-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Title...">
                            </div>
                        </div>
                    </div>

                    <div class="col-span-full ">
                        <label for="about" class="block text-sm font-medium leading-6 text-gray-900  dark:text-white ">Content<span class="text-red-500">*</span></label>

                        <div id="containerContent" class="mt-2 relative">
                            <textarea id="content" name="content" rows="6" class="relative p-6 bg-transparent block w-full rounded-md border-0  w-full text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            <div id='bot_creating' class="hidden absolute top-1  flex  bottom-0 left-0 right-0  text-[#0085DB]/80 rounded-lg py-2 px-4 flex justify-start ">
                                Generating
                                <svg class="h-4 w-4 animate-spin stroke-gray-500" viewBox="0 0 256 256">
                                    <line x1="128" y1="32" x2="128" y2="64" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                                    <line x1="195.9" y1="60.1" x2="173.3" y2="82.7" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                                    <line x1="224" y1="128" x2="192" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24">
                                    </line>
                                    <line x1="195.9" y1="195.9" x2="173.3" y2="173.3" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                                    <line x1="128" y1="224" x2="128" y2="192" stroke-linecap="round" stroke-linejoin="round" stroke-width="24">
                                    </line>
                                    <line x1="60.1" y1="195.9" x2="82.7" y2="173.3" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                                    <line x1="32" y1="128" x2="64" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                                    <line x1="60.1" y1="60.1" x2="82.7" y2="82.7" stroke-linecap="round" stroke-linejoin="round" stroke-width="24">
                                    </line>
                                </svg>

                            </div>
                            <?php require('components\createPost\bot.php') ?>

                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="category" class="block text-sm font-medium leading-6 text-gray-900  dark:text-white">Category<span class="text-red-500">*</span></label>
                        <div class="mt-2">

                            <select name="category" id="category" class="bg-white drak:text-white border-0 cursor-pointer rounded-lg  px-4 py-2 drop-shadow-md   w-72 duration-300 ">
                                <option value="" disabled selected="">selet Category</option>


                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900  dark:text-white">Tags</label>
                        <div class="mt-2">
                            <?php require('components\createPost\selectTags.php') ?>
                        </div>
                    </div>
                    <div class="col-span-full">
                        <label for="photo" class="block text-sm font-medium leading-6 text-gray-900  dark:text-white">Cover</label>
                        <input type="file" name="image" id="image" class="block max-w-[200px] mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" ">

                    </div>

                    
                </div>
            </div>


            <div class=" mt-6 flex items-center justify-end gap-x-6">
                        <a href="./profile.php" type="button" class="text-sm font-semibold leading-6 text-gray-900  dark:text-white">Cancel</a>
                        <button type="button" id="btnCreate" class="rounded-md bg-[#0085DB] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#0269AE] ">Create</button>
                    </div>
    </form>



</section>



<script src="components\createPost\tag.js"></script>
<script src="components\createPost\create.js"></script>
<script src="components\createPost\assistant.js"></script>