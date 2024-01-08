const API_BASE_URL = 'http://localhost/blog/backend/post.php';
const API_Category_URL = 'http://localhost/blog/backend/category.php';
const API_TAG_URL = 'http://localhost/blog/backend/tag.php';



const btnCreate = document.getElementById('btnCreate');
const image = document.getElementById('image');
const title = document.getElementById('title');
const content = document.getElementById('content');
const categorySelector = document.getElementById('category');


const error_msg = document.getElementById('error_msg');



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



    // fetch all tags



})




btnCreate.addEventListener('click', onBtnFormClick);




// on click BtnForm
async function onBtnFormClick() {
    console.log('clicked create')
    //validation inputs
    if (title.value.trim() === '') {
        return error_msg.textContent = 'title is Required'
    }
    if (image.files.length === 0) {
        return error_msg.textContent = 'image is Required'
    }





    //create formdata to send it to server
    const formData = new FormData();
    formData.append('title', title.value);
    formData.append('image', image.files[0]);


    try {
        let routePromise = await fetch(`${API_BASE_URL}?action=create`, {
            method: 'POST',
            body: formData,
        });



        let response = await routePromise.json();
        console.log(response);
        title.value = ''
        image.files.length = 0
        onLoadBuild();

        console.log('created')
    } catch (error) {
        console.error(error);
    }



}













function fillInputsCategory(categorySelector, optionValue) {
    const option = document.createElement('option');
    option.value = optionValue.category_id;
    option.text = optionValue.category_name;
    option.selected = true;
    categorySelector.appendChild(option);
}