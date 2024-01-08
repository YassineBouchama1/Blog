



// this function for building all tags coming from the backend
function buildTag(tag) {
    let buttonDiv = document.createElement('button');

    buttonDiv.classList = "cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-blue-100";
    buttonDiv.onclick = function (event) {
        event.preventDefault();
        selectTags(tag);
    };

    buttonDiv.innerHTML = `
    <div class="flex w-full items-center p-2 pl-2  border-transparent border-l-2 relative hover:border-teal-100">
    <div class="mx-2 leading-6">${tag}</div>
   
    </div>
    `;

    list_tags_select.appendChild(buttonDiv);
}







// function build selected functions
function buildTagsSelectedFun() {
    try {
        selected_tags.innerHTML = ''
        tagsSelected.map((tag) => buildTagsSelected(tag))
    } catch (error) {
        console.log('no tags pb')
    }
}







//this function for build selected tags
// work everytnime author choose a tag
function buildTagsSelected(tag) {
    console.log('buildselected')
    let buttonTagSelected = document.createElement('button')

    buttonTagSelected.classList = "bg-white flex justify-center items-center m-1 font-medium py-1 px-2  rounded-full text-[#0274C0] bg-[#0085DB] border border-[#0085DB] "
    buttonTagSelected.onclick = function (event) {
        event.preventDefault();
        unSelectTags(tag);
    };
    buttonTagSelected.innerHTML = `
    
    <div class="bg-white text-xs font-normal leading-none max-w-full flex-initial">${tag}</div>
   
    `

    selected_tags.appendChild(buttonTagSelected)
}




// this function to add tags to selected array
function selectTags(tag) {

    //check if tags already in selectedtags array
    const isExist = tagsSelected.find((item) => item == tag);


    if (!isExist) {
        tagsSelected.push(tag)

    }
    buildTagsSelectedFun()
}


// reverse selectTags
function unSelectTags(tag) {
    console.log('unselect');
    const index = tagsSelected.indexOf(tag);

    if (index !== -1) {
        tagsSelected.splice(index, 1);
        buildTagsSelectedFun();
    }
}


image.addEventListener('change', changeAvatar);

function changeAvatar() {
    if (image.files.length !== 0) {
        const file = image.files[0];
        const reader = new FileReader();

        reader.onload = function (e) {

            displatImg.src = e.target.result;
        };


        reader.readAsDataURL(file);
    }
}
