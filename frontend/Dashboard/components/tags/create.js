// const API_BASE_URL = 'http://localhost/blog/backend/category.php';



const btnForm = document.getElementById('btnCreate');
const name = document.getElementById('name');
const error_msg = document.getElementById('error_msg');
let idTag = null;




btnForm.addEventListener('click', onBtnFormClick);




// on click BtnForm
async function onBtnFormClick() {
    console.log('clicked create')
    //validation inputs
    if (name.value.trim() === '') {
        return error_msg.textContent = 'name is Required'
    }
    if (idTag === null) {
        return error_msg.textContent = 'id is required'
    }






    //create formdata to send it to server
    const formData = new FormData();
    formData.append('name', name.value);


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

            onLoadBuild();

            console.log('created')
        } catch (error) {
            console.error(error);
        }


    }

    // btnFrom not equal create : excute update
    else {
        try {
            let routePromise = await fetch(`${API_BASE_URL}?action=update&tag_id=${idTag}`, {
                method: 'POST',
                body: formData,
            });



            let response = await routePromise.json();
            console.log(response);
            name.value = ''

            onToggle()
            onLoadBuild();

            console.log('Updated')
        } catch (error) {
            console.error(error);
        }

    }


}













