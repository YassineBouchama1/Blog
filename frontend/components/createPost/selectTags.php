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
                <div class="my-2 p-1 flex border border-gray-200 bg-white rounded ">
                    <div id="selected_tags" class="flex flex-auto flex-wrap min-h-[20px]">

                        <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-[#0274C0] bg-[#0085DB] border border-[#0085DB] ">
                            <div class="text-xs font-normal leading-none max-w-full flex-initial">HTML</div>
                            <div class="flex flex-auto flex-row-reverse">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-[#004D80] rounded-full w-4 h-4 ml-2">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex-1">
                            <input placeholder="" class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800">
                        </div>
                    </div>

                </div>
            </div>
            <div class="absolute shadow top-100 bg-white z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
                <div id="list_tags_select" class="flex flex-col w-full">
                    <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-blue-100">
                        <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                            <div class="w-full items-center flex">
                                <div class="mx-2 leading-6  ">Python </div>
                            </div>
                        </div>
                    </div>

                    <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-blue-100">
                        <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                            <div class="w-full items-center flex">
                                <div class="mx-2 leading-6  ">Python </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        let list_tags_select = document.getElementById('list_tags_select')
        let selected_tags = document.getElementById('selected_tags')
        let tags = ['java', "sql", "javascript"]
        let tagsSelected = ['typescript']

        try {
            list_tags_select.innerHTML = ''
            tags.map((tag) => buildTag(tag))
        } catch (error) {
            console.log('no tags pb')
        }
        buildTagsSelectedFun()

        function buildTagsSelectedFun() {
            try {
                selected_tags.innerHTML = ''
                tagsSelected.map((tag) => buildTagsSelected(tag))
            } catch (error) {
                console.log('no tags pb')
            }
        }

        // this function for building all tags coming from the backend
        function buildTag(tag) {
            let buttonDiv = document.createElement('button');

            buttonDiv.classList = "cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-blue-100";
            buttonDiv.onclick = function(event) {
                event.preventDefault();
                selectTags(tag);
            };

            buttonDiv.innerHTML = `
        <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
        <div class="mx-2 leading-6">${tag}</div>
       
        </div>
        `;

            list_tags_select.appendChild(buttonDiv);
        }




        //this function for build selected tags
        // work everytnime author choose a tag
        function buildTagsSelected(tag) {
            console.log('buildselected')
            let buttonTagSelected = document.createElement('button')

            buttonTagSelected.classList = "flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-[#0274C0] bg-[#0085DB] border border-[#0085DB] "
            buttonTagSelected.onclick = function(event) {
                event.preventDefault();
                unSelectTags(tag);
            };
            buttonTagSelected.innerHTML = `
        
        <div class="text-xs font-normal leading-none max-w-full flex-initial">${tag}</div>
       
        `

            selected_tags.appendChild(buttonTagSelected)
        }



        function selectTags(tag) {


            //check if tags already in selectedtags array
            const isExist = tagsSelected.find((item) => item == tag);


            if (!isExist) {
                tagsSelected.push(tag)

            }
            buildTagsSelectedFun()
        }

        function unSelectTags(tag) {
            console.log('unselect');
            const index = tagsSelected.indexOf(tag);

            if (index !== -1) {
                tagsSelected.splice(index, 1);
                buildTagsSelectedFun();
            }
        }

    })
</script>