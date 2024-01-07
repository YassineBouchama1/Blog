// const API_BASE_URL = 'http://localhost/blog/backend/category.php';



const btnCreate = document.getElementById('btnCreate');
const name = document.getElementById('name');
const error_msg = document.getElementById('error_msg');





btnCreate.addEventListener('click', onBtnFormClick);




// on click BtnForm
async function onBtnFormClick() {
    console.log('clicked create')
    //validation inputs
    if (name.value.trim() === '') {
        return error_msg.textContent = 'name is Required'
    }






    //create formdata to send it to server
    const formData = new FormData();
    formData.append('name', name.value);


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













