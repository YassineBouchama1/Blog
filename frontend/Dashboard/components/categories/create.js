// const API_BASE_URL = 'http://localhost/blog/backend/category.php';



const btnForm = document.getElementById('btnForm');
const image = document.getElementById('image');
const name = document.getElementById('name');
const error_msg = document.getElementById('error_msg');
let idCategory = null;





btnForm.addEventListener('click', onBtnFormClick);




// on click BtnForm
async function onBtnFormClick() {
    console.log('clicked create')
    console.log(btnForm.textContent)
    //validation inputs
    if (name.value.trim() === '') {
        return error_msg.textContent = 'name is Required'
    }

    if (image.files.length === 0 && btnForm.textContent === 'create') {
        return error_msg.textContent = 'image is Required'
    }
    if (idCategory === null && btnForm.textContent === 'update') {
        return error_msg.textContent = 'id is required'
    }





    //create formdata to send it to server
    const formData = new FormData();
    formData.append('name', name.value);
    formData.append('image', image.files[0]);



    // if btn name create  exute code create 
    if (btnForm.textContent === 'create') {


        try {
            let routePromise = await fetch(`${API_BASE_URL}?action=create`, {
                method: 'POST',
                body: formData,
            });



            let response = await routePromise.json();
            console.log(response);
            name.value = ''
            image.files.length = 0
            onToggle()
            onLoadBuild();

            console.log('created')
        } catch (error) {
            console.error(error);
        }


    }

    // btnFrom not equal create : excute update
    else {
        try {
            let routePromise = await fetch(`${API_BASE_URL}?action=update&category_id=${idCategory}`, {
                method: 'POST',
                body: formData,
            });



            let response = await routePromise.json();
            console.log(response);
            name.value = ''
            image.files.length = 0
            onToggle()
            onLoadBuild();

            console.log('Updated')
        } catch (error) {
            console.error(error);
        }

    }


}













