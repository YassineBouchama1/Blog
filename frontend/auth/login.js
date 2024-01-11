const API_BASE_URL = 'http://localhost/blog/backend/auth.php';

document.addEventListener('DOMContentLoaded', function () {

    let loader = document.getElementById('loader')

    let email = document.getElementById('email');
    let error_msg = document.getElementById('error_msg');
    let password = document.getElementById('password');
    const successfully_msg = document.getElementById('successfully_msg');


    // on click on btn create  excute funtion <onBtnFormClick>
    btnCreate.addEventListener('click', onBtnFormClick)








    // on click BtnFormCreate
    async function onBtnFormClick() {
        console.log('clicked create')

        error_msg.textContent = ''
        //validation inputs

        let emailValid = /^[^@\s\r\n]+@[^@\s\r\n]+\.[^@\s\r\n]+$/;

        if (!emailValid.test(email.value.trim())) {
            return error_msg.textContent = 'Email is required';
        }

        if (password.value === '') {
            return error_msg.textContent = 'password is Required'
        }







        //create formdata to send it to server
        const formData = new FormData();
        formData.append('email', email.value);
        formData.append('password', password.value);

        console.log(password.value)

        //active loader
        loader.classList.remove('hidden')
        try {
            let routePromise = await fetch(`${API_BASE_URL}?action=login`, {
                method: 'POST',
                body: formData,
            });



            let response = await routePromise.json();
            console.log(response);

            if (response.status === 500) {
                error_msg.textContent = 'password or email uncorrect'
                loader.classList.add('hidden')
                return;
            }
            // if (response.user.role === 'admin') {
            //     error_msg.textContent = 'password or email uncorrect<this is Admin info>'
            //     loader.classList.add('hidden')
            //     return;
            // }

            console.log('clear localstorage')
            localStorage.clear()



            //cif user has role admin send it to dahsboard
            if (response.user.role === 'admin') {

                localStorage.setItem('admin_id', response.user.user_id)
                localStorage.setItem('role', response.user.role)
                localStorage.setItem('image_admin', response.user.image)
                localStorage.setItem('username_admin', response.user.username)
                console.log(response.user.user_id)

                setInterval(() => {
                    window.location.href = '../dashboard'
                    loader.classList.add('hidden')
                }, 500)
            }

            //cif user has role author send it to home page

            else {

                localStorage.setItem('user_id', response.user.user_id)
                localStorage.setItem('role', response.user.role)
                console.log(response.user.user_id)
                setInterval(() => {
                    window.location.href = '../'
                    loader.classList.add('hidden')
                }, 500)
            }




            successfully_msg.textContent = "Loging Successfully"
        } catch (error) {
            console.log(error);
            loader.classList.add('hidden')
        }



    }
});
