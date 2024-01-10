// const API_BASE_URL = 'http://localhost/blog/backend/category.php';



const btnFormCat = document.getElementById('btnFormCat');
const image = document.getElementById('image');
const name = document.getElementById('name');
const error_msg = document.getElementById('error_msg');
let idCategory = null;





btnFormCat.addEventListener('click', onBtnFormClick);




// on click btnFormCat
async function onBtnFormClick() {

    console.log(btnFormCat.textContent)
    //validation inputs
    if (name.value.trim() === '') {
        return error_msg.textContent = 'name is Required'
    }

    if (image.files.length === 0 && btnFormCat.textContent === 'create') {
        return error_msg.textContent = 'image is Required'
    }
    if (idCategory === null && btnFormCat.textContent === 'update') {
        return error_msg.textContent = 'id is required'
    }





    //create formdata to send it to server
    const formData = new FormData();
    formData.append('name', name.value);
    formData.append('image', image.files[0]);



    // if btn name create  exute code create 
    if (btnFormCat.textContent == 'create') {
        console.log('clicked create')

        try {
            let routePromise = await fetch(`${API_BASE_URL}?action=create`, {
                method: 'POST',
                body: formData,
            });



            let response = await routePromise.json();

            // validate response from api
            if (response.status === 402) {
                error_msg.textContent = 'Category name Already Exist'
                return;
            }

            if (response.status === 401) {
                error_msg.textContent = 'image is required'
                return;
            }
            if (response.status === 500) {
                error_msg.textContent = 'iFailed to create category'
                return;
            }

            console.log(response);
            name.value = ''
            image.files.length = 0
            onToggle()
            onLoadBuild();


        } catch (error) {
            console.error(error);
        }


    }

    // btnFrom not equal create : excute update
    else {
        console.log('clicked updated')
        try {
            let routePromise = await fetch(`${API_BASE_URL}?action=update&category_id=${idCategory}`, {
                method: 'POST',
                body: formData,
            });



            let response = await routePromise.json();
            console.log(response);
            if (response.status === 500) {
                error_msg.textContent = 'Failed to create category'
                return;
            }
            if (response.status === 402) {
                error_msg.textContent = 'Category name Already Exist'
                return;
            }
            name.value = ''
            image.files.length = 0
            onToggle()
            onLoadBuild();


        } catch (error) {
            console.error(error);
        }

    }


}













