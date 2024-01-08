<!-- component -->
<style>
    .top-100 {
        top: 100%
    }

    .bottom-100 {
        bottom: 100%
    }

    .max-h-select {
        max-height: 300px;
    }
</style>

<div class="w-full  flex flex-col items-center h-64 mx-auto ">
    <div class="w-full ">
        <div class="flex flex-col items-center relative">
            <div class="w-full  ">
                <div class="my-2 p-1 flex border border-gray-200 bg-transparent rounded ">
                    <div id="selected_tags" class="flex flex-auto flex-wrap min-h-[20px]">



                        <div class="flex-1">
                            <input placeholder="sfsd" class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800">
                        </div>
                    </div>

                </div>
            </div>
            <div class="absolute  shadow top-100 bg-transparent bg-white z-40 w-full lef-0 rounded-lg max-h-select overflow-y-auto svelte-5uyqqj">
                <div id="list_tags_select" class="max-h-[150px] flex flex-col w-full">


                </div>
            </div>
        </div>
    </div>
</div>
</div>