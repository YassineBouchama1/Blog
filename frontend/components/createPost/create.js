const API_BASE_URL = 'http://localhost/blog/backend/post.php';
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



})




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