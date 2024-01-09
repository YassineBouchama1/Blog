<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    /* For IE, Edge and Firefox */
    .scrollbar-hide {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }
</style>

<div id="searchBar" class="hidden w-full z-[999]  top-0 fixed  h-screen w-screen left-0 right-0  flex justify-center text-center items-center bg-[#0085DB]/20">
    <div class=" py-20 h-screen px-2 ">
        <div class="max-w-md mx-auto  overflow-hidden md:max-w-xl ">
            <button id="closeSearch" class="mb-4 dark:text-white">Close</button>
            <div class="relative ">
                <input id="search_input" type="text" class="px-8 py-2 pl-8 rounded border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:border-transparent" placeholder="search..." value="" />
                <svg class="w-4 h-4 absolute left-2.5 top-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <h3 class="mt-2 text-sm text-start dark:text-white">Result:<span id="resultLength"></span></h3>
            <ul id="result_Search" class="bg-white border border-gray-100 w-full mt-2  max-h-[200px] w-[250px] overflow-y-auto scrollbar-hide">


                <li id="searching_Loading" class="hidden px-2 py-1 border-b-2 border-gray-100 flex justify-start items-center gap-x-1 cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                    <p>Searching...</p>
                </li>

            </ul>
        </div>


    </div>

</div>
<script src="lib\debounce.js"></script>
<script src="components\searchBar\search.js"></script>