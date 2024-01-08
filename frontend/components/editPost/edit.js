const API_BASE_URL = 'http://localhost/blog/backend/post.php';
const IMG_BASE_URL = 'http://localhost/blog/backend';
const API_Category_URL = 'http://localhost/blog/backend/category.php';
const API_TAG_URL = 'http://localhost/blog/backend/tag.php';


const btnCreate = document.getElementById('btnCreate');
let image = document.getElementById('image');
let title = document.getElementById('title');
let content = document.getElementById('content');
let categorySelector = document.getElementById('category');
let user_id = localStorage.getItem('user_id') ? localStorage.getItem('user_id') : 2
let tagsSelected = [] //  we will use this arry in create post

let error_msg = document.getElementById('error_msg');
let successfully_msg = document.getElementById('successfully_msg');


const searchParams = new URLSearchParams(window.location.search);




document.addEventListener('DOMContentLoaded', async function () {





    //fetch all categoriies
    try {
        let routePromise = await fetch(API_Category_URL);



        let response = await routePromise.json();
        console.log(response);
        // build  options inside category seector
        response.map((item) => fillInputsCategory(categorySelector, item)
        )


    } catch (error) {
        console.error(error);
    }




    //fetch all post detail
    try {
        let routePromise = await fetch(`${API_BASE_URL}?action=find&post_id=${searchParams.get('post_id')}`);



        let response = await routePromise.json();
        console.log(response);

        title.value = response.title
        content.value = response.content
        categorySelector.value = response.category_id
        response.tags.split(',').forEach((tag) => tagsSelected.push(tag))
        image.src = `${IMG_BASE_URL}${response.image}`

        console.log(response.tags)
        console.log(tagsSelected)
        buildTagsSelectedFun2()
    } catch (error) {
        console.error(error);
    }

})


// function build selected functions
function buildTagsSelectedFun2() {
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
    
    <div class="text-xs font-normal leading-none max-w-full flex-initial">${tag}</div>
   
    `

    selected_tags.appendChild(buttonTagSelected)
}


btnCreate.addEventListener('click', onBtnFormClick);




// on click BtnFormCreate
async function onBtnFormClick() {
    console.log('clicked create')
    console.log(tagsSelected)
    //validation inputs
    if (title.value.trim() === '') {
        return error_msg.textContent = 'title is Required'
    }
    if (content.value.trim() === '') {
        return error_msg.textContent = 'content is Required'
    }
    if (categorySelector.value === '') {
        return error_msg.textContent = 'category is Required'
    }
    if (user_id === '') {
        return error_msg.textContent = 'user id  is Required'
    }

    if (image.files.length === 0) {
        return error_msg.textContent = 'image is Required'
    }





    //create formdata to send it to server
    const formData = new FormData();
    formData.append('title', title.value);
    formData.append('content', content.value);
    formData.append('category_id', categorySelector.value);
    formData.append('user_id', user_id);
    //check if author add tags or not
    tagsSelected === 0 ? null : formData.append('tags', tagsSelected.join(","));
    formData.append('image', image.files[0]);


    try {
        let routePromise = await fetch(`${API_BASE_URL}?action=create`, {
            method: 'POST',
            body: formData,
        });



        let response = await routePromise.json();
        console.log(response);


        title.value = ''
        content.value = ''
        categorySelector.value = ''
        tagsSelected.length = 0
        image.length = 0
        //   window.location.replace
        successfully_msg.textContent = "Post Created"

        //scrolll to the top page after post created
        window.scrollTo(0, 0);

        console.log('created')
    } catch (error) {
        console.error(error);
    }



}












// to fill options categories
function fillInputsCategory(categorySelector, optionValue) {
    const option = document.createElement('option');
    option.value = optionValue.category_id;
    option.text = optionValue.category_name;
    option.selected = true;
    categorySelector.appendChild(option);
}