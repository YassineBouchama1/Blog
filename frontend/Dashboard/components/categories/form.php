<div class="flex flex-col  items-center w-full text-xs px-4 py-8 gap-y-6">
    <p id="error_msg"></p>

    <div class=" w-full text-xs">
        <label class="font-semibold text-gray-600 py-2">Name <abbr title="required">*</abbr></label>
        <input name="name" id="name" placeholder="Name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text">
    </div>
    <div class=" w-full text-xs">
        <label class=" font-semibold text-gray-600 py-2 mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">Image <abbr title="required">*</abbr></label>
        <input type="file" name="image" id="image" class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" ">
    </div>
    <button  class=" max-w-[200px] px-4 py-2 text-sm font-medium text-center text-white bg-[#01BE37] rounded-lg hover:bg-[#01BE37]" id="btnCreate">Create</button>

    </div>